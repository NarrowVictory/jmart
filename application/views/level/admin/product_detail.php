<?php $this->load->view('layouts/admin/head'); ?>
<?php $this->load->view('layouts/admin/header'); ?>
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="" style="font-size: calc(1.275rem + .3vw);"><?= $barang['nama_barang'] ?></h3>
                        <h6 class="card-subtitle" style="font-weight: 300;color: #6c757d;font-size: .875rem;margin-top: -0.375rem;"><?= $barang['nama_kategori_brg'] ?></h6>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6" style="position: relative;">
                                <img src="<?= $barang['gambar_barang'] ?>">
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-6">
                                <h4 class="box-title m-t-40" style="font-size: 1.125rem;">Product description</h4>
                                <p><?= $barang['description'] ?></p>
                                <h2 class="m-t-40"><?= "Rp. " . number_format($barang['harga_promo']) ?> <small class="text-success">(36% off)</small></h2>
                                <button onclick="location.href='<?= base_url('product') ?>'" class="btn btn-secondary btn-rounded"> Kembali </button>
                                <button class="btn btn-primary btn-rounded"> Buy Now </button>
                            </div>
                        </div>
                        <hr style="color:white;margin-bottom:-20px">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 mt-5">
                                <h3 class="box-title m-t-40">General Info</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td width="200">Nama Barang</td>
                                                <td> <?= $barang['nama_barang'] ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Barcode</td>
                                                <td> <?= $barang['barcode'] ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Nama Supplier</td>
                                                <td> <?= $barang['nama_supplier'] ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Stock</td>
                                                <td> <?= $barang['stock_brg'] . " " . $barang['nama_satuan'] ?> </td>
                                            </tr>
                                            <tr>
                                                <td>HPP Barang</td>
                                                <td> <?= "Rp. " . number_format($barang['hpp_barang']) ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Markup Barang</td>
                                                <td> <?= $barang['markup_barang'] . " %" ?> </td>
                                            </tr>
                                            <tr>
                                                <td>PPN</td>
                                                <td> <?= $barang['ppn_barang'] == "Y" ? "Ya" : "Tidak" ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Harga Jual Barang</td>
                                                <td> <?= "Rp. " . number_format($barang['harga_jual_barang']) ?> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 mt-5">
                                <h3 class="box-title m-t-40">Promo Info</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td width="200">Promo</td>
                                                <td> <?= $barang['promo_brg'] == "On" ? "On" : "Off" ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Harga Promo</td>
                                                <td> <?= "Rp. " . number_format($barang['harga_promo']) ?> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </div>
</div>
<?php $this->load->view('layouts/admin/footer'); ?>
</body>

</html>