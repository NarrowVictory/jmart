<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->load->library('session');
        $this->load->model('M_Crud');
        $this->load->model('M_Datatable');
        $this->load->model('M_Autocomplete');
        $this->auth->cek_login();
    }

    public function load_barang()
    {
        $output = '';
        $keyword = $this->input->post('query');
        $page = $this->input->post('page') ? $this->input->post('page') : 1;
        $limit = 8;
        $limit_start = ($page - 1) * $limit;

        if ($keyword) {
            $total_records = $this->M_Crud->all_data('tb_barang')
                ->like('nama_barang', $keyword)
                ->or_like('barcode', $keyword)
                ->count_all_results();
            $barang = $this->M_Crud->all_data('tb_barang')
                ->join('tb_satuan', 'tb_satuan.id_satuan = tb_barang.id_satuan', 'left')
                ->like('nama_barang', $keyword)
                ->or_like('barcode', $keyword)
                ->limit($limit, $limit_start)
                ->order_by('id_brg', 'ASC')
                ->get()
                ->result_array();
        } else {
            $total_records = $this->M_Crud->all_data('tb_barang')->count_all_results();
            $barang = $this->M_Crud->all_data('tb_barang')
                ->join('tb_satuan', 'tb_satuan.id_satuan = tb_barang.id_satuan', 'left')
                ->limit($limit, $limit_start)
                ->get()
                ->result_array();
        }

        $output = '<div class="row">';
        foreach ($barang as $key => $value) {
            $gambar = $value['gambar_barang'] == "https://dodolan.jogjakota.go.id/assets/media/default/default-product.png" ? "<img style='\border-radius: 3px;' src='" . $value['gambar_barang'] . "'>" : "<img style='\border-radius: 3px;' src='" . base_url('public/template/upload/barang/' . $value['gambar_barang']) . "'>";
            $output .= '
                <div class="col-3 d-flex" onclick="simpanData(\'' . $value['id_brg'] . '\')">
                    <div class="card w-100 mb-2" style="border: 1px solid #ccc; border-radius: 8px; padding: 10px; overflow: hidden; border-radius:0px !important; cursor:pointer">
                        <div class="justify-content-end text-end">
                            ' . $gambar . '
                        </div>
                        <div class="label">' . $value['stock_brg'] . '</div>
                        <div class="nama-barang" style="margin-top: 5px;font-size:15px;">' . $value['nama_barang'] . '</div>
                        <div class="harga-barang">Rp. ' . number_format($value['harga_jual_barang']) . '</div>
                    </div>
                </div>
            ';
        }
        if (count($barang) < 1) {
            echo "<p>" . "Barang Tidak Ditemukan" . "</p>";
        }

        $output .= '</div>';


        $jumlah_page = ceil($total_records / $limit);
        $jumlah_number = 1;
        $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1;
        $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page;

        $output .= '<nav class="mb-5"><ul class="pagination justify-content-end">';

        if ($page == 1) {
            $output .= '<li class="page-item disabled"><a class="page-link" href="javascript::void">First</a></li>';
            $output .= '<li class="page-item disabled"><a class="page-link" href="javascript::void"><span aria-hidden="true">&laquo;</span></a></li>';
        }

        for ($i = $start_number; $i <= $end_number; $i++) {
            $link_active = ($page == $i) ? ' active' : '';
            $output .= '<li class="page-item halaman ' . $link_active . '" id="' . $i . '"><a class="page-link" href="javascript::void">' . $i . '</a></li>';
        }

        if ($page == $jumlah_page) {
            $output .= '<li class="page-item disabled"><a class="page-link" href="javascript::void"><span aria-hidden="true">&raquo;</span></a></li>';
            $output .= '<li class="page-item disabled"><a class="page-link" href="javascript::void">Last</a></li>';
        } else {
            $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
            $output .= '<li class="page-item halaman" id="' . $link_next . '"><a class="page-link" href="javascript::void"><span aria-hidden="true">&raquo;</span></a></li>';
            $output .= '<li class="page-item halaman" id="' . $jumlah_page . '"><a class="page-link" href="javascript::void">Last</a></li>';
        }

        $output .= '</ul></nav>';
        echo $output;
    }

    public function hitungTotal()
    {
        $id = $this->session->userdata('id_user');

        // Query SQL untuk menghitung total_harga
        $sql = "SELECT SUM(tb_barang.harga_jual_barang * tb_keranjang.jumlah) as total_harga
            FROM tb_keranjang
            JOIN tb_barang ON tb_barang.id_brg = tb_keranjang.id_brg WHERE tb_keranjang.id_user = $id";

        $total_item = $this->db->select('COUNT(*) as total_item')
            ->from('tb_keranjang')
            ->join('tb_barang', 'tb_barang.id_brg = tb_keranjang.id_brg')
            ->where('tb_keranjang.id_user', $id)
            ->get()
            ->row()
            ->total_item;

        // Eksekusi query
        $query = $this->db->query($sql);

        // Mendapatkan hasil query
        $result = $query->row();

        // Mendapatkan total
        $totalHarga = $result->total_harga;

        // Mengirimkan total ke tampilan
        echo json_encode(array(
            'total' => number_format($totalHarga),
            'item' => $total_item
        ));
    }

    public function simpanData()
    {
        // Mendapatkan data dari permintaan AJAX
        $id = $this->session->userdata('id_user');
        $id_pesanan = rand(10000, 10000000);
        $id_user = $this->input->post('id');
        $id_kasir = $this->input->post('kasir');
        $tgl = $this->input->post('tgl_pesanan');
        $jenis = $this->input->post('jenis_order');
        $status_pembayaran = $this->input->post('status_pembayaran');
        $status_pesanan = $this->input->post('status_pesanan');
        $metode = $this->input->post('metode');
        $grand_total = $this->input->post('grand_total');
        $total_bayar = $this->input->post('total_bayar');
        $kembalian = $this->input->post('kembalian');

        $data = array(
            'id_pesanan' => $id_pesanan,
            'id_user' => $id_user,
            'id_kasir' => $id_kasir,
            'tgl_pesanan' => $tgl,
            'jenis_order' => $jenis,
            'status_pembayaran' => $status_pembayaran,
            'metode_bayar' => $metode,
            'status_pesanan' => $status_pesanan,
            'diskon' => 0,
            'grand_total' => $grand_total,
            'total_bayar' => $total_bayar,
            'kembalian' => $kembalian,
        );
        $this->db->insert('tb_pesanan', $data);
        $this->db->insert('tb_pesanan_tracking', [
            'id_pesanan' => $id_pesanan,
            'status_tracking' => 'Pesanan Selesai',
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $id
        ]);

        $keranjang = $this->M_Crud->all_data('tb_keranjang')->join('tb_barang', 'tb_barang.id_brg = tb_keranjang.id_brg')->where('id_user', $id)->get()->result_array();

        foreach ($keranjang as $item) {
            $data_pesanan_detail = array(
                'id_pesanan' => $id_pesanan,
                'id_brg' => $item['id_brg'],
                'harga_saat_ini' => $item['harga_jual_barang'],
                'jumlah_jual' => $item['jumlah']
            );
            $this->M_Crud->input_data($data_pesanan_detail, 'tb_pesanan_detail');
            $this->M_Crud->hapus_data(['id_keranjang' => $item['id_keranjang']], 'tb_keranjang');

            // KURANGI STOCK
            $stock = $this->M_Crud->show('tb_barang', ['id_brg' => $item['id_brg']])->row_array();
            $this->M_Crud->update_data(['id_brg' => $item['id_brg']], ['stock_brg' => $stock['stock_brg'] - $item['jumlah']], 'tb_barang');
        }

        echo json_encode(array('pesan' => 'Data berhasil disimpan'));
    }

    public function index()
    {
        $data['anggota'] = $this->M_Crud->all_data('tb_user')->where('level', 'User')->get()->result_array();
        $data['kasir'] = $this->M_Crud->all_data('tb_kasir')->get()->result_array();
        $data['barang'] = $this->M_Crud->all_data('tb_barang')->get()->result_array();
        $this->load->view('level/admin/cashier', $data);
    }

    public function getNamaKasirById($id_kasir)
    {
        $query = $this->db->get_where('tb_kasir', array('id_kasir' => $id_kasir));
        echo $query->row()->nama_kasir;
    }

    public function searchProduct()
    {
        $searchTerm = $this->input->get('term'); // Ambil data yang diketik oleh pengguna

        $results = $this->M_Autocomplete->searchProducts($searchTerm); // Panggil model untuk mencari data
        echo json_encode($results);
    }

    public function keranjang()
    {
        $id = $this->input->post('id');
        $stok = $this->M_Crud->show('tb_barang', ['id_brg' => $id])->row_array();

        // Memeriksa apakah stok cukup untuk menambahkan ke keranjang
        if ($stok['stock_brg'] >= 1) {
            $cek = $this->M_Crud->all_data('tb_keranjang')->where('id_brg', $id)->get()->row_array();

            if (!empty($cek)) {
                if (($cek['jumlah'] + 1) > $stok['stock_brg']) {
                    $response = array('status' => 'error', 'message' => 'Stok tidak mencukupi');
                } else {
                    $result = $this->M_Crud->update_data(['id_keranjang' => $cek['id_keranjang']], ['jumlah' => $cek['jumlah'] + 1], 'tb_keranjang');

                    $response = array('status' => 'success', 'message' => 'Barang Berhasil Diupdate');
                }
            } else {
                $result = $this->M_Crud->input_data([
                    'id_brg' => $id,
                    'jumlah' => 1,
                    'id_user' => $this->session->userdata('id_user')
                ], 'tb_keranjang');

                $response = array('status' => 'success', 'message' => 'Barang Berhasil Ditambahkan');
            }
        } else {
            // Stok tidak mencukupi, kirim notifikasi ke sisi klien
            $response = array('status' => 'error', 'message' => 'Stok tidak mencukupi');
        }

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;
    }

    public function keranjang2()
    {
        $id = $this->input->post('barang');
        $ditemukan = $this->M_Crud->all_data('tb_barang')->like('barcode', $id)->or_like('nama_barang', $id)->get()->row_array();

        if (count($ditemukan) > 0) {
            $cek = $this->M_Crud->all_data('tb_keranjang')->where('id_brg', $ditemukan['id_brg'])->get()->row_array();

            if (!empty($cek)) {
                $result = $this->M_Crud->update_data(['id_keranjang' => $cek['id_keranjang']], ['jumlah' => $cek['jumlah'] + 1], 'tb_keranjang');
            } else {
                $result = $this->M_Crud->input_data(
                    [
                        'id_brg' => $ditemukan['id_brg'],
                        'jumlah' => 1,
                        'id_user' => $this->session->userdata('id_user')
                    ],
                    'tb_keranjang'
                );
            }

            if ($result) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function hapus_keranjang()
    {
        $id = $this->session->userdata('id_user');
        $this->M_Crud->all_data('tb_keranjang')->where('id_user', $id)->delete();

        // Setelah penghapusan selesai, berikan respons
        $response = array('status' => 'success', 'message' => 'Data telah dihapus.');
        echo json_encode($response);
    }

    public function json()
    {
        $draw = $this->input->post('draw');
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $search = $this->input->post('search')['value'];

        $data = $this->M_Datatable->getDataDetailBarang($length, $start, $search, 'tb_keranjang');
        $total_records = $this->M_Datatable->getTotalData('tb_keranjang');
        $total_filtered = $this->M_Datatable->getFilteredData($search, 'tb_keranjang');

        $nomor_urut = $start + 1;
        $new_data = array();
        foreach ($data as $row) {
            $row->product = '
            <div class="row">
                <div class="col-auto">
                    <span class="avatar rounded" style="cursor: pointer; background-color:#FFBF00; border:1px solid #FFBF00; color:white" id="modal_update" data-id="' . $row->id_keranjang . '">' . $row->jumlah . '</span>
                </div>
                <div class="col">
                    <div class="font-weight-medium"><b>' . $row->nama_barang . '</b></div>
                    <div class="text-secondary">Rp. ' . number_format($row->harga_jual_barang) . ' | Rp. ' . number_format($row->harga_jual_barang * $row->jumlah) . '</div>
                </div>
            </div>
            ';
            $row->action = '
                <a href="javascript:void(0);" onclick="hapusItem(' . $row->id_keranjang . ');">
                    <i class="fa fa-times"></i>
                </a>
            ';
            $new_data[] = $row;
            $nomor_urut++;
        }

        $data = $new_data;

        $response = [
            'draw' => $draw,
            'recordsTotal' => $total_records,
            'recordsFiltered' => $total_filtered,
            'data' => $data,
        ];

        echo json_encode($response);
    }

    public function hapus_list($id_keranjang)
    {
        $this->M_Crud->hapus_data(['id_keranjang' => $id_keranjang], 'tb_keranjang');

        // Kirim respons ke permintaan AJAX
        $response = array('success' => true);
        echo json_encode($response);
    }

    public function update_list($id_keranjang)
    {
        $jumlah = $this->input->post('jumlah');
        $krjg = $this->M_Crud->show('tb_keranjang', ['id_keranjang' => $id_keranjang])->row_array();
        $brg = $this->M_Crud->show('tb_barang', ['id_brg' => $krjg['id_brg']])->row_array();

        // Memeriksa apakah stok mencukupi
        if ($jumlah <= $brg['stock_brg']) {
            // Jika stok mencukupi, lakukan pembaruan
            $this->M_Crud->update_data(['id_keranjang' => $id_keranjang], ['jumlah' => $jumlah], 'tb_keranjang');

            // Kirim respons ke permintaan AJAX
            $response = array('status' => 'success', 'message' => 'Update Berhasil');
        } else {
            // Jika stok tidak mencukupi, kirim pesan kesalahan ke sisi klien
            $response = array('status' => 'error', 'message' => 'Stok tidak mencukupi');
        }

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;
    }


    public function getData()
    {
        $id = $this->input->post('id');
        $data = $this->M_Crud->all_data('tb_keranjang')->join('tb_barang', 'tb_barang.id_brg = tb_keranjang.id_brg')->where('id_keranjang', $id)->get()->row_array();

        // Mengubah data menjadi format JSON
        $json_data = json_encode($data);

        // Mengatur header respons sebagai JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output($json_data);
    }

    public function hapus_semua()
    {
    }
}
