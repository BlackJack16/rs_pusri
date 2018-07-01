<?php
include "../../dist/koneksi.php";
$idAntrian = $_POST['id'];
// $barang= mysql_query("SELECT jumlah FROM tb_gudang where id_barang = '$id_barang'");

$sql = mysql_query("UPDATE antrianPasien set status=1 where idAntrian = '$idAntrian'");
?>