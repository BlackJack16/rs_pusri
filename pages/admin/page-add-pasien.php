<section class="content-header">
   <h1><small></small></h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-th"></i>Tambah Data Pasien</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
  <?php
  	include "dist/koneksi.php";

    if (isset($_POST['simpan'])) {
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

      $catat=mysql_query("INSERT into pasien (nama, NIK, JenisKelamin, tglLahir, alamat, provinsi, kabupaten, kecamatan, kelurahan, kodepos, notelp, pekerjaan, Agama, golDarah ) values ('$nama', '$nik', '$jk', '$tgl', '$alamat', '$provinsi', '$kabupaten', '$kecamatan', '$kelurahan', '$kodepos', '$notelp', '$pekerjaan', '$agama', '$goldarah')") or die (mysql_error());
        if ($catat) {
          echo "<script>alert ('Data Berhasil Disimpan');</script>";
          echo "<meta http-equiv='refresh' content='0; url=?page=list-pasien'>";
        }else{
          echo "<script>alert ('Data Gagal Disimpan');</script>";
        }
    } ?>
    
	<div class="col-lg-6 col-xs-12">
  <div class="box box-info">
  <div class="box-header"><h4 align="center">Form Tambah Data Pasien</h4></div>  
  <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" target="_self" enctype="multipart/form-data">
  <div class="box-body">  
    <div class="form-group">
      <label>Nama</label><input type="text" class="form-control" name="nama" required>
    </div>
    <div class="form-group">  
      <label>NIK</label><input type="text" class="form-control" name="NIK" required>
    </div>
    <div class="form-group">
      <label>Jenis Kelamin</label>
        <select name="JenisK" class="form-control" required>
          <option value="">--Pilih--</option>  
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
    </div>
    <div class="form-group">     
      <label>Tanggal Lahir</label><input type="date" class="form-control" name="tgllahir" required>
    </div>
    <div class="form-group">
      <label>Alamat</label><input type="text" class="form-control" name="alamat" required>
    </div>
    <div class="form-group">
      <label>Provinsi</label><input type="text" class="form-control" name="prov" required>
    </div>
    <div class="form-group">
      <label>Kabupaten</label><input type="text" class="form-control" name="kab" required>
    </div>
    <div class="form-group">
      <label>Kecamatan</label><input type="text" class="form-control" name="kec" required>
    </div>
    <div class="form-group">
      <label>Kelurahan</label><input type="text" class="form-control" name="kel" required>
    </div>
    <div class="form-group">
      <label>Kode Pos</label><input type="text" class="form-control" name="kp" required>
    </div>
    <div class="form-group">
      <label>No. Telp</label><input type="text" class="form-control" name="nt" required>
    </div>
    <div class="form-group">
      <label>Pekerjaan</label><input type="text" class="form-control" name="pkj" required>
    </div>
    <div class="form-group">  
      <label>Agama</label>
        <select name="agm" class="form-control" required>
          <option value="">--Pilih--</option> 
          <option value="Islam">Islam</option>
          <option value="Katolik">Katolik</option>
          <option value="Budha">Budha</option>
          <option value="Hindu">Hindu</option>
          <option value="Protestan">Protestan</option>
        </select>
      <label>Golongan Darah</label>
        <select name="goldar" required>
          <option value="">--Pilih--</option> 
          <option value="O">O</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="AB">AB</option>
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