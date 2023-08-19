<?php $this->load->view('layouts/user/head'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
<style>
	.category-slider {
	    background-color: #fff;
	    border-radius: 10px;
	    padding: 10px;
	    overflow: hidden;
	}

	.shadow-n {
	    box-shadow: 0 1px 3px rgb(214 221 237 / 50%), 0 1px 2px rgb(214 221 237 / 50%);
	}

	.swiper-container {
	  width: 100%;
	  margin: 0 auto;
	  overflow: hidden;
	}

	.swiper-slide {
	  text-align: center;
	  padding: 20px;
	  background-color: #f1f1f1;
	  color: #333;
	  white-space: nowrap;
	}

	.tagihan-card {
         border: 1px solid rgba(0,0,0,.125);
         box-shadow: 0 2px 4px 0 rgb(71 70 69 / 40%) !important;
         padding: 15px;
         margin-bottom: 20px;
         background-color: white;
     }

     .tagihan-title {
         font-size: 18px;
         margin-bottom: 10px;
     }

     .tagihan-info {
         font-size: 14px;
         color: #888;
     }

     .tagihan-amount {
         font-size: 20px;
         font-weight: bold;
         margin-top: 10px;
         color: red;
     }
</style>
<?php $this->load->view('layouts/user/header'); ?>
<nav class="navbar navbar--show navbar-expand-lg navbar-light" style="background: #2F5596 !important;">
    <div class="container">
    <div class="nav-bar__left">
    <h1 class="nav-bar__center__title" style="font-family: gotham_fonts;color: white;line-height: 1.2;">Pesanan</h1>
    </div>
    </div>
</nav>

<section class="mt-4 mb-4">
   <div class="container">
   	<div class="card">
   		<div class="card-header d-flex justify-content-between">
   			<div><i class='bx bx-notepad'></i> Pesanan Anda</div>
   			<a href="#" class="text-end">Lihat Riwayat</a>
   		</div>
   		<div class="card-body">
   			<div class="swiper-container">
   				<div class="swiper-wrapper">
   					<a href="<?= base_url('pesanan/pending') ?>" class="swiper-slide">
   						<i class="bx bx-notepad"></i><br>
   						<span style="font-size: 12px;">Pending <span class="badge bg-danger">1</span></span>
   					</a>
   					<a href="#" class="swiper-slide">
   						<i class="bx bx-notepad"></i><br>
   						<span style="font-size: 12px;">Dikemas <span class="badge bg-warning">0</span></span>
   					</a>
   					<a href="#" class="swiper-slide">
   						<i class="bx bx-notepad"></i><br>
   						<span style="font-size: 12px;">Dikirim <span class="badge bg-success">1</span></span>
   					</a>
   					<a href="#" class="swiper-slide">
   						<i class="bx bx-notepad"></i><br>
   						<span style="font-size: 12px;">Rating</span>
   					</a>
   				</div>
   				<div class="swiper-pagination"></div>
   			</div>
   		</div>
   	</div>
   	<div class="row mt-3">
         <div class="col-md-6" style="">
             <div class="card mb-2">
                 <div class="card-body text-center">
                     <h5 class="card-title">Belanja Bulan Ini</h5>
                     <p class="card-text fs-3 fw-bold" style="margin-top: -10px;">100</p>
                 </div>
             </div>
         </div>
         <div class="col-md-6" style="">
             <div class="card mb-2">
                 <div class="card-body text-center">
                     <h5 class="card-title">Total Belanja</h5>
                     <p class="card-text fs-3 fw-bold" style="margin-top: -10px;">150</p>
                 </div>
             </div>
         </div>
     </div>
     <div class="">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="tagihan-card">
                    <h5 class="tagihan-title">Tagihan Autodebit #NIK</h5>
                    <p class="tagihan-info">Jatuh Tempo: 31 September 2023</p>
                    <p class="tagihan-amount">Rp. 500,000</p>
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
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
var swiper = new Swiper('.swiper-container', {
  slidesPerView: 4, // Jumlah slide yang akan ditampilkan
  spaceBetween: 10, // Jarak antara slide
  loop: true, // Looping slide
   pagination: {
    el: '.swiper-pagination', // Navigasi paginasi
    clickable: true, // Mengaktifkan navigasi klik pada paginasi
  },
});
</script>
</body>
</html>