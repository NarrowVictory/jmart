<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('auth');
		$this->load->model('M_Crud');
	}

	public function testing(){
		$data['kategori'] = $this->M_Crud->all_data('tb_kategori')->limit(5)->get()->result_array();
		$data['barang'] = $this->M_Crud->all_data('tb_barang')->where('promo_brg', 'On')->get()->result_array();
		$this->load->view('vw_testing', $data);
	}

	public function index()
	{
		$data['title'] = "J-MART Login";
		$this->load->view('layouts/auth/header', $data);
		$this->load->view('vw_login');
		$this->load->view('layouts/auth/footer');
	}

	public function proses()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if($this->auth->login_user($username,$password))
		{
			redirect('home');
		}
		else
		{
			$this->session->set_flashdata('error','Username & Password salah');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('is_login');
		redirect('login');
	}

}
