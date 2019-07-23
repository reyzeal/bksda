<?php
require '../konfigurasi/DB.php';
require 'session.php';




if (isset($_POST['simpan'])) {
    $id_penyebaran = $_POST['fauna_penyebaran'];
    $jumlah = $_POST['jumlah_fauna'];
    $waktu = $_POST['waktu'];
    $alasan = $_POST['alasan'];
    $status = $_POST['status'];
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
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $jumlah = $_POST['jumlah_fauna'];
    $waktu = $_POST['waktu'];
    $alasan = $_POST['alasan'];
    $x = $DATABASE->query("UPDATE kematian_fauna SET tanggal_kematian='$waktu',jumlah_kematian='$jumlah',alasan='$alasan' WHERE id=$id");
    header('Location: ../../admin/index.php?page=kematian_penyebaran');
    if($x){
        $FLASH->success('Berhasil mengedit data kematian');
    }
    else{
        $FLASH->error('error'.$DATABASE->error);
    }
}
if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    $x = $DATABASE->query("DELETE FROM kematian_fauna WHERE id=$id");
    header('Location: ../../admin/index.php?page=kematian_penyebaran');
    if($x){
        $FLASH->success('Berhasil menghapus data kematian');
    }
    else{
        $FLASH->error('error'.$DATABASE->error);
    }
}
