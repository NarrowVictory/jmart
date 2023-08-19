<?php $this->load->view('layouts/admin/head'); ?>
<link rel="stylesheet" href="<?= base_url('') ?>public/template/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
<style>
   .top-left-td {
   vertical-align: top;
   text-align: left;
   }
   .table>tbody>tr:hover {
   background-color: #D9EDF7;
   }
   .table-striped tbody tr:nth-of-type(odd):hover {
   background-color: #D9EDF7;
   }
   .table-striped tbody tr:nth-of-type(odd) {
   background-color: #fcf8e3;
   }
   .table>thead:first-child>tr:first-child>th,
   .table>thead:first-child>tr:first-child>td,
   .table-striped thead tr.primary:nth-child(odd) th {
   background-color: #428bca;
   color: #fff;
   border-color: #357ebd;
   border-top: 1px solid #357ebd;
   text-align: center;
   }
   .table>tbody>tr>td {
   padding: 8px;
   line-height: 1.42857143;
   vertical-align: top;
   border-top: 1px solid #ddd;
   font-family: ubuntu, sans-serif;
   font-weight: 400;
   color: #333;
   font-size: 14px;
   -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
   box-sizing: border-box;
   line-height: 1.42857143;
   }
   thead {
   display: table-header-group;
   vertical-align: middle;
   border-color: inherit;
   font-weight: 400;
   color: #333;
   font-family: ubuntu, sans-serif;
   font-size: 14px;
   line-height: 1.42857143;
   }
   tbody {
   display: table-row-group;
   vertical-align: middle;
   border-color: inherit;
   }
   table {
   border-spacing: 0;
   border-collapse: collapse;
   }
   .card .card-header h2 {
   float: left;
   padding: 10px 0;
   margin: 0 0 0 20px;
   }
   h2 {
   font-size: 16px;
   line-height: 16px;
   font-weight: 700;
   }
   .blue {
   color: #428bca !important;
   }
   .card .card-header h2 i {
   border-right: 1px solid #dbdee0;
   padding: 12px 0;
   height: 40px;
   width: 40px;
   display: inline-block;
   text-align: center;
   margin: -10px 20px -10px -20px;
   font-size: 16px;
   }
   .card .card-body p.introtext {
   margin: -20px -20px 20px;
   padding: 10px;
   border-bottom: 1px solid #dbdee0;
   color: #8a6d3b;
   background-color: #fcf8e3;
   border-color: #faebcc;
   }
   .modal .modal-body p.introtext {
   background: #f9f9f9;
   margin: -15px -15px 10px;
   padding: 10px;
   border-bottom: 1px solid #dbdee0;
   }
   .btn-label-secondary {
   color: #8592a3;
   border-color: rgba(0,0,0,0);
   background: #ebeef0;
   }
   .btn-label-secondary:hover {
   border-color: rgba(0,0,0,0) !important;
   background: #788393 !important;
   color: #fff !important;
   box-shadow: 0 0.125rem 0.25rem 0 rgb(133 146 163 / 40%) !important;
   transform: translateY(-1px) !important;
   }
</style>
<?php $this->load->view('layouts/admin/header'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-header bg-light">
               <h2 class="blue"><i class="bx bx-cart"></i>Tambah Barang Masuk </h2>
            </div>
            <form id="update_pengadaan" action="javascript::void">
               <div class="card-body" style="padding-bottom:0px">
                  <p class="introtext">Please select these before adding any product.</p>
                  <div class="row g-3">
                     <div class="col-md-6">
                        <div class="row">
                           <label class="col-sm-3 col-form-label text-sm-end" for="collapsible-fullname">ID Barang</label>
                           <div class="col-sm-9">
                              <select required name="id_brg" id="id_brg" class="form-select select2">
                                 <option value="">Item name/Barcode/Itemcode</option>
                                 <option value="BR000001">Semen Andalas / -</option>
                                 <option value="BR000002">Cat Pilox / -</option>
                                 <option value="BR000003">Cat Minyak Perak 1 KG / -</option>
                                 <option value="BR000004">Cat Minyak No.650 / @ 1 KG</option>
                                 <option value="BR000005">Cat Dasar / Sanding Seller</option>
                                 <option value="BR000006">Pengkilat / Clear Gloss</option>
                                 <option value="BR000007">Infra Seanding Seller / -</option>
                                 <option value="BR000008">Cat Air / -</option>
                                 <option value="BR000009">Pengkilat / Clear Doff</option>
                                 <option value="BR000010">Cat Minyak Jotun / -</option>
                                 <option value="BR000011">Seng Plat BJLS 30 / 8 Kaki</option>
                                 <option value="BR000012">Seng Plat BJLS 28 / 8 Kaki</option>
                                 <option value="BR000013">Plat Baja / 2x70x10 MM</option>
                                 <option value="BR000014">Plat Baja / 4x1200x24000 MM</option>
                                 <option value="BR000015">Paku Tripleks / 4x1200x24000 MM</option>
                                 <option value="BR000016">Thinner Super / -</option>
                                 <option value="BR000017">Triplek Jati / -</option>
                                 <option value="BR000018">Gagang Cangkul / -</option>
                                 <option value="BR000019">Ruskam Baja / -</option>
                                 <option value="BR000020">Ruskam Plastik / -</option>
                                 <option value="BR000021">Amplop Besar / -</option>
                                 <option value="BR000022">Amplop Kecil / -</option>
                                 <option value="BR000023">Balpoint / -</option>
                                 <option value="BR000024">Binder Clip Besar / -</option>
                                 <option value="BR000025">Binder Clip Kecil / -</option>
                                 <option value="BR000026">Binder Clip Sedang / -</option>
                                 <option value="BR000027">Box File Plastik / -</option>
                                 <option value="BR000028">Boliner Hitam / -</option>
                                 <option value="BR000029">Buku Bergaris 1/2 folio / -</option>
                                 <option value="BR000030">Buku Expedisi / -</option>
                                 <option value="BR000031">Buku tulis isi 200 lb / -</option>
                                 <option value="BR000032">Buku tulis isi 300 lb / -</option>
                                 <option value="BR000033">Buku folio 300 lb / -</option>
                                 <option value="BR000034">Cuter Besar / -</option>
                                 <option value="BR000035">Cuter Kecil / -</option>
                                 <option value="BR000036">Compac disk kosong / -</option>
                                 <option value="BR000037">HVS F4 70 gr / -</option>
                                 <option value="BR000038">HVS A4 70 gr / -</option>
                                 <option value="BR000039">HVS df 70 gr / -</option>
                                 <option value="BR000040">Isi cuter besar / -</option>
                                 <option value="BR000041">Isi cuter kecil / -</option>
                                 <option value="BR000042">Lem Inakol / -</option>
                                 <option value="BR000043">Penggaris 30 cm / -</option>
                                 <option value="BR000044">Penggaris 60 cm besi / -</option>
                                 <option value="BR000045">Pensil 2 B / -</option>
                                 <option value="BR000046">Spidol Kecil / -</option>
                                 <option value="BR000047">Spidol Snowman White board Hitam / -</option>
                                 <option value="BR000048">Spidol Snowman Marker besar / -</option>
                                 <option value="BR000049">Stabilo / -</option>
                                 <option value="BR000050">Staples / -</option>
                                 <option value="BR000051">Staples no 10 / -</option>
                                 <option value="BR000052">Stop Map biasa / -</option>
                                 <option value="BR000053">Stop map plastik / -</option>
                                 <option value="BR000054">Stop Map Snalhecter / -</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="row">
                           <label class="col-sm-3 col-form-label text-sm-end" for="collapsible-phone">Tanggal</label>
                           <div class="col-sm-9">
                              <input type="date" id="collapsible-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="mb-3">
                           <div class="row">
                              <label class="col-sm-3 col-form-label text-sm-end" for="collapsible-pincode">Supplier</label>
                              <div class="col-sm-9">
                                 <select id="collapsible-state" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="collapsible-state" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="16">Select</option>
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District Of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="row">
                           <label class="col-sm-3 col-form-label text-sm-end" for="collapsible-address">Kasir</label>
                           <div class="col-sm-9">
                              <input readonly type="text" id="collapsible-pincode" class="form-control" placeholder="Kasir A">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="row justify-content-end">
                              <div class="col-sm-9">
                                 <button type="submit" class="btn btn-primary me-sm-1 me-1">Tambah</button>
                                 <button type="reset" class="btn btn-label-secondary">Cancel</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <hr style="padding-top: 0px;">
            <div class="row" style="padding-top:0px">
               <div class="col-12">
                  <div class="card-body" style="padding-top:0px">
                     <div class="table-responsive" style="width: 100%">
                        <table id="example2" class="table items table-striped table-bordered table-condensed table-hover nowrap" style="width:100%" id="purchase_table">
                           <thead>
                              <tr>
                                 <th> Product </th>
                                 <th> Kategori </th>
                                 <th> Harga </th>
                                 <th> Unit </th>
                                 <th> Serial </th>
                                 <th class="text-center"> <i class="bx bx-trash" style="opacity:0.5; filter:alpha(opacity=50);"></i> </th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                <td>Permen Kiss Cherry</td>
                                <td>Makanan</td>
                                <td>Rp. <?= number_format(5000) ?></td>
                                <td>0 Pcs</td>
                                <td class="text-center">
                                  <a data-bs-toggle="modal" data-bs-target="#myModal" href="" class="btn btn-sm btn-primary"><i class="bx bx-plus"></i></a>
                                </td>
                                <td class="text-center">
                                  <a data-id="400" id="deletebtn" class="btn btn-sm btn-danger" title="Delete" data-toggle="tooltip"><i class="bx bx-minus text-white"></i> </a>
                                </td>
                              </tr>
                           </tbody>
                           <tfoot>
                              <tr>
                                 <td colspan="5" style="text-align:right !important;vertical-align: middle;"><strong>Total Biaya Pembelian</strong></td>
                                 <td style="text-align:left !important;vertical-align: middle;" colspan="1">
                                    Rp. 0                                    
                                 </td>
                              </tr>
                           </tfoot>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card-footer jusitfy-content-beetwen">
               <button type="button" class="btn btn-flat btn-secondary btn-md" onclick="location.href='<?= base_url('barang_masuk') ?>'">
               <b><i class="fa fa-angle-double-left"></i> Kembali</b>
               </button>
               <button id="truncate" class="btn btn-flat btn-md btn-danger">Remove All</button>
               <button type="button" id="button_simpan" class="btn btn-flat btn-success btn-md">
               <b><i class="fa fa-save"></i> Simpan</b>
               </button>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Serial Number">
              </div>
            </div>
            <div class="col">
              <button type="button" class="btn btn-success">Send</button>
            </div>
          </div>
          <hr>
          <div class="row">
            <!-- Tabel untuk menampilkan data -->
            <table class="table table-bordered mt-3">
              <thead>
                <tr>
                  <th>Nama Produk</th>
                  <th>Harga</th>
                  <th>Serial</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Permen Kiss Cherry</td>
                  <td>Rp. <?= number_format(5000) ?></td>
                  <td>123456789</td>
                  <td>Available</td>
                  <td class="text-center"><i class="bx bx-minus text-danger"></i></td>
                </tr>
                <tr>
                  <td>Permen Kiss Cherry</td>
                  <td>Rp. <?= number_format(5000) ?></td>
                  <td>987654321</td>
                  <td>Available</td>
                  <td class="text-center"><i class="bx bx-minus text-danger"></i></td>
                </tr>
                <!-- Tambahkan data lainnya di sini -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
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