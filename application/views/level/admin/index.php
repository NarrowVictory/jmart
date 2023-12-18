<?php $this->load->view('layouts/admin/head') ?>
<link rel="stylesheet" href="https://rendro.github.io/easy-pie-chart/stylesheets/jquery.easy-pie-chart.css">
<style>
   .dropdown-item:hover,
   .dropdown-item:focus {
      color: inherit;
      text-decoration: none;
      background-color: rgba(98, 105, 118, 0.04);
   }

   .blue {
      color: #428bca !important;
   }

   .small-box {
      border: 1px solid rgb(218, 225, 228);
      margin-bottom: 10px;
   }

   .small-box:hover {
      border: 1px solid rgb(65, 160, 217);
   }

   .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 50%;
   }

   .padding1010 {
      padding: 10px !important;
   }
</style>
<?php $this->load->view('layouts/admin/header') ?>
<!-- Page header -->
<div class="page-header d-print-none">
   <div class="container-xl">
      <div class="row g-2 align-items-center">
         <div class="col">
            <div class="page-pretitle">
               Overview
            </div>
            <h2 class="page-title">
               Penjualan Hari Ini
            </h2>
         </div>
      </div>
   </div>
</div>
<!-- Page body -->
<div class="page-body">
   <div class="container-xl">
      <div class="row row-deck row-cards">
         <div class="col-12 col-lg-3">
            <div class="card">
               <div class="card-body">
                  <div class="d-flex align-items-center">
                     <div class="subheader">Total Transaksi</div>
                     <div class="ms-auto lh-1">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                           7% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M3 17l6 -6l4 4l8 -8"></path>
                              <path d="M14 7l7 0l0 7"></path>
                           </svg>
                        </span>
                     </div>
                  </div>
                  <div class="h1 mb-3"><?= $total_transaksi ?></div>
               </div>
            </div>
         </div>
         <div class="col-12 col-lg-3">
            <div class="card">
               <div class="card-body">
                  <div class="d-flex align-items-center">
                     <div class="subheader">Total Penjualan</div>
                     <div class="ms-auto lh-1">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                           7% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M3 17l6 -6l4 4l8 -8"></path>
                              <path d="M14 7l7 0l0 7"></path>
                           </svg>
                        </span>
                     </div>
                  </div>
                  <div class="h1 mb-3">Rp. <?= $ttl_harga == NULL ? 0 : $ttl_harga ?></div>
               </div>
            </div>
         </div>
         <div class="col-12 col-lg-3">
            <div class="card">
               <div class="card-body">
                  <div class="d-flex align-items-center">
                     <div class="subheader">Penjualan Kemarin</div>
                     <div class="ms-auto lh-1">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                           7% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M3 17l6 -6l4 4l8 -8"></path>
                              <path d="M14 7l7 0l0 7"></path>
                           </svg>
                        </span>
                     </div>
                  </div>
                  <div class="h1 mb-3">Rp. <?= $total_harga_kemarin == NULL ? 0 : $total_harga_kemarin ?></div>
               </div>
            </div>
         </div>
         <div class="col-12 col-lg-3">
            <div class="card">
               <div class="card-body">
                  <div class="d-flex align-items-center">
                     <div class="subheader">Total Products</div>
                  </div>
                  <div class="h1 mb-3"><?= $total_barang ?></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="page-header d-print-none" style="margin:0.1rem 0 0 !important">
   <div class="container-xl">
      <div class="row g-2 align-items-center">
         <div class="col">
            <div class="page-pretitle">
               Overview
            </div>
            <h2 class="page-title">
               Penjualan 7 Hari Terakhir
            </h2>
         </div>
      </div>
   </div>
</div>

<div class="page-body">
   <div class="container-xl">
      <div class="row mt-1 mb-4">
         <div class="col-12 col-lg-6 d-flex">
            <div class="card w-100 mb-2">
               <div class="card-body">
                  <h3 class="card-title">
                     Grafik Transaksi Pembayaran
                     <span style="float: right;">Last 7 days</span>
                  </h3>
                  <div class="row">
                     <div class="col">
                        <div id="chart-transaksi"></div>
                     </div>
                  </div>
                  <div class="row mt-3">
                     <div class="col-6">
                        <div class="px-3">
                           <div class="text-secondary">
                              <span class="status-dot bg-primary"></span> Total Transaksi
                           </div>
                           <div class="h2"><?= $jumlah ?></div>
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="px-3">
                           <div class="text-secondary">
                              <span class="status-dot bg-success"></span> Total Pendapatan
                           </div>
                           <div class="h2">Rp. <?= number_format($total) ?></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-12 col-lg-6 d-flex">
            <div class="card w-100 mb-2">
               <div class="card-body">
                  <h3 class="card-title">
                     Peminat Kategori Terbanyak
                  </h3>
                  <div class="row">
                     <div class="col">
                        <figure class="highcharts-figure">
                           <div id="container"></div>
                        </figure>
                     </div>
                  </div>

               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded">
               <div class="card-body">
                  <h3 class="card-title">
                     Top Request Item
                  </h3>
                  <div class="row">
                     <?php foreach ($produk_terlaris as $key => $value) : ?>
                        <?php
                        $gambar = $value['gambar_barang'] == "https://dodolan.jogjakota.go.id/assets/media/default/default-product.png" ? "<img class=\"center\" style='\border-radius: 3px;height:70px' src='" . $value['gambar_barang'] . "'>" : "<img class=\"center\" style='\border-radius: 3px;height:70px' src='" . base_url('public/template/upload/barang/' . $value['gambar_barang']) . "'>";
                        ?>
                        <div class="col-lg-4 col-4 border-0 d-flex">
                           <div class="small-box bg-white w-100">
                              <div class="inner">
                                 <?= $gambar ?>
                                 <br>
                                 <p class="text-center"><?= $value['nama_barang'] ?> <br><span class="text-success font-weight-bold"><?= $value['total_terjual'] . " " . $value['nama_satuan'] ?> Terjual</span></p>
                                 <h4 class="text-center"><?= $value['jumlah_penjualan'] ?>x Transaksi </h4>
                              </div>
                           </div>
                        </div>
                     <?php endforeach ?>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded">
               <div class="card-body">
                  <h3 class="card-title">
                     Product Detail
                  </h3>
                  <div class="row">
                     <div class="col-7">
                        <label class="font-weight-light w-75 text-truncate" style="font-size: 17px"><span id="a56930846">All Items</span></label>
                        <a id="ember263" class="ember-view" href="javascript::void"><label class="cursor-pointer float-right font-xlarge text-semibold">
                              0 </label></a>
                        <label class="font-weight-light w-75 text-truncate" style="font-size: 17px"><span id="a56930846">All Active Items</span></label>
                        <a id="ember263" class="ember-view" href="javascript::void"><label class="cursor-pointer float-right font-xlarge text-semibold">
                              0 </label></a>
                        <label class="font-weight-light w-75 text-truncate" style="font-size: 17px"><span id="a56930846">No Active Items</span></label>
                        <a id="ember263" class="ember-view" href="javascript::void"><label class="cursor-pointer float-right font-xlarge text-semibold">
                              0 </label></a>
                        <label class="font-weight-light text-red w-75 text-truncate" style="font-size: 17px"><span id="a56930846">Low Stock Items</span></label>
                        <a id="ember263" class="ember-view" href="javascript::void"><label class="cursor-pointer float-right text-red font-xlarge text-semibold">
                              0 </label></a>
                     </div>
                     <div class="col-5">
                        <div class="chart float-right easyPieChart" data-percent="0" style="width: 110px; height: 110px; line-height: 110px;">0%<canvas width="110" height="110"></canvas></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $this->load->view('layouts/admin/footer') ?>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://rendro.github.io/easy-pie-chart/javascripts/jquery.easy-pie-chart.js"></script>
<script>
   // @formatter:off
   var labels = <?php echo $labels; ?>;
   var totalHarga = <?php echo $total_harga; ?>;
   var jumlah = <?php echo $jumlah_transaksi; ?>;

   document.addEventListener("DOMContentLoaded", function() {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-transaksi'), {
         chart: {
            type: "line",
            fontFamily: 'inherit',
            height: 288,
            parentHeightOffset: 0,
            toolbar: {
               show: false,
            },
            animations: {
               enabled: false
            },
         },
         fill: {
            opacity: 1,
         },
         stroke: {
            width: 2,
            lineCap: "round",
            curve: "smooth",
         },
         series: [{
               name: "Total Transaksi",
               data: jumlah
            },
            {
               name: "Total Pendapatan",
               data: totalHarga
            }
         ],
         tooltip: {
            theme: 'dark'
         },
         grid: {
            padding: {
               top: -20,
               right: 0,
               left: -4,
               bottom: -4
            },
            strokeDashArray: 4,
         },
         xaxis: {
            labels: {
               padding: 0,
            },
            tooltip: {
               enabled: false
            },
         },
         yaxis: {
            labels: {
               padding: 4
            },
         },
         labels: labels,
         colors: [tabler.getColor("primary"), tabler.getColor("green")],
         legend: {
            show: false,
         },
      })).render();
   });
   // @formatter:on
</script>
<script>
   <?php
   $kategori = $this->db->select('*')->from('tb_kategori')->get()->result_array();
   ?>
   // Data retrieved from https://netmarketshare.com
   Highcharts.chart('container', {
      chart: {
         plotBackgroundColor: null,
         plotBorderWidth: null,
         plotShadow: false,
         type: 'pie'
      },
      title: {
         text: '',
         align: 'left'
      },
      tooltip: {
         pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      accessibility: {
         point: {
            valueSuffix: '%'
         }
      },
      plotOptions: {
         pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
               enabled: true,
               format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
         }
      },
      series: [{
         name: 'Brands',
         colorByPoint: true,
         data: [
            <?php foreach ($kategori as $key => $value) : ?>
               <?php
               $jlh = $this->db->select('SUM(tb_pesanan_detail.jumlah_jual) as total_jumlah_jual')->from('tb_pesanan_detail')->join('tb_barang', 'tb_barang.id_brg = tb_pesanan_detail.id_brg')->join('tb_kategori', 'tb_barang.id_kategori_brg = tb_kategori.id_kategori_brg')->where('tb_barang.id_kategori_brg', $value['id_kategori_brg'])->get()->row()->total_jumlah_jual;

               ?> {
                  name: '<?php echo $value['nama_kategori_brg']; ?>',
                  y: <?= $jlh == NULL ? 0 : $jlh ?>,
               },
            <?php endforeach; ?>
         ]
      }]
   });
</script>
<script type="text/javascript">
   $(document).ready(function() {
      $('.chart').easyPieChart({
         //animate: 2000
      });
   });
</script>
</body>

</html>