<?php $this->load->view('layouts/kurir/head'); ?>
<style>
   .title {
      font-weight: 700;
      margin-bottom: 0;
      color: #2C406E;
   }

   .avatar-md {
      height: 5rem;
      width: 5rem;
   }

   .fs-19 {
      font-size: 19px;
   }

   .primary-link {
      color: #314047;
      -webkit-transition: all .5s ease;
      transition: all .5s ease;
   }

   a {
      color: #02af74;
      text-decoration: none;
   }

   .bookmark-post .favorite-icon a,
   .job-box.bookmark-post .favorite-icon a {
      background-color: #da3746;
      color: #fff;
      border-color: danger;
   }

   .favorite-icon a {
      display: inline-block;
      width: 30px;
      height: 30px;
      font-size: 18px;
      line-height: 30px;
      text-align: center;
      border: 1px solid #eff0f2;
      border-radius: 6px;
      color: rgba(173, 181, 189, .55);
      -webkit-transition: all .5s ease;
      transition: all .5s ease;
   }


   .candidate-list-box .favorite-icon {
      position: absolute;
      right: 22px;
      top: 22px;
   }

   .fs-14 {
      font-size: 14px;
   }

   .fs-16 {
      font-size: 14px;
   }

   .bg-soft-secondary {
      background-color: rgba(116, 120, 141, .15) !important;
      color: #74788d !important;
   }

   .mt-1 {
      margin-top: 0.25rem !important;
   }

   .panel-order .row {
      border-bottom: 1px solid #ccc;
   }

   .panel-order .row:last-child {
      border: 0px;
   }

   .panel-order .row .col-md-1 {
      text-align: center;
      padding-top: 15px;
   }

   .panel-order .row .col-md-1 img {
      width: 50px;
      max-height: 50px;
   }

   .panel-order .row .row {
      border-bottom: 0;
   }

   .panel-order .row .col-md-11 {
      border-left: 1px solid #ccc;
   }

   .panel-order .row .row .col-md-12 {
      padding-top: 7px;
      padding-bottom: 7px;
   }

   .panel-order .row .row .col-md-12:last-child {
      font-size: 11px;
      color: #555;
      background: #efefef;
   }

   .panel-order .btn-group {
      margin: 0px;
      padding: 0px;
   }

   .panel-order .card-body {
      padding-top: 0px;
      padding-bottom: 0px;
   }

   .panel-order .panel-deading {
      margin-bottom: 0;
   }

   .img-thumbnail {
      display: inline-block;
      width: 100% \9;
      max-width: 100%;
      height: auto;
      padding: 4px;
      line-height: 1.42857143;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 4px;
      -webkit-transition: all .2s ease-in-out;
      -o-transition: all .2s ease-in-out;
      transition: all .2s ease-in-out;
   }

   .list {
      padding-left: 0;
      padding-right: 0
   }

   .list-item {
      position: relative;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word
   }

   .list-row .list-item {
      -ms-flex-direction: row;
      flex-direction: row;
      -ms-flex-align: center;
      align-items: center;
      padding: .75rem .625rem
   }

   .list-row .list-item>* {
      padding-left: .625rem;
      padding-right: .625rem
   }

   .avatar {
      position: relative;
      line-height: 1;
      border-radius: 500px;
      white-space: nowrap;
      font-weight: 700;
      border-radius: 100%;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-pack: center;
      justify-content: center;
      -ms-flex-align: center;
      align-items: center;
      -ms-flex-negative: 0;
      flex-shrink: 0;
      border-radius: 500px;
      box-shadow: 0 5px 10px 0 rgba(50, 50, 50, .15)
   }

   .no-wrap {
      white-space: nowrap
   }
</style>
<?php $this->load->view('layouts/kurir/header'); ?>
<nav class="navbar navbar--show navbar-expand-lg navbar-light" style="background: #2F5596 !important;">
   <div class="container">
      <div class="nav-bar__left">
         <h1 class="nav-bar__center__title" style="font-family: gotham_fonts;color: white;line-height: 1.2;">Daftar Pesanan</h1>
      </div>
   </div>
</nav>
<section class="mt-3 mb-4">
   <div class="container">
      <div class="row">
         <div class="card">
            <div class="card-body pt-3 pb-0 pl-1 pr-1">
               <div id="bar-chart"></div>
            </div>
            <div class="card-footer"></div>
         </div>
      </div>
      <div class="row mt-3">
         <div class="card">
            <div class="card-body pt-3 pb-0 pl-1 pr-1">
               <div id="pie-chart"></div>
            </div>
            <div class="card-footer"></div>
         </div>
      </div>
      <div class="row mt-3">
         <div class="col-12">
            <div class="row">
               <div class="card">
                  <div class="card-header">
                     <h5 class="fw-bold card-title">Histori Pemesanan</h5>
                  </div>
                  <div class="card-body" style="padding-top: 0px;padding-bottom: 0px;padding: 15px;">
                     <div class="page-content page-container" id="page-content">
                        <div class="padding">
                           <div class="row">
                              <div class="col-sm-12">
                                 <div class="list list-row block">
                                    <?php foreach ($pesanan as $key => $value) : ?>
                                       <?php
                                       $items = $this->db->select('*')->from('tb_pesanan_detail')->where('id_pesanan', $value->id_pesanan)->get()->num_rows();
                                       ?>
                                       <div class="list-item" data-id="19">
                                          <div><a href="#" data-abc="true"><span class="w-48 avatar gd-warning">S</span></a></div>
                                          <div class="flex">
                                             <a href="#" class="item-author text-color" data-abc="true">
                                                #<?= $value->id_pesanan ?> | <?= $value->metode_bayar ?>
                                             </a>
                                             <div class="col-md-12 fs-4">Order Dibuat pada: <b><?= date('d/M/Y H:i:s', strtotime($value->tgl_pesanan)) ?></b> oleh <a href="#"><?= $value->nama_member ?> </a> dan Selesai pada <b><?= date('d/M/Y H:i:s') ?></b></div>
                                          </div>
                                          <div class="no-wrap">
                                             <div class="item-date text-muted text-sm d-none d-md-block">
                                                <label class="badge bg-success text-white"><?= $value->status_pesanan ?></label>
                                             </div>
                                          </div>
                                       </div>
                                    <?php endforeach ?>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php if (count($pesanan) <= 0) : ?>
                        <div class="empty">
                           <div class="empty-header">404</div>
                           <p class="empty-title">Oops… Belum Ada Pesanan yang diselesaikan</p>
                           <p class="empty-subtitle text-secondary">
                              We are sorry but the page you are looking for was not found
                           </p>
                           <div class="empty-action">
                              <a href="<?= base_url('home') ?>" class="btn btn-primary">
                                 <!-- Download SVG icon from http://tabler-icons.io/i/arrow-left -->
                                 <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l14 0"></path>
                                    <path d="M5 12l6 6"></path>
                                    <path d="M5 12l6 -6"></path>
                                 </svg>
                                 Kembali Ke Home
                              </a>
                           </div>
                        </div>
                     <?php endif ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="row">
   <br><br><br><br>
</div>
<?php $this->load->view('layouts/kurir/menu'); ?>
<?php $this->load->view('layouts/kurir/footer'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url('public/template/libs/apexcharts/dist/apexcharts.min.js') ?>"></script>
<script>
   var currentDate = new Date();
   var totalSumPerDate = <?php echo $json_total_sum_per_date; ?>;
   var totalSums = [];
   for (var date in totalSumPerDate) {
      if (totalSumPerDate.hasOwnProperty(date)) {
         totalSums.push(totalSumPerDate[date]);
      }
   }
   var last12Days = [];
   for (var i = 6; i >= 0; i--) {
      var day = currentDate.getDate();
      var month = currentDate.getMonth() + 1; // Bulan dimulai dari 0, tambahkan 1 untuk mendapatkan bulan yang benar
      last12Days.unshift(day + " " + getMonthName(month)); // Tambahkan ke depan array
      currentDate.setDate(currentDate.getDate() - 1); // Pindah ke hari sebelumnya
   }

   function getMonthName(month) {
      var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
      return monthNames[month - 1];
   }

   var options = {
      series: [{
         name: 'Inflation',
         data: totalSums
      }],
      chart: {
         height: 200,
         type: 'bar',
      },
      plotOptions: {
         bar: {
            borderRadius: 10,
            dataLabels: {
               position: 'top', // top, center, bottom
            },
         }
      },
      dataLabels: {
         enabled: true,
         formatter: function(val) {
            return val + "%";
         },
         offsetY: -20,
         style: {
            fontSize: '12px',
            colors: ["#304758"]
         }
      },

      xaxis: {
         categories: last12Days,
         position: 'top',
         axisBorder: {
            show: false
         },
         axisTicks: {
            show: false
         },
         crosshairs: {
            fill: {
               type: 'gradient',
               gradient: {
                  colorFrom: '#D8E3F0',
                  colorTo: '#BED1E6',
                  stops: [0, 100],
                  opacityFrom: 0.4,
                  opacityTo: 0.5,
               }
            }
         },
         tooltip: {
            enabled: true,
         }
      },
      yaxis: {
         axisBorder: {
            show: false
         },
         axisTicks: {
            show: false,
         },
         labels: {
            show: false,
            formatter: function(val) {
               return val + "%";
            }
         }

      },
      title: {
         text: 'Jumlah Pesanan',
         floating: true,
         offsetY: 180,
         align: 'center',
         style: {
            color: '#444'
         }
      }
   };

   var chart = new ApexCharts(document.querySelector("#bar-chart"), options);
   chart.render();
</script>
<script>
   document.addEventListener("DOMContentLoaded", function() {
      window.ApexCharts && (new ApexCharts(document.getElementById('pie-chart'), {
         chart: {
            type: "pie",
            fontFamily: 'inherit',
            height: 240,
            sparkline: {
               enabled: true
            },
            animations: {
               enabled: false
            },
         },
         fill: {
            opacity: 1,
         },
         series: [<?= $pending ?>, <?= $dikemas ?>, <?= $misi ?>, <?= $selesai ?>],
         labels: ['Dalam Proses', 'Siap Dikirimkan', 'Dalam Misi', 'Selesai'],
         tooltip: {
            theme: 'dark'
         },
         grid: {
            strokeDashArray: 4,
         },
         legend: {
            show: true,
            position: 'bottom',
            offsetY: 12,
            markers: {
               width: 10,
               height: 10,
               radius: 100,
            },
            itemMargin: {
               horizontal: 8,
               vertical: 8
            },
         },
         tooltip: {
            fillSeriesColor: false
         },
      })).render();
   });
</script>
</body>

</html>