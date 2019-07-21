<?php
require '../konfigurasi/DB.php';

$jumlah = $_POST['jumlah_fauna'];
$waktu = $_POST['waktu'];
$alasan = $_POST['alasan'];
$id_penyebaran = $_POST['fauna_penyebaran'];
$status = $_POST['status'];

if (isset($_POST['simpan'])) {
    $x = $DATABASE->query("INSERT INTO kematian_fauna(jumlah_kematian, tanggal_kematian, alasan, id_penyebaran) VALUES($jumlah,'$waktu','$alasan',$id_penyebaran)");
    if($x){
        header('Location: /admin/index.php?page=kematian_penyebaran');
    }else{
        die($x);
    }
}
