<?php
require_once 'konfigurasi/koneksi.php';

$query = "SELECT DISTINCT(fauna.nama_fauna), fauna.id FROM penyebaran INNER JOIN fauna ON fauna.id = penyebaran.id_fauna";
$res = mysqli_query($con, $query);

$query_fauna ="SELECT fauna.id, fauna.nama_fauna FROM fauna";
$res_fauna = mysqli_query($con, $query_fauna);

// $query_fauna2 ="SELECT fauna.id, fauna.nama_fauna FROM fauna";
// $res_fauna2 = mysqli_query($con, $query_fauna2);

$no = 1;
?>
<div id="page-wrapper">
	<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Penyebaran Fauna</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <button class="btn btn-primary" id="tambah-penyebaran"><span class="fa fa-plus"></span> Tambah Penyebaran</button><br><br>
					<a class="btn btn-primary" id="tambah-area_konservasi" href="index.php?page=kematian_penyebaran"><span class="fa fa-minus"></span> Data Kematian </a>
					<a class="btn btn-primary" id="tambah-area_konservasi" href="index.php?page=penambahan_penyebaran"><span class="fa fa-plus"></span> Data Penambahan </a>
					<a class="btn btn-primary" id="tambah-area_konservasi" href="laporan/cetakpenyebaran.php"><span class="fa fa-print"></span> Cetak Data Penyebaran </a>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <table width="100%" class="table table-striped table-bordered table-hover" id="tabel-penyebaran">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Fauna</th>

                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             <?php while ($data = mysqli_fetch_assoc($res)) {
               ?>
               <tr class="odd gradeX">
                <td><?php echo $no++; ?></td>
                <td><?php echo $data["nama_fauna"]; ?></td>

                <td width="100">

                  <div class="btn-group" role="group" aria-label="Basic example">

                 <a href="proses/detail_penyebaran.php?id=<?php echo $data['id']; ?>" class="btn btn-success btn-sm detail_penyebaran"><i class="fa fa-book"></i></a>

								 <form action="laporan/cetakpenyebaran2.php" method="POST" target="_blank">
										<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
										<input type="hidden" name="nama_fauna" value="<?php echo $data['nama_fauna']; ?>">
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
<div class="modal fade" id="modal-form-tambah-penyebaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div  class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Penyebaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;
          </span>
        </button>
      </div>
      <form role="form" method="POST" action="proses/simpan_penyebaran.php">
        <input type="hidden" name="id_penyebaran">
        <div class="modal-body">
          <div class="form-group">
            <label>Fauna</label>
            <select name="id_fauna" class="form-control">
              <option>Pilih Fauna</option>

              <?php
              while ($data = mysqli_fetch_assoc($res_fauna)) {
                echo '<option value="' . $data['id'] . '">' . $data['nama_fauna'] . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>Penyebaran</label>
            <input class="form-control" name="penyebaran" type="text" required="">
          </div>
          <div class="form-group">
            <label>Lokasi Penyebaran</label>
            <input class="form-control" name="lokasi_penyebaran" type="text" required="">
          </div>
          <div class="form-group">
            <label>Latitude</label>
            <input class="form-control" name="latitude" id="latitude" type="text" required="" readonly="">
          </div>
          <div class="form-group">
            <label>Longitude</label>
            <input class="form-control" name="longitude" id="longitude" type="text" required="" readonly="">
          </div>
          <div class="form-group">
            <div id="map"></div>
          </div>
          <div class="form-group">
            <label>Jumlah Fauna</label>
            <input class="form-control" name="jumlah_fauna" type="text" required="">
          </div>
          <div class="form-group">
            <label>Radius Penyebaran</label>
            <input class="form-control" name="radius_penyebaran" type="text" required="">
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
<div style="height: 100%;" class="modal fade" id="modal-tampil-penyebaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div style="height: 100%;" class="modal-dialog" role="document">
    <div style="height: 100%;" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tampil Penyebaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body" style="height: 100%;">
          <div class="modal-body">
            <table>
              <tr>
                <td>Nama Fauna</td><td width="10%" align="center"> : </td>
                <td width="70%"><label id="label_namafauna"></label></td>
              </tr>
            </table>
            <br><br>
            <div style="height: 400px;" id="map_detail"></div>
          </div>
        </div>
    </div>
  </div>
</div>

<!-- Modal edit -->
<div  class="modal fade" id="modal-edit-penyebaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div  class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Penyebaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;
          </span>
        </button>
      </div>
      <form role="form" method="POST" action="proses/simpan_penyebaran.php" id="form_edit_penyebaran">

        <div class="modal-body">
          <div class="form-group">
             <input type="hidden" name="id">
						 <table>
						 	<tr>
						 		<td>Nama Fauna</td><td width="10%" align="center"> : </td>
								<td width="70%"> <label id="label_e_nama"></label></td>
						 	</tr>
							<tr>
								<td>Familia</td><td width="10%" align="center"> : </td>
								<td><label id="label_e_family"></label></td>
							</tr>
							<tr>
								<td>Spesies</td><td width="10%" align="center"> : </td>
								<td><label id="label_e_spesies"></label></td>
							</tr>
							<tr>
								<td>Status</td><td width="10%" align="center"> : </td>
								<td><label id="label_e_status"></label></td>
							</tr>
							<tr>
								<td>Status Konservasi Nasional </td><td width="10%" align="center"> : </td>
								<td><label id="label_e_skn"></label></td>
							</tr>
							<tr>
								<td>Status Konservasi Internasional</td><td width="10%" align="center"> : </td>
								<td><label id="label_e_ski"></label></td>
							</tr>
							<tr>
								<td>Kehidupan Sosial  </td><td width="10%" align="center"> : </td>
								<td><label id="label_e_kehidupan_sosial"></label></td>
							</tr>
							<tr>
								<td>Deskripsi</td><td width="10%" align="center"> : </td>
								<td><label id="label_e_deskripsi"></label></td>
							</tr>
						 </table>
						<div class="form-group">
							<label>Jumlah : </label>
							<input class="form-control" name="jumlah" type="text" required="">
						</div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="edit_jumlah">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="modal-kematian-penyebaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div  class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Kematian Fauna di Area Penyebaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;
          </span>
        </button>
      </div>
      <form role="form" method="POST" action="proses/simpan_penyebaran.php">
        <input type="hidden" name="id_penyebaran">
        <div class="modal-body">
          <div class="form-group">
            <label>Fauna</label>
            <select name="id_fauna" class="form-control">
              <option>Pilih Fauna</option>
              <?php
              while ($data2 = mysqli_fetch_assoc($res_fauna2)) {
                echo '<option value="' . $data2['id'] . '">' . $data2['nama_fauna'] . '</option>';
              }
              ?>
            </select>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="edit">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="modal fade" id="modal_edit_data_penyebaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
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
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuqp6YJymNF8Et7Xvd6SO3sBYqu2Bkc88&callback=initMap" async defer></script>
       </div>
     </div>
   </div>
 </div>

 <script>
  $(document).ready(function() {
    $('#tabel-penyebaran').DataTable({
      responsive: true
    });

    $('#tambah-penyebaran').click(function(){
      $('#modal-form-tambah-penyebaran').modal('show');
    });

    $('.edit-penyebaran').click(function(){
      $('#modal-edit-penyebaran').modal('show');
      $('[name=id_penyebaran]').val($(this).attr('id_penyebaran'));
      $('[name=id_fauna]').val($(this).attr('id_fauna')).trigger('change');
      $('[name=penyebaran]').val($(this).attr('penyebaran'));
      $('[name=lokasi_penyebaran]').val($(this).attr('lokasi_penyebaran'));
      $('[name=latitude]').val($(this).attr('latitude'));
      $('[name=longitude]').val($(this).attr('longitude'));
      $('[name=jumlah_fauna]').val($(this).attr('jumlah_fauna'));
      $('[name=radius_penyebaran]').val($(this).attr('radius_penyebaran'));
      $('#button_submit').attr('name', 'edit');
    });

    $('.lihat-penyebaran').click(function(){
      $('#modal-tambah-penyebaran').modal('show');
      $('[name=id_penyebaran]').val($(this).attr('id_penyebaran'));
      $('[name=id_fauna]').val($(this).attr('id_fauna')).trigger('change');
      $('[name=penyebaran]').val($(this).attr('penyebaran'));
      $('[name=lokasi_penyebaran]').val($(this).attr('lokasi_penyebaran'));
      $('[name=latitude]').val($(this).attr('latitude'));
      $('[name=longitude]').val($(this).attr('longitude'));
      $('[name=jumlah_fauna]').val($(this).attr('jumlah_fauna'));
      $('[name=radius_penyebaran]').val($(this).attr('radius_penyebaran'));
    });

    function initMapDetail(data_penyebaran) {
      console.log('Init Map');
      var map_detail;
      var marker;
      map_detail = new google.maps.Map(document.getElementById('map_detail'), {
        center: {lat: -7.747270, lng: 110.355382},
        zoom: 12
      });

      var markers = [];
        $.each(data_penyebaran, function(index, val) {
          var contentString = '<div>Lokasi : '+val.lokasi_penyebaran+'</div>'+
                              '<div>Jumlah : '+val.jumlah_fauna+'</div>'+
                              // '<br><a href="#" class="btn btn-primary btn-sm edit-penyebaran">Edit</a>'+
                              // '<button data-toggle="modal"  data-target="#modal-kematian-penyebaran" class="btn btn-primary btn-sm edit-penyebaran"><span class="fa fa-bolt"></span></button>'+
                              '<a href="proses/data_detail_penyebaran.php?id='+val.id+'" class="btn btn-primary btn-sm edit_detail_penyebaran"><span class="fa fa-edit"></span></a>'+
                              '<a href="proses/hapus_penyebaran.php?id='+val.id+'" class="btn btn-danger btn-sm hapus-penyebaran"><span class="fa fa-trash"></span></a>';
                              /* buat edit dan hapus didalam maps nya --> */
          var infowindow = new google.maps.InfoWindow({
            content: contentString
          });
           markers.push(new google.maps.Marker({
            map: map_detail,
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

        $('#map_detail').on('click', '.hapus-penyebaran', function(event) {
          event.preventDefault();
           var hrf = $(this).attr('href');
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

        $('#map_detail').on('click', '.edit_detail_penyebaran', function(event) {
          event.preventDefault();
          /* Act on the event */
          console.log('click')
          $.ajax({
            url: $(this).attr('href'),
            type: 'GET',
            dataType: 'json',
            data: {},
          })
          .done(function(res, xhr, meta) {
            console.log(res);
            var data_penyebaran = res.data_penyebaran;
            $('#form_edit_penyebaran').find('#label_e_nama').text(data_penyebaran.nama_fauna)
            $('#form_edit_penyebaran').find('#label_e_family').text(data_penyebaran.family)
            $('#form_edit_penyebaran').find('input[name="jumlah"]').val(data_penyebaran.jumlah_fauna)
            $('#form_edit_penyebaran').find('#label_e_spesies').text(data_penyebaran.spesies)
            $('#form_edit_penyebaran').find('#label_e_status').text(data_penyebaran.status)
            $('#form_edit_penyebaran').find('#label_e_skn').text(data_penyebaran.status_konservasi_nasional)
            $('#form_edit_penyebaran').find('#label_e_ski').text(data_penyebaran.status_konservasi_internasional)
            $('#form_edit_penyebaran').find('#label_e_kehidupan_sosial').text(data_penyebaran.kehidupan_sosial)
            $('#form_edit_penyebaran').find('#label_e_deskripsi').text(data_penyebaran.deskripsi)
            $('#form_edit_penyebaran').find('input[name="id"]').val(data_penyebaran.id_penyebaran)
            $('#modal-edit-penyebaran').modal('show')

          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });


        });



    }

    $('.hapus-penyebaran').click(function(e){
      var hrf = $(this).attr('href');
      e.preventDefault();
      swal({
        title: "Hapus data penyebaran ini?",
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

    function initTabelPenyebaran(data) {
      var component = '';
      $.each(data, function(index, val) {
       /* iterate through array or object */
       component += '<tr> <td> '+(index+1)+' </td> <td>  '+val.lokasi_penyebaran+' </td> <td> '+val.jumlah_fauna+' </td> </tr>';
     });
      $('#tabel_penyebaran_content').html(component);
    }

		$('.data_detail_penyebaran').click(function(event) {
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
				var data = result.data_detail_penyebaran;
        $('#label_e_nama').text(data.nama_fauna);
        $('#label_e_family').text(data.jumlah_fauna);

				$('#modal-edit-penyebaran').modal('show');
			})
			.fail(function(error) {
				console.log(error);
			});

		});

    $('.detail_penyebaran').click(function(event) {
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
        initTabelPenyebaran(result.data_penyebaran);
        /*initMapDetail(result.data_penyebaran);*/
        var data = result.data_fauna;
        $('#label_namafauna').text(data.nama_fauna);
        // $('#label_e_nama').text(data.nama_fauna);
        // $('#label_e_family').text(data.spesies);
        // $('#label_id').text(data.id);

        initMapDetail(result.data_penyebaran);
        $('#modal-tampil-penyebaran').modal('show');
      })
      .fail(function(error) {
        console.log(error);
      });

    });

  });


    </script>
