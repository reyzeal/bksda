<?php
include '../konfigurasi/koneksi.php';

$query = "SELECT fauna.nama_fauna FROM `penyebaran` INNER JOIN fauna ON penyebaran.id_fauna = fauna.id GROUP BY fauna.nama_fauna ORDER BY fauna.nama_fauna ASC";

$res = mysqli_query($con, $query);

$query_kategori = "SELECT * FROM kategori";
$res_kategori = mysqli_query($con, $query_kategori);
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
  </div>
  <br>
  <b> DATA PENYEBARAN FAUNA </b> <br><br>
  <table border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Fauna</th>
        <th>Lokasi Penyebaran</th>
        <!-- <th>Jumlah Fauna</th> -->
      </tr>
    </thead>
    <tbody>
      <?php while ($data = mysqli_fetch_assoc($res)) {
        $query2 = "SELECT penyebaran.lokasi_penyebaran FROM `penyebaran` INNER JOIN fauna ON penyebaran.id_fauna = fauna.id WHERE fauna.nama_fauna = '".$data['nama_fauna']."'";
        $res2 = mysqli_query($con, $query2);
        // $query3 = "SELECT penyebaran.jumlah_fauna FROM `penyebaran` INNER JOIN fauna ON penyebaran.id_fauna = fauna.id WHERE fauna.nama_fauna = '".$data['nama_fauna']."'";
        // $res3 = mysqli_query($con, $query3);
        ?>
        <tr class="odd gradeX">
          <td><?php echo $no++; ?></td>
          <td><?php echo $data["nama_fauna"]; ?></td>
          <td>
            <?php while ($data2 = mysqli_fetch_assoc($res2)) { ?>
             <li><?php echo $data2["lokasi_penyebaran"]; ?></li>
           <?php } ?>
          </td>
          <!-- <td>
            <?php while ($data3 = mysqli_fetch_assoc($res3)) { ?>
             <li><?php echo $data3["jumlah_fauna"]; ?></li>
           <?php } ?>
          </td> -->
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
