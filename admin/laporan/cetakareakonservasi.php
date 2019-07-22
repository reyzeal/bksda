<?php
include '../konfigurasi/koneksi.php';

$id = $_POST['id'];

$query = "SELECT * FROM obyek_wisata WHERE id = '".$id."' ";
$res = mysqli_query($con, $query);

$query2 = "SELECT fauna.*, detail_obyek_wisata.* FROM fauna INNER JOIN detail_obyek_wisata ON fauna.id = detail_obyek_wisata.id_fauna INNER JOIN obyek_wisata ON obyek_wisata.id = detail_obyek_wisata.id_wisata WHERE obyek_wisata.id  = '".$id."' ";
$res2 = mysqli_query($con, $query2);

// $query_kategori = "SELECT * FROM kategori";
// $res_kategori = mysqli_query($con, $query_kategori);
$no = 1;
?>

<head>
  <style>
  table {
    border-collapse: collapse;
  }
  th, td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
  }
  tr:nth-child(even) {
    background-color: #eee;
  }
  tr:nth-child(odd) {
    background-color: #fff;
  }
</style>
</head>

<body onload="window.print()">
  <div class="row">
    <div class="col-md-2">
      <img src="../gambar/logo.jpg"  class="img-center img-fluid rounded-circle" width="100px" height="100px" style="position:absolute;">
      <p style="text-align:center"><span style="font-family:Times New Roman,Times,serif"><font size="2">KEMENTRIAN LINGKUNGAN HIDUP DAN KEHUTANAN</font></span></p>

			<p style="text-align:center"><strong><span style="font-family:Times New Roman,Times,serif"><font size="2">DIREKTORAT JENDRAL KONSERVASI SUMBER DAYA ALAM DAN EKOSISTEM</font></span></strong></p>

			<p style="text-align:center"><strong><span style="font-family:Times New Roman,Times,serif"><font size="3">BALAI KONSERVASI SUMBER DAYA ALAM YOGYAKARTA</font></span></strong></p>

			<p style="text-align:center"><span style="font-size:9px">Jl. Dr. Rajiman KM 04, Wadas, Tridadi, Kec. Sleman, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55514 Telp. 0274-864203 </span></p>
      <hr>
    </div>
  </div> <br>
  <b> DATA AREA KONSERVASI </b> <br><br>

  <table>
      <?php while ($data = mysqli_fetch_assoc($res)) {?>
      <tr>
          <td>Nama Obyek Wisata (Konservasi)</td> <td>:</td>
          <td><?php echo $data["nama_wisata"]; ?></td>
      </tr>
      <tr>
          <td>Lokasi</td><td>:</td>
          <td rowspan="3"><?php echo $data["lokasi"]; ?></td>
      </tr>
  </table>
  <br>
  Data fauna yang terdapat di Area Konservasi <?php echo $data['nama_wisata'] ?> sebagai berikut: <br><br>
  <?php } ?>

  <table>
      <thead>
      <tr>
          <th>No</th>
          <th>Nama Fauna</th>
          <th>Jumlah Fauna</th>
      </tr>
      </thead>
      <tbody>
      <?php while ($data2 = mysqli_fetch_assoc($res2)) {?>
          <tr class="odd gradeX">
              <td><?php echo $no++; ?></td>
              <td><?php echo $data2["nama_fauna"]; ?></td>
              <td><?php echo $data2['jumlah_fauna']; ?></td>
          </tr>
      <?php } ?>
      </tbody>
  </table>

</body>
