<?php 
require '../konfigurasi/koneksi.php';
require '../konfigurasi/DB.php';

$id = $_GET['id'];

$old = $DATABASE->select("SELECT gambar FROM fauna WHERE id='$id'")[0]->gambar;
if($old && file_exists("../$old")){
    unlink("../$old");
}
$sql = "DELETE FROM fauna WHERE id = '$id'";

$res = mysqli_query($con, $sql);

if ($res) {
	header('location:../index.php?page=fauna');
}
 ?>