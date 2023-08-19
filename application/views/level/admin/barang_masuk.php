<?php $this->load->view('layouts/admin/head'); ?>
<link rel="stylesheet" href="<?= base_url('') ?>public/template/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
<style>
  .top-left-td {
    vertical-align: top;
    text-align: left;
  }
</style>
<?php $this->load->view('layouts/admin/header'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row">
    <div class="col-3">
      <h4 class="py-1">Riwayat Barang Masuk</h4>
    </div>
    <div class="col-9 text-end">
      <button type="button" class="btn btn-secondary"><i class="bx bx-filter me-sm-1"></i> Filter</button>
      <button onclick="location.href='<?= base_url('barang_masuk/add') ?>'" type="button" class="btn btn-primary"><i class="bx bx-plus me-sm-1"></i> Add New Record</button>
    </div>
  </div>
   <div class="card">
     <div class="card-datatable table-responsive">
       <table class="datatables-basic table border-top" id="dataKategori">
         <thead>
           <tr>
             <th>#</th>
             <th>Tanggal Masuk</th>
             <th>Nama Barang</th>
             <th>Qty</th>
             <th>Harga Barang</th>
             <th>Pemasok</th>
             <th>Serial Number</th>
             <th>PDF</th>
             <th>Action</th>
           </tr>
         </thead>
         <tbody>
            <tr>
               <td class="top-left-td">1</td>
               <td class="top-left-td"><?= date('d-m-Y H:i:s') ?></td>
               <td class="top-left-td">Permen Kiss Cherry</td>
               <td class="top-left-td">10 Pcs</td>
               <td class="top-left-td">Rp. <?= number_format(5000) ?></td>
               <td class="top-left-td">PT. Sentosa Abadi</td>
               <td>
               	<?php
               	for ($i = 1; $i <= 5; $i++) {
               		$serial_number = "STYUTU" . str_pad($i, 3, "0", STR_PAD_LEFT);
               		echo "- " . $serial_number . "<br>";
               	}
               	?>
               	...
               	<a href="">Lihat Detail</a>
               </td>
               <td class="top-left-td" style="text-align: center;">
               	<a href="#" title="" data-original-title="Edit">
            		<i style="font-size:24px" class='bx bxs-file-pdf text-danger'></i><br>
            		<span class="text-danger">Save</span>
                </a>
               </td>
               <td class="top-left-td" style="white-space: nowrap !important;">
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
        $('#dataKategori').DataTable({
         searching: false,
         lengthChange: false,
         ordering:false
        });
    });
</script>
</body>
</html>