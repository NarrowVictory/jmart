<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('auth');
		$this->load->model('M_Crud');
		$this->load->library('session');
		$this->load->helper('string');
		$this->auth->cek_login();
	}

	public function index()
	{
		$id = $this->session->userdata('id_user');
		$data['user'] = $this->M_Crud->show('tb_user',['id_user'=>$id])->row_array();
		$this->load->view('level/user/menu_akun', $data);
	}

	public function edit(){
		$id = $this->session->userdata('id_user');
		$data['user'] = $this->M_Crud->show('tb_user',['id_user'=>$id])->row_array();
		$this->load->view('level/user/menu_akun_editprofile', $data);
	}

	public function alamat(){
		$this->load->view('level/user/menu_akun_editalamat');
	}

	public function update(){
		$id = $this->session->userdata('id_user');
		$data = $this->M_Crud->show('tb_user',['id_user' => $id])->row_array();

		if ($_POST['username'] !== $data['username']) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[1]|max_length[20]|is_unique[tb_user.username]');
		}else{
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[1]|max_length[20]');
		}

		if ($_POST['nomor_induk'] !== $data['nomor_induk']) {
			$this->form_validation->set_rules('nomor_induk', 'Nomor Induk', 'trim|required|min_length[1]|max_length[20]|is_unique[tb_user.nomor_induk]');
		}else{
			$this->form_validation->set_rules('nomor_induk', 'Nomor Induk', 'trim|required|min_length[1]|max_length[20]');
		}

		if ($_POST['wa_member'] !== $data['wa_member']) {
			$this->form_validation->set_rules('wa_member', 'Nomor WA', 'trim|required|min_length[1]|max_length[20]|is_unique[tb_user.wa_member]');
		}else{
			$this->form_validation->set_rules('wa_member', 'Nomor WA', 'trim|required|min_length[1]|max_length[20]');
		}

		if ($_POST['email_member'] !== $data['email_member']) {
			$this->form_validation->set_rules('email_member', 'Email Member', 'trim|required|min_length[1]|max_length[20]|is_unique[tb_user.email_member]');
		}else{
			$this->form_validation->set_rules('email_member', 'Email Member', 'trim|required|min_length[1]|max_length[20]');
		}
		
		$this->form_validation->set_message('required', 'Kolom {field} harus diisi.');
		$this->form_validation->set_message('min_length', 'Kolom {field} harus memiliki panjang minimal {param} karakter.');
		$this->form_validation->set_message('max_length', 'Kolom {field} harus memiliki panjang maksimal {param} karakter.');

		if ($this->form_validation->run()==true)
		{	
			$data = [
                'username' => $this->input->post('username'),
                'nomor_induk' => $this->input->post('nomor_induk'),
                'wa_member' => $this->input->post('wa_member'),
                'email_member' => $this->input->post('email_member'),
                'nama_member' => $this->input->post('nama_member'),
            ];
            $this->M_Crud->update_data(['id_user' => $id], $data, 'tb_user');
			$response = array(
				'status' => 'success',
				'message' => 'Update Akun Berhasil. Terimakasih :)'
			);
			$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
			exit;
		}else{
			$response = array(
				'status' => 'error',
				'message' => validation_errors()
			);

			$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
			exit;
		}
	}

	public function ganti_password(){
		$id = $this->session->userdata('id_user');
		$this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required|min_length[1]|max_length[20]');
		$this->form_validation->set_rules('konfirmasi_password_baru', 'Konfirmasi Password Baru', 'trim|required|min_length[1]|max_length[20]');

		if ($this->form_validation->run()==true)
		{
			$password = $this->input->post('password_baru');
			$password_match = $this->input->post('konfirmasi_password_baru');

			if ($password == $password_match) {
				$response = array(
					'status' => 'success',
					'message' => 'Password Berhasil diubah'
				);
				$this->M_Crud->update_data(['id_user' => $id], ['password' => password_hash($password, PASSWORD_DEFAULT)], 'tb_user');
			}else{
				$response = array(
					'status' => 'error',
					'message' => 'Password Tidak Sama'
				);
			}

			$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
			exit;
		}else{
			$response = array(
				'status' => 'error',
				'message' => validation_errors()
			);

			$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
			exit;
		}	
	}
}
