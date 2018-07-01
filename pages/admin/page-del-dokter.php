<?php
  	include "dist/koneksi.php";

	  $idDokter=$_GET['id']; 
    $hapus =mysql_query("DELETE FROM dokter WHERE idDokter='$idDokter'")or die(mysql_error());
    if ($hapus){
      echo "<script>alert ('Data Berhasil Dihapus');</script>";
      echo "<meta http-equiv='refresh' content='0; url=?page=list-dokter'>";
    }else{
      echo "<script>alert ('Data Gagal Dihaupus');</script>";
    }



?>