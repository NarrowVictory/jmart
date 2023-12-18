<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('auth');
		$this->load->model('M_Crud');
	}

	public function testing()
	{
		$data['kategori'] = $this->M_Crud->all_data('tb_kategori')->limit(5)->get()->result_array();
		$data['barang'] = $this->M_Crud->all_data('tb_barang')->where('promo_brg', 'On')->get()->result_array();
		$this->load->view('vw_testing', $data);
	}

	public function index()
	{
		$this->load->view('layouts/auth/header');
		$this->load->view('vw_login');
		$this->load->view('layouts/auth/footer');
	}

	public function proses()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if ($this->auth->login_user($username, $password)) {
			$response = array(
				'status' => 'success',
				'message' => 'Login Berhasil...'
			);
		} else {
			$response = array(
				'status' => 'error',
				'message' => 'Username & Password salah'
			);
		}

		$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
		exit;
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
