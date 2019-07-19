<?php 
require '../konfigurasi/koneksi.php';

$id = $_GET['id'];


$sql = "DELETE FROM obyek_wisata WHERE id = '$id'";

$res = mysqli_query($con, $sql);

if ($res) {
	header('location:../index.php?page=area_konservasi');
}
?>