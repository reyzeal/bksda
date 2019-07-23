<?php
/**
 * Code by Reyzeal
 * Jumat, 19 Juli 2019
 *
 * module VIEW agenda
 */
require_once 'konfigurasi/DB.php';
$data = $DATABASE->select('SELECT * FROM agenda');
?>

<div id="page-wrapper" style="height: 100%;">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Agenda</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row" style="height: 100%;">

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button class="btn btn-primary" id="tambah-agenda"><span class="fa fa-plus"></span> Tambah Agenda</button>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Agenda</th>
                                <th>Waktu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=0;
                            foreach ($data as $agenda){
                                $i++;
                                $encoded = json_encode($agenda);

                             echo "<tr>
                                 <td>$i</td>
                                 <td>$agenda->judul</td>
                                 <td>$agenda->waktu</td>
                                 <td>
                                     <button type='button' class='edit-agenda btn btn-warning' data='$encoded'>Edit</button>
                                     <button href='../admin/proses/agenda.php?hapus=$agenda->id' class='hapus-agenda btn btn-danger'>Delete</button>
                                 </td>
                             </tr>";
                            };?>
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
<div style="height: 100%;" class="modal fade" id="modal-tambah-agenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div style="height: 100%;" class="modal-dialog" role="document">
    <div style="height: 100%;" class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Agenda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form style="" role="form" method="POST" action="proses/agenda.php" enctype="multipart/form-data">
          <div class="modal-body" style="height: 100%;">
            <div class="form-group">
                <label>Nama Agenda</label>
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
              <div class="form-group">
                  <label>Gambar</label>
                  <input class="form-control" name="gambar" type="file" accept="image/*" required>
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
<div style="min-height: 100%;" class="modal fade" id="modal-edit-agenda" tabindex="-1" role="dialog" aria-hidden="true">
    <div style="min-height: 100%;" class="modal-dialog" role="document">
        <div style="min-height: 100%;" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Agenda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form style="" role="form" method="POST" action="proses/agenda.php" enctype="multipart/form-data">
                <div class="modal-body" style="height: 100%;">
                    <div class="form-group">
                        <label>Nama Agenda</label>
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
                    <div class="form-group">
                        <label>Gambar</label>
                        <div class="p-3">
                            <p>Preview:</p>
                            <img id="preview" class="img-responsive">
                        </div>
                        <input class="form-control" name="gambar" type="file" accept="image/*">
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
<script src="../admin/js/flatpickr.min.js"></script>
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

        $('#tambah-agenda').click(function(){
            $('#modal-tambah-agenda').modal('show');
        });


        $('.edit-agenda').click(function(){
            $('#modal-edit-agenda').modal('show');
            var data = JSON.parse($(this).attr('data'));
            // console.log(data);
            $('#modal-edit-agenda [name=judul]').val(data.judul);
            $('#modal-edit-agenda [name=waktu]').val(data.waktu);
            $('#modal-edit-agenda [name=deskripsi]').val(data.deskripsi);
            $('#modal-edit-agenda #preview').attr('src',data.gambar);

            $('#modal-edit-agenda form').attr('action', '../admin/proses/agenda.php?edit='+data.id);
        });


        // $('.lihat-agenda').click(function(){
        //     $('#modal-lihat-agenda').modal('show');
        //     $('[name=nama_wisata]').val($(this).attr('nama_wisata'));
        //     $('[name=lokasi]').val($(this).attr('lokasi'));
        //     $('[name=latitude]').val($(this).attr('latitude'));
        //     $('[name=longitude]').val($(this).attr('longitude'));
        // });

        $('.hapus-agenda').click(function(e){
            var hrf = $(this).attr('href');
            e.preventDefault();
            swal({
                title: "Hapus Agenda ini?",
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