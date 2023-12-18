<?php $this->load->view('layouts/admin/head'); ?>
<link rel="stylesheet" href="<?= base_url('') ?>public/template/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
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
          Data Pemesanan Barang
        </h2>
      </div>
    </div>
    <div class="row align-items-center mt-3">
      <div class="col">
        <div class="btn-group">
          <a href="<?= base_url('product/pemesanan/add') ?>" class="btn btn-primary me-1" title="Kelola Tagihan">
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
          <a href="#" class="btn btn-success" title="Lihat Diskon Tagihan">
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
        <div class="card col-8 mb-3">
          <div class="card-body">
            <div class="mb-3 row">
              <label class="col-3 col-form-label required">Ketik Nama Produk</label>
              <div class="col">
                <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Search By Product">
              </div>
              <div class="col-auto">
                <a href="#" class="btn btn-success">
                  Filter
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="card table">
          <div class="card-body p-0">
            <div class="table-header">
              Hasil Untuk Data Pemesanan Produk
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped" id="dataPemesanan" style="width: 100%;">
                <thead>
                  <tr>
                    <th><button class="table-sort">No</button></th>
                    <th><button class="table-sort">Nama</button></th>
                    <th><button class="table-sort">Tanggal Pesan</button></th>
                    <th><button class="table-sort">Tanggal Diterima</button></th>
                    <th><button class="table-sort">Pemasok</button></th>
                    <th><button class="table-sort">Jumlah</button></th>
                    <th><button class="table-sort">Status Pembayaran</button></th>
                    <th><button class="table-sort">Action</button></th>
                  </tr>
                  <tr>
                    <th class="align-middle text-center">
                      #
                    </th>
                    <th>
                      <select name="status_pemesanan_filter" id="status_pemesanan_filter" class="form-control">
                        <option value="">Pilih Status</option>
                        <option value="Open">Open</option>
                        <option value="Received">Received</option>
                      </select>
                    </th>
                    <th class="align-middle text-center">
                      #
                    </th>
                    <th class="align-middle text-center">
                      #
                    </th>
                    <th>
                      <select name="nama_supplier_filter" id="nama_supplier_filter" class="form-control">
                        <option value="" selected>Pilih Pemasok</option>
                        <?php foreach ($supplier as $key => $value) : ?>
                          <option value="<?= $value['id_supplier'] ?>"><?= $value['nama_supplier'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </th>
                    <th class="align-middle text-center">
                      #
                    </th>
                    <th>
                      <select name="status_pembayaran_filter" id="status_pembayaran_filter" class="form-control">
                        <option value="" selected>Pilih Status</option>
                        <option value="Belum Lunas">Belum Lunas</option>
                        <option value="Lunas">Lunas</option>
                      </select>
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

<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="statusModalLabel">Ubah Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formUbahStatus" method="POST" onsubmit="return simpanPerubahanStatus();">
        <div class="modal-body">
          <div class="form-group mb-2">
            <label for="selectStatus">Pilih Status Pemesanan:</label>
            <input type="hidden" name="idPemesananModal" id="idPemesananModal">
            <select class="form-select" id="selectStatusModal" name="selectStatusModal">
              <option value="Open">Belum Diterima</option>
              <option value="Received">Sudah Diterima</option>
            </select>
          </div>
          <div class="form-group">
            <label for="selectStatus">Pilih Status Pembayaran:</label>
            <select class="form-select" id="selectPembayaranModal" name="selectPembayaranModal">
              <option value="Lunas">Lunas</option>
              <option value="Belum Lunas">Belum Lunas</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary mt-2">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php $this->load->view('layouts/admin/footer'); ?>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script>
  $(document).ready(function() {
    $('#dataPemesanan').DataTable({
      ordering: false,
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "<?php echo base_url('product/json_pemesanan'); ?>",
        "type": "POST",
        data: function(d) {
          d.nama_supplier = $('#nama_supplier_filter').val();
          d.status_pemesanan = $('#status_pemesanan_filter').val();
          d.status_pembayaran = $('#status_pembayaran_filter').val();
        }
      },
      columns: [{
          data: "0",
          className: "text-center"
        },
        {
          data: "1"
        },
        {
          data: "2",
          className: "text-left dt-nowrap"
        },
        {
          data: "3",
          className: "text-center"
        },
        {
          data: "4",
          className: "text-left"
        },
        {
          data: "5",
          className: "text-center"
        },
        {
          data: "6",
          className: "text-center"
        }, {
          data: "7",
          className: "text-center"
        }
      ]
    });

    $('#nama_supplier_filter').on('input', function() {
      $('#dataPemesanan').DataTable().ajax.reload();
    });

    $('#status_pemesanan_filter').on('change', function() {
      $('#dataPemesanan').DataTable().ajax.reload();
    });

    $('#status_pembayaran_filter').on('change', function() {
      $('#dataPemesanan').DataTable().ajax.reload();
    });
  });

  function ubahStatus(link) {
    var id = link.getAttribute("data-id");
    var status = link.getAttribute("data-status");
    var pembayaran = link.getAttribute("data-pembayaran");

    $('#idPemesananModal').val(id); // Mengisi idKategori (input hidden)
    $('#selectStatusModal').val(status);
    $('#selectPembayaranModal').val(pembayaran);

    $('#statusModal').modal('show');
  }

  function simpanPerubahanStatus() {
    var idPemesanan = $('#idPemesananModal').val();
    var selectStatusBaru = $('#selectStatusModal').val();
    var selectPembayaranBaru = $('#selectPembayaranModal').val();

    // Menggunakan Ajax untuk mengirim data perubahan ke server
    $.ajax({
      url: '<?= base_url('product/ubah_pemesanan') ?>', // Gantilah URL_API_ANDA dengan URL API yang sesuai
      type: 'POST',
      dataType: 'json',
      data: {
        id_pemesanan: idPemesanan,
        status: selectStatusBaru,
        pembayaran: selectPembayaranBaru,
      },
      success: function(response) {
        if (response.status === 'success') {
          $('#dataPemesanan').DataTable().ajax.reload();
          toastr.success('Status Berhasil diubah.');
          $('#statusModal').modal('hide');
        } else {
          alert('Gagal mengubah data kasir.');
        }
      },
      error: function() {
        alert('Terjadi kesalahan saat mengubah data satuan.');
      },
    });

    // Mengembalikan false untuk mencegah form dikirim ulang
    return false;
  }
</script>
</body>

</html>