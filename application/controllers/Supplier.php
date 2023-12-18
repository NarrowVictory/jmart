<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
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
		$this->load->view('level/admin/master_supplier');
	}

	public function json()
	{
		$nama_supplier_filter = $this->input->post('nama');
		$pic_supplier_filter = $this->input->post('pic');
		$kontak_supplier_filter = $this->input->post('kontak');

		$columns = 'id_supplier, nama_supplier, pic, kontak_supplier';
		$filter = array('nama_supplier', 'pic', 'kontak_supplier'); // Sesuaikan dengan nama kolom yang ingin Anda filter
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

		$list = $this->Datatable_model->get_data('tb_supplier', $columns, $joins, $filter, $this->input->post('search')['value'], $where, $this->input->post('start'), $this->input->post('length'));

		$data = array();
		$no = $_POST['start'];
		foreach ($list->result() as $supplier) {
			$no++;
			$row = array(
				$no,
				$supplier->nama_supplier,
				$supplier->pic,
				$supplier->kontak_supplier,
				'<div class="btn-group">
					<button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						Action
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="javascript:void(0);" data-id="' . $supplier->id_supplier . '" data-nama="' . $supplier->nama_supplier . '" data-pic="' . $supplier->pic . '" data-kontak="' . $supplier->kontak_supplier . '"   onclick="ubahSupplier(this);">&nbsp;Ubah Supplier</a></li>
						<li><a class="dropdown-item text-danger" data-id="' . $supplier->id_supplier . '" href="javascript:void(0);" onclick="deleteSupplier(this);">&nbsp;Hapus Supplier</a></li>
					</ul>
				</div>',
			);
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Datatable_model->count_all('tb_supplier'),
			"recordsFiltered" => $this->Datatable_model->count_filtered('tb_supplier', $columns, $joins, $filter, $this->input->post('search')['value'], $where), // Menggunakan filter
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function simpan()
	{
		try {
			$nama = $this->input->post('nama_supplier');
			$pic = $this->input->post('pic_supplier');
			$kontak = $this->input->post('kontak_supplier');

			$data = array(
				'nama_supplier' => $nama,
				'pic' => $pic,
				'kontak_supplier' => $kontak,
			);

			$result = $this->M_Crud->input_data($data, 'tb_supplier');

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
			$id = $this->input->post('id_supplier');
			$nama = $this->input->post('nama_supplier');
			$pic = $this->input->post('pic_supplier');
			$kontak = $this->input->post('kontak_supplier');

			$data = array(
				'nama_supplier' => $nama,
				'pic' => $pic,
				'kontak_supplier' => $kontak,
			);

			$result = $this->M_Crud->update_data(['id_supplier' => $id], $data, 'tb_supplier');

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

	public function delete($id_supplier)
	{
		try {
			$result = $this->M_Crud->hapus_data(array('id_supplier' => $id_supplier), 'tb_supplier');
			echo json_encode(array('status' => 'success', 'message' => 'Data berhasil dihapus.'));
		} catch (Exception $e) {
			echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
		}
	}
}
