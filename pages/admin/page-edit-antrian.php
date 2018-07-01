<section class="content-header">
   <h1><small></small></h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-th"></i>Edit Data Antrian Pasien</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
  <?php
  	include "dist/koneksi.php";

    if (isset($_POST['simpan'])) {
      $id=$_POST['id'];
      $tgl = $_POST['tgl'];
      $nama= $_POST['nama'];
      $NIK =$_POST['NIK'];

      $catat=mysql_query("UPDATE antrianpasien SET status=0, tglAntrian=CURRENT_DATE() where idAntrian='$id'") or die (mysql_error());
        if ($catat) {
          echo "<script>alert ('Data Berhasil Ubah');</script>";
          echo "<meta http-equiv='refresh' content='0; url=?page=list-antrian'>";
        }else{
          echo "<script>alert ('Data Gagal Diubah');</script>";
        }
    }


	 $idAntrian=$_GET['id']; 
    $DataDokter =mysql_query("SELECT * FROM antrianpasien inner join pasien on pasien.NIK = antrianPasien.NIK WHERE antrianPasien.idAntrian='$idAntrian'") or die (mysql_error());
    while ($row = mysql_fetch_array($DataDokter)) { ?>
    
	<div class="col-lg-6 col-xs-12">
  <div class="box box-info">
    <div class="box-header"><h4 align="center">Form Edit Antrian</h4></div>  
      <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" target="_self" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label>NO. Antrian</label><input type="text" class="form-control" name="" value="<?php echo $row['noAntrian']; ?>">
          </div>
          <div class="form-group">
            <label>Nama</label><input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>">
          </div>
          <div class="form-group">
            <label>NIK</label><input type="text" class="form-control" name="NIK" value="<?php echo $row['NIK']; ?>">
          </div>
          <div class="form-group">
            <label>Tanggal</label><input type="date" class="form-control" name="tgl" value="<?php echo $row['tglAntrian']; ?>">
          </div>
          <div class="form-group" hidden="">
            <label>id</label><input type="text" name="id" value="<?php echo $row['idAntrian']; ?>">
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
          <a href="javascript:window.history.go(-1);"><div class="btn btn-danger">Batal</div></a>
        </div>
          <!-- <input type="text" class="info-box-icon bg-aqua" value="<?php echo $row['noAntrian'];?>">
          <div class="info-box-content">
            <div hidden="">
              <span class="info-box-number"><input type="text" name="id" value="<?php echo $row['idAntrian'];?>">id</span>
            </div>  
              <span class="info-box-number"><input type="date" name="tgl" value="<?php echo $row['tglAntrian'];?>"></span>
              <span class="info-box-number"><input type="text" name="nama" value="<?php echo $row['nama'];?>"></span>
              <span class="info-box-number"><input type="text" name="NIK" value="<?php echo $row['NIK'];?>"></span>
          </div>
          <button type="submit" name="simpan">Simpan</button>
          <button name="batal">Batal</button> -->
          <!-- /.info-box-content -->

      </form>            
  </div>
       
        
</div>

<?php
}

?>
</div>
</section>