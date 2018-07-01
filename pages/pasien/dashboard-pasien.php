<section class="content-header">
   <h1><small></small></h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Beranda</a></li>
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
  	<div class="col-lg-6 col-xs-12">

    <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('dist/img/home-bg-wide.jpg') center center;">
              <!-- <h3 class="widget-user-username">Selamat Datang</h3> -->
              <!-- <h5 class="widget-user-desc">Web Designer</h5> -->
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="dist/img/profile/icon-pusri-white.png" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $_SESSION['namaLengkap'];?></h5>
                    <span class="description-text"><?php echo $_SESSION['username'];?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
</div>
  	<!-- <div class="col-lg-6 col-xs-12">
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
			
    </div> -->



</div>
</section>