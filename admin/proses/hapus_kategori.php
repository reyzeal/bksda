<?php 
require '../konfigurasi/koneksi.php';

$id = $_GET['id'];


$sql = "DELETE FROM kategori WHERE id = '$id'";

$res = mysqli_query($con, $sql);

if ($res) {
	header('location:../index.php?page=kategori');
}
 ?>