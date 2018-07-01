<section class="content-header">
   <h1><small></small></h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Tentang Kami</a></li>
    </ol>
</section>
<?php
  include "dist/koneksi.php";
  
  $DataAntrian =mysql_query("SELECT * FROM `antrianPasien` WHERE status = 0 and tglAntrian = CURDATE()  limit 1");
  
  if(mysql_num_rows($DataAntrian)>=1){
    $antrianNow = mysql_fetch_array($DataAntrian);
    $noAntrian = $antrianNow['noAntrian'];
    $idAntrian = $antrianNow['idAntrian'];
  }
  else{
    $noAntrian = 'Tidak Ada Antrian';
  }

  $DataAntrianAll =mysql_query("SELECT * FROM `antrianPasien` WHERE tglAntrian = CURDATE()");
  $totalAntrian = mysql_num_rows($DataAntrianAll);
  
?>
<section class="content">
    <div class="row">
    <div class="col-lg-6 col-xs-12">

    <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-white">
              <!-- <h3 class="widget-user-username">Selamat Datang</h3> -->
              <!-- <h5 class="widget-user-desc">Web Designer</h5> -->
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="dist/img/profile/icon-pusri.png" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
        <span class="description-text"><center><h3>RS PUSRI</h3></center></span>
                    <br/>
        <span class="description-text"><strong>Visi:</strong><br>Mewujudkan rumah sakit pusri menjadi pilihan utama untuk masyarakat palembang dan sekitarnya.</span>
                    <br/><br>
          <span class="description-text"><strong>Misi:</strong><br><ol ><li>Memberikan pelayanan kesehatan rumah sakit kepada karyawan,pensiunan keluar PT Pusri dan anak perusahaannya serta masyarakat umum.</li>
        <li>Menyelenggarakan pelayanan masyarakat rumah sakit secara profesional dan bermutu.</li>
        <li>Melakukan pengolahan rumah sakit secara efektif dan efesien dengan tetap memperhatikan fungsi sosial</li>
        <li>Melaksanakan kerjasama sinergk dengan instalasi/ pihak lain secara harmonis dan berkesinambungan.</li>
        <li>Meningkatkan profitabilitas perusahaan untuk semakin tumbuh dan berkembangnya Rumah Sakit Pusri.</li></ol>
        </span>
                    <br/>
              </div>
              <!-- /.row -->
            </div>
          </div>
</div>
    



</div>
</section>