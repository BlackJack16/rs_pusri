<section class="content-header">
    <!-- <h1>Input<small>Data User</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-pasien.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Input Data User</li>
    </ol> -->
</section>
<div class="register-box">
<?php	
	// if ($_POST['save'] == "save") {
	$NIK	=$_POST['NIK'];
	$idDokter	=$_POST['idDokter'];
	$spesi =$_POST['spesialis'];
	
	include "dist/koneksi.php";
	// $cekuser	=mysql_num_rows (mysql_query("SELECT username FROM tb_user WHERE username='$_POST[username]'"));
	
		if (empty($_POST['NIK']) ) {
		echo "<div class='register-logo'><b>Oops!</b> Data Tidak Lengkap.</div>
			<div class='box box-primary'>
				<div class='register-box-body'>
					<p>Harap periksa kembali dan pastikan data yang Anda masukan lengkap dan benar.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-pasien.php?page=pendaftaran' class='btn btn-block btn-warning'>Back</button>
						</div>
					</div>
				</div>
			</div>";
		}
    
		else {
      $cekNIK = mysql_num_rows(mysql_query("SELECT * FROM Pasien WHERE NIK = '$NIK'"));
        if(($cekNIK)==1){

					$cekAntrian = mysql_num_rows(mysql_query("SELECT * FROM `antrianPasien` WHERE tglAntrian = CURDATE() and spesialis='$spesi'"));
					if(($cekAntrian)==0){
						$pendaftar = $_SESSION['username'];
						
						$insert = "INSERT INTO antrianPasien (NIK,idDokter,spesialis,noAntrian,NIKPendaftar,tglAntrian) VALUES ('$NIK','$idDokter','$spesi',1,'$pendaftar',NOW())";
						$query = mysql_query ($insert);
						// echo "berhasil";
						echo '
						<div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <!-- <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Selanjutnya</h4>
					      </div> -->
					      <div class="modal-body">
								Pendaftaran Antrian berhasil, lihat nomor antrian anda pada halaman pemberitahuan
					      </div>
								<div class="modal-footer">
								<button onclick=location.href="home-pasien.php?page=pendaftaran" type="button" class="myButton btn btn-primary" >Lanjutkan</button>
					      </div>
					    </div>
					  </div>
										';
						
					}

					else {
					$cekAntrian = mysql_query("SELECT * FROM `antrianPasien` WHERE tglAntrian = CURDATE() and  spesialis='$spesi' ORDER BY `antrianPasien`.`noAntrian` DESC");						
						// $Data= mysql_query("SELECT * FROM antrianPasien where idDokter = '$idDokter'");

					$getData = mysql_fetch_array($cekAntrian);
					$noAntrian = $getData['noAntrian'];
					$tambahAntrian = ($noAntrian + 1);
					$pendaftar = $_SESSION['username'];

					$insert = "INSERT INTO antrianPasien (NIK,idDokter,spesialis,noAntrian,NIKPendaftar,tglAntrian) VALUES ('$NIK','$idDokter','$spesi',$tambahAntrian,'$pendaftar',NOW())";
					$query = mysql_query ($insert);
					echo '
					<div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Selanjutnya</h4>
      </div> -->
      <div class="modal-body">
			Pendaftaran Antrian berhasil, lihat nomor antrian anda pada halaman pemberitahuan
      </div>
			<div class="modal-footer">
			<button onclick=location.href="home-pasien.php?page=pendaftaran" type="button" class="myButton btn btn-primary" >Lanjutkan</button>
      </div>
    </div>
  </div>
					';
						
					}
				

          
        }
        else {
					echo '
					<div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Selanjutnya</h4>
      </div> -->
      <div class="modal-body">
			Anda belum terdaftar sebagai pasien RS Pusri, silahkan daftar melalui pasien baru
      </div>
			<div class="modal-footer">
			<button onclick=location.href="home-pasien.php?page=pendaftaran" type="button" class="myButton btn btn-primary" >Lanjutkan</button>
      </div>
    </div>
  </div>
					';
        }
		
	
		}
?>
</div>