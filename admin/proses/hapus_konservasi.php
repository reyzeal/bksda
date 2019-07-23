<?php 
require '../konfigurasi/koneksi.php';
require '../konfigurasi/DB.php';
require 'session.php';
$id = $_GET['id'];


$sql = "DELETE FROM obyek_wisata WHERE id = '$id'";
$old = $DATABASE->select("SELECT gambar FROM obyek_wisata WHERE id='$id'")[0]->gambar;
if($old && file_exists("../$old")){
    unlink("../$old");
}
$res = mysqli_query($con, $sql);

header('location:../index.php?page=area_konservasi');
if($res){
    $FLASH->success('Berhasil menghapus konservasi');
}
else{
    $FLASH->error(mysqli_error($con));
}
?>