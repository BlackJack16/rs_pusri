<section class="content-header">
   <h1><small></small></h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-th"></i>Data Dokter</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
  <?php
  	include "dist/koneksi.php";
	
    $DataDokter =mysql_query("SELECT * FROM `dokter` ");
    while ($row = mysql_fetch_array($DataDokter)){
    
	echo '<div class="col-lg-12 col-xs-12">
  <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">'.$row['nama'].'</span>
              <span class="info-box-number">'.$row['spesialis'].'</span>
            </div>
            <!-- /.info-box-content -->
          </div>
</div>
';
}

?>
</div>
</section>