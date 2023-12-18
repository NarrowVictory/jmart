<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Product extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->load->library('session');
        $this->load->model('M_Crud');
        $this->load->model('Datatable_model');
        $this->load->model('M_Penjualan');
        $this->auth->cek_login();
    }

    public function index()
    {
        $data['kategori'] = $this->M_Crud->tampil_data('tb_kategori')->result_array();
        $data['satuan'] = $this->M_Crud->tampil_data('tb_satuan')->result_array();
        $data['supplier'] = $this->M_Crud->tampil_data('tb_supplier')->result_array();
        $this->load->view('level/admin/product_data', $data);
    }

    public function simpan()
    {
        // Mengambil data yang dikirimkan melalui POST
        $nama_produk = $this->input->post('nama_produk');
        $select_kategori = $this->input->post('select_kategori');
        $barcode = $this->input->post('barcode');
        $stock_brg = $this->input->post('stock_brg');
        $select_satuan = $this->input->post('select_satuan');
        $alert_quantity = $this->input->post('alert_quantity');
        $select_supplier = $this->input->post('select_supplier');
        $description = $this->input->post('description');
        $fileUpload = $this->input->post('fileUpload');
        $hpp = $this->input->post('hpp_barang');
        $markup_barang = $this->input->post('markup_barang');
        $ppn_barang = $this->input->post('ppn_barang');
        $harga_jual_barang = $this->input->post('total_jual');

        try {
            // Inisialisasi nama gambar dengan nama gambar default
            $nama_gambar = "https://dodolan.jogjakota.go.id/assets/media/default/default-product.png";

            // Pemeriksaan apakah ada gambar yang diunggah
            if (!empty($_FILES['fileUpload']['name'])) {
                // Konfigurasi upload gambar
                $config['upload_path'] = './path/ke/direktori/untuk/menyimpan/gambar/'; // Ganti dengan direktori tujuan yang Anda inginkan
                $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Tipe file yang diizinkan
                $config['max_size'] = 2048; // Ukuran maksimum (dalam KB)

                $this->load->library('upload', $config);

                // Lakukan upload gambar
                if ($this->upload->do_upload('fileUpload')) {
                    // Jika berhasil diunggah, Anda dapat mengakses informasi gambar dengan:
                    $upload_data = $this->upload->data();
                    $nama_gambar = $upload_data['file_name'];
                }
            }

            // Simpan data ke database menggunakan model Anda
            $data = array(
                'nama_barang' => $nama_produk,
                'id_kategori_brg' => $select_kategori,
                'id_supplier' => $select_supplier,
                'id_satuan' => $select_satuan,
                'barcode' => $barcode,
                'stock_brg' => $stock_brg,
                'alert_quantity' => $alert_quantity,
                'description' => $description,
                'hpp_barang' => $hpp,
                'markup_barang' => $markup_barang,
                'harga_jual_barang' => $harga_jual_barang,
                'gambar_barang' => $nama_gambar,
            );

            $this->M_Crud->input_data($data, 'tb_barang');
            $this->session->set_flashdata('success_message', 'Produk berhasil ditambahkan.');
            redirect('product/tambah');
        } catch (Exception $e) {
            // Tangani kesalahan jika terjadi
            $this->session->set_flashdata('error_message', 'Gagal menambahkan produk: ' . $e->getMessage());
            redirect('product/tambah');
        }
    }

    public function edit($id)
    {
        $data['barang'] = $this->M_Crud->all_data('tb_barang')->join('tb_kategori', 'tb_kategori.id_kategori_brg = tb_barang.id_kategori_brg')->join('tb_supplier', 'tb_supplier.id_supplier = tb_barang.id_supplier', 'left')->join('tb_satuan', 'tb_satuan.id_satuan = tb_barang.id_satuan', 'left')->where('tb_barang.id_brg', $id)->get()->row_array();
        $data['kategori'] = $this->M_Crud->tampil_data('tb_kategori')->result_array();
        $data['satuan'] = $this->M_Crud->tampil_data('tb_satuan')->result_array();
        $data['supplier'] = $this->M_Crud->tampil_data('tb_supplier')->result_array();
        $this->load->view('level/admin/product_edit', $data);
    }

    public function simpan_import()
    {
        $user = $this->session->userdata('id_user');

        $file = $_FILES['file_excel'];
        $file_size = $_FILES['file_excel']['size'];
        $file_size_kb = $file_size / 1024;

        $file_name = $file['name'];

        if (round($file_size_kb, 2) > 1024) {
            $this->session->set_flashdata('error_message', 'Ukuran file tidak boleh lebih dari 1 MB.');
            redirect(site_url("product/import"));
        }

        $ext = pathinfo($file_name, PATHINFO_EXTENSION);

        $file_path = $file['tmp_name'];

        if ($ext == "xls") {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else if ($ext == "xlsx") {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        } else if ($ext == "csv") {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else {
            $this->session->set_flashdata('error_message', 'Format yang diizinkan adalah Xls, Xlsx, dan Csv saja!!');
            redirect(site_url("product/import"));
        }

        $spreadsheet = $render->load($file_path);
        $sheet = $spreadsheet->getActiveSheet()->toArray();

        if (count($sheet) <= 1) {
            $this->session->set_flashdata('error_message', 'Data Kosong. Minimal satu data untuk melanjutkan proses!!');
            redirect(site_url("product/import"));
        } else if (count($sheet['0']) != 11) {
            $this->session->set_flashdata('error_message', 'Format Column Excel Tidak Sesuai. Silahkan upload sesuai dengan format yang ditetapkan');
            redirect(site_url("product/import"));
        } else {
            $jumlaherror = 0;
            $jumlahsukses = 0;

            foreach ($sheet as $x => $excel) {
                if ($x == 0 or $x == 1 or $x == 2) {
                    continue;
                }

                $cek_kategori = $this->M_Crud->all_data('tb_kategori')->where('nama_kategori_brg', $excel["3"])->get()->row_array();
                $cek_supplier = $this->M_Crud->all_data('tb_supplier')->where('nama_supplier', $excel["4"])->get()->row_array();
                $cek_barang = $this->M_Crud->all_data('tb_barang')->where('nama_barang', $excel["1"])->or_where('barcode', $excel["2"])->get()->row_array();

                if (isset($cek_barang)) {
                    $jumlaherror++;
                    continue;
                }

                if (isset($cek_kategori)) {
                    $kategori = $cek_kategori['id_kategori_brg'];
                } else {
                    $kategori = 1;
                }

                if (isset($cek_supplier)) {
                    $supplier = $cek_supplier['id_supplier'];
                } else {
                    $supplier = 1;
                }

                if ($excel["10"] != "") {
                    $gambar = $excel["10"];
                } else {
                    $gambar = "https://dodolan.jogjakota.go.id/assets/media/default/default-product.png";
                }

                if ($excel["2"] == "") {
                    $barcode = '';
                    $length = 10;

                    for ($i = 0; $i < $length; $i++) {
                        $barcode .= rand(0, 9);
                    }
                } else {
                    $barcode = $excel["2"];
                }

                $data = [
                    "nama_barang" => $excel["1"],
                    "barcode" => $barcode,
                    "id_kategori_brg" => $kategori,
                    "id_satuan" => 1,
                    "id_supplier" => $supplier,
                    "hpp_barang" => $excel["5"],
                    "markup_barang" => $excel["6"],
                    "harga_jual_barang" => $excel["7"],
                    "stock_brg" => $excel["8"],
                    "gambar_barang" => $gambar
                ];
                $this->M_Crud->input_data($data, "tb_barang");
                $jumlahsukses++;
            }

            $this->session->set_flashdata('success_message', "$jumlaherror Data Tidak Bisa Disimpan <br> $jumlahsukses Data Berhasil Disimpan");
            redirect(site_url("product/import"));
        }
    }

    public function simpan_gambar()
    {
        $config['upload_path'] = FCPATH . 'public/template/upload/barang/';
        $config['allowed_types'] = 'jpg|jpeg';
        $config['max_size'] = '1024'; // 10MB, sesuaikan dengan kebutuhan
        $config['encrypt_name'] = false; // Nonaktifkan enkripsi nama file

        $this->load->library('upload', $config);

        // Tangani multiple uploads
        $files = $_FILES['imageInput'];

        // Tentukan variabel untuk menyimpan nama-nama file yang berhasil diupload
        $uploaded_files = array();

        // Loop melalui setiap file
        foreach ($files['name'] as $key => $name) {
            $directory = FCPATH . 'public/template/upload/barang/';
            if (file_exists($directory . $name)) {
                continue;
            }

            $_FILES['userfile']['name']     = $name;
            $_FILES['userfile']['type']     = $files['type'][$key];
            $_FILES['userfile']['tmp_name'] = $files['tmp_name'][$key];
            $_FILES['userfile']['error']    = $files['error'][$key];
            $_FILES['userfile']['size']     = $files['size'][$key];

            // Coba upload file
            if ($this->upload->do_upload('userfile')) {
                // Jika berhasil, tambahkan nama file ke dalam array
                $uploaded_files[] = $name; // Menggunakan nama asli file
            } else {
                // Jika gagal, tangkap pesan error (opsional)
                $error = $this->upload->display_errors();
                // Handle error sesuai kebutuhan
            }
        }

        redirect('product/import');
    }

    public function import()
    {
        $this->load->view('level/admin/product_import');
    }

    public function json()
    {
        $nama_barang_filter = $this->input->post('nama');
        $nama_kategori_filter = $this->input->post('kategori');

        $columns = 'id_brg, nama_barang, barcode, tb_kategori.id_kategori_brg, nama_kategori_brg, nama_satuan, hpp_barang, markup_barang, harga_jual_barang, stock_brg, gambar_barang';
        $filter = array('nama_barang', 'barcode');
        $joins = array(
            array(
                'table' => 'tb_kategori',
                'condition' => 'tb_kategori.id_kategori_brg = tb_barang.id_kategori_brg',
                'type' => 'left'
            ),
            array(
                'table' => 'tb_satuan',
                'condition' => 'tb_satuan.id_satuan = tb_barang.id_satuan',
                'type' => 'left'
            )
        );

        $where = null;
        if ($nama_barang_filter || $nama_kategori_filter) {
            $where = "1"; // Menginisialisasi dengan 1 sehingga operasi AND berfungsi

            if ($nama_kategori_filter) {
                $where .= " AND tb_kategori.id_kategori_brg = '" . $nama_kategori_filter . "'";
            }

            if ($nama_barang_filter) {
                $where .= " AND (nama_barang LIKE '%" . $nama_barang_filter . "%' OR barcode LIKE '%" . $nama_barang_filter . "%')";
            }
        }

        $list = $this->Datatable_model->get_data('tb_barang', $columns, $joins, $filter, $this->input->post('search')['value'], $where, $this->input->post('start'), $this->input->post('length'));

        $data = array();
        $no = $_POST['start'];
        foreach ($list->result() as $barang) {
            $gambar = $barang->gambar_barang == "https://dodolan.jogjakota.go.id/assets/media/default/default-product.png" ? "<img style='width: auto;border-radius: 3px;height: 45px;' src='" . $barang->gambar_barang . "'>" : "<img style='width: auto;border-radius: 3px;height: 45px;' src='" . base_url('public/template/upload/barang/' . $barang->gambar_barang) . "'>";
            $no++;
            $row = array(
                $no,
                $gambar,
                $barang->nama_barang . "<br><span class='text-muted text-nowrap'>Barcode: " . $barang->barcode . "</span>",
                $barang->nama_kategori_brg,
                20,
                "Rp. " . number_format($barang->harga_jual_barang),
                $barang->stock_brg . " " . $barang->nama_satuan,
                '
                <div class="rating">
                    <div class="star">
                        <i class="fa-sharp fa-solid fa-star starred"></i>
                        <i class="fa-sharp fa-solid fa-star starred"></i>
                        <i class="fa-sharp fa-solid fa-star starred"></i>
                        <i class="fa-sharp fa-solid fa-star starred"></i>
                        <i class="fa-sharp fa-solid fa-star"></i>
                    </div>
                    <div class="rating-amount">(42)</div>
                </div>
                ',
                '<div class="btn-group">
					<button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						Action
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="javascript:void(0);" data-id="' . $barang->id_brg . '" onclick="detailProduk(this);">&nbsp;Lihat Produk</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);" data-id="' . $barang->id_brg . '" onclick="ubahProduk(this);">&nbsp;Edit Produk</a></li>
                        <li><a class="dropdown-item" href="' . base_url('product/manajemen_stock/' . $barang->id_brg) . '" onclick="ubahKasir(this);">&nbsp;Stock Terintegrasi</a></li>
						<li><a class="dropdown-item text-danger" data-id="' . $barang->id_brg . '" href="javascript:void(0);" onclick="deleteKasir(this);">&nbsp;Hapus Produk</a></li>
					</ul>
				</div>',
            );
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Datatable_model->count_all('tb_barang'),
            "recordsFiltered" => $this->Datatable_model->count_filtered('tb_barang', $columns, $joins, $filter, $this->input->post('search')['value'], $where), // Menggunakan filter
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function detail($id)
    {
        $data['barang'] = $this->M_Crud->all_data('tb_barang')->join('tb_kategori', 'tb_kategori.id_kategori_brg = tb_barang.id_kategori_brg')->join('tb_supplier', 'tb_supplier.id_supplier = tb_barang.id_supplier', 'left')->join('tb_satuan', 'tb_satuan.id_satuan = tb_barang.id_satuan', 'left')->where('tb_barang.id_brg', $id)->get()->row_array();
        $this->load->view('level/admin/product_detail', $data);
    }

    public function manajemen_stock($id)
    {
        $this->load->view('level/admin/product_stock_manajemen');
    }

    public function tambah()
    {
        $data['kategori'] = $this->M_Crud->tampil_data('tb_kategori')->result_array();
        $data['satuan'] = $this->M_Crud->tampil_data('tb_satuan')->result_array();
        $data['supplier'] = $this->M_Crud->tampil_data('tb_supplier')->result_array();
        $this->load->view('level/admin/product_tambah', $data);
    }

    public function pemesanan()
    {
        $data['supplier'] = $this->M_Crud->all_data('tb_supplier')->order_by('nama_supplier', 'asc')->get()->result_array();
        $this->load->view('level/admin/product_pemesanan', $data);
    }

    public function tambah_pemesanan()
    {
        $data['supplier'] = $this->M_Crud->tampil_data('tb_supplier')->result_array();
        $this->load->view('level/admin/product_pemesanan_add', $data);
    }

    public function get_barang()
    {
        if (!empty($this->input->post("q"))) {
            $keyword = $this->input->post('q');
        } else {
            $keyword = "";
        }

        $data = $this->M_Crud->all_data('tb_barang')->like('nama_barang', $keyword)->or_like('barcode', $keyword)->get()->result_array();
        echo json_encode($data);
    }

    public function input_temp()
    {
        $id = $this->input->post('id');
        try {
            $check = $this->M_Crud->all_data('tb_pemesanan_temp')->where('id_brg', $id)->count_all_results();
            $barang = $this->M_Crud->show('tb_barang', ['id_brg' => $id])->row_array();

            if ($check >= 1) {
                $response = array(
                    'success' => false,
                    'msg' => "Barang Sudah discan",
                );
            } else {
                $result = $this->M_Crud->input_data([
                    'id_brg' => $id,
                    'harga_beli' => $barang['harga_jual_barang'],
                    'jumlah' => 1,
                    'id_user' => $this->session->userdata('id_user')
                ], 'tb_pemesanan_temp');
                $response = array(
                    'success' => true,
                    'msg' => "Scan Berhasil",
                );
            }
        } catch (Exception $e) {
            $response = array(
                'success' => false,
                'msg' => "Gagal",
            );
        }

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;
    }

    public function json_temp()
    {
        $columns = 'tb_pemesanan_temp.id_brg, nama_barang, harga_beli, jumlah, id_pemesanan_temp, barcode, gambar_barang, stock_brg, harga_jual_barang';
        $filter = array('nama_barang');
        $joins = array(
            array(
                'table' => 'tb_barang',
                'condition' => 'tb_barang.id_brg = tb_pemesanan_temp.id_brg',
                'type' => 'inner'
            ),
        );

        $where = null;

        $list = $this->Datatable_model->get_data('tb_pemesanan_temp', $columns, $joins, $filter, $this->input->post('search')['value'], $where);

        $data = array();
        $no = $_POST['start'];
        foreach ($list->result() as $temp) {
            $gambar = $temp->gambar_barang == "https://dodolan.jogjakota.go.id/assets/media/default/default-product.png" ? "<img style='width: auto;border-radius: 3px;height: 45px;' src='" . $temp->gambar_barang . "'>" : "<img style='width: auto;border-radius: 3px;height: 45px;' src='" . base_url('public/template/upload/barang/' . $temp->gambar_barang) . "'>";
            $no++;
            $row = array(
                $temp->id_pemesanan_temp,
                $gambar,
                $temp->nama_barang . "<br><i>" . $temp->barcode . "</i>",
                $temp->stock_brg,
                $temp->harga_beli,
                $temp->jumlah,
                "Rp. " . number_format($temp->harga_beli * $temp->jumlah),
                "
                <a href=\"javascript:void(0);\" onclick=\"hapusData($temp->id_pemesanan_temp);\">
                    <i class=\"fa fa-times text-danger\"></i>
                </a>
                ",
            );
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Datatable_model->count_all('tb_pemesanan_temp'),
            "recordsFiltered" => $this->Datatable_model->count_filtered('tb_pemesanan_temp', $columns, $joins, $filter, $this->input->post('search')['value'], $where), // Menggunakan filter
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function json_pemesanan()
    {
        $nama_supplier_filter = $this->input->post('nama_supplier');
        $status_pemesanan_filter = $this->input->post('status_pemesanan');
        $status_pembayaran_filter = $this->input->post('status_pembayaran');

        $columns = 'id_pemesanan, tgl_pesan, status_pemesanan, status_pembayaran, tgl_diterima, created_by, tb_pemesanan.id_supplier, nama_supplier';
        $filter = array('status_pemesanan'); // Sesuaikan dengan nama kolom yang ingin Anda filter
        $joins = array(
            array(
                'table' => 'tb_supplier',
                'condition' => 'tb_supplier.id_supplier = tb_pemesanan.id_supplier',
                'type' => 'inner'
            ),
        );

        $where = null;


        if ($nama_supplier_filter || $status_pemesanan_filter || $status_pembayaran_filter) {
            $where = "1"; // Menginisialisasi dengan 1 sehingga operasi AND berfungsi

            if ($nama_supplier_filter) {
                $where .= " AND tb_pemesanan.id_supplier LIKE '%" . $nama_supplier_filter . "%'";
            }

            if ($status_pemesanan_filter) {
                $where .= " AND status_pemesanan = '" . $status_pemesanan_filter . "'";
            }

            if ($status_pembayaran_filter) {
                $where .= " AND status_pembayaran = '" . $status_pembayaran_filter . "'";
            }
        }

        $list = $this->Datatable_model->get_data('tb_pemesanan', $columns, $joins, $filter, $this->input->post('search')['value'], $where, $this->input->post('start'), $this->input->post('length'));

        $data = array();
        $no = $_POST['start'];
        foreach ($list->result() as $pemesanan) {
            $cek_jumlah = $this->db->select('*')->from('tb_pemesanan_detail')->where('id_pemesanan', $pemesanan->id_pemesanan)->get()->num_rows();
            $no++;
            $row = array(
                $no,
                $pemesanan->status_pemesanan == "Open" ? "<span class=\"badge bg-danger me-1\"></span> <span class='text-danger'>Open</span>" : "<span class=\"badge bg-success me-1\"></span> <span class='text-success'>Received</span>",
                date('d-m-Y H:i:s', strtotime($pemesanan->tgl_pesan)),
                // is_null($pemesanan->tgl_diterima) ? "0000-00-00 00:00:00" : ,
                date('d-m-Y H:i:s', strtotime($pemesanan->tgl_diterima)) == "30-11--0001 00:00:00" ? "-" : date('d-m-Y H:i:s', strtotime($pemesanan->tgl_diterima)),
                $pemesanan->nama_supplier,
                $cek_jumlah,
                $pemesanan->status_pembayaran == "Belum Lunas" ? "<span class=\"badge bg-danger me-1\"></span> <span class='text-danger'>Belum Lunas</span>" : "<span class=\"badge bg-success me-1\"></span> <span class='text-success'>Lunas</span>",
                '<div class="btn-group">
					<button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						Action
					</button>
					<ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:void(0);" data-id="' . $pemesanan->id_pemesanan . '" onclick="lihatKategori(this);">&nbsp;Lihat Pemesanan</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);" data-id="' . $pemesanan->id_pemesanan . '" data-status="' . $pemesanan->status_pemesanan . '" data-pembayaran="' . $pemesanan->status_pembayaran . '" onclick="ubahStatus(this);">&nbsp;Ubah Status</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);" data-id="' . $pemesanan->id_pemesanan . '" onclick="lihatKategori(this);">&nbsp;Cetak Pemesanan</a></li>
						<li><a class="dropdown-item text-danger" data-id="' . $pemesanan->id_pemesanan . '" href="javascript:void(0);" onclick="deleteKategori(this);">&nbsp;Hapus Pemesanan</a></li>
					</ul>
				</div>',
            );
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Datatable_model->count_all('tb_pemesanan'),
            "recordsFiltered" => $this->Datatable_model->count_filtered('tb_pemesanan', $columns, $joins, $filter, $this->input->post('search')['value'], $where), // Menggunakan filter
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function ubah_pemesanan()
    {
        try {
            $id = $this->input->post('id_pemesanan');
            $status = $this->input->post('status');
            $pembayaran = $this->input->post('pembayaran');

            $data = array(
                'status_pemesanan' => $status,
                'status_pembayaran' => $pembayaran,
            );

            $result = $this->M_Crud->update_data(['id_pemesanan' => $id], $data, 'tb_pemesanan');

            echo json_encode(
                array(
                    'status' => 'success',
                    'message' => 'Data berhasil diubah.'
                )
            );
        } catch (Exception $e) {
            echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
        }
    }

    public function update_temp()
    {
        $id = $this->input->post('id');
        $jumlah = $this->input->post('jumlah');
        $this->M_Crud->update_data(['id_pemesanan_temp' => $id], [
            'jumlah' => $jumlah
        ], 'tb_pemesanan_temp');
        $response = array(
            'status' => 'success',
            'message' => 'Jumlah Pembelian berhasil diperbarui'
        );
        echo json_encode($response);
    }

    public function update_temp2()
    {
        $id = $this->input->post('id_pemesanan');
        $harga = $this->input->post('harga_beli');
        $this->M_Crud->update_data(['id_pemesanan_temp' => $id], [
            'harga_beli' => $harga
        ], 'tb_pemesanan_temp');
        $response = array(
            'status' => 'success',
            'message' => 'Harga Pembelian berhasil diperbarui'
        );
        echo json_encode($response);
    }

    public function delete_temp($id)
    {
        $this->M_Crud->hapus_data(['id_pemesanan_temp' => $id], 'tb_pemesanan_temp');
        return true;
    }

    public function delete_all_temp()
    {
        $this->db->truncate('tb_pemesanan_temp');
        return true;
    }

    public function simpan_pemesanan()
    {
        // Menerima data dari permintaan Ajax
        $supplier = $this->input->post('supplier');
        $pembayaran = $this->input->post('pembayaran');
        $status = $this->input->post('status');
        $tgl_terima = $this->input->post('tgl_terima');
        $user = $this->session->userdata('id_user');

        // Simpan data ke database
        $data = array(
            'id_supplier' => $supplier,
            'tgl_pesan' => date('Y-m-d H:i:s'),
            'status_pemesanan' => $status,
            'tgl_diterima' => $tgl_terima == "" ? "" : $tgl_terima,
            'created_by' => $user
        );

        $cek = $this->M_Crud->count('tb_pemesanan_temp');

        if ($cek < 1) {
            $response = array(
                'success' => false,
                'msg' => "Anda harus membeli minimal 1 product"
            );
        } else {
            try {
                $this->M_Crud->input_data($data, 'tb_pemesanan');
                $id_pemesanan = $this->db->insert_id();

                $temp = $this->M_Crud->tampil_data('tb_pemesanan_temp')->result_array();

                foreach ($temp as $key => $value) {
                    $temp_data = [
                        'id_pemesanan' => $id_pemesanan,
                        'id_brg' => $value['id_brg'],
                        'harga_pesan' => $value['harga_beli'],
                        'jumlah_pesan' => $value['jumlah']
                    ];
                    $this->M_Crud->input_data($temp_data, 'tb_pemesanan_detail');
                    $this->M_Crud->hapus_data(['id_pemesanan_temp' => $value['id_pemesanan_temp']], 'tb_pemesanan_temp');

                    if ($status == "Received") {
                        $stock = $this->M_Crud->show('tb_barang', ['id_brg' => $value['id_brg']])->row_array();
                        $this->M_Crud->update_data(['id_brg' => $value['id_brg']], ['stock_brg' => $stock['stock_brg'] + $value['jumlah']], 'tb_barang');
                    }
                }

                $response = array(
                    'success' => true,
                    'msg' => "Pemesanan Barang berhasil dilakukan"
                );
            } catch (Exception $e) {
                $response = array(
                    'success' => false,
                    'msg' => "Terjadi kesalahan: " . $e->getMessage()
                );
            }
        }

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;
    }

    public function hitungTotal()
    {
        $id = $this->session->userdata('id_user');

        // Query SQL untuk menghitung total harga
        $sql = "SELECT SUM(tb_pemesanan_temp.harga_beli * tb_pemesanan_temp.jumlah) as total_harga
            FROM tb_pemesanan_temp WHERE tb_pemesanan_temp.id_user = $id";

        // Eksekusi query
        $query = $this->db->query($sql);

        // Mendapatkan hasil query
        $result = $query->row();

        // Mendapatkan total
        $totalHarga = $result->total_harga;

        // Mengirimkan total ke tampilan
        echo json_encode(array(
            'total' => number_format($totalHarga),
        ));
    }
}
