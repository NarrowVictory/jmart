<?php
$segment = $this->uri->segment(1);
?>

<footer class="footer-nav">
 <div class="container">
    <div class="row">
       <div class="col-2">
          <a href="<?= base_url('home') ?>" class="footer-nav__link <?= $segment == 'home' ? '_active' : '' ?>">
          <i class="fa fa-home" style="font-size: 24px;margin-top: 10px;margin-bottom: 0px;"></i>
          <span>Home</span>
          </a>
       </div>
       <div class="col-2">
          <a href="<?= base_url('keranjang') ?>" class="footer-nav__link <?= $segment == 'keranjang' ? '_active' : '' ?>">
          <i class="fa fa-shopping-cart" style="font-size: 24px;margin-top: 10px;margin-bottom: 0px;"></i>
          <span>Keranjang</span>
          </a>
       </div>
       <div class="col-4">
          <a href="<?= base_url('promo') ?>" class="footer-nav__link">
             <span class="greeting-cs" style="text-align:center !important;display: inline-block !important;">
                <div style="margin-top: 7px"><img src="https://sedekahonline.com/cc-content/themes/cicool-so/asset/img/icons/circle-logo.svg" class="img-greeting"></div>
             </span>
          </a>
       </div>
       <div class="col-2">
          <a href="<?= base_url('pesanan') ?>" class="footer-nav__link <?= $segment == 'pesanan' ? '_active' : '' ?>">
          <i class="fa fa-list" style="font-size: 24px;margin-top: 10px;margin-bottom: 0px;"></i>
          <span>Pesanan</span>
          </a>
       </div>
       <div class="col-2">
          <a href="<?= base_url('akun') ?>" class="footer-nav__link <?= $segment == 'akun' ? '_active' : '' ?>">
          <i class="fa fa-user" style="font-size: 24px;margin-top: 10px;margin-bottom: 0px;"></i>
          <span>Profil</span>
          </a>
       </div>
    </div>
 </div>
</footer>