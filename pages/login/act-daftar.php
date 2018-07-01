<section class="content-header">
  
</section>
<div class="register-box">
<?php	
	if ($_POST['save'] == "save") {
	$nama	=$_POST['nama'];
	$NIK	=$_POST['NIK'];
	$password	=$_POST['password'];
	
	include "dist/koneksi.php";
	// $cekuser	=mysql_num_rows (mysql_query("SELECT username FROM tb_user WHERE username='$_POST[username]'"));
	
		if (empty($_POST['nama']) || empty($_POST['NIK']) || empty($_POST['password']) ) {
		echo "<div class='register-logo'><b>Oops!</b> Data Tidak Lengkap.</div>
			<div class='box box-primary'>
				<div class='register-box-body'>
					<p>Harap periksa kembali dan pastikan data yang Anda masukan lengkap dan benar.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='index.php?page=default' class='btn btn-block btn-warning'>Back</button>
						</div>
					</div>
				</div>
			</div>";
		}
		
		else{
		$insert = "INSERT INTO login (username, password,hakAkses,namaLengkap) VALUES ('$NIK', '$password','user','$nama')";
		$query = mysql_query ($insert);
		
		// $insert1 = "INSERT INTO pasien (nama, NIK) VALUES ('$nama', '$NIK')";
		// $query = mysql_query ($insert1);
		
		if($query){
			echo "
				<div class='register-box-body'>
					<p>Registrasi Berhasil</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='index.php' class='btn btn-info btn-block btn-flat'>Login</button>
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