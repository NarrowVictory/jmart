<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends CI_Controller {

	public function index()
	{
		$data['header'] = "Promo";
		$this->load->view('level/user/menu_promo', $data);
	}
}
