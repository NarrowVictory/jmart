<?php $this->load->view('layouts/kurir/head'); ?>
<style>
    ul.timeline {
        list-style-type: none;
        position: relative;
        padding-left: 40px;
    }

    ul.timeline:before {
        content: ' ';
        background: #d4d9df;
        display: inline-block;
        position: absolute;
        left: 29px;
        width: 2px;
        height: 100%;
        z-index: 2;
    }

    ul.timeline>li {
        margin: 20px 20px 20px 20px;
        padding-left: 10px;
    }

    ul.timeline>li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #22c0e8;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 2;
    }

    .navbar__left {
        width: 4rem;
        z-index: 2;
    }

    .title {
        font-weight: 700;
        margin-bottom: 0;
        color: #2C406E;
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


    .list-group li {
        margin-bottom: 12px;
    }

    .list li {
        list-style: none;
        padding: 10px;
        border: 1px solid #e3dada;
        border-radius: 5px;
        background: #fff;
    }

    .checkicon {
        color: green;
        font-size: 19px;
    }

    .date-time {
        font-size: 12px;
    }

    .profile-image img {
        margin-left: 3px;
    }
</style>
<?php $this->load->view('layouts/kurir/header'); ?>
<nav class="navbar navbar--show navbar-expand-lg navbar-light" style="background: #2F5596 !important;">
    <div class="container">
        <div class="navbar__left">
            <a href="<?= base_url('home') ?>">
                <svg class="navbar__left__icon fw-bold text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);cursor:pointer;z-index: 2;">
                    <path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path>
                </svg>
            </a>
        </div>

        <div class="nav-bar__center">
            <h1 class="nav-bar__center__title" style="font-family: gotham_fonts;color: white;line-height: 1.2;text-align:center !important;vertical-align:middle">Daftar Misi</h1>
        </div>
    </div>
</nav>

<div class="terms-tab-wrapper shadow">
    <div class="container">
        <ul class="nav row row--no terms-tab">
            <li class="nav-item col-6">
                <a class="nav-link active" id="Donasi-tab" data-toggle="tab" href="<?= base_url('misi/list') ?>" role="tab" aria-controls="home" aria-selected="true">Dalam Misi</a>
            </li>
            <li class="nav-item col-6">
                <a class="nav-link" id="Donasi-tab" data-toggle="tab" href="<?= base_url('misi/pending') ?>" role="tab" aria-controls="home" aria-selected="true">Belum Discan</a>
            </li>
        </ul>
    </div>
</div>

<section class="mt-3 mb-4">
    <div class="row">
        <div class="container">
            <ul class="list list-inline">
                <?php foreach ($list as $key => $value) : ?>
                    <a href="<?= base_url('misi/detail/' . $value['id_pesanan']) ?>" style="text-decoration: none;color:black">
                        <li class="d-flex justify-content-between" style="margin-bottom: 5px;">
                            <div class="d-flex flex-row align-items-center">
                                <img class="rounded-circle" src="https://i.imgur.com/wwd9uNI.jpg" width="30">
                                <div class="ml-2" style="margin-left: 10px !important;">
                                    <h4 class="mb-0">Muhammad Rifki Kardawi</h4>
                                    <div class="d-flex flex-row mt-1 text-black-50 date-time">
                                        <div>
                                            <i class="fa fa-dot-circle-o text-success"></i>
                                            <span class="fs-4 text-success" style="margin-left: 2px !important;">Active</span>
                                        </div>
                                        <div style="margin-left: 5px !important;">
                                            <i class="fa fa-clock-o"></i>
                                            <span class="fs-4"><?= date('d/M/Y H:i:s', strtotime($value['tgl_pesanan'])) ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <div class="d-flex flex-column fw-bold" style="margin-right: 2px;">
                                    Rp 50,000
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(192, 192, 192, 1)">
                                    <path d="M10.061 19.061 17.121 12l-7.06-7.061-2.122 2.122L12.879 12l-4.94 4.939z"></path>
                                </svg>
                            </div>
                        </li>
                    </a>
                <?php endforeach ?>

                <?php if (count($list) <= 0) : ?>
                    <div class="empty">
                        <div class="empty-header">404</div>
                        <p class="empty-title">Oops… Belum Ada Misi Tersedia</p>
                        <div class="empty-action">
                            <a href="<?= base_url('home') ?>" class="btn btn-primary">
                                <!-- Download SVG icon from http://tabler-icons.io/i/arrow-left -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l14 0"></path>
                                    <path d="M5 12l6 6"></path>
                                    <path d="M5 12l6 -6"></path>
                                </svg>
                                Kembali Ke Home
                            </a>
                        </div>
                    </div>
                <?php endif ?>
            </ul>
        </div>
    </div>
</section>

<div class="row">
    <br><br><br><br>
</div>
<?php $this->load->view('layouts/kurir/menu'); ?>
<?php $this->load->view('layouts/kurir/footer'); ?>
</body>

</html>