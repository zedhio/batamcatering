<?php date_default_timezone_set('Asia/Jakarta'); ?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php echo ucwords($menu); ?> | Batam Catering</title>
	<link rel="shortcut icon" href='<?php echo base_url("assets/admin/img/favicon/favicon.png"); ?>' type="image/x-icon" />
	<!-- Vendor CSS -->
	<link href="
	<?php echo base_url("assets/admin/css/fullcalendar.min.css?1568650061"); ?>
	" rel="stylesheet"><link href="
	<?php echo base_url("assets/admin/css/animate.min.css?1568650061"); ?>
	" rel="stylesheet"><link href="
	<?php echo base_url("assets/admin/material-design-iconic-font/css/material-design-iconic-font.min.css"); ?>
	" rel="stylesheet"><link href="
	<?php echo base_url("assets/admin/css/jquery.mCustomScrollbar.min.css"); ?>
	" rel="stylesheet"><link href="
	<?php echo base_url("assets/admin/css/bootstrap-select.css"); ?>
	" rel="stylesheet"><link href="
	<?php echo base_url("assets/admin/css/chosen.css"); ?>
	" rel="stylesheet">
	<!-- CSS -->
	<link href="
	<?php echo base_url("assets/admin/css/app_1.css"); ?>
	" rel="stylesheet"><link href="
	<?php echo base_url("assets/admin/css/app_2.min.css"); ?>
	" rel="stylesheet"><link href="
	<?php echo base_url("assets/font/css/font-awesome.min.css"); ?>
	" rel="stylesheet"><link href="
	<?php echo base_url("assets/admin/css/over.css?1568650061"); ?>
	" rel="stylesheet">
	<!-- datatable -->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
	<style type="text/css">
		#myTable_wrapper {
			padding: 20px;
		}
	</style>
</head>


<body ng-app="AppKrs">
	<!-- start header -->
	<header id="header" class="clearfix" data-ma-theme="kerjaannyasidhio">
		<ul class="h-inner">
			<li class="hi-trigger ma-trigger" data-ma-action="sidebar-open" data-ma-target="#sidebar">
				<div class="line-wrap">
					<div class="line top"></div>
					<div class="line center"></div>
					<div class="line bottom"></div>
				</div>
			</li>
			<li class="pull-right">
				<a href="<?php echo base_url("login/logout_admin"); ?>" class="btn waves-effect" style="color: #961459; background-color: #fff;">Logout</a>
			</li>
			<!-- Top Search Content -->
			<div class="h-search-wrap">
				<div class="hsw-inner">
					<i class="hsw-close zmdi zmdi-arrow-left" data-ma-action="search-close"></i>
					<input type="text">
				</div>
			</div>
		</header>
		<!-- end header -->
		<section id="main">