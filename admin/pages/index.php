<?php
require_once 'konfigurasi/koneksi.php';

$query = "SELECT NOW() AS hari_ini";

$res = mysqli_query($con, $query);

$query_kategori = "SELECT * FROM kategori";
$res_kategori = mysqli_query($con, $query_kategori);

?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Home Admin </h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <div class="row">
    <?php while ($data = mysqli_fetch_assoc($res)) { ?>
      <h3> &nbsp <?php echo $data["hari_ini"]; ?> </h3> <?php } ?>
  </div>

  <div class="row">
      <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
  </div>
