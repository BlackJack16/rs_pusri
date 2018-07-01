<?php
  	include "dist/koneksi.php";

	  $idJadwal=$_GET['id']; 
    $hapus =mysql_query("DELETE FROM jadwal WHERE idJadwal='$idJadwal'")or die(mysql_error());
    if ($hapus){
      echo "<script>alert ('Data Berhasil Dihapus');</script>";
      echo "<meta http-equiv='refresh' content='0; url=?page=list-jadwal'>";
    }else{
      echo "<script>alert ('Data Gagal Dihaupus');</script>";
    }



?>