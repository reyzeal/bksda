<?php
require '../konfigurasi/DB.php';
require 'session.php';
$jumlah = $_POST['jumlah_fauna'];
$waktu = $_POST['waktu'];
$alasan = $_POST['alasan'];
$id_penyebaran = $_POST['fauna_penyebaran'];
$status = $_POST['status'];

if (isset($_POST['simpan'])) {
    $x = $DATABASE->query("INSERT INTO kematian_fauna(jumlah_kematian, tanggal_kematian, alasan, id_penyebaran) VALUES($jumlah,'$waktu','$alasan',$id_penyebaran)");
    //die($DATABASE->error);
    header('Location: ../../admin/index.php?page=kematian_penyebaran');
    if($x){
        $FLASH->success('Berhasil menambahkan data kematian');
    }
    else{
        $FLASH->error('error'.$DATABASE->error);
    }
}
