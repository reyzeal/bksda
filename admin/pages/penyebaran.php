<?php
require_once 'konfigurasi/koneksi.php';
require_once 'konfigurasi/DB.php';
$query = "SELECT lokasi,ow.latitude,ow.longitude,sum(detail_obyek_wisata.jumlah_fauna) as jumlah FROM detail_obyek_wisata 
          INNER JOIN fauna ON id_fauna=fauna.id
          INNER JOIN obyek_wisata ow on detail_obyek_wisata.id_wisata = ow.id
          GROUP BY lokasi";
$data = $DATABASE->select($query);
$query = "SELECT DISTINCT(fauna.nama_fauna), fauna.id FROM penyebaran INNER JOIN fauna ON fauna.id = penyebaran.id_fauna";
$res = mysqli_query($con, $query);

$query_fauna ="SELECT fauna.id, fauna.nama_fauna FROM fauna";
$res_fauna = mysqli_query($con, $query_fauna);

// $query_fauna2 ="SELECT fauna.id, fauna.nama_fauna FROM fauna";
// $res_fauna2 = mysqli_query($con, $query_fauna2);

$no = 1;
?>
<div id="page-wrapper">
	<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Penyebaran Fauna</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
<!--          <button class="btn btn-primary" id="tambah-penyebaran"><span class="fa fa-plus"></span> Tambah Penyebaran</button><br><br>-->
					<a class="btn btn-primary" id="tambah-area_konservasi" href="index.php?page=kematian_penyebaran"><span class="fa fa-minus"></span> Data Kematian </a>
					<a class="btn btn-primary" id="tambah-area_konservasi" href="index.php?page=penambahan_penyebaran"><span class="fa fa-plus"></span> Data Penambahan </a>
					<a class="btn btn-primary" id="tambah-area_konservasi" href="laporan/cetakallarea.php"><span class="fa fa-print"></span> Cetak Data Penyebaran </a>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div id="map_canvas" class="w-100" style="height: 400px"></div>
        </div>
     <!-- /.panel-body -->
   </div>
   <!-- /.panel -->
 </div>
 <!-- /.col-lg-12 -->
</div>
</div>

<script>
  var map;
  var marker;

  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -7.747270, lng: 110.355382},
      zoom: 12
    });
    google.maps.event.addListener(map,'center_changed', function() {
      document.getElementById('latitude').value = map.getCenter().lat();
      document.getElementById('longitude').value = map.getCenter().lng();
    });
    $('<div/>').addClass('centerMarker').appendTo(map.getDiv())
             //do something onclick
             .click(function(){
              var that=$(this);
              if(!that.data('win')){
                // that.data('win',new google.maps.InfoWindow({content:'this is the center'}));
                that.data('win').bindTo('position',map,'center');
              }
              that.data('win').open(map);
            });

           }
         </script>
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuqp6YJymNF8Et7Xvd6SO3sBYqu2Bkc88"></script>
         <script src="/admin/js/stylemarker.js"></script>
       </div>
     </div>
   </div>
 </div>

 <script>
  $(document).ready(function() {
      function initialize() {
          var myLatlng = new google.maps.LatLng(-7.747270, 110.355382);
          var myOptions = {
              zoom: 12,
              center: myLatlng,
              mapTypeId: google.maps.MapTypeId.ROADMAP
          }
          var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
          // Data dari Database -> js marker
          <?php
            $i=0;
            foreach ($data as $marker) {
                  echo "var pos = new google.maps.LatLng($marker->latitude,$marker->longitude);";
                  echo "var marker$i = new google.maps.Marker({
                          position: pos,
                          map: map,
                          label : {text:'$marker->jumlah',fontFamily:'serif',color:'white',fontSize:'14px',align:'center',width:'60px'},
                      });";
                  echo "google.maps.event.addListener(marker$i, 'mouseover', function() {
                            var label = this.getLabel();
                            label.color = '#34495e';
                            marker$i.setLabel(label);
                        });";
                    echo "google.maps.event.addListener(marker$i, 'mouseout', function() {
                                var label = this.getLabel();
                                label.color = 'white';
                                marker$i.setLabel(label);
                            });";

                $i++;
                  //http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=$marker->jumlah|E74C3C|000000
              }?>

      }
      initialize();
    });
    </script>
