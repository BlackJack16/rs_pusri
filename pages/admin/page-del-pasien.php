<?php
  	include "dist/koneksi.php";

	  $idPasien=$_GET['id']; 
    $hapus =mysql_query("DELETE FROM pasien WHERE idPasien='$idPasien'")or die(mysql_error());
    if ($hapus){
      echo "<script>alert ('Data Berhasil Dihapus');</script>";
      echo "<meta http-equiv='refresh' content='0; url=?page=list-pasien'>";
    }else{
      echo "<script>alert ('Data Gagal Dihaupus');</script>";
    }



?>