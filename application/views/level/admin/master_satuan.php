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
          Data Satuan Barang
        </h2>
      </div>
    </div>
    <div class="row align-items-center mt-3">
      <div class="col-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <form id="form-simpan" method="POST">
              <div class="mb-3">
                <label class="form-label required">Nama Satuan</label>
                <div>
                  <input required type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama Satuan" id="nama_satuan" id="nama_satuan">
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
              Hasil Untuk Data Satuan
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped" id="dataSatuan" style="width: 100%;">
                <thead>
                  <tr>
                    <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;" width="7"><button class="table-sort">No</button></th>
                    <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Nama Satuan</button></th>
                    <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Digunakan Pada</button></th>
                    <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Action</button></th>
                  </tr>
                  <tr>
                    <th class="align-middle text-center">
                      #
                    </th>
                    <th>
                      <input type="text" class="form-control" placeholder="Satuan" id="nama_satuan_filter">
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

<div class="modal fade" id="ubahSatuanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Satuan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formUbahSatuan" method="POST" onsubmit="return simpanPerubahanSatuan();">
        <div class="modal-body">
          <div class="mb-3">
            <label for="namaSatuan" class="form-label">Nama Satuan</label>
            <input type="hidden" id="idSatuanModal" name="id_Satuan">
            <input type="text" class="form-control" id="namaSatuanModal" name="nama_satuan">
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
    $('#dataSatuan').DataTable({
      ordering: false,
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "<?php echo base_url('satuan/json'); ?>",
        "type": "POST",
        data: function(d) {
          d.nama_satuan = $('#nama_satuan_filter').val();
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
        },
        {
          data: "3",
          className: "text-center"
        }
      ]
    });

    $("#form-simpan").submit(function(e) {
      e.preventDefault();

      // Ambil data dari input
      var namaSatuan = $("#nama_satuan").val();

      // Kirim data ke controller dengan AJAX
      $.ajax({
        url: "<?php echo base_url('satuan/simpan'); ?>",
        type: "POST",
        data: {
          nama_satuan: namaSatuan
        },
        dataType: "json",
        success: function(response) {
          if (response.status === "success") {
            $('#dataSatuan').DataTable().ajax.reload();
            $("#nama_satuan").val("");
            toastr.success('Satuan Berhasil ditambahkan.'); // Menampilkan notifikasi success
          } else {
            toastr.error(response.message); // Menampilkan notifikasi error
          }
        }
      });
    });

    $('#nama_satuan_filter').on('input', function() {
      $('#dataSatuan').DataTable().ajax.reload();
    });
  });

  function ubahSatuan(link) {
    var id = link.getAttribute("data-id");
    var nama = link.getAttribute("data-nama");

    $('#idSatuanModal').val(id); // Mengisi idSatuan (input hidden)
    $('#namaSatuanModal').val(nama);

    $('#ubahSatuanModal').modal('show');
  }

  function simpanPerubahanSatuan() {
    var idSatuan = $('#idSatuanModal').val();
    var namaSatuanBaru = $('#namaSatuanModal').val();

    // Menggunakan Ajax untuk mengirim data perubahan ke server
    $.ajax({
      url: '<?= base_url('satuan/ubah') ?>', // Gantilah URL_API_ANDA dengan URL API yang sesuai
      type: 'POST',
      dataType: 'json',
      data: {
        id_satuan: idSatuan,
        nama_satuan: namaSatuanBaru
      },
      success: function(response) {
        if (response.status === 'success') {
          $('#dataSatuan').DataTable().ajax.reload();
          toastr.success('Satuan Berhasil diubah.');
          $('#ubahSatuanModal').modal('hide');
        } else {
          alert('Gagal mengubah data satuan.');
        }
      },
      error: function() {
        alert('Terjadi kesalahan saat mengubah data satuan.');
      },
    });

    // Mengembalikan false untuk mencegah form dikirim ulang
    return false;
  }


  function deleteSatuan(link) {
    var idSatuan = link.getAttribute("data-id");

    // Konfirmasi penghapusan dengan dialog konfirmasi JavaScript (Opsional)
    var confirmation = confirm("Apakah Anda yakin ingin menghapus satuan ini?");
    if (confirmation) {
      $.ajax({
        url: "<?php echo base_url('satuan/delete/'); ?>" + idSatuan,
        type: "POST",
        dataType: "json",
        success: function(response) {
          if (response.status === "success") {
            $('#dataSatuan').DataTable().ajax.reload();
            toastr.success('Satuan Berhasil dihapus.');
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