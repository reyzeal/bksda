<?php 
require '../konfigurasi/koneksi.php';
require '../konfigurasi/DB.php';

$id = $_GET['id'];


$sql = "DELETE FROM obyek_wisata WHERE id = '$id'";
$old = $DATABASE->select("SELECT gambar FROM obyek_wisata WHERE id='$id'")[0]->gambar;
if($old && file_exists("../$old")){
    unlink("../$old");
}
$res = mysqli_query($con, $sql);

if ($res) {
	header('location:../index.php?page=area_konservasi');
}else{
    die(mysqli_error($con));
}
?>