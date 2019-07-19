<?php
require_once 'konfigurasi/koneksi.php';

$query = "SELECT penyebaran.lokasi_penyebaran, kematian_fauna.*, fauna.nama_fauna FROM kematian_fauna INNER JOIN penyebaran ON kematian_fauna.id_penyebaran = penyebaran.id INNER JOIN fauna ON penyebaran.id_fauna = fauna.id ORDER BY kematian_fauna.tanggal_kematian DESC";
$res = mysqli_query($con, $query);

$query_penyebaran = "SELECT penyebaran.*, fauna.nama_fauna FROM penyebaran INNER JOIN fauna ON penyebaran.id_fauna = fauna.id";
$res_penyebaran= mysqli_query($con, $query_penyebaran);

$no = 1;

?>

<div id="page-wrapper" style="height: 100%;">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Kematian (Penyebaran) </h1>
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
                                <th>Alasan Kematian Fauna</th>
                                <th>Jumlah Fauna</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        	<?php while ($data = mysqli_fetch_assoc($res)) {
                             ?>
                             <tr class="odd gradeX">
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data["tanggal_kematian"]; ?></td>
                                <td><?php echo $data["nama_fauna"]; ?></td>
                                <td><?php echo $data["lokasi_penyebaran"]; ?></td>
                                <td><?php echo $data["alasan"]; ?></td>
                                <td><?php echo $data ["jumlah_kematian"]; ?></td>
                                <!-- <td width="150">
                                    <div class="btn-group" role="group" aria-label="Basic example">

                                   <a href="proses/detail_obyek_wisata.php?id=<?php echo $data['id']; ?>" class="btn btn-success btn-sm detail_obyek_wisata"><i class="fa fa-book"></i></a>

                                   <a href="proses/hapus_konservasi.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm hapus-konservasi">
                                       <span class="fa fa-trash"></span>
                                   </a>

																	 <form action="laporan/cetakareakonservasi.php" method="POST">
																			<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
																			<button type="submit" name="button" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> </button>
																	 </form>

                               </div>
                           </td> -->
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
      <form style="" role="form" method="POST" action="proses/simpan_kematian.php">
        <div class="modal-body" style="height: 100%;">
          <div class="form-group">
            <label>Nama Lokasi Penyebaran</label>
            <select name="id_penyebaran" class="form-control">
              <option>Pilih Lokasi</option>
              <?php
                    while ($data = mysqli_fetch_assoc($res_penyebaran)) {
                        echo '<option value="' . $data['id'] . '">' . $data['lokasi_penyebaran'].' - '.$data['nama_fauna']. '</option>';
                    }
                 ?>
            </select>
          </div>
					<div class="form-group">
            <label>Alasan Kematian</label>
						<textarea class="form-group" rows="8" cols="88" name="alasan"></textarea>
          </div>
          <div class="form-group">
            <label>Jumlah Fauna</label>
            <input class="form-control" name="jumlah_fauna" type="text" required="">
          </div>
        </div>

				<input type="hidden" name="status" value="kematian">

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="simpan">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

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
