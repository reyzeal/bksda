<?php 
require '../konfigurasi/koneksi.php';

$id = $_GET['id'];


$sql = "DELETE FROM fauna WHERE id = '$id'";

$res = mysqli_query($con, $sql);

if ($res) {
	header('location:../index.php?page=fauna');
}
 ?>