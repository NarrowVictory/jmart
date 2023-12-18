<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
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
		$this->load->view('level/admin/master_kategori');
	}

	public function json()
	{
		$nama_kategori_filter = $this->input->post('nama_kategori');

		$columns = 'id_kategori_brg, nama_kategori_brg, icon_kategori';
		$filter = array('nama_kategori_brg'); // Sesuaikan dengan nama kolom yang ingin Anda filter
		$joins = array();

		$where = null;
		if ($nama_kategori_filter) {
			$where = "nama_kategori_brg LIKE '%" . $nama_kategori_filter . "%'";
		}

		$list = $this->Datatable_model->get_data('tb_kategori', $columns, $joins, $filter, $this->input->post('search')['value'], $where, $this->input->post('start'), $this->input->post('length'));

		$data = array();
		$no = $_POST['start'];
		foreach ($list->result() as $kategori) {
			$gambar = $kategori->icon_kategori == "" ? "<img src='https://dodolan.jogjakota.go.id/assets/media/default/default-product.png' height='80' alt='Gambar Kategori'>" : "<img src='" . base_url('public/template/upload/kategori/' . $kategori->icon_kategori) . "' height='80' alt='Gambar Kategori' onerror='https://dodolan.jogjakota.go.id/assets/media/default/default-product.png'>";
			$count = $this->db->where('id_kategori_brg', $kategori->id_kategori_brg)->count_all_results('tb_barang');
			$no++;
			$row = array(
				$no,
				$kategori->nama_kategori_brg,
				$gambar,
				$count . " Barang",
				'<div class="btn-group">
					<button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						Action
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="javascript:void(0);" data-id="' . $kategori->id_kategori_brg . '" onclick="lihatKategori(this);">&nbsp;Lihat Kategori</a></li>
						<li><a class="dropdown-item" href="javascript:void(0);" data-id="' . $kategori->id_kategori_brg . '" data-nama="' . $kategori->nama_kategori_brg . '" data-icon="' . $kategori->icon_kategori . '" onclick="ubahKategori(this);">&nbsp;Ubah Kategori</a></li>
						<li><a class="dropdown-item text-danger" data-id="' . $kategori->id_kategori_brg . '" href="javascript:void(0);" onclick="deleteKategori(this);">&nbsp;Hapus Kategori</a></li>
					</ul>
				</div>',
			);
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Datatable_model->count_all('tb_kategori'),
			"recordsFiltered" => $this->Datatable_model->count_filtered('tb_kategori', $columns, $joins, $filter, $this->input->post('search')['value'], $where), // Menggunakan filter
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function simpan()
	{
		try {
			$nama_kategori = $this->input->post('nama_kategori');
			$gambar_data = $_FILES['icon_kategori'];

			// Periksa jika file berhasil diunggah
			if ($gambar_data['error'] === 0) {
				$ext = pathinfo($gambar_data['name'], PATHINFO_EXTENSION);
				$nama_file = uniqid() . '_' . time() . '.' . $ext;
				$upload_path = FCPATH . 'public/template/upload/kategori/' . $nama_file; // Tentukan lokasi folder untuk menyimpan gambar

				if (move_uploaded_file($gambar_data['tmp_name'], $upload_path)) {
					// Gambar berhasil diunggah, simpan data ke database
					$data = array(
						'nama_kategori_brg' => $nama_kategori,
						'icon_kategori' => $nama_file
					);

					$result = $this->M_Crud->input_data($data, 'tb_kategori');

					echo json_encode(
						array(
							'status' => 'success',
							'message' => 'Data berhasil disimpan.'
						)
					);
				} else {
					echo json_encode(array('status' => 'error', 'message' => 'Gagal mengunggah gambar.'));
				}
			} else {
				echo json_encode(array('status' => 'error', 'message' => 'Gagal mengunggah gambar.'));
			}
		} catch (Exception $e) {
			echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
		}
	}

	public function ubah()
	{
		try {
			$id = $this->input->post('id_kategori');
			$nama = $this->input->post('nama_kategori');
			$gambarLama = $this->input->post('gambar_lama');

			if (isset($_FILES['icon_kategori']) && $_FILES['icon_kategori']['error'] === 0) {
				$gambar_data = $_FILES['icon_kategori'];

				if ($gambar_data['error'] === 0) {
					$ext = pathinfo($gambar_data['name'], PATHINFO_EXTENSION);
					$nama_file = uniqid() . '_' . time() . '.' . $ext;

					$upload_path = FCPATH . 'public/template/upload/kategori/' . $nama_file;

					if (move_uploaded_file($gambar_data['tmp_name'], $upload_path)) {
						$nama_file = $nama_file;

						$lokasi_folder = FCPATH . 'public/template/upload/kategori/'; // Tentukan 
						$path_to_file = $lokasi_folder . $gambarLama;

						// Hapus file gambar
						if (file_exists($path_to_file)) {
							unlink($path_to_file);
						}
					}
				}
			} else {
				$nama_file = $gambarLama;
			}

			$data = array(
				'nama_kategori_brg' => $nama,
				'icon_kategori' => $nama_file
			);

			$result = $this->M_Crud->update_data(['id_kategori_brg' => $id], $data, 'tb_kategori');

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

	public function delete($id_kategori)
	{
		try {
			// Dapatkan nama file gambar berdasarkan ID yang akan dihapus
			$data_kategori = $this->M_Crud->show('tb_kategori', ['id_kategori_brg' => $id_kategori])->row_array();
			$nama_file = $data_kategori['icon_kategori'];

			// Hapus data dari database
			$result = $this->M_Crud->hapus_data(array('id_kategori_brg' => $id_kategori), 'tb_kategori');

			if (!empty($nama_file)) {
				$lokasi_folder = FCPATH . 'public/template/upload/kategori/'; // Tentukan 
				$path_to_file = $lokasi_folder . $nama_file;

				// Hapus file gambar
				if (file_exists($path_to_file)) {
					unlink($path_to_file);
				}
			}

			echo json_encode(array('status' => 'success', 'message' => 'Data dan gambar berhasil dihapus.'));
		} catch (Exception $e) {
			echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
		}
	}
}
