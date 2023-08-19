<?php $this->load->view('layouts/admin/head'); ?>
<style>
   .report-list .report-list-item{padding:.75rem}.report-list .report-list-icon{display:flex;align-items:center;justify-content:center;min-height:44px;min-width:44px}.light-style .report-list .report-list-item{background-color:#f5f5f9}.light-style .report-list .report-list-icon{background-color:#fff;border-radius:.375rem}.dark-style .report-list .report-list-item{background-color:#232333}.dark-style .report-list .report-list-icon{background-color:#2b2c40;border-radius:.375rem}
</style>
<?php $this->load->view('layouts/admin/header'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row">
      <div class="col-md-12 col-lg-4 mb-4">
         <div class="card">
            <div class="d-flex align-items-end row">
               <div class="col-8">
                  <div class="card-body">
                     <h6 class="card-title mb-1 text-nowrap">Welcome Back Administrator!</h6>
                     <small class="d-block mb-3 text-nowrap">Best seller of the month</small>
                     <h5 class="card-title text-primary mb-1">$48.9k</h5>
                     <small class="d-block mb-4 pb-1 text-muted">78% of target</small>
                     <a href="javascript:;" class="btn btn-sm btn-primary">View sales</a>
                  </div>
               </div>
               <div class="col-4 pt-3 ps-0">
                  <img src="<?= base_url('') ?>public/template/img/illustrations/undraw_welcoming_re_x0qo.svg" width="90" height="140" class="rounded-start" alt="View Sales">
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-8 mb-4">
         <div class="card">
            <div class="card-body row g-4">
               <div class="col-md-6 pe-md-4 card-separator">
                  <div class="card-title d-flex align-items-start justify-content-between">
                     <h5 class="mb-0">New Visitors</h5>
                     <small>Last Week</small>
                  </div>
                  <div class="d-flex justify-content-between" style="position: relative;">
                     <div class="mt-auto">
                        <h2 class="mb-2">23%</h2>
                        <small class="text-danger text-nowrap fw-medium"><i class="bx bx-down-arrow-alt"></i> -13.24%</small>
                     </div>
                     <div class="resize-triggers">
                        <div class="expand-trigger">
                           <div style="width: 250px; height: 121px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 ps-md-4">
                  <div class="card-title d-flex align-items-start justify-content-between">
                     <h5 class="mb-0">Activity</h5>
                     <small>Last Week</small>
                  </div>
                  <div class="d-flex justify-content-between" style="position: relative;">
                     <div class="mt-auto">
                        <h2 class="mb-2">82%</h2>
                        <small class="text-success text-nowrap fw-medium"><i class="bx bx-up-arrow-alt"></i> 24.8%</small>
                     </div>
                     <div class="resize-triggers">
                        <div class="expand-trigger">
                           <div style="width: 251px; height: 121px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 col-lg-12 mb-4">
         <div class="card">
            <div class="row row-bordered g-0">
               <div class="col-md-8">
                  <div class="card-header">
                     <h5 class="card-title mb-0">Total Transaksi</h5>
                     <small class="card-subtitle">Yearly report overview</small>
                  </div>
                  <div class="card-body" style="position: relative;">
                     <div class="resize-triggers">
                        <div class="expand-trigger">
                           <div style="width: 474px; height: 290px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="card-header d-flex justify-content-between">
                     <div>
                        <h5 class="card-title mb-0">Report</h5>
                        <small class="card-subtitle">Monthly Avg. $45.578k</small>
                     </div>
                     <div class="dropdown">
                        <button class="btn p-0" type="button" id="totalIncome" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalIncome">
                           <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                           <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                           <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="report-list">
                        <div class="report-list-item rounded-2 mb-3">
                           <div class="d-flex align-items-start">
                              <div class="report-list-icon shadow-sm me-2">
                                 <i class="bx bx-user"></i>
                              </div>
                              <div class="d-flex justify-content-between align-items-end w-100 flex-wrap gap-2">
                                 <div class="d-flex flex-column">
                                    <span>Income</span>
                                    <h5 class="mb-0">$42,845</h5>
                                 </div>
                                 <small class="text-success">+2.34k</small>
                              </div>
                           </div>
                        </div>
                        <div class="report-list-item rounded-2 mb-3">
                           <div class="d-flex align-items-start">
                              <div class="report-list-icon shadow-sm me-2">
                                 <i class="bx bx-user"></i>
                              </div>
                              <div class="d-flex justify-content-between align-items-end w-100 flex-wrap gap-2">
                                 <div class="d-flex flex-column">
                                    <span>Expense</span>
                                    <h5 class="mb-0">$38,658</h5>
                                 </div>
                                 <small class="text-danger">-1.15k</small>
                              </div>
                           </div>
                        </div>
                        <div class="report-list-item rounded-2">
                           <div class="d-flex align-items-start">
                              <div class="report-list-icon shadow-sm me-2">
                                 <i class="bx bx-user"></i>
                              </div>
                              <div class="d-flex justify-content-between align-items-end w-100 flex-wrap gap-2">
                                 <div class="d-flex flex-column">
                                    <span>Profit</span>
                                    <h5 class="mb-0">$18,220</h5>
                                 </div>
                                 <small class="text-success">+1.35k</small>
                              </div>
                           </div>
                        </div>
                        <div class="report-list-item rounded-2">
                           <div class="d-flex align-items-start">
                              <div class="report-list-icon shadow-sm me-2">
                                 <i class="bx bx-user"></i>
                              </div>
                              <div class="d-flex justify-content-between align-items-end w-100 flex-wrap gap-2">
                                 <div class="d-flex flex-column">
                                    <span>Profit</span>
                                    <h5 class="mb-0">$18,220</h5>
                                 </div>
                                 <small class="text-success">+1.35k</small>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--/ Total Income -->
      </div>
   </div>
</div>
<?php $this->load->view('layouts/admin/footer'); ?>
</body>
</html>