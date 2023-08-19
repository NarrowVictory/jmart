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
    <div class="container">
    <div class="nav-bar__left">
    <h1 class="nav-bar__center__title" style="font-family: gotham_fonts;color: white;line-height: 1.2;">Keranjang</h1>
    </div>
    </div>
</nav>

<section class="mt-4 mb-4">
   <div class="container">
        <div class="card mt-2">
            <div class="card-body pb-1 pt-1 pl-0 pr-0">
               <div class="row p-2">
                  <div class="col-1 d-flex align-items-center justify-content-center text-center">
                     <div class="icheck-primary" style="padding-left: 30px;">
                        <input name="pilih_semua" type="checkbox" id="pilih_semua" class="" />
                        <label for="pilih_semua"></label>
                     </div>
                  </div>
                  <div class="col-8 d-flex align-items-center">
                    <div style="flex:1">
                      Pilih Semua
                    </div>
                  </div>
                  <div class="col-3 d-flex align-items-center justify-content-end">
                    <button class="btn btn-sm btn-danger"><i class="bx bx-trash"></i> Hapus</button>
                 </div>
               </div>
            </div>
         </div>
      <div class="load-data">
         <?php foreach ($keranjang as $key => $tmp): ?>
         <div class="card mt-2">
            <div class="card-body pb-1 pt-1 pl-0 pr-0">
               <div class="row p-2">
                  <div class="col-1 d-flex align-items-center justify-content-center text-center">
                     <div class="icheck-primary" style="padding-left: 30px;">
                        <input value="<?= $tmp['id_keranjang'] ?>" name="id_produk[]" type="checkbox" id="penanda<?= $key ?>" data-key="<?= $key ?>" class="checkbox-produk" />
                        <label for="penanda<?= $key ?>"></label>
                     </div>
                  </div>
                  <div class="col-2">
                     <img class="img-fluid" src="<?= $tmp['gambar_barang1'] ?>" width="62" height="62" style="padding: 5px;">
                  </div>
                  <div class="col-9">
                     <div class="" style="flex:1">
                        <p class="mb-0"><b><?= $tmp['nama_brg'] ?></b></p>
                        <small class="text-muted"><?= $tmp['nama_kategori_brg'] ?></small>
                     </div>
                  </div>
               </div>
               <hr>
               <div class="row justify-content-between">
                  <div class="pl-0 flex-sm-col col-auto my-auto">
                     <div class="d-flex align-items-center qty-adjusment">
                        <div class="input-group input-group-sm">
                          <span class="input-group-text">
                            <i style="cursor: pointer;" class="bx bx-minus minus_qty" data-keranjang="<?= $tmp['id_keranjang'] ?>" data-id="<?= $key ?>"></i>
                         </span>
                         <input value="<?= $tmp['jumlah'] ?>" min="1" type="number" class="form-control qty_barang" id="qty_barang<?= $key ?>">
                         <input type="hidden" id="harga_normal<?= $key ?>" value="<?= $tmp['harga_promo'] ?>">
                         <span class="input-group-text">
                            <i style="cursor: pointer;" class="bx bx-plus plus_qty" data-keranjang="<?= $tmp['id_keranjang'] ?>" data-id="<?= $key ?>"></i>
                         </span>
                      </div>
                     </div>
                  </div>
                  <div class="pl-0 flex-sm-col col-auto  my-auto">
                     <p><b data-id_minus="<?= $key ?>" id="harga_saat_ini<?= $key ?>">Rp. <?= number_format($tmp['harga_promo']) ?></b></p>
                     <p style="margin-top:-10px"><del><?= "Rp. " . number_format($tmp['harga_jual']) ?></del></p>
                  </div>
               </div>
            </div>
         </div>
         <?php endforeach ?>

         <div class="card mt-2 mb-3">
            <div class="card-body">
               <p class="text-lg fw7">Ringkasan Pesanan</p>
               <table class="table mb-3">
                  <tr>
                     <td>Total Produk</td>
                     <td width="1">:</td>
                     <td id="selected-count" style="text-align: right !important;">0 Produk</td>
                  </tr>
                  <tr>
                     <td>Total Biaya</td>
                     <td width="1">:</td>
                     <td id="selected-rp" style="text-align: right !important;">Rp. 0</td>
                  </tr>
               </table>
               <button id="btn-checkout" class="btn btn-primary w-100 btn-block">Checkout</button>
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
    let totalProduk = 0;
    let totalHarga = 0;
   
   $('.checkbox-produk').on('click', function() {
        const key = $(this).data('key');
        const hargaNormal = parseFloat($('#harga_normal' + key).val());
        const qty = parseInt($('#qty_barang' + key).val());

        if ($(this).prop('checked')) {
            totalProduk++;
            totalHarga += hargaNormal * qty;
        } else {
            totalProduk--;
            totalHarga -= hargaNormal * qty;
        }
        $('#selected-rp').text("Rp. " + totalHarga);
        $('#selected-count').text(totalProduk + ' Produk');

        const allChecked = $('.checkbox-produk:checked').length === $('.checkbox-produk').length;
        $('#pilih_semua').prop('checked', allChecked);
    });

   $('.plus_qty').on('click', function() {
        const keranjangId = $(this).data('keranjang');
        const key = $(this).data('id');
        const qtyElement = $('#qty_barang' + key);
        const hargaNormal = parseInt($('#harga_normal' + key).val());
        
        let qty = parseInt(qtyElement.val());
        qty++;
        qtyElement.val(qty);

        const checkbox = $('#penanda' + key);
        if (checkbox.prop('checked')) {
            let totalRpText = $('#selected-rp').text();
            let totalRp = parseInt(totalRpText.replace(/[^\d]/g, ''));
            totalRp += hargaNormal;

            $('#selected-rp').text("Rp. " + totalRp);
         }

      $.ajax({
         url: '<?= base_url('keranjang/update_jumlah') ?>', // Ganti URL_ANDA dengan URL controller CI3 Anda
         method: 'post',
         data: {id_keranjang: keranjangId, qty_barang: qty},
         success: function(response) {
           // Response dari controller akan dihandle di sini
           // Misalnya, Anda dapat melakukan sesuatu berdasarkan response dari server
           console.log(response);
         },
         error: function() {
           console.log('Error: Gagal mengirim request Ajax.');
         }
       });
    });

   $('.minus_qty').on('click', function() {
        const keranjangId = $(this).data('keranjang');
        const key = $(this).data('id');
        const qtyElement = $('#qty_barang' + key);
        const hargaNormal = $('#harga_normal' + key).val();
        
        let qty = parseInt(qtyElement.val());
        if (qty > 1) {
            qty--;
            qtyElement.val(qty);

            const checkbox = $('#penanda' + key);
            if (checkbox.prop('checked')) {
                  let totalRpText = $('#selected-rp').text();
                  let totalRp = parseInt(totalRpText.replace(/[^\d]/g, ''));
                  totalRp -= hargaNormal;

                  $('#selected-rp').text("Rp. " + totalRp);
            }
        }

        $.ajax({
         url: '<?= base_url('keranjang/update_jumlah') ?>', // Ganti URL_ANDA dengan URL controller CI3 Anda
         method: 'post',
         data: {id_keranjang: keranjangId, qty_barang: qty},
         success: function(response) {
           console.log(response);
         },
         error: function() {
           console.log('Error: Gagal mengirim request Ajax.');
         }
       });
   });

   $('#btn-checkout').click(function() {
    var selectedProducts = [];

    $('input[name="id_produk[]"]:checked').each(function() {
      selectedProducts.push($(this).val());
    });

    // Jika tidak ada checkbox yang dicentang
    if (selectedProducts.length === 0) {
      alert("Silakan pilih minimal satu produk sebelum checkout.");
      return;
    }

    var url = "<?= base_url('') ?>keranjang/proses?selectedProducts=" + selectedProducts.join(',');
    window.location.href = url;
  });
});
</script>
</body>
</html>