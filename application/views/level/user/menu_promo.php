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
      <div class="nav-bar__center">
         <h1 class="nav-bar__center__title" style="font-family: gotham_fonts;color: white;line-height: 1.2;">Promo</h1>
      </div>
   </div>
</nav>
<div class="terms-tab-wrapper shadow">
    <div class="container">
        <ul class="nav row row--no terms-tab">
            <li class="nav-item col-4">
                <a class="nav-link active" id="Donasi-tab" data-toggle="tab" href="#AA" role="tab" aria-controls="home" aria-selected="true">Terbaru</a>
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
        <div class="row list-product mt-4">
            <div class="list-product-items col-sm-6 col-md-6 col-lg-6 col-6">
                <div class="card border-0 shadow-sm rounded-slg overflow-hidden mb-4">
                    <!----><!---->
                    <a href="javascipt::void" class="text-decoration-none">
                        <div class="p-2 text-center position-relative">
                            <img style="height: 100px !important;" src="https://c.alfagift.id/product/1/1_A12630003501_20210708151453027_small.jpg"
                            alt="KRATINGDAENG Energy Drink Botol 150 ml" loading="lazy" class="img-fluid"/>
                        </div>
                        <p class="mb-0 px-3 product_name text-muted">
                            KRATINGDAENG Energy Drink Botol 150 ml
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
            <div class="list-product-items col-sm-6 col-md-6 col-lg-6 col-6">
                <div class="card border-0 shadow-sm rounded-slg overflow-hidden mb-4">
                    <!----><!---->
                    <a href="javascipt::void" class="text-decoration-none">
                        <div class="p-2 text-center position-relative">
                            <img style="height: 100px !important;" src="https://c.alfagift.id/product/1/1_A12630003501_20210708151453027_small.jpg"
                            alt="KRATINGDAENG Energy Drink Botol 150 ml" loading="lazy" class="img-fluid"/>
                        </div>
                        <p class="mb-0 px-3 product_name text-muted">
                            KRATINGDAENG Energy Drink Botol 150 ml
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
            <div class="list-product-items col-sm-6 col-md-6 col-lg-6 col-6">
                <div class="card border-0 shadow-sm rounded-slg overflow-hidden mb-4">
                    <!----><!---->
                    <a href="javascipt::void" class="text-decoration-none">
                        <div class="p-2 text-center position-relative">
                            <img style="height: 100px !important;" src="https://c.alfagift.id/product/1/1_A12630003501_20210708151453027_small.jpg"
                            alt="KRATINGDAENG Energy Drink Botol 150 ml" loading="lazy" class="img-fluid"/>
                        </div>
                        <p class="mb-0 px-3 product_name text-muted">
                            KRATINGDAENG Energy Drink Botol 150 ml
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
            <div class="list-product-items col-sm-6 col-md-6 col-lg-6 col-6">
                <div class="card border-0 shadow-sm rounded-slg overflow-hidden mb-4">
                    <!----><!---->
                    <a href="javascipt::void" class="text-decoration-none">
                        <div class="p-2 text-center position-relative">
                            <img style="height: 100px !important;" src="https://c.alfagift.id/product/1/1_A12630003501_20210708151453027_small.jpg"
                            alt="KRATINGDAENG Energy Drink Botol 150 ml" loading="lazy" class="img-fluid"/>
                        </div>
                        <p class="mb-0 px-3 product_name text-muted">
                            KRATINGDAENG Energy Drink Botol 150 ml
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
            <div class="list-product-items col-sm-6 col-md-6 col-lg-6 col-6">
                <div class="card border-0 shadow-sm rounded-slg overflow-hidden mb-4">
                    <!----><!---->
                    <a href="javascipt::void" class="text-decoration-none">
                        <div class="p-2 text-center position-relative">
                            <img style="height: 100px !important;" src="https://c.alfagift.id/product/1/1_A12630003501_20210708151453027_small.jpg"
                            alt="KRATINGDAENG Energy Drink Botol 150 ml" loading="lazy" class="img-fluid"/>
                        </div>
                        <p class="mb-0 px-3 product_name text-muted">
                            KRATINGDAENG Energy Drink Botol 150 ml
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
            <div class="list-product-items col-sm-6 col-md-6 col-lg-6 col-6">
                <div class="card border-0 shadow-sm rounded-slg overflow-hidden mb-4">
                    <!----><!---->
                    <a href="javascipt::void" class="text-decoration-none">
                        <div class="p-2 text-center position-relative">
                            <img style="height: 100px !important;" src="https://c.alfagift.id/product/1/1_A12630003501_20210708151453027_small.jpg"
                            alt="KRATINGDAENG Energy Drink Botol 150 ml" loading="lazy" class="img-fluid"/>
                        </div>
                        <p class="mb-0 px-3 product_name text-muted">
                            KRATINGDAENG Energy Drink Botol 150 ml
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
            <div class="list-product-items col-sm-6 col-md-6 col-lg-6 col-6">
                <div class="card border-0 shadow-sm rounded-slg overflow-hidden mb-4">
                    <!----><!---->
                    <a href="javascipt::void" class="text-decoration-none">
                        <div class="p-2 text-center position-relative">
                            <img style="height: 100px !important;" src="https://c.alfagift.id/product/1/1_A12630003501_20210708151453027_small.jpg"
                            alt="KRATINGDAENG Energy Drink Botol 150 ml" loading="lazy" class="img-fluid"/>
                        </div>
                        <p class="mb-0 px-3 product_name text-muted">
                            KRATINGDAENG Energy Drink Botol 150 ml
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