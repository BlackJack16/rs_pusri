<section class="content-header">
   <h1><small></small></h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-th"></i>Tambah Jadwal</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
  <?php
  	include "dist/koneksi.php";

    if (isset($_POST['simpan'])) {
      $hari= $_POST['hari'];
      $jam =$_POST['jam'];
      $dokter =$_POST['dok'];
      $kamar =$_POST['kamar'];
      
      $catat=mysql_query("INSERT into jadwal (idHari, jam, idDokter, kamar ) values ('$hari', '$jam', '$dokter', '$kamar')") or die (mysql_error());
        if ($catat) {
          echo "<script>alert ('Data Berhasil Disimpan');</script>";
          echo "<meta http-equiv='refresh' content='0; url=?page=list-jadwal'>";
        }else{
          echo "<script>alert ('Data Gagal Disimpan');</script>";
        }
    } ?>
    
	<div class="col-lg-6 col-xs-12">
  <div class="box box-info">
  <div class="box-header"><h4 align="center">Form Tambah Jadwal</h4></div>  
  <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" target="_self" enctype="multipart/form-data">
  <div class="box-body"> 
    <div class="form-group">
      <label>Hari</label>
        <select name="hari" class="form-control" required>
          <option value="">---Pilih---</option>
          <?php $jhari=mysql_query("SELECT count(idHari) as jumlah FROM hari")or die (mysql_error());
                $hari=mysql_query("SELECT * FROM hari")or die (mysql_error());  

              while ($row = mysql_fetch_array($jhari)) { 
                
            for ($i=1; $i <= $row['jumlah'] ; $i++) { 
              while ($rows = mysql_fetch_array($hari)) {
              ?>
              <option value="<?php echo $rows['idHari']; ?>"><?php echo $rows['NamaHari']; ?></option>
          <?php  } }
             
          
           } ?>
        </select>
      </div>
    <div class="form-group">    
      <label>Dokter</label>
        <select name="dok" class="form-control" required>
          <option value="">---Pilih---</option>
          <?php $jdokter=mysql_query("SELECT count(idDokter) as jumlah FROM dokter")or die (mysql_error());
                $dokter=mysql_query("SELECT * FROM dokter")or die (mysql_error());  

              while ($row = mysql_fetch_array($jdokter)) { 
                
            for ($i=1; $i <= $row['jumlah'] ; $i++) { 
              while ($rows = mysql_fetch_array($dokter)) {
              ?>

              <option value="<?php echo $rows['idDokter']; ?>"><?php echo $rows['nama']; ?></option>
          <?php  } }
             
          
           } ?>
        </select>
    </div>
    <div class="form-group">    
      <label>Jam</label><input type="time" name="jam" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Kamar</label>
        <select name="kamar" class="form-control" required>
          <option value="">---Pilih---</option>
          <option value="Kamar Penyakit Dalam">Kamar Penyakit Dalam</option>
          <option value="Kamar Jantung">Kamar Jantung</option>
		  <option value="Kamar Anak">Kamar Anak</option>
		  <option value="Kamar Bedah Umum">Kamar Bedah Umum</option>
		  <option value="Kamar Bedah Tumor">Kamar Bedah Tumor</option>
		  <option value="Kamar Bedah Tulang">Kamar Bedah Tulang</option>
		  <option value="Kamar Kebidanan dan Kandungan">Kamar Kebidanan dan Kandungan</option>
		  <option value="Kamar Syaraf">Kamar Syaraf</option>
		  <option value="Kamar THT">Kamar THT</option>
		  <option value="Kamar Kulit">Kamar Kulit</option>
		  <option value="Kamar Mata">Kamar Mata</option>
		  <option value="Kamar Rehab Medik">Kamar Rehab Medik</option>
		  <option value="Kamar Penyakit Dalam Sub Ginjal dan HP">Kamar Penyakit Dalam Sub Ginjal dan Hipertensi</option>
		  <option value="Kamar Dokter Umum">Kamar Dokter Umum</option>
		  
        </select>
    </div>
    <div class="box-footer">    
      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      <button name="batal" class="btn btn-danger">Batal</button>
      <!-- /.info-box-content -->
      <!-- /.info-box-content -->
    </div>  
  </div>        
</div>
</form>        
        
</div>
</div>
</section>