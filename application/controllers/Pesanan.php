<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(FCPATH . 'vendor/autoload.php');
use Duitku\Pop;

class Pesanan extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('auth');
		$this->load->model('M_Crud');
		$this->auth->cek_login();
	}

	public function pending(){
		$this->load->view('level/user/menu_pesanan_pending');
	}

	public function all(){
		$data['pesanan'] = $this->M_Crud->all_data('tb_pesanan')->join('tb_user','tb_pesanan.id_user = tb_user.id_user')->get()->result_array();
		$this->load->view('level/admin/pesanan_all', $data);
	}

	public function index()
	{
		$id = $this->session->userdata('id_user');
		$data['pesanan'] = $this->M_Crud->all_data('tb_pesanan')->where('id_user', $id)->get()->result_array();
		$this->load->view('level/user/menu_pesanan', $data);
	}

	public function detail($id){
		$data['pesanan'] = $this->M_Crud->all_data('tb_pesanan_detail')->join('tb_barang','tb_barang.id_brg = tb_pesanan_detail.id_brg')->where('id_pesanan', $id)->get()->result_array();
		$data['id'] = $id;
		$this->load->view('level/user/menu_pesanan_detail', $data);
	}

	public function tracking($id){
		$data['pesanan'] = $this->M_Crud->all_data('tb_pesanan_detail')->join('tb_barang','tb_barang.id_brg = tb_pesanan_detail.id_brg')->where('id_pesanan', $id)->get()->result_array();
		$data['id'] = $id;
		$this->load->view('level/user/menu_pesanan_stepper', $data);
	}

	public function create(){
		 $id = $this->session->userdata('id_user');
		 $id_pesanan = $this->M_Crud->buat_id_pesanan(4);
		 $nama = $this->M_Crud->show('tb_user',['id_user' => $id])->row_array();

		 $data_pesanan = array(
            'id_pesanan' => $id_pesanan,
            'id_user' => $id,
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
            'created_by' => $id,
            'updated_by' => NULL
        );

		try {
			$simpan = $this->M_Crud->input_data($data_pesanan, 'tb_pesanan');
			$keranjangData = $this->input->post('keranjang');

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

	public function create_invoice(){
		$id_pesanan = $this->M_Crud->buat_id_pesanan(4);
		$id_user = $this->input->post('user');
		$total = intval($this->input->post('total_harga'));

		$cek = $this->M_Crud->show('tb_user',['id_user' => $id_user])->row_array();
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
		        'name'      => $value['nama_brg'],
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
		    $nama = $this->M_Crud->show('tb_user',['id_user' => $this->session->userdata('id_user')])->row_array();

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
