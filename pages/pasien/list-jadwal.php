<section class="content-header">
   <h1><small></small></h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-th"></i>Jadwal Praktik Dokter</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
  <?php
  	include "dist/koneksi.php";
	
    $DataDokter =mysql_query("SELECT * FROM `jadwal` INNER JOIN dokter on dokter.idDokter = jadwal.idDokter INNER JOIN hari on hari.idHari = jadwal.idHari order by hari.idhari");
    while ($row = mysql_fetch_array($DataDokter)){
    
	echo '<div class="col-lg-12 col-xs-12">
  <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-calendar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">'.$row['NamaHari'].' - '.$row['jam'].'</span>
              <span class="info-box-number">'.$row['nama'].'</span>
              <span class="info-box-number">'.$row['kamar'].'</span>
            </div>
            <!-- /.info-box-content -->
          </div>
</div>
';
}

?>
</div>
</section>