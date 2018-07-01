<?php
include "../../dist/koneksi.php"; 
$idDokter = $_GET['idDokter'];
$dokter= mysql_query("SELECT * FROM dokter where idDokter = '$idDokter'");
$getData = mysql_fetch_array($dokter);
$spesialis = $getData['spesialis'];

$getAllSpesialis = mysql_query("SELECT * FROM dokter where spesialis = '$spesialis'");
echo '<div  class="form-group"> 
<label>Dokter</label>
<select name="idDokter" id="spesialis" class="form-control" required="">';

while ($row = mysql_fetch_array($getAllSpesialis)) {
  echo "<option value=".$row['idDokter'].">".$row['nama']."</option>";
}; ?>

 <input type="text" name="spesialis" value="<?php echo $spesialis; ?>" hidden>

</select>                   
		</div>
