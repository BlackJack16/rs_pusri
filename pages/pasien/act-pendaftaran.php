<section class="content-header">
    <h1>Input<small>Data User</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-pasien.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Input Data User</li>
    </ol>
</section>
<div class="register-box">
<?php	
	if ($_POST['save'] == "save") {
	$nama	=$_POST['nama'];
	$NIK	=$_POST['NIK'];
	
	include "dist/koneksi.php";
	// $cekuser	=mysql_num_rows (mysql_query("SELECT username FROM tb_user WHERE username='$_POST[username]'"));
	
		if (empty($_POST['nama']) || empty($_POST['NIK']) ) {
		echo "<div class='register-logo'><b>Oops!</b> Data Tidak Lengkap.</div>
			<div class='box box-primary'>
				<div class='register-box-body'>
					<p>Harap periksa kembali dan pastikan data yang Anda masukan lengkap dan benar.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-admin.php?page=form-master-user' class='btn btn-block btn-warning'>Back</button>
						</div>
					</div>
				</div>
			</div>";
		}
		
		else{
		$insert = "INSERT INTO pasien (nama, NIK) VALUES ('$nama', '$NIK')";
		$query = mysql_query ($insert);
		
		if($query){
			echo "<div class='register-logo'><b>Input Data</b> Successful!</div>	
				<div class='register-box-body'>
					<p>Registrasi.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-pasien.php' class='btn btn-danger btn-block btn-flat'>Next >></button>
						</div>
					</div>
				</div>";
		}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>