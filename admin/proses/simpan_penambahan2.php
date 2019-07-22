<?php
require '../konfigurasi/DB.php';

$jumlah = $_POST['jumlah_fauna'];
$waktu = $_POST['waktu'];
$alasan = $_POST['alasan'];
$id_penyebaran = $_POST['fauna_penyebaran'];
$status = $_POST['status'];

if (isset($_POST['simpan'])) {
    $x = $DATABASE->query("INSERT INTO penambahan_fauna(jumlah_penambahan, tanggal_penambahan, id_penyebaran) VALUES($jumlah,'$waktu',$id_penyebaran)");
    if($x){
        header('Location: /admin/index.php?page=penambahan_penyebaran');
    }else{
        die($x);
    }
}

