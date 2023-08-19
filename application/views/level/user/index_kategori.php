<style>
 /* Gaya untuk radio input */
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
}

/* Gaya ketika radio input dipilih */
input[type="radio"]:checked {
  background-color: blue; /* Warna latar belakang ketika dipilih */
  /* Misalkan ada efek bayangan atau perubahan lain yang diinginkan */
}
 </style>

<div class="layout-wrapper layout-content-navbar layout-without-menu mt-5">
	<div class="layout-container">
		<div class="layout-page">
			<!-- Content wrapper -->
			<div class="content-wrapper">
				<div class="container-xxl flex-grow-1 container-p-y">
					<!-- START -->
					<div class="row">
	               		<div class="col-7 col-md-7">
	               			<p class="text-white">Filter:</p>
	               			<div class="btn-group" role="group" aria-label="Urutkan" style="margin-top: -10px;">
	               				<a href="#" class="btn btn-sm me-2 btn-secondary">Promo</a>
	               				<a href="#" class="btn btn-sm me-2 btn-secondary">Terlaris</a>
	               				<a href="#" class="btn btn-sm me-2 btn-secondary"><i class='bx bx-chevrons-up'></i></a>
	               			</div>
	               		</div>
	               		<div class="col-5 col-md-5">
	               			<label for="sort-select" class="form-label text-white">Harga:</label>
	               			<select class="form-select form-select-sm" id="sort-select">
	               				<option value="terkait">Tinggi ke Rendah</option>
	               				<option value="terbaru">Rendah ke Tinggi</option>
	               			</select>
	               		</div>
	               	</div>
					<!-- END -->

					<!-- START -->
					<div class="row list-product mt-4">
						<?php foreach ($barang as $key => $value): ?>
						<div class="list-product-items col-sm-6 col-md-6 col-lg-2 col-6">
							<div class="card border-0 shadow-sm rounded-slg overflow-hidden mb-4">
								<!----><!---->
								<a href="javascipt::void" class="text-decoration-none">
									<div class="p-2 text-center position-relative">
										<img style="height: 120px !important;" src="<?= $value['gambar_barang1'] ?>"
										alt="KRATINGDAENG Energy Drink Botol 150 ml" loading="lazy" class="img-fluid"/>
									</div>
									<p class="mb-0 px-3 product_name text-muted">
										<?php
										// Misalkan variabel $value['nama_brg'] berisi teks yang ingin ditampilkan
										$nama_barang = $value['nama_brg'];

										// Periksa apakah panjang teks lebih dari 20 karakter
										if (strlen($nama_barang) > 28) {
										// Jika iya, potong teks menjadi 28 karakter dan tambahkan "..."
											$nama_barang_cropped = substr($nama_barang, 0, 28) . '...';
											// Tampilkan teks lengkapnya dengan menggunakan tooltip
											echo '<span data-bs-toggle="tooltip" title="' . $nama_barang . '">' . $nama_barang_cropped . '</span>';
										} else {
										// Jika teks kurang dari atau sama dengan 20 karakter, tampilkan tanpa tooltip
											echo $nama_barang;
										}
										?>
									</p>
									<!---->
									<div class="mt-2">
										<p class="price text-lg fw7 text-primary px-3 mb-0">
											<span class="fw-bold" style="font-size: 14px;">Rp. 100.000</span>
										</p>
										<p class="price text-lg fw7 text-primary px-3 mb-0">
											<span id="persen" class="badge px-2 ml-2 bg-danger">33%</span>
											<del style="font-size: 11px;">Rp. 150.000</del>
											<br>
											<span style="font-size: 10px !important;">Sisa 34 Pcs</span>
										</p>
									</div>
								</a>
								<div class="p-2">
									<div>
										<button class="btn btn-primary btn-sm p-2" style="margin-right: 5px;"><i class="bx bx-plus"></i> Keranjang</button>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach ?>
					</div>
					<!-- END -->
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

<script>
    // Aktifkan tooltip pada elemen yang memiliki atribut data-bs-toggle="tooltip"
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>