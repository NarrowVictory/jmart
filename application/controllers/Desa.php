<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Desa extends CI_Controller
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
		$this->load->view('level/admin/wilayah_desa', $data);
	}

	public function json()
	{
		$nama_provinsi_filter = $this->input->post('nama_provinsi');
		$nama_kabupaten_filter = $this->input->post('nama_kabupaten');
		$nama_kecamatan_filter = $this->input->post('nama_kecamatan');
		$nama_desa_filter = $this->input->post('nama_desa');

		$columns = 'tb_kabupaten.id_kabupaten, tb_desa.id_desa, tb_desa.id_kecamatan, nama_provinsi, nama_kabupaten, nama_kecamatan, nama_desa, ongkos_kirim';
		$filter = array('nama_provinsi', 'nama_kabupaten', 'nama_kecamatan', 'nama_desa'); // Sesuaikan dengan nama kolom yang ingin Anda filter
		$joins = array(
			array(
				'table' => 'tb_kecamatan',
				'condition' => 'tb_kecamatan.id_kecamatan = tb_desa.id_kecamatan',
				'type' => 'inner'
			),
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

		if ($nama_desa_filter) {
			$where = "nama_desa LIKE '%" . $nama_desa_filter . "%'";
		}

		$list = $this->Datatable_model->get_data('tb_desa', $columns, $joins, $filter, $this->input->post('search')['value'], $where);

		$data = array();
		$no = $_POST['start'];
		foreach ($list->result() as $desa) {
			$no++;
			$row = array(
				$no,
				$desa->nama_provinsi,
				$desa->nama_kabupaten,
				$desa->nama_kecamatan,
				$desa->nama_desa,
				"Rp. " . number_format($desa->ongkos_kirim),
				'<div class="btn-group">
					<button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						Action
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="javascript:void(0);" data-provinsi="' . $desa->nama_provinsi . '" data-kabupaten="' . $desa->nama_kabupaten . '" data-kecamatan="' . $desa->nama_kecamatan . '" data-id="' . $desa->id_desa . '" data-nama="' . $desa->nama_desa . '" data-ongkos="' . $desa->ongkos_kirim . '" onclick="ubahDesa(this);">&nbsp;Ubah Desa</a></li>
						<li><a class="dropdown-item text-danger" data-id="' . $desa->id_desa . '" href="javascript:void(0);" onclick="deleteDesa(this);">&nbsp;Hapus Desa</a></li>
					</ul>
				</div>',
			);
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Datatable_model->count_all('tb_desa'),
			"recordsFiltered" => $this->Datatable_model->count_filtered('tb_desa', $columns, $joins, $filter, $this->input->post('search')['value'], $where), // Menggunakan filter
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function simpan()
	{
		try {
			// Mengambil data yang dikirimkan melalui Ajax
			$id = $this->input->post('select_kecamatan');
			$nama = $this->input->post('nama_desa');
			$ongkos = $this->input->post('ongkos_kirim');

			// Validasi data jika diperlukan
			if (empty($id) || empty($nama)) {
				echo json_encode(array('status' => 'error', 'message' => 'Data tidak lengkap.'));
				return;
			}

			$data = array(
				'id_kecamatan' => $id,
				'nama_desa' => $nama,
				'ongkos_kirim' => $ongkos
			);

			$result = $this->M_Crud->input_data($data, 'tb_desa'); // Ganti 'simpan_data' dengan method yang sesuai di model Anda

			echo json_encode(array('status' => 'success', 'message' => 'Data berhasil disimpan.'));
		} catch (Exception $e) {
			echo json_encode(array('status' => 'error', 'message' => 'Terjadi kesalahan dalam proses penyimpanan data.'));
		}
	}

	public function ubah()
	{
		try {
			$id = $this->input->post('id_desa');
			$nama = $this->input->post('nama_desa');
			$ongkos = $this->input->post('ongkos');

			$data = array(
				'nama_desa' => $nama,
				'ongkos_kirim' => $ongkos
			);

			$result = $this->M_Crud->update_data(['id_desa' => $id], $data, 'tb_desa');

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

	public function delete($id_desa)
	{
		try {
			$result = $this->M_Crud->hapus_data(array('id_desa' => $id_desa), 'tb_desa');
			echo json_encode(array('status' => 'success', 'message' => 'Data berhasil dihapus.'));
		} catch (Exception $e) {
			echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
		}
	}
}
