<!-- <section class="content-header">
   <h1><small></small></h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Pendaftaran</a></li>
    </ol>
</section> -->
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
  <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Pendaftaran Pasien</a></li>

  <!-- <li><a data-toggle="tab" href="#menu2">Pasien Baru</a></li> -->
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3></h3>
    <p>*pendaftaran di lakukan 1 jam sebelum praktek dokter</p>
    <form role="form" action="home-pasien.php?page=act-pendaftaran-pasien-lama" method="POST" enctype="multipart/form-data">    
    <div class="form-group">
                  <label for="exampleInputEmail1">NIK</label>
                  <input class="form-control"  name="NIK" id="NIK" placeholder="Masukan No KTP" required="">
    </div>

    <div id="getdokter" class="form-group">
      
        
    </div>
    <div id="tampil">
    </div>

  
  </form>
  <button id="cekNIK" onclick="cekNik()" style="margin-bottom:10px;" class="btn btn-block btn-primary">Daftar Antrian</button>
      </div>
  <!-- <div id="menu2" class="tab-pane fade">
  <h3></h3>
  <div class="box box-primary">
          
   <form role="form" action="home-pasien.php?page=act-pendaftaran-pasien-baru" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Lengkap</label>
                  <input  class="form-control" name="nama" id="nama" placeholder="Masukan Nama" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">NIK</label>
                  <input type="number" class="form-control" name="NIK" id="NIK" placeholder="Masukan NIK" required>
                </div>

                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select name="jenisKelamin" class="form-control" required>
                    <option>Laki - laki</option>
                    <option>Perempuan</option>
                   
                  </select>
                </div>
                <div class="form-group">
                                <label>Tanggal Lahir</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="tglLahir" class="form-control pull-right" id="datepicker" required>
                </div>
               
              </div> 
              
              <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <input type="text" class="form-control" name="alamat" id="NIK" placeholder="Masukan Alamat" required>
                </div> 
                <div class="form-group">
                  <label for="exampleInputPassword1">Provinsi</label>
                  <input type="text" class="form-control" name="provinsi" id="NIK" placeholder="Masukan Provinsi" required>
                </div> <div class="form-group">
                  <label for="exampleInputPassword1">Kabupaten</label>
                  <input type="text" class="form-control" name="kabupaten" id="Kabupaten" placeholder="Masukan Kabupaten" required>
                </div> <div class="form-group">
                  <label for="exampleInputPassword1">Kecamatan</label>
                  <input type="text" class="form-control" name="kecamatan" id="Kecamatan" placeholder="Masukan Kecamatan" required>
                </div> <div class="form-group">
                  <label for="exampleInputPassword1">kelurahan</label>
                  <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Masukan kelurahan" required>
                </div> <div class="form-group">
                  <label for="exampleInputPassword1">Kode POS</label>
                  <input type="number" class="form-control" name="kodepos" id="KodePos" placeholder="Masukan Kode POS" max="999999" required>
                </div> <div class="form-group">
                  <label for="exampleInputPassword1">No telp</label>
                  <input type="text" class="form-control" name="notelp" id="telp" placeholder="Masukan No Telp" required>
                </div> <div class="form-group">
                  <label for="exampleInputPassword1">Pekerjaan</label>
                  <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Masukan pekerjaan" required>
                  <div class="form-group">
                  <label>Agama</label>
                  <select name="Agama" class="form-control">
                    <option>Islam</option>
                    <option>Kristen</option>
                    <option>Hindu</option>
                    <option>Budha</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Gol Darah</label>
                  <select name="golDarah" class="form-control">
                    <option>A</option>
                    <option>AB</option>
                    <option>B</option>
                    <option>O</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label>Spesialis</label>
                  <select onFocus="val2()" onChange="val2()" name="idDokter" id="idDokter2" class="form-control" >
                          <?php 
                            $getDokter=mysql_query("SELECT * FROM dokter GROUP BY spesialis");
                          
                          while ($row = mysql_fetch_array($getDokter))
                          {
                              echo "<option value=".$row['idDokter'].">".$row['spesialis']."</option>";
                          }
                          ?>     
                        </select>
                </div>
    
    <div id="tampil2">
    </div>
              <div class="box-footer">
                <button type="submit" name="save" value="save" class="btn btn-primary">Daftar Antrian</button>
              </div>
            </form>
            </div>
  </div>
</div>
</div> -->
  <script>
  function cekNik() {
    // cek = document.getElementById("btnSubmit");
      // cek.click(function(){
        // document.getElementById('btnSubmit').style.visibility = 'hidden';
        NIK = document.getElementById("NIK").value;
          //  NIK = "12345"             
                        $.ajax({
                          type:"GET",
                          url:"pages/pasien/ambildokterspesialis.php",
                          data:"NIK="+NIK,
                          success:function(html){
                            $("#getdokter").html(html);
                          }
                        });
                
  }
        function val() {
        document.getElementById('cekNIK').style.visibility = 'hidden';

                        idDokter = document.getElementById("idDokter").value;
                        
                        $.ajax({
                          type:"GET",
                          url:"pages/pasien/ambildokter.php",
                          data:"idDokter="+idDokter,
                          success:function(html){
                            $("#tampil").html(html);
                          }
                        });
                      };

                      function val2() {
                        idDokter = document.getElementById("idDokter2").value;
                        
                        $.ajax({
                          type:"GET",
                          url:"pages/pasien/ambildokter.php",
                          data:"idDokter="+idDokter,
                          success:function(html){
                            $("#tampil2").html(html);
                          }
                        });
                      }
    </script>

  
</section>