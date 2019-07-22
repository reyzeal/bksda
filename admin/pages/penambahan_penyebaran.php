<?php
require_once 'konfigurasi/DB.php';

$query = "SELECT penambahan_fauna.id,penambahan_fauna.tanggal_penambahan,fauna.nama_fauna,ow.lokasi,penambahan_fauna.jumlah_penambahan FROM penambahan_fauna 
          INNER JOIN detail_obyek_wisata on penambahan_fauna.id_penyebaran=detail_obyek_wisata.id
          INNER JOIN obyek_wisata ow on detail_obyek_wisata.id_wisata = ow.id
          INNER JOIN fauna on detail_obyek_wisata.id_fauna = fauna.id ORDER BY tanggal_penambahan DESC ";
//$res = mysqli_query($con, $query);
$penambahan = $DATABASE->select($query);
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
                    <button class="btn btn-primary" id="tambah-penambahan"><span class="fa fa-plus"></span> Tambah </button>
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
                                <th>Lokasi penambahan Fauna </th>
                                <th>Jumlah Fauna</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                                foreach ($penambahan as $x){
                                    $i++;
                                    echo "<tr>
                                        <td>$i</td>
                                        <td>$x->tanggal_penambahan</td>
                                        <td>$x->nama_fauna</td>
                                        <td>$x->lokasi</td>
                                        <td>$x->jumlah_penambahan</td>
                                    </tr>";
                                }
                            ?>
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
<div style="" class="modal fade" id="modal-tambah-penambahan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div style="" class="modal-dialog" role="document">
  <div style="" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data penambahan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form style="" role="form" method="POST" action="proses/simpan_penambahan2.php">
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
                <label>Fauna</label>
                <select name="fauna_penyebaran" class="form-control">
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
        enableTime: true,
    });
</script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
        function retrieve_fauna(){
            var id = $('[name=id_penyebaran]').val();
            $.ajax({
                url : '/admin/proses/detail_obyek_wisata.php?id='+id,
                success:function (msg) {
                    str = '';
                    if(msg.data_fauna.length > 0){
                        $('[name=fauna_penyebaran]').parent().show();
                        $('[name=waktu]').parent().show();
                        $('[name=jumlah_fauna]').parent().show();
                        for(let i=0;i<msg.data_fauna.length;i++){
                            str+= '<option value="'+msg.data_fauna[i].id+'">'+msg.data_fauna[i].nama_fauna+'</option>';
                        }
                    }else{
                        $('[name=fauna_penyebaran]').parent().hide();
                        $('[name=waktu]').parent().hide();
                        $('[name=jumlah_fauna]').parent().hide();
                    }
                    $('[name=fauna_penyebaran]').html(str);
                }
            });
        }
        $('[name=id_penyebaran]').on('change',retrieve_fauna);
        $('#tambah-penambahan').click(function(){
            $('#modal-tambah-penambahan').modal('show');
            retrieve_fauna();
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
