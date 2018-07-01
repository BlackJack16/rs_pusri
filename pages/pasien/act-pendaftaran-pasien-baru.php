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
	$nama	=$_POST['nama'];
	$idDokter	=$_POST['idDokter'];
	$jenisKelamin	=$_POST['jenisKelamin'];
	$tglLahir	=$_POST['tglLahir'];
	$alamat	=$_POST['alamat'];
	$provinsi	=$_POST['provinsi'];
	$kabupaten	=$_POST['kabupaten'];
	$kecamatan	=$_POST['kecamatan'];
	$kelurahan	=$_POST['kelurahan'];
	$kodepos	=$_POST['kodepos'];
	$notelp	=$_POST['notelp'];
	$pekerjaan	=$_POST['pekerjaan'];
	$Agama	=$_POST['Agama'];
	$golDarah	=$_POST['golDarah'];
	$spesi =$_POST['spesialis'];
	
	include "dist/koneksi.php";

      $cekNIK = mysql_num_rows(mysql_query("SELECT * FROM Pasien WHERE NIK = '$NIK'"));
        if(($cekNIK)==0){
					
					$insert = "INSERT INTO pasien (nama, NIK,jenisKelamin,tglLahir,alamat,provinsi,kabupaten,kecamatan,kelurahan,kodepos,notelp,pekerjaan,Agama,golDarah) VALUES ('$nama', '$NIK','$jenisKelamin','$tglLahir','$alamat','$provinsi','$kabupaten','$kecamatan','$kelurahan',$kodepos,'$notelp','$pekerjaan','$Agama','$golDarah')";
					$query = mysql_query ($insert);
					if ($query){
						// echo "berhasil";
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
						$cekAntrian = mysql_query("SELECT * FROM `antrianPasien` WHERE tglAntrian = CURDATE() and spesialis='$spesi' ORDER BY `antrianPasien`.`noAntrian` DESC");						
							// $Data= mysql_query("SELECT * FROM antrianPasien where idDokter = '$idDokter'");
						$getData = mysql_fetch_array($cekAntrian);
						$noAntrian = $getData['noAntrian'];
						$tambahAntrian = ($noAntrian + 1);
						$pendaftar = $_SESSION['username'];
						$insert = "INSERT INTO antrianPasien (NIK,idDokter,spesialis,noAntrian,NIKPendaftar,tglAntrian) VALUES ('$NIK','$idDokter','$spesi',$tambahAntrian,'$pendaftar',NOW())";
						$query = mysql_query ($insert);
							// echo "gagal";
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
  </div>';
							
						}
						
					}
					else{
						echo '
					<div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Selanjutnya</h4>
      </div> -->
      <div class="modal-body">
			Pendaftaran Antrian gagal, periksa jaringan atau ulangi
      </div>
			<div class="modal-footer">
			<button onclick=location.href="home-pasien.php?page=pendaftaran" type="button" class="myButton btn btn-primary" >Lanjutkan</button>
      </div>
    </div>
  </div>';
					}

        }
        else {echo '
					<div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Selanjutnya</h4>
      </div> -->
      <div class="modal-body">
			Anda sudah terdaftar, silahkan daftar melalui pasien lama
      </div>
			<div class="modal-footer">
			<button onclick=location.href="home-pasien.php?page=pendaftaran" type="button" class="myButton btn btn-primary" >Lanjutkan</button>
      </div>
    </div>
  </div>';
        }
		
		
?>
</div>