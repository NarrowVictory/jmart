<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('auth');
		$this->load->model('M_Crud');
		$this->load->library('session');
		$this->auth->cek_login();
	}

	public function index()
	{
		if ($this->session->userdata('level') == "User") {
			$data['barang'] = $this->M_Crud->all_data('tb_barang')->join('tb_kategori', 'tb_kategori.id_kategori_brg = tb_barang.id_kategori_brg')->where('promo_brg', 'On')->get()->result_array();
			$data['kategori'] = $this->M_Crud->all_data('tb_kategori')->limit(5)->get()->result_array();
			$data['kategori1'] = $this->M_Crud->all_data('tb_kategori')->get()->result_array();
			$data['krisan'] = $this->db->select('tb_krisan.created_at, tb_krisan.id_user, kritik_saran, nama_member')->from('tb_krisan')->join('tb_user', 'tb_user.id_user = tb_krisan.id_user')->order_by('tb_krisan.created_at', 'desc')->limit(5)->get()->result_array();

			$user = $this->session->userdata('id_user');
			$data['count_keranjang'] = $this->M_Crud->all_data('tb_keranjang')->where('id_user', $user)->count_all_results();

			$keyword = $this->input->get('cari');

			if (!empty($keyword)) {
				$data2['barang_filter'] = $this->M_Crud->all_data('tb_barang')->join('tb_kategori', 'tb_kategori.id_kategori_brg = tb_barang.id_kategori_brg', 'left')->like('nama_barang', $keyword)->get()->result_array();
				$this->load->view('level/user/index_pencarian', $data2);
			} else {
				$this->load->view('level/user/index', $data);
			}
		} else if ($this->session->userdata('level') == "Administrator") {
			$data['total_transaksi'] = $this->M_Crud->all_data('tb_pesanan')->where('status_pesanan', 'Selesai')->where('DATE(tgl_pesanan)', date('Y-m-d'))->get()->num_rows();
			$data['ttl_harga'] = $this->db->select_sum('grand_total')->from('tb_pesanan')->where('status_pesanan', 'Selesai')->where('DATE(tgl_pesanan)', date('Y-m-d'))->get()->row()->grand_total;
			$data['total_harga_kemarin'] = $this->db->select_sum('grand_total')->from('tb_pesanan')->where('status_pesanan', 'Selesai')->where('DATE(tgl_pesanan)', date('Y-m-d', strtotime('-1 day')))->get()->row()->grand_total;
			$data['total_barang'] = $this->M_Crud->count('tb_barang');

			// MENDAPATKAN TANGGAL 7 HARI TERAKHIR
			$tanggal_7_hari_lalu = date('Y-m-d', strtotime('-7 days'));

			$this->db
				->select('tgl_pesanan, SUM(grand_total) as total_harga')
				->from('tb_pesanan')
				// ->where('status_pesanan', 'Selesai')
				// ->where('tgl_pesanan >=', $tanggal_7_hari_lalu)
				// ->where('tgl_pesanan <=', date('Y-m-d'))
				->group_by('DATE(tgl_pesanan)')
				->order_by('tgl_pesanan', 'ASC');

			$query = $this->db->get();
			$result = $query->result_array();

			// Menginisialisasi array untuk label tanggal dan data total harga
			$labels = array();
			$data_total_harga = array();
			$jumlah = array();

			$p_jumlah = 0;
			$p_total = 0;

			// Mengisi array label dan data total harga
			foreach ($result as $row) {
				$labels[] = date('d-m-Y', strtotime($row['tgl_pesanan']));
				$data_total_harga[] = $row['total_harga'];
				$temp = $this->db->select('*')->from('tb_pesanan')->where("DATE(tgl_pesanan) = '" . date('Y-m-d', strtotime($row['tgl_pesanan'])) . "'")->get()->num_rows();
				$jumlah[] = $temp;

				$p_total = $p_total + $row['total_harga'];
				$p_jumlah = $p_jumlah + $temp;
			}

			// Mengirim data ke tampilan
			$data['labels'] = json_encode($labels);
			$data['total_harga'] = json_encode($data_total_harga);
			$data['jumlah_transaksi'] = json_encode($jumlah);

			$data['total'] = $p_total;
			$data['jumlah'] = $p_jumlah;

			// MENDAPATKAN PRODUK TERLARIS
			$this->db->select('tb_pesanan_detail.id_brg, 
                    COUNT(tb_pesanan_detail.id_brg) as jumlah_penjualan, 
                    SUM(tb_pesanan_detail.jumlah_jual) as total_terjual, 
                    tb_barang.nama_barang, 
                    tb_barang.gambar_barang, 
                    tb_satuan.nama_satuan');
			$this->db->from('tb_pesanan_detail');
			$this->db->join('tb_barang', 'tb_pesanan_detail.id_brg = tb_barang.id_brg', 'left');
			$this->db->join('tb_satuan', 'tb_barang.id_satuan = tb_satuan.id_satuan', 'left');
			$this->db->group_by('tb_pesanan_detail.id_brg');
			$this->db->order_by('total_terjual', 'DESC');
			$this->db->limit(5);

			$pl = $this->db->get();
			$data['produk_terlaris'] = $pl->result_array();

			$this->load->view('level/admin/index', $data);
		} else if ($this->session->userdata('level') == "Super Administrator") {
			$data['barang'] = $this->M_Crud->all_data('tb_barang')->where('promo_brg', 'On')->get()->result_array();
			$data['kategori'] = $this->M_Crud->all_data('tb_kategori')->get()->result_array();
			$this->load->view('level/user/index', $data);
		} else if ($this->session->userdata('level') == "Kurir") {
			$current_date = date('Y-m-d');
			for ($i = 0; $i < 7; $i++) { // Ubah batasan loop menjadi 7
				$last_7_dates[] = date('d/M', strtotime("-$i days", strtotime($current_date)));
			}
			$data['last_7_dates'] = json_encode(array_reverse($last_7_dates));

			$total_sum_per_date = array();
			$total_keseluruhan = 0;
			// Loop untuk menghitung total sum per tanggal dalam rentang 7 hari terakhir
			for ($i = 0; $i < 7; $i++) {
				// Menghitung tanggal berdasarkan hari dalam rentang 7 hari terakhir
				$date_to_check = date('Y-m-d', strtotime("-$i days", strtotime($current_date)));

				// Query untuk mengambil total sum per tanggal
				$this->db->select_sum('total_bayar');
				$this->db->from('tb_pesanan');
				$this->db->where('jenis_order', 'dianterin');
				$this->db->where('status_pesanan', 'selesai');
				$this->db->where('metode_bayar', 'cash');
				$this->db->where('tgl_pesanan', $date_to_check);
				$query = $this->db->get();

				// Mendapatkan hasil query
				$result = $query->row();
				$total_keseluruhan += $result->total_bayar;

				// Menyimpan total sum ke dalam array
				$total_sum_per_date[$date_to_check] = $result->total_bayar;
			}
			$data['json_total_sum_per_date'] = json_encode($total_sum_per_date);
			$data['total_7days'] = $total_keseluruhan;
			$data['pending'] = $this->db->select('COUNT(*) as total_data')->from('tb_pesanan')->where('status_pesanan', 'pending')->where('jenis_order', 'dianterin')->get()->row_array();
			$data['success'] = $this->db->select('COUNT(*) as total_data')->from('tb_pesanan')->where('status_pesanan', 'selesai')->where('jenis_order', 'dianterin')->get()->row_array();
			$data['misi'] = $this->db->select('COUNT(*) as total_data')->from('tb_pesanan')->where('status_pesanan', 'Dikirim')->where('jenis_order', 'dianterin')->get()->row_array();
			$data['setoran'] = $this->db->select('SUM(total_bayar) as total_pembayaran')->from('tb_pesanan')->where('metode_bayar', 'cash')->where('status_pesanan', 'selesai')->where('jenis_order', 'dianterin')->get()->row_array();

			// Mendapatkan hasil query
			$result = $query->row();
			$this->load->view('level/kurir/index', $data);
		} else {
			$this->load->view('level/kasir/index');
		}
	}

	public function load_more_data()
	{
		$page = $this->input->get('page');
		$keyword = $this->input->get('cari');

		$barang = $this->M_Crud->all_data('tb_barang')
			->join('tb_kategori', 'tb_kategori.id_kategori_brg = tb_barang.id_kategori_brg', 'left')
			->like('nama_barang', $keyword)
			->limit(10, ($page - 1) * 10) // Sesuaikan dengan jumlah data yang akan dimuat per halaman
			->get()
			->result_array();

		$output = '<div class="item-list table"><ul class="mb-3">';
		foreach ($barang as $key => $value) {
			$output .= '
                 <li class="bg-white">
                 <div class="item-content">
                     <div class="item-inner">
                         <div class="item-title-row">
                             <h6 style="font-size: 1rem;" class="item-title"><a href="'.base_url('home/barang/'.$value['id_brg']).'">' . $value['nama_barang'] . '</a></h6>
                             <div class="item-subtitle">' . $value['nama_kategori_brg'] . '</div>
                         </div>
                         <div class="item-footer">
                             <div class="d-flex align-items-center">
                                 <h6 class="me-3">Rp. ' . number_format($value['harga_jual_barang']) . '</h6>
                                 <del class="off-text">
                                     <h5>Normal</h5>
                                 </del>
                             </div>
                             <div class="d-flex align-items-center">
                                 <i class="fa fa-star"></i>
                                 <h6>4.5</h6>
                             </div>
                         </div>
                     </div>
                     <div class="item-media media media-90">
                         <img src="' . $value['gambar_barang'] . '" alt="logo">
                         <a style="background-color: #DFE8E3;border-radius: 100%;width: 45px;height: 45px;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-pack: center;-ms-flex-pack: center;justify-content: center;-webkit-box-align: center;-ms-flex-align: center;align-items: center;" href="javascript:void(0);" class="item-bookmark icon-2" onclick="showAlert(\''.$value['id_brg'].'\')">
						    <i class="fa fa-shopping-cart fw-bold text-danger"></i>
						</a>
                     </div>
                 </div>
             </li>
            ';
		}

		if (empty($barang)) {
			exit;
			echo "<div class=\"empty\">
                 <div class=\"empty-header\">404</div>
                 <p class=\"empty-title\">Oops… Barang Tidak Ditemukan</p>
                 <p class=\"empty-subtitle text-secondary\">
                     We are sorry but the page you are looking for was not found
                 </p>
             </div>";
		}

		$output .= '</ul></div>';

		echo $output;
	}

	public function barang($id)
	{
		$user = $this->session->userdata('id_user');
		$data['barang'] = $this->M_Crud->all_data('tb_barang')->join('tb_kategori', 'tb_kategori.id_kategori_brg = tb_barang.id_kategori_brg')->where('id_brg', $id)->get()->row_array();
		$data['keranjang'] = $this->M_Crud->all_data('tb_keranjang')->where('id_brg', $id)->where('id_user', $user)->get()->row_array();

		$this->load->view('level/user/index_single_product', $data);
	}

	public function kategori($id)
	{
		$cek = $this->M_Crud->show('tb_kategori', ['id_kategori_brg' => $id])->row_array();
		$data['barang'] = $this->M_Crud->all_data('tb_barang')->join('tb_kategori', 'tb_kategori.id_kategori_brg = tb_barang.id_kategori_brg')->where('tb_barang.id_kategori_brg', $id)->get()->result_array();
		$data['header'] = $cek['nama_kategori_brg'];
		$this->load->view('level/user/index_kategori', $data);
	}

	public function alamat()
	{
		$data['header'] = "Pilih Alamat";
		$this->load->view('layouts/user/header');
		$this->load->view('level/user/index_alamat', $data);
		$this->load->view('layouts/user/footer');
	}

	public function tambah_alamat()
	{
		$data['header'] = "Alamat Baru";
		$this->load->view('layouts/user/header');
		$this->load->view('level/user/index_alamat_tambah', $data);
		$this->load->view('layouts/user/footer');
	}

	public function saran()
	{
		$data['header'] = "Kritik dan Saran";
		$data['user'] = $this->M_Crud->show('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['saran'] = $this->M_Crud->all_data('tb_krisan')->join('tb_user', 'tb_user.id_user = tb_krisan.id_user')->where('tb_krisan.id_user', $this->session->userdata('id_user'))->get()->result_array();
		$this->load->view('level/user/index_saran', $data);
	}

	public function plus_saran()
	{
		$data = array(
			'id_user' => $this->input->post('id_user'),
			'perihal' => $this->input->post('perihal'),
			'kritik_saran' => $this->input->post('kritik_saran'),
			'created_at' => date('Y-m-d H:i:s')
		);

		$this->M_Crud->input_data($data, 'tb_krisan');

		$message = "Kritik dan Saran dari : " . $this->input->post('wa_member') . "\n";
		$message .= "Waktu : " .  date('Y-m-d H:i:s') . "\n";
		$message .= "Perihal : " . $this->input->post('perihal') . "\n\n";

		$message .= "Isi Kritik saran:\n";
		$message .= $this->input->post('kritik_saran');

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.fonnte.com/send",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => array(
				'target' => "6285277961769",
				'message' => $message,
				'url' => "https://asset-a.grid.id/crop/0x0:0x0/945x630/photo/2018/06/07/3026687346.png",
				'filename' => "filename",
			),
			CURLOPT_HTTPHEADER => array(
				'Authorization: #7VISHMuycE3qmEw8UMW'
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			echo $response;
		}

		$this->session->set_flashdata('success_message', 'Kritik dan Saran Berhasil Ditambahkan!');
		redirect('home/saran');
	}

	public function plus_saran2()
	{
		$data = array(
			'id_user' => $this->input->post('id_user'),
			'perihal' => $this->input->post('perihal'),
			'kritik_saran' => $this->input->post('kritik_saran'),
			'created_at' => date('Y-m-d H:i:s')
		);

		$this->M_Crud->input_data($data, 'tb_krisan');

		$message = "Kritik dan Saran dari : " . $this->input->post('wa_member') . "\n";
		$message .= "Waktu : " .  date('Y-m-d H:i:s') . "\n";
		$message .= "Perihal : " . $this->input->post('perihal') . "\n\n";

		$message .= "Isi Kritik saran:\n";
		$message .= $this->input->post('kritik_saran');

		$nomorTujuan = "628881456200"; // Ganti dengan nomor WhatsApp tujuan
		$pesanWhatsApp = urlencode("$message");
		echo "<script>
            window.open('https://wa.me/$nomorTujuan/?text=$pesanWhatsApp', '_blank');
            window.location.href = '" . base_url('home/saran') . "'; // Ganti dengan base_url Anda
          </script>";
		exit();
	}
}
