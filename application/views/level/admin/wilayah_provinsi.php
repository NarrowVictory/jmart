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
          Data Provinsi
        </h2>
      </div>
    </div>
    <div class="row align-items-center mt-3">
      <div class="col-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <form id="form-simpan" method="POST">
              <div class="mb-3">
                <label class="form-label required">Nama Provinsi</label>
                <div>
                  <input required type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama Provinsi" id="nama_provinsi">
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
        <div class="card table" style="margin-top:-5px">
          <div class="card-body p-0">
            <div class="table-header">
              Hasil Untuk Data Provinsi
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped" id="dataProvinsi" style="width: 100%;">
                <thead>
                  <tr>
                    <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;" class="text-center fw-bold" width="7"><button class="table-sort">No</button></th>
                    <th style="padding: 15px;font-size:11px;background: repeat-x #F4F4F4;" class="text-left fw-bold"><button class="table-sort">Nama Provinsi</button></th>
                    <th style="padding: 15px;font-size:11px;background: repeat-x #F4F4F4;" class="text-center fw-bold" width="20"><button class="table-sort">Action</button></th>
                  </tr>
                  <tr>
                    <th class="align-middle text-center">
                      #
                    </th>
                    <th>
                      <input type="text" class="form-control" placeholder="Provinsi" id="nama_provinsi_filter">
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

<div class="modal fade" id="ubahProvinsiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Provinsi</h5>
        <<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formUbahProvinsi" method="POST" onsubmit="return simpanPerubahanProvinsi();">
        <div class="modal-body">
          <div class="mb-3">
            <label for="namaProvinsi" class="form-label">Nama Provinsi</label>
            <input type="hidden" id="idProvinsiModal" name="id_provinsi">
            <input type="text" class="form-control" id="namaProvinsiModal" name="nama_provinsi">
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
    $('#dataProvinsi').DataTable({
      ordering: false,
      processing: true,
      serverSide: true,
      searching: true, // Aktifkan pencarian global
      ajax: {
        url: "<?php echo base_url('provinsi/json'); ?>",
        type: "POST",
        data: function(d) {
          d.nama_provinsi = $('#nama_provinsi_filter').val();
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
          className: "text-center"
        }
      ]
    });

    $('#nama_provinsi_filter').on('input', function() {
      $('#dataProvinsi').DataTable().ajax.reload();
    });

    $("#form-simpan").submit(function(e) {
      e.preventDefault();

      // Ambil data dari input
      var namaProvinsi = $("input[type='text']").val();

      // Kirim data ke controller dengan AJAX
      $.ajax({
        url: "<?php echo base_url('provinsi/simpan'); ?>",
        type: "POST",
        data: {
          nama_provinsi: namaProvinsi
        },
        dataType: "json",
        success: function(response) {
          if (response.status === "success") {
            $('#dataProvinsi').DataTable().ajax.reload();
            $("#nama_provinsi").val("");
            toastr.success('Provinsi Berhasil ditambahkan.'); // Menampilkan notifikasi success
          } else {
            toastr.error(response.message); // Menampilkan notifikasi error
          }
        }
      });
    });
  });

  function ubahProvinsi(link) {
    var id = link.getAttribute("data-id");
    var nama = link.getAttribute("data-nama");

    $('#idProvinsiModal').val(id); // Mengisi idProvinsi (input hidden)
    $('#namaProvinsiModal').val(nama);

    $('#ubahProvinsiModal').modal('show');
  }

  function simpanPerubahanProvinsi() {
    var idProvinsi = $('#idProvinsiModal').val();
    var namaProvinsiBaru = $('#namaProvinsiModal').val();

    // Menggunakan Ajax untuk mengirim data perubahan ke server
    $.ajax({
      url: '<?= base_url('provinsi/ubah/') ?>' + idProvinsi, // Gantilah URL_API_ANDA dengan URL API yang sesuai
      type: 'POST',
      dataType: 'json',
      data: {
        id_provinsi: idProvinsi,
        nama_provinsi: namaProvinsiBaru
      },
      success: function(response) {
        if (response.status === 'success') {
          $('#dataProvinsi').DataTable().ajax.reload();
          toastr.success('Provinsi Berhasil diubah.');
          $('#ubahProvinsiModal').modal('hide');
        } else {
          alert('Gagal mengubah data provinsi.');
        }
      },
      error: function() {
        alert('Terjadi kesalahan saat mengubah data provinsi.');
      },
    });

    // Mengembalikan false untuk mencegah form dikirim ulang
    return false;
  }

  function deleteProvinsi(link) {
    var idProvinsi = link.getAttribute("data-id");

    // Konfirmasi penghapusan dengan dialog konfirmasi JavaScript (Opsional)
    var confirmation = confirm("Apakah Anda yakin ingin menghapus provinsi ini?");
    if (confirmation) {
      $.ajax({
        url: "<?php echo base_url('provinsi/delete/'); ?>" + idProvinsi,
        type: "POST",
        dataType: "json",
        success: function(response) {
          if (response.status === "success") {
            $('#dataProvinsi').DataTable().ajax.reload();
            toastr.success('Provinsi Berhasil dihapus.');
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