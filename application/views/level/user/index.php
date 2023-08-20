<?php $this->load->view('layouts/user/head'); ?>
<link rel="stylesheet" href="<?= base_url() ?>public/template/vendor/libs/sweetalert2/sweetalert2.css" />
<?php $this->load->view('layouts/user/header'); ?>
<nav class="navbar navbar--show navbar-expand-lg navbar-light" style="background: #2F5596 !important;">
    <div class="container">
    <div class="nav-bar__left">
    <h1 class="nav-bar__center__title" style="font-family: gotham_fonts;color: white;line-height: 1.2;">Home</h1>
    </div>
    </div>
</nav>

<section class="mt-3 mb-1">
   <div class="container">
     <div class="input-group input-group-merge">
        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
        <input style="border-radius: 0.25rem;" type="text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31" />
     </div>
   </div>
</section>

<section class="mt-3 mb-1">
   <div class="container">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" style="width:100%;height:200px">
            <img src="https://sedekahonline.com/uploads/camp_slider/20220602134904-2022-06-02camp_slider134902.jpg" class="gambar d-block w-100" alt="..." style="width:100%;height:200px">
          </div>
          <div class="carousel-item" style="width:100%;height:200px">
            <img src="https://sedekahonline.com/uploads/camp_slider/20220525170938-2022-05-25camp_slider170935.jpg" class="gambar d-block w-100" alt="..." style="width:100%;height:200px">
          </div>
          <div class="carousel-item" style="width:100%;height:200px">
            <img src="https://sedekahonline.com/uploads/camp_slider/20230216141936-2023-02-16camp_slider141931.jpg" class="gambar d-block w-100" alt="..." style="width:100%;height:200px">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
   </div>
</section>

<section class="mt-3 mb-3">
   <div class="container">
      <div class="align-center row row--5">
         <?php foreach ($kategori as $key => $kt): ?>
         <div class="col-4 mt-2 p-0 m-0">
            <a href="#">
               <div class="card" style="border-radius: 0.25rem;border: 1px solid rgba(0,0,0,.125);background-color: #fff;flex-direction: column;box-shadow: 0 2px 4px 0 rgb(71 70 69 / 40%) !important;background-clip: border-box;">
                  <img src="https://sedekahonline.com/cc-content/themes/cicool-so/asset/img/icons/fitur-2.svg" height="35px" class="card-img-top" alt="Gambar Kartu" style="margin-top:10px">
                  <div class="card-body text-center pb-0 pt-3" style="margin-top:-10px">
                     <h6 class="card-title text-dark" style="font-size:12px"><?= $kt['nama_kategori_brg'] ?></h6>
                  </div>
               </div>
            </a>
         </div>
         <?php endforeach ?>
         <div class="col-4 mt-2">
            <a href="#">
               <div class="card">
                  <img src="https://sedekahonline.com/cc-content/themes/cicool-so/asset/img/icons/fitur-2.svg" height="35px" class="card-img-top" alt="Gambar Kartu" style="margin-top:10px">
                  <div class="card-body text-center pb-0 pt-3" style="margin-top:-10px;">
                     <h5 class="card-title text-dark" style="font-size:12px">Lihat Semua</h5>
                  </div>
               </div>
            </a>
         </div>
      </div>
   </div>
</section>

<section class="mt-4 mb-3">
   <div class="container">
      <span class="dblock fw-bold fsize-p-2 mar-bottom--x-half">Lagi Promo Nih!!</span>
      <div class="d-flex mb-2">
         <span class="fsize-m-2" style="flex: 1;">Daftar Barang Promo</span>
         <a href="#" class="fsize-m-2">Lihat Semua</a>
      </div>
      <div class="">
         <div class="scrollable-row justify-content-between d-flex overflow-auto">
            <?php foreach ($barang as $key => $brg): ?>
               <div class="col-sm-5 col-md-5 col-5 d-flex" style="padding-right: 10px;">
                  <div class="card mb-2">
                     <div class="p-2 text-center position-relative">
                        <a href="https://sedekahonline.com/campaign/view/bangunanalaulia" class="">
                           <img src="<?= $brg['gambar_barang1'] ?>" alt="Gambar Barang" loading="lazy" style="height: 70px !important;">
                        </a>
                     </div>
                     <div class="card-body pl-0 pr-0">
                        <h6 class="card-title text-muted"><?= $brg['nama_brg'] ?></h6>
                        <div class="mt-2">
                           <p class="text-primary mb-0" style="margin-top: -10px;">
                              <span class="fw-bold" style="font-size: 14px;">Rp. <?= number_format($brg['harga_promo']) ?></span>
                           </p>
                           <p class="text-primary mb-0">
                              <span id="persen" class="badge ml-2 bg-danger text-white"><?= number_format((($brg['harga_jual'] - $brg['harga_promo']) / ($brg['harga_jual']) * 100), 2) ?>%</span>
                              <del style="font-size: 12px;">Rp. <?= number_format($brg['harga_jual']) ?></del>
                           </p>
                        </div>
                        <div class="pt-2">
                           <div>
                              <button data-idproduk="<?= $brg['id_brg'] ?>" class="btn btn-primary btn-sm p-2 add_keranjang"><i class="bx bx-plus"></i> Keranjang</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            <?php endforeach ?>
         </div>
      </div>
   </div>
</section>

<section class="mt-4 mb-3">
   <div class="container">
      <div class="d-flex mb-2">
         <span class="fsize-m-2" style="flex: 1;">Rekomendasi Untuk Kamu</span>
         <a href="#" class="fsize-m-2">Lihat Semua</a>
      </div>
      <div class="">
         <div class="scrollable-row justify-content-between d-flex overflow-auto">
            <?php foreach ($barang as $key => $brg): ?>
               <div class="col-sm-5 col-md-5 col-5 d-flex" style="padding-right: 10px;">
                  <div class="card mb-2">
                     <div class="p-2 text-center position-relative">
                        <a href="https://sedekahonline.com/campaign/view/bangunanalaulia" class="">
                           <img src="<?= $brg['gambar_barang1'] ?>" alt="Gambar Barang" loading="lazy" style="height: 70px !important;">
                        </a>
                     </div>
                     <div class="card-body pl-0 pr-0">
                        <h6 class="card-title text-muted"><?= $brg['nama_brg'] ?></h6>
                        <div class="mt-2">
                           <p class="text-primary mb-0" style="margin-top: -10px;">
                              <span class="fw-bold" style="font-size: 14px;">Rp. <?= number_format($brg['harga_promo']) ?></span>
                           </p>
                        </div>
                        <div class="pt-2">
                           <div>
                              <button data-idproduk="<?= $brg['id_brg'] ?>" class="btn btn-primary btn-sm p-2 add_keranjang"><i class="bx bx-plus"></i> Keranjang</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            <?php endforeach ?>
         </div>
      </div>
   </div>
</section>

<section class="mt-1 mb-4">
   <div class="container">
      <div class="card">
         <div class="card-body text-center">
            <span class="text-center text-primary fw-bold">Ingin melaporkan Bug?</span>
            <p class="">
              Silahkan memberikan kritik dan saran terhadap aplikasi!
          </p>
          <a style="margin-top:-10px" href="<?= base_url('krisan') ?>" class="btn btn-success"><i class='bx bxs-paper-plane'></i> Kritik Saran</a>
         </div>
      </div>
   </div>
</section>

<section class="mt-1 mb-4">
   <div class="container">
      <span class="mb-2 fw-bold">5 Kritik Saran User JMART Terakhir</span>
      
      <div class="load-data overflow-auto">
         <div class="card mt-2 p-2">
            <div class="row">
               <div class="col-1 text-center">
                  1.
               </div>
               <div class="col-2">
                  <img src="https://sedekahonline.com/cc-content/themes/cicool-so/asset/uploads/user/default.png" class="avatar avatar--small mar-right--x-2 shadow" onerror="this.src='https://sedekahonline.com/cc-content/themes/cicool-so/asset/uploads/user/default.png';">
               </div>
               <div class="col-9">
                  <div class="" style="flex:1">
                     <span class="fsize-p-2 fcolor-primary fw-bold mar-bottom col-xs-12">Annisa</span>
                     <p class="fsize-m-4 fcolor-primary fw-bold mar-bottom col-xs-12">42 menit yang lalu </p>
                     <span class="dblock fsize-m-2">Kritik Saran 1</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="card mt-2 p-2">
            <div class="row">
               <div class="col-1">
                  2.
               </div>
               <div class="col-2">
                  <img src="https://sedekahonline.com/cc-content/themes/cicool-so/asset/uploads/user/default.png" class="avatar avatar--small mar-right--x-2 shadow" onerror="this.src='https://sedekahonline.com/cc-content/themes/cicool-so/asset/uploads/user/default.png';">
               </div>
               <div class="col-9">
                  <div class="" style="flex:1">
                     <span class="fsize-p-2 fcolor-primary fw-bold mar-bottom col-xs-12">Andi</span>
                     <p class="fsize-m-4 fcolor-primary fw-bold mar-bottom col-xs-12">48 menit yang lalu </p>
                     <span class="dblock fsize-m-2">Kritik Saran 2</span>
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
<script>
   document.addEventListener('DOMContentLoaded', function() {
      var myCarousel = new bootstrap.Carousel(document.getElementById('carouselExampleIndicators'), {
      interval: 1000 // Interval dalam milidetik (5000 ms = 5 detik)
      });
   });

   $('.add_keranjang').click(function() {
    // Mengambil data yang perlu ditambahkan ke database
    var idProduk = $(this).data('idproduk');
    var data = {
      idProduk: idProduk
    };

    $.ajax({
      url: '<?= base_url('keranjang/add') ?>', // Ganti dengan URL endpoint Anda
      type: 'POST', // Metode HTTP yang digunakan (POST, GET, dll.)
      data: data, // Data yang dikirim ke server
      success: function(response) {
        if (response.success == true) {
                Swal.fire({
                 title: 'Success!',
                 text: response.msg,
                 type: 'success',
                 customClass: {
                   confirmButton: 'btn btn-success'
                 },
                 buttonsStyling: false
                });
        }else{
                Swal.fire({
                 title: 'Error!',
                 text: response.msg,
                 type: 'error',
                 customClass: {
                   confirmButton: 'btn btn-danger'
                 },
                 buttonsStyling: false
                });
        }
      },
      error: function(request, status, error) {
        alert(request.responseText);
        },
    });
  });
</script>

</body>
</html>