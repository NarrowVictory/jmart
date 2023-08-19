<?php $this->load->view('layouts/user/head'); ?>
<link rel="stylesheet" href="<?= base_url('') ?>public/template/vendor/libs/sweetalert2/sweetalert2.css" />
<style>
	.navbar__left{
      width: 4rem;
      z-index: 2;
   }

   .navbar__left__icon,{
	   position: absolute;
	   font-size: 3.2rem;
	   color: #fff;
	   top: 50%;
	   transform: translate(0, -50%);
	}

	.avatar {
	    border-radius: 50%;
	    object-fit: cover;
	}

	.avatar--large {
	    width: 7.6rem;
	    height: 7.6rem;
	}

	.input{
		margin-top: 0.4rem;
	    font-size: 1.1rem;
	    padding: 0;
	    outline: none;
	    width: 100%;
	    color: #474645;
	    border: none;
	    margin-bottom: 0.8rem;
	    border-bottom: 0.1rem solid #e8e8e8;
	}

	input[type="radio"] {
	  /* Sembunyikan tampilan asli */
	  appearance: none;
	  -webkit-appearance: none;
	  -moz-appearance: none;
	  /* Bentuk dan ukuran */
	  width: 20px;
	  height: 20px;
	  border: 1px solid #2F5596;
	  border-radius: 50%;
	  /* Gaya ketika dipilih */
	  outline: none;
	  /* Gambar latar belakang ketika dipilih */
	  background-color: #ffffff;
	  background-clip: content-box;
	  margin-top: 10px;
	  cursor: pointer;
	}

	/* Gaya ketika radio input dipilih */
	input[type="radio"]:checked {
	  background-color: blue; /* Warna latar belakang ketika dipilih */
	  /* Misalkan ada efek bayangan atau perubahan lain yang diinginkan */
	}
</style>
<?php $this->load->view('layouts/user/header'); ?>
<nav class="navbar navbar--show navbar-expand-lg navbar-light" style="background: #2F5596 !important;">
   <div class="container nav-bar__on-container">
      <div class="navbar__left">
         <a href="<?= base_url('akun') ?>">
         <i class="navbar__left__icon bx bx-arrow-back fw-bold text-white" style="cursor:pointer;z-index: 2;"></i>
         </a>  
      </div>
      <div class="nav-bar__center">
         <h1 class="nav-bar__center__title" style="font-family: gotham_fonts;color: white;line-height: 1.2;">Update Profile</h1>
      </div>
   </div>
</nav>

<section class="mt-4 mb-4">
   <div class="container">
    <div class="card">
		<div class="card-header">
			<h6 class="card-title">Set Alamat Utama</h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-1">
					<label class="custom-radio">
						<input type="radio" id="atur_utama1" name="alamat1" value="pria">
					</label>
				</div>
				<div class="col-9">
					Muhammad Rifki K | 6289726172913<br>
					<span>
						Desa Kumbang Punteut (Dekat Puskesmas)<br>
						BLANG MANGAT, KOTA LHOKSEUMAWE,<br>
						NANGGROE ACEH DARUSSALAM (NAD), ID<br>
						24375
					</span>
				</div>
				<div class="col-2">
					<a data-bs-toggle="modal" data-bs-target="#edit" href="#" class="text-danger fw-bold"> Ubah</a>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-1">
					<label class="custom-radio">
						<input type="radio" id="atur_utama2" name="alamat1" value="pria" checked>
					</label>
				</div>
				<div class="col-9">
					Ahmad Z | 6285629103781<br>
					<span>
						Desa A (Test Alamat)<br>
						KEC A, KOTA B,<br>
						NANGGROE ACEH DARUSSALAM (NAD), ID<br>
						24375
					</span>
				</div>
				<div class="col-2">
					<a data-bs-toggle="modal" data-bs-target="#edit" href="#" class="text-danger fw-bold"> Ubah</a>
				</div>
			</div>
			<hr>
			<div class="row d-flex justify-content-center" style="margin: 0;">
				<a data-bs-toggle="modal" data-bs-target="#tambah" href="#" class="text-center"><i class='bx bx-plus'></i> Tambah Alamat Baru</a>
			</div>
		</div>
	</div>
   </div>
</section>

<div class="row">
   <br><br><br><br>
</div>

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Alamat Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style=" max-height: calc(100vh - 200px);overflow-y: auto;">
        <form>
			<div class="mb-3">
				<label class="form-label" for="basic-default-fullname">Kontak</label>
				<input type="text" class="form-control" id="basic-default-fullname" placeholder="Nama Lengkap">
				<input type="text" class="form-control mt-2" id="basic-default-company" placeholder="No. HP">
			</div>
			<div class="mb-3">
				<label class="form-label" for="basic-default-fullname">Alamat</label>
				<select name="" id="" class="form-select">
					<option>Pilih Provinsi</option>
					<option>Provinsi A</option>
				</select>

				<select name="" id="" class="form-select mt-2">
					<option>Pilih Kabupaten</option>
					<option>Kabupaten A</option>
				</select>

				<select name="" id="" class="form-select mt-2">
					<option>Pilih Kecamatan</option>
					<option>Kecamatan A</option>
				</select>

				<select name="" id="" class="form-select mt-2">
					<option>Pilih Desa</option>
					<option>Desa A</option>
				</select>

				<input type="text" class="form-control mt-2" placeholder="Kode POS">
				<textarea name="" id="" class="form-control mt-2" placeholder="Detail Lainnya"></textarea>
			</div>
			<div class="mb-3">
				<div class="row mb-3">
					<label class="col-sm-3 col-form-label" for="basic-default-name">Tandai Sebagai</label>
					<div class="col-sm-9">
						<div class="button-row text-end justify-content-end">
							<button class="btn btn-secondary">Kantor</button>
							<button class="btn btn-success">Rumah</button>
							<button class="btn btn-secondary">Lainnya</button>
						</div>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-7 col-form-label" for="basic-default-name">Atur Sebagai Alamat Utama</label>
					<div class="col-sm-5 text-end justify-content-end">
						<div class="form-check form-switch ">
							<input style="height: 20px;width: 35px;float: right;" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
						</div>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-primary d-block w-100">Tambah</button>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Alamat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style=" max-height: calc(100vh - 200px);overflow-y: auto;">
        <form>
			<div class="mb-3">
				<label class="form-label" for="basic-default-fullname">Kontak</label>
				<input type="text" class="form-control" id="basic-default-fullname" placeholder="Nama Lengkap">
				<input type="text" class="form-control mt-2" id="basic-default-company" placeholder="No. HP">
			</div>
			<div class="mb-3">
				<label class="form-label" for="basic-default-fullname">Alamat</label>
				<select name="" id="" class="form-select">
					<option>Pilih Provinsi</option>
					<option>Provinsi A</option>
				</select>

				<select name="" id="" class="form-select mt-2">
					<option>Pilih Kabupaten</option>
					<option>Kabupaten A</option>
				</select>

				<select name="" id="" class="form-select mt-2">
					<option>Pilih Kecamatan</option>
					<option>Kecamatan A</option>
				</select>

				<select name="" id="" class="form-select mt-2">
					<option>Pilih Desa</option>
					<option>Desa A</option>
				</select>

				<input type="text" class="form-control mt-2" placeholder="Kode POS">
				<textarea name="" id="" class="form-control mt-2" placeholder="Detail Lainnya"></textarea>
			</div>
			<div class="mb-3">
				<div class="row mb-3">
					<label class="col-sm-3 col-form-label" for="basic-default-name">Tandai Sebagai</label>
					<div class="col-sm-9">
						<div class="button-row text-end justify-content-end">
							<button class="btn btn-secondary">Kantor</button>
							<button class="btn btn-success">Rumah</button>
							<button class="btn btn-secondary">Lainnya</button>
						</div>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-7 col-form-label" for="basic-default-name">Atur Sebagai Alamat Utama</label>
					<div class="col-sm-5 text-end justify-content-end">
						<div class="form-check form-switch ">
							<input style="height: 20px;width: 35px;float: right;" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
						</div>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-primary d-block w-100">Update</button>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('layouts/user/menu'); ?>
<?php $this->load->view('layouts/user/footer'); ?>
</body>
</html>