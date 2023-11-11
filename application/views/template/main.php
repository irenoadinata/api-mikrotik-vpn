<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title; ?></title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/fontawesome-free/css/all.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>dist/css/adminlte.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
</head>

<body class="hold-transition warning-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">

		<!-- Preloader -->
		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__wobble" src="<?= base_url('assets/template/') ?>dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
		</div>

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-warning">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Navbar Search -->
				<!-- Messages Dropdown Menu -->
				<!-- Notifications Dropdown Menu -->
				<li class="nav-item">
					<a class="nav-link" data-widget="fullscreen" href="#" role="button">
						<i class="fas fa-expand-arrows-alt"></i>
					</a>
				</li>
				<!-- <li class="nav-item">
					<a class="nav-link" href="<?= site_url('auth/logout') ?>" onclick="return confirm('Apakah Anda Yakin Akan Keluar ?');" role="button">
						<i class="fas fa-sign-out-alt"></i>
					</a>
				</li> -->
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-warning-primary elevation-4">
			<!-- Brand Logo -->
			<a href="<?= basename('') ?>" class="brand-link">
				<i class="nav-icon fas fa-wifi"></i>
				<span class="brand-text font-weight-light">MHD3|MikWeb</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

						<li class="nav-item">
							<a href="<?= site_url('dashboard') ?>" class="nav-link <?= $title == 'MHD3 | Mikweb' ? 'active' : '' ?>">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									--MENU--
								</p>
							</a>
						</li>

						<!-- MENU HOTSPOT -->
						<!-- <li class="nav-item <?= $title == 'Users Hotspot' | $title == 'Users Active' | $title == 'Users Profile' | $title == 'Users Host' | $title == 'Users Cookies' ? 'menu-open' : '' ?>">
							<a href="#" class="nav-link <?= $title == 'Users Hotspot' | $title == 'Users Active' | $title == 'Users Profile' | $title == 'Users Host' | $title == 'Users Cookies' ? 'active' : '' ?>">
								<i class="nav-icon fas fa-wifi"></i>
								<p>
									Hotspot
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= site_url('hotspot/active') ?>" class="nav-link <?= $title == 'Users Active' ? 'active' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Active</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= site_url('hotspot/users') ?>" class="nav-link <?= $title == 'Users Hotspot' ? 'active' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Users</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= site_url('hotspot/profile') ?>" class="nav-link <?= $title == 'Users Profile' ? 'active' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Profile</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= site_url('hotspot/binding') ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Binding</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= site_url('hotspot/host') ?>" class="nav-link <?= $title == 'Users Host' ? 'active' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Host</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= site_url('hotspot/cookies') ?>" class="nav-link <?= $title == 'Users Cookies' ? 'active' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Cookies</p>
									</a>
								</li>
							</ul>
						</li> -->

						<!-- Login Akses -->
						<li class="nav-item <?= $title == 'Users' ? 'menu-open' : '' ?>">
							<a href="#" class="nav-link <?= $title == 'Users'  ? 'active' : '' ?>">
								<i class="nav-icon fa fa-user-circle"></i>
								<p>
									LOGIN AKSES
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= site_url('login/users') ?>" class="nav-link <?= $title == 'Users' ? 'active' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Users</p>
									</a>
								</li>

							</ul>
						</li>

						<!-- MENU INTERNET -->
						<li class="nav-item <?= $title == 'DHCP Client' | $title == 'DHCP Server' | $title == 'IP Address' | $title == 'DNS' | $title == 'Firewall' ? 'menu-open' : '' ?>">
							<a href="#" class="nav-link <?= $title == 'DHCP Client' | $title == 'DHCP Server' | $title == 'IP Address' | $title == 'DNS' | $title == 'Firewall' ? 'active' : '' ?>">
								<i class="nav-icon fas fa-wifi"></i>
								<p>
									INTERNET
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= site_url('internet/dhcpclient') ?>" class="nav-link <?= $title == 'DHCP Client' ? 'active' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>DHCP Client</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= site_url('internet/ipaddress') ?>" class="nav-link <?= $title == 'IP Address' ? 'active' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>IP Address</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= site_url('internet/dns') ?>" class="nav-link <?= $title == 'DNS' ? 'active' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>DNS</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= site_url('internet/pool') ?>" class="nav-link <?= $title == 'Internet Pool' ? 'active' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Pool</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= site_url('internet/dhcpserver') ?>" class="nav-link <?= $title == 'DHCP Server' ? 'active' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>DHCP Server</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= site_url('internet/firewall') ?>" class="nav-link <?= $title == 'Firewall' ? 'active' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Firewall</p>
									</a>
								</li>

							</ul>
						</li>


						<!-- MENU PPP -->
						<li class="nav-item <?= $title == 'PPP Secret' | $title == 'PPPOE Servers' |  $title == 'PPPOE Filter Rules' | $title == 'PPP Profile' | $title == 'PPP Active' | $title == 'PPP Pool' ? 'menu-open' : '' ?>">
							<a href="#" class="nav-link <?= $title == 'PPP Secret' | $title == 'PPPOE Servers' | $title == 'PPP Profile' | $title == 'PPPOE Filter Rules' | $title == 'PPP Active' | $title == 'PPP Pool' ? 'active' : '' ?>">
								<i class="nav-icon fas fa-users"></i>
								<p>
									VPN (PPPoE)
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= site_url('ppp/pppoeservers') ?>" class="nav-link <?= $title == 'PPPOE Servers' ? 'active' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>PPPOE Servers</p>
									</a>
								</li>
								<!-- <li class="nav-item">
									<a href="<?= site_url('ppp/pool') ?>" class="nav-link <?= $title == 'PPP Pool' ? 'active' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Pool</p>
									</a>
								</li> -->
								<li class="nav-item">
									<a href="<?= site_url('ppp/profile') ?>" class="nav-link <?= $title == 'PPP Profile' ? 'active' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Profile</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= site_url('ppp/secret') ?>" class="nav-link <?= $title == 'PPP Secret' ? 'active' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Secret</p>
									</a>
								</li>
								<!-- <li class="nav-item">
									<a href="<?= site_url('ppp/filterrules') ?>" class="nav-link <?= $title == 'PPPOE Filter Rules' ? 'active' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Filter Rules</p>
									</a>
								</li> -->
								<li class="nav-item">
									<a href="<?= site_url('ppp/active') ?>" class="nav-link <?= $title == 'PPP Active' ? 'active' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Active</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-item">
							<a href="<?= site_url('auth/logout') ?>" class="nav-link">
								<i class="nav-icon fas fa-sign-out-alt"></i>
								<p>
									Logout
								</p>
							</a>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-warning">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->

		<!-- Main Footer -->
		<!-- <footer class="main-footer">
			<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
			All rights reserved.
			<div class="float-right d-none d-sm-inline-block">
				<b>Version</b> 3.2.0
			</div>
		</footer> -->
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->
	<!-- jQuery -->
	<script src="<?= base_url('assets/template/') ?>plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?= base_url('assets/template/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="<?= base_url('assets/template/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url('assets/template/') ?>dist/js/adminlte.js"></script>

	<!-- PAGE PLUGINS -->
	<!-- jQuery Mapael -->
	<script src="<?= base_url('assets/template/') ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
	<script src="<?= base_url('assets/template/') ?>plugins/raphael/raphael.min.js"></script>
	<script src="<?= base_url('assets/template/') ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
	<script src="<?= base_url('assets/template/') ?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
	<!-- ChartJS -->
	<script src="<?= base_url('assets/template/') ?>plugins/chart.js/Chart.min.js"></script>

	<!-- AdminLTE for demo purposes -->
	<script src="<?= base_url('assets/template/') ?>dist/js/demo.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

	<!-- DataTables  & Plugins -->
	<script src="<?= base_url('assets/template/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('assets/template/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url('assets/template/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?= base_url('assets/template/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<script>
		$(function() {
			$('#dataTable').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"responsive": true,
			});
		});
	</script>
</body>

</html>

<!-- hidden error -->
<?php ini_set('display_errors', 'off'); ?>