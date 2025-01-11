<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(FCPATH . 'vendor/autoload.php');

use Duitku\Pop;

class Pesanan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('auth');
		$this->load->model('M_Crud');
		$this->load->model('M_Pagination');
		$this->auth->cek_login();
	}

	public function rating()
	{
		if ($this->input->is_ajax_request()) {
			$ratings = $this->input->post('ratings');
			$review = $this->input->post('review');

			$this->M_Crud->input_data(
				[
					'id_pesanan' => $this->input->post('id_pesanan'),
					'id_user' => $this->session->userdata('id_user'),
					'tgl_rating' => date('Y-m-d H:i:s'),
					'komentar' => $review
				],
				'tb_rating'
			);

			$last_id = $this->db->insert_id();

			foreach ($ratings as $ratingData) {
				$id_brg = $ratingData['id_brg'];
				$rating = $ratingData['rating'];

				// Proses data rating untuk setiap elemen
				// Contoh: Simpan data ke dalam database
				$data_to_insert = array(
					'id_rating' => $last_id,
					'id_brg' => $id_brg,
					'rating' => $rating
				);

				$this->M_Crud->input_data($data_to_insert, 'tb_rating_detail');
			}

			echo json_encode(array('message' => 'Data rating berhasil disimpan.'));
		} else {
			show_404();
		}
	}

	public function user()
	{
		$current_date = date('Y-m-d');
		$total_sum_per_date = array();
		for ($i = 0; $i < 7; $i++) {
			// Menghitung tanggal berdasarkan hari dalam rentang 7 hari terakhir
			$date_to_check = date('Y-m-d', strtotime("-$i days", strtotime($current_date)));

			// Query untuk mengambil total sum per tanggal
			$this->db->select('*');
			$this->db->from('tb_pesanan');
			$this->db->where('jenis_order', 'dianterin');
			$this->db->where('status_pesanan', 'selesai');
			$this->db->where('tgl_pesanan', $date_to_check);
			$query = $this->db->get();

			// Mendapatkan hasil query
			$result = $query->num_rows();

			// Menyimpan total sum ke dalam array
			$total_sum_per_date[$date_to_check] = $result;
		}
		$data['json_total_sum_per_date'] = json_encode($total_sum_per_date);
		$data['pending'] = $this->db->select('*')->from('tb_pesanan')->where('jenis_order', 'dianterin')->where('status_pesanan', 'pending')->get()->num_rows();
		$data['dikemas'] = $this->db->select('*')->from('tb_pesanan')->where('jenis_order', 'dianterin')->where('status_pesanan', 'dikemas')->get()->num_rows();
		$data['misi'] = $this->db->select('*')->from('tb_pesanan')->where('jenis_order', 'dianterin')->where('status_pesanan', 'dikirimkan')->get()->num_rows();
		$data['selesai'] = $this->db->select('*')->from('tb_pesanan')->where('jenis_order', 'dianterin')->where('status_pesanan', 'selesai')->get()->num_rows();
		$data["pesanan"] = $this->M_Crud->all_data(['tb_pesanan'])->join('tb_user', 'tb_pesanan.id_user = tb_user.id_user')->where('status_pesanan', 'selesai')->where('jenis_order', 'dianterin')->get()->result();
		$this->load->view('level/kurir/pesanan', $data);
	}

	public function index()
	{
		$id = $this->session->userdata('id_user');
		$data['count_pending'] = $this->M_Crud->all_data('tb_pesanan')->where('id_user', $id)->where('status_pesanan', 'Pending')->get()->num_rows();
		$data['count_dikemas'] = $this->M_Crud->all_data('tb_pesanan')->where('id_user', $id)->where('status_pesanan', 'Dikemas')->get()->num_rows();
		$data['count_dikirim'] = $this->M_Crud->all_data('tb_pesanan')->where('id_user', $id)->where('status_pesanan', 'Dikirim')->get()->num_rows();
		$data['count_selesai'] = $this->M_Crud->all_data('tb_pesanan')->where('id_user', $id)->where('status_pesanan', 'Selesai')->get()->num_rows();
		$data['count_autodebit'] = $this->M_Crud->all_data('tb_pesanan')->where('id_user', $id)->where('metode_bayar', 'autodebet')->get()->num_rows();
		$data['count_bulan_ini'] = $this->M_Crud->all_data('tb_pesanan')->where('id_user', $id)->where('MONTH(tgl_pesanan)', date('m'))->get()->num_rows();

		$data['rupiah_bulan_ini'] = $this->db->select_sum('grand_total', 'total_grand_total')->from('tb_pesanan')->where('MONTH(tgl_pesanan)', date('m'))->where('id_user', $id)->get()->row();
		$data['rupiah_semua'] = $this->db->select_sum('grand_total', 'total_grand_total')->from('tb_pesanan')->where('id_user', $id)->get()->row();

		$data['pesanan'] = $this->M_Crud->all_data('tb_pesanan')->where('id_user', $id)->get()->result_array();
		$autodebit = $this->db
			->select_sum('grand_total', 'total_grand_total')
			->from('tb_pesanan')
			->where('metode_bayar', 'autodebet')
			->where('status_pembayaran', 'Menunggu Pembayaran')
			->where('id_user', $id)
			->get();
		$autodebit_bulan_ini = $this->db
			->select_sum('grand_total', 'total_grand_total')
			->from('tb_pesanan')
			->where('metode_bayar', 'autodebet')
			->where('status_pembayaran', 'Menunggu Pembayaran')
			->where('id_user', $id)
			->where('tgl_pesanan >=', date('Y-m-16', strtotime('last month')))
			->where('tgl_pesanan <=', date('Y-m-15'))
			->get();

		$data['autodebit'] = $autodebit->row()->total_grand_total ?? 0;
		$data['autodebit_bulan_ini'] = ($autodebit_bulan_ini->num_rows() > 0) ? $autodebit_bulan_ini->row()->total_grand_total : 0;


		if ($this->input->get('tahun') == null) {
			$tahun = date('Y');
		} else {
			$tahun = $this->input->get('tahun');
		}

		$query = $this->db->query("SELECT MONTH(tgl_pesanan) as bulan, SUM(grand_total) as total_penjualan FROM tb_pesanan WHERE id_user = ? AND YEAR(tgl_pesanan) = ? GROUP BY MONTH(tgl_pesanan)", array($this->session->userdata('id_user'), $tahun));
		$result = $query->result();

		// Inisialisasi array untuk menyimpan data penjualan per bulan
		$data['penjualan'] = array_fill(0, 12, 0);

		// Memasukkan hasil query ke dalam array penjualan
		foreach ($result as $row) {
			$data['penjualan'][$row->bulan - 1] = $row->total_penjualan;
		}

		$this->load->view('level/user/menu_pesanan', $data);
	}

	public function pending()
	{
		$id = $this->session->userdata('id_user');
		$data['pending'] = $this->M_Crud->all_data('tb_pesanan')->where('id_user', $id)->where('status_pesanan', 'Pending')->order_by('tgl_pesanan', 'DESC')->get()->result_array();
		$this->load->view('level/user/menu_pesanan_pending', $data);
	}

	public function dikemas()
	{
		$id = $this->session->userdata('id_user');
		$data['dikemas'] = $this->M_Crud->all_data('tb_pesanan')->where('id_user', $id)->where('status_pesanan', 'Dikemas')->order_by('tgl_pesanan', 'DESC')->get()->result_array();
		$this->load->view('level/user/menu_pesanan_dikemas', $data);
	}

	public function dikirim()
	{
		$id = $this->session->userdata('id_user');
		$data['dikirim'] = $this->M_Crud->all_data('tb_pesanan')->where('id_user', $id)->where('status_pesanan', 'Dikirim')->order_by('tgl_pesanan', 'DESC')->get()->result_array();
		$this->load->view('level/user/menu_pesanan_dikirim', $data);
	}

	public function selesai()
	{
		$id = $this->session->userdata('id_user');
		$data['selesai'] = $this->M_Crud->all_data('tb_pesanan')->where('id_user', $id)->where('status_pesanan', 'Selesai')->order_by('tgl_pesanan', 'DESC')->get()->result_array();
		$this->load->view('level/user/menu_pesanan_selesai', $data);
	}

	public function cancelled()
	{
		$this->load->view('level/user/menu_pesanan_cancelled');
	}

	public function all()
	{
		$data['pesanan'] = $this->M_Crud->all_data('tb_pesanan')->join('tb_user', 'tb_pesanan.id_user = tb_user.id_user')->get()->result_array();
		$this->load->view('level/admin/pesanan_all', $data);
	}

	public function detail($id)
	{
		$id_user = $this->session->userdata('id_user');
		$data['pesanan'] = $this->M_Crud->all_data('tb_pesanan_detail')->join('tb_barang', 'tb_barang.id_brg = tb_pesanan_detail.id_brg')->where('id_pesanan', $id)->get()->result_array();
		$data['id'] = $id;
		$data['alamat'] = $this->M_Crud->all_data('tb_user_alamat')->join('tb_desa', 'tb_desa.id_desa = tb_user_alamat.id_desa')->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_desa.id_kecamatan')->join('tb_kabupaten', 'tb_kabupaten.id_kabupaten = tb_kecamatan.id_kabupaten')->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_kabupaten.id_provinsi')->where('id_user', $id_user)->where('set_default', 'Main')->get()->row_array();
		$data['lacak'] = $this->M_Crud->all_data('tb_pesanan_tracking')->join('tb_pesanan', 'tb_pesanan_tracking.id_pesanan = tb_pesanan.id_pesanan')->where('tb_pesanan_tracking.id_pesanan', $id)->join('tb_user', 'tb_user.id_user = tb_pesanan_tracking.updated_by')->order_by('tb_pesanan_tracking.updated_at', 'DESC')->get()->result_array();
		$data['detail'] = $this->M_Crud->show('tb_pesanan', ['id_pesanan' => $id])->row_array();
		$this->load->view('level/user/menu_pesanan_detail', $data);
	}

	public function tracking($id)
	{
		$data['pesanan'] = $this->M_Crud->all_data('tb_pesanan_detail')->join('tb_barang', 'tb_barang.id_brg = tb_pesanan_detail.id_brg')->where('id_pesanan', $id)->get()->result_array();
		$data['lacak'] = $this->M_Crud->all_data('tb_pesanan_tracking')->join('tb_pesanan', 'tb_pesanan_tracking.id_pesanan = tb_pesanan.id_pesanan')->where('tb_pesanan_tracking.id_pesanan', $id)->join('tb_user', 'tb_user.id_user = tb_pesanan_tracking.updated_by')->order_by('tb_pesanan_tracking.updated_at', 'DESC')->get()->result_array();
		$data['id'] = $id;
		$this->load->view('level/user/menu_pesanan_stepper', $data);
	}

	public function create()
	{
		$id = $this->session->userdata('id_user');
		$id_pesanan = rand(10000, 10000000);
		$nama = $this->M_Crud->show('tb_user', ['id_user' => $id])->row_array();

		$total = $this->input->post('total');
		$ongkos = $this->input->post('ongkos');
		$keterangan = $this->input->post('keterangan');

		// Remove non-numeric characters
		$totalNumeric = preg_replace("/[^0-9]/", "", $total);
		$totalNumeric2 = preg_replace("/[^0-9]/", "", $ongkos);

		// Convert the result to an integer
		$grand = (int)$totalNumeric;
		$ongkir = (int)$totalNumeric2;

		$data_pesanan = array(
			'id_pesanan' => $id_pesanan,
			'id_user' => $id,
			'tgl_pesanan' => date('Y-m-d H:i:s'),
			'atas_nama' => $nama['nama_member'],
			'keterangan_pesanan' => $keterangan,
			'tipe_order' => 'ONLINE',
			'jenis_order' => $this->input->post('jenis'),
			'status_pembayaran' => "Menunggu Pembayaran",
			'metode_bayar' => $this->input->post('metode'),
			'status_pesanan' => "Pending",
			'diskon' => 0,
			'grand_total' => $grand,
			'ongkos_kirim' => $ongkir,
			'total_bayar' => 0,
			'kembalian' => 0,
			'created_by' => $id,
			'updated_by' => NULL
		);

		try {
			$simpan = $this->M_Crud->input_data($data_pesanan, 'tb_pesanan');
			$keranjangData = $this->input->post('keranjang');

			foreach ($keranjangData as $item) {
				// Logika harga grosir
				if ($item['grosir_brg'] == "On" && $item['jumlah'] >= $item['rentang_awal'] && $item['jumlah'] <= $item['rentang_akhir']) {
					$harga = $item['harga_grosir'];
				} else {
					// Logika harga promo atau harga jual biasa
					$harga = $item['promo_brg'] == "On" ? $item['harga_promo'] : $item['harga_jual_barang'];
				}

				$hasSerial = $item['barcode'];

				// Data untuk dimasukkan ke tabel tb_pesanan_detail
				$data_pesanan_detail = array(
					'id_pesanan' => $id_pesanan,
					'id_brg' => $item['id_brg'],
					'harga_saat_ini' => $harga,
					'jumlah_jual' => $item['jumlah'],
					'status_verified' => (empty($hasSerial) || $hasSerial == "NO DATA") ? "1" : "0"
				);

				// Input data ke tabel tb_pesanan_detail
				$this->M_Crud->input_data($data_pesanan_detail, 'tb_pesanan_detail');

				// Hapus data dari tabel tb_keranjang
				$this->M_Crud->hapus_data(['id_keranjang' => $item['id_keranjang']], 'tb_keranjang');
			}

			$this->db->insert('tb_pesanan_tracking', [
				'id_pesanan' => $id_pesanan,
				'status_tracking' => 'Pesanan Dibuat',
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $id
			]);

			$options = array(
				'cluster' => 'ap1',
				'useTLS' => true
			);

			// Inisialisasi objek Pusher
			$pusher = new Pusher\Pusher(
				'fe22024f3d888f7e4ae0',
				'f7967965f26b5b0760db',
				'1732080',
				$options
			);

			$data['user'] = $this->M_Crud->all_data('tb_pesanan')->join('tb_user', 'tb_user.id_user = tb_pesanan.id_user')->where(['id_pesanan' => $id_pesanan])->get()->row_array();
			$data['pesanan'] = $this->M_Crud->all_data('tb_pesanan_detail')->join('tb_barang', 'tb_barang.id_brg = tb_pesanan_detail.id_brg')->where(['id_pesanan' => $id_pesanan])->get()->result_array();

			$pusher->trigger('my-channel', 'my-event', $data);

			$response = array(
				'success' => true,
				'msg' => "Pesanan Berhasil Dibuat. Silahkan melakukan pembayaran!!",
			);
		} catch (Exception $e) {
			$response = array(
				'success' => false,
				'msg' => "Pesanan Gagal Dibuat. Mohon Periksa Kembali Inputan Anda!!",
			);
		}

		$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
		exit;
	}

	public function create_invoice()
	{
		$id_pesanan = $this->M_Crud->buat_id_pesanan(4);
		$id_user = $this->input->post('user');
		$total = intval($this->input->post('total_harga'));

		$cek = $this->M_Crud->show('tb_user', ['id_user' => $id_user])->row_array();
		$keranjangData = $this->input->post('keranjang');

		$email              = $cek['email_member']; // your customer email
		$phoneNumber        = $cek['wa_member']; // your customer phone number (optional)
		$productDetails     = "Transfer Pembayaran";
		$merchantOrderId    = $id_pesanan; // from merchant, unique   
		$additionalParam    = ''; // optional
		$merchantUserInfo   = ''; // optional
		$customerVaName     = 'John Doe'; // display name on bank confirmation display
		$callbackUrl        = 'http://YOUR_SERVER/callback'; // url for callback
		$returnUrl          = 'http://YOUR_SERVER/return'; // url for redirect
		$expiryPeriod       = 60; // set the expired time in minutes

		// Customer Detail
		$firstName          = $cek['nama_member'];
		$lastName           = "";

		// Address
		$alamat             = "Jl. Kembangan Raya";
		$city               = "Jakarta";
		$postalCode         = "11530";
		$countryCode        = "ID";

		$address = array(
			'firstName'     => $firstName,
			'lastName'      => $lastName,
			'address'       => $alamat,
			'city'          => $city,
			'postalCode'    => $postalCode,
			'phone'         => $phoneNumber,
			'countryCode'   => $countryCode
		);

		$customerDetail = array(
			'firstName'         => $firstName,
			'lastName'          => $lastName,
			'email'             => $email,
			'phoneNumber'       => $phoneNumber,
			'billingAddress'    => $address,
			'shippingAddress'   => $address
		);

		$itemDetails = array();
		$total = 0;
		foreach ($keranjangData as $key => $value) {
			$total = $total + (intval($value['harga_promo']) * intval($value['jumlah']));
			$item1 = array(
				'name'      => $value['nama_barang'],
				'price'     => intval($value['harga_promo']) * intval($value['jumlah']),
				'quantity'  => intval($value['jumlah']),
			);

			// Menambahkan array $item1 ke dalam array $itemDetails
			$itemDetails[] = $item1;
		}

		$paymentAmount = $total; // Amount

		$params = array(
			'paymentAmount'     => $paymentAmount,
			'merchantOrderId'   => strval($merchantOrderId),
			'productDetails'    => $productDetails,
			'additionalParam'   => $additionalParam,
			'merchantUserInfo'  => $merchantUserInfo,
			'customerVaName'    => $customerVaName,
			'email'             => $email,
			'phoneNumber'       => $phoneNumber,
			'itemDetails'       => $itemDetails,
			'customerDetail'    => $customerDetail,
			'callbackUrl'       => $callbackUrl,
			'returnUrl'         => $returnUrl,
			'expiryPeriod'      => $expiryPeriod
		);

		$duitkuConfig = new \Duitku\Config("eb492c03ee2c0f7cb1d1fb3cb16ce92b", "DS16193");
		$duitkuConfig->setSandboxMode(true);
		$duitkuConfig->setSanitizedMode(false);
		$duitkuConfig->setDuitkuLogs(false);

		try {
			// createInvoice Request
			$responseDuitkuPop = \Duitku\Pop::createInvoice($params, $duitkuConfig);
			$nama = $this->M_Crud->show('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();

			$data_pesanan = array(
				'id_pesanan' => $id_pesanan,
				'id_user' => $this->session->userdata('id_user'),
				'tgl_pesanan' => date('Y-m-d H:i:s'),
				'atas_nama' => $nama['nama_member'],
				'jenis_order' => $this->input->post('jenis'),
				'status_pembayaran' => "menunggu pembayaran",
				'metode_bayar' => $this->input->post('metode'),
				'status_pesanan' => "Pending",
				'diskon' => 0,
				'grand_total' => 10000,
				'total_bayar' => 10000,
				'kembalian' => 0,
				'created_by' => $this->session->userdata('id_user'),
				'updated_by' => NULL
			);

			$simpan = $this->M_Crud->input_data($data_pesanan, 'tb_pesanan');

			foreach ($keranjangData as $item) {
				$data_pesanan_detail = array(
					'id_pesanan' => $id_pesanan,
					'id_brg' => $item['id_brg'],
					'harga_saat_ini' => $item['harga_promo'],
					'jumlah_jual' => $item['jumlah']
				);
				$this->M_Crud->input_data($data_pesanan_detail, 'tb_pesanan_detail');
				$this->M_Crud->hapus_data(['id_keranjang' => $item['id_keranjang']], 'tb_keranjang');
			}

			header('Content-Type: application/json');
			echo $responseDuitkuPop;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
}
