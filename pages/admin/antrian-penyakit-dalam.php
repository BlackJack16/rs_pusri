<section class="content-header">
   <h1><small></small></h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-th"></i>Antrian Penyakit Dalam</a></li>
    </ol>
</section>
<?php
	include "dist/koneksi.php";
	
	$DataAntrian =mysql_query("SELECT * FROM `antrianPasien` inner join pasien on antrianPasien.NIK=pasien.NIK inner join dokter on antrianPasien.idDokter=dokter.idDokter WHERE status = 0 and tglAntrian = CURDATE() and dokter.spesialis='Penyakit Dalam' order by antrianPasien.noAntrian asc limit 1");
	
	if(mysql_num_rows($DataAntrian)>=1){
		$antrianNow = mysql_fetch_array($DataAntrian);
		$noAntrian = $antrianNow['noAntrian'];
		$idAntrian = $antrianNow['idAntrian'];
	}
	else{
		$noAntrian = 'Tidak Ada Antrian';
	}

	$DataAntrianAll =mysql_query("SELECT * FROM `antrianPasien` inner join pasien on antrianPasien.NIK=pasien.NIK inner join dokter on antrianPasien.idDokter=dokter.idDokter WHERE tglAntrian = CURDATE() and status=0 and dokter.spesialis='Penyakit Dalam'");
	$totalAntrian = mysql_num_rows($DataAntrianAll);
	
?>
<section class="content">
    <div class="row">
	
  	<div class="col-lg-6 col-xs-12">
			<div class="small-box bg-aqua">
				<div class="inner">
					<p>No Antrian Sekarang</p>
					<?php 
          if ((int)$noAntrian>10) {
            echo "<h3>".$noAntrian."</h3>";
          }
          else {
            echo "<h3>0".$noAntrian."</h3>";
          }
          ?>
				</div>
			  <div class="icon">
					<i class="ion ion-clipboard"></i>
		    </div>
				<p class="small-box-footer">Total antrian <?=$totalAntrian?></p>
				
			</div>
			
    </div>
		<div class="col-lg-12 col-xs-12">
			<div class="small-box">
				<div class="inner">
		<button id="lanjut" style="display:none;" class="btn btn-app" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-play"></i> Selanjutnya
      </button>
      <button id="baru" style="display:none;" class="btn btn-app" data-toggle="modal" data-target="#ModalBaru">
                <i class="fa fa-pause"></i> Antrian baru
      </button>
	</div>
	</div>
	</div>
	
<!-- Modal -->
<div class="modal modal-info fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Selanjutnya</h4>
      </div> -->
      <div class="modal-body">
        Anda ingin melanjutkan ke antrian selanjutnya?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="myButton btn btn-primary " value="<?php echo $idAntrian; ?>">Lanjutkan</button>
      </div>
    </div>
  </div>
</div>
<div class="col-lg-12 col-xs-12">
<p>Antrian Selanjutnya</p>
</div>
<?php
 $DataDokter =mysql_query("SELECT antrianPasien.noAntrian, pasien.NIK, pasien.nama as nama_pasien, dokter.nama as nama_dokter, dokter.spesialis FROM `antrianPasien` INNER JOIN pasien on pasien.NIK = antrianPasien.NIK inner join dokter on antrianPasien.idDokter=dokter.idDokter WHERE tglAntrian = CURDATE() and status= 0 and dokter.spesialis='Penyakit Dalam' order by antrianPasien.noAntrian asc limit 1,99");
 while ($row = mysql_fetch_array($DataDokter)){
  if ($row['noAntrian']<10){
    $noSaya = "0".$row['noAntrian'];
  }
  else {
    $noSaya = $row['noAntrian'];
  }
   echo 
'<div class="col-lg-12 col-xs-12">
   
   <div class="info-box">
            <span class="info-box-icon bg-aqua">'.$noSaya.'</span>

            <div class="info-box-content">
              <span class="info-box-text">'.$row['nama_pasien'].'</span>
              <span class="info-box-text">'.$row['nama_dokter'].'</span>
              <span class="info-box-text">'.$row['spesialis'].'</span>
              <span class="info-box-number">'.$row['NIK'].'</span>
            </div>
            <!-- /.info-box-content -->
          </div>
</div>
';
}

?>

<script>
    $(".myButton").click(function () {
        var idAntrian = $(this).val();
        $.ajax({
            type:"POST",
            url:"pages/admin/update-antrian.php",
            data:{ id: idAntrian },
            success:function () {
                window.location.reload(true);
            }

        });
    });
// // updateAntrian÷();
showDivAttid();

function showDivAttid(){
var total = '<?php echo $totalAntrian; ?>';
        if(total==0) {

            document.getElementById("lanjut").style.display = 'none';
            document.getElementById("baru").style.display = 'none';
            
        }
        else
        {
            document.getElementById("lanjut").style.display = 'inline';
            document.getElementById("baru").style.display = 'none';
        }
    }
function updateAntrian(){
}
</script>


</div>
</section>

