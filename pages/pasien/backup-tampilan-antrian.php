<section class="content-header">
   <h1><small></small></h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-th"></i>Antrian Sekarang</a></li>
    </ol>
</section>
<?php
	include "dist/koneksi.php";
	
	$DataAntrian =mysql_query("SELECT * FROM `antrianPasien` inner join pasien on antrianPasien.NIK=pasien.NIK WHERE status = 0 and tglAntrian = CURDATE()	limit 1");
	
	if(mysql_num_rows($DataAntrian)>=1){
		$antrianNow = mysql_fetch_array($DataAntrian);
		$noAntrian = $antrianNow['noAntrian'];
		$idAntrian = $antrianNow['idAntrian'];
	}
	else{
		$noAntrian = 'Tidak Ada Antrian';
	}

	$DataAntrianAll =mysql_query("SELECT * FROM `antrianPasien` inner join pasien on antrianPasien.NIK=pasien.NIK WHERE tglAntrian = CURDATE() and status=0");
	$totalAntrian = mysql_num_rows($DataAntrianAll);
	
?>
<section class="content">
  <div class="row">
	<!-- <div class="content-header">
		<h1><small></small></h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-th"></i>No Antrian saya</a></li>
    </ol>
		</div> -->
  <div class="col-lg-12 col-xs-12">
	
			<div class="small-box bg-aqua">
				<div class="inner">
					<p>No Antrian Sekarang</p>
					<h3><?=$noAntrian?></h3>
				</div>
			  <div class="icon">
					<i class="ion ion-clipboard"></i>
		    </div>
				<p class="small-box-footer">Total antrian <?=$totalAntrian?></p>
				
			</div>
			
    </div>
		<div class="content-header">
		<h1><small></small></h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-th"></i>No Antrian saya</a></li>
    </ol>
		</div>
	
<?php
$jnama=mysql_query("SELECT count(dokter.spesialis) as jumlah FROM antrianPasien inner join dokter on antrianPasien.idDokter=dokter.idDokter where NIKPendaftar=$_SESSION[username]");
$namap=mysql_query("SELECT dokter.spesialis FROM antrianPasien inner join dokter on antrianPasien.idDokter=dokter.idDokter where NIKPendaftar=$_SESSION[username] group by dokter.spesialis");

while ($rowj= mysql_fetch_array($jnama)) {
	for ($i=1; $i<=$rowj['jumlah']; $i++ ) {
		while ($rowp= mysql_fetch_array($namap)){
			echo '<p>'.$rowp['spesialis'].'</p>'
			;
// $DataDokter =mysql_query("SELECT antrianPasien.noAntrian,`antrianPasien`.NIK as NIK, `pasien`.nama as namaPasien, `dokter`.nama as namaDokter, dokter.spesialis as spesialis, jadwal.kamar FROM `antrianPasien` INNER JOIN dokter ON dokter.idDokter = antrianPasien.idDokter INNER JOIN pasien on pasien.NIK = antrianPasien.NIK inner join jadwal on antrianPasien.idDokter=jadwal.idDokter WHERE tglAntrian = CURDATE() and NIKPendaftar = $_SESSION[username] order by antrianPasien.idDokter desc");

		$DataDokter =mysql_query("SELECT antrianPasien.noAntrian,`antrianPasien`.NIK as NIK, `pasien`.nama as namaPasien, `dokter`.nama as namaDokter, dokter.spesialis as spesialis FROM `antrianPasien` INNER JOIN dokter ON dokter.idDokter = antrianPasien.idDokter INNER JOIN pasien on pasien.NIK = antrianPasien.NIK WHERE tglAntrian = CURDATE() and NIKPendaftar = $_SESSION[username] and dokter.spesialis='$rowp[spesialis]'");
		while ($row = mysql_fetch_array($DataDokter)){
			
			echo '<div class="col-lg-12 col-xs-12">
			<div class="info-box">
			<span class="info-box-icon bg-aqua">'.$row['noAntrian'].'</span>
			
			<div class="info-box-content">
			<span class="info-box-text">'.$row['namaPasien'].'</span>
			<span class="info-box-text">'.$row['NIK'].'</span>
			<span class="info-box-text">'.$row['namaDokter'].'</span>
			<span class="info-box-text">'.$row['spesialis'].'</span>

			</div>
			<!-- /.info-box-content -->
			</div>
			</div>
			';
			}
		}	
	}	
}
?>

</div>
</section>