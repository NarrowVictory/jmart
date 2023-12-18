<?php
$segment = $this->uri->segment(1);
?>

<footer class="footer-nav">
   <div class="container">
      <div class="row">
         <div class="col-2">
            <a href="<?= base_url('home') ?>" class="footer-nav__link 
               <?= $segment == 'home' ? '_active' : '' ?>
               <?= $segment == 'misi' ? '_active' : '' ?>
               ">
               <i class="fa fa-home" style="font-size: 24px;margin-top: 10px;margin-bottom: 0px;"></i>
               <span style="font-size: 12px;">Home</span>
            </a>
         </div>
         <div class="col-2">
            <a href="<?= base_url('chat') ?>" class="footer-nav__link <?= $segment == 'chat' ? '_active' : '' ?>">
               <i class="fa fa-comment" style="font-size: 24px;margin-top: 10px;margin-bottom: 0px;"></i>
               <span style="font-size: 12px;">Chat</span>
            </a>
         </div>
         <div class="col-2">
            <a href="<?= base_url('pesanan_user') ?>" class="footer-nav__link <?= $segment == 'pesanan_user' ? '_active' : '' ?>">
               <i class="fa fa-shopping-cart" style="font-size: 24px;margin-top: 10px;margin-bottom: 0px;"></i>
               <span style="font-size: 12px;">Pesanan</span>
            </a>
         </div>
         <div class="col-2">
            <a href="<?= base_url('map') ?>" class="footer-nav__link <?= $segment == 'map' ? '_active' : '' ?>">
               <span class="greeting-cs bg-transparent" style="text-align:center !important;display: inline-block !important;">
                  <i class="fa fa-map-marker" style="font-size: 24px;margin-top: 10px;margin-bottom: 0px;"></i>
                  <span style="font-size: 12px;">Mapping</span>
               </span>
            </a>
         </div>
         <div class="col-2">
            <a href="<?= base_url('akun') ?>" class="footer-nav__link <?= $segment == 'akun' ? '_active' : '' ?>">
               <i class="fa fa-user" style="font-size: 24px;margin-top: 10px;margin-bottom: 0px;"></i>
               <span style="font-size: 12px;">Profil</span>
            </a>
         </div>
         <div class="col-2">
            <a href="<?= base_url('login/logout') ?>" class="footer-nav__link" onclick="return confirm('Yakin ingin logout dari aplikasi?')">
               <i class="fa fa-sign-out" style="font-size: 24px;margin-top: 10px;margin-bottom: 0px;"></i>
               <span style="font-size: 12px;">Logout</span>
            </a>
         </div>
      </div>
   </div>
</footer>