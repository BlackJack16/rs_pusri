<section class="content-header">
   <h1><small></small></h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-th"></i>Edit Jadwal</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
  <?php
  	include "dist/koneksi.php";

    if (isset($_POST['simpan'])) {
      $id=$_POST['id'];
      $hari= $_POST['hari'];
      $jam =$_POST['jam'];
      $dokter =$_POST['dok'];
      $kamar =$_POST['kamar'];

      $catat=mysql_query("UPDATE jadwal SET idHari='$hari', jam='$jam', idDokter='$dokter', kamar='$kamar' where idJadwal='$id'") or die (mysql_error());
        if ($catat) {
          echo "<script>alert ('Data Berhasil Diubah');</script>";
          echo "<meta http-equiv='refresh' content='0; url=?page=list-jadwal'>";
        }else{
          echo "<script>alert ('Data Gagal Diubah');</script>";
        }
    }


	 $idJadwal=$_GET['id']; 
    $DataJadwal =mysql_query("SELECT * FROM jadwal inner join hari on hari.idHari=jadwal.idHari
    inner join dokter on dokter.idDokter=jadwal.idDokter where idJadwal='$idJadwal'") or die (mysql_error());
    while ($row1 = mysql_fetch_array($DataJadwal)) { ?>
    
	<div class="col-lg-6 col-xs-12">
  <div class="box box-info">
  <div class="box-header"><h4 align="center">Form Edit Jadwal</h4></div>  
  <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" target="_self" enctype="multipart/form-data">
    <div class="box-body">
      <div class="form-group" hidden="">
        <label>id</label><input type="text" class="form-control" name="id"value="<?php echo $row1['idJadwal'];?>"> 
      </div>
      <div class="form-group">  
       <label>Hari</label>
        <select name="hari" class="form-control">
          <?php $jhari=mysql_query("SELECT count(idHari) as jumlah FROM hari")or die (mysql_error());
                $hari=mysql_query("SELECT * FROM hari")or die (mysql_error());  

              while ($row = mysql_fetch_array($jhari)) { 
                for ($i=1; $i <= $row['jumlah'] ; $i++) {
                  while ($rows = mysql_fetch_array($hari)) {
                  if ($row1['idHari']==$rows['idHari']) { ?>
                  <option value="<?php echo $row1['idHari']; ?>" selected><?php echo $row1['NamaHari']; ?> -</option>
                  <?php  }
                     // for ($i=1; $i <= $row['jumlah'] ; $i++) { ?>    
                    <option value="<?php echo $rows['idHari']; ?>"><?php echo $rows['NamaHari']; ?></option>
              <?php  }
                  }
              
              
              } ?>
        </select>
      </div>
      <div class="form-group">    
        <label>Dokter</label>
          <select name="dok" class="form-control">
            <option value="">--Pilih--</option>
            <?php $jdokter=mysql_query("SELECT count(idDokter) as jumlah FROM dokter")or die (mysql_error());
                  $dokter=mysql_query("SELECT * FROM dokter")or die (mysql_error());  

                while ($row = mysql_fetch_array($jdokter)) { 
                  
              for ($i=1; $i <= $row['jumlah'] ; $i++) { 
                while ($rows = mysql_fetch_array($dokter)) {
                  if ($row1['idDokter']==$rows['idDokter']) { ?>
                <option value="<?php echo $row1['idDokter']; ?>" selected><?php echo $row1['nama']; ?> -</option>
                <?php  }  
                ?>

                <option value="<?php echo $rows['idDokter']; ?>"><?php echo $rows['nama']; ?></option>
            <?php  } }
               
            
             } ?>
          </select>
        </div>
        <div class="form-group">  
          <label>Jam</label><input type="time" class="form-control" name="jam" value="<?php echo $row1['jam']; ?>">
        </div>
        <div class="form-group">  
          <label>Kamar</label>
            <select name="kamar" class="form-control">
              <?php if ($row1['kamar']=='Kamar Penyakit Dalam') { ?>
              <option value="Kamar Penyakit Dalam" selected>Kamar Penyakit Dalam</option>
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
			  <option value="Kamar Penyakit Dalam Sub Ginjal dan Hipertensi">Kamar Penyakit Dalam Sub Ginjal dan Hipertensi</option>
			  <option value="Kamar Dokter Umum">Kamar Dokter Umum</option>
              <?php } elseif ($row1['kamar']=='Kamar Jantung') { ?>
              <option value="Kamar Penyakit Dalam" selected>Kamar Penyakit Dalam</option>
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
			  <option value="Kamar Penyakit Dalam Sub Ginjal dan Hipertensi">Kamar Penyakit Dalam Sub Ginjal dan Hipertensi</option>
			  <option value="Kamar Dokter Umum">Kamar Dokter Umum</option>
              <?php } elseif ($row1['kamar']=='Kamar Anak') { ?>
              <option value="Kamar Penyakit Dalam" selected>Kamar Penyakit Dalam</option>
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
			  <option value="Kamar Penyakit Dalam Sub Ginjal dan Hipertensi">Kamar Penyakit Dalam Sub Ginjal dan Hipertensi</option>
			  <option value="Kamar Dokter Umum">Kamar Dokter Umum</option>
			  <?php } elseif ($row1['kamar']=='Kamar Bedah Umum') { ?>
              <option value="Kamar Penyakit Dalam" selected>Kamar Penyakit Dalam</option>
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
			  <option value="Kamar Penyakit Dalam Sub Ginjal dan Hipertensi">Kamar Penyakit Dalam Sub Ginjal dan Hipertensi</option>
			  <option value="Kamar Dokter Umum">Kamar Dokter Umum</option>
			  <?php } elseif ($row1['kamar']=='Kamar Bedah Tumor') { ?>
              <option value="Kamar Penyakit Dalam" selected>Kamar Penyakit Dalam</option>
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
			  <option value="Kamar Penyakit Dalam Sub Ginjal dan Hipertensi">Kamar Penyakit Dalam Sub Ginjal dan Hipertensi</option>
			  <option value="Kamar Dokter Umum">Kamar Dokter Umum</option>
			   <?php } elseif ($row1['kamar']=='Kamar Bedah Tulang') { ?>
              <option value="Kamar Penyakit Dalam" selected>Kamar Penyakit Dalam</option>
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
			  <option value="Kamar Penyakit Dalam Sub Ginjal dan Hipertensi">Kamar Penyakit Dalam Sub Ginjal dan Hipertensi</option>
			  <option value="Kamar Dokter Umum">Kamar Dokter Umum</option>
			   <?php } elseif ($row1['kamar']=='Kamar Kebidanan dan Kandungan') { ?>
              <option value="Kamar Penyakit Dalam" selected>Kamar Penyakit Dalam</option>
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
			  <option value="Kamar Penyakit Dalam Sub Ginjal dan Hipertensi">Kamar Penyakit Dalam Sub Ginjal dan Hipertensi</option>
			  <option value="Kamar Dokter Umum">Kamar Dokter Umum</option>
			   <?php } elseif ($row1['kamar']=='Kamar Syaraf') { ?>
              <option value="Kamar Penyakit Dalam" selected>Kamar Penyakit Dalam</option>
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
			  <option value="Kamar Penyakit Dalam Sub Ginjal dan Hipertensi">Kamar Penyakit Dalam Sub Ginjal dan Hipertensi</option>
			  <option value="Kamar Dokter Umum">Kamar Dokter Umum</option>
			   <?php } elseif ($row1['kamar']=='Kamar THT') { ?>
              <option value="Kamar Penyakit Dalam" selected>Kamar Penyakit Dalam</option>
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
			  <option value="Kamar Penyakit Dalam Sub Ginjal dan Hipertensi">Kamar Penyakit Dalam Sub Ginjal dan Hipertensi</option>
			  <option value="Kamar Dokter Umum">Kamar Dokter Umum</option>
			   <?php } elseif ($row1['kamar']=='Kamar Kulit') { ?>
              <option value="Kamar Penyakit Dalam" selected>Kamar Penyakit Dalam</option>
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
			  <option value="Kamar Penyakit Dalam Sub Ginjal dan Hipertensi">Kamar Penyakit Dalam Sub Ginjal dan Hipertensi</option>
			  <option value="Kamar Dokter Umum">Kamar Dokter Umum</option>
			   <?php } elseif ($row1['kamar']=='Kamar Mata') { ?>
              <option value="Kamar Penyakit Dalam" selected>Kamar Penyakit Dalam</option>
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
			  <option value="Kamar Penyakit Dalam Sub Ginjal dan Hipertensi">Kamar Penyakit Dalam Sub Ginjal dan Hipertensi</option>
			  <option value="Kamar Dokter Umum">Kamar Dokter Umum</option>
			   <?php } elseif ($row1['kamar']=='Kamar Rehab Medik') { ?>
              <option value="Kamar Penyakit Dalam" selected>Kamar Penyakit Dalam</option>
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
			  <option value="Kamar Penyakit Dalam Sub Ginjal dan Hipertensi">Kamar Penyakit Dalam Sub Ginjal dan Hipertensi</option>
			  <option value="Kamar Dokter Umum">Kamar Dokter Umum</option>
			   <?php } elseif ($row1['kamar']=='Kamar Penyakit Dalam Sub Ginjal dan Hipertensi') { ?>
              <option value="Kamar Penyakit Dalam" selected>Kamar Penyakit Dalam</option>
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
			  <option value="Kamar Penyakit Dalam Sub Ginjal dan Hipertensi">Kamar Penyakit Dalam Sub Ginjal dan Hipertensi</option>
			  <option value="Kamar Dokter Umum">Kamar Dokter Umum</option>
			   <?php } elseif ($row1['kamar']=='Kamar Dokter Umum') { ?>
              <option value="Kamar Penyakit Dalam" selected>Kamar Penyakit Dalam</option>
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
			  <option value="Kamar Penyakit Dalam Sub Ginjal dan Hipertensi">Kamar Penyakit Dalam Sub Ginjal dan Hipertensi</option>
			  <option value="Kamar Dokter Umum">Kamar Dokter Umum</option>
              <?php } ?>   
            </select>
        </div> 
        <div class="box-footer">   
          <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
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