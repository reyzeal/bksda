<?php
/**
 * Code by Reyzeal
 * Jumat, 21 Juli 2019
 *
 * module CRUD untuk Fauna dalam Konservasi
 */
require '../konfigurasi/DB.php';

/**
 * Create fauna
 * metode POST
 */
if(isset($_POST['simpan'])){
    $id = $_GET['konservasi'];
    $fauna = $_POST['fauna'];
    $jumlah = $_POST['jumlah'];
    $status = $DATABASE->query("INSERT INTO detail_obyek_wisata VALUES (null,$id,$fauna,$jumlah)");
    if($status){
        header("Location: ../../admin/index.php?page=detail_konservasi2&id=$id");
    }
    else{
        die('gagal');
    }
}

if(isset($_GET['edit'])){
    $redirect = $_GET['redirect'];
    $id = $_GET['edit'];
    $jumlah = $_POST['jumlah'];
    $status = $DATABASE->query("UPDATE detail_obyek_wisata SET jumlah_fauna='$jumlah' WHERE id='$id'");
//    die(print_r($status,1).$jumlah);
    if($status){
        header("Location: ../../admin/index.php?page=detail_konservasi2&id=$redirect");
    }
    else{
        die($DATABASE->error);
    }
}

if(isset($_GET['hapus'])){
    $redirect = $_GET['redirect'];
    $id = $_GET['hapus'];
    $status = $DATABASE->query("DELETE FROM detail_obyek_wisata WHERE id=$id");
    if($status){
        header("Location: ../../admin/index.php?page=detail_konservasi2&id=$redirect");
    }
    else{
        die('gagal');
    }
}