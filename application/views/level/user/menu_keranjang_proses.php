<?php $this->load->view('layouts/user/head'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icheck-bootstrap@3.0.1/icheck-bootstrap.min.css" />
<style>
   @font-face {
   font-family: 'gotham_fonts';
   src: url('<?= base_url('') ?>public/fonts/GothamBook.ttf');
   }
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
   .footer-nav {
   position: fixed;
   bottom: 0;
   background-color: #fff;
   width: 100%;
   z-index: 32;
   height: 60;
   }
   .footer-nav__link {
   text-align: center;
   padding: 0.8rem 0;
   display: block;
   color: #474645;
   }
   .footer-nav__link i {
   display: block;
   font-size: 2.8rem;
   margin-bottom: 0.5rem;
   }
   .footer-nav__link._active {
   color: #2F5596;
   }
   a:focus, a:hover {
   text-decoration: none;
   color: #2F5596;
   }
   .greeting-cs {
   background-color: #00b0d1;
   border-radius: 50%;
   width: 40px;
   height: 40px;
   }
   .row--5 {
   margin-left: -0.5rem !important;
   margin-right: -0.5rem !important;
   }
   .row--5 > * {
   padding-left: 0.5rem !important;
   padding-right: 0.5rem !important;
   }
   .container {
   padding-right: 1.6rem;
   padding-left: 1.6rem;
   }
   @media (min-width: 576px){
   .container {
   max-width: 540px;
   }
   }
   .card{
   border-radius: 0.25rem;
   border: 1px solid rgba(0,0,0,.125);
   background-color: #fff;
   flex-direction: column;
   background-clip: border-box;
   }
   .avatar {
   border-radius: 50%;
   object-fit: cover;
   }
   .minus_qty, .plus_qty{
   background-color: #fff;
   color: #005da6;
   text-align: center;
   }
   .qty_barang{
   font-size: 16px;
   border-radius: 0;
   text-align: center;
   color: #333;
   width: auto;
   max-width: 70px;
   }
</style>
<?php $this->load->view('layouts/user/header'); ?>
<nav class="navbar navbar--show navbar-expand-lg navbar-light" style="background: #2F5596 !important;">
   <div class="container nav-bar__on-container">
      <div class="navbar__left">
         <a href="<?= base_url('keranjang') ?>">
         <i class="navbar__left__icon bx bx-arrow-back fw-bold text-white" style="cursor:pointer;z-index: 2;"></i>
         </a>  
      </div>
      <div class="nav-bar__center">
         <h1 class="nav-bar__center__title" style="font-family: gotham_fonts;color: white;line-height: 1.2;">Proses Keranjang</h1>
      </div>
   </div>
</nav>
<section class="mt-3 mb-3">
   <div class="container">
      <div class="card mb-3 mt-2">
         <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
               <h6 class="fw-bold text-primary">Alamat Pengiriman</h6>
               <h6><a href=" javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editUser">Edit</a></h6>
            </div>
         </div>
         <div class="card-body pt-0">
            <table style="border-collapse: collapse;" class="border-0">
               <tr>
                  <td width="80"><strong>Kontak</strong></td>
                  <td width="15">:</td>
                  <td class="fs-6">Muhammad Rifki Kardawi</td>
               </tr>
               <tr>
                  <td><strong>Email</strong></td>
                  <td>:</td>
                  <td class="fs-6">rifki@yahoo.com</td>
               </tr>
               <tr>
                  <td><strong>Mobile</strong></td>
                  <td>:</td>
                  <td class="fs-6">089616384291</td>
               </tr>
               <tr>
                  <td><strong>Alamat</strong></td>
                  <td>:</td>
                  <td class="fs-6">Desa Kumbang Punteut (Dekat Puskesmas), BLANG MANGAT, KOTA LHOKSEUMAWE, NANGGROE ACEH DARUSSALAM (NAD), ID | 24375</td>
               </tr>
            </table>
         </div>
      </div>
   </div>
</section>

<section class="mt-3 mb-3">
   <div class="container">
      <div class="card mb-3 mt-2">
         <div class="card-header pb-0">
            <p class="text-lg fw7">Ringkasan Pesanan</p>
         </div>
         <div class="card-body pt-0">
            <div class="table-responsive">
               <table class="table mb-3">
                  <thead>
                     <tr>
                        <td class="fw-bold"  width="80px">Gambar</td>
                        <td class="fw-bold">Nama Barang</td>
                        <td  class="text-center fw-bold">Jumlah</td>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($keranjang as $key => $tmp): ?>
                     <tr>
                        <td><img class="img-fluid" src="<?= $tmp['gambar_barang1'] ?>" width="62" height="62" style="padding: 5px;"></td>
                        <td style="font-size: 14px;">
                           <?= $tmp['nama_brg'] . "<br>Rp. " . number_format($tmp['harga_promo']) . " | <del>" . number_format($tmp['harga_jual']) . "</del>" ?>
                        </td>
                        <td class="text-center"><br>x<?= $tmp['jumlah'] ?></td>
                     </tr>
                     <?php endforeach ?>
                  </tbody>
                  <tfoot>
                     <tr>
                        <td></td>
                        <td style="font-size: 16px;">
                           <?php
                              echo "Total Harga: Rp. " . number_format($total['total_harga']);
                           ?>
                        </td>
                        <td></td>
                     </tr>
                  </tfoot>
               </table>
               <table class="mt-3 mb-3" style="vertical-align: middle;">
                  <tr>
                    <td><label for="jenis_order">Jenis Order</label></td>
                    <td style="text-align: right !important;">
                      <select required name="jenis_order" id="jenis_order" class="form-select mb-2 w-100" style="border-radius: 0px;">
                        <option value="">Pilih Jenis Order</option>
                        <option value="ambil_sendiri">Ambil Sendiri</option>
                        <option value="dianterin">Dianterin</option>
                     </select>
                     </td>
                  </tr>
                  <tr>
                     <td>Metode Pembayaran</td>
                     <td style="text-align: right !important;">
                        <select required name="metode_bayar" id="metode_bayar" class="form-select mb-2" style="border-radius: 0px;">
                           <option value="">Pilih Metode Pembayaran</option>
                           <option value="cash">Cash</option>
                           <option value="transfer">Transfer</option>
                           <option value="autodebet">Autodebet</option>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <td>Ongkos Kirim</td>
                     <td class="text-right">
                        <input id="ongkos_kirim" name="ongkos_kirim" style="text-align: right !inherit;border-radius: 0px;" disabled type="text" class="form-control float-end mb-2" value="Rp. 0" placeholder="Rp. 0">
                     </td>
                  </tr>
                  <tr>
                     <td>Total Biaya</td>
                     <td>
                        <input id="total_biaya" name="total_biaya" style="text-align: right;border-radius: 0px;" disabled type="text" class="form-control mb-2" value="<?= "Rp. " . number_format($total['total_harga']) ?>" placeholder="Rp. 50000">
                     </td>
                  </tr>
                  <tr>
                     <td>Keterangan</td>
                     <td>
                        <textarea style="border-radius:0px" name="" id="" class="form-control" placeholder="Catatan"></textarea>
                     </td>
                  </tr>
               </table>
               <button id="btn-pesanan" class="btn btn-primary w-100 btn-block" disabled>Buat Pesanan</button>
               <button id="pay-button" class="btn btn-primary w-100 btn-block mt-2" disabled>Konfirmasi Pembayaran</button>
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
$(document).ready(function() {
  const metodeBayar = $('#metode_bayar');
  const btnPesanan = $('#btn-pesanan');
  const btnPayout = $('#pay-button');

  metodeBayar.on('change', function() {
    if (metodeBayar.val() === 'cash') {
      btnPesanan.prop('disabled', false);
      btnPayout.prop('disabled', true);
    } else if (metodeBayar.val() === 'autodebet') {
      btnPesanan.prop('disabled', false);
      btnPayout.prop('disabled', true);
    } else if (metodeBayar.val() === 'transfer') {
      btnPesanan.prop('disabled', true);
      btnPayout.prop('disabled', false);
    } else {
      btnPesanan.prop('disabled', false);
      btnPayout.prop('disabled', false);
    }
  });
});
</script>
</body>
</html>