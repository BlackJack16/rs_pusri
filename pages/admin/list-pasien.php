<section class="content-header">
   <h1><small></small></h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-th"></i>Data Pasien</a></li>
    </ol>
    <a href="home-admin.php?page=add-pasien"><button class="btn btn-primary">Tambah Data Pasien</button></a>
</section>
<section class="content">
    <div class="row">
  <?php
  	include "dist/koneksi.php";
	
    $DataDokter =mysql_query("SELECT * FROM `pasien` INNER JOIN antrianpasien on pasien.NIK = antrianpasien.NIK where antrianpasien.status = 1 ");
    while ($row = mysql_fetch_array($DataDokter)){
    
	echo '<a href="home-admin.php?page=edit-pasien&id='.$row['idPasien'].'"><div class="col-lg-12 col-xs-12">
  <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">'.$row['nama'].'</span>
              <span class="info-box-number">'.$row['NIK'].'</span>
            </div></a>
            <!-- /.info-box-content -->
            <a href="home-admin.php?page=del-pasien&id='.$row['idPasien'].'"><button>Hapus</button></a>
          </div>
</div>
';
}

?>
</div>
</section>