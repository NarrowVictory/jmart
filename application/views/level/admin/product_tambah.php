<?php $this->load->view('layouts/admin/head'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<?php $this->load->view('layouts/admin/header'); ?>
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Tambah Data
                </h2>
            </div>
            <div class="col text-end">
                <button class="btn btn-info" onclick="location.href='<?= base_url('product') ?>'">
                    Tampilkan Semua
                </button>
            </div>
        </div>
    </div>
</div>

<form action="<?= base_url('product/simpan') ?>" method="POST">
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <?php if ($this->session->flashdata('success_message')) : ?>
                        <div class="alert alert-success"><?= $this->session->flashdata('success_message') ?></div>
                    <?php endif ?>

                    <?php if ($this->session->flashdata('error_message')) : ?>
                        <div class="alert alert-danger"><?= $this->session->flashdata('error_message') ?></div>
                    <?php endif ?>
                    <div class="card" style="margin-top: -5px !important;">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Produk</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="ec-vendor-upload-detail">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                                <input type="text" class="form-control slug-title" id="nama_produk" name="nama_produk">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Kategori</label>
                                                <select name="select_kategori" id="select_kategori" class="form-select">
                                                    <option value="" selected disabled>Pilih Kategori</option>
                                                    <?php foreach ($kategori as $key => $kt) : ?>
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
                                                        <?php foreach ($satuan as $key => $st) : ?>
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
                                                    <?php foreach ($supplier as $key => $sp) : ?>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Info Produk</h3>
                        </div>
                        <div class="card-body">
                            <div class="container mt-4">
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
                                                            <input type="text" class="form-control" id="hpp" name="hpp_barang">
                                                        </td>
                                                        <td class="center" width="40">
                                                            <svg style="margin-left: 7px;" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M18 6l-12 12"></path>
                                                                <path d="M6 6l12 12"></path>
                                                            </svg>
                                                        </td>
                                                        <td class="step_three">
                                                            <input type="text" class="form-control" id="markup_barang" name="markup_barang">
                                                        </td>
                                                        <td class="center" width="40">
                                                            <svg style="margin-left: 7px;" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-equal" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M5 10h14"></path>
                                                                <path d="M5 14h14"></path>
                                                            </svg>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" id="harga_jual_barang" name="harga_jual_barang">
                                                        </td>
                                                        <td class="center" width="40">
                                                            <svg style="margin-left: 10px;" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M12 5l0 14"></path>
                                                                <path d="M5 12l14 0"></path>
                                                            </svg>
                                                        </td>
                                                        <td>
                                                            <select class="form-control select2" name="ppn_barang" id="ppn">
                                                                <option value="" selected disabled>**</option>
                                                                <option value="N">Tidak PPN</option>
                                                                <option value="Y">PPN</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-right" width="40" style="padding-right: 10px;">
                                                            <svg style="margin-left: 7px;" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-equal" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M5 10h14"></path>
                                                                <path d="M5 14h14"></path>
                                                            </svg>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control numeric" name="total_jual" id="total_jual">
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
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan Produk</button>
                            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php $this->load->view('layouts/admin/footer'); ?>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }

    function clearImage() {
        document.getElementById('formFile').value = null;
        frame.src = "";
    }

    var kategori = new Choices(document.getElementById('select_kategori'));
    var supplier = new Choices(document.getElementById('select_supplier'));
    var satuan = new Choices(document.getElementById('select_satuan'));
    $(document).ready(function() {
        $("#hpp").on("input", function() {
            var hppValue = parseFloat($(this).val());
            var markup = $("#markup_barang").val();
            $("#harga_jual_barang").val(hppValue);
            $("#total_jual").val(hppValue);

            if (!isNaN(markup) && markup != "") {
                var hargaJual = hppValue * (1 + markup / 100);
                hargaJual = hargaJual.toFixed(2);
                $("#harga_jual_barang").val(hargaJual);
                $("#total_jual").val(hargaJual);
            }
        });

        $("#markup_barang").on("input", function() {
            var markup = parseFloat($(this).val());
            var hpp = parseFloat($("#hpp").val());

            if (!isNaN(markup) && !isNaN(hpp)) {
                // Menghitung harga jual
                var hargaJual = hpp * (1 + markup / 100);
                hargaJual = hargaJual.toFixed(2);
                $("#harga_jual_barang").val(hargaJual);
                $("#total_jual").val(hargaJual);
            } else {
                $("#harga_jual_barang").val(hpp);
                $("#total_jual").val(hpp);
            }
        });

        $("#ppn").change(function() {
            // Mengambil nilai yang dipilih oleh pengguna
            var ppnOption = $(this).val();

            // Mengambil nilai markup_barang dan HPP
            var markup = parseFloat($("#markup_barang").val());
            var hpp = parseFloat($("#hpp").val());

            // Memeriksa apakah markup dan HPP adalah angka yang valid
            if (!isNaN(markup) && !isNaN(hpp)) {
                // Menghitung harga jual
                var hargaJual = hpp * (1 + markup / 100); // Mengasumsikan markup dalam persen

                // Memeriksa apakah pengguna memilih opsi PPN
                if (ppnOption === "Y") {
                    // Jika opsi PPN dipilih, tambahkan 10% PPN
                    hargaJual += hargaJual * 0.10; // 10% PPN dalam bentuk desimal
                    $("#total_jual").val(hargaJual);
                } else {
                    $("#total_jual").val(hargaJual);
                }
            }
        });
    });
</script>
</body>

</html>