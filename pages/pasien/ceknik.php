<?php 
	include "../../dist/koneksi.php";
	$ceknik=mysql_real_escape_string($_POST['jx']);
	$query=mysql_query("SELECT NIK from antrianPasien where NIK = '123456'")or die(mysql_error());
	$c=mysql_fetch_assoc($query);
	if ($c == true){
		echo 1;
	}else{
		echo 0;
	}
 ?>