<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
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
        $this->load->view('level/admin/master_staff');
    }

    public function json()
    {
        $nama_supplier_filter = $this->input->post('nama');
        $pic_supplier_filter = $this->input->post('pic');
        $kontak_supplier_filter = $this->input->post('kontak');

        $columns = 'id_kasir, nama_kasir, kontak_kasir';
        $filter = array('nama_kasir', 'kontak_kasir');
        $joins = array();

        $where = null;
        if ($nama_supplier_filter || $pic_supplier_filter || $kontak_supplier_filter) {
            $where = "1"; // Menginisialisasi dengan 1 sehingga operasi AND berfungsi

            if ($nama_supplier_filter) {
                $where .= " AND nama_supplier LIKE '%" . $nama_supplier_filter . "%'";
            }

            if ($pic_supplier_filter) {
                $where .= " AND pic LIKE '%" . $pic_supplier_filter . "%'";
            }

            if ($kontak_supplier_filter) {
                $where .= " AND kontak_supplier LIKE '%" . $kontak_supplier_filter . "%'";
            }
        }

        $list = $this->Datatable_model->get_data('tb_kasir', $columns, $joins, $filter, $this->input->post('search')['value'], $where);

        $data = array();
        $no = $_POST['start'];
        foreach ($list->result() as $kasir) {
            $no++;
            $row = array(
                $no,
                $kasir->nama_kasir,
                $kasir->kontak_kasir,
                "Ongoing",
                '<div class="btn-group">
					<button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						Action
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="javascript:void(0);" data-id="' . $kasir->id_kasir . '" data-nama="' . $kasir->nama_kasir . '"  data-kontak="' . $kasir->kontak_kasir . '"   onclick="ubahKasir(this);">&nbsp;Ubah Kasir</a></li>
						<li><a class="dropdown-item text-danger" data-id="' . $kasir->id_kasir . '" href="javascript:void(0);" onclick="deleteKasir(this);">&nbsp;Hapus Kasir</a></li>
					</ul>
				</div>',
            );
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Datatable_model->count_all('tb_kasir'),
            "recordsFiltered" => $this->Datatable_model->count_filtered('tb_kasir', $columns, $joins, $filter, $this->input->post('search')['value'], $where), // Menggunakan filter
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function simpan()
    {
        try {
            $nama = $this->input->post('nama_kasir');
            $kontak = $this->input->post('kontak_kasir');

            $data = array(
                'nama_kasir' => $nama,
                'kontak_kasir' => $kontak,
            );

            $result = $this->M_Crud->input_data($data, 'tb_kasir');

            echo json_encode(
                array(
                    'status' => 'success',
                    'message' => 'Data berhasil disimpan.'
                )
            );
        } catch (Exception $e) {
            echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
        }
    }

    public function ubah()
    {
        try {
            $id = $this->input->post('id_kasir');
            $nama = $this->input->post('nama_kasir');
            $kontak = $this->input->post('kontak_kasir');

            $data = array(
                'nama_kasir' => $nama,
                'kontak_kasir' => $kontak,
            );

            $result = $this->M_Crud->update_data(['id_kasir' => $id], $data, 'tb_kasir');

            echo json_encode(
                array(
                    'status' => 'success',
                    'message' => 'Data berhasil diubah.'
                )
            );
        } catch (Exception $e) {
            echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
        }
    }

    public function delete($id_kasir)
    {
        try {
            $result = $this->M_Crud->hapus_data(array('id_kasir' => $id_kasir), 'tb_kasir');
            echo json_encode(array('status' => 'success', 'message' => 'Data berhasil dihapus.'));
        } catch (Exception $e) {
            echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
        }
    }
}
