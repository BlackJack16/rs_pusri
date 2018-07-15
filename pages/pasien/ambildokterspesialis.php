<?php
include "../../dist/koneksi.php"; 
// $idDokter = $_GET['idDokter'];
$NIK	=$_GET['NIK'];

// $cekNik=mysql_query("SELECT pasien.NIK FROM pasien where pasien.NIK = '$NIK' "); 
// $getData = mysql_fetch_array($cekNik);
$cekNIK = mysql_num_rows(mysql_query("SELECT * FROM Pasien WHERE NIK = '$NIK'"));
if(($cekNIK)==1){
echo '<label>Spesialis</label>
        <select onFocus="val()" onChange="val()" id="idDokter" class="form-control" >
                ';
                // <?php 
                  $getDokter=mysql_query("SELECT * FROM dokter GROUP BY spesialis");
                
                while ($row = mysql_fetch_array($getDokter))
                {
                    echo "<option value=".$row['idDokter'].">".$row['spesialis']."</option>";
                  }
        echo "</select>";
}
else {
  echo "<p> Anda belum terdaftar </br>
  Silahkan melakuakan pendaftaran melaui admin RS Pusri </p>";
}