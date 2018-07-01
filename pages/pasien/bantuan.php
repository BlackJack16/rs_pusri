<section class="content-header">
   <h1><small></small></h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Bantuan</a></li>
    </ol>
</section>
<?php
	include "dist/koneksi.php";
	
	$DataAntrian =mysql_query("SELECT * FROM `antrianPasien` WHERE status = 0 and tglAntrian = CURDATE()	limit 1");
	
	if(mysql_num_rows($DataAntrian)>=1){
		$antrianNow = mysql_fetch_array($DataAntrian);
		$noAntrian = $antrianNow['noAntrian'];
		$idAntrian = $antrianNow['idAntrian'];
	}
	else{
		$noAntrian = 'Tidak Ada Antrian';
	}

	$DataAntrianAll =mysql_query("SELECT * FROM `antrianPasien` WHERE tglAntrian = CURDATE()");
	$totalAntrian = mysql_num_rows($DataAntrianAll);
	
?>
<section class="content">
    <div class="row">
    <div class="col-lg-12 col-xs-12">
  <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-phone"></i></span>

            <div class="info-box-content">
              <span >Untuk bantuan, informasi dan layanan silahkan hubungi kami di </span>
              <!-- <span class="info-box-number">'.$row['nama'].'</span> -->
              <span class="info-box-number">0711-22 33 44</span>
            </div>
            <!-- /.info-box-content -->
          </div>
</div>



</div>
</section>