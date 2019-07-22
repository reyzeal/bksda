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
$deskripsi = htmlentities(isset($_POST['deskripsi'])?$_POST['deskripsi']:null,ENT_QUOTES);

/**
 * Create agenda
 * metode POST
 */
if(isset($_POST['simpan'])){
    $info = pathinfo($_FILES['gambar']['name']);
    $ext = $info['extension'];
    $namabaru = md5(date('Y-m-d H:i:s')).".$ext";
    move_uploaded_file($_FILES['gambar']['tmp_name'],"../../resources/$namabaru");

    $gambar = "/resources/$namabaru";
    $status = $DATABASE->query("INSERT INTO agenda VALUES (null,'$judul','$waktu','".$deskripsi."','$gambar')");
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
    $old = $DATABASE->select("SELECT gambar FROM agenda WHERE id='$id'")[0]->gambar;
    if(isset($_FILES['gambar']) && $_FILES['gambar']['tmp_name']){
        $info = pathinfo($_FILES['gambar']['name']);
        $ext = $info['extension'];
        $namabaru = md5(date('Y-m-d H:i:s')).".$ext";
        move_uploaded_file($_FILES['gambar']['tmp_name'],"../../resources/$namabaru");

        $gambar = "/resources/$namabaru";

        if($old && file_exists("../../$old")){
            unlink("../../$old");
        }
    }else{
        $gambar = $old;
    }
    $status = $DATABASE->query("UPDATE agenda SET judul = '$judul', waktu = '$waktu', deskripsi = '".$deskripsi."', gambar='$gambar' WHERE id = $id");
    if($status){
        header('Location: /admin/index.php?page=agenda');
    }
    else{
        die($DATABASE->error);
    }
}

/**
 * Hapus agenda
 * metode POST dengan id tercantum dalam parameter url (GET)
 * contoh /admin/proses/agenda.php?hapus=1
 */
if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    $old = $DATABASE->select("SELECT gambar FROM agenda WHERE id='$id'")[0]->gambar;
    if($old && file_exists("../../$old")){
        unlink("../../$old");
    }
    $status = $DATABASE->query("DELETE FROM agenda WHERE id=$id");
    if($status){
        header('Location: /admin/index.php?page=agenda');
    }
    else{
        die('gagal');
    }
}