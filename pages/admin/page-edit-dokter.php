<section class="content-header">
   <h1><small></small></h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-th"></i>Edit Data Dokter</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
  <?php
  	include "dist/koneksi.php";

    if (isset($_POST['simpan'])) {
      $id=$_POST['id'];
      $nama= $_POST['nama'];
      $spesialis =$_POST['spesi'];

      $catat=mysql_query("UPDATE dokter SET nama='$nama', spesialis='$spesialis' where idDokter='$id'") or die (mysql_error());
        if ($catat) {
          echo "<script>alert ('Data Berhasil Diubah');</script>";
          echo "<meta http-equiv='refresh' content='0; url=?page=list-dokter'>";
        }else{
          echo "<script>alert ('Data Gagal Diubah');</script>";
        }
    }


	 $idDokter=$_GET['id']; 
    $DataDokter =mysql_query("SELECT * FROM dokter where idDokter='$idDokter'") or die (mysql_error());
    while ($row = mysql_fetch_array($DataDokter)) { ?>
    
	<div class="col-lg-6 col-xs-12">
  <div class="box box-info">
  <div class="box-header"><h4 align="center">Form Edit Data Dokter</h4></div>  
  <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" target="_self" enctype="multipart/form-data">
   <div class="box-body"> 
    <div class="form-group" hidden="">
      <label>id</label><input type="text" class="form-control" name="id"value="<?php echo $row['idDokter'];?>">
    </div> 
    <div class="form-group">
      <label>Nama</label><input type="text" class="form-control" name="nama"value="<?php echo $row['nama'];?>">
    </div>
    <div class="form-group">  
      <label>Spesialis</label>
        <select name="spesi" class="form-control">
          <?php if ($row['spesialis']=='Penyakit Dalam') { ?>
            <option value="Penyakit Dalam" selected>Penyakit Dalam</option>
            <option value="Jantung">jantung</option>
            <option value="Anak" >Anak</option>
            <option value="Bedah Umum" >Bedah Umum</option>
            <option value="Bedah Tumor" >Bedah Tumor</option>
            <option value="Bedah Tulang" >Bedah Tulang</option>
			<option value="Kebidanan dan Kandungan">Kebidanan dan Kandungan</option>
		    <option value="Syaraf">Syaraf</option>
		    <option value="THT">THT</option>
		    <option value="Kulit">Kulit</option>
		    <option value="Mata">Mata</option>
		    <option value="Rehab Medik">Rehab Medik</option>
		    <option value="Penyakit Dalam Sub Ginjal dan Hipertensi">Penyakit Dalam Sub Ginjal dan Hipertensi</option>
		    <option value="Dokter Umum">Dokter Umum</option>
          <?php } elseif ($row['spesialis']=='Jantung') { ?>
            <option value="Penyakit Dalam" >Penyakit Dalam</option>
            <option value="Jantung" selected>jantung</option>
            <option value="Anak" >Anak</option>
            <option value="Bedah Umum" >Bedah Umum</option>
            <option value="Bedah Tumor" >Bedah Tumor</option>
            <option value="Bedah Tulang" >Bedah Tulang</option>
			<option value="Kebidanan dan Kandungan">Kebidanan dan Kandungan</option>
		    <option value="Syaraf">Syaraf</option>
		    <option value="THT">THT</option>
		    <option value="Kulit">Kulit</option>
		    <option value="Mata">Mata</option>
		    <option value="Rehab Medik">Rehab Medik</option>
		    <option value="Penyakit Dalam Sub Ginjal dan Hipertensi">Penyakit Dalam Sub Ginjal dan Hipertensi</option>
		    <option value="Dokter Umum">Dokter Umum</option>
          <?php } elseif ($row['spesialis']=='Anak') { ?>
            <option value="Penyakit Dalam" >Penyakit Dalam</option>
            <option value="Jantung" >jantung</option>
            <option value="Anak" selected>Anak</option>
            <option value="Bedah Umum" >Bedah Umum</option>
            <option value="Bedah Tumor" >Bedah Tumor</option>
            <option value="Bedah Tulang" >Bedah Tulang</option>  
			<option value="Kebidanan dan Kandungan">Kebidanan dan Kandungan</option>
		    <option value="Syaraf">Syaraf</option>
		    <option value="THT">THT</option>
		    <option value="Kulit">Kulit</option>
		    <option value="Mata">Mata</option>
		    <option value="Rehab Medik">Rehab Medik</option>
		    <option value="Penyakit Dalam Sub Ginjal dan Hipertensi">Penyakit Dalam Sub Ginjal dan Hipertensi</option>
		    <option value="Dokter Umum">Dokter Umum</option>
          <?php } elseif ($row['spesialis']=='Bedah Umum') { ?>
            <option value="Penyakit Dalam" >Penyakit Dalam</option>
            <option value="Jantung" >jantung</option>
            <option value="Anak" >Anak</option>
            <option value="Bedah Umum" selected>Bedah Umum</option>
            <option value="Bedah Tumor" >Bedah Tumor</option>
            <option value="Bedah Tulang" >Bedah Tulang</option> 
			<option value="Kebidanan dan Kandungan">Kebidanan dan Kandungan</option>
		    <option value="Syaraf">Syaraf</option>
		    <option value="THT">THT</option>
		    <option value="Kulit">Kulit</option>
		    <option value="Mata">Mata</option>
		    <option value="Rehab Medik">Rehab Medik</option>
		    <option value="Penyakit Dalam Sub Ginjal dan Hipertensi">Penyakit Dalam Sub Ginjal dan Hipertensi</option>
		    <option value="Dokter Umum">Dokter Umum</option>
          <?php } elseif ($row['spesialis']=='Bedah Tumor') { ?>
            <option value="Penyakit Dalam" >Penyakit Dalam</option>
            <option value="Jantung" >jantung</option>
            <option value="Anak" >Anak</option>
            <option value="Bedah Umum" selected>Bedah Umum</option>
            <option value="Bedah Tumor" >Bedah Tumor</option>
            <option value="Bedah Tulang" >Bedah Tulang</option>  
            <option value="Kebidanan dan Kandungan">Kebidanan dan Kandungan</option>
		    <option value="Syaraf">Syaraf</option>
		    <option value="THT">THT</option>
		    <option value="Kulit">Kulit</option>
		    <option value="Mata">Mata</option>
		    <option value="Rehab Medik">Rehab Medik</option>
		    <option value="Penyakit Dalam Sub Ginjal dan Hipertensi">Penyakit Dalam Sub Ginjal dan Hipertensi</option>
		    <option value="Dokter Umum">Dokter Umum</option>			
           <?php } elseif ($row['spesialis']=='Bedah Tulang') { ?>
            <option value="Penyakit Dalam" >Penyakit Dalam</option>
            <option value="Jantung" >jantung</option>
            <option value="Anak" >Anak</option>
            <option value="Bedah Umum" >Bedah Umum</option>
            <option value="Bedah Tumor" >Bedah Tumor</option>
            <option value="Bedah Tulang" >Bedah Tulang</option>
			<option value="Kebidanan dan Kandungan">Kebidanan dan Kandungan</option>
		    <option value="Syaraf">Syaraf</option>
		    <option value="THT">THT</option>
		    <option value="Kulit">Kulit</option>
		    <option value="Mata">Mata</option>
		    <option value="Rehab Medik">Rehab Medik</option>
		    <option value="Penyakit Dalam Sub Ginjal dan Hipertensi">Penyakit Dalam Sub Ginjal dan Hipertensi</option>
		    <option value="Dokter Umum">Dokter Umum</option>
		   <?php } elseif ($row['spesialis']=='Kebidanan dan Kandungan') { ?>
            <option value="Penyakit Dalam" >Penyakit Dalam</option>
            <option value="Jantung" >jantung</option>
            <option value="Anak" >Anak</option>
            <option value="Bedah Umum" >Bedah Umum</option>
            <option value="Bedah Tumor" >Bedah Tumor</option>
            <option value="Bedah Tulang" >Bedah Tulang</option>
			<option value="Kebidanan dan Kandungan">Kebidanan dan Kandungan</option>
		    <option value="Syaraf">Syaraf</option>
		    <option value="THT">THT</option>
		    <option value="Kulit">Kulit</option>
		    <option value="Mata">Mata</option>
		    <option value="Rehab Medik">Rehab Medik</option>
		    <option value="Penyakit Dalam Sub Ginjal dan Hipertensi">Penyakit Dalam Sub Ginjal dan Hipertensi</option>
		    <option value="Dokter Umum">Dokter Umum</option>
		   <?php } elseif ($row['spesialis']=='Syaraf') { ?>
            <option value="Penyakit Dalam" >Penyakit Dalam</option>
            <option value="Jantung" >jantung</option>
            <option value="Anak" >Anak</option>
            <option value="Bedah Umum" >Bedah Umum</option>
            <option value="Bedah Tumor" >Bedah Tumor</option>
            <option value="Bedah Tulang" >Bedah Tulang</option>
			<option value="Kebidanan dan Kandungan">Kebidanan dan Kandungan</option>
		    <option value="Syaraf">Syaraf</option>
		    <option value="THT">THT</option>
		    <option value="Kulit">Kulit</option>
		    <option value="Mata">Mata</option>
		    <option value="Rehab Medik">Rehab Medik</option>
		    <option value="Penyakit Dalam Sub Ginjal dan Hipertensi">Penyakit Dalam Sub Ginjal dan Hipertensi</option>
		    <option value="Dokter Umum">Dokter Umum</option>
		   <?php } elseif ($row['spesialis']=='THT') { ?>
            <option value="Penyakit Dalam" >Penyakit Dalam</option>
            <option value="Jantung" >jantung</option>
            <option value="Anak" >Anak</option>
            <option value="Bedah Umum" >Bedah Umum</option>
            <option value="Bedah Tumor" >Bedah Tumor</option>
            <option value="Bedah Tulang" >Bedah Tulang</option>
			<option value="Kebidanan dan Kandungan">Kebidanan dan Kandungan</option>
		    <option value="Syaraf">Syaraf</option>
		    <option value="THT">THT</option>
		    <option value="Kulit">Kulit</option>
		    <option value="Mata">Mata</option>
		    <option value="Rehab Medik">Rehab Medik</option>
		    <option value="Penyakit Dalam Sub Ginjal dan Hipertensi">Penyakit Dalam Sub Ginjal dan Hipertensi</option>
		    <option value="Dokter Umum">Dokter Umum</option>
		   <?php } elseif ($row['spesialis']=='Kulit') { ?>
            <option value="Penyakit Dalam" >Penyakit Dalam</option>
            <option value="Jantung" >jantung</option>
            <option value="Anak" >Anak</option>
            <option value="Bedah Umum" >Bedah Umum</option>
            <option value="Bedah Tumor" >Bedah Tumor</option>
            <option value="Bedah Tulang" >Bedah Tulang</option>
			<option value="Kebidanan dan Kandungan">Kebidanan dan Kandungan</option>
		    <option value="Syaraf">Syaraf</option>
		    <option value="THT">THT</option>
		    <option value="Kulit">Kulit</option>
		    <option value="Mata">Mata</option>
		    <option value="Rehab Medik">Rehab Medik</option>
		    <option value="Penyakit Dalam Sub Ginjal dan Hipertensi">Penyakit Dalam Sub Ginjal dan Hipertensi</option>
		    <option value="Dokter Umum">Dokter Umum</option>
		   <?php } elseif ($row['spesialis']=='Mata') { ?>
            <option value="Penyakit Dalam" >Penyakit Dalam</option>
            <option value="Jantung" >jantung</option>
            <option value="Anak" >Anak</option>
            <option value="Bedah Umum" >Bedah Umum</option>
            <option value="Bedah Tumor" >Bedah Tumor</option>
            <option value="Bedah Tulang" >Bedah Tulang</option>
			<option value="Kebidanan dan Kandungan">Kebidanan dan Kandungan</option>
		    <option value="Syaraf">Syaraf</option>
		    <option value="THT">THT</option>
		    <option value="Kulit">Kulit</option>
		    <option value="Mata">Mata</option>
		    <option value="Rehab Medik">Rehab Medik</option>
		    <option value="Penyakit Dalam Sub Ginjal dan Hipertensi">Penyakit Dalam Sub Ginjal dan Hipertensi</option>
		    <option value="Dokter Umum">Dokter Umum</option>
		   <?php } elseif ($row['spesialis']=='Rehab Medik') { ?>
            <option value="Penyakit Dalam" >Penyakit Dalam</option>
            <option value="Jantung" >jantung</option>
            <option value="Anak" >Anak</option>
            <option value="Bedah Umum" >Bedah Umum</option>
            <option value="Bedah Tumor" >Bedah Tumor</option>
            <option value="Bedah Tulang" >Bedah Tulang</option>
			<option value="Kebidanan dan Kandungan">Kebidanan dan Kandungan</option>
		    <option value="Syaraf">Syaraf</option>
		    <option value="THT">THT</option>
		    <option value="Kulit">Kulit</option>
		    <option value="Mata">Mata</option>
		    <option value="Rehab Medik">Rehab Medik</option>
		    <option value="Penyakit Dalam Sub Ginjal dan Hipertensi">Penyakit Dalam Sub Ginjal dan Hipertensi</option>
		    <option value="Dokter Umum">Dokter Umum</option>
		   <?php } elseif ($row['spesialis']=='Penyakit Dalam Sub Ginjal dan Hipertensi') { ?>
            <option value="Penyakit Dalam" >Penyakit Dalam</option>
            <option value="Jantung" >jantung</option>
            <option value="Anak" >Anak</option>
            <option value="Bedah Umum" >Bedah Umum</option>
            <option value="Bedah Tumor" >Bedah Tumor</option>
            <option value="Bedah Tulang" >Bedah Tulang</option>
			<option value="Kebidanan dan Kandungan">Kebidanan dan Kandungan</option>
		    <option value="Syaraf">Syaraf</option>
		    <option value="THT">THT</option>
		    <option value="Kulit">Kulit</option>
		    <option value="Mata">Mata</option>
		    <option value="Rehab Medik">Rehab Medik</option>
		    <option value="Penyakit Dalam Sub Ginjal dan Hipertensi">Penyakit Dalam Sub Ginjal dan Hipertensi</option>
		    <option value="Dokter Umum">Dokter Umum</option>
		   <?php } elseif ($row['spesialis']=='Dokter Umum') { ?>
            <option value="Penyakit Dalam" >Penyakit Dalam</option>
            <option value="Jantung" >jantung</option>
            <option value="Anak" >Anak</option>
            <option value="Bedah Umum" >Bedah Umum</option>
            <option value="Bedah Tumor" >Bedah Tumor</option>
            <option value="Bedah Tulang" >Bedah Tulang</option>
			<option value="Kebidanan dan Kandungan">Kebidanan dan Kandungan</option>
		    <option value="Syaraf">Syaraf</option>
		    <option value="THT">THT</option>
		    <option value="Kulit">Kulit</option>
		    <option value="Mata">Mata</option>
		    <option value="Rehab Medik">Rehab Medik</option>
		    <option value="Penyakit Dalam Sub Ginjal dan Hipertensi">Penyakit Dalam Sub Ginjal dan Hipertensi</option>
		    <option value="Dokter Umum">Dokter Umum</option>
			
          <?php } ?>  
      </select>
     </div> 
     <div class="box-footer">
      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      <button name="batal" class="btn btn-danger">Batal</button>
     </div> 
      <!-- /.info-box-content -->
            
  </div>
</div>
  </form>        
        
</div>

<?php
}

?>
</div>
</section>