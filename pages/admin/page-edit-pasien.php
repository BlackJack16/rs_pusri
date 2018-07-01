<section class="content-header">
   <h1><small></small></h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-th"></i>Edit Data Pasien</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
  <?php
  	include "dist/koneksi.php";

    if (isset($_POST['simpan'])) {
      $id=$_POST['id'];
      $tgl = $_POST['tgllahir'];
      $nama= $_POST['nama'];
      $jk =$_POST['JenisK'];
      $nik = $_POST['NIK'];
      $alamat = $_POST['alamat'];
      $provinsi = $_POST['prov'];
      $kabupaten = $_POST['kab'];
      $kecamatan = $_POST['kec'];
      $kelurahan = $_POST['kel'];
      $kodepos = $_POST['kp'];
      $notelp = $_POST['nt'];
      $pekerjaan = $_POST['pkj'];
      $agama  = $_POST['agm'];
      $goldarah = $_POST['goldar'];

      $catat=mysql_query("UPDATE pasien SET nama='$nama', NIK='$nik', jenisKelamin='$jk', tglLahir=CURRENT_DATE(), alamat='$alamat', provinsi='$provinsi', kabupaten='$kabupaten', kecamatan='$kecamatan', kelurahan='$kelurahan', kodepos='$kodepos', notelp='$notelp', pekerjaan='$pekerjaan', agama='$agama', golDarah='$goldarah' where idPasien='$id'") or die (mysql_error());
        if ($catat) {
          echo "<script>alert ('Data Berhasil Diubah');</script>";
          echo "<meta http-equiv='refresh' content='0; url=?page=list-pasien'>";
        }else{
          echo "<script>alert ('Data Gagal Diubah');</script>";
        }
    }


	 $idpasien=$_GET['id']; 
    $DataDokter =mysql_query("SELECT * FROM pasien where idPasien='$idpasien'") or die (mysql_error());
    while ($row = mysql_fetch_array($DataDokter)) { ?>
    
	<div class="col-lg-6 col-xs-12">
  <div class="box box-info">
  <div class="box-header"><h4 align="center">Form Edit Data Pasien</h4></div>    
  <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" target="_self" enctype="multipart/form-data">
     <!--  <input type="text" class="info-box-icon bg-aqua" value="<?php echo $row['noAntrian'];?>">
      <div class="info-box-content">
        <span class="info-box-number"><input type="text" name="id" value="<?php echo $row['idAntrian'];?>">id</span>
        <span class="info-box-number"><input type="date" name="tgl" value="<?php echo $row['tglAntrian'];?>"></span>
        <span class="info-box-number"><input type="text" name="nama" value="<?php echo $row['nama'];?>"></span>
        <span class="info-box-number"><input type="text" name="NIK" value="<?php echo $row['NIK'];?>"></span>
      </div> -->
  <div class="box-body">    
    <div  class="form-group" hidden="">    
      <label>id</label><input type="text" class="form-control" name="id"value="<?php echo $row['idPasien'];?>">
    </div> 
    <div class="form-group"> 
      <label>Nama</label><input type="text" class="form-control" name="nama"value="<?php echo $row['nama'];?>">
    </div>
    <div class="form-group">  
      <label>NIK</label><input type="text" class="form-control" name="NIK" value="<?php echo $row['NIK'];?>">
    </div>
    <div class="form-group">
      <label>Jenis Kelamin</label>
        <select name="JenisK" class="form-control">
          <?php if ($row['status']=='Laki-laki') { ?>
            <option value="Laki-laki" selected>Laki-laki</option>
            <option value="Perempuan">Perempuan</option> 
           <?php } elseif ($row['status']=='Perempuan') { ?>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan" selected>Perempuan</option> 
           <?php } elseif ($row['status']=='') { ?>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          <?php } ?>
        </select> 
    </div>          
        <!-- </select><input type="text" name="JenisK" value="<?php echo $row['JenisKelamin'];?>"> -->
    <div class="form-group">    
      <label>Tanggal Lahir</label><input type="date" class="form-control" name="tgllahir" value="<?php echo $row['tglLahir'];?>">
    </div>
    <div class="form-group">
      <label>Alamat</label><input type="text" class="form-control" name="alamat" value="<?php echo $row['alamat'];?>">
    </div>
    <div class="form-group">
      <label>Provinsi</label><input type="text" class="form-control" name="prov" value="<?php echo $row['provinsi'];?>">
    </div>
    <div class="form-group">
      <label>Kabupaten</label><input type="text" class="form-control" name="kab" value="<?php echo $row['kabupaten'];?>">
    </div>
    <div class="form-group">
      <label>Kecamatan</label><input type="text" class="form-control" name="kec" value="<?php echo $row['kecamatan'];?>">
    </div>
    <div class="form-group">
      <label>Kelurahan</label><input type="text" name="kel" value="<?php echo $row['kelurahan'];?>" class="form-control">
    </div>
    <div class="form-group">
      <label>Kode Pos</label><input type="text" class="form-control" name="kp" value="<?php echo $row['kodepos'];?>">
    </div>
    <div class="form-group">
      <label>No. Telp</label><input type="text" class="form-control" name="nt" value="<?php echo $row['notelp'];?>">
    </div>
    <div class="form-group">
      <label>Pekerjaan</label><input type="text" class="form-control" name="pkj" value="<?php echo $row['pekerjaan'];?>">
    </div>
    <div class="form-group">
      <label>Agama</label>
        <select name="agm" class="form-control">
          <?php if ($row['agama']=='Islam') { ?>
            <option value="Islam" selected>Islam</option>
            <option value="Katolik">Katolik</option>
            <option value="Budha">Budha</option>
            <option value="Hindu">Hindu</option>
            <option value="Protestan">Protestan</option>
          <?php } elseif ($row['agama']=='Katolik') { ?>
            <option value="Islam">Islam</option>
            <option value="Katolik" selected>Katolik</option>
            <option value="Budha">Budha</option>
            <option value="Hindu">Hindu</option>
            <option value="Protestan">Protestan</option>
          <?php } elseif ($row['agama']=='Budha') { ?>  
            <option value="Islam">Islam</option>
            <option value="Katolik">Katolik</option>
            <option value="Budha" selected>Budha</option>
            <option value="Hindu">Hindu</option>
            <option value="Protestan">Protestan</option>
          <?php } elseif($row['agama']=='Hindu') { ?>
            <option value="Islam">Islam</option>
            <option value="Katolik">Katolik</option>
            <option value="Budha">Budha</option>
            <option value="Hindu" selected>Hindu</option>
            <option value="Protestan">Protestan</option> 
          <?php } elseif ($row['agam']=='Protestan') { ?>
            <option value="Islam">Islam</option>
            <option value="Katolik">Katolik</option>
            <option value="Budha">Budha</option>
            <option value="Hindu">Hindu</option>
            <option value="Protestan" selected>Protestan</option>  
          <?php } elseif ($row['agama']=='') { ?>   
            <option value="Islam">Islam</option>
            <option value="Katolik">Katolik</option>
            <option value="Budha">Budha</option>
            <option value="Hindu">Hindu</option>
            <option value="Protestan">Protestan</option>
          <?php } ?>  
        </select>
      </div>
      <div class="form-group">  
        <label>Golongan Darah</label>
          <select name="goldar" class="form-control">
            <?php if ($row['goldarah']=='O') { ?>
              <option value="O" selected>O</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="AB">AB</option>
            <?php } elseif ($row['goldarah']=='A') { ?>  
              <option value="O">O</option>
              <option value="A" selected>A</option>
              <option value="B">B</option>
              <option value="AB">AB</option>
            <?php } elseif ($row['goldarah']=='B') { ?>
              <option value="O">O</option>
              <option value="A">A</option>
              <option value="B" selected>B</option>
              <option value="AB">AB</option>
            <?php } elseif ($row['goldarah']=='AB') { ?>
              <option value="O">O</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="AB" selected>AB</option> 
            <?php } elseif ($row['goldarah']=='') ?> 
              <option value="O">O</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="AB">AB</option>   
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