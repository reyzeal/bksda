<?php
require_once 'konfigurasi/koneksi.php';

$query = "SELECT * FROM kategori";

$res = mysqli_query($con, $query);

$no = 1;

?>
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Kategori</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button class="btn btn-primary" id="form-tambah-kategori"><span class="fa fa-plus"></span> Tambah Kategori</button>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <!-- <th>Id Kategori</th> -->
                                <th>Nama Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php while ($data = mysqli_fetch_assoc($res)) {
                             ?>
                             <tr class="odd gradeX">
                                <td><?php echo $no++; ?></td>
                              <!--   <td><?php echo $data["id"]; ?></td> -->
                                <td>
                                    <a id="tampil-klik-kategori" href="<?php echo $data["id"]; ?>"> <?php echo $data["nama_kategori"]; ?>  </a>
                                </td>
                                <td width="90">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                       <button
                                            class="btn btn-primary btn-sm edit-fauna"
                                            id=""
                                            id_kategori="<?php echo $data['id']; ?>"
                                            nama_kategori="<?php echo $data['nama_kategori']; ?>"

                                        >
                                           <span class="fa fa-edit"></span>
                                       </button>


                                       <a href="proses/hapus_kategori.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm hapus-fauna">
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
<div class="modal fade" id="modal-form-tambah-fauna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <form role="form" method="POST" action="proses/simpan_kategori.php">
    <input type="text" name="id" hidden="">
      <div class="modal-body">
        <div class="form-group">
            <label>Nama Kategori</label>
            <input class="form-control" name="fnama_kategori" type="text" required="">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="simpan" id="button_submit">Save</button>
    </div>
</form>

</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-tambah-fauna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <form role="form" method="POST" action="proses/simpan_kategori.php">
    <input type="text" name="id" hidden="">
      <div class="modal-body">
        <div class="form-group">
            <label>Nama Kategori</label>
            <input class="form-control" name="nama_kategori" type="text" required="">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="simpan" id="button_submit">Save</button>
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

        $('#form-tambah-kategori').click(function(){
            $('#modal-form-tambah-fauna').modal('show');
        });

        $('.edit-fauna').click(function(){
            $('#modal-tambah-fauna').modal('show');
            $('[name=id]').val($(this).attr('id_kategori'));

            $('[name=nama_kategori]').val($(this).attr('nama_kategori'));
            $('#button_submit').attr('name', 'edit');
        });

				$('.hapus-fauna').click(function(e){
						var hrf = $(this).attr('href');
						e.preventDefault();
						swal({
							title: "Hapus Kategori ini?",
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
