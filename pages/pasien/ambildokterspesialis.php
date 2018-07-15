<?php
include "../../dist/koneksi.php"; 
// $idDokter = $_GET['idDokter'];
$NIK	=$_GET['NIK'];

// $cekNik=mysql_query("SELECT pasien.NIK FROM pasien where pasien.NIK = '$NIK' "); 
// $getData = mysql_fetch_array($cekNik);
$cekNIK = mysql_num_rows(mysql_query("SELECT * FROM Pasien WHERE NIK = '$NIK'"));
if(($cekNIK)==1){

  $DataPasien = mysql_query("SELECT * FROM Pasien WHERE NIK = '$NIK'");
  while ($row = mysql_fetch_array($DataPasien)) {
    // echo '<p>Nama Pasien:  '.$row['nama'].'</p>';
    echo '
    <div class="form-group">
      <label for="exampleInputEmail1">Nama Pasien</label>
      <input class="form-control"  name="Nama" id="Nama" placeholder="'.$row['nama'].'" disabled>
    </div>';
  }
    

echo '<label>Pilih Spesialis</label>
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
  echo "<p> Anda belum terdaftar, </br>
  Anda harus datang kerumah sakit untuk melakukan pendaftaran secara offline.</p>";
}