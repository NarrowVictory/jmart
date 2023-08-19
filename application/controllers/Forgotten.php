<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotten extends CI_Controller {

	public function index()
	{
		$data['title'] = "J-MART Forgot Password";
		$this->load->view('layouts/auth/header', $data);
		$this->load->view('vw_forgotten');
		$this->load->view('layouts/auth/footer');
	}
}
