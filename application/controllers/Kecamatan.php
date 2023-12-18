<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kecamatan extends CI_Controller
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
		$data['provinsi'] = $this->M_Crud->tampil_data('tb_provinsi')->result_array();
		$this->load->view('level/admin/wilayah_kecamatan', $data);
	}

	public function json()
	{
		$nama_provinsi_filter = $this->input->post('nama_provinsi');
		$nama_kabupaten_filter = $this->input->post('nama_kabupaten');
		$nama_kecamatan_filter = $this->input->post('nama_kecamatan');

		$columns = 'tb_kabupaten.id_kabupaten, id_kecamatan, nama_provinsi, nama_kabupaten, nama_kecamatan';
		$filter = array('nama_provinsi', 'nama_kabupaten', 'nama_kecamatan'); // Sesuaikan dengan nama kolom yang ingin Anda filter
		$joins = array(
			array(
				'table' => 'tb_kabupaten',
				'condition' => 'tb_kabupaten.id_kabupaten = tb_kecamatan.id_kabupaten',
				'type' => 'inner'
			),
			array(
				'table' => 'tb_provinsi',
				'condition' => 'tb_kabupaten.id_provinsi = tb_provinsi.id_provinsi',
				'type' => 'inner'
			),
		);

		$where = null;
		if ($nama_provinsi_filter) {
			$where = "nama_provinsi LIKE '%" . $nama_provinsi_filter . "%'";
		}

		if ($nama_kabupaten_filter) {
			$where = "nama_kabupaten LIKE '%" . $nama_kabupaten_filter . "%'";
		}

		if ($nama_kecamatan_filter) {
			$where = "nama_kecamatan LIKE '%" . $nama_kecamatan_filter . "%'";
		}

		$list = $this->Datatable_model->get_data('tb_kecamatan', $columns, $joins, $filter, $this->input->post('search')['value'], $where);

		$data = array();
		$no = $_POST['start'];
		foreach ($list->result() as $kecamatan) {
			$no++;
			$row = array(
				$no,
				$kecamatan->nama_provinsi,
				$kecamatan->nama_kabupaten,
				$kecamatan->nama_kecamatan,
				'<div class="btn-group">
					<button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						Action
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="javascript:void(0);" data-provinsi="' . $kecamatan->nama_provinsi . '" data-kabupaten="' . $kecamatan->nama_kabupaten . '" data-id="' . $kecamatan->id_kabupaten . '" data-id="' . $kecamatan->id_kabupaten . '" data-nama="' . $kecamatan->nama_kecamatan . '" onclick="ubahKecamatan(this);">&nbsp;Ubah Kecamatan</a></li>
						<li><a class="dropdown-item text-danger" data-id="' . $kecamatan->id_kecamatan . '" href="javascript:void(0);" onclick="deleteKecamatan(this);">&nbsp;Hapus Kecamatan</a></li>
					</ul>
				</div>',
			);
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Datatable_model->count_all('tb_kecamatan'),
			"recordsFiltered" => $this->Datatable_model->count_filtered('tb_kecamatan', $columns, $joins, $filter, $this->input->post('search')['value'], $where), // Menggunakan filter
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function simpan()
	{
		try {
			// Mengambil data yang dikirimkan melalui Ajax
			$id = $this->input->post('select_kabupaten');
			$nama = $this->input->post('nama_kecamatan');

			// Validasi data jika diperlukan
			if (empty($id) || empty($nama)) {
				echo json_encode(array('status' => 'error', 'message' => 'Data tidak lengkap.'));
				return;
			}

			$data = array(
				'id_kabupaten' => $id,
				'nama_kecamatan' => $nama
			);

			$result = $this->M_Crud->input_data($data, 'tb_kecamatan'); // Ganti 'simpan_data' dengan method yang sesuai di model Anda

			echo json_encode(array('status' => 'success', 'message' => 'Data berhasil disimpan.'));
		} catch (Exception $e) {
			echo json_encode(array('status' => 'error', 'message' => 'Terjadi kesalahan dalam proses penyimpanan data.'));
		}
	}

	public function ubah()
	{
		try {
			$id = $this->input->post('id_kecamatan');
			$nama = $this->input->post('nama_kecamatan');

			$data = array(
				'nama_kecamatan' => $nama
			);

			$result = $this->M_Crud->update_data(['id_kecamatan' => $id], $data, 'tb_kecamatan');

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

	public function delete($id_kecamatan)
	{
		try {
			$result = $this->M_Crud->hapus_data(array('id_kecamatan' => $id_kecamatan), 'tb_kecamatan');
			echo json_encode(array('status' => 'success', 'message' => 'Data berhasil dihapus.'));
		} catch (Exception $e) {
			echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
		}
	}
}
