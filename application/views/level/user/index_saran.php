<?php
// Periksa apakah ada flash data dengan key 'success_message'
if ($this->session->flashdata('success_message')) {
    // Jika ada, tampilkan pesan menggunakan JavaScript alert
    $pesan = $this->session->flashdata('success_message');
    echo "<script>alert('$pesan');</script>";
}
?>

<div class="layout-wrapper layout-content-navbar layout-without-menu" style="margin-top:70px !important">
	<div class="layout-container">
		<div class="layout-page">
			<!-- Content wrapper -->
			<div class="content-wrapper">
				<div class="container-xxl flex-grow-1 container-p-y">
					<!-- CARD KATEGORI -->
					<div class="col-md-12 col-lg-12 mb-3">
						<div class="card">
							<div class="card-header">
								<a href="<?= base_url('home') ?>" style="text-decoration: none;color: red;"><i style="font-size: 24px;color: red;" class='bx bx-arrow-back'></i> Kembali ke Beranda</a>
							</div>
							<div class="card-body">
								<h4>Form Penyampaian Kritik dan Saran</h4>
								<form method="POST" action="<?= base_url('home/plus_saran2') ?>">
									<div class="mb-3">
										<label class="form-label" for="basic-icon-default-fullname">Member ID</label><br>
										<input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
										<input type="hidden" name="nama_user" value="<?= $user['nama_member'] ?>">
										<input type="hidden" id="wa_member" name="wa_member" value="6285277961769">
										<span class="fw-light fs-6"><?= $user['nomor_induk'] ?></span>
									</div>
									<div class="mb-3">
										<label class="form-label" for="basic-icon-default-company">Perihal <span style="color: red !important;font-weight: bold;"><sup>*</sup></span></label>
										<div class="input-group input-group-merge">
											<span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
											<select required name="perihal" id="perihal" class="form-select">
												<option value="">Tolong Pilih Perihal</option>
												<option value="Beranda">Beranda</option>
												<option value="Keranjang">Keranjang</option>
												<option value="Promo">Promo</option>
												<option value="Pesanan">Pesanan</option>
												<option value="Akun">Akun</option>
												<option value="Lainnya">Lainnya</option>
											</select>
										</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="basic-default-message">Kritik dan Saran <span style="color: red !important;font-weight: bold;"><sup>*</sup></span></label>
										<textarea rows="10" id="basic-default-message" class="form-control" id="kritik_saran" name="kritik_saran" placeholder="Ex : Tolong dong di keranjang buat opsi untuk kode voucher agar bisa mendapatkan diskon!"></textarea>
									</div>
									<div class="mb-3">
										<label class="form-label" for="basic-icon-default-fullname">Waktu</label><br>
										<span class="fw-light fs-6"><?= date('d-m-Y H:i:s') ?></span>
									</div>
									<div class="mb-3">
										<span style="color: red !important;font-weight: bold;"><sup>**</sup></span> Kritik dan Saran dari Anda akan terkirim langsung kepada Pimpinan J-Mart serta dijamin kerahasiaannya.
									</div>
									<br>
									<button id="btn-wa" type="submit" class="btn btn-primary">Submit</button>
									<button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-success">List Kritik/Saran Anda</button>
								</form>
							</div>
						</div>
					</div>
					<!-- END CARD REKOMENDASI -->
				</div>
				<!-- Footer -->
				<div class="break">
					<br />
					<br />
				</div>
				<?php
				include(APPPATH . 'views/layouts/user/menu.php');
				?>
				<!-- / Footer -->
				<div class="content-backdrop fade"></div>
			</div>
			<!-- Content wrapper -->
		</div>
		<!-- / Layout page -->
	</div>
</div>

 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Kritik dan Saran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height: 60vh;overflow-y: auto;">
            	<div class="table-responsive">
	                <table class="table table-striped">
	                    <thead>
	                        <tr>
	                            <th scope="col">Member ID</th>
	                            <th scope="col">Perihal</th>
	                            <th scope="col">Kritik dan Saran</th>
	                            <th scope="col">Waktu</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	<?php foreach ($saran as $key => $value): ?>
	                        <tr>
	                            <td><?= $value['nomor_induk'] ?></td>
	                            <td><?= $value['perihal'] ?></td>
	                            <td><?= $value['kritik_saran'] ?></td>
	                            <td>
	                            	<?php
	                            	$tanggal_string = $value['created_at'];
	                            	$tanggal_format = date('d/m/y H:i:s', strtotime($tanggal_string));
	                            	echo $tanggal_format; 
	                            	?>		
	                            </td>
	                        </tr>
	                        <?php endforeach ?>
	                        <!-- Tambahkan baris tabel lainnya sesuai data yang ingin ditampilkan -->
	                    </tbody>
	                </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>