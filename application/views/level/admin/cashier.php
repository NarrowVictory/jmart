<?php $this->load->view('layouts/admin/head') ?>
<!-- Tautan ke jQuery UI CSS dari Google Hosted Libraries -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<style>
    .table>thead:first-child>tr:first-child>th,
    .table>thead:first-child>tr:first-child>td,
    .table-striped thead tr.primary:nth-child(odd) th {
        background-color: #428bca;
        color: #fff;
        border-color: #357ebd;
        border-top: 1px solid #357ebd;
        text-align: center;
    }

    .card-product {
        border-radius: 20px;
        height: 100px !important;
        width: 100px !important;
        padding: 10px;
        /* Anda dapat mengganti nilai width sesuai dengan yang Anda inginkan */
    }

    @-webkit-keyframes rainbow {
        0% {
            background-position: 0% 82%
        }

        50% {
            background-position: 100% 19%
        }

        100% {
            background-position: 0% 82%
        }
    }

    @-moz-keyframes rainbow {
        0% {
            background-position: 0% 82%
        }

        50% {
            background-position: 100% 19%
        }

        100% {
            background-position: 0% 82%
        }
    }

    @-o-keyframes rainbow {
        0% {
            background-position: 0% 82%
        }

        50% {
            background-position: 100% 19%
        }

        100% {
            background-position: 0% 82%
        }
    }

    @keyframes rainbow {
        0% {
            background-position: 0% 82%
        }

        50% {
            background-position: 100% 19%
        }

        100% {
            background-position: 0% 82%
        }
    }

    .input-numeric-container {
        background: #fff;
        padding: 1em;
    }

    .input-numeric {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid silver;
        outline-color: #4CAF50;
        text-align: center;
    }

    .table-numeric {
        width: 100%;
        border-collapse: collapse;
    }

    .table-numeric td {
        vertical-align: top;
        text-align: center;
        border: 0;
    }

    .table-numeric button {
        position: relative;
        cursor: pointer;
        display: block;
        width: 100%;
        box-sizing: border-box;
        padding: 0.6em 0.3em;
        font-size: 1em;
        border-radius: 0.1em;
        outline: none;
        user-select: none;
    }

    .table-numeric button:active {
        top: 2px;
    }

    .key {
        background: #fff;
        border: 1px solid #d8d6d6;
        border: 1px solid #ccc;
        font-weight: 700;
        color: #1c94c4;
    }

    .remove {
        background: #fff;
        border: 1px solid #d8d6d6;
        border: 1px solid #ccc;
        font-weight: 700;
        color: #1c94c4;
    }

    [data-numeric="hidden"] .table-numeric {
        display: none;
    }

    .col-50 {
        flex: 0 1 calc(25% - 15px);
        margin-bottom: 2px;
        padding: 0px;
        margin-right: 1px;
        clear: both;
        margin-top: 1px;
    }

    #search-results {
        list-style: none;
        padding: 0;
        margin-top: 10px;
        max-height: 200px;
        overflow-y: auto;
    }

    #search-results li {
        background-color: #f5f5f5;
        /* Warna latar belakang untuk setiap elemen li */
        padding: 5px 10px;
        /* Padding untuk elemen li */
        margin-bottom: 5px;
        /* Memberikan margin bawah antara elemen li */
        border: 1px solid #ddd;
        /* Garis pinggir untuk setiap elemen li */
        border-radius: 4px;
        /* Membuat sudut elemen li sedikit melengkung */
    }

    #search-results li:hover {
        background-color: #e0e0e0;
        /* Warna latar belakang saat elemen dihover */
        cursor: pointer;
        /* Mengganti kursor saat elemen dihover */
    }

    /* CSS untuk efek hover */
    .search-result-item {
        transition: background-color 0.3s;
        /* Transisi perubahan warna latar belakang */
        cursor: pointer;
        /* Menampilkan kursor tangan saat dihover */
    }

    .search-result-item:hover {
        background-color: #F0F0F0;
        /* Warna latar belakang saat dihover */
    }

    .dataTables_paginate {
        display: none;
    }

    .card img {
        width: 100px;
        height: 100px;
    }

    .label {
        position: absolute;
        top: 0px;
        left: 0px;
        background-color: #007bff;
        color: #fff;
        padding: 5px 10px;
        border-radius: 0px;
    }

    .harga-barang {
        text-align: left;
        color: #000;
        margin-top: 5px;
        font-weight: 700;
    }

    .checkout-container {
        border-top: 1px solid #d4dee5;
        border-top: 1px solid #d4dee5;
        box-sizing: border-box;
        width: 100%;
    }

    .checkout-container>button {
        background-color: initial;
        border: 0;
        height: 100%;
        width: 100%;
    }

    .checkout-container>button>p {
        align-items: center;
        background-color: #2797e8;
        background-color: #2797e8;
        border-radius: 8px;
        color: #fff;
        display: flex;
        font-family: Poppins;
        font-size: 18px;
        font-weight: 400;
        height: 100%;
        justify-content: center;
        line-height: 24px;
        text-align: center;
        width: 100%;
    }

    /* Default style saat tombol tidak dihover */
    .btn.btn-outline-primary .fa.fa-trash {
        color: #6c757d;
    }

    /* Style saat tombol dihover */
    .btn.btn-outline-primary:hover .fa.fa-trash {
        color: #fff;
    }

    a.active {
        border-bottom: 2px solid #55c57a;
    }

    .nav-link {
        color: rgb(110, 110, 110);
        font-weight: 500;
    }

    .nav-link:hover {
        color: #55c57a;
    }

    .nav-pills .nav-link.active {
        color: black;
        background-color: white;
        border-radius: 0.5rem 0.5rem 0 0;
        font-weight: 600;
    }

    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .loading-spinner {
        text-align: center;
    }

    .loading-spinner i {
        font-size: 24px;
        margin-bottom: 10px;
    }
</style>
<?php $this->load->view('layouts/admin/header') ?>
<div id="loading" class="loading-overlay" style="display: none;">
    <div class="loading-spinner">
        <i class="fas fa-spinner fa-spin"></i>
        Loading...
    </div>
</div>
<div class="row">
    <div class="col-12 col-lg-8">
        <div class="page-body">
            <div class="container-fluid">
                <div class="input-group mb-2">
                    <span class="input-group-text">
                        <i class="fa fa-barcode"></i>
                    </span>
                    <input class="form-control ui-autocomplete" type="text" id="search" name="search" placeholder="Search Code / Product Name..." autocomplete="off">
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div id="result"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4" style="margin-top: 25px !important;">
        <div class="card" style="border-radius: 0px !important;">
            <div class="card-header" style="background-color: rgb(226, 232, 240);border-radius:0px !important; height: 50px; z-index: 1;">
                Cart Settings
            </div>
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-12">
                        <div style="max-height: 350px; overflow-y: auto;">
                            <table class="table items table-striped table-bordered table-condensed table-hover mt-2 w-100" id="list_barang">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th style="width: 5%; text-align: center;">
                                            <i class="fa fa-trash"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- STARTS -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- Cart Total Container Bootstrap 5 -->
                            <div class="card-body p-0" style="bottom: 0;">
                                <div class="row border-bottom" style="margin-left: 10px;">
                                    <div class="col-6 col-md-6">
                                        <div class="total-title">
                                            <span>Kasir</span>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <span data-bs-toggle="modal" data-bs-target="#KasirModal" id="kasir_select">
                                            <span id="kasir_select_value"></span>
                                            <i class="fa fa-edit text-warning" style="cursor: pointer;"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="row" style="margin-left: 10px;">
                                    <div class="col-6 col-md-6">
                                        <div class="total-title">
                                            <span>Items</span>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <span id="titems">0</span>
                                    </div>
                                </div>
                                <hr style="margin: 0px !important;">
                                <div class="row" style="margin-left: 10px;">
                                    <div class="col-6 col-md-6">
                                        <div class="total-title">
                                            <span>Total</span>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        Rp. <span id="gtotal"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Cart Total Container Bootstrap 5 -->
                        </div>
                    </div>
                </div>
                <!-- END -->
            </div>
            <div class="card-footer d-flex">
                <!-- Tombol pertama -->
                <button id="deleteButton" class="btn btn-outline-primary" style="margin-right: 5px; min-height: 100%;border: 1px solid #08c; border-radius: 10px;">
                    <i class="fa fa-trash"></i>
                </button>

                <!-- Tombol ketiga -->
                <button class="btn btn-outline-primary" style="margin-right: 5px; min-height: 100%;border: 1px solid #08c; border-radius: 10px;" data-bs-toggle="modal" data-bs-target="#checkOutModal">
                    <i class="fa fa-check"></i> &nbsp;&nbsp;Checkout
                </button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-white" style="background: linear-gradient(to right, #489ce2, #4299e1, #2181d0) !important;">
                <h5 class="modal-title" id="exampleModalLabel">Update Jumlah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="button_update_list">
                    <div class="input-numeric-container">
                        <div>
                            <p style="margin-top: -10px;">
                                <b>Nama:</b> <span id="nama_barang_modal"></span><br>
                                <b>Barcode:</b> <span id="barcode_barang_modal"></span>
                            </p>
                        </div>
                        <div class="input-group mb-3">
                            <button class="btn btn-white" type="button" id="minusBtn">-</button>
                            <input type="hidden" id="id_keranjang_modal" name="id_keranjang_modal">
                            <input style="border:1px solid #dadfe5" name="input_numeric_modal" id="input_numeric_modal" class="form-control input-numeric" type="number" autofocus>
                            <button class="btn btn-white" type="button" id="plusBtn">+</button>
                        </div>
                        <table class="table-numeric">
                            <tbody>
                                <tr>
                                    <td> <button type="button" class="key" data-key="1"> 1 </button> </td>
                                    <td> <button type="button" class="key" data-key="2"> 2 </button> </td>
                                    <td> <button type="button" class="key" data-key="3"> 3 </button></td>
                                    <td colspan="2">
                                        <button type="button" class="remove" style="background-color: #f0ad4e;border-color: #eea236;color: #fff;">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l14 0"></path>
                                                <path d="M5 12l4 4"></path>
                                                <path d="M5 12l4 -4"></path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td> <button type="button" class="key" data-key="4"> 4 </button> </td>
                                    <td> <button type="button" class="key" data-key="5"> 5 </button> </td>
                                    <td> <button type="button" class="key" data-key="6"> 6 </button> </td>
                                    <td> <button type="button" class="" disabled="disabled"> . </button> </td>
                                    <td> <button type="button" class="key"> Clear </button> </td>
                                </tr>
                                <tr>
                                    <td> <button type="button" class="key" data-key="7"> 7 </button> </td>
                                    <td> <button type="button" class="key" data-key="8"> 8 </button> </td>
                                    <td> <button type="button" class="key" data-key="9"> 9 </button> </td>
                                    <td> <button type="button" class="key" data-key="0"> 0 </button> </td>
                                    <td> <button type="button" class="" disabled="disabled"> % </button> </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <button type="submit" class="btn btn-success"> Accept </button>
                                    </td>
                                    <td colspan="2">
                                        <button data-bs-dismiss="modal" type="button" class="btn btn-danger"> Cancel </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="checkOutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-white" style="background: linear-gradient(to right, #489ce2, #4299e1, #2181d0) !important">
                <h5 class="modal-title" id="exampleModalLabel">Proses Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: calc(100vh - 200px);overflow-y: auto;">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="container">
                            <div class="row mb-2">
                                <input style="border-radius: 0px" type="datetime-local" id="tgl_penjualan" class="form-control" value="<?= date('Y-m-d\TH:i:s') ?>">
                            </div>
                            <div class="row mb-2">
                                <select name="id_customer" id="id_customer" class="form-select" required="required" style="background-color: #f4f4f4; border: 1px solid #ddd; cursor: default; border-radius: 0px !important;">
                                    <option value="" selected="selected">Pilih Customer</option>
                                    <?php foreach ($anggota as $key => $value) : ?>
                                        <option value="<?= $value['id_user'] ?>"><?= $value['nama_member'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="row mb-2">
                                <select style="background-color: #f4f4f4; border: 1px solid #ddd; cursor: default; border-radius: 0px !important;" name="metode_pembayaran" id="metode_pembayaran" class="form-select">
                                    <option value="Cash">Cash</option>
                                    <option value="Autodebet">Autodebit</option>
                                </select>
                            </div>
                            <div class="row mb-1">
                                <div class="col-8" style="padding-left: 0px !important;">
                                    <b>Total Dibayarkan</b>
                                </div>
                                <div class="col-4">
                                    <b>Kembalian</b>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8" style="padding-left: 0px !important;">
                                    <div class="input-group">
                                        <input id="total-membayar" type="text" class="form-control mb-0" value="0" style="border: 1px solid #ddd; border-radius: 0px !important;height: 40px;width: 100%;color: #38ada9;padding-top: 9px;border: 0.5px solid;background: #fff;-webkit-box-shadow: 0 3px 23px -2px #dfe4ea;box-shadow: 0 3px 23px -2px #dfe4ea;font-size: 2rem;" readonly>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <input disabled type="text" class="form-control" id="kembalian" style="border: 1px solid #ddd; border-radius: 0px !important;height: 40px;width: 100%;color: #38ada9;padding-top: 9px;border: 0.5px solid;background: #f4f4f4;-webkit-box-shadow: 0 3px 23px -2px #dfe4ea;box-shadow: 0 3px 23px -2px #dfe4ea;font-size: 1rem;">
                                </div>
                            </div>
                            <div class="row d-flex mb-3" style="margin-top: 4%;">
                                <div class="col-4 col-lg-3" style="padding-left: 0px !important;">
                                    <button data-nominal="100000" type="button" class="btn btn-md btn-info quick-payable" style="border-radius: 8px;color: #fff;border: 0.5px solid;background: #38ada9;width:80px !important">100,000</button>
                                </div>
                                <div class="col-4 col-lg-3" style="padding-left: 0px !important;">
                                    <button data-nominal="50000" type="button" class="btn btn-md btn-info quick-payable" style="border-radius: 8px;color: #fff;border: 0.5px solid;background: #38ada9;width:80px !important">50,000</button>
                                </div>
                                <div class="col-4 col-lg-3" style="padding-left: 0px !important;">
                                    <button data-nominal="20000" type="button" class="btn btn-md btn-info quick-payable" style="border-radius: 8px;color: #fff;border: 0.5px solid;background: #38ada9;width:80px !important">20,000</button>
                                </div>
                                <div class="col-4 col-lg-3" style="padding-left: 0px !important;">
                                    <button data-nominal="10000" type="button" class="btn btn-md btn-info quick-payable" style="border-radius: 8px;color: #fff;border: 0.5px solid;background: #38ada9;width:80px !important">10,000</button>
                                </div>
                                <div class="col-4 col-lg-3" style="padding-left: 0px !important;">
                                    <button data-nominal="5000" type="button" class="btn btn-md btn-info quick-payable" style="border-radius: 8px;color: #fff;border: 0.5px solid;background: #38ada9;width:80px !important">5,000</button>
                                </div>
                                <div class="col-4 col-lg-3" style="padding-left: 0px !important;">
                                    <button data-nominal="2000" type="button" class="btn btn-md btn-info quick-payable" style="border-radius: 8px;color: #fff;border: 0.5px solid;background: #38ada9;width:80px !important">2,000</button>
                                </div>
                                <div class="col-4 col-lg-3" style="padding-left: 0px !important;">
                                    <button data-nominal="1000" type="button" class="btn btn-md btn-info quick-payable" style="border-radius: 8px;color: #fff;border: 0.5px solid;background: #38ada9;width:80px !important">1,000</button>
                                </div>
                                <div class="col-4 col-lg-3" style="padding-left: 0px !important;">
                                    <button data-nominal="500" type="button" class="btn btn-md btn-info quick-payable" style="border-radius: 8px;color: #fff;border: 0.5px solid;background: #38ada9;width:80px !important">500</button>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12" style="padding-left: 0px !important;">
                                    <textarea name="" id="" class="form-control" placeholder="Tuliskan Keterangan"></textarea>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 1%;">
                                <div class="btn-group" role="group" aria-label="Basic example" style="padding-left: 0px !important;">
                                    <button type="button" class="btn btn-secondary button-outline-md-peace" style="color: #222f3e;font-weight: bold;display: block;margin-left: auto;margin-right: auto;width: -webkit-fill-available;border-color: #9ca7b5;color: #9ca7b5;background-color: transparent;">
                                        <i class="fa fa-phone"></i>&nbsp;&nbsp;Whatsapp
                                    </button>
                                    <button type="button" class="btn button-outline-md-peace" style="color: #222f3e;font-weight: bold;display: block;margin-left: auto;margin-right: auto;width: -webkit-fill-available;border-color: #9ca7b5;color: #9ca7b5;background-color: transparent;">
                                        <i class="fa fa-envelope"></i>&nbsp;&nbsp;Email
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5" style="background: #f1f2f6; border-radius: 10px 0px 0px 0px; height: auto;">
                        <div style="padding-left: 5%; padding-top: 2%;">
                            <div>
                                <p class="mb-0"><b>Total Amount</b></p>
                                <h2 style="margin-top: 8px;"><b><span id="keseluruhan"></span></b></h2>
                            </div>
                        </div>

                        <div style="padding-top: 2%;">
                            <div class="row" style="border-bottom: 3px dotted black;">
                                <div class="col-6">
                                    <p class="mb-0"><b>Tanggal</b></p>
                                </div>
                                <div class="col-6 text-end">
                                    <?= date('d/m/Y') ?>
                                </div>
                            </div>
                            <div class="row" style="border-bottom: 3px dotted black;">
                                <div class="col-6">
                                    <p class="mb-0"><b>Waktu</b></p>
                                </div>
                                <div class="col-6 text-end">
                                    <?= date('H:i:s') ?>
                                </div>
                            </div>
                            <div class="row" style="border-bottom: 3px dotted black;">
                                <div class="col-6">
                                    <p class="mb-0"><b>Petugas</b></p>
                                </div>
                                <div class="col-6 text-end">
                                    <span id="kasir_selected_value"></span>
                                </div>
                            </div>
                            <div class="row" style="border-bottom: 3px dotted black;">
                                <div class="col-6">
                                    <p class="mb-0"><b>Pay by cash</b></p>
                                </div>
                                <div class="col-6 text-end">
                                    <span id="pay">Rp. 0,00</span>
                                </div>
                            </div>

                            <div class="row" style="border-bottom: 3px dotted black;">
                                <div class="col-6">
                                    <p class="mb-0"><b>Discount</b></p>
                                </div>
                                <div class="col-6 text-end">
                                    <span id="">Rp. 0,00</span>
                                </div>
                            </div>

                            <div class="row" style="border-bottom: 3px dotted black;">
                                <div class="col-6">
                                    <p class="mb-0"><b>Balance</b></p>
                                </div>
                                <div class="col-6 text-end">
                                    <span id="balance">Rp. 0,00</span>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <button class="btn btn-outline-secondary btn-sm p-2 mb-2" style="color: #fff;background-color: #a4b0be;width: 80%;border-radius: 6px;margin-left: auto;display: block;margin-right: auto;" data-bs-dismiss="modal">Cancel</button>
                                <button data-nominal="0" class="btn btn-outline-danger btn-sm p-2 mb-2 reset-total" style="color: #fff;background-color: #f53d3d;width: 80%;border-radius: 6px;margin-left: auto;display: block;margin-right: auto;">Void</button>
                                <button class="btn btn-outline-primary btn-sm p-2 mb-2" style="color: #fff;background-color: #222f3e;width: 80%;border-radius: 6px;margin-left: auto;display: block;margin-right: auto;">Reprint</button>
                            </div>

                            <div class="row">
                                <button class="btn btn-outline-info btn-sm p-2" style="color: #fff;background-color: #38ada9;width: 80%;border-radius: 6px;margin-left: auto;display: block;margin-right: auto;" id="submit-sale">Checkout</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL KASIR -->
<div class="modal fade" id="KasirModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top-right">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Kasir</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Select a Kasir:</p>
                <select name="kasir_cache" id="kasir_cache" class="form-select" required="required" style="background-color: #f4f4f4; border: 1px solid #ddd; cursor: default; border-radius: 0px !important; height: 50px" onchange="setLocalStorageValue('kasir_cache', 'selectedKasir')">
                    <option disabled selected="selected">Pilih Kasir</option>
                    <?php foreach ($kasir as $key => $value) : ?>
                        <option value="<?= $value['id_kasir'] ?>"><?= $value['nama_kasir'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL KASIR -->

<!-- END -->
<?php $this->load->view('layouts/admin/footer') ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
    var choices_kasir = new Choices(document.getElementById('kasir_cache'));
    var choices_customer = new Choices(document.getElementById('id_customer'));

    function simpanData(id_barang) {
        $.ajax({
            url: '<?= base_url('kasir/keranjang') ?>',
            type: 'POST',
            data: {
                id: id_barang
            },
            success: function(response) {
                if (response.status == "success") {
                    toastr.success(response.message, '', {
                        timeOut: 2000
                    });
                    $('#list_barang').DataTable().ajax.reload();
                } else {
                    toastr.error(response.message, '', {
                        timeOut: 2000
                    });
                }
            },
            error: function() {
                alert('Terjadi kesalahan saat mengirim data.');
            }
        });
    }

    function simpanData2(label) {
        $.ajax({
            url: '<?= base_url('kasir/keranjang2') ?>',
            type: 'POST',
            data: {
                barang: label
            },
            success: function(response) {
                toastr.success("Barang Berhasil Ditambahkan", '', {
                    timeOut: 5000
                });
                $('#list_barang').DataTable().ajax.reload();
                $('#search').val("");
                load_data();
            },
            error: function() {
                alert('Terjadi kesalahan saat mengirim data.');
            }
        });
    }

    $("#button_update_list").submit(function(event) {
        event.preventDefault();
        var idKeranjang = $("#id_keranjang_modal").val();
        var nilaiInputNumeric = $("#input_numeric_modal").val();

        var data = {
            id_keranjang: idKeranjang,
            jumlah: nilaiInputNumeric
        };

        $.ajax({
            url: "<?php echo base_url('kasir/update_list/'); ?>" + idKeranjang,
            type: "POST",
            data: data,
            dataType: "json",
            success: function(response) {
                if (response.status == "success") {
                    $('#list_barang').DataTable().ajax.reload();
                    $('#myModal').modal('hide');
                } else {
                    toastr.error(response.message, '', {
                        timeOut: 2000
                    });
                }
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    });

    $(document).on("click", "#modal_update", function() {
        // Menggunakan AJAX untuk mengambil data dari server
        var dataId = $(this).data("id");

        $.ajax({
            url: "<?= base_url('kasir/getData') ?>",
            type: "POST",
            dataType: "json",
            data: {
                id: dataId
            }, // Kirim data-id ke server jika diperlukan
            success: function(data) {
                // Di sini Anda dapat memanipulasi data yang diterima dari server
                $('#myModal').modal('show');
                $("#id_keranjang_modal").val(data.id_keranjang);

                $("#nama_barang_modal").text(data.nama_barang);
                $("#barcode_barang_modal").text(data.barcode);
                $("#input_numeric_modal").val(data.jumlah);
            },
            error: function() {
                alert("Terjadi kesalahan saat mengambil data.");
            }
        });
    });

    $('#list_barang').DataTable({
        ordering: false,
        "processing": true,
        "serverSide": true,
        "searching": false,
        lengthChange: false,
        info: false,
        "ajax": {
            "url": "<?php echo base_url('kasir/json'); ?>",
            "type": "POST",
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
            },
        },
        "columns": [{
                "data": "product",
                "className": "text-left align-middle",
            },
            {
                "data": "action",
                "className": "text-center align-middle"
            },
        ],
        "drawCallback": function(settings) {
            $.ajax({
                url: "<?php echo base_url('kasir/hitungTotal'); ?>",
                dataType: "json",
                success: function(data) {
                    var total = data.total;
                    var items = data.item;

                    // Mengganti isi elemen dengan ID 'gtotal' dengan total yang diambil dari controller
                    $('#gtotal').text(total);
                    $('#titems').text(items);
                    $('#keseluruhan').text("Rp. " + total);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                }
            });
        },
    });

    $("#minusBtn").click(function() {
        var currentVal = parseInt($("#input_numeric_modal").val());
        if (currentVal > 1) {
            $("#input_numeric_modal").val(currentVal - 1);
        }
    });

    $("#plusBtn").click(function() {
        var currentVal = parseInt($("#input_numeric_modal").val());
        $("#input_numeric_modal").val(currentVal + 1);
    });

    function hapusItem(idKeranjang) {
        if (confirm('Apakah Anda yakin ingin menghapus item ini?')) {
            $.ajax({
                type: "POST",
                url: "<?= base_url('kasir/hapus_list/') ?>" + idKeranjang,
                success: function(data) {
                    $('#list_barang').DataTable().ajax.reload();
                },
                error: function() {
                    // Handle kesalahan jika diperlukan
                }
            });
        }
    }

    function setLocalStorageValue(elementId, storageKey) {
        var selectElement = document.getElementById(elementId);
        var selectedValue = selectElement.value;

        // Menghapus nilai localStorage sebelumnya
        localStorage.removeItem(storageKey);

        // Menyimpan nilai yang dipilih ke localStorage
        localStorage.setItem(storageKey, selectedValue);

        location.reload();
    }

    function setSelectValueFromLocalStorage(elementId, storageKey) {
        var selectElement = document.getElementById(elementId);
        var savedValue = localStorage.getItem(storageKey);

        // Jika ada nilai tersimpan di localStorage, atur nilai opsi yang dipilih
        if (savedValue) {
            selectElement.value = savedValue;
        }
    }

    setSelectValueFromLocalStorage("kasir_cache", "selectedKasir");

    $(document).on("click", ".key", function() {
        var number = $(this).attr("data-key");
        var nilaiSaatIni = $(".input-numeric").val();
        $(".input-numeric").val(nilaiSaatIni + number);
    });

    $(".remove").click(function() {
        var inputElement = $(".input-numeric");
        var nilaiSaatIni = inputElement.val();

        if (nilaiSaatIni.length > 0) {
            var nilaiBaru = nilaiSaatIni.slice(0, -1); // Menghapus satu karakter terakhir
            inputElement.val(nilaiBaru);
        }
    });

    $(".quick-payable").click(function() {
        var nominal = $(this).data("nominal");
        var currentValue = parseInt($("#total-membayar").val()) || 0;
        var nilaiKeseluruhan = $("#keseluruhan").text().replace(/\D/g, '');

        if (nilaiKeseluruhan !== '') {
            nilaiKeseluruhan = parseInt(nilaiKeseluruhan);
        } else {
            nilaiKeseluruhan = 0;
        }

        var newValue = currentValue + nominal;
        var hasilPengurangan = newValue - nilaiKeseluruhan;
        $("#pay").text("Rp. " + newValue.toLocaleString("id-ID"));
        $("#total-membayar").val(newValue);
        $("#balance").text("Rp. " + hasilPengurangan.toLocaleString("id-ID"));
        $("#kembalian").val(hasilPengurangan.toLocaleString("id-ID"));
    });

    $(".reset-total").click(function() {
        // Mereset nilai input "Total Membayar" menjadi 0
        $("#pay").text("Rp. 0,00");
        $("#total-membayar").val(0);
        $("#balance").text("Rp. 0,00");
        $("#kembalian").val("");
    });

    $('#deleteButton').click(function() {
        // Munculkan dialog konfirmasi
        var konfirmasi = confirm('Apakah Anda yakin ingin menghapus semua data?');

        // Jika pengguna menekan "OK" dalam dialog konfirmasi
        if (konfirmasi) {
            // Menggunakan Ajax untuk memanggil method deleteAllData di sisi server
            $.ajax({
                url: '<?= base_url('kasir/hapus_keranjang') ?>', // Ganti dengan URL yang sesuai
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        $('#list_barang').DataTable().ajax.reload();
                    } else {
                        alert('Gagal menghapus data.');
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan saat menghubungi server.');
                }
            });
        }
    });

    $("#submit-sale").on("click", function() {
        var id_pelanggan = $("#id_customer").val();
        var tgl = $("#tgl_penjualan").val();
        var metode = $("#metode_pembayaran").val();
        var totalMembayar = parseInt($("#total-membayar").val()) || 0;
        var totalHarga = $("#keseluruhan").text().replace(/\D/g, '');
        var balance = $("#balance").text().replace(/\D/g, '');
        var kasir = localStorage.getItem('selectedKasir');

        if (metode === "Cash" && totalMembayar < totalHarga) {
            alert("Total membayar tidak mencukupi. Silakan periksa kembali.");
        } else {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('kasir/simpanData'); ?>",
                data: {
                    id: id_pelanggan,
                    kasir: kasir,
                    tgl_pesanan: tgl,
                    jenis_order: "ambil_sendiri",
                    status_pembayaran: "Lunas",
                    metode: metode,
                    status_pesanan: "Selesai",
                    grand_total: totalHarga,
                    total_bayar: totalMembayar,
                    kembalian: balance
                },
                success: function(response) {
                    var hasil = JSON.parse(response);
                    alert(hasil.pesan);
                    $('#lanjutkanModal').modal('hide');
                    location.reload();
                }
            });
        }
    });

    load_data();

    function load_data(query, page) {
        $.ajax({
            url: "<?= base_url('kasir/load_barang') ?>",
            method: "POST",
            data: {
                query: query,
                page: page
            },
            beforeSend: function() {
                $('#loading').show();
            },
            success: function(data) {
                $('#result').html(data);
            },
            complete: function() {
                // Sembunyikan indikator loading di sini
                $("#loading").hide();
            }
        })
    }

    $(document).on('click', '.halaman', function() {
        var page = $(this).attr("id");
        load_data('', page);
    });

    $('#search').keyup(function() {
        var search = $(this).val();

        if (event.keyCode === 13) { // Tombol "Enter" memiliki kode 13
            simpanData2(search);
        } else {
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        }
    });
</script>
<script>
    // Check if 'kasir_cache' exists in localStorage
    var selectedKasir = localStorage.getItem('selectedKasir');

    if (selectedKasir) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('kasir/getNamaKasirById/') ?>' + selectedKasir,
            success: function(response) {
                document.getElementById('kasir_select_value').innerText = response;
                document.getElementById('kasir_selected_value').innerText = response;
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    } else {
        document.getElementById('kasir_select_value').innerText = "No Set";
    }
</script>
</body>

</html>