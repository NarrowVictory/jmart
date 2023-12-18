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
</style>
<?php $this->load->view('layouts/admin/header'); ?>
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Data Anggota
                </h2>
            </div>
        </div>
        <div class="row align-items-center mt-3">
            <div class="col">
                <div class="btn-group">
                    <a data-bs-toggle="modal" data-bs-target="#tambahUserModal" href="#" class="btn btn-primary me-1" title="Kelola Tagihan">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        Tambah
                    </a>
                    <a href="#" class="btn btn-secondary me-1" title="Lihat Diskon Tagihan">
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
                <div class="card table" style="margin-top:-5px">
                    <div class="card-body p-0">
                        <div class="table-header">
                            Hasil Untuk Data Anggota
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="dataAnggota" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;" width="7"><button class="table-sort">No</button></th>
                                        <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Nama Member</button></th>
                                        <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">WA</button></th>
                                        <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">NIK</button></th>
                                        <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Belanja Ybs</button></th>
                                        <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Hutang Ybs</button></th>
                                        <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Action</button></th>
                                    </tr>
                                    <tr>
                                        <th class="align-middle text-center">
                                            #
                                        </th>
                                        <th>
                                            <input type="text" class="form-control" placeholder="Nama Member" id="nama_member_filter">
                                        </th>
                                        <th>
                                            <input type="text" class="form-control" placeholder="No. HP" id="wa_member_filter">
                                        </th>
                                        <th>
                                            <input type="text" class="form-control" placeholder="Nomor Induk" id="nomor_induk_filter">
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

<!-- Modal -->
<div class="modal fade" id="tambahUserModal" tabindex="-1" aria-labelledby="tambahUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahUserModalLabel">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: calc(100vh - 200px);overflow-y: auto;">
                <form id="tambahUserForm" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Username -->
                        <div class="col-6 mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required placeholder="Masukkan username...">
                            <small>** Inputan Harus Unik / Berbeda dengan yang lain!</small>
                        </div>

                        <!-- Password -->
                        <div class="col-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required placeholder="Masukkan password...">
                            <small>** Password Default 123</small>
                        </div>

                        <!-- Nama Member -->
                        <div class="col-6 mb-3">
                            <label for="nama_member" class="form-label">Nama Member</label>
                            <input type="text" class="form-control" id="nama_member" name="nama_member" required placeholder="Masukkan nama member...">
                        </div>

                        <!-- Email Member -->
                        <div class="col-6 mb-3">
                            <label for="email_member" class="form-label">Email Member</label>
                            <input type="email" class="form-control" id="email_member" name="email_member" required placeholder="Masukkan email member...">
                        </div>

                        <!-- WA Member -->
                        <div class="col-6 mb-3">
                            <label for="wa_member" class="form-label">WhatsApp Member</label>
                            <input type="tel" class="form-control" id="wa_member" name="wa_member" placeholder="Masukkan nomor WhatsApp member...">
                        </div>

                        <!-- Nomor Induk -->
                        <div class="col-6 mb-3">
                            <label for="nomor_induk" class="form-label">Nomor Induk</label>
                            <input type="text" class="form-control" id="nomor_induk" name="nomor_induk" placeholder="Masukkan nomor induk...">
                        </div>

                        <!-- Departemen (Dept) -->
                        <div class="col-6 mb-3">
                            <label for="dept" class="form-label">Departemen</label>
                            <input type="text" class="form-control" id="dept" name="dept" placeholder="Masukkan departemen...">
                        </div>

                        <!-- Level -->
                        <div class="col-6 mb-3">
                            <label for="level" class="form-label">Level</label>
                            <input type="text" class="form-control" id="level" name="level" placeholder="Masukkan level...">
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="col-6 mb-3">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Pilih tanggal lahir...">
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="col-6 mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" placeholder="Pilih jenis kelamin...">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <!-- Avatar -->
                        <div class="col-6 mb-3">
                            <label for="avatar" class="form-label">Avatar</label>
                            <input type="file" class="form-control" id="avatar" name="avatar" placeholder="Pilih avatar...">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->
<?php $this->load->view('layouts/admin/footer'); ?>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tambahUserForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '<?= base_url('anggota/simpan_data') ?>', // Sesuaikan dengan URL Controller Anda
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    alert(response);
                    setTimeout(() => {
                        location.href = "<?= base_url('anggota') ?>";
                    }, 2000);
                },
                error: function(error) {
                    alert('Error:', error);
                }
            });
        });

        $('#dataAnggota').DataTable({
            ordering: false,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('anggota/json'); ?>",
                "type": "POST",
                data: function(d) {
                    d.nama_member = $('#nama_member_filter').val();
                    d.wa_member = $('#wa_member_filter').val();
                    d.nomor_induk = $('#nomor_induk_filter').val();
                }
            },
            columns: [{
                    data: "0",
                    className: "text-center align-middle"
                },
                {
                    data: "1",
                    className: "text-left align-middle"
                },
                {
                    data: "2",
                    className: "text-left align-middle"
                },
                {
                    data: "3",
                    className: "text-center align-middle"
                },
                {
                    data: "4",
                    className: "text-center align-middle"
                },
                {
                    data: "5",
                    className: "text-center align-middle"
                },
                {
                    data: "6",
                    className: "text-center align-middle"
                },
            ]
        });

        $('#nama_member_filter').on('input', function() {
            $('#dataAnggota').DataTable().ajax.reload();
        });

        $('#wa_member_filter').on('input', function() {
            $('#dataAnggota').DataTable().ajax.reload();
        });

        $('#nomor_induk_filter').on('input', function() {
            $('#dataAnggota').DataTable().ajax.reload();
        });
    });

    function deleteAnggota(link) {
        var idUser = link.getAttribute("data-id");

        // Konfirmasi penghapusan dengan dialog konfirmasi JavaScript (Opsional)
        var confirmation = confirm("Apakah Anda yakin ingin menghapus kasir ini?");
        if (confirmation) {
            $.ajax({
                url: "<?php echo base_url('anggota/delete/'); ?>" + idUser,
                type: "POST",
                dataType: "json",
                success: function(response) {
                    if (response.status === "success") {
                        $('#dataAnggota').DataTable().ajax.reload();
                        toastr.success('Anggota Berhasil dihapus.');
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert("Terjadi kesalahan: " + error);
                }
            });
        }
    }
</script>

</html>