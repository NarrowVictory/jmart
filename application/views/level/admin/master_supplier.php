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
          Data Supplier
        </h2>
      </div>
    </div>
    <div class="row align-items-center mt-3">
      <div class="col-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <form id="form-simpan" method="POST" autocomplete="off">
              <div class="mb-3">
                <label class="form-label required">Nama Supplier</label>
                <div>
                  <input required type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama Supllier" id="nama_supplier" id="nama_supplier">
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label required">PIC</label>
                <div>
                  <input required type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama PIC" id="pic_supplier" id="pic_supplier">
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label required">Kontak Supplier</label>
                <div>
                  <input required type="text" class="form-control" aria-describedby="emailHelp" placeholder="Kontak Supplier" id="kontak_supplier" id="kontak_supplier">
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-white">Reset</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
    <div class="row">
      <div class="col-sm-12">
        <div class="card table">
          <div class="card-body p-0">
            <div class="table-header">
              Hasil Untuk Data Supplier
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped" id="dataSupplier" style="width: 100%;">
                <thead>
                  <tr>
                    <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;" width="7"><button class="table-sort">No</button></th>
                    <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Nama Supplier</button></th>
                    <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">PIC</button></th>
                    <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Kontak Supplier</button></th>
                    <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Action</button></th>
                  </tr>
                  <tr>
                    <th class="align-middle text-center">
                      #
                    </th>
                    <th>
                      <input type="text" class="form-control" placeholder="Nama Supplier" id="nama_supplier_filter">
                    </th>
                    <th>
                      <input type="text" class="form-control" placeholder="PIC" id="pic_supplier_filter">
                    </th>
                    <th>
                      <input type="text" class="form-control" placeholder="Kontak Supplier" id="kontak_supplier_filter">
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

<div class="modal fade" id="ubahSupplierModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Supplier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formUbahSupplier" method="POST" onsubmit="return simpanPerubahanSupplier();">
        <div class="modal-body">
          <div class="mb-3">
            <label for="namaSupplier" class="form-label">Nama Supplier</label>
            <input type="hidden" id="idSupplierModal" name="id_supplier">
            <input type="text" class="form-control" id="namaSupplierModal" name="nama_supplier">
          </div>
          <div class="mb-3">
            <label for="namaSupplier" class="form-label">PIC Supplier</label>
            <input type="text" class="form-control" id="picSupplierModal" name="pic">
          </div>
          <div class="mb-3">
            <label for="namaSupplier" class="form-label">Kontak Supplier</label>
            <input type="text" class="form-control" id="kontakSupplierModal" name="kontak_supplier">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php $this->load->view('layouts/admin/footer'); ?>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script>
  $(document).ready(function() {
    $('#dataSupplier').DataTable({
      ordering: false,
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "<?php echo base_url('supplier/json'); ?>",
        "type": "POST",
        data: function(d) {
          d.nama = $('#nama_supplier_filter').val();
          d.pic = $('#pic_supplier_filter').val();
          d.kontak = $('#kontak_supplier_filter').val();
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
          className: "text-left"
        },
        {
          data: "3",
          className: "text-left"
        },
        {
          data: "4",
          className: "text-center"
        }
      ]
    });

    $("#form-simpan").submit(function(e) {
      e.preventDefault();

      // Ambil data dari input
      var nama = $("#nama_supplier").val();
      var pic = $("#pic_supplier").val();
      var kontak = $("#kontak_supplier").val();

      // Kirim data ke controller dengan AJAX
      $.ajax({
        url: "<?php echo base_url('supplier/simpan'); ?>",
        type: "POST",
        data: {
          nama_supplier: nama,
          pic_supplier: pic,
          kontak_supplier: kontak,
        },
        dataType: "json",
        success: function(response) {
          if (response.status === "success") {
            $('#dataSupplier').DataTable().ajax.reload();
            $("#nama_supplier").val("");
            $("#pic_supplier").val("");
            $("#kontak_supplier").val("");
            toastr.success('Supplier Berhasil ditambahkan.'); // Menampilkan notifikasi success
          } else {
            toastr.error(response.message); // Menampilkan notifikasi error
          }
        }
      });
    });

    $('#nama_supplier_filter').on('input', function() {
      $('#dataSupplier').DataTable().ajax.reload();
    });

    $('#pic_supplier_filter').on('input', function() {
      $('#dataSupplier').DataTable().ajax.reload();
    });

    $('#kontak_supplier_filter').on('input', function() {
      $('#dataSupplier').DataTable().ajax.reload();
    });
  });

  function ubahSupplier(link) {
    var id = link.getAttribute("data-id");
    var nama = link.getAttribute("data-nama");
    var pic = link.getAttribute("data-pic");
    var kontak = link.getAttribute("data-kontak");

    $('#idSupplierModal').val(id); // Mengisi idSupplier (input hidden)
    $('#namaSupplierModal').val(nama);
    $('#picSupplierModal').val(pic);
    $('#kontakSupplierModal').val(kontak);

    $('#ubahSupplierModal').modal('show');
  }

  function simpanPerubahanSupplier() {
    var idSupplier = $('#idSupplierModal').val();
    var namaSupplierBaru = $('#namaSupplierModal').val();
    var picSupplierBaru = $('#picSupplierModal').val();
    var kontakSupplierBaru = $('#kontakSupplierModal').val();

    // Menggunakan Ajax untuk mengirim data perubahan ke server
    $.ajax({
      url: '<?= base_url('supplier/ubah') ?>', // Gantilah URL_API_ANDA dengan URL API yang sesuai
      type: 'POST',
      dataType: 'json',
      data: {
        id_supplier: idSupplier,
        nama_supplier: namaSupplierBaru,
        pic_supplier: picSupplierBaru,
        kontak_supplier: kontakSupplierBaru
      },
      success: function(response) {
        if (response.status === 'success') {
          $('#dataSupplier').DataTable().ajax.reload();
          toastr.success('Supplier Berhasil diubah.');
          $('#ubahSupplierModal').modal('hide');
        } else {
          alert('Gagal mengubah data supplier.');
        }
      },
      error: function() {
        alert('Terjadi kesalahan saat mengubah data supplier.');
      },
    });

    // Mengembalikan false untuk mencegah form dikirim ulang
    return false;
  }

  function deleteSupplier(link) {
    var idSupplier = link.getAttribute("data-id");

    // Konfirmasi penghapusan dengan dialog konfirmasi JavaScript (Opsional)
    var confirmation = confirm("Apakah Anda yakin ingin menghapus supplier ini?");
    if (confirmation) {
      $.ajax({
        url: "<?php echo base_url('supplier/delete/'); ?>" + idSupplier,
        type: "POST",
        dataType: "json",
        success: function(response) {
          if (response.status === "success") {
            $('#dataSupplier').DataTable().ajax.reload();
            toastr.success('Supplier Berhasil dihapus.');
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