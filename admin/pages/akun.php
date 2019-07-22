<?php
/**
 * Code by Reyzeal
 * Jumat, 21 Juli 2019
 *
 * module VIEW Akun administrasi
 */
require_once 'konfigurasi/DB.php';
$data = $DATABASE->select('SELECT * FROM akun');
?>

<div id="page-wrapper" style="height: 100%;">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manajemen Akun</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row" style="height: 100%;">

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button class="btn btn-primary" id="tambah-akun"><span class="fa fa-plus"></span> Tambah akun</button>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama akun</th>
                                <th>Email</th>
                                <th>Privilege</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=0;
                            foreach ($data as $akun){
                                $i++;
                                $encoded = json_encode($akun);

                             echo "<tr>
                                 <td>$i</td>
                                 <td>$akun->usename</td>
                                 <td>$akun->email</td>
                                 <td>$akun->privilege</td>
                                 <td>
                                     <button type='button' class='edit-akun btn btn-warning' data='$encoded'>Edit</button>
                                     <button href='/admin/proses/akun.php?hapus=$akun->id' class='hapus-akun btn btn-danger'>Delete</button>
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
<div style="height: 100%;" class="modal fade" id="modal-tambah-akun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div style="height: 100%;" class="modal-dialog" role="document">
    <div style="height: 100%;" class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form style="" role="form" method="POST" action="proses/akun.php">
          <div class="modal-body" style="height: 100%;">
            <div class="form-group">
                <label>Username</label>
                <input class="form-control" name="username" type="text" required="">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" name="email" type="email" required="">
            </div>
            <div class="form-group">
                <label>Privilege</label>
                <select name="privilege" class="form-control">
                    <option>admin</option>
                    <option>kepala</option>
                </select>
            </div>
              <div class="form-group">
                  <label>Password</label>
                  <input class="form-control" name="password" type="password" required="">
              </div>
              <div class="form-group">
                  <label>Confirm Password</label>
                  <input class="form-control" name="confirm" type="password" required="">
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
<div style="height: 100%;" class="modal fade" id="modal-edit-akun" tabindex="-1" role="dialog" aria-hidden="true">
    <div style="height: 100%;" class="modal-dialog" role="document">
        <div style="height: 100%;" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form style="" role="form" method="POST" action="proses/akun.php">
                <div class="modal-body" style="height: 100%;">
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="username" type="text" required="">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" type="email" required="">
                    </div>
                    <div class="form-group">
                        <label>Privilege</label>
                        <select name="privilege" class="form-control">
                            <option>admin</option>
                            <option>kepala</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" name="password" type="password" required="">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input class="form-control" name="confirm" type="password" required="">
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

        $('#tambah-akun').click(function(){
            $('#modal-tambah-akun').modal('show');
        });


        $('.edit-akun').click(function(){
            $('#modal-edit-akun').modal('show');
            var data = JSON.parse($(this).attr('data'));
            // console.log(data);akun.php
            $('#modal-edit-akun [name=username]').val(data.usename);
            $('#modal-edit-akun [name=email]').val(data.email);
            $('#modal-edit-akun [name=privilege]').val(data.privilege);
            $('#modal-edit-akun [name=password]').val(data.password);
            $('#modal-edit-akun [name=confirm]').val(data.password);

            $('#modal-edit-akun form').attr('action', '/admin/proses/akun.php?edit='+data.id);
        });


        // $('.lihat-akun').click(function(){
        //     $('#modal-lihat-akun').modal('show');
        //     $('[name=nama_wisata]').val($(this).attr('nama_wisata'));
        //     $('[name=lokasi]').val($(this).attr('lokasi'));
        //     $('[name=latitude]').val($(this).attr('latitude'));
        //     $('[name=longitude]').val($(this).attr('longitude'));
        // });

        $('.hapus-akun').click(function(e){
            var hrf = $(this).attr('href');
            e.preventDefault();
            swal({
                title: "Hapus akun ini?",
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