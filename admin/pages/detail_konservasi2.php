<?php
/**
 * Code by Reyzeal
 * Jumat, 19 Juli 2019
 *
 * module VIEW detail konservasi
 */
require_once 'konfigurasi/DB.php';
$id = $_GET['id'];
$sql_konservasi = "SELECT obyek_wisata.id, obyek_wisata.nama_wisata, obyek_wisata.gambar, obyek_wisata.lokasi, obyek_wisata.latitude, obyek_wisata.longitude FROM obyek_wisata WHERE id = '$id'";

$sql_fauna = "SELECT detail_obyek_wisata.id_wisata as 'id', fauna.nama_fauna as 'nama', detail_obyek_wisata.jumlah_fauna as 'jumlah' FROM detail_obyek_wisata INNER JOIN fauna ON fauna.id = detail_obyek_wisata.id_fauna WHERE detail_obyek_wisata.id_wisata = '$id'";
$data_konservasi = $DATABASE->select($sql_konservasi);
$data_konservasi = $data_konservasi[0];
$data_fauna = $DATABASE->select($sql_fauna);

$sql_daftar_fauna = "SELECT fauna.id, fauna.nama_fauna FROM fauna";
$data_daftar_fauna = $DATABASE->select($sql_daftar_fauna);
?>

<div id="page-wrapper" style="min-height: 100% !important;">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Area Konservasi <?= $data_konservasi->nama_wisata;?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row" style="height: 100%;">

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <img src="<?=$data_konservasi->gambar;?>" class="img-fluid w-100">
                    <table class="table">
                        <tr>
                            <td>Nama Konservasi<br>(Objek Wisata)</td>
                            <td>:</td>
                            <td><?= $data_konservasi->nama_wisata;?></td>
                        </tr>
                        <tr>
                            <td>Lokasi </td>
                            <td>:</td>
                            <td><?= $data_konservasi->lokasi;?></td>
                        </tr>
                        <tr>
                            <td>Latitude </td>
                            <td>:</td>
                            <td><?= $data_konservasi->latitude;?></td>
                        </tr>
                        <tr>
                            <td>Longitude </td>
                            <td>:</td>
                            <td><?= $data_konservasi->longitude;?></td>
                        </tr>
                    </table>
                    <div style="height: 200px;" class="mb-3" id="map_detail"></div>

               <!-- /.table-responsive -->

                </div>
           <!-- /.panel-body -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Daftar Fauna</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button class="btn btn-primary" id="tambah-fauna"><span class="fa fa-plus"></span> Tambah Fauna</button>
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama fauna</th>
                            <th>Jumlah</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=0;
                        $data_fauna = is_array($data_fauna)?$data_fauna:[$data_fauna];
                        foreach ($data_fauna as $fauna){
                            $i++;
                            $encoded = json_encode($fauna);

                            echo "<tr>
                                 <td>$i</td>
                                 <td>$fauna->nama</td>
                                 <td>$fauna->jumlah</td>
                                 <td>
                                     <button type='button' class='edit-fauna btn btn-warning' data='$encoded'>Edit</button>
                                     <button href='/admin/proses/fauna_konservasi.php?hapus=$fauna->id' class='hapus-fauna btn btn-danger'>Delete</button>
                                 </td>
                             </tr>";
                        };?>
                        </tbody>
                    </table>
                </div>
            </div>
        <!-- /.panel -->
        </div>

   <!-- /.col-lg-12 -->

</div>
</div>
<!-- Modal -->
<div style="height: 100%;" class="modal fade" id="modal-tambah-fauna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div style="height: 100%;" class="modal-dialog" role="document">
    <div style="height: 100%;" class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah fauna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form style="" role="form" method="POST" action="proses/fauna_konservasi.php?konservasi=<?=$data_konservasi->id;?>">
          <div class="modal-body" style="height: 100%;">
            <div class="form-group">
                <label>Nama fauna</label>
                <select name="fauna" class="form-control" required="">
                    <?php
                        foreach ($data_daftar_fauna as $x){
                            echo "<option value='$x->id'>$x->nama_fauna</option>";
                        }
                    ?>
                </select>

            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input class="form-control" name="jumlah" type="text" required="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="simpan">Save</button>
            </div>
          </div>
        </form>
    </div>
  </div>
</div>
<!-- Modal -->
<!-- Modal -->
<div style="height: 100%;" class="modal fade" id="modal-edit-fauna" tabindex="-1" role="dialog" aria-hidden="true">
    <div style="height: 100%;" class="modal-dialog" role="document">
        <div style="height: 100%;" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit fauna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form style="" role="form" method="POST" action="proses/fauna.php">
                <div class="modal-body" style="height: 100%;">
                    <div class="form-group">
                        <label>Nama fauna</label>
                        <input class="form-control" name="judul" type="text" required="">
                    </div>
                    <div class="form-group">
                        <label>Waktu</label>
                        <input class="form-control" name="waktu" type="text" required="">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" type="text" required=""></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuqp6YJymNF8Et7Xvd6SO3sBYqu2Bkc88&callback=initMap" async defer></script>
<script src="/admin/js/flatpickr.min.js"></script>
<script>
    flatpickr('[name=waktu]', {});
</script>
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

        $('#tambah-fauna').click(function(){
            $('#modal-tambah-fauna').modal('show');
        });


        $('.edit-fauna').click(function(){
            $('#modal-edit-fauna').modal('show');
            var data = JSON.parse($(this).attr('data'));
            // console.log(data);
            $('#modal-edit-fauna [name=judul]').val(data.judul);
            $('#modal-edit-fauna [name=waktu]').val(data.waktu);
            $('#modal-edit-fauna [name=deskripsi]').val(data.deskripsi);

            $('#modal-edit-fauna form').attr('action', '/admin/proses/fauna_konservasi.php?edit='+data.id);
        });


        // $('.lihat-fauna').click(function(){
        //     $('#modal-lihat-fauna').modal('show');
        //     $('[name=nama_wisata]').val($(this).attr('nama_wisata'));
        //     $('[name=lokasi]').val($(this).attr('lokasi'));
        //     $('[name=latitude]').val($(this).attr('latitude'));
        //     $('[name=longitude]').val($(this).attr('longitude'));
        // });

        $('.hapus-fauna').click(function(e){
            var hrf = $(this).attr('href');
            e.preventDefault();
            swal({
                title: "Hapus fauna ini?",
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


        setTimeout(function () {
            initMapDetail(<?= json_encode($data_konservasi);?>);
        },1000);

    });
</script>