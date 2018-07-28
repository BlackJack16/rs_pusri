<?php
include "../../dist/koneksi.php"; 
$idDokter = $_GET['idDokter'];
//$dokter= mysql_query("SELECT * FROM dokter inner JOIN jadwal on jadwal.idDokter = dokter.idDokter INNER join hari on jadwal.idHari = hari.idHari where hari.eng = (select DAYNAME(NOW())) and dokter.idDokter = '$idDokter'");
$dokter= mysql_query("SELECT * FROM dokter where dokter.idDokter = '$idDokter' ");
$getData = mysql_fetch_array($dokter);
$spesialis = $getData['spesialis'];

// $getSpesialis = mysql_query("SELECT * FROM dokter inner JOIN jadwal on jadwal.idDokter = dokter.idDokter INNER join hari on jadwal.idHari = hari.idHari where hari.eng = (select DAYNAME(NOW())) and spesialis = '$spesialis'");
$getSpesialis = mysql_query("SELECT * FROM dokter inner JOIN jadwal on jadwal.idDokter = dokter.idDokter INNER join hari on jadwal.idHari = hari.idHari where hari.eng = (select DAYNAME(NOW())) and spesialis = '$spesialis' and date_sub(time(jadwal.jam), INTERVAL 1 HOUR) >= (select time(NOW()))");
// $getAllSpesialis = mysql_query("SELECT * FROM dokter where spesialis = '$spesialis'");
// $getAllSpesialis = mysql_num_rows(mysql_query("SELECT * FROM dokter inner JOIN jadwal on jadwal.idDokter = dokter.idDokter INNER join hari on jadwal.idHari = hari.idHari where hari.eng = (select DAYNAME(NOW())) and spesialis = '$spesialis'"));
$getAllSpesialis = mysql_num_rows(mysql_query("SELECT * FROM dokter inner JOIN jadwal on jadwal.idDokter = dokter.idDokter INNER join hari on jadwal.idHari = hari.idHari where hari.eng = (select DAYNAME(NOW())) and spesialis = '$spesialis' and date_sub(time(jadwal.jam), INTERVAL 1 HOUR) >= (select time(NOW()))"));
// select * FROM dokter inner JOIN jadwal on jadwal.idDokter = dokter.idDokter INNER join hari on jadwal.idHari = hari.idHari where hari.eng = (select DAYNAME(NOW())) and spesialis = "THT" and jadwal.jam >= (select time(NOW()))

if(($getAllSpesialis)==1){
echo '<div  class="form-group"> 
<label>Dokter</label>
<select name="idDokter" id="spesialis" class="form-control" required>';

while ($row = mysql_fetch_array($getSpesialis)) {
  echo "<option value=".$row['idDokter'].">".$row['nama']."</option>";
}

echo '<input type="text" name="spesialis" value="'.$spesialis.'" hidden>
</select>                   
</div>
<button id="btnSubmit" style="margin-bottom:10px;" class="btn btn-block btn-primary">Daftar Antrian</button>';

}
else {
  echo '
  <div class="form-group">
    <input class="form-control"  name="Nama" id="Nama" placeholder="Tidak ada dokter hari ini" disabled>
  </div>';
  // echo "<option disabled>Tidak ada dokter hari ini</option>";

}
?>
