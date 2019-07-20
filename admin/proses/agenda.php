<?php
/**
 * Code by Reyzeal
 * Jumat, 19 Juli 2019
 *
 * module CRUD untuk Agenda
 */
require '../konfigurasi/DB.php';

$judul = isset($_POST['judul'])?$_POST['judul']:null;
$waktu = isset($_POST['waktu'])?$_POST['waktu']:null;
$deskripsi = isset($_POST['deskripsi'])?$_POST['deskripsi']:null;

/**
 * Create agenda
 * metode POST
 */
if(isset($_POST['simpan'])){
    $status = $DATABASE->query("INSERT INTO agenda VALUES (null,'$judul','$waktu','$deskripsi')");
    if($status){
        header('Location: /admin/index.php?page=agenda');
    }
    else{
        die('gagal');
    }
}

/**
 * Edit / Update agenda
 * metode POST dengan id tercantum dalam parameter url (GET)
 * contoh /admin/proses/agenda.php?edit=1
 */
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $status = $DATABASE->query("UPDATE agenda SET judul = '$judul', waktu = '$waktu', deskripsi = '$deskripsi' WHERE id = $id");
    if($status){
        header('Location: /admin/index.php?page=agenda');
    }
    else{
        die('gagal');
    }
}

/**
 * Hapus agenda
 * metode POST dengan id tercantum dalam parameter url (GET)
 * contoh /admin/proses/agenda.php?hapus=1
 */
if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    $status = $DATABASE->query("DELETE FROM agenda WHERE id=$id");
    if($status){
        header('Location: /admin/index.php?page=agenda');
    }
    else{
        die('gagal');
    }
}