<?php 
if ($this->session->flashdata('error') != '') {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
    echo $this->session->flashdata('error');
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    echo '</div>';
}
?>

<?php 
	if ($this->session->flashdata('failed_register') != '') {
	echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
	echo $this->session->flashdata('failed_register');
	echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
	echo '</div>';
	}
?>

<div class="container-xxl">
	<div class="authentication-wrapper authentication-basic container-p-y">
		<div class="authentication-inner">

			<!-- Register Card -->
			<div class="card">
				<div class="card-body">
					<!-- Logo -->
					<div class="app-brand justify-content-center">
						<a href="index.html" class="app-brand-link gap-2">
							<span class="app-brand-logo demo">
								<img src="<?= base_url('public/template/img/favicon/jmart.jpg') ?>" alt="" style="height: 30px;width: auto;">
							</span>
						</a>
					</div>
					<!-- /Logo -->
					<h4 class="mb-2">Verifikasi Akun 🚀</h4>
					<p class="mb-4">Masukkan Kode Verifikasi yang dikirimkan ke Email anda!.</p>

					<form action="<?= base_url('') ?>register/kode" id="form-verifikasi" class="mb-3" method="POST">
						<div class="mb-3">
							<input type="hidden" name="access_key" id="access_key" value="<?= $id ?>">
							<label for="kode_verifikasi" class="form-label">Kode Verifikasi</label>
							<input oninput="checkLength(this)" required type="number" class="form-control" id="kode_verifikasi" name="kode_verifikasi" placeholder="Kode Verifikasi">
						</div>
						<button type="submit" class="btn btn-primary d-grid w-100">
							Verifikasi Akun
						</button>
					</form>

					<p class="text-center">
						<span>Tidak mendapatkan kode?</span>
						<a href="<?= base_url('login') ?>">
							<span>Kirim Ulang</span>
						</a>
					</p>
				</div>
			</div>
			<!-- Register Card -->
		</div>
	</div>
</div>

<script>
	function checkLength(input) {
		if (input.value.length > 6) {
			input.value = input.value.slice(0, 6); // Memotong angka menjadi 6 digit pertama
		}
	}
</script>