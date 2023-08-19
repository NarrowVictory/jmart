<?php $this->load->view('layouts/admin/head'); ?>
<link rel="stylesheet" href="<?= base_url('') ?>public/template/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
<link rel="stylesheet" href="<?= base_url('') ?>public/template/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
<style>
    .dataTables_filter input[type="search"] {
        width: auto; /* Sesuaikan ukuran yang diinginkan */
        height: 40px; /* Sesuaikan ukuran yang diinginkan */
        text-align: center;
        margin: auto;
    }

    .dataTables_filter {
        text-align: center;
    }
</style>
<?php $this->load->view('layouts/admin/header'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row">
    <div class="col-12">
      <h4 class="py-1">Data Barang</h4>
    </div>
  </div>
  <div class="card mb-3">
    <div class="card-widget-separator-wrapper">
      <div class="card-body card-widget-separator">
        <div class="row gy-4 gy-sm-1">
          <div class="col-sm-6 col-lg-3">
            <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
              <div>
                <h6 class="mb-2">In-store Sales</h6>
                <h4 class="mb-2">$5,345.43</h4>
                <p class="mb-0"><span class="text-muted me-2">5k orders</span><span class="badge bg-label-success">+5.7%</span></p>
              </div>
              <div class="avatar me-sm-4">
                <span class="avatar-initial rounded bg-label-secondary">
                  <i class="bx bx-store-alt bx-sm"></i>
                </span>
              </div>
            </div>
            <hr class="d-none d-sm-block d-lg-none me-4">
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
              <div>
                <h6 class="mb-2">Website Sales</h6>
                <h4 class="mb-2">$674,347.12</h4>
                <p class="mb-0"><span class="text-muted me-2">21k orders</span><span class="badge bg-label-success">+12.4%</span></p>
              </div>
              <div class="avatar me-lg-4">
                <span class="avatar-initial rounded bg-label-secondary">
                  <i class="bx bx-laptop bx-sm"></i>
                </span>
              </div>
            </div>
            <hr class="d-none d-sm-block d-lg-none">
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
              <div>
                <h6 class="mb-2">Discount</h6>
                <h4 class="mb-2">$14,235.12</h4>
                <p class="mb-0 text-muted">6k orders</p>
              </div>
              <div class="avatar me-sm-4">
                <span class="avatar-initial rounded bg-label-secondary">
                  <i class="bx bx-gift bx-sm"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <h6 class="mb-2">Affiliate</h6>
                <h4 class="mb-2">$8,345.23</h4>
                <p class="mb-0"><span class="text-muted me-2">150 orders</span><span class="badge bg-label-danger">-3.5%</span></p>
              </div>
              <div class="avatar">
                <span class="avatar-initial rounded bg-label-secondary">
                  <i class="bx bx-wallet bx-sm"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
   <div class="card">
     <div class="card-header">
      <div class="row">
        <div class="col-3">
          <h5 class="card-title">Filter</h5>
        </div>
        <div class="col-9 text-end">
          <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-export me-sm-1"></i> Export</button>
            <ul class="dropdown-menu" style="">
              <li><a class="dropdown-item" href="javascript:void(0);">PDF</a></li>
              <li><a class="dropdown-item" href="javascript:void(0);">Excel</a></li>
            </ul>
          </div>
          <button type="button" class="btn btn-primary"><i class="bx bx-plus me-sm-1"></i> Add New Record</button>
        </div>
      </div>
      <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
        <div class="col-md-4 product_status">
          <select id="ProductStatus" class="form-select text-capitalize">
            <option value="">** All Status</option>
            <option value="Scheduled">Scheduled</option>
            <option value="Publish">Publish</option>
            <option value="Inactive">Inactive</option>
          </select>
        </div>
        <div class="col-md-4 product_category">
          <select id="ProductKategori" class="form-select text-capitalize">
            <option value=""> ** All Category</option>
            <option value="Kategori A">Kategori A</option>
            <option value="Kategori B">Kategori B</option>
          </select>
        </div>
        <div class="col-md-4 product_stock">
          <select id="ProductStock" class="form-select text-capitalize">
            <option value=""> ** All Stock</option>
            <option value="Out_of_Stock">Out of Stock</option>
            <option value="In_Stock">In Stock</option>
            <option value="In_Stock">Alert Stock</option>
          </select>
        </div>
      </div>
     </div>
     <hr style="margin-top: -30px !important;margin-bottom: -3px !important;">
     <div class="card-datatable table-responsive">
       <table class="datatables-basic table border-top" id="dataBarang">
         <thead>
           <tr>
             <th>#</th>
             <th>Produk</th>
             <th>Kategori</th>
             <th>Harga</th>
             <th>Qty</th>
             <th>Action</th>
           </tr>
         </thead>
         <tbody>
            <tr>
               <td>1</td>
               <td>Permen Kiss Cherry</td>
               <td>Makanan</td>
               <td>Rp. <?= number_format(5000) ?></td>
               <td>1 Pcs</td>
               <td>
                  <button type="button" class="btn">
                     <i style="font-size: 20px !important;" class='bx bx-folder-open'></i>
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
        $('#dataBarang').DataTable({
         ordering:false,
         lengthChange:false,
         "language": {
              "search": "_INPUT_",
              "searchPlaceholder": "Cari Barang..."
          }
        });
    });
</script>
</body>
</html>