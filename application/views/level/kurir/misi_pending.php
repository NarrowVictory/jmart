<?php $this->load->view('layouts/kurir/head'); ?>
<style>
    ul.timeline {
        list-style-type: none;
        position: relative;
        padding-left: 40px;
    }

    ul.timeline:before {
        content: ' ';
        background: #d4d9df;
        display: inline-block;
        position: absolute;
        left: 29px;
        width: 2px;
        height: 100%;
        z-index: 2;
    }

    ul.timeline>li {
        margin: 20px 20px 20px 20px;
        padding-left: 10px;
    }

    ul.timeline>li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #22c0e8;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 2;
    }

    .navbar__left {
        width: 4rem;
        z-index: 2;
    }

    .title {
        font-weight: 700;
        margin-bottom: 0;
        color: #2C406E;
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

    .order-table {
        width: 100%;
        border-collapse: collapse;
    }

    .order-table th,
    .order-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    .order-table td {
        background-color: white !important;
        color: #667382;
    }

    .order-image {
        max-width: 25px;
        max-height: 25px;
        border-radius: 50%;
        object-fit: cover;
    }

    /* Gaya Tambahan */
    table.table-hover tbody tr:hover td {
        cursor: pointer;
    }

    #order-heading {
        background-color: #edf4f7;
        position: relative;
        border-top-left-radius: 25px;
        max-width: 800px;
        padding-top: 20px;
    }

    #order-heading .text-uppercase {
        font-size: 0.9rem;
        color: #777;
        font-weight: 600;
    }

    #order-heading .h4 {
        font-weight: 600;
    }

    #order-heading .h4+div p {
        font-size: 0.8rem;
        color: #777;
    }

    .close {
        padding: 10px 15px;
        background-color: #777;
        border-radius: 50%;
        position: absolute;
        right: -15px;
        top: -20px;
    }

    .wrapper {
        padding: 0px 50px 50px;
        border-bottom-left-radius: 25px;
        border-bottom-right-radius: 25px;
    }

    .list div b {
        font-size: 0.8rem;
    }

    .list .order-item {
        font-weight: 600;
        color: #6db3ec;
    }

    .list:hover {
        background-color: #f4f4f4;
        cursor: pointer;
        border-radius: 5px;
    }

    label {
        margin-bottom: 0;
        padding: 0;
        font-weight: 900;
    }

    .price {
        color: #5cb99a;
        font-weight: 700;
    }

    p.text-justify {
        font-size: 0.9rem;
        margin: 0;
    }

    .row {
        margin: 0px;
    }

    .subscriptions {
        border: 1px solid #ddd;
        border-left: 5px solid #ffa500;
        padding: 10px;
    }

    .subscriptions div {
        font-size: 0.9rem;
    }

    @media(max-width: 425px) {
        .wrapper {
            padding: 20px;
        }

        body {
            font-size: 0.85rem;
        }

        .subscriptions div {
            padding-left: 5px;
        }

        img+label {
            font-size: 0.75rem;
        }

    }
</style>
<?php $this->load->view('layouts/kurir/header'); ?>
<nav class="navbar navbar--show navbar-expand-lg navbar-light" style="background: #2F5596 !important;">
    <div class="container">
        <div class="navbar__left">
            <a href="<?= base_url('home') ?>">
                <svg class="navbar__left__icon fw-bold text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);cursor:pointer;z-index: 2;">
                    <path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path>
                </svg>
            </a>
        </div>

        <div class="nav-bar__center">
            <h1 class="nav-bar__center__title" style="font-family: gotham_fonts;color: white;line-height: 1.2;text-align:center !important;vertical-align:middle">Daftar Misi</h1>
        </div>
    </div>
</nav>

<div class="terms-tab-wrapper shadow">
    <div class="container">
        <ul class="nav row row--no terms-tab">
            <li class="nav-item col-6">
                <a class="nav-link" id="Donasi-tab" data-toggle="tab" href="<?= base_url('misi/list') ?>" role="tab" aria-controls="home" aria-selected="true">Dalam Misi</a>
            </li>
            <li class="nav-item col-6">
                <a class="nav-link active" id="Donasi-tab" data-toggle="tab" href="<?= base_url('misi/pending') ?>" role="tab" aria-controls="home" aria-selected="true">Belum Discan</a>
            </li>
        </ul>
    </div>
</div>

<section class="mt-3 mb-4">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover order-table text-nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pemesan</th>
                        <th>Tanggal</th>
                        <th>Items</th>
                        <th>Total Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pending as $key => $value) : ?>
                        <!-- Data pesanan akan ditampilkan di sini -->
                        <?php
                        $items = $this->db->select('*')->from('tb_pesanan_detail')->where('id_pesanan', $value['id_pesanan'])->get()->num_rows();
                        ?>
                        <tr class="order-row" data-bs-toggle="modal" data-bs-target="#detailPesananModal<?= $value['id_pesanan'] ?>">
                            <td class="align-middle text-center">
                                <img src="https://cdn-icons-png.flaticon.com/512/1144/1144760.png" alt="Gambar Pemesan" class="order-image">
                            </td>
                            <td>
                                <?= $value['nama_member'] ?>
                            </td>
                            <td><?= date('d/m/Y H:i:s', strtotime($value['tgl_pesanan'])) ?></td>
                            <td class="text-nowrap"><?= $items ?> Items</td>
                            <td class="text-nowrap">Rp. <?= number_format($value['grand_total']) ?></td>
                        </tr>
                    <?php endforeach ?>
                    <?php if (count($pending) <= 0) : ?>
                        <tr>
                            <td colspan="5" class="text-center">Data Tidak Tersedia</td>
                        </tr>
                    <?php endif ?>
                    <!-- Anda dapat menambahkan lebih banyak data pesanan di sini -->
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-end fw-bold">Total Harga</td>
                        <td>Rp. 0</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>

<div class="row">
    <br><br><br><br>
</div>

<?php foreach ($pending as $key => $value) : ?>
    <div class="modal fade" id="detailPesananModal<?= $value['id_pesanan'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="max-height: calc(100vh - 200px);overflow-y: auto;">
                    <div class="d-flex flex-column justify-content-center align-items-center" id="order-heading">
                        <div class="text-uppercase">
                            <p>Order detail</p>
                        </div>
                        <div class="h4"><?= date('l - M d, Y', strtotime($value['tgl_pesanan'])) ?></div>
                        <div class="pt-1">
                            <p>Order #<?= $value['id_pesanan'] ?> saat ini <b class="text-dark"> <?= $value['status_pesanan'] ?></b></p>
                        </div>
                    </div>
                    <div class="bg-white mt-2">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th scope="row">Daftar Barang</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr style="margin-top: 0px;margin-bottom:10px">
                        <?php
                        $brg = $this->db->select('*')->from('tb_pesanan_detail')->join('tb_barang', 'tb_barang.id_brg = tb_pesanan_detail.id_brg')->where('id_pesanan', $value['id_pesanan'])->get()->result_array();
                        ?>
                        <?php foreach ($brg as $key => $b) : ?>
                            <?php
                            $gambar = $b['gambar_barang'] == "https://dodolan.jogjakota.go.id/assets/media/default/default-product.png" ? "<img width=\"auto\" height=\"50\" style='\border-radius: 3px;' src='" . $b['gambar_barang'] . "'>" : "<img width=\"auto\" height=\"50\" style='\border-radius: 3px;' src='" . base_url('public/template/upload/barang/' . $b['gambar_barang']) . "'>";
                            ?>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td style="width: 20%;">
                                            <b><?= $b['jumlah_jual'] ?>x<?= $b['harga_saat_ini'] ?></b>
                                        </td>
                                        <td style="width: 10%;">
                                            <?= $gambar ?>
                                        </td>
                                        <td style="width: 70%;" class="text-end">
                                            <?= $b['nama_barang'] ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php endforeach ?>
                        <div class="pt-2 border-bottom mb-3"></div>
                        <div class="d-flex justify-content-between pl-3">
                            <div class="text-muted">Payment Method</div>
                            <div class="ml-auto">
                                <img src="https://www.freepnglogos.com/uploads/mastercard-png/mastercard-logo-logok-15.png" alt="" width="30" height="30">
                                <label>Mastercard ******5342</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pl-3">
                            <div class="text-muted">Ongkos Kirim</div>
                            <div class="ml-auto float-end">
                                <label>Free</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pl-3 py-3 mb-4 border-bottom">
                            <div class="text-muted">
                                Today's Total
                            </div>
                            <div class="ml-auto price">
                                Rp. <?= number_format($value['grand_total']) ?>
                            </div>
                        </div>
                        <div class="row border rounded p-1 my-3">
                            <div class="col-md-12 py-3">
                                <div class="d-flex flex-column align-items start">
                                    <b>Alamat Pengiriman</b>
                                    <p class="text-justify pt-2">James Thompson, 356 Jonathon Apt.220,</p>
                                    <p class="text-justify">New York</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-validasi" data-id_pesanan="<?= $value['id_pesanan'] ?>">Siap Dikirimkan</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<?php $this->load->view('layouts/kurir/menu'); ?>
<?php $this->load->view('layouts/kurir/footer'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // Menangkap klik pada tombol
        $('.btn-validasi').on('click', function() {
            // Mendapatkan ID pesanan dari atribut data
            var id_pesanan = $(this).data('id_pesanan');

            // Kirim AJAX ke server
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('misi/validasi'); ?>",
                type: "POST",
                data: {
                    id: id_pesanan
                },
                success: function(response) {
                    if (response.success == true) {
                        Swal.fire({
                            title: 'Success!',
                            text: response.msg,
                            icon: 'success',
                            confirmButtonText: 'Close'
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: response.msg,
                            icon: 'error',
                            confirmButtonText: 'Close'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Tangani kesalahan jika ada
                    console.error('Terjadi kesalahan:', error);
                }
            });
        });
    });
</script>
</body>

</html>