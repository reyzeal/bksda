<?php
require_once 'konfigurasi/DB.php';

$query = "SELECT penyebaran.lokasi_penyebaran, penambahan_fauna.*, fauna.nama_fauna FROM penambahan_fauna INNER JOIN penyebaran ON penambahan_fauna.id_penyebaran = penyebaran.id INNER JOIN fauna ON penyebaran.id_fauna = fauna.id ORDER BY penambahan_fauna.tanggal_penambahan DESC";
//$res = mysqli_query($con, $query);

$query_penyebaran = "SELECT * FROM obyek_wisata";
//$res_penyebaran= mysqli_query($con, $query_penyebaran);
$data = $DATABASE->select($query_penyebaran);
$no = 1;

?>

<div id="page-wrapper" style="height: 100%;">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Penambahan (Penyebaran) </h1>
        </div>
    </div>
    <div class="row" style="height: 100%;">

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button class="btn btn-primary" id="tambah-kematian"><span class="fa fa-plus"></span> Tambah </button>
                    <!-- <a href="index.php?page=detail_konservasi" class="btn btn-warning"><i class="fa fa-book"></i> Detail Area Konservasi </a> -->
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Fauna</th>
                                <th>Lokasi Kematian Fauna </th>
                                <th>Jumlah Fauna</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
               <!-- /.table-responsive -->

                </div>
           <!-- /.panel-body -->
       </div>
       <!-- /.panel -->
   </div>
</div>
</div>

<!-- Modal -->
<div style="" class="modal fade" id="modal-tambah-kematian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div style="" class="modal-dialog" role="document">
  <div style="" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kematian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form style="" role="form" method="POST" action="proses/simpan_penambahan.php">
        <div class="modal-body" style="height: 100%;">
          <div class="form-group">
            <label>Nama Lokasi Penyebaran</label>
            <select name="id_penyebaran" class="form-control">
              <?php
                foreach ($data as $x){
                    echo "<option value='$x->id'>$x->lokasi</option>";
                }
              ?>
            </select>
          </div>
            <div class="form-group">
                <label>Waktu</label>
                <input class="form-control" name="waktu" type="date" required="">
            </div>
          <div class="form-group">
            <label>Jumlah Fauna</label>
            <input class="form-control" name="jumlah_fauna" type="text" required="">
          </div>
            <div class="form-group">
                <label>Alasan</label>
                <textarea class="form-control" name="alasan" required=""></textarea>
            </div>
        </div>

				<input type="hidden" name="status" value="penambahan">

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="simpan">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>
<script src="/admin/js/flatpickr.min.js"></script>
<script>
    flatpickr('[name=waktu]', {

    });
</script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });

        $('#tambah-kematian').click(function(){
            $('#modal-tambah-kematian').modal('show');
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
    });
</script>
