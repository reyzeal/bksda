<?php
require '../konfigurasi/koneksi.php';

if (isset($_POST['simpan'])) {

	$nama_kategori = $_POST['fnama_kategori'];

	$sql = "INSERT INTO kategori(nama_kategori) VALUES ('$nama_kategori')";
	echo $sql;
	$res = mysqli_query($con, $sql);

	if ($res) {
		header('location:../index.php?page=kategori');
	}
	else{
		echo "Data gagal dimasukkan";
	}

}
else if (isset($_POST['edit'])) {
	$id = $_POST['id'];
	$nama_kategori = $_POST['nama_kategori'];

	$sql = "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id=$id";

	$res = mysqli_query($con, $sql);

	if ($res) {
		header('location:../index.php?page=kategori');
	}
	else{
		echo "Data gagal Diubah";
	}
}
?>
