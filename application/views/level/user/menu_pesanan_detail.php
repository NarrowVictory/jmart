<?php $this->load->view('layouts/user/head'); ?>
<style>
	
</style>
<?php $this->load->view('layouts/user/header'); ?>
<nav class="navbar navbar--show navbar-expand-lg navbar-light" style="background: #2F5596 !important;">
   <div class="container nav-bar__on-container" style="display: flex;">
      <div class="navbar__left" style="z-index: 10;">
         <a href="<?= base_url('pesanan/pending') ?>">
         <i class="navbar__left__icon bx bx-arrow-back fw-bold text-white" style="cursor:pointer;z-index: 2;"></i>
         </a>  
      </div>
      <div class="nav-bar__center">
         <h1 class="nav-bar__center__title" style="font-family: gotham_fonts;color: white;line-height: 1.2;">#20230804210835146</h1>
      </div>
   </div>
</nav>

<header class="header-landing">
     <div class="card" style="background-color: #26aa99;border-radius: 0px !important;">
         <div class="card-body text-white text-left">
             <div class="row">
             	<div class="col-9">
             		<span class="d-block">Pesanan Selesai</span>
             		<span class="dblock fsize-m-2 mar-top--x-2">
             			Terimakasih sudah berbelanja di toko kami.
             		</span>
             	</div>
             	<div class="col-3">
             		<i class='bx bxs-shopping-bags' style="font-size: 48px;"></i>
             	</div>
             </div>
         </div>
     </div>
 </header>

 <header class="header-landing">
     <div class="card" style="box-shadow: none !important;">
     		<div class="card-header fw-bold pb-3">
     			<i class='bx bxs-car'></i> Informasi Pengiriman
     			<a href="<?= base_url('pesanan/tracking/20230804210835146') ?>" class="text-end float-end">Lacak</a>
     		</div>
         <div class="card-body text-success pb-3">
             <div class="mb-sm-0 mb-3 d-flex justify-content-between align-items-center">
          		<h6 class="mb-0">Terkirim</h6>
          		<small class="text-muted">7 Ags 12:50</small>
          	</div>
         </div>
     </div>
 </header>

 <header class="header-landing">
     <div class="card" style="box-shadow: none !important;">
     		<div class="card-header fw-bold pb-3">
     			<i class='bx bxs-edit-location' ></i> Alamat Pengiriman
     		</div>
         <div class="card-body pb-3">
             <div class="">
             	<div tabindex="0">Muhammad Rifki Kardawi</div>
             	<div>
             		<span tabindex="0">(+62) 85277961769</span><br>
             		<span tabindex="0">Desa Kumbang Punteut (Belakang Poskesdes), KOTA LHOKSEUMAWE, BLANG MANGAT, NANGGROE ACEH DARUSSALAM (NAD), ID, 24375</span>
             	</div>
             </div>
         </div>
     </div>
 </header>

<section class="mt-3 mb-4">
	<div class="container">
		<div class="card">
			<h5 class="card-header">Lacak Pesanan Anda</h5>
			<div class="card-body">
				<div class="card-datatable table-responsive">
					<table class="datatables-order-details table">
						<thead>
							<tr>
								<th></th>
								<th class="w-50">products</th>
								<th>total</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$total = 0;
							foreach ($pesanan as $key => $value): ?>
							<?php
							$total = $total + ($value['harga_saat_ini'] *  $value['jumlah_jual']);
							?>
							<tr>
								<td>
									<img height="50px" src="<?= $value['gambar_barang1'] ?>" alt="">
								</td>
								<td>
									<?= $value['nama_brg'] ?><br>
									<?=  "Rp. " . number_format($value['harga_saat_ini']) . " x" . $value['jumlah_jual'] ?>
								</td>
								<td>
									<?= $value['harga_saat_ini'] *  $value['jumlah_jual']?>
								</td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
					<div class="d-flex justify-content-end align-items-center m-3 mb-2 p-1">
						<div class="order-calculations">
							<div class="d-flex justify-content-between mb-2">
								<span class="w-px-100">Subtotal:</span>
								<span class="text-heading">Rp. 0000</span>
							</div>
							<div class="d-flex justify-content-between mb-2">
								<span class="w-px-100">Discount:</span>
								<span class="text-heading mb-0">Rp. 0000</span>
							</div>
							<div class="d-flex justify-content-between mb-2">
								<span class="w-px-100">Ongkos Kirim:</span>
								<span class="text-heading">Rp. 0000</span>
							</div>
							<div class="d-flex justify-content-between">
								<h6 class="w-px-100 mb-0">Total:</h6>
								<h6 class="mb-0">Rp. <?= number_format($total) ?></h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer border-top">
				<div class="justify-content-between text-center d-flex">
					<span>Faktur</span>
					<a href="" class="text-end float-end">Lihat</a>
				</div>
			</div>
		</div>
		<div class="card mt-3">
			<div class="card-header pb-0">
				<h5 class="card-title">Informasi Lanjutan</h5>
			</div>
			<div class="card-body pt-0">
				Metode Pembayaran : Cash <br>
				Jenis Order : Ambil Sendiri <br>
				Keterangan : Example..
			</div>
		</div>
		<a href="#" class="d-block btn btn-primary text-center justify-content-center mt-3">Beli Lagi</a>
	</div>
</section>

<div class="row">
   <br><br><br><br>
</div>

<?php $this->load->view('layouts/user/menu'); ?>
<?php $this->load->view('layouts/user/footer'); ?>
</body>
</html>