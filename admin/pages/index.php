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
       <div class="d-flex justify-content-between py-3" style="display: flex!important;justify-content: space-between;">
           <div style="display: flex!important;"> &nbspWaktu <?php echo $data["hari_ini"]; ?> </div>
           <div style="display: flex!important;">
               <span>Tampilan data :</span>
               <select onchange="redirect(this)">
                   <option value="">Setahun terakhir</option>
                   <?php foreach ($tahun as $x){
                       if(isset($_GET['tahun']) && $_GET['tahun'] == $x->tahun){
                           echo "<option value='$x->tahun' selected='selected'>$x->tahun</option>";
                       }else{
                           echo "<option value='$x->tahun'>$x->tahun</option>";
                       }

                   };?>
               </select>
               <script>
                   function redirect(e) {
                       window.location.href='../admin/index.php?tahun='+$(e).val()
                   }
               </script>
           </div>
       </div>
    <?php } ?>
  </div>

  <div class="row">
      <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
  </div>
    <div class="row py-5">
        <p>Total Kematian :<?=$total_kematian;?></p>
        <p>Total Penambahan :<?=$total_penambahan;?></p>
    </div>
