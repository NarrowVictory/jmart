<?php $this->load->view('layouts/admin/head'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<!-- STYLE DISINI -->
<style>
    hr:not([size]) {
        height: 1px;
    }

    hr {
        margin: 1rem 0;
        color: inherit;
        background-color: currentColor;
        border: 0;
        opacity: .25;
    }

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
</style>
<?php $this->load->view('layouts/admin/header'); ?>
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <form id="ValidasiForm" type="POST">
                <div class="form-group mb-1">
                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-2">
                                <input type="hidden" name="id" id="id" value="<?= $id ?>">
                                <input required type="text" class="form-control" style="border-radius: 0px !important;" placeholder="Scan Barcode" id="scan_barcode" name="scan_barcode">
                            </div>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-success">Scan</button>
                            <button type="button" class="btn btn-success">Cam</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-md-12 col-lg-9 d-flex">
                <div class="card table">
                    <div class="card-body p-0">
                        <div class="table-header">
                            Menyiapkan Pesanan
                        </div>
                        <div class="table-responsive">
                            <table id="tabel-detail" class="table table-bordered table-vcenter" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Sub Total</th>
                                        <th>Status Verified</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="text-end fw-bold" style="text-align: right !important;">Sub Total</td>
                                        <td style="text-align: left !important;" colspan="2" id="subtotal"><?= "Rp. " . number_format($pesanan['grand_total'] - $pesanan['ongkos_kirim']) ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-end fw-bold">Ongkos Kirim</td>
                                        <td colspan="2" id="ongkos_kirim"><?= "Rp. " . number_format($pesanan['ongkos_kirim']) ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-end fw-bold">Total Harga</td>
                                        <td colspan="2" id="total_harga"><?= "Rp. " . number_format($pesanan['grand_total']) ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-12 col-lg-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">CART SUMMARY</h5>
                        <hr>
                        <small>Total Price</small>
                        <h2><?= "Rp. " . number_format($pesanan['grand_total']) ?></h2>
                        <hr>
                        <a onclick="showConfirmation()" id="pesanan_disiapkan" class="btn btn-success me-1 disabled" title="Pesanan Disipapkan">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checks" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M7 12l5 5l10 -10"></path>
                                <path d="M2 12l5 5m5 -5l5 -5"></path>
                            </svg>
                            Proccess
                        </a>
                        <button onclick="window.close();" class="btn btn-danger btn-outline">
                            <i class="fa fa-times"></i>&nbsp;&nbsp;Tutup
                        </button>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Pemesan</h5>
                        <hr>
                        <h4>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                                <path d="M19 2H5a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2h4l3 3 3-3h4a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm-7 3c1.727 0 3 1.272 3 3s-1.273 3-3 3c-1.726 0-3-1.272-3-3s1.274-3 3-3zM7.177 16c.558-1.723 2.496-3 4.823-3s4.266 1.277 4.823 3H7.177z"></path>
                            </svg> <?= $user['nama_member'] ?>
                        </h4>
                        <h4>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73-.205-.075-.354-.112-.504.112s-.58.729-.711.879-.262.168-.486.056-.947-.349-1.804-1.113c-.667-.595-1.117-1.329-1.248-1.554s-.014-.346.099-.458c.101-.1.224-.262.336-.393.112-.131.149-.224.224-.374s.038-.281-.019-.393c-.056-.113-.505-1.217-.692-1.666-.181-.435-.366-.377-.504-.383a9.65 9.65 0 0 0-.429-.008.826.826 0 0 0-.599.28c-.206.225-.785.767-.785 1.871s.804 2.171.916 2.321c.112.15 1.582 2.415 3.832 3.387.536.231.954.369 1.279.473.537.171 1.026.146 1.413.089.431-.064 1.327-.542 1.514-1.066.187-.524.187-.973.131-1.067-.056-.094-.207-.151-.43-.263"></path>
                            </svg> <?= $user['wa_member'] ?>
                        </h4>
                        <h4>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                                <path d="M9.715 12c1.151 0 2-.849 2-2s-.849-2-2-2-2 .849-2 2 .848 2 2 2z"></path>
                                <path d="M20 4H4c-1.103 0-2 .841-2 1.875v12.25C2 19.159 2.897 20 4 20h16c1.103 0 2-.841 2-1.875V5.875C22 4.841 21.103 4 20 4zm0 14-16-.011V6l16 .011V18z"></path>
                                <path d="M14 9h4v2h-4zm1 4h3v2h-3zm-1.57 2.536c0-1.374-1.676-2.786-3.715-2.786S6 14.162 6 15.536V16h7.43v-.464z"></path>
                            </svg> <?= $user['nomor_induk'] ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/admin/footer'); ?>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        var id = <?= $id ?>;
        var form = $("#ValidasiForm");
        $('#tabel-detail').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('penjualan/ajax_get_detail/'); ?>" + id,
                "type": "POST"
            },
            "columns": [{
                    "data": "numbering",
                    "className": "text-center"
                },
                {
                    "data": "gambar_barang",
                    "className": "text-center",
                },
                {
                    "data": "nama_barang",
                    "className": "text-left",
                    "render": function(data, type, row) {
                        return data + "<br><i class='text-muted'>" + row.barcode + "</i>";
                    }
                },
                {
                    "data": "harga_saat_ini",
                    "className": "text-right dt-nowrap",
                    "render": function(data, type, row) {
                        return "Rp. " + data;
                    }
                },
                {
                    "data": "jumlah_jual",
                    "className": "text-center",
                },
                {
                    "data": "sub_total_harga",
                    "className": "text-right dt-nowrap",
                },
                {
                    "data": "status_verified",
                    "className": "text-center",
                    "render": function(data, type, row) {
                        if (data === "0") {
                            return '<i class="fa fa-times text-danger"></i>';
                        } else {
                            return '<i class="fa fa-check text-success"></i>';
                        }
                    }
                },
                // Tambahkan kolom lain sesuai dengan data yang ingin ditampilkan
            ],
            "drawCallback": function(settings) {
                $.ajax({
                    url: "<?php echo base_url('penjualan/status/'); ?>" + id,
                    dataType: "json",
                    success: function(data) {
                        if (data.status == true) {
                            $("#pesanan_disiapkan").removeClass("disabled");
                        } else {
                            $("#pesanan_disiapkan").addClass("disabled");
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                    }
                });
            }
        });

        form.submit(function(event) {
            event.preventDefault();
            var formData = form.serialize();

            $.ajax({
                type: "POST",
                url: "<?= base_url('penjualan/validasi_pesanan') ?>", // Ganti dengan URL yang sesuai
                data: formData,
                success: function(response) {
                    if (response.success == true) {
                        toastr.success(response.msg, '', {
                            timeOut: 5000
                        });
                        $('#tabel-detail').DataTable().ajax.reload();
                        $("#scan_barcode").val("");
                    } else {
                        toastr.error(response.msg, '', {
                            timeOut: 5000
                        });
                    }
                },
                error: function() {
                    // Penanganan kesalahan jika permintaan AJAX gagal
                    alert("Permintaan AJAX gagal.");
                }
            });
        });
    });

    function showConfirmation() {
        Swal.fire({
            title: 'Perhatian!!',
            text: 'Anda yakin barang sudah benar?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, proceed!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('penjualan/disiapkan/' . $id) ?>',
                    success: function(response) {
                        // Handle the response
                        if (response.status == "success") {
                            Swal.fire({
                                title: 'Success!',
                                text: response.message,
                                icon: 'success'
                            });

                            setTimeout(() => {
                                window.location.href = '<?= base_url('penjualan') ?>';
                            }, 2000);
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: response.message,
                                icon: 'error'
                            });
                        }
                        // Optionally, you can redirect or perform other actions
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred while processing the request.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    }
</script>
</body>

</html>