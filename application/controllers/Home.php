<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
			$data['barang'] = $this->M_Crud->all_data('tb_barang')->where('promo_brg', 'On')->get()->result_array();
			$data['kategori'] = $this->M_Crud->all_data('tb_kategori')->limit(5)->get()->result_array();
			$this->load->view('level/user/index', $data);
		}else if ($this->session->userdata('level') == "Administrator") {
			// $this->load->view('layouts/admin/header');
			$this->load->view('level/admin/index');
			// $this->load->view('layouts/admin/footer');
		}else{
			echo "string";
		}
	}

	public function kategori($id){
		$cek = $this->M_Crud->show('tb_kategori', ['id_kategori_brg' => $id])->row_array();
		$data['barang'] = $this->M_Crud->all_data('tb_barang')->where('promo_brg', 'On')->where('id_kategori_brg', $id)->get()->result_array();
		$data['header'] = $cek['nama_kategori_brg'];
		$this->load->view('layouts/user/header');
		$this->load->view('level/user/index_kategori', $data);
		$this->load->view('layouts/user/footer');
	}

	public function alamat(){
		$data['header'] = "Pilih Alamat";
		$this->load->view('layouts/user/header');
		$this->load->view('level/user/index_alamat', $data);
		$this->load->view('layouts/user/footer');
	}

	public function tambah_alamat(){
		$data['header'] = "Alamat Baru";
		$this->load->view('layouts/user/header');
		$this->load->view('level/user/index_alamat_tambah', $data);
		$this->load->view('layouts/user/footer');
	}

	public function saran(){
		$data['header'] = "Kritik dan Saran";
		$data['user'] = $this->M_Crud->show('tb_user',['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['saran'] = $this->M_Crud->all_data('tb_krisan')->join('tb_user','tb_user.id_user = tb_krisan.id_user')->where('tb_krisan.id_user', $this->session->userdata('id_user'))->get()->result_array();
		$this->load->view('layouts/user/header');
		$this->load->view('level/user/index_saran', $data);
		$this->load->view('layouts/user/footer');
	}

	public function plus_saran(){
		$data = array(
            'id_user' => $this->input->post('id_user'),
            'perihal' => $this->input->post('perihal'),
            'kritik_saran' => $this->input->post('kritik_saran'),
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->M_Crud->input_data($data,'tb_krisan');

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

	public function plus_saran2(){
		$data = array(
            'id_user' => $this->input->post('id_user'),
            'perihal' => $this->input->post('perihal'),
            'kritik_saran' => $this->input->post('kritik_saran'),
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->M_Crud->input_data($data,'tb_krisan');

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
