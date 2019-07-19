<?php
require_once 'konfigurasi/koneksi.php';

$query_obyek_wisata ="SELECT obyek_wisata.id, obyek_wisata.nama_wisata FROM obyek_wisata";

$res_obyek_wisata = mysqli_query($con, $query_obyek_wisata);

$no = 1;

$query_wisata = "SELECT detail_obyek_wisata.id_wisata, fauna.nama_fauna FROM detail_obyek_wisata INNER JOIN fauna ON fauna.id = detail_obyek_wisata.id_fauna";

$res_wisata = mysqli_query($con, $query_wisata);

$query_fauna2 = "SELECT fauna.id, fauna.nama_fauna FROM fauna";

$res_fauna2 = mysqli_query($con, $query_fauna2);

$query_wisata2 = "SELECT obyek_wisata.id, obyek_wisata.nama_wisata FROM obyek_wisata";

$res_wisata2 = mysqli_query($con, $query_wisata2);

$test_query = "SELECT detail_obyek_wisata.jumlah_fauna FROM detail_obyek_wisata INNER JOIN obyek_wisata ON detail_obyek_wisata.id_wisata = obyek_wisata.id";

$res_test = mysqli_query($con, $test_query);
?>

<div id="page-wrapper" style="height: 100%;">
	<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"> Detail Area Konservasi (Objek Wisata)</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row" style="height: 100%;">

    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
<!--           <button class="btn btn-primary" id="tambah-area_konservasi"><span class="fa fa-plus"></span> Tambah Info Detail </button> -->
          <a href="index.php?page=area_konservasi" class="btn btn-warning"><i class="fa fa-book"></i> Area Konservasi </a>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Wisata (Konservasi)</th>
                <th>Nama Fauna </th>
                <th>Jumlah Fauna</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             <?php while ($data = mysqli_fetch_assoc($res_obyek_wisata)) { 
                $num = 0;
                $fauna_array = array();

                while ($fauna = mysqli_fetch_assoc($res_wisata)) {
                  if ($fauna['id_wisata'] == $data['id']) {
                    array_push($fauna_array, $fauna['nama_fauna']);
                    $num++;
                  }
                }
               ?>
               <tr class="odd gradeX">
                <td><?php echo $no++; ?></td>
                <td><?php echo $data["nama_wisata"]; ?></td>
                <td>
                  <ol>
                    <?php 
                      foreach ($fauna_array as $value) {
                        echo "<li>" . $value . "</li>";
                      }
                     ?>
                  </ol>
                </td>
                <td><?php echo $num; ?></td>
                <td width="100">
                  <div class="btn-group" role="group" aria-label="Basic example">
                   <button 
                   class="btn btn-primary btn-sm" 
                   id="edit-area_konservasi"
                   id_wisata="<?php echo $data['id_wisata']; ?>"
                   id_fauna="<?php echo $data['id_fauna']; ?>"
                   jumlah_fauna="<?php echo $data['jumlah_fauna']; ?>"

                   >
                   <span class="fa fa-edit"></span>
                 </button>
                  <button 
                   class="btn btn-success btn-sm" 
                   id="lihat-area_konservasi"
                   id_wisata="<?php echo $data['id_wisata']; ?>"
                   id_fauna="<?php echo $data['id_fauna']; ?>"
                   jumlah_fauna="<?php echo $data['jumlah_fauna']; ?>"

                   >
                   <span class="fa fa-book"></span>
                 </button>
                 </a>
                 <a href="proses/hapus_konservasi.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm hapus-konservasi">
                   <span class="fa fa-trash"></span>
                 </a>
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
<div style="" class="modal fade" id="modal-tambah-area_konservasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


<!-- Modal -->
<div style="" class="modal fade" id="modal-lihat-area_konservasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div style="" class="modal-dialog" role="document">
  <div style="" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">LIHAT Area Konservasi (Objek Wisata)</h5>
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
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuqp6YJymNF8Et7Xvd6SO3sBYqu2Bkc88&callback=initMap" async defer></script>
         <script>
          $(document).ready(function() {
            $('#dataTables-example').DataTable({
              responsive: true
            });

            $('#tambah-area_konservasi').click(function(){
              $('#modal-tambah-area_konservasi').modal('show');
            });

            $('#edit-area_konservasi').click(function(){
              $('#modal-tambah-area_konservasi').modal('show');

              $('[name=id_fauna]').val($(this).attr('id_fauna'));
              $('[name=id_wisata]').val($(this).attr('id_wisata'));
              $('[name=jumlah_fauna]').val($(this).attr('jumlah_fauna'));
            })

            $('#lihat-area_konservasi').click(function(){
              $('#modal-lihat-area_konservasi').modal('show');

              $('[name=id_fauna]').val($(this).attr('id_fauna'));
              $('[name=id_wisata]').val($(this).attr('id_wisata'));
              $('[name=jumlah_fauna]').val($(this).attr('jumlah_fauna'));
            })

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
          });
        </script>