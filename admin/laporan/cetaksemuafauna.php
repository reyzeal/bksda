<?php
include '../konfigurasi/koneksi.php';

$query = "SELECT fauna.*, kategori.nama_kategori, kategori.id as id_kategori FROM fauna JOIN kategori ON fauna.id_kategori = kategori.id";

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
  </div> <br>
    <b> DATA FAUNA </b> <br><br>
                <table>
                    <thead>
                        <tr>
                          <th>No</th>
                            <th>Nama Fauna</th>
                            <th>Spesies</th>
                            <th>Status</th>
                            <th>SKN</th>
                            <th>SKI</th>
                            <th>Family</th>
                            <th>Kehidupan Sosial</th>
                            <th>Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php while ($data = mysqli_fetch_assoc($res)) { ?>
                         <tr class="odd gradeX">
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data["nama_fauna"]; ?></td>
                            <td><?php echo $data["spesies"]; ?></td>
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
                            <td><?php echo $data["nama_kategori"]; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
</body>
