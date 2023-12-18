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
<div class="page-body">
    <div class="container-xl">
        <div class="mx-auto text-center justify-content-center">
            <a href="<?= base_url('product') ?>" class="btn btn-md mb-2 btn-warning"> <i class="fa fa-arrow-left fa-fw"></i> <span class="hidden-sm hidden-xs">Kembali</span> </a>
            <a href="http://simaset.id/public/admin/stock_persediaan/stock_masuk_pdf/BR000001" class="btn btn-flat btn-md mb-2 btn-danger"> <i class="fa fa-file-pdf fa-fw"></i> <span class="hidden-sm hidden-xs">Export PDF</span> </a>
            <a href="http://simaset.id/public/admin/stock_persediaan/stock_masuk_excel/BR000001" class="btn btn-flat btn-md mb-2 btn-success"> <i class="fa fa-file-excel fa-fw"></i> <span class="hidden-sm hidden-xs">Export Excel</span> </a>
        </div>
        <div class="row mb-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 mt-5">
                                <h3 class="box-title m-t-40">General Info</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td width="200">Nama Barang</td>
                                                <td> D'KING GOLDENMOON 15G </td>
                                            </tr>
                                            <tr>
                                                <td>Barcode</td>
                                                <td> 8997232050700 </td>
                                            </tr>
                                            <tr>
                                                <td>Nama Supplier</td>
                                                <td> </td>
                                            </tr>
                                            <tr>
                                                <td>Stock</td>
                                                <td> 31 Pcs </td>
                                            </tr>
                                            <tr>
                                                <td>HPP Barang</td>
                                                <td> Rp. 1,000 </td>
                                            </tr>
                                            <tr>
                                                <td>Markup Barang</td>
                                                <td> 100 % </td>
                                            </tr>
                                            <tr>
                                                <td>PPN</td>
                                                <td> Ya </td>
                                            </tr>
                                            <tr>
                                                <td>Harga Jual Barang</td>
                                                <td> Rp. 2,000 </td>
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
                                                <td> On </td>
                                            </tr>
                                            <tr>
                                                <td>Harga Promo</td>
                                                <td> Rp. 1,800 </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background: #5090C1;border-color: #5090C1;color: white;">
                        <i class="fa fa-chart-bar"></i> Riwayat Stock Barang Masuk
                    </div>
                    <div class="card-body">
                        <form action="" class="form-inline" style="padding-top: 12px; padding-bottom: 12px; background-color: #EFF3F8; background: #f9f9f9; margin: -20px -20px 20px; padding: 10px;border-bottom: 1px solid #dbdee0;">
                            <div class="row align-items-center" style="margin-left: 10px;">
                                <div class="form-group mb-2 p-1 col-auto">
                                    <label for="staticEmail2" class="sr-only">Unit Kerja</label>
                                    <select style="width:auto !important" required name="cmbBulan" class="form-control">
                                        <option value='00'>....</option>
                                        <option value='01'>Januari</option>
                                        <option value='02'>Februari</option>
                                        <option value='03'>Maret</option>
                                        <option value='04'>April</option>
                                        <option value='05'>Mei</option>
                                        <option value='06'>Juni</option>
                                        <option value='07'>Juli</option>
                                        <option value='08'>Agustus</option>
                                        <option value='09'>September</option>
                                        <option value='10'>Oktober</option>
                                        <option value='11' selected>November</option>
                                        <option value='12'>Desember</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 p-1 mr-1 col-auto">
                                    <label for="inputPassword2" class="sr-only">Password</label>
                                    <select style="width:auto !important" required name="cmbTahun" class="form-control">
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option selected value="2023">2023</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-info mb-2">Filter Data</button>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped my-table table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Pembelian</th>
                                                <th>Product Info</th>
                                                <th>Jumlah Beli</th>
                                                <th>Harga Beli</th>
                                                <th>SubTotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/admin/footer'); ?>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
</body>

</html>