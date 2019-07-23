<?php 
require '../konfigurasi/koneksi.php';
require '../konfigurasi/DB.php';
require 'session.php';
$id = $_GET['id'];

$old = $DATABASE->select("SELECT gambar FROM fauna WHERE id='$id'")[0]->gambar;
if($old && file_exists("../$old")){
    unlink("../$old");
}
$sql = "DELETE FROM fauna WHERE id = '$id'";

$res = mysqli_query($con, $sql);


header('location:../index.php?page=fauna');
if($res){
    $FLASH->success('Berhasil menambah konservasi');
}
else{
    $FLASH->error(mysqli_error($con));
}
 ?>