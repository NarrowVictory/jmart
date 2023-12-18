<?php $this->load->view('layouts/admin/head'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
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
          Data Kecamatan
        </h2>
      </div>
    </div>
    <div class="row align-items-center mt-3">
      <div class="col-12 col-md-6">
        <div class="card">
          <form method="POST" id="form-simpan">
            <div class="card-body">
              <div class="mb-3">
                <label class="form-label required">Pilih Provinsi</label>
                <div>
                  <select required name="select_provinsi" id="select_provinsi" class="form-select">
                    <option disabled selected>Pilih Provinsi</option>
                    <?php foreach ($provinsi as $key => $prov) : ?>
                      <option value="<?= $prov['id_provinsi'] ?>"><?= $prov['nama_provinsi'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label required">Pilih Kabupaten</label>
                <div>
                  <select required name="select_kabupaten" id="select_kabupaten" class="form-select">
                    <option selected disabled>Pilih Kabupaten</option>
                  </select>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label required">Nama Kecamatan</label>
                <div>
                  <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama Kecamatan" id="nama_kecamatan" name="nama_kecamatan">
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="button" id="resetInput" class="btn btn-white">Reset</button>
            </div>
          </form>
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
              Hasil Untuk Data Kecamatan
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped" id="dataKecamatan" style="width: 100%;">
                <thead>
                  <tr>
                    <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">No</button></th>
                    <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Nama Provinsi</button></th>
                    <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Nama Kabupaten</button></th>
                    <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Nama Kecamatan</button></th>
                    <th style="padding: 15px;border-color: #ddd;font-size:11px;background: repeat-x #F4F4F4;"><button class="table-sort">Action</button></th>
                  </tr>
                  <tr>
                    <th class="align-middle text-center">
                      #
                    </th>
                    <th>
                      <input type="text" class="form-control" placeholder="Provinsi" id="nama_provinsi_filter">
                    </th>
                    <th>
                      <input type="text" class="form-control" placeholder="Kabupaten" id="nama_kabupaten_filter">
                    </th>
                    <th>
                      <input type="text" class="form-control" placeholder="Kecamatan" id="nama_kecamatan_filter">
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

<div class="modal fade" id="ubahKecamatanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Kecamatan</h5>
        <<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formUbahKecamatan" method="POST" onsubmit="return simpanPerubahanKecamatan();">
        <div class="modal-body">
          <div class="mb-3">
            <label for="namaProvinsiModal" class="form-label">Nama Provinsi</label>
            <input type="hidden" id="idKecamatanModal" name="id_kecamatan">
            <input type="text" class="form-control" id="namaProvinsiModal" name="nama_provinsi" disabled>
          </div>
          <div class="mb-3">
            <label for="namaKabupatenModal" class="form-label">Nama Kabupaten</label>
            <input type="text" class="form-control" id="namaKabupatenModal" name="nama_kabupaten" disabled>
          </div>
          <div class="mb-3">
            <label for="namaKabupatenModal" class="form-label">Nama Kecamatan</label>
            <input type="text" class="form-control" id="namaKecamatanModal" name="nama_kecamatan">
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
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script>
  $(document).ready(function() {
    var choices_provinsi = new Choices(document.getElementById('select_provinsi'));
    var choices_kabupaten = new Choices(document.getElementById('select_kabupaten'));

    $("#select_provinsi").on('change', function() {
      var provinsiId = $(this).val();
      choices_kabupaten.clearStore();

      $.ajax({
        url: "<?php echo base_url('akun/get_kabupaten'); ?>",
        method: "POST",
        data: {
          prov_id: provinsiId
        },
        dataType: "JSON",
        success: function(data) {
          // Membuat array kosong untuk menyimpan opsi
          var opsi = [];

          // Melakukan iterasi pada data yang diterima dari AJAX
          data.forEach(function(item) {
            // Membuat objek opsi dengan nilai dan label dari data
            var opsiItem = {
              value: item.id_kabupaten,
              label: item.nama_kabupaten
            };

            // Menambahkan objek opsi ke dalam array opsi
            opsi.push(opsiItem);
          });

          choices_kabupaten.setChoices(opsi, 'value', 'label');
        },
        error: function(request, status, error) {
          alert(request.responseText);
        }
      });
    });

    $('#dataKecamatan').DataTable({
      ordering: false,
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "<?php echo base_url('kecamatan/json'); ?>",
        "type": "POST",
        data: function(d) {
          d.nama_provinsi = $('#nama_provinsi_filter').val();
          d.nama_kabupaten = $('#nama_kabupaten_filter').val();
          d.nama_kecamatan = $('#nama_kecamatan_filter').val();
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

    $('#form-simpan').submit(function(e) {
      e.preventDefault(); // Mencegah form dari pengiriman biasa
      var selectKabupaten = $('#select_kabupaten').val();
      var namaKecamatan = $('#nama_kecamatan').val();

      // Kirim data ke controller dengan Ajax
      $.ajax({
        url: '<?= base_url('kecamatan/simpan') ?>', // Gantilah 'URL_API_ANDA' sesuai dengan URL API Anda
        type: 'POST',
        data: {
          select_kabupaten: selectKabupaten,
          nama_kecamatan: namaKecamatan
        },
        dataType: 'json',
        success: function(response) {
          if (response.status === 'success') {
            $('#nama_kecamatan').val('');
            $('#dataKecamatan').DataTable().ajax.reload();
            toastr.success('Kecamatan Berhasil ditambahkan.');
          } else {
            // Gagal menyimpan data, Anda dapat menambahkan logika atau tindakan lain di sini
            alert('Gagal menyimpan data.');
          }
        }
      });
    });

    $('#nama_provinsi_filter').on('input', function() {
      $('#dataKecamatan').DataTable().ajax.reload();
    });

    $('#nama_kabupaten_filter').on('input', function() {
      $('#dataKecamatan').DataTable().ajax.reload();
    });

    $('#nama_kecamatan_filter').on('input', function() {
      $('#dataKecamatan').DataTable().ajax.reload();
    });

    $('#resetInput').on('click', function() {
      $('#nama_kecamatan').val(''); // Mengatur ulang nilai input namaProvinsi
    });
  });

  function ubahKecamatan(link) {
    var id = link.getAttribute("data-id");
    var nama = link.getAttribute("data-nama");
    var provinsi = link.getAttribute("data-provinsi");
    var kabupaten = link.getAttribute("data-kabupaten");

    $('#namaProvinsiModal').val(provinsi);
    $('#namaKabupatenModal').val(kabupaten);

    $('#idKecamatanModal').val(id); // Mengisi idProvinsi (input hidden)
    $('#namaKecamatanModal').val(nama);

    $('#ubahKecamatanModal').modal('show');
  }

  function simpanPerubahanKecamatan() {
    var idKecamatan = $('#idKecamatanModal').val();
    var namaKecamatanBaru = $('#namaKecamatanModal').val();

    // Menggunakan Ajax untuk mengirim data perubahan ke server
    $.ajax({
      url: '<?= base_url('kecamatan/ubah') ?>', // Gantilah URL_API_ANDA dengan URL API yang sesuai
      type: 'POST',
      dataType: 'json',
      data: {
        id_kecamatan: idKecamatan,
        nama_kecamatan: namaKecamatanBaru
      },
      success: function(response) {
        if (response.status === 'success') {
          $('#dataKecamatan').DataTable().ajax.reload();
          toastr.success('Kecamatan Berhasil diubah.');
          $('#ubahKecamatanModal').modal('hide');
        } else {
          alert('Gagal mengubah data kecamatan.');
        }
      },
      error: function() {
        alert('Terjadi kesalahan saat mengubah data kecamatan.');
      },
    });

    // Mengembalikan false untuk mencegah form dikirim ulang
    return false;
  }

  function deleteKecamatan(link) {
    var idKecamatan = link.getAttribute("data-id");

    // Konfirmasi penghapusan dengan dialog konfirmasi JavaScript (Opsional)
    var confirmation = confirm("Apakah Anda yakin ingin menghapus kecamatan ini?");
    if (confirmation) {
      $.ajax({
        url: "<?php echo base_url('kecamatan/delete/'); ?>" + idKecamatan,
        type: "POST",
        dataType: "json",
        success: function(response) {
          if (response.status === "success") {
            $('#dataKecamatan').DataTable().ajax.reload();
            toastr.success('Kecamatan Berhasil dihapus.');
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