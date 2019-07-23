<?php
/**
 * Code by Reyzeal
 * Jumat, 21 Juli 2019
 *
 * module CRUD untuk Fauna dalam Konservasi
 */
require '../konfigurasi/DB.php';
$id = $_GET['konservasi'];

/**
 * Create fauna
 * metode POST
 */
if(isset($_POST['simpan'])){
    $fauna = $_POST['fauna'];
    $jumlah = $_POST['jumlah'];
    $status = $DATABASE->query("INSERT INTO detail_obyek_wisata VALUES (null,$id,$fauna,$jumlah)");
    if($status){
        header("Location: ../admin/index.php?page=detail_konservasi2&id=$id");
    }
    else{
        die('gagal');
    }
}