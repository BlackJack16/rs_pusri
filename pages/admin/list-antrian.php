<section class="content-header">
   <h1><small></small></h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-th"></i>Data Antrian Pasien</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
  <?php
  	include "dist/koneksi.php";
	
    $DataDokter =mysql_query("SELECT pasien.nama as nama_pasien, antrianPasien.NIK, antrianPasien.noAntrian, antrianPasien.idAntrian, dokter.spesialis, dokter.nama as nama_dokter, dokter.spesialis FROM `antrianPasien` inner join pasien on pasien.NIK = antrianPasien.NIK inner join dokter on antrianPasien.idDokter=dokter.idDokter where tglAntrian=CURDATE() and status=0 group by dokter.spesialis asc")or die (mysql_error());

    // $DataDokter =mysql_query("SELECT * FROM `antrianPasien` inner join pasien on pasien.NIK = antrianPasien.NIK")or die (mysql_error());

    while ($row = mysql_fetch_array($DataDokter)){
    
    	echo '<a href="home-admin.php?page=edit-antrian&id='.$row['idAntrian'].'">
      <div class="col-lg-12 col-xs-12">
      <div class="info-box">
                <span class="info-box-icon bg-aqua">'.$row['noAntrian'].'</span>

                <div class="info-box-content">
                  <span class="info-box-text">'.$row['nama_pasien'].'</span>
                  <span class="info-box-text">'.$row['nama_dokter'].'</span>
                  <span class="info-box-text">'.$row['spesialis'].'</span>
                  <span class="info-box-number">'.$row['NIK'].'</span>
                </div>
                <!-- /.info-box-content -->
                
              </div>
            
    </div>
    ';
    }
    
?>
</div>
</section>