<?php $this->load->view('layouts/admin/head'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<style>
    .page-link {
        position: relative;
        display: block;
        color: #626976;
        background-color: transparent;
        border: 0 solid #cbd5e1;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .bg-secondary {
        color: #ffffff !important;
        background: #626976 !important;
    }

    .dataTables_wrapper .row:first-child {
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: #EFF3F8;
    }

    .dataTables_wrapper .row:last-child {
        border-bottom: 1px solid #e0e0e0;
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: #EFF3F8;
    }

    .dataTables_wrapper .row {
        margin: 0 !important;
    }

    div.dataTables_wrapper div.dataTables_length label {
        font-weight: normal;
        text-align: left;
        white-space: nowrap;
    }

    div.dataTables_wrapper div.dataTables_filter input {
        margin-left: 0.5em;
        display: inline-block;
        width: auto;
    }

    .form-control-sm {
        width: 125px;
        height: 25px;
        line-height: 25px;
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
        padding-right: 40px;
    }

    .form-select-sm {
        width: 125px;
        height: 25px;
        line-height: 25px;
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
        padding-right: 40px;
    }

    .table-header {
        background-color: #307ECC;
        color: #FFF;
        font-size: 14px;
        line-height: 50px;
        padding-left: 12px;
        margin-bottom: 1px;
    }

    div.dataTables_wrapper div.dataTables_filter input {
        margin-bottom: 0 !important;
        margin: 0 8px;
    }

    div.dataTables_wrapper div.dataTables_length label {
        margin-bottom: 0 !important;
        margin: 0 8px;
    }

    div.dataTables_wrapper div.dataTables_info {
        margin-bottom: 0 !important;
        margin: 0 8px;
    }

    div.dataTables_wrapper div.dataTables_paginate {
        margin-bottom: 0 !important;
        margin: 0 8px;
    }

    .active>.page-link,
    .page-link.active {
        z-index: 3;
        color: #fff;
        background-color: #337ab7;
        border-color: #337ab7;
        cursor: pointer;
    }

    .table>tbody>tr:hover {
        background-color: #F5F5F5;
    }

    .card .table {
        box-shadow: none !important;
    }

    .rating .star {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        gap: 3px;
        font-size: 10px;
    }

    .rating .star .starred {
        color: #F0C434;
    }
</style>
<?php $this->load->view('layouts/admin/header'); ?>
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Data Produk
                </h2>
            </div>
        </div>
        <div class="row align-items-center mt-3">
            <div class="col">
                <div class="btn-group">
                    <a href="<?= base_url('product/tambah') ?>" class="btn btn-primary me-1" title="Kelola Tagihan">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        Tambah
                    </a>
                    <a href="<?= base_url('product/import') ?>" class="btn btn-secondary me-1" title="Lihat Diskon Tagihan">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-import" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                            <path d="M5 13v-8a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-5.5m-9.5 -2h7m-3 -3l3 3l-3 3"></path>
                        </svg>
                        Import
                    </a>
                    <a href="#" class="btn btn-success me-1" title="Lihat Diskon Tagihan">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-spreadsheet" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                            <path d="M8 11h8v7h-8z"></path>
                            <path d="M8 15h8"></path>
                            <path d="M11 11v7"></path>
                        </svg>
                        Export
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-sm-12">
                <div class="card table" style="margin-top: -5px !important;">
                    <div class="card-body p-0">
                        <div class="table-header">
                            Hasil Untuk Data Product
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="dataBarang" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;" width="7"><button class="table-sort">No</button></th>
                                        <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort"></button></th>
                                        <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Produk</button></th>
                                        <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Kategori</button></th>
                                        <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Penjualan</button></th>
                                        <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Harga Jual</button></th>
                                        <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Stock</button></th>
                                        <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Rating</button></th>
                                        <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Action</button></th>
                                    </tr>
                                    <tr>
                                        <th class="align-middle text-center">
                                            #
                                        </th>
                                        <th class="align-middle text-center">
                                            #
                                        </th>
                                        <th>
                                            <input type="text" class="form-control" placeholder="Nama Barang / Barcode" id="nama_barang_filter">
                                        </th>
                                        <th>
                                            <select class="form-control" name="nama_kategori_filter" id="nama_kategori_filter">
                                                <option value="" selected>** Filter Kategori</option>
                                                <?php foreach ($kategori as $key => $value) : ?>
                                                    <option value="<?= $value['id_kategori_brg'] ?>"><?= $value['nama_kategori_brg'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </th>
                                        <th class="align-middle text-center">
                                            #
                                        </th>
                                        <th class="align-middle text-center">
                                            #
                                        </th>
                                        <th class="align-middle text-center">
                                            #
                                        </th>
                                        <th class="align-middle text-center">
                                            #
                                        </th>
                                        <th class="align-middle text-center">
                                            #
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- START -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= base_url('product/simpan') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="max-height: calc(100vh - 200px);overflow-y: auto;">
                    <div class="container-xl">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control slug-title" id="nama_produk" name="nama_produk">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Kategori</label>
                                <select name="select_kategori" id="select_kategori" class="form-select">
                                    <option value="" selected disabled>Pilih Kategori</option>
                                    <?php foreach ($kategori as $kt) : ?>
                                        <option value="<?= $kt['id_kategori_brg'] ?>"><?= $kt['nama_kategori_brg'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="barcode" class="col-12 col-form-label">Barcode</label>
                                <div class="col-12">
                                    <input id="barcode" name="barcode" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="stock_brg" class="col-12 col-form-label">Stock Awal</label>
                                <div class="col-12">
                                    <input id="stock_brg" name="stock_brg" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="select_satuan" class="col-12 col-form-label">Satuan</label>
                                <div class="col-12">
                                    <select name="select_satuan" id="select_satuan" class="form-select">
                                        <option value="" selected disabled>Pilih Satuan</option>
                                        <?php foreach ($satuan as $st) : ?>
                                            <option value="<?= $st['id_satuan'] ?>"><?= $st['nama_satuan'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="alert_quantity" class="form-label">Alert Jumlah</label>
                                <input id="alert_quantity" name="alert_quantity" class="form-control" type="text">
                            </div>
                            <div class="col-md-6">
                                <label for="select_supplier" class="form-label">Pilih Supplier</label>
                                <select name="select_supplier" id="select_supplier" class="form-select">
                                    <option value="" selected disabled>Pilih Supplier</option>
                                    <?php foreach ($supplier as $sp) : ?>
                                        <option value="<?= $sp['id_supplier'] ?>"><?= $sp['nama_supplier'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="description" class="form-label">Sort Description</label>
                                <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Upload Gambar</label>
                                <input class="form-control" type="file" id="formFile" onchange="preview()" accept=".png,.jpg,.jpeg">
                                <button type="button" onclick="clearImage()" class="btn btn-danger mt-3">Clear Image</button>
                            </div>
                            <div class="col-md-6">
                                <img id="frame" src="" class="img-fluid" />
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="border-0 text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td><label for="hpp">HPP <span class="text-danger">*</span></label></td>
                                                <td></td>
                                                <td><label for="markup_barang">Markup (%)</label></td>
                                                <td></td>
                                                <td><label for="retail_price">Harga Jual <span class="text-danger">*</span></label></td>
                                                <td></td>
                                                <td><label for="ref_tax_id">Pajak</label></td>
                                                <td></td>
                                                <td><label for="retail_price_aft_tax">Harga Jual <span class="text-danger">*</span></label></td>
                                            </tr>
                                            <tr>
                                                <td class="step_two">
                                                    <input type="text" class="form-control" id="hpp" name="hpp_barang" placeholder="HPP" value="">
                                                </td>
                                                <td class="center" width="40">
                                                    <hr>
                                                </td>
                                                <td class="step_three">
                                                    <input type="text" class="form-control" id="markup_barang" name="markup_barang" placeholder="Markup (%)" value="">
                                                </td>
                                                <td class="center" width="40">
                                                    <hr>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="harga_jual_barang" name="harga_jual_barang" placeholder="Harga Jual" value="">
                                                </td>
                                                <td class="center" width="40">
                                                    <hr>
                                                </td>
                                                <td>
                                                    <select class="form-control select2" name="ppn_barang" id="ppn">
                                                        <option value="" selected disabled>**</option>
                                                        <option value="N">Tidak PPN</option>
                                                        <option value="Y">PPN</option>
                                                    </select>
                                                </td>
                                                <td class="text-right" width="40" style="padding-right: 10px;">
                                                    <hr>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control numeric" name="total_jual" id="total_jual" placeholder="Harga Jual Setelah Pajak" value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="ket-input">Tidak termasuk pajak</div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <div class="ket-input">Tidak termasuk pajak</div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <div class="ket-input">Termasuk pajak</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->


<!-- START -->
<div class="modal fade" id="detailProductModal" tabindex="-1" aria-labelledby="detailProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= base_url('product/simpan') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailProductModalLabel">Detail Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="max-height: calc(100vh - 200px);overflow-y: auto;">
                    <div class="container-xl">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6" style="position: relative;">
                                <img src="https://mir-s3-cdn-cf.behance.net/projects/404/1152c0119714885.Y3JvcCwzNDc2LDI3MTksMjU4LDA.png">
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-6">
                                <h2 class="m-t-40">Kratindaeng Energy Drink 150 ml</h2>
                                <h2 style="margin-top: -10px;" class="m-t-40">Rp. 6,500 <small class="text-success">(36% off)</small></h2>
                                <h4 class="text-success" style="margin-top: -10px;">Promo On</h4>
                            </div>
                        </div>
                        <hr style="color:white;margin-bottom:-20px">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
                                <h3 class="box-title m-t-40">General Info</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td width="200">Nama Barang</td>
                                                <td> Kratindaeng Energy Drink 150 ml </td>
                                            </tr>
                                            <tr>
                                                <td>Barcode</td>
                                                <td> 123456789812 </td>
                                            </tr>
                                            <tr>
                                                <td>Nama Supplier</td>
                                                <td> </td>
                                            </tr>
                                            <tr>
                                                <td>Stock</td>
                                                <td> 100 Pcs </td>
                                            </tr>
                                            <tr>
                                                <td>HPP Barang</td>
                                                <td> Rp. 5,000 </td>
                                            </tr>
                                            <tr>
                                                <td>Markup Barang</td>
                                                <td> 0 % </td>
                                            </tr>
                                            <tr>
                                                <td>PPN</td>
                                                <td> Ya </td>
                                            </tr>
                                            <tr>
                                                <td>Harga Jual Barang</td>
                                                <td> Rp. 7,100 </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->
<?php $this->load->view('layouts/admin/footer'); ?>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataBarang').DataTable({
            "lengthMenu": [10, 25, 50, 100],
            ordering: false,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('product/json'); ?>",
                "type": "POST",
                data: function(d) {
                    d.nama = $('#nama_barang_filter').val();
                    d.kategori = $('#nama_kategori_filter').val();
                }
            },
            columns: [{
                    data: "0",
                    className: "text-center align-middle"
                },
                {
                    data: "1",
                    className: "text-center align-middle"
                },
                {
                    data: "2"
                },
                {
                    data: "3",
                    className: "text-left align-middle"
                },
                {
                    data: "4",
                    className: "text-end align-middle"
                },
                {
                    data: "5",
                    className: "text-end align-middle dt-nowrap"
                },
                {
                    data: "6",
                    className: "text-end align-middle dt-nowrap"
                },
                {
                    data: "7",
                    className: "text-center align-middle dt-nowrap"
                },
                {
                    data: "8",
                    className: "text-center align-middle dt-nowrap"
                },
            ]
        });

        $('#nama_barang_filter').on('change', function() {
            $('#dataBarang').DataTable().ajax.reload();
        });

        $('#nama_kategori_filter').on('input', function() {
            $('#dataBarang').DataTable().ajax.reload();
        });
    });

    function ubahProduk() {
        $("#editProductModal").modal('show');
    }

    function detailProduk() {
        $("#detailProductModal").modal('show');
    }
</script>
</body>

</html>