<?php $this->load->view('layouts/user/head'); ?>
<style>
	.navbar {
   width: 100%;
   height:4rem;
   color: #fff;
   z-index: 1;
   }
   .nav-bar__center__title {
   position: absolute;
   font-size: 1.1rem;
   font-weight: normal;
   text-align: center;
   width: 100%;
   margin: 0;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
   }
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

.terms-tab-wrapper {
    background-color: #fff;
}

.terms-tab-wrapper .terms-tab .nav-item .nav-link {
    text-align: center;
    font-weight: bold;
    color: #999999;
    padding: 0;
    height: 3.4rem;
    line-height: 3.4rem;
    border-bottom: 0;
    transition: .2s ease-in-out;
}

.terms-tab-wrapper .terms-tab .nav-item .nav-link.active {
    color: #2F5596;
    border-bottom: 0.4rem solid #2F5596;
}

.no-padding {
    margin: 0; /* Menghapus margin bawaan */
}
</style>
<?php $this->load->view('layouts/user/header'); ?>
<nav class="navbar navbar--show navbar-expand-lg navbar-light" style="background: #2F5596 !important;">
   <div class="container nav-bar__on-container" style="display: flex;">
      <div class="navbar__left">
         <a href="<?= base_url('pesanan') ?>">
         <i class="navbar__left__icon bx bx-arrow-back fw-bold text-white" style="cursor:pointer;z-index: 2;"></i>
         </a>  
      </div>
      <div class="nav-bar__center">
         <h1 class="nav-bar__center__title" style="font-family: gotham_fonts;color: white;line-height: 1.2;">Riwayat Pesanan Saya</h1>
      </div>
   </div>
</nav>
<div class="terms-tab-wrapper shadow">
    <div class="container">
        <ul class="nav row row--no terms-tab overflow-auto">
            <li class="nav-item col-2" style="margin-right: 5px;">
                <a class="nav-link active" id="Donasi-tab" data-toggle="tab" href="#AA" role="tab" aria-controls="home" aria-selected="true">Pending</a>
            </li>
            <li class="nav-item col-2" style="margin-right: 5px;">
                <a class="nav-link" id="Campaign-tab" data-toggle="tab" href="#AA" role="tab" aria-controls="profile" aria-selected="false">Dikemas</a>
            </li>
            <li class="nav-item col-2" style="margin-right: 5px;">
                <a class="nav-link" id="Campaign-tab" data-toggle="tab" href="#AA" role="tab" aria-controls="profile" aria-selected="false">Dikirim</a>
            </li>
            <li class="nav-item col-2" style="margin-right: 5px;">
                <a class="nav-link" id="Campaign-tab" data-toggle="tab" href="#AA" role="tab" aria-controls="profile" aria-selected="false">Selesai</a>
            </li>
            <li class="nav-item col-2" style="margin-right: 5px;">
                <a class="nav-link" id="Campaign-tab" data-toggle="tab" href="#AA" role="tab" aria-controls="profile" aria-selected="false">Dibatalkan</a>
            </li>
        </ul>
    </div>
</div>

<section class="mt-4 mb-4">
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
	   			<a href="<?= base_url('pesanan/detail/20230804210835146') ?>" class="text-primary fw-bold">#KodePesanan</a>
	   			<span class="text-end"><?= date('d/m/Y H:i:s') ?></span>
	   		</div>

            <div class="card-body">
            	<div class="row">
					<div class="col-3">
						<img src="https://asset-a.grid.id/crop/116x0:676x578/700x0/photo/2019/09/04/485157656.jpg" height="100px" alt="">
					</div>
					<div class="col-9">
						<span class="fw-bold">BRUNBRUN PARIS Nouvelle Jolie Fleur Eau de Toilette.</span><br>
						<div class="row" style="white-space: nowrap;">
							<div class="col-md-6 text-nowrap">
								<p>Parfum</p>
							</div>
							<div class="col-md-6 text-end text-nowrap">
								<p><span class="text-danger">Rp. 150,000</span> x1</p>
							</div>
						</div>
					</div>
				</div>
				<div class="container mt-4">
					<hr class="no-padding">
					<div class="row">
						<div class="col-md-3">
							<p style="margin-top: 10px;">1 Produk</p>
						</div>
						<div class="col-md-9 text-end">
							<p style="margin-top: 10px;">Total Pesanan : <span class="text-danger">Rp. 150,000</span></p>
						</div>
					</div>
					<hr class="no-padding">
				</div>
				<div class="container">
					<div class="row">
						<a href="<?= base_url('pesanan/tracking/20230804210835146') ?>" class="text-danger fw-bold" style="margin-top:10px; text-decoration: none; margin-bottom: 10px;">
                        <i class='bx bxs-car'></i> Pesanan Anda Menunggu Persetujuan Admin! <i class='bx bx-right-arrow-alt fw-bold'></i>
                    </a>
					</div>
				</div>
            </div>
        </div>
    </div>
</section>

<div class="row">
   <br><br><br><br>
</div>

<?php $this->load->view('layouts/user/menu'); ?>
<?php $this->load->view('layouts/user/footer'); ?>
</body>
</html>