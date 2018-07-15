<?php
include "../../dist/koneksi.php"; 
$idDokter = $_GET['idDokter'];
//$dokter= mysql_query("SELECT * FROM dokter inner JOIN jadwal on jadwal.idDokter = dokter.idDokter INNER join hari on jadwal.idHari = hari.idHari where hari.eng = (select DAYNAME(NOW())) and dokter.idDokter = '$idDokter'");
$dokter= mysql_query("SELECT * FROM dokter where dokter.idDokter = '$idDokter' ");
$getData = mysql_fetch_array($dokter);
$spesialis = $getData['spesialis'];

//$getAllSpesialis = mysql_query("SELECT * FROM dokter inner JOIN jadwal on jadwal.idDokter = dokter.idDokter INNER join hari on jadwal.idHari = hari.idHari where hari.eng = (select DAYNAME(NOW())) and spesialis = '$spesialis'");
$getAllSpesialis = mysql_query("SELECT * FROM dokter where spesialis = '$spesialis'");

echo '<div  class="form-group"> 
<label>Dokter</label>
<select name="idDokter" id="spesialis" class="form-control" required="">';

while ($row = mysql_fetch_array($getAllSpesialis)) {
  echo "<option value=".$row['idDokter'].">".$row['nama']."</option>";
}
// else {
//   echo "<option value=''>Tidak ada dokter pada hari ini</option>";
// }; ?>


 <input type="text" name="spesialis" value="<?php echo $spesialis; ?>" hidden>

</select>                   
    </div>
    <button id="btnSubmit" style="margin-bottom:10px;" class="btn btn-block btn-primary">Daftar Antrian</button>
