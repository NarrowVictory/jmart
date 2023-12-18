<?php $this->load->view('layouts/user/head'); ?>
<style>
    .navbar {
        width: 100%;
        height: 4rem;
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

    .no-padding {
        margin: 0;
        /* Menghapus margin bawaan */
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
        background-color: #DFE8E3;
        border-radius: 100%;
        width: 45px;
        height: 45px;
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
                <a class="nav-link <?= isset($_GET['filter']) && $_GET['filter'] == "terbaru" ? "active" : "" ?>" id="Donasi-tab" data-toggle="tab" href="<?= base_url('promo?filter=terbaru') ?>" role="tab" aria-controls="home" aria-selected="true">Terbaru</a>
            </li>
            <li class="nav-item col-4">
                <a class="nav-link <?= isset($_GET['filter']) && $_GET['filter'] == "terlaris" ? "active" : "" ?>" id="Campaign-tab" data-toggle="tab" href="<?= base_url('promo?filter=terlaris') ?>" role="tab" aria-controls="profile" aria-selected="false">Terlaris <i class='bx bxs-up-arrow-alt'></i></a>
            </li>
            <?php
            $filter = isset($_GET['filter']) ? $_GET['filter'] : "tertinggi";
            $iconClass = ($filter === "tertinggi") ? "fa fa-arrow-up" : "fa fa-arrow-down";
            ?>
            <li class="nav-item col-4">
                <a class="nav-link <?= isset($_GET['filter']) && $_GET['filter'] == "tertinggi" ? "active" : "" ?><?= isset($_GET['filter']) && $_GET['filter'] == "terendah" ? "active" : "" ?>" id="harga" style="cursor: pointer;">Harga &nbsp;<i class='<?= $iconClass ?>'></i></a>
            </li>
        </ul>
    </div>
</div>

<section class="mt-4 mb-4">
    <div class="container">
        <div class="row">
            <?php foreach ($barang as $key => $value) : ?>
                <?php
                $gambar = $value['gambar_barang'] == "https://dodolan.jogjakota.go.id/assets/media/default/default-product.png" ? "<img style='\border-radius: 3px;' src='" . $value['gambar_barang'] . "'>" : "<img style='\border-radius: 3px;' src='" . base_url('public/template/upload/barang/' . $value['gambar_barang']) . "'>";
                ?>
                <div class="col-6 mb-3">
                    <div class="product-box">
                        <div class="product-box-img">
                            <a href="javascript::void">
                                <?= $gambar ?>
                            </a>

                            <div class="cart-box">
                                <a href="javascript::void" class="cart-bag add_keranjang" data-idproduk="<?= $value['id_brg'] ?>">
                                    <i class="fa fa-shopping-cart fw-bold text-primary"></i>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var anchorElement = document.querySelector("#harga");
    var urlParams = new URLSearchParams(window.location.search);
    var filter = urlParams.get('filter') || "tertinggi"; // Jika tidak ada filter, maka defaultnya "tertinggi"


    anchorElement.addEventListener("click", function() {
        // Toggle antara "tertinggi" dan "terendah" setiap kali elemen diklik
        filter = (filter === "tertinggi") ? "terendah" : "tertinggi";

        // Arahkan pengguna ke URL dengan parameter GET yang sesuai
        window.location.href = "<?= base_url('promo?filter=') ?>" + filter;
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
            } else {
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