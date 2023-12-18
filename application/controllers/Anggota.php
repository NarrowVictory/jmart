<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->load->library('session');
        $this->load->model('M_Crud');
        $this->load->model('Datatable_model');
        $this->auth->cek_login();
    }

    public function index()
    {
        $this->load->view('level/admin/anggota_data');
    }

    public function json()
    {
        $nama_member = $this->input->post('nama_member');
        $wa_member = $this->input->post('wa_member');
        $nomor_induk = $this->input->post('nomor_induk');

        $columns = 'id_user, nama_member, wa_member, nomor_induk, level, created_at';
        $filter = array('nama_member', 'wa_member', 'nomor_induk');
        $joins = array();

        $where = array(
            'level' => 'User'
        );

        if ($nama_member) {
            $where = "nama_member LIKE '%" . $nama_member . "%' AND level = 'User'";
        }

        if ($wa_member) {
            $where = "wa_member LIKE '%" . $wa_member . "%' AND level = 'User'";
        }

        if ($nomor_induk) {
            $where = "nomor_induk LIKE '%" . $nomor_induk . "%' AND level = 'User'";
        }

        $list = $this->Datatable_model->get_data('tb_user', $columns, $joins, $filter, $this->input->post('search')['value'], $where, $this->input->post('start'), $this->input->post('length'));

        $data = array();
        $no = $_POST['start'];
        foreach ($list->result() as $anggota) {
            $no++;
            $row = array(
                $no,
                $anggota->nama_member,
                $anggota->wa_member,
                $anggota->nomor_induk,
                "<span class='text-success fw-bold'>Rp. " . number_format(50000) . "</span>",
                "<span class='text-danger fw-bold'>Rp. " . number_format(50000) . "</span>",
                '<div class="btn-group">
					<button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						Action
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="javascript:void(0);" data-id="' . $anggota->id_user . '" onclick="lihatUser(this);">&nbsp;Lihat Anggota</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);" data-id="' . $anggota->id_user . '" onclick="lihatUser(this);">&nbsp;Ubah Anggota</a></li>
						<li><a class="dropdown-item text-danger" data-id="' . $anggota->id_user . '" href="javascript:void(0);" onclick="deleteAnggota(this);">&nbsp;Hapus Anggota</a></li>
					</ul>
				</div>',
            );
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Datatable_model->count_all('tb_user', $where),
            "recordsFiltered" => $this->Datatable_model->count_filtered('tb_user', $columns, $joins, $filter, $this->input->post('search')['value'], $where), // Menggunakan filter
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function simpan_data()
    {
        // Tangkap data dari formulir
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama_member = $this->input->post('nama_member');
        $email_member = $this->input->post('email_member');
        $wa_member = $this->input->post('wa_member');
        $nomor_induk = $this->input->post('nomor_induk');
        $dept = $this->input->post('dept');
        $level = "User";
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $avatar = "default.jpg";

        $data = array(
            'username' => $username,
            'password' => $password,
            'nama_member' => $nama_member,
            'email_member' => $email_member,
            'wa_member' => $wa_member,
            'nomor_induk' => $nomor_induk,
            'dept' => $dept,
            'level' => $level,
            'tgl_lahir' => $tgl_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'avatar' => $avatar,
        );

        $this->M_Crud->input_data($data, 'tb_user');

        $response = ['status' => 'success', 'message' => 'Data berhasil disimpan.'];
        echo json_encode($response);
    }

    public function delete($id_user)
    {
        try {
            $result = $this->M_Crud->hapus_data(array('id_user' => $id_user), 'tb_user');
            echo json_encode(array('status' => 'success', 'message' => 'Data berhasil dihapus.'));
        } catch (Exception $e) {
            echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
        }
    }
}
