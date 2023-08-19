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

<style>
	.loading-overlay {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-color: rgba(255, 255, 255, 0.8);
		display: flex;
		align-items: center;
		justify-content: center;
		z-index: 9999;
	}

	.loading-spinner {
		text-align: center;
	}

	.loading-spinner i {
		font-size: 24px;
		margin-bottom: 10px;
	}
</style>

<div id="loading" class="loading-overlay" style="display: none;">
    <div class="loading-spinner">
        <i class='bx bx-refresh'></i> Loading...
    </div>
</div>

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
					<h4 class="mb-2">Register to J-MART 🚀</h4>
					<p class="mb-4">Masukkan Informasi dibawah ini untuk mendaftarkan akun Anda.</p>

					<form id="form-register" class="mb-3" method="POST">
						<div class="mb-3">
							<label for="wa_member" class="form-label">Nomor Whatsapp</label>
							<input required type="text" class="form-control" id="wa_member" name="wa_member" placeholder="Nomor Whatsapp. Ex: 0852xxxx" autofocus="">
						</div>
						<div class="mb-3">
							<label for="nomor_induk" class="form-label">Nomor Induk</label>
							<input required type="text" class="form-control" id="nomor_induk" name="nomor_induk" placeholder="Nomor Induk Karyawan">
						</div>
						<div class="mb-3">
							<label for="username" class="form-label">Username</label>
							<input required type="text" class="form-control" name="username" id="username" placeholder="Enter your username">
						</div>
						<div class="mb-3 form-password-toggle">
							<label class="form-label" for="password">Password</label>
							<div class="input-group input-group-merge">
								<input required type="password" id="password" class="form-control" name="password" placeholder="············" aria-describedby="password">
								<span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
							</div>
						</div>

						<div class="mb-3">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
								<label class="form-check-label" for="terms-conditions">
									I agree to
									<a href="javascript:void(0);">privacy policy &amp; terms</a>
								</label>
							</div>
						</div>
						<button type="submit" class="btn btn-primary d-grid w-100">
							Sign up
						</button>
					</form>

					<p class="text-center">
						<span>Sudah Punya Akun?</span>
						<a href="<?= base_url('login') ?>">
							<span>Masuk Sekarang</span>
						</a>
					</p>
				</div>
			</div>
			<!-- Register Card -->
		</div>
	</div>
</div>