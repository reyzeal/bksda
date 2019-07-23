<?php 
require '../konfigurasi/koneksi.php';

$id = $_GET['id'];


$sql = "DELETE FROM kategori WHERE id = '$id'";

$res = mysqli_query($con, $sql);

header('location:../index.php?page=kategori');
if($res){
    $FLASH->success('Berhasil menghapus kategori');
}
else{
    $FLASH->error(mysqli_error($con));
}
 ?>