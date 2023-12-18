<?php $this->load->view('layouts/admin/head'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<style>
    .sa-page-meta {
        border-bottom: 1px solid #2125291a;
        border-top: 1px solid #2125291a;
        font-size: .875rem;
        line-height: 1.25rem;
        padding: 0.5625rem 1rem;
    }

    .sa-page-meta__body {
        overflow: hidden;
    }

    .sa-page-meta__list {
        display: flex;
        flex-wrap: wrap;
        margin-top: -0.25rem;
        margin-left: -1.5625rem;
    }

    .sa-page-meta__item {
        margin-top: 0.25rem;
        position: relative;
        margin-left: 1.5625rem;
    }

    .sa-page-meta__item:before {
        left: -0.8125rem;
        background: #21252933;
        content: "";
        display: block;
        height: calc(100% - 0.375rem);
        position: absolute;
        top: 0.1875rem;
        width: 0.0625rem;
    }

    .steps .step {
        display: block;
        width: 100%;
        text-align: center;
    }

    @media (max-width: 991.98px) {
        .steps .step .step-icon-wrap {
            height: 50px;
        }
    }

    .steps .step .step-icon-wrap {
        display: block;
        position: relative;
        width: 100%;
        height: 80px;
        text-align: center;
    }

    .steps .step .step-title {
        margin-top: 16px;
        margin-bottom: 0;
        color: #606975;
        font-size: 14px;
        font-weight: 500;
    }

    .steps .step.completed .step-icon {
        border-color: #88aaf3;
        background-color: #88aaf3;
        color: #fff;
    }

    @media (max-width: 991.98px) {
        .steps .step .step-icon {
            width: 50px;
            height: 50px;
            font-size: 26px;
            line-height: 50px;
            border-radius: 18px;
        }
    }

    .steps .step .step-icon {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
        border: 1px solid #e1e7ec;
        border-radius: 30px;
        background-color: #f5f5f5;
        color: #374250;
        font-size: 38px;
        line-height: 81px;
        z-index: 5;
    }

    .steps .step.completed .step-icon-wrap::before {
        background-color: #88aaf3;
    }

    .steps .step.completed .step-icon-wrap::after {
        background-color: #88aaf3;
    }

    .steps .step .step-icon-wrap::before {
        display: block;
        position: absolute;
        top: 50%;
        width: 50%;
        height: 3px;
        margin-top: -1px;
        background-color: #e1e7ec;
        content: "";
        z-index: 1;
        left: 0;
    }

    .steps .step .step-icon-wrap::after {
        display: block;
        position: absolute;
        top: 50%;
        width: 50%;
        height: 3px;
        margin-top: -1px;
        background-color: #e1e7ec;
        content: "";
        z-index: 1;
        right: 0;
    }
</style>
<?php $this->load->view('layouts/admin/header'); ?>
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-4 align-items-center">
            <div class="col">
                <h1 class="h3 m-0">Order #<?= $id ?></h1>
            </div>
            <div class="col-auto d-flex">
                <a href="javascipt::void" onclick="window.close()" class="btn btn-secondary text-dark me-3" style="background-color:#e6e8eb"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
                <a href="#" class="btn btn-warning" style="background-color:#ffd333">Edit</a>
            </div>
        </div>
        <div class="sa-page-meta mt-3">
            <div class="sa-page-meta__body">
                <div class="sa-page-meta__list">
                    <div class="sa-page-meta__item"><?= date('d/F/Y', strtotime($pesanan['tgl_pesanan'])) ?> at <?= date('H:i:s', strtotime($pesanan['tgl_pesanan'])) ?></div>
                    <div class="sa-page-meta__item"><?= count($barang) . " items" ?></div>
                    <div class="sa-page-meta__item">Total <?= number_format($pesanan['grand_total']) ?></div>
                    <div class="sa-page-meta__item d-flex align-items-center fs-6">
                        <span class="badge bg-success text-white p-2 me-2"><?= $pesanan['status_pesanan'] ?></span>
                        <span class="badge bg-warning text-white p-2 me-2"><?= $pesanan['status_pembayaran'] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-12 col-md-7">
                <div class="card table mb-2 w-100">
                    <div class="card-body">
                        <h2 class="mb-0 fs-exact-18 me-4">Items</h2>
                    </div>
                    <div class="table-responsive p-1">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($barang as $key => $value) : ?>
                                    <?php
                                    $gambar = $value['gambar_barang'] == "https://dodolan.jogjakota.go.id/assets/media/default/default-product.png" ? "<img style='\border-radius: 3px;width:50px' src='" . $value['gambar_barang'] . "'>" : "<img style='\border-radius: 3px;width:50px' src='" . base_url('public/template/upload/barang/' . $value['gambar_barang']) . "'>";
                                    ?>
                                    <tr>
                                        <td class="text-center">
                                            <?= $gambar ?>
                                        </td>
                                        <td><?= $value['nama_barang'] ?></td>
                                        <td><?= $value['jumlah_jual'] ?></td>
                                        <td class="font-500"><?= $value['harga_saat_ini'] ?></td>
                                    </tr>
                                <?php endforeach ?>
                                <tr>
                                    <td colspan="3" class="fw-bold" align="right">Sub Total</td>
                                    <td class="font-500"><?= $pesanan['grand_total'] ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="fw-bold" align="right">Ongkos Kirim</td>
                                    <td class="font-500">00</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="fw-bold" align="right">Total Amount</td>
                                    <td class="font-500"><?= $pesanan['grand_total'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="card mb-2 w-100">
                    <div class="card-header">
                        <h2 class="fs-exact-16 mb-0">Customer</h2>
                    </div>
                    <div class="card-body d-flex align-items-center pt-4">
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <a href="#">
                                        <span class="avatar" style="background-image: url(./static/avatars/003f.jpg)"></span>
                                    </a>
                                </div>
                                <div class="col text-truncate">
                                    <a href="#" class="text-reset d-block"><?= $pesanan['nama_member'] ?></a>
                                    <div class="d-block text-secondary text-truncate mt-n1">Bergabung pada : <?= date('d/m/Y H:i:s', strtotime($pesanan['created_at'])) ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2 w-100">
                    <div class="card-header">
                        <h2 class="mb-0 fs-exact-18 me-4">Transactions</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <tbody>
                                <tr>
                                    <td>Pembayaran<div class="text-muted fs-exact-13">melalui ...</div>
                                    </td>
                                    <td>October 7, 2020</td>
                                    <td class="text-end">
                                        <div class="sa-price"><?= $pesanan['grand_total'] ?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Contact Person<div class="text-muted fs-exact-13">Whatsapp</div>
                                    </td>
                                    <td colspan="2" class="text-end">
                                        085277961769
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header bg-dark text-white text-center justify-content-center">
                        <span class="text-uppercase">Tracking Order No - </span>
                        <span class="text-medium">&nbsp;<?= $id ?></span>
                    </div>
                    <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2" style="background:#f5f5f5 !important">
                        <div class="w-100 text-center py-1 px-2"><span class="text-medium">Dikirim oleh:</span> Kurir JMART</div>
                        <div class="w-100 text-center py-1 px-2"><span class="text-medium">Status:</span>
                            <?= $pesanan['status_pesanan'] ?></div>
                        <div class="w-100 text-center py-1 px-2"><span class="text-medium">Tanggal Pesanan:</span> <?= date('d-m-Y H:i:s', strtotime($pesanan['tgl_pesanan'])) ?></div>
                    </div>
                    <div class="card-body">
                        <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                            <div class="step completed">
                                <div class="step-icon-wrap">
                                    <div class="step-icon"><i class="fa fa-clock"></i></div>
                                </div>
                                <h4 class="step-title">Pesanan Dibuat</h4>
                                <p><?= date('d/F/Y H:i:s', strtotime($pesanan['tgl_pesanan'])) ?></p>
                            </div>
                            <?php
                            $cek_dikemas = $this->db->select('*')->from('tb_pesanan_tracking')->where('status_tracking', 'Pesanan Disiapkan')->where('id_pesanan', $id)->get()->row_array();
                            ?>
                            <div class="step <?= isset($cek_dikemas) ? "completed" : "" ?>">
                                <div class="step-icon-wrap">
                                    <div class="step-icon"><i class="fa fa-gift"></i></div>
                                </div>
                                <h4 class="step-title">Pesanan Dikemas</h4>

                                <?php if (isset($cek_dikemas)) : ?>
                                    <p><?= date('d/F/Y H:i:s', strtotime($cek_dikemas['updated_at'])) ?></p>
                                <?php else : ?>
                                    <p>None</p>
                                <?php endif ?>
                            </div>
                            <?php
                            $cek_dikirimkan = $this->db->select('*')->from('tb_pesanan_tracking')->where('status_tracking', 'Pesanan Dikirimkan')->where('id_pesanan', $id)->get()->row_array();
                            ?>
                            <div class="step <?= isset($cek_dikirimkan) ? "completed" : "" ?>">
                                <div class="step-icon-wrap">
                                    <div class="step-icon"><i class="fa fa-car"></i></div>
                                </div>
                                <h4 class="step-title">Pesanan Dikirimkan</h4>
                                <?php if (isset($cek_dikirimkan)) : ?>
                                    <p><?= date('d/F/Y H:i:s', strtotime($cek_dikirimkan['updated_at'])) ?></p>
                                <?php else : ?>
                                    <p>None</p>
                                <?php endif ?>
                            </div>
                            <?php
                            $cek_selesai = $this->db->select('*')->from('tb_pesanan_tracking')->where('status_tracking', 'Pesanan Selesai')->where('id_pesanan', $id)->get()->row_array();
                            ?>
                            <div class="step <?= isset($cek_selesai) ? "completed" : "" ?>">
                                <div class="step-icon-wrap">
                                    <div class="step-icon"><i class="fa fa-check"></i></div>
                                </div>
                                <h4 class="step-title">Pesanan Selesai</h4>
                                <?php if (isset($cek_selesai)) : ?>
                                    <p><?= date('d/F/Y H:i:s', strtotime($cek_selesai['updated_at'])) ?></p>
                                <?php else : ?>
                                    <p>None</p>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/admin/footer'); ?>
</body>

</html>