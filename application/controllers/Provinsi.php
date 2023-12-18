<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Provinsi extends CI_Controller
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
		$this->load->view('level/admin/wilayah_provinsi');
	}

	public function json()
	{
		$nama_provinsi_filter = $this->input->post('nama_provinsi');

		$columns = 'id_provinsi, nama_provinsi';
		$filter = array('nama_provinsi'); // Sesuaikan dengan nama kolom yang ingin Anda filter
		$joins = array();

		$where = null;
		if ($nama_provinsi_filter) {
			$where = "nama_provinsi LIKE '%" . $nama_provinsi_filter . "%'";
		}

		$list = $this->Datatable_model->get_data('tb_provinsi', $columns, $joins, $filter, $this->input->post('search')['value'], $where);

		$data = array();
		$no = $_POST['start'];
		foreach ($list->result() as $provinsi) {
			$no++;
			$row = array(
				$no,
				$provinsi->nama_provinsi,
				'<div class="btn-group">
					<button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						Action
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="javascript:void(0);" data-id="' . $provinsi->id_provinsi . '" data-nama="' . $provinsi->nama_provinsi . '" onclick="ubahProvinsi(this);">&nbsp;Ubah Provinsi</a></li>
						<li><a class="dropdown-item text-danger" data-id="' . $provinsi->id_provinsi . '" href="javascript:void(0);" onclick="deleteProvinsi(this);">&nbsp;Hapus Provinsi</a></li>
					</ul>
				</div>',
			);
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Datatable_model->count_all('tb_provinsi'),
			"recordsFiltered" => $this->Datatable_model->count_filtered('tb_provinsi', $columns, $joins, $filter, $this->input->post('search')['value'], $where), // Menggunakan filter
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function simpan()
	{
		try {
			$nama_provinsi = $this->input->post('nama_provinsi');

			$data = array(
				'nama_provinsi' => $nama_provinsi
			);

			$result = $this->M_Crud->input_data($data, 'tb_provinsi');

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
			$id = $this->input->post('id_provinsi');
			$nama = $this->input->post('nama_provinsi');

			$data = array(
				'nama_provinsi' => $nama
			);

			$result = $this->M_Crud->update_data(['id_provinsi' => $id], $data, 'tb_provinsi');

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

	public function delete($id_provinsi)
	{
		try {
			$result = $this->M_Crud->hapus_data(array('id_provinsi' => $id_provinsi), 'tb_provinsi');
			echo json_encode(array('status' => 'success', 'message' => 'Data berhasil dihapus.'));
		} catch (Exception $e) {
			echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
		}
	}
}
