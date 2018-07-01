<section class="content-header">
   <h1><small></small></h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-th"></i>Data Jadwal Praktik Dokter</a></li>
    </ol>
      <a href="home-admin.php?page=add-jadwal"><button class="btn btn-primary">Tambah Jadwal</button></a>
</section>
<section class="content">
    <div class="row">
  <?php
  	include "dist/koneksi.php";
	
    $DataDokter =mysql_query("SELECT * FROM `jadwal` INNER JOIN dokter on dokter.idDokter = jadwal.idDokter inner join hari on hari.idHari = jadwal.idhari");
    while ($row = mysql_fetch_array($DataDokter)){
    
	echo '<a href="home-admin.php?page=edit-jadwal&id='.$row['idJadwal'].'"><div class="col-lg-12 col-xs-12">
  <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-calendar"></i></span>

            <div class="info-box-content">
            <span class="info-box-number">'.$row['NamaHari'].' - '.$row['jam'].'</span>
              <span class="info-box-number">'.$row['nama'].'</span>
              <span class="info-box-number">'.$row['kamar'].'</span>
            </div></a>
            <!-- /.info-box-content -->
            <a href="home-admin.php?page=del-jadwal&id='.$row['idJadwal'].'"><button>Hapus</button></a>
          </div>
</div> 
';
}

?>
</div>
</section>