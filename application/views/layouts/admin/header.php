
	<!-- Page CSS -->
	<!-- Helpers -->
	<script src="<?= base_url('') ?>public/template/vendor/js/helpers.js"></script>
	<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
		<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
		<script src="<?= base_url('') ?>public/template/js/config.js"></script>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			
			function gtag() {
				dataLayer.push(arguments);
			}
			gtag('js', new Date());
			gtag('config', 'GA_MEASUREMENT_ID');
		</script>
		<!-- Custom notification for demo -->
		<!-- beautify ignore:end -->
	</head>
	<body>
		<!-- Layout wrapper -->
		<div class="layout-wrapper layout-content-navbar  ">
			<div class="layout-container">
				<!-- Menu -->
				<?php $this->load->view('layouts/admin/menu'); ?>
				<!-- / Menu -->
				<!-- Layout container -->
				<div class="layout-page">
					<!-- Navbar -->
					<?php $this->load->view('layouts/admin/search'); ?>
					<!-- / Navbar -->
					<!-- Content wrapper -->
					<div class="content-wrapper">
      <!-- Content -->