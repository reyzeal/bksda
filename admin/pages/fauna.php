<?php
require_once 'konfigurasi/koneksi.php';

$query = "SELECT fauna.*, kategori.nama_kategori, kategori.id as id_kategori FROM fauna JOIN kategori ON fauna.id_kategori = kategori.id";

$res = mysqli_query($con, $query);

$query_kategori = "SELECT * FROM kategori";
$res_kategori = mysqli_query($con, $query_kategori);

$query_kategori2 = "SELECT * FROM kategori";
$res_kategori2 = mysqli_query($con, $query_kategori2);

$no = 1;
?>
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Fauna</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button class="btn btn-primary" id="form-tambah-fauna"><span class="fa fa-plus"></span> Tambah Fauna</button>
										<a class="btn btn-primary" id="tambah-area_konservasi" href="laporan/cetaksemuafauna.php"><span class="fa fa-print"></span> Cetak Data Fauna </a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table  table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Fauna</th><!--
                                <th>Spesies</th>
                                <th>Status</th>
                                <th>SKN</th>
                                <th>SKI</th>
                                <th>Family</th>
                                <th>Kehidupan Sosial</th>
                                <th>Kategori</th> -->
                                <th  width="7%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php while ($data = mysqli_fetch_assoc($res)) { ?>
                             <tr class="odd gradeX">
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data["nama_fauna"]; ?></td>
                                <!-- <td><?php echo $data["spesies"]; ?></td>
                                <td><?php
                                if ($data["status"]== 2) {
                                    echo "masih dalam penangkaran";
                                }
                                else{
                                    echo "sudah dilepas ke habitat aslinya";
                                }
                                ?>
                                <td><?php echo $data["status_konservasi_nasional"]; ?></td>
                                <td><?php echo $data["status_konservasi_internasional"];?></td>
                                <td><?php echo $data["family"]; ?></td>
                                <td><?php echo $data["kehidupan_sosial"]; ?></td>
                                <td><?php echo $data["nama_kategori"]; ?></td> -->
                                <td width="100">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                       <button
                                            class="btn btn-primary btn-sm edit-fauna"
                                            id=""
                                            id_fauna="<?php echo $data['id']; ?>"
                                            nama_fauna="<?php echo $data['nama_fauna']; ?>"
                                            spesies ="<?php echo $data['spesies']; ?>"
                                            deskripsi="<?php echo $data['deskripsi']; ?>"
                                            status="<?php echo $data['status']; ?>"
                                            status_konservasi_nasional="<?php echo $data['status_konservasi_nasional'] ?>"
                                            status_konservasi_internasional="<?php echo $data['status_konservasi_internasional']; ?>"
                                            family="<?php echo $data['family']; ?>"
                                            kehidupan_sosial="<?php echo $data['kehidupan_sosial']; ?>"
                                            kategori="<?php echo $data['id_kategori']; ?>"
                                            gambar="<?php echo $data['gambar']; ?>"

                                        >
                                           <span class="fa fa-edit"></span>
                                       </button>

                                        <a href="proses/detail_fauna.php?id=<?php echo $data['id']; ?>" class="btn btn-success btn-sm detail_fauna"><i class="fa fa-book"></i></a>

                                       <a href="proses/hapus_fauna.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm hapus-fauna">
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
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Fauna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <form role="form" method="POST" action="proses/simpan_fauna.php" enctype="multipart/form-data">
    <input type="text" name="id" hidden="">
      <div class="modal-body">
        <div class="form-group">
            <label>Nama Fauna</label>
            <input class="form-control" name="fnama_fauna" type="text" required="">
        </div>
        <div class="form-group">
            <label>Nama Spesies</label>
            <input class="form-control" name="fspesies" type="text" required="">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="fdeskripsi" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Status Fauna</label>
            <select name="fstatus" class="form-control">
                <option>Pilih Status</option>
                <option value="1">Sudah Dilepas ke Habitat Aslinya</option>
                <option value="2">Masih Dalam Penangkaran</option>
            </select>
        </div>
        <div class="form-group">
            <label>Status Konservasi Nasional</label>
            <select name="fstatus_konservasi_nasional" class="form-control">
                <option>Pilih Status</option>
                <option value="dilindungi">Dilindungi</option>
                <option value="tidak dilindungi">Tidak Dilindungi</option>
            </select>
        </div>
        <div class="form-group">
            <label>Status Konservasi Internasional</label>
            <select name="fstatus_konservasi_internasional" class="form-control">
                <option>Pilih Status</option>
                <option value="dilindungi">Dilindungi</option>
                <option value="tidak dilindungi">Tidak Dilindungi</option>
            </select>
        </div>
        <div class="form-group">
            <label>Family</label>
            <input class="form-control" name="ffamily" type="text" required="">
        </div>
        <div class="form-group">
            <label>Kehidupan Sosial</label>
            <input class="form-control" name="fkehidupan_sosial" type="text" required="">
        </div>
        <div class="form-group">
            <label>Nama Kategori</label>
            <select name="fid_kategori" class="form-control">
                <option>Pilih Status</option>
                <?php
                    while ($data = mysqli_fetch_assoc($res_kategori)) {
                        echo '<option value="' . $data['id'] . '">' . $data['nama_kategori'] . '</option>';
                    }
                 ?>
            </select>
        </div>
          <div class="form-group">
              <label>Gambar</label>
              <input class="form-control" name="gambar" type="file" accept="image/*" required>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Fauna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <form role="form" method="POST" action="proses/simpan_fauna.php" enctype="multipart/form-data">
    <input type="text" name="id" hidden="">
      <div class="modal-body">
        <div class="form-group">
            <label>Nama Fauna</label>
            <input class="form-control" name="nama_fauna" type="text" required="">
        </div>
        <div class="form-group">
            <label>Nama Spesies</label>
            <input class="form-control" name="spesies" type="text" required="">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Status Fauna</label>
            <select name="status" class="form-control">
                <option>Pilih Status</option>
                <option value="Sudah Dilepas ke Habitat Aslinya">Sudah Dilepas ke Habitat Aslinya</option>
                <option value="Masih Dalam Penangkaran">Masih Dalam Penangkaran</option>
            </select>
        </div>
        <div class="form-group">
            <label>Status Konservasi Nasional</label>
            <select name="status_konservasi_nasional" class="form-control">
                <option>Pilih Status</option>
                <option value="dilindungi">Dilindungi</option>
                <option value="tidak dilindungi">Tidak Dilindungi</option>
            </select>
        </div>
        <div class="form-group">
            <label>Status Konservasi Internasional</label>
            <select name="status_konservasi_internasional" class="form-control">
                <option>Pilih Status</option>
                <option value="dilindungi">Dilindungi</option>
                <option value="tidak dilindungi">Tidak Dilindungi</option>
            </select>
        </div>
        <div class="form-group">
            <label>Family</label>
            <input class="form-control" name="family" type="text" required="">
        </div>
        <div class="form-group">
            <label>Kehidupan Sosial</label>
            <input class="form-control" name="kehidupan_sosial" type="text" required="">
        </div>
				<div class="form-group">
            <label>Nama Kategori</label>
            <select name="id_kategori" class="form-control">
                <option>Pilih Status</option>
                <?php
                    while ($data = mysqli_fetch_assoc($res_kategori2)) {
                        echo '<option value="' . $data['id'] . '">' . $data['nama_kategori'] . '</option>';
                    }
                 ?>
            </select>
        </div>
          <div class="form-group">
              <label>Gambar</label>
              <div class="p-3">
                  <p>Preview:</p>
                  <img id="preview">
              </div>
              <input class="form-control" name="gambar" type="file" accept="image/*">
          </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="edit" id="button_submit">Save</button>
    </div>
</form>

</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-tampil-fauna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Fauna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
      <div class="modal-body">
      <table>
          <tr>
              <td>Nama Fauna</td><td width="10%" align="center"> : </td>
              <td width="70%"><label id="label_namafauna"></label></td>
          </tr>
          <tr>
              <td>Nama Spesies</td><td width="10%" align="center"> : </td>
              <td><label id="label_spesies"></label></td>
          </tr>
          <tr>
              <td>Diskripsi</td><td width="10%" align="center"> : </td>
              <td><label id="label_deskripsi"></label></td>
          </tr>
          <tr>
              <td>Status Fauna</td><td width="10%" align="center"> : </td>
              <td><label id="label_statusfauna" name="a"></label></td>
          </tr>
          <tr>
              <td>Status Konservasi Nasional</td><td width="10%" align="center"> : </td>
              <td><label id="label_SKN"></label></td>
          </tr>
          <tr>
              <td>Status Konservasi Internasional</td><td width="10%" align="center"> : </td>
              <td><label id="label_SKI"></label></td>
          </tr>
          <tr>
              <td>Family</td><td width="10%" align="center"> : </td>
              <td><label id="label_family"></label></td>
          </tr>
          <tr>
              <td>Kehidupan Sosial</td><td width="10%" align="center"> : </td>
              <td><label id="label_kehidupansosial"></label></td>
          </tr>
          <tr>
              <td>Nama Kategori</td><td width="10%" align="center"> : </td>
              <td><label id="label_namakategori"></label></td>
          </tr>
      </table>
      <div class="form-group">
                <div id="map"></div>
</div>
<script>
    var map;
    var marker;

    function initMap(data_penyebaran) {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -7.747270, lng: 110.355382},
            zoom: 12
        });

        var markers = [];

        $.each(data_penyebaran, function(index, val) {
          var contentString = '<div>Lokasi : '+val.lokasi_penyebaran+'</div>'+
                              '<div>Jumlah : '+val.jumlah_fauna+'</div>';
          var infowindow = new google.maps.InfoWindow({
            content: contentString
          });
           markers.push(new google.maps.Marker({
            map: map,
            draggable: false,
            title: val.lokasi_penyebaran,
            animation: google.maps.Animation.DROP,
            infowindow: infowindow,
            position: {lat: parseFloat(val.latitude), lng: parseFloat(val.longitude)}
          }));

           google.maps.event.addListener(markers[index], 'click', function(){
            this.infowindow.open(map, markers[index]);
           })
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuqp6YJymNF8Et7Xvd6SO3sBYqu2Bkc88" async defer></script>
</div>
</div>
</div>
</div>

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });

        $('#form-tambah-fauna').click(function(){
            $('#modal-form-tambah-fauna').modal('show');
        });

        $('.edit-fauna').click(function(){
            $('#modal-tambah-fauna').modal('show');
            $('[name=id]').val($(this).attr('id_fauna'));

            $('[name=nama_fauna]').val($(this).attr('nama_fauna'));
            $('[name=spesies]').val($(this).attr('spesies'));
            $('[name=deskripsi]').val($(this).attr('deskripsi'));
            $('[name=status]').val($(this).attr('status'));
            $('[name=status_konservasi_nasional]').val($(this).attr('status_konservasi_nasional'));
            $('[name=status_konservasi_internasional]').val($(this).attr('status_konservasi_internasional'));
            $('[name=family]').val($(this).attr('family'));
            $('[name=kehidupan_sosial]').val($(this).attr('kehidupan_sosial'));
            $('[name=id_kategori]').val($(this).attr('kategori'));
            $('#button_submit').attr('name', 'edit');
            $('#modal-tambah-fauna #preview').attr('src',$(this).attr('gambar'));
        });

        $('.lihat-fauna').click(function(){
            $('#modal-tampil-fauna').modal('show');
            $('[name=id]').val($(this).attr('id_fauna'));

            $('[name=nama_fauna]').val($(this).attr('nama_fauna'));
            $('[name=spesies]').val($(this).attr('spesies'));
            $('[name=deskripsi]').val($(this).attr('deskripsi'));
            $('[name=status]').val($(this).attr('status'));
            $('[name=status_konservasi_nasional]').val($(this).attr('status_konservasi_nasional'));
            $('[name=status_konservasi_internasional]').val($(this).attr('status_konservasi_internasional'));
            $('[name=family]').val($(this).attr('family'));
            $('[name=kehidupan_sosial]').val($(this).attr('kehidupan_sosial'));
            $('[name=id_kategori]').val($(this).attr('kategori'));
        });

        $('.hapus-fauna').click(function(e){
            var hrf = $(this).attr('href');
            e.preventDefault();
            swal({
              title: "Hapus Fauna ini?",
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

        $('.detail_fauna').click(function(event) {
          event.preventDefault();
          $.ajax({
            url: $(this).attr('href'),
            type: 'GET',
            dataType: 'json',
            data: {},
          })
          .done(function(result) {
            var data = result.data_fauna;
            $('#label_namafauna').text(data.nama_fauna);
            $('#label_spesies').text(data.spesies);
            $('#label_deskripsi').text(data.deskripsi);
            $('#label_statusfauna').text(data.status);
            $('#label_SKN').text(data.status_konservasi_nasional);
            $('#label_SKI').text(data.status_konservasi_internasional);
            $('#label_family').text(data.family);
            $('#label_kehidupansosial').text(data.kehidupan_sosial);
            $('#label_namakategori').text(data.nama_kategori);
            initMap(result.data_penyebaran);
            $('#modal-tampil-fauna').modal('show');
          })
          .fail(function() {
            console.log("error");
          });

        });
    });
</script>
