<?php $this->load->view('layouts/admin/head'); ?>
<link rel="stylesheet" href="<?= base_url('') ?>public/template/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
<?php $this->load->view('layouts/admin/header'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row">
    <div class="col-3">
      <h4 class="py-1">Data Kecamatan</h4>
    </div>
    <div class="col-9 text-end">
      <button type="button" class="btn btn-primary"><i class="bx bx-plus me-sm-1"></i> Add New Record</button>
    </div>
  </div>
   <div class="card">
     <div class="card-datatable table-responsive">
       <table class="datatables-basic table border-top" id="dataKecTable">
         <thead>
           <tr>
             <th>#</th>
             <th>Nama Provinsi</th>
             <th>Nama Kabupaten</th>
             <th>Nama Kecamatan</th>
             <th>Action</th>
           </tr>
         </thead>
         <tbody>
            <tr>
               <td>1</td>
               <td>Jawa Barat</td>
               <td>Kabupaten Karawang</td>
               <td>Kecamatan Ciampel</td>
               <td>
                  <button type="button" class="btn">
                     <i style="font-size: 20px !important;" class='bx bx-edit'></i>
                     <i style="font-size: 20px !important;" class='bx bx-trash'></i>
                  </button>
               </td>
            </tr>
         </tbody>
       </table>
     </div>
   </div>
<!--/ DataTable with Buttons -->
</div>
<?php $this->load->view('layouts/admin/footer'); ?>
<script src="<?= base_url('') ?>public/template/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script>
    $(document).ready(function() {
        $('#dataKecTable').DataTable({
         searching: false,
         lengthChange: false,
         ordering:false
        });
    });
</script>
</body>
</html>