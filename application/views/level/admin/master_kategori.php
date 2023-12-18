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
          Data Kategori Barang
        </h2>
      </div>
    </div>
    <div class="row align-items-center mt-3">
      <div class="col-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <form id="form-simpan" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label class="form-label required">Nama Kategori</label>
                <div>
                  <input required type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama Kategori" id="nama_kategori" id="nama_kategori">
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label required">Gambar Kategori</label>
                <div>
                  <input type="file" class="form-control" aria-describedby="emailHelp" placeholder="Icon Kategori" id="icon_kategori" name="icon_kategori">
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
              Hasil Untuk Data Kategori
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped" id="dataKategori" style="width: 100%;">
                <thead>
                  <tr>
                    <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;" width="7"><button class="table-sort">No</button></th>
                    <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Nama Kategori</button></th>
                    <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Gambar Kategori</button></th>
                    <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Digunakan Pada</button></th>
                    <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Action</button></th>
                  </tr>
                  <tr>
                    <th class="align-middle text-center">
                      #
                    </th>
                    <th>
                      <input type="text" class="form-control" placeholder="Nama Kategori" id="nama_kategori_filter">
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

<div class="modal fade" id="ubahKategoriModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Kategori</h5>
        <<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formUbahKategori" method="POST" onsubmit="return simpanPerubahanKategori();" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="mb-3">
            <label for="namaKategori" class="form-label">Nama Kategori</label>
            <input type="hidden" id="idKategoriModal" name="id_kategori">
            <input type="hidden" id="iconKategoriOldModal" name="gambar_lama">
            <input type="text" class="form-control" id="namaKategoriModal" name="nama_kategori">
          </div>
          <div class="mb-3">
            <label for="namaKategori" class="form-label">Gambar Kategori</label>
            <input type="file" class="form-control" id="iconKategoriModal" name="icon_kategori">
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

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script>
  $(document).ready(function() {
    $('#dataKategori').DataTable({
      ordering: false,
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "<?php echo base_url('kategori/json'); ?>",
        "type": "POST",
        data: function(d) {
          d.nama_kategori = $('#nama_kategori_filter').val();
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
        },
        {
          data: "4",
          className: "text-center"
        }
      ]
    });

    $("#form-simpan").submit(function(e) {
      e.preventDefault();

      // Buat objek FormData untuk mengirim data
      var formData = new FormData();

      // Ambil data dari input
      var namaKategori = $("#nama_kategori").val();
      formData.append("nama_kategori", namaKategori);

      var iconKategori = $("#icon_kategori")[0].files[0];
      formData.append("icon_kategori", iconKategori);

      // Kirim data ke controller dengan AJAX
      $.ajax({
        url: "<?php echo base_url('kategori/simpan'); ?>",
        type: "POST",
        data: formData,
        contentType: false, // Diperlukan untuk FormData
        processData: false, // Diperlukan untuk FormData
        dataType: "json",
        success: function(response) {
          if (response.status === "success") {
            $('#dataKategori').DataTable().ajax.reload();
            $("#nama_kategori").val("");
            $("#icon_kategori").val("");
            toastr.success('Kategori Berhasil ditambahkan.'); // Menampilkan notifikasi success
          } else {
            toastr.error(response.message); // Menampilkan notifikasi error
          }
        }
      });
    });

    $('#nama_kategori_filter').on('input', function() {
      $('#dataKategori').DataTable().ajax.reload();
    });
  });

  function ubahKategori(link) {
    var id = link.getAttribute("data-id");
    var nama = link.getAttribute("data-nama");
    var icon = link.getAttribute("data-icon");

    $('#idKategoriModal').val(id); // Mengisi idKategori (input hidden)
    $('#namaKategoriModal').val(nama);
    $('#iconKategoriOldModal').val(icon);

    $('#ubahKategoriModal').modal('show');
  }

  function simpanPerubahanKategori() {
    var idKategori = $('#idKategoriModal').val();
    var namaKategoriBaru = $('#namaKategoriModal').val();
    var iconKategoriBaru = $("#iconKategoriModal")[0].files[0];
    var gambarLama = $("#iconKategoriOldModal").val();

    // Buat objek FormData untuk mengirim data formulir, termasuk file gambar
    var formData = new FormData();
    formData.append('id_kategori', idKategori);
    formData.append('nama_kategori', namaKategoriBaru);
    formData.append('icon_kategori', iconKategoriBaru);
    formData.append('gambar_lama', gambarLama);

    // Menggunakan Ajax untuk mengirim data perubahan ke server
    $.ajax({
      url: '<?= base_url('kategori/ubah') ?>', // Gantilah URL_API_ANDA dengan URL API yang sesuai
      type: 'POST',
      dataType: 'json',
      data: formData,
      contentType: false, // Diperlukan untuk FormData
      processData: false, // Diperlukan untuk FormData
      success: function(response) {
        if (response.status === 'success') {
          $('#dataKategori').DataTable().ajax.reload();
          toastr.success('Kategori Berhasil diubah.');
          $('#ubahKategoriModal').modal('hide');
        } else {
          alert('Gagal mengubah data kategori.');
        }
      },
      error: function(xhr, status, error) {
        alert(xhr.responseText);
      },
    });

    // Mengembalikan false untuk mencegah form dikirim ulang
    return false;
  }


  function deleteKategori(link) {
    var idKategori = link.getAttribute("data-id");

    // Konfirmasi penghapusan dengan dialog konfirmasi JavaScript (Opsional)
    var confirmation = confirm("Apakah Anda yakin ingin menghapus kategori ini?");
    if (confirmation) {
      $.ajax({
        url: "<?php echo base_url('kategori/delete/'); ?>" + idKategori,
        type: "POST",
        dataType: "json",
        success: function(response) {
          if (response.status === "success") {
            $('#dataKategori').DataTable().ajax.reload();
            toastr.success('Kategori Berhasil dihapus.');
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
</body>

</html>