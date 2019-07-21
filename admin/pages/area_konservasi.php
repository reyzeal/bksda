<?php
require_once 'konfigurasi/koneksi.php';

$query = "SELECT * FROM obyek_wisata";

$res = mysqli_query($con, $query);

$no = 1;

?>

<div id="page-wrapper" style="height: 100%;">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Area Konservasi (Objek Wisata)</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row" style="height: 100%;">

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button class="btn btn-primary" id="tambah-area_konservasi"><span class="fa fa-plus"></span> Tambah Konservasi</button>
<!--                    <button class="btn btn-success" id="tambah_info_area_konservasi"><span class="fa fa-plus"></span> Tambah Info Detail Area Konservasi</button>-->
                    <!-- <a href="index.php?page=detail_konservasi" class="btn btn-warning"><i class="fa fa-book"></i> Detail Area Konservasi </a> -->
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <!-- <th>Id Wisata (Konservasi)</th> -->
                                <th>Nama Wisata (Konservasi)</th>
                                <!-- <th>Lokasi Wisata (Koservasi)</th> -->
<!--                                 <th>Latitude</th>
                                <th>Longitude</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php while ($data = mysqli_fetch_assoc($res)) {
                             ?>
                             <tr class="odd gradeX">
                                <td><?php echo $no++; ?></td>
                                <!-- <td><?php echo $data["id"]; ?></td> -->
                                <td><?php echo $data["nama_wisata"]; ?></td>
                                <!-- <td><?php echo $data["lokasi"]; ?></td> -->
<!--                                 <td><?php echo $data ["latitude"]; ?></td>
                                <td><?php echo $data ["longitude"]; ?></td> -->
                                <td width="150">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                       <button
                                       class="btn btn-primary btn-sm edit-area_konservasi"
                                       id=""
                                       id_wisata="<?php echo $data['id']; ?>"
                                       nama_wisata="<?php echo $data['nama_wisata']; ?>"
                                       lokasi="<?php echo $data['lokasi']; ?>"
                                       latitude="<?php echo $data['latitude']; ?>"
                                       longitude="<?php echo $data['longitude']; ?>"
                                       >
                                       <span class="fa fa-edit"></span>
                                   </button>

                                   <a href="index.php?page=detail_konservasi2&id=<?php echo $data['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-book"></i></a>

                                   <a href="proses/hapus_konservasi.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm hapus-konservasi">
                                       <span class="fa fa-trash"></span>
                                   </a>

																	 <form action="laporan/cetakareakonservasi.php" method="POST">
																			<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
																			<button type="submit" name="button" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> </button>
																	 </form>
																	 
                               </div>
                           </td>
                       </tr>
                       <?php } ?>
                   </tbody>
               </table>
               <!-- /.table-responsive -->

           </div>
           <!-- /.panel-body -->
       </div>
       <!-- /.panel -->
   </div>
   <!-- /.col-lg-12 -->

</div>
</div>
<!-- Modal -->
<div style="" class="modal fade" id="modal-info_tambah-area_konservasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div style="" class="modal-dialog" role="document">
  <div style="" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Area Konservasi (Objek Wisata)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form style="" role="form" method="POST" action="proses/simpan_detail.php">
        <div class="modal-body" style="height: 100%;">
          <div class="form-group">
            <label>Nama Fauna</label>
            <select name="id_fauna" class="form-control">
              <option>Pilih Nama Fauna</option>

              <?php
                    while ($data = mysqli_fetch_assoc($res_fauna2)) {
                        echo '<option value="' . $data['id'] . '">' . $data['nama_fauna'] . '</option>';
                    }
                 ?>
            </select>
          </div>
          <div class="form-group">
            <label>Nama Wisata (Konservasi)</label>
            <select name="id_wisata" class="form-control">
              <option>Pilih Nama Wisata</option>

              <?php
              while ($data = mysqli_fetch_assoc($res_wisata2)) {
                echo '<option value="' . $data['id'] . '">' . $data['nama_wisata'] . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>Jumlah Fauna</label>
            <input class="form-control" name="jumlah_fauna" type="text" required="">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="simpan">Save</button>
        </div>
      </form>

    </div>
  </div>

</div>

<!-- Modal -->

<div style="height: 100%;" class="modal fade" id="modal-tambah-area_konservasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div style="height: 100%;" class="modal-dialog" role="document">
    <div style="height: 100%;" class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Area Konservasi (Objek Wisata)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form style="" role="form" method="POST" action="proses/simpan_konservasi.php">
              <div class="modal-body" style="height: 100%;">
                <div class="form-group">
                    <label>Nama Konservasi (Objek Wisata)</label>
                    <input class="form-control" name="nama_wisata" type="text" required="">
                </div>
                <div class="form-group">
                    <label>Lokasi</label>
                    <input class="form-control" name="lokasi" type="text" required="">
                </div>
                <div class="form-group">
                    <label>Latitude</label>
                    <input class="form-control" name="latitude" type="text" required="" id="latitude" readonly="">
                </div>
                <div class="form-group">
                    <label>Longitude</label>
                    <input class="form-control" name="longitude" type="text" required="" id="longitude" readonly="">
                </div>
                  <div id="map"></div>
              </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="simpan">Save</button>
            </div>

        </form>

    </div>
</div>

</div>
<!-- Modal -->

<!-- Modal -->
<!-- <div style="height: 100%; width: 100%"; class="modal fade" id="modal-lihat-area_konservasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div style="height: 100%; width: 70%";" class="modal-dialog" role="document">
    <div style="height: 100%;" class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lihat Area Konservasi (Objek Wisata)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
          <div class="modal-body" style="height: 100%;">
          <table>
            <tr>
              <td>Nama Konservasi (Obyek Wisata)</td><td width="10%" align="center"> : </td>
              <td width="70%"><label id="label_namakonservasi"></label></td>
            </tr>
            <tr>
              <td>Lokasi Wisata</td><td width="10%" align="center"> : </td>
              <td><label id="label_lokasiwisata"></label></td>
            </tr>
            <tr>
              <td>Latidude</td><td width="10%" align="center"> : </td>
              <td><label id="label_latitude"></label></td>
            </tr>
            <tr>
              <td>Longitude</td><td width="10%" align="center"> : </td>
              <td><label id="label_longitude"></label></td>
            </tr>
            <tr>
               <textarea width="25px">

               </textarea>
            </tr>
          </table>
    </div>
</div> -->

<!-- </div> -->

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" style="height: 100%;" id="modal-tampil-detail-konservasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="height: 100%;" role="document">
    <div class="modal-content" style="height: 100%;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tampil Detail Konservasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body" style="height: 100%;">
      <table>
          <tr>
              <td width="">Nama Obyek Wisata (Konservasi) </td><td align="center"> : </td>
              <td><label id="label_namaobyekwisata"></label></td>
          </tr>
          <tr>
              <td>Lokasi</td><td align="center"> : </td>
              <td><label id="label_lokasiow"></label></td>
          </tr>
          <tr>
              <td>latitude</td><td align="center"> : </td>
              <td><label id="label_latitudeow"></label></td>
          </tr>
          <tr>
              <td>longitude</td><td align="center"> : </td>
              <td><label id="label_longitudeow"></label></td>
          </tr>
      </table>
      <br>
      <div style="height: 200px;" id="map_detail"></div>
      <br>
      <table width="100%" class="table  table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
          <tr>
          <th>No</th>
          <th>Nama Fauna</th>
          <th>Jumlah Fauna</th>
          </tr>
          </thead>
          <tbody id="tabel_fauna_content">
           </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuqp6YJymNF8Et7Xvd6SO3sBYqu2Bkc88&callback=initMap" async defer></script>

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
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });

        $('#tambah-area_konservasi').click(function(){
            $('#modal-tambah-area_konservasi').modal('show');
        });

        $('#tambah_info_area_konservasi').click(function(){
            $('#modal-info_tambah-area_konservasi').modal('show');
        });

        $('.edit-area_konservasi').click(function(){
            $('#modal-tambah-area_konservasi').modal('show');

            $('[name=nama_wisata]').val($(this).attr('nama_wisata'));
            $('[name=lokasi]').val($(this).attr('lokasi'));
            $('[name=latitude]').val($(this).attr('latitude'));
            $('[name=longitude]').val($(this).attr('longitude'));

            $('#button_submit').attr('name', 'edit');
        });


        $('.lihat-area_konservasi').click(function(){
            $('#modal-lihat-area_konservasi').modal('show');


            $('[name=nama_wisata]').val($(this).attr('nama_wisata'));
            $('[name=lokasi]').val($(this).attr('lokasi'));
            $('[name=latitude]').val($(this).attr('latitude'));
            $('[name=longitude]').val($(this).attr('longitude'));
        });

        $('.hapus-konservasi').click(function(e){
            var hrf = $(this).attr('href');
            e.preventDefault();
            swal({
                title: "Hapus Konservasi ini?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ya, Hapus",
                closeOnConfirm: false
            },
            function(){
                window.location.href = hrf;
            });
        });


        function initMapDetail(data) {
          var map_detail;
          var marker;
          map_detail = new google.maps.Map(document.getElementById('map_detail'), {
              center: {lat: parseFloat(data.latitude), lng: parseFloat(data.longitude)},
              zoom: 12
          });
          var infowindow = new google.maps.InfoWindow({
            content: data.nama_wisata
          });
          marker = new google.maps.Marker({
            map: map_detail,
            draggable: false,
            title: data.nama_wisata,
            animation: google.maps.Animation.DROP,
            infowindow: infowindow,
            position: {lat: parseFloat(data.latitude), lng: parseFloat(data.longitude)}
          });
          google.maps.event.addListener(marker, 'click', function(){
            this.infowindow.open(map_detail, marker);
           });

        }

        function initTabelFauna(data) {
          var component = '';
          $.each(data, function(index, val) {
             /* iterate through array or object */
              component += '<tr> <td> '+(index+1)+' </td> <td>  '+val.nama_fauna+' </td> <td> '+val.jumlah_fauna+' </td> </tr>';
          });
          $('#tabel_fauna_content').html(component);
        }

        $('.detail_obyek_wisata').click(function(event) {
          /* Act on the event */
          event.preventDefault();

          $.ajax({
            url: $(this).attr('href'),
            type: 'GET',
            dataType: 'json',
            data: {},
          })
          .done(function(result) {
            console.log(result);
            initTabelFauna(result.data_fauna);
            initMapDetail(result.data_wisata);
            var data = result.data_wisata;
            $('#label_namaobyekwisata').text(data.nama_wisata);
            $('#label_lokasiow').text(data.lokasi);
            $('#label_latitudeow').text(data.latitude);
            $('#label_longitudeow').text(data.longitude);
            $('#modal-tampil-detail-konservasi').modal('show');
          })
          .fail(function(error) {
            console.log(error);
          });



        });




    });
</script>
