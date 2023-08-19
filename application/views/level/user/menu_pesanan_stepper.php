<?php $this->load->view('layouts/user/head'); ?>
<style>
	.timeline {
	    position: relative;
	    height: 100%;
	    width: 100%;
	    padding: 0;
	    list-style: none;
	}

	.timeline.timeline-dashed:before {
	    border-style: dashed;
	}

	.timeline::before {
	    position: absolute;
	    top: 0;
	    left: 0;
	    z-index: 1;
	    height: 100%;
	    width: 1px;
	    border: 0;
	    border-left: 1px solid #d9dee3;
	    content: "";
	}

	.timeline .timeline-item {
	    position: relative;
	    padding-left: 3rem;
	}

	.timeline .timeline-item .timeline-indicator {
	    position: absolute;
	    left: -0.6875rem;
	    top: 0;
	    z-index: 2;
	    display: block;
	    height: 1.5rem;
	    width: 1.5rem;
	    text-align: center;
	    border-radius: 50%;
	    border: 2px solid #696cff;
	    background-color: #f5f5f9 !important;
	}

	.timeline .timeline-item .timeline-indicator i {
	    color: #696cff;
	    font-size: .85rem;
	    vertical-align: baseline;
	}

	.timeline .timeline-indicator-success {
	    border-color: #71dd37 !important;
	}

	.timeline .timeline-indicator-secondary {
	    border-color: #d9dee3 !important;
	}

	.timeline .timeline-indicator-secondary i {
	    color: #d9dee3 !important;
	}

	.timeline .timeline-indicator-success i {
	    color: #71dd37 !important;
	}

	.timeline .timeline-item .timeline-event {
	    position: relative;
	    top: -1rem;
	    width: 100%;
	    min-height: 4rem;
	    background-color: #fff;
	    border-radius: 0.375rem;
	    padding: 1.25rem 1.5rem;
	}

	.timeline .timeline-item-success .timeline-event {
	    background-color: rgba(113,221,55,.1);
	}

	.timeline .timeline-item-secondary .timeline-event {
	    background-color: rgba(113,221,55,.1);
	}

	.timeline .timeline-header {
		display: flex;
		justify-content: space-between;
		align-items: center;
		flex-direction: row;
	}

	.timeline .timeline-item-success .timeline-event:before {
	    border-left-color: rgba(105,108,255,.1) !important;
	    border-right-color: rgba(105,108,255,.1) !important;
	}

	.timeline .timeline-item .timeline-event:before {
	    position: absolute;
	    top: 0.75rem;
	    left: 32px;
	    right: 100%;
	    width: 0;
	    height: 0;
	    border-top: 1rem solid rgba(0,0,0,0);
	    border-right: 1rem solid;
	    border-left: 0 solid;
	    border-bottom: 1rem solid rgba(0,0,0,0);
	    border-left-color: #fff;
	    border-right-color: #fff;
	    margin-left: -3rem;
	    content: "";
	}
</style>
<?php $this->load->view('layouts/user/header'); ?>
<nav class="navbar navbar--show navbar-expand-lg navbar-light" style="background: #2F5596 !important;">
   <div class="container nav-bar__on-container" style="display: flex;">
      <div class="navbar__left" style="z-index: 10;">
         <a href="<?= base_url('pesanan/pending') ?>">
         <i class="navbar__left__icon bx bx-arrow-back fw-bold text-white" style="cursor:pointer;z-index: 2;"></i>
         </a>  
      </div>
      <div class="nav-bar__center">
         <h1 class="nav-bar__center__title" style="font-family: gotham_fonts;color: white;line-height: 1.2;">#20230804210835146</h1>
      </div>
   </div>
</nav>

<section class="mt-4 mb-4">
	<div class="container">
		<div class="card">
			<h5 class="card-header">Lacak Pesanan Anda</h5>
			<div class="card-body">
				<ul class="timeline timeline-dashed mt-3">
					<li class="timeline-item timeline-item-success mb-4">
						<span class="timeline-indicator timeline-indicator-success">
							<i class='bx bx-check'></i>
						</span>
						<div class="timeline-event">
							<div class="timeline-header mb-sm-0 mb-3">
								<h6 class="mb-0">Terkirim</h6>
								<small class="text-muted">7 Ags 12:50</small>
							</div>
							<p>
								Pesanan telah sampai kepada yang bersangkutan. <br>
								<a href="#">Lihat Bukti Pengiriman</a>
							</p>
						</div>
					</li>
					<li class="timeline-item timeline-item-secondary mb-4">
						<span class="timeline-indicator timeline-indicator-secondary">
							<i class='bx bxs-hourglass'></i>
						</span>
						<div class="timeline-event">
							<div class="timeline-header mb-sm-0 mb-3">
								<h6 class="mb-0">Pesanan Dalam Pengiriman</h6>
								<small class="text-muted">7 Ags 07:30</small>
							</div>
							<p>
								Pesanan sedang diantar ke alamat tujuan.
							</p>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<div class="row">
   <br><br><br><br>
</div>

<?php $this->load->view('layouts/user/menu'); ?>
<?php $this->load->view('layouts/user/footer'); ?>
</body>
</html>