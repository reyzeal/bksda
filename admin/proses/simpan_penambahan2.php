<?php
require '../konfigurasi/DB.php';
require 'session.php';
if (isset($_POST['simpan'])) {
    $jumlah = $_POST['jumlah_fauna'];
    $waktu = $_POST['waktu'];
    $status = $_POST['status'];
    $id_penyebaran = $_POST['fauna_penyebaran'];
    $x = $DATABASE->query("INSERT INTO penambahan_fauna(jumlah_penambahan, tanggal_penambahan, id_penyebaran) VALUES($jumlah,'$waktu',$id_penyebaran)");
    header('Location: ../../admin/index.php?page=penambahan_penyebaran');
    if($x){
        $FLASH->success('Berhasil menambahkan data Penambahan');
    }
    else{
        $FLASH->error('error'.$DATABASE->error);
    }
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $jumlah = $_POST['jumlah_fauna'];
    $waktu = $_POST['waktu'];
    $x = $DATABASE->query("UPDATE penambahan_fauna SET tanggal_penambahan='$waktu',jumlah_penambahan='$jumlah' WHERE id=$id");
    header('Location: ../../admin/index.php?page=penambahan_penyebaran');
    if($x){
        $FLASH->success('Berhasil mengedit data penambahan');
    }
    else{
        $FLASH->error('error'.$DATABASE->error);
    }
}

if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    $x = $DATABASE->query("DELETE FROM penambahan_fauna WHERE id=$id");
    header('Location: ../../admin/index.php?page=penambahan_penyebaran');
    if($x){
        $FLASH->success('Berhasil menghapus data penambahan');
    }
    else{
        $FLASH->error('error'.$DATABASE->error);
    }
}

