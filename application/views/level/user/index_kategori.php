<?php $this->load->view('layouts/user/head'); ?>
<style>
	.navbar__left {
		width: 4rem;
		z-index: 2;
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

	.product-box {
		position: relative;
		border-radius: 8px;
		overflow: hidden;
		padding: 10px;
		background-color: rgba(235, 235, 236, 1);
	}

	.product-box .product-box-img {
		position: relative;
		display: block;
	}

	.product-box .product-box-img .img {
		position: relative;
		width: 100%;
		height: 146px;
		-o-object-fit: contain;
		object-fit: contain;
		border-radius: 8px;
		padding: 15px;
		background-color: rgba(255, 255, 255, 1);
	}

	.product-box .product-box-img .cart-box {
		position: absolute;
		bottom: -15px;
		right: 0;
		background-color: rgba(255, 255, 255, 1);
		border-radius: 100%;
		width: 36px;
		height: 36px;
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		justify-content: center;
		-webkit-box-align: center;
		-ms-flex-align: center;
		align-items: center;
	}

	.product-box .product-box-img .cart-box .cart-bag {
		background-color: rgba(18, 38, 54, 1);
		border-radius: 100%;
		height: 28px;
		width: 28px;
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		justify-content: center;
		-webkit-box-align: center;
		-ms-flex-align: center;
		align-items: center;
	}

	.product-box .product-box-detail h4 {
		color: rgba(18, 38, 54, 1);
		font-weight: 500;
		line-height: 1.5;
		margin-top: 15px;
		overflow: hidden;
		white-space: nowrap;
		text-overflow: ellipsis;
	}

	.gap-3 {
		gap: 1rem !important;
	}

	.product-box .product-box-detail h5 {
		overflow: hidden;
		white-space: nowrap;
		text-overflow: ellipsis;
		margin-top: 6px;
		font-size: 12px;
		font-weight: 400;
		color: rgba(var(--light-text), 1);
	}

	.product-box .product-box-detail h3 {
		color: rgba(18, 38, 54, 1);
	}

	.product-box .like-btn {
		position: absolute;
		top: 15px;
		right: 15px;
		line-height: 1;
		z-index: 1;
		border-radius: 10%;
		background-color: #ea4c62 !important;
		color: white;
		-webkit-box-shadow: 0px 2px 8px rgba(18, 38, 54, 0.1);
		box-shadow: 0px 2px 8px rgba(18, 38, 54, 0.1);
		padding: 6px;
		height: 24px;
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		justify-content: center;
		-webkit-box-align: center;
		-ms-flex-align: center;
		align-items: center;
	}

	.fw-semibold {
		font-weight: 600 !important;
	}
</style>
<?php $this->load->view('layouts/user/header'); ?>
<nav class="navbar navbar--show navbar-expand-lg navbar-light" style="background: #2F5596 !important;">
	<div class="container nav-bar__on-container">
		<div class="navbar__left">
			<a href="<?= base_url('home') ?>">
				<svg class="navbar__left__icon fw-bold text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);cursor:pointer;z-index: 2;">
					<path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path>
				</svg>
			</a>
		</div>
		<div class="nav-bar__center">
			<h1 class="nav-bar__center__title" style="font-family: gotham_fonts;color: white;line-height: 1.2;"><?= $header ?></h1>
		</div>
	</div>
</nav>
<div class="terms-tab-wrapper shadow">
	<div class="container">
		<ul class="nav row row--no terms-tab">
			<li class="nav-item col-4">
				<a class="nav-link" id="Donasi-tab" data-toggle="tab" href="#AA" role="tab" aria-controls="home" aria-selected="true">Promo</a>
			</li>
			<li class="nav-item col-4">
				<a class="nav-link" id="Campaign-tab" data-toggle="tab" href="#AA" role="tab" aria-controls="profile" aria-selected="false">Tinggi <i class='bx bxs-up-arrow-alt'></i></a>
			</li>
			<li class="nav-item col-4">
				<a class="nav-link" id="Campaign-tab" data-toggle="tab" href="#AA" role="tab" aria-controls="profile" aria-selected="false">Rendah <i class='bx bxs-down-arrow-alt'></i></a>
			</li>
		</ul>
	</div>
</div>

<section class="mt-4 mb-4">
	<div class="container">
		<div class="row">
			<?php foreach ($barang as $key => $value) : ?>
				<div class="col-6 mb-3">
					<div class="product-box">
						<div class="product-box-img">
							<a href="shop.html"> <img class="img" src="<?= $value['gambar_barang'] ?>" alt="p10"></a>

							<div class="cart-box">
								<a href="cart.html" class="cart-bag">
									<img class="outline-icon" src="https://themes.pixelstrap.com/fuzzy/assets/images/svg/like-fill.svg" alt="like">
								</a>
							</div>
						</div>
						<div class="like-btn animate">
							-8.5%
						</div>
						<div class="product-box-detail">
							<h4 style="font-size: 14px;margin-bottom: 0;"><?= $value['nama_barang'] ?></h4>
							<div class="d-flex justify-content-between gap-3">
								<h5 style="line-height: 1.2;margin-bottom: 0;"><?= $value['nama_kategori_brg'] ?></h5>
								<h3 class="fw-semibold">RP. <?= number_format($value['harga_jual_barang']) ?></h3>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>
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