<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
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
		$this->load->view('level/admin/master_satuan');
	}

	public function json()
	{
		$nama_satuan_filter = $this->input->post('nama_satuan');

		$columns = 'id_satuan, nama_satuan';
		$filter = array('nama_satuan'); // Sesuaikan dengan nama kolom yang ingin Anda filter
		$joins = array();

		$where = null;
		if ($nama_satuan_filter) {
			$where = "nama_satuan LIKE '%" . $nama_satuan_filter . "%'";
		}

		$list = $this->Datatable_model->get_data('tb_satuan', $columns, $joins, $filter, $this->input->post('search')['value'], $where);

		$data = array();
		$no = $_POST['start'];
		foreach ($list->result() as $satuan) {
			$count = $this->db->where('id_satuan', $satuan->id_satuan)->count_all_results('tb_barang');
			$no++;
			$row = array(
				$no,
				$satuan->nama_satuan,
				$count . " Barang",
				'<div class="btn-group">
					<button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						Action
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="javascript:void(0);" data-id="' . $satuan->id_satuan . '" data-nama="' . $satuan->nama_satuan . '" onclick="ubahSatuan(this);">&nbsp;Ubah Satuan</a></li>
						<li><a class="dropdown-item text-danger" data-id="' . $satuan->id_satuan . '" href="javascript:void(0);" onclick="deleteSatuan(this);">&nbsp;Hapus Satuan</a></li>
					</ul>
				</div>',
			);
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Datatable_model->count_all('tb_satuan'),
			"recordsFiltered" => $this->Datatable_model->count_filtered('tb_satuan', $columns, $joins, $filter, $this->input->post('search')['value'], $where), // Menggunakan filter
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function simpan()
	{
		try {
			$nama_satuan = $this->input->post('nama_satuan');

			$data = array(
				'nama_satuan' => $nama_satuan
			);

			$result = $this->M_Crud->input_data($data, 'tb_satuan');

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
			$id = $this->input->post('id_satuan');
			$nama = $this->input->post('nama_satuan');

			$data = array(
				'nama_satuan' => $nama
			);

			$result = $this->M_Crud->update_data(['id_satuan' => $id], $data, 'tb_satuan');

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

	public function delete($id_satuan)
	{
		try {
			$result = $this->M_Crud->hapus_data(array('id_satuan' => $id_satuan), 'tb_satuan');
			echo json_encode(array('status' => 'success', 'message' => 'Data berhasil dihapus.'));
		} catch (Exception $e) {
			echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
		}
	}
}
