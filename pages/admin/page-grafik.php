<section class="content-header">
   <h1><small></small></h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-th"></i>Grafik</a></li>
    </ol>
</section>

<section class="content">

 <!-- Bar chart -->
  <div class="box box-info">
    <div class="box-header with-border">
      <i class="fa fa-bar-chart-o"></i>

      <h3 class="box-title" align="center">LAPORAN KUNJUNGAN PASIEN PT. GRAHA PUSRI MEDIKA PERIODE JANUARI s/d DESEMBER 2018 </h3>

      <!-- <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div> -->
    </div>
    <div class="box-body">
      <div id="bar-chart" style="height: 300px;"></div>
    </div>
    <!-- /.box-body-->
  </div>

<script type="text/javascript">
  $(function () {

    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data : [['Jan', <?php
                include 'dist/koneksi.php'; 
                $query1=mysql_query('SELECT count(tglAntrian) as jumlah from antrianPasien where month(tglAntrian)=01 and year(tglAntrian)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                }
                ?>], 
              ['Feb', <?php
                include 'dist/koneksi.php'; 
                $query1=mysql_query('SELECT count(tglAntrian) as jumlah from antrianPasien where month(tglAntrian)=02 and year(tglAntrian)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                }
                ?>], 
              ['Mar', <?php
                include 'dist/koneksi.php'; 
                $query1=mysql_query('SELECT count(tglAntrian) as jumlah from antrianPasien where month(tglAntrian)=03 and year(tglAntrian)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                }
                ?>], 
              ['Apr', <?php
                include 'dist/koneksi.php'; 
                $query1=mysql_query('SELECT count(tglAntrian) as jumlah from antrianPasien where month(tglAntrian)=04 and year(tglAntrian)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                }
                ?>], 
              ['Mei', <?php
                include 'dist/koneksi.php'; 
                $query1=mysql_query('SELECT count(tglAntrian) as jumlah from antrianPasien where month(tglAntrian)=05 and year(tglAntrian)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                }
                ?>],
              ['Jun', <?php
                include 'dist/koneksi.php'; 
                $query1=mysql_query('SELECT count(tglAntrian) as jumlah from antrianPasien where month(tglAntrian)=06 and year(tglAntrian)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                }
                ?>],
              ['Jul', <?php
                include 'dist/koneksi.php'; 
                $query1=mysql_query('SELECT count(tglAntrian) as jumlah from antrianPasien where month(tglAntrian)=07 and year(tglAntrian)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                }
                ?>],
              ['Agu', <?php
                include 'dist/koneksi.php'; 
                $query1=mysql_query('SELECT count(tglAntrian) as jumlah from antrianPasien where month(tglAntrian)=08 and year(tglAntrian)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                }
                ?>],
              ['Sep', <?php
                include 'dist/koneksi.php'; 
                $query1=mysql_query('SELECT count(tglAntrian) as jumlah from antrianPasien where month(tglAntrian)=09 and year(tglAntrian)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                }
                ?>],
              ['Okt', <?php
                include 'dist/koneksi.php'; 
                $query1=mysql_query('SELECT count(tglAntrian) as jumlah from antrianPasien where month(tglAntrian)=10 and year(tglAntrian)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                }
                ?>],
              ['Nov', <?php
                include 'dist/koneksi.php'; 
                $query1=mysql_query('SELECT count(tglAntrian) as jumlah from antrianPasien where month(tglAntrian)=11 and year(tglAntrian)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                }
                ?>],        
              ['Des', <?php
                include 'dist/koneksi.php'; 
                $query1=mysql_query('SELECT count(tglAntrian) as jumlah from antrianPasien where month(tglAntrian)=12 and year(tglAntrian)=2018') or die (mysql_error());
                while ($rowj = mysql_fetch_array($query1)){
                  echo $rowj['jumlah'];
                }
                ?>]],
      color: '#3c8dbc'
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
        bars: {
          show    : true,
          barWidth: 0.5,
          align   : 'center'
        }
      },
      xaxis : {
        mode      : 'categories',
        tickLength: 0
      }
    })
    /* END BAR CHART */
  })
</script>
</section>


