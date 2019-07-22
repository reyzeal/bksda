<?php
include '../konfigurasi/DB.php';

$query = "SELECT * FROM obyek_wisata";
$data = $DATABASE->select($query);
$all = [];
foreach ($data as $area){
    $id = $area->id;

    $query2 = "SELECT fauna.*, detail_obyek_wisata.* FROM fauna INNER JOIN detail_obyek_wisata ON fauna.id = detail_obyek_wisata.id_fauna INNER JOIN obyek_wisata ON obyek_wisata.id = detail_obyek_wisata.id_wisata WHERE obyek_wisata.id  = '".$id."' ";
    $fauna = $DATABASE->select($query2);
    $temp = [
        'area'=>$area,
        'fauna'=>$fauna,
    ];
    $all[] =$temp;
}

?>

<html>
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
        <?php
            foreach ($all as $konservasi){
                $area = $konservasi['area'];
                $fauna = $konservasi['fauna'];
                echo "<div style='height: 100%'>
        <div class=\"row\">
            <div class=\"col-md-2\">
                <img src=\"../gambar/logo.jpg\"  class=\"img-center img-fluid rounded-circle\" width=\"100px\" height=\"100px\" style=\"position:absolute;\">
                <p style=\"text-align:center\"><span style=\"font-family:Times New Roman,Times,serif\"><font size=\"2\">KEMENTRIAN LINGKUNGAN HIDUP DAN KEHUTANAN</font></span></p>

                <p style=\"text-align:center\"><strong><span style=\"font-family:Times New Roman,Times,serif\"><font size=\"2\">DIREKTORAT JENDRAL KONSERVASI SUMBER DAYA ALAM DAN EKOSISTEM</font></span></strong></p>

                <p style=\"text-align:center\"><strong><span style=\"font-family:Times New Roman,Times,serif\"><font size=\"3\">BALAI KONSERVASI SUMBER DAYA ALAM YOGYAKARTA</font></span></strong></p>

                <p style=\"text-align:center\"><span style=\"font-size:9px\">Jl. Dr. Rajiman KM 04, Wadas, Tridadi, Kec. Sleman, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55514 Telp. 0274-864203 </span></p>
                <hr>
            </div>
        </div> <br>
        <b> DATA AREA KONSERVASI </b> <br><br>
  <table>
     
      <tr>
          <td>Nama Obyek Wisata (Konservasi)</td> <td>:</td>
          <td>$area->nama_wisata</td>
      </tr>
      <tr>
          <td>Lokasi</td><td>:</td>
          <td rowspan=\"3\">$area->lokasi</td>
      </tr>
  </table>
  <br>
  Data fauna yang terdapat di Area Konservasi $area->nama_wisata sebagai berikut: <br><br>

  <table>
      <thead>
      <tr>
          <th>No</th>
          <th>Nama Fauna</th>
          <th>Jumlah Fauna</th>
      </tr>
      </thead>
      <tbody>";
                $no = 1;
      foreach ($fauna as $i){

          echo "<tr class=\"odd gradeX\">
              <td>$no</td>
              <td>$i->nama_fauna</td>
              <td>$i->jumlah_fauna</td>
          </tr>";
      }
      echo "</tbody>
  </table></div>";
            }
        ?>

    </body>
</html>
