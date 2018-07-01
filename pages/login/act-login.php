<div class="login-box">
<?php
	include "dist/koneksi.php";
	$username		= $_POST['username'];
	$password		= $_POST['password'];
	$op 			= $_GET['op'];

	if($op=="in"){
		$sql = mysql_query("SELECT * FROM login WHERE username='$username' AND password='$password'");
		if(mysql_num_rows($sql)==1){
			$qry = mysql_fetch_array($sql);
			$_SESSION['idUser'] = $qry['idUser'];
			$_SESSION['username'] = $qry['username'];
			$_SESSION['hakAkses'] = $qry['hakAkses'];
			$_SESSION['namaLengkap'] = $qry['namaLengkap'];
			
			// if($qry['aktif']=="N"){
      //       echo "<div class='register-logo'><b>Oops!</b> User Tidak Aktif.</div>	
			// 	<div class='register-box-body'>
			// 		<p>Harap tunggu beberapa saat, atau silahkan hubungi Admin Anda.</p>
			// 		<div class='row'>
			// 			<div class='col-xs-8'></div>
			// 			<div class='col-xs-4'>
			// 				<button type='button' onclick=location.href='index.php' class='btn btn-block btn-warning'>Back</button>
			// 			</div>
			// 		</div>
			// 	</div>";
			// }
			// if($qry['hakAkses']=="admin"){
			// 	header("location:home-admin.php");
			// }
			// else 
				if($qry['hakAkses']=="user"){
				header("location:home-pasien.php");
			} else{
			echo "<div class='register-logo'><b>Oops!</b> Login Failed.</div>	
				<div class='register-box-body'>
					<p>Email atau Password tidak sesuai. Silahkan diulang kembali.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='index.php' class='btn btn-block btn-warning'>Back</button>
						</div>
					</div>
				</div>";
		}
		
	}else if($op=="out"){
		unset($_SESSION['username']);
		unset($_SESSION['hak_akses']);
		header("location:index.php");
	} else{
			echo "<div class='register-logo'><b>Oops!</b> Login Failed.</div>	
				<div class='register-box-body'>
					<p>Email atau Password tidak sesuai. Silahkan diulang kembali.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='index.php' class='btn btn-block btn-warning'>Back</button>
						</div>
					</div>
				</div>";
		}
}		
		
?>
</div>