<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {
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
		$data['keranjang'] = $this->M_Crud->all_data('tb_keranjang')->join('tb_barang','tb_barang.id_brg = tb_keranjang.id_brg')->join('tb_kategori','tb_barang.id_kategori_brg = tb_kategori.id_kategori_brg')->get()->result_array();
		$data['header'] = "Keranjang";
		// $this->load->view('layouts/user/header');
		$this->load->view('level/user/menu_keranjang', $data);
		// $this->load->view('layouts/user/footer');
	}

	public function add(){
		$id = $this->input->post('idProduk');
		$user = $this->session->userdata('id_user');

	    $cek = $this->M_Crud->all_data('tb_keranjang')->where('id_brg',$id)->where('id_user',$user)->get()->row();

	    if (!empty($cek)) {	
	    	$response = array(
					'success' => false,
					'msg' => "Barang Sudah Ditambahkan ke Keranjang"
				);
	    }else{
	    	$data = array(
		        'id_brg' => $id ,
		        'jumlah' => 1,
		        'id_user' => $user
		    );

		    $this->M_Crud->input_data($data, 'tb_keranjang');
		    $response = array(
				'success' => true,
				'msg' => "Barang Berhasil Ditambahkan ke Keranjang"
			);
	    }

		$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
		exit;
	}

	public function update_jumlah(){
		// Pastikan request yang diterima adalah dengan metode POST dan menggunakan Ajax
        if ($this->input->is_ajax_request() && $this->input->method() == 'post') {
            $id = $this->input->post('id_keranjang');

            $data = array(
            	'jumlah' => $this->input->post('qty_barang')
            );
            $this->M_Crud->update_data(['id_keranjang' => $id], $data, 'tb_keranjang');
            
            $response = array(
				'success' => true,
				'msg' => "Jumlah Pemesanan Berhasil Dieedit"
			);

            $this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
			exit;
        } else {
            $response = array(
				'success' => false,
				'msg' => "Jumlah Pemesanan Gagal Dieedit"
			);

            $this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
			exit;
        }
	}

	public function proses(){
		$selectedProductsParam = $this->input->get('selectedProducts');
		$selectedProductsArray = explode(',', $selectedProductsParam);
		// var_dump($selectedProductsArray);die();
		$data['keranjang'] = $this->M_Crud->all_data('tb_keranjang')->join('tb_barang','tb_barang.id_brg = tb_keranjang.id_brg')->join('tb_kategori','tb_barang.id_kategori_brg = tb_kategori.id_kategori_brg')->where_in('id_keranjang', $selectedProductsArray)->get()->result_array();
		$data['total'] = $this->db->select_sum('(harga_promo * jumlah)', 'total_harga')->from('tb_keranjang')->join('tb_barang','tb_barang.id_brg = tb_keranjang.id_brg')->where_in('id_keranjang', $selectedProductsArray)->get()->row_array();
		$data['user'] = $this->session->userdata('id_user');
		$data['header'] = "Buat Pesanan";
		$this->load->view('layouts/user/header');
		$this->load->view('level/user/menu_keranjang_proses', $data);
	}
}
