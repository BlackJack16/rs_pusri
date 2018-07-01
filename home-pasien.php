<?php
session_start();
if(!isset($_SESSION['username'])){
    die("<b>Oops!</b> Access Failed.
		<p>Sistem Logout. Anda harus melakukan Login kembali.</p>
		<button type='button' onclick=location.href='index.php'>Back</button>");
}
if($_SESSION['hakAkses']!="user"){
    die("<b>Oops!</b> Access Failed.
		<p>Anda Bukan Admin.</p>
		<button type='button' onclick=location.href='index.php'>Back</button>");
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
				<li class="treeview"><a href="home-pasien.php"><i class="fa fa-dashboard"></i> <span>Beranda</span></i></a></li>
				<li class="treeview"><a href="home-pasien.php?page=pendaftaran"><i class="fa fa-edit"></i> <span>Pendaftaran</span></i></a></li>
				<li class="treeview"><a href="home-pasien.php?page=antrian"><i class="fa fa-th"></i> <span>Pemberitahuan</span><i class="fa fa-angle-left pull-right"></i></a>		
					<ul class="treeview-menu">
					<?php 
					include 'dist/koneksi.php';
					$sesi=$_SESSION['username'];
							$query=mysql_query("SELECT spesialis, tglAntrian, NIKPendaftar from antrianPasien where tglAntrian=CURDATE() and NIKPendaftar='$sesi' group by spesialis") or die(mysql_error());
						while ($cek=mysql_fetch_array($query)){	

						if ($cek['spesialis']=='Anak'){ 
						 	echo '<li><a href="home-pasien.php?page=antrian"> <i class="fa fa-caret-right"></i> Antrian Anak</a></li>';
						 }elseif ($cek['spesialis']=='Bedah Tulang'){
						 	echo '<li><a href="home-pasien.php?page=antrian-tulang"> <i class="fa fa-caret-right"></i> Antrian Bedah Tulang</a></li>';
						 }elseif ($cek['spesialis']=='Bedah Tumor'){
						 	echo '<li><a href="home-pasien.php?page=antrian-tumor"> <i class="fa fa-caret-right"></i> Antrian Bedah Tumor</a></li>';
						 }elseif ($cek['spesialis']=='Bedah Umum'){
						 	echo '<li><a href="home-pasien.php?page=antrian-bumum"> <i class="fa fa-caret-right"></i> Antrian Bedah Umum</a></li>';
						 }elseif ($cek['spesialis']=='Dokter Umum'){
						 	echo '<li><a href="home-pasien.php?page=antrian-dumum"> <i class="fa fa-caret-right"></i> Antrian Dokter Umum</a></li>';
						 }elseif ($cek['spesialis']=='Jantung'){
						 	echo '<li><a href="home-pasien.php?page=antrian-jantung"> <i class="fa fa-caret-right"></i> Antrian Jantung</a></li>';
						 }elseif ($cek['spesialis']=='Kebidanan dan Kandungan'){
						 	echo '<li><a href="home-pasien.php?page=antrian-bidan"> <i class="fa fa-caret-right"></i> Antrian Kebidanan dan Kandungan</a></li>';
						 }elseif ($cek['spesialis']=='Kulit'){
						 	echo '<li><a href="home-pasien.php?page=antrian-kulit"> <i class="fa fa-caret-right"></i> Antrian Kulit</a></li>';
						 }elseif ($cek['spesialis']=='Mata') {
						 	echo '<li><a href="home-pasien.php?page=antrian-mata"> <i class="fa fa-caret-right"></i> Antrian Mata</a></li>';
						 }elseif ($cek['spesialis']=='Penyakit Dalam') {
						 	echo '<li><a href="home-pasien.php?page=antrian-dalam"> <i class="fa fa-caret-right"></i> Antrian Penyakit Dalam</a></li>';
						 }elseif ($cek['spesialis']=='Penyakit Dalam Sub Ginjal dan Hipertensi') {
						 	echo '<li><a href="home-pasien.php?page=antrian-dalam-ginjal"> <i class="fa fa-caret-right"></i> Antrian Penyakit Dalam Sub Ginjal dan Hipertensi</a></li>';
						 }elseif ($cek['spesialis']=='Rehab Medik') {
						 	echo '<li><a href="home-pasien.php?page=antrian-rehab"> <i class="fa fa-caret-right"></i> Antrian Rehab Medik</a></li>';
						 }elseif ($cek['spesialis']=='Syaraf') {
						 	echo '<li><a href="home-pasien.php?page=antrian-syaraf"> <i class="fa fa-caret-right"></i> Antrian Syaraf</a></li> ';
						 }elseif ($cek['spesialis']=='THT') {
						 	echo '<li><a href="home-pasien.php?page=antrian-tht"> <i class="fa fa-caret-right"></i> Antrian THT</a></li>';
						 }
						}
						 ?>
					</ul>
				</li>
				<li class="treeview"><a href="#"><i class="fa fa-bar-chart-o"></i> <span> Dokter</span><i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="home-pasien.php?page=list-dokter"> <i class="fa fa-caret-right"></i> Data Dokter</a></li>
						<li><a href="home-pasien.php?page=list-jadwal"> <i class="fa fa-caret-right"></i> Jadwal Dokter</a></li>						
					</ul>
				</li>
				<li class="treeview"><a href="home-pasien.php?page=tentang-kami"><i class="fa fa-users"></i> <span>Tentang Kami</span></i></a></li>
				<li class="treeview"><a href="home-pasien.php?page=bantuan"><i class="fa fa-phone"></i> <span>Bantuan</span></i></a></li>	
				<li class="treeview"><a href="pages/login/act-logout.php"><i class="fa fa-sign-out"></i> <span>Keluar</span></i></a></li>											
			</ul>
		</section>
	</aside>
	<div class="content-wrapper">
		<section class="content">
			<?php
				$page = (isset($_GET['page']))? $_GET['page'] : "main";
				switch ($page) {
			
					case 'list-dokter': include "pages/pasien/list-dokter.php"; break;
					case 'list-jadwal': include "pages/pasien/list-jadwal.php"; break;
					case 'antrian': include "pages/pasien/antrian.php"; break;
					case 'pendaftaran': include "pages/pasien/pendaftaran.php"; break;
					case 'tentang-kami': include "pages/pasien/tentang-kami.php"; break;
					case 'bantuan': include "pages/pasien/bantuan.php"; break;
					case 'act-pendaftaran': include "pages/pasien/act-pendaftaran.php"; break;
					case 'act-pendaftaran-pasien-lama': include "pages/pasien/act-pendaftaran-pasien-lama.php"; break;
					case 'act-pendaftaran-pasien-baru': include "pages/pasien/act-pendaftaran-pasien-baru.php"; break;
					case 'ceknik': include "pages/pasien/ceknik.php"; break;
					case 'antrian-tulang': include "pages/pasien/antrian-bedah-tulang.php"; break;
					case 'antrian-tumor': include "pages/pasien/antrian-bedah-tumor.php"; break;
					case 'antrian-bumum': include "pages/pasien/antrian-bedah-umum.php"; break;
					case 'antrian-dumum': include "pages/pasien/antrian-dokter-umum.php"; break;
					case 'antrian-jantung': include "pages/pasien/antrian-jantung.php"; break;
					case 'antrian-bidan': include "pages/pasien/antrian-kebidanan-kandungan.php"; break;
					case 'antrian-kulit': include "pages/pasien/antrian-kulit.php"; break;
					case 'antrian-mata': include "pages/pasien/antrian-mata.php"; break;
					case 'antrian-dalam': include "pages/pasien/antrian-penyakit-dalam.php"; break;
					case 'antrian-dalam-ginjal': include "pages/pasien/antrian-penyakit-dalam-ginjal-hipertensi.php"; break;
					case 'antrian-rehab': include "pages/pasien/antrian-rehab-medik.php"; break;
					case 'antrian-syaraf': include "pages/pasien/antrian-syaraf.php"; break;
					case 'antrian-tht': include "pages/pasien/antrian-tht.php"; break;
					default : include 'pages/pasien/dashboard-pasien.php';	
				}
			?>
		</section>
	</div>
	<footer class="main-footer">
		<!-- <div class="pull-right hidden-xs"><b>Rakhmat Saleh</b> 12540154</div> -->
		Desi Novita Sari <a href="#" target="_blank"></a> RS Pusri Palembang
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
		<!-- <script src="plugins/jQuery/jquery-1.2.3.pack.js"></script> -->

	<!-- <script src="plugins/jQuery/jquery.validate.pack.js"></script> -->

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
	<!-- AdminLTE App -->
	<script src="dist/js/app.min.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="dist/js/pages/dashboard.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
</body>
</html>