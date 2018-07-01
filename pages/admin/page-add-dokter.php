<section class="content-header">
   <h1><small></small></h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-th"></i>Tambah Data Dokter</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
  <?php
  	include "dist/koneksi.php";

    if (isset($_POST['simpan'])) {
      $nama= $_POST['nama'];
      $spesialis =$_POST['spesi'];
      
      $catat=mysql_query("INSERT into dokter (nama, spesialis ) values ('$nama', '$spesialis')") or die (mysql_error());
        if ($catat) {
          echo "<script>alert ('Data Berhasil Disimpan');</script>";
          echo "<meta http-equiv='refresh' content='0; url=?page=list-dokter'>";
        }else{
          echo "<script>alert ('Data Gagal Disimpan');</script>";
        }
    } ?>
    
	<div class="col-lg-6 col-xs-12">
  <div class="box box-info">
  <div class="box-header"><h4 align="center">Form Tambah Data Dokter</h4></div>  
  <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" target="_self" enctype="multipart/form-data">
  <div class="box-body">
    <div class="form-group">
      <label>Nama</label><input type="text" class="form-control" name="nama" required>
    </div>
    <div class="form-group">  
      <label>Spesialis</label>
        <select name="spesi" class="form-control" required >
          <option value="">---Pilih---</option>
          <option value="Penyakit Dalam">Penyakit Dalam</option>
          <option value="Jantung">Jantung</option>
          <option value="Anak">Anak</option>
          <option value="Bedah Umum">Bedah Umum</option>
		  <option value="Bedah Tumor">Bedah Tumor</option>
          <option value="Bedah Tulang">Bedah Tulang</option>
		  <option value="Kebidanan dan Kandungan">Kebidanan dan Kandungan</option>
		  <option value="Syaraf">Syaraf</option>
		  <option value="THT">THT</option>
		  <option value="Kulit">Kulit</option>
		  <option value="Mata">Mata</option>
		  <option value="Rehab Medik">Rehab Medik</option>
		  <option value="Penyakit Dalam Sub Ginjal dan Hipertensi">Penyakit Dalam Sub Ginjal dan Hipertensi</option>
		  <option value="Dokter Umum">Dokter Umum</option>
        </select>
    </div>
    <div class="box-footer">    
      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      <button name="batal" class="btn btn-danger">Batal</button>
    </div>  
    <!-- /.info-box-content -->
    <!-- /.info-box-content -->
  </div>        
</div>
</form>        
        
</div>
</div>
</section>