<?php
$current_url = current_url();
?>

<header class="navbar-expand-md">
   <div class="collapse navbar-collapse" id="navbar-menu">
      <div class="navbar navbar-dark">
         <div class="container-xl">
            <ul class="navbar-nav">
               <li class="nav-item <?= ($this->uri->segment(1) == "home") ? 'active' : '';  ?>">
                  <a class="nav-link" href="<?= base_url('home') ?>">
                     <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                           <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                           <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                           <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                        </svg>
                     </span>
                     <span class="nav-link-title">
                        Home
                     </span>
                  </a>
               </li>
               <li class="nav-item dropdown 
               <?= ($this->uri->segment(1) == "provinsi") ? 'active' : '';  ?>
               <?= ($this->uri->segment(1) == "kabupaten") ? 'active' : '';  ?>
               <?= ($this->uri->segment(1) == "kecamatan") ? 'active' : '';  ?>
               <?= ($this->uri->segment(1) == "desa") ? 'active' : '';  ?>
               ">
                  <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                     <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-google-maps" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M12 9.5m-2.5 0a2.5 2.5 0 1 0 5 0a2.5 2.5 0 1 0 -5 0"></path>
                           <path d="M6.428 12.494l7.314 -9.252"></path>
                           <path d="M10.002 7.935l-2.937 -2.545"></path>
                           <path d="M17.693 6.593l-8.336 9.979"></path>
                           <path d="M17.591 6.376c.472 .907 .715 1.914 .709 2.935a7.263 7.263 0 0 1 -.72 3.18a19.085 19.085 0 0 1 -2.089 3c-.784 .933 -1.49 1.93 -2.11 2.98c-.314 .62 -.568 1.27 -.757 1.938c-.121 .36 -.277 .591 -.622 .591c-.315 0 -.463 -.136 -.626 -.593a10.595 10.595 0 0 0 -.779 -1.978a18.18 18.18 0 0 0 -1.423 -2.091c-.877 -1.184 -2.179 -2.535 -2.853 -4.071a7.077 7.077 0 0 1 -.621 -2.967a6.226 6.226 0 0 1 1.476 -4.055a6.25 6.25 0 0 1 4.811 -2.245a6.462 6.462 0 0 1 1.918 .284a6.255 6.255 0 0 1 3.686 3.092z"></path>
                        </svg>
                     </span>
                     <span class="nav-link-title">
                        Data Wilayah
                     </span>
                  </a>
                  <div class="dropdown-menu">
                     <div class="dropdown-menu-columns">
                        <div class="dropdown-menu-column">
                           <a class="dropdown-item <?= ($this->uri->segment(1) == "provinsi") ? 'active' : '';  ?>" href="<?= base_url('provinsi') ?>">
                              Data Provinsi
                           </a>
                           <a class="dropdown-item <?= ($this->uri->segment(1) == "kabupaten") ? 'active' : '';  ?>" href="<?= base_url('kabupaten') ?>">
                              Data Kabupaten
                           </a>
                           <a class="dropdown-item  <?= ($this->uri->segment(1) == "kecamatan") ? 'active' : '';  ?>" href="<?= base_url('kecamatan') ?>">
                              Data Kecamatan
                           </a>
                           <a class="dropdown-item  <?= ($this->uri->segment(1) == "desa") ? 'active' : '';  ?>" href="<?= base_url('desa') ?>">
                              Data Desa
                           </a>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="nav-item dropdown 
               <?= ($this->uri->segment(1) == "kategori") ? 'active' : '';  ?>
               <?= ($this->uri->segment(1) == "satuan") ? 'active' : '';  ?>
               <?= ($this->uri->segment(1) == "supplier") ? 'active' : '';  ?>
               ">
                  <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                     <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                           <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                           <path d="M12 12l8 -4.5" />
                           <path d="M12 12l0 9" />
                           <path d="M12 12l-8 -4.5" />
                           <path d="M16 5.25l-8 4.5" />
                        </svg>
                     </span>
                     <span class="nav-link-title">
                        Data Master
                     </span>
                  </a>
                  <div class="dropdown-menu">
                     <div class="dropdown-menu-columns">
                        <div class="dropdown-menu-column">
                           <a class="dropdown-item <?= ($this->uri->segment(1) == "kategori") ? 'active' : '';  ?>" href="<?= base_url('kategori') ?>">
                              Data Kategori
                           </a>
                           <a class="dropdown-item <?= ($this->uri->segment(1) == "satuan") ? 'active' : '';  ?>" href="<?= base_url('satuan') ?>">
                              Data Satuan
                           </a>
                           <a class="dropdown-item <?= ($this->uri->segment(1) == "supplier") ? 'active' : '';  ?>" href="<?= base_url('supplier') ?>">
                              Data Supplier
                           </a>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="nav-item dropdown <?= ($this->uri->segment(1) == "product") ? 'active' : '';  ?>">
                  <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                     <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-details" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M13 5h8"></path>
                           <path d="M13 9h5"></path>
                           <path d="M13 15h8"></path>
                           <path d="M13 19h5"></path>
                           <path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                           <path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                        </svg>
                     </span>
                     <span class="nav-link-title">
                        Product
                     </span>
                  </a>
                  <div class="dropdown-menu">
                     <div class="dropdown-menu-columns">
                        <div class="dropdown-menu-column">
                           <a class="dropdown-item 
                           <?= $current_url == base_url('product') ? "active" : "" ?>
                           <?= $current_url == base_url('product/tambah') ? "active" : "" ?>
                           " href="<?= base_url('product') ?>">
                              Data Produk
                           </a>
                           <a class="dropdown-item <?= $current_url == base_url('product/import') ? "active" : "" ?>" href="<?= base_url('product/import') ?>">
                              Import Produk
                           </a>
                           <a class="dropdown-item" href="./layout-vertical.html">
                              Pemesanan Produk
                           </a>
                           <a class="dropdown-item" href="./layout-vertical-transparent.html">
                              Pengaturan Promosi
                              <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                           </a>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="nav-item <?= $current_url == base_url('kasir') ? "active" : "" ?>">
                  <a class="nav-link" href="<?= base_url('kasir') ?>">
                     <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-scan" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path>
                           <path d="M4 17v1a2 2 0 0 0 2 2h2"></path>
                           <path d="M16 4h2a2 2 0 0 1 2 2v1"></path>
                           <path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path>
                           <path d="M5 12l14 0"></path>
                        </svg>
                     </span>
                     <span class="nav-link-title">
                        Kasir
                     </span>
                  </a>
               </li>
               <li class="nav-item <?= ($this->uri->segment(1) == "penjualan") ? 'active' : '';  ?>">
                  <a class="nav-link" href="<?= base_url('penjualan') ?>">
                     <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                           <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                           <path d="M17 17h-11v-14h-2"></path>
                           <path d="M6 5l14 1l-1 7h-13"></path>
                        </svg>
                     </span>
                     <span class="nav-link-title">
                        Penjualan
                     </span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./icons.html">
                     <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-text" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                           <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                           <path d="M9 9l1 0"></path>
                           <path d="M9 13l6 0"></path>
                           <path d="M9 17l6 0"></path>
                        </svg>
                     </span>
                     <span class="nav-link-title">
                        Laporan
                     </span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./icons.html">
                     <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments-horizontal" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M14 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                           <path d="M4 6l8 0"></path>
                           <path d="M16 6l4 0"></path>
                           <path d="M8 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                           <path d="M4 12l2 0"></path>
                           <path d="M10 12l10 0"></path>
                           <path d="M17 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                           <path d="M4 18l11 0"></path>
                           <path d="M19 18l1 0"></path>
                        </svg>
                     </span>
                     <span class="nav-link-title">
                        Settings
                     </span>
                  </a>
               </li>
            </ul>
         </div>
      </div>
   </div>
</header>