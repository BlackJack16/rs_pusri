<?php
session_start();
if(!isset($_SESSION['username'])){
    die("<b>Oops!</b> Access Failed.
		<p>Sistem Logout. Anda harus melakukan Login kembali.</p>
		<button type='button' onclick=location.href='admin/index.php'>Back</button>");
}
if($_SESSION['hakAkses']!="admin"){
    die("<b>Oops!</b> Access Failed.
		<p>Anda Bukan Admin.</p>
		<button type='button' onclick=location.href='admin/index.php'>Back</button>");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>RS Pusri</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.5 -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="dist/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="dist/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="dist/css/AdminLTE.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
	<link rel="stylesheet" href="plugins/iCheck/square/blue.css">
	<!-- Morris chart -->
	<link rel="stylesheet" href="plugins/morris/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="plugins/datepicker/bootstrap-datetimepicker.min.css">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
	<script type="text/javascript" src="plugins/datatables/jquery.js"></script>
			
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">
	<header class="main-header">
		<!-- <a href="home-admin.php" class="logo"><span class="logo-mini"></span><span class="logo-lg">Sistem Inventaris</span></a> -->
		<nav class="navbar navbar-static-top" role="navigation">
			<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"><span class="sr-only">Toggle navigation</span></a>
			<div class="navbar-header">
                    <a class="navbar-brand">SI Antrian RS Pusri Palembang</a>
                </div>
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
				
					<!-- <li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src='dist/img/profile/no-image.jpg' class='user-image' alt='User Image'>
							<span class="hidden-xs">Hai, <?php echo $_SESSION['username'] ?></span> &nbsp;<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li class="user-header">
								<img src='dist/img/profile/no-image.jpg' class='img-circle' alt='User Image'>
								<p>Welcome - <?php echo $_SESSION['username'] ?><small><?php echo $_SESSION['hakAkses'] ?></small></p>
							</li>
							<li class="user-body">
								<div class="row">
								</div>
							</li>
							<li class="user-footer">
								<div class="pull-left">
									<?php echo date("d-m-Y");?>
								</div>
								<div class="pull-right">
								  <a href="pages/login/act-logout.php" class="btn btn-default btn-flat">Log out</a>
								</div>
							</li>
						</ul>
					</li> -->
				</ul>
			</div>
		</nav>
	</header>
	<aside class="main-sidebar">
		<section class="sidebar">
			<ul class="sidebar-menu">
				<li class="header" style="background-color:#222d32">
				</li>
				<li class="treeview"><a href="home-admin.php"><i class="fa fa-th"></i> <span>Antrian</span><i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="home-admin.php"> <i class="fa fa-caret-right"></i> Anak</a></li>
						<li><a href="home-admin.php?page=antrian-tulang"> <i class="fa fa-caret-right"></i> Bedah Tulang</a></li>
						<li><a href="home-admin.php?page=antrian-tumor"> <i class="fa fa-caret-right"></i> Bedah Tumor</a></li>
						<li><a href="home-admin.php?page=antrian-bumum"> <i class="fa fa-caret-right"></i> Bedah Umum</a></li>
						<li><a href="home-admin.php?page=antrian-dumum"> <i class="fa fa-caret-right"></i> Dokter Umum</a></li>
						<li><a href="home-admin.php?page=antrian-jantung"> <i class="fa fa-caret-right"></i> Jantung</a></li>
						<li><a href="home-admin.php?page=antrian-bidan"> <i class="fa fa-caret-right"></i> Kebidanan dan Kandungan</a></li> 
						<li><a href="home-admin.php?page=antrian-kulit"> <i class="fa fa-caret-right"></i> Kulit</a></li>
						<li><a href="home-admin.php?page=antrian-mata"> <i class="fa fa-caret-right"></i> Mata</a></li>
						<li><a href="home-admin.php?page=antrian-dalam"> <i class="fa fa-caret-right"></i> Penyakit Dalam</a></li>
						<li><a href="home-admin.php?page=antrian-dalam-ginjal"> <i class="fa fa-caret-right"></i> Penyakit Dalam Sub Ginjal dan Hipertensi</a></li>
						<li><a href="home-admin.php?page=antrian-rehab"> <i class="fa fa-caret-right"></i> Rehab Medik</a></li>
						<li><a href="home-admin.php?page=antrian-syaraf"> <i class="fa fa-caret-right"></i> Syaraf</a></li> 
						<li><a href="home-admin.php?page=antrian-tht"> <i class="fa fa-caret-right"></i> THT</a></li>
					</ul>
				</li>
				<li class="treeview"><a href="#"><i class="fa fa-file"></i> <span> Master Data</span><i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="home-admin.php?page=list-antrian"> <i class="fa fa-caret-right"></i> Data Antrian</a></li>											
						<li><a href="home-admin.php?page=list-dokter"> <i class="fa fa-caret-right"></i> Data Dokter</a></li>
						<li><a href="home-admin.php?page=list-jadwal"> <i class="fa fa-caret-right"></i> Data Jadwal Dokter</a></li>
						<li><a href="home-admin.php?page=list-pasien-baru"> <i class="fa fa-caret-right"></i> Data Pasien Baru</a></li>
						<li><a href="home-admin.php?page=list-pasien"> <i class="fa fa-caret-right"></i> Data Pasien Lama</a></li>
					</ul>
				</li>
				<li class="treeview"><a href="home-admin.php?page=grafik"><i class="fa fa-bar-chart-o"></i> <span>Grafik</span></i></a></li>
				<li class="treeview"><a href="pages/login/act-logout-admin.php"><i class="fa fa-sign-out"></i> <span>Keluar</span></i></a></li>
				
				<!-- <li class="treeview"><a href="home-admin.php"><i class="fa fa-info"></i> <span>Laporan</span></i></a></li> -->
				

			</ul>
		</section>
	</aside>
	<div class="content-wrapper">
		<section class="content">
			<?php
				$page = (isset($_GET['page']))? $_GET['page'] : "main";
				switch ($page) {
					case 'list-dokter': include "pages/admin/list-dokter.php"; break;
					case 'list-pasien': include "pages/admin/list-pasien.php"; break;
					case 'list-pasien-baru': include "pages/admin/list-pasien-baru.php"; break;
					case 'list-antrian': include "pages/admin/list-antrian.php"; break;
					case 'list-jadwal': include "pages/admin/list-jadwal.php"; break;
					case 'edit-antrian': include "pages/admin/page-edit-antrian.php"; break;
					case 'edit-pasien': include "pages/admin/page-edit-pasien.php"; break;
					case 'add-pasien': include "pages/admin/page-add-pasien.php"; break;
					case 'add-dokter': include "pages/admin/page-add-dokter.php"; break;
					case 'add-jadwal': include "pages/admin/page-add-jadwal.php"; break;
					case 'edit-dokter': include "pages/admin/page-edit-dokter.php"; break;				
					case 'edit-jadwal': include "pages/admin/page-edit-jadwal.php"; break;
					case 'del-pasien': include "pages/admin/page-del-pasien.php"; break;
					case 'del-jadwal': include "pages/admin/page-del-jadwal.php"; break;
					case 'del-dokter': include "pages/admin/page-del-dokter.php"; break;
					case 'antrian-tulang': include "pages/admin/antrian-bedah-tulang.php"; break;
					case 'antrian-tumor': include "pages/admin/antrian-bedah-tumor.php"; break;
					case 'antrian-bumum': include "pages/admin/antrian-bedah-umum.php"; break;
					case 'antrian-dumum': include "pages/admin/antrian-dokter-umum.php"; break;
					case 'antrian-jantung': include "pages/admin/antrian-jantung.php"; break;
					case 'antrian-bidan': include "pages/admin/antrian-kebidanan-kandungan.php"; break;
					case 'antrian-kulit': include "pages/admin/antrian-kulit.php"; break;
					case 'antrian-mata': include "pages/admin/antrian-mata.php"; break;
					case 'antrian-dalam': include "pages/admin/antrian-penyakit-dalam.php"; break;
					case 'antrian-dalam-ginjal': include "pages/admin/antrian-penyakit-dalam-ginjal-hipertensi.php"; break;
					case 'antrian-rehab': include "pages/admin/antrian-rehab-medik.php"; break;
					case 'antrian-syaraf': include "pages/admin/antrian-syaraf.php"; break;
					case 'antrian-tht': include "pages/admin/antrian-tht.php"; break;
					case 'grafik': include "pages/admin/page-grafik.php"; break;

					default : include 'pages/admin/dashboard-admin.php';	
				}
			?>
		</section>
	</div>
	<footer class="main-footer">
		<!-- <div class="pull-right hidden-xs"><b>Rakhmat Saleh</b> 12540154</div> -->
		Desi Novita S <a href="#" target="_blank"></a> RS Pusri Palembang
	</footer>
</div>
	<!-- ./wrapper -->
	<!-- jQuery 2.1.4 -->
	<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	  $.widget.bridge('uibutton', $.ui.button);
	</script>
	<!-- Bootstrap 3.3.5 -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- Morris.js charts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="plugins/morris/morris.min.js"></script>
	<!-- Sparkline -->
	<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
	<!-- jvectormap -->
	<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="plugins/knob/jquery.knob.js"></script>
	<!-- Bootstrap WYSIHTML5 -->
	<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	<!-- Slimscroll -->
	<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="plugins/fastclick/fastclick.js"></script>
	<!-- FLOT CHARTS -->
	<script src="plugins/Flot/jquery.flot.js"></script>
	<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
	<script src="plugins/Flot/jquery.flot.resize.js"></script>
	<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
	<script src="plugins/Flot/jquery.flot.pie.js"></script>
	<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
	<script src="plugins/Flot/jquery.flot.categories.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/app.min.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="dist/js/pages/dashboard.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
	<!-- <script src="assets/js/jquery-1.10.1.min.js"></script>
	<script src="assets/js/highcharts.js"></script> -->
</body>
</html>