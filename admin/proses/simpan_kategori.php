<?php
require '../konfigurasi/koneksi.php';
require 'session.php';
if (isset($_POST['simpan'])) {

	$nama_kategori = $_POST['fnama_kategori'];

	$sql = "INSERT INTO kategori(nama_kategori) VALUES ('$nama_kategori')";
	echo $sql;
	$res = mysqli_query($con, $sql);

	header('location:../index.php?page=kategori');
	if($res){
		$FLASH->success('Berhasil menambah kategori');
	}
	else{
		$FLASH->error(mysqli_error($con));
	}


}
else if (isset($_POST['edit'])) {
	$id = $_POST['id'];
	$nama_kategori = $_POST['nama_kategori'];

	$sql = "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id=$id";

	$res = mysqli_query($con, $sql);

	header('location:../index.php?page=kategori');
	if($res){
		$FLASH->success('Berhasil mengedit kategori');
	}
	else{
		$FLASH->error(mysqli_error($con));
	}
}
?>
