<?php 
require '../konfigurasi/koneksi.php';

if (isset($_POST['simpan'])) {
	
	$id_fauna = $_POST['id_fauna'];
	$id_wisata = $_POST['id_wisata'];
	$jumlah_fauna = $_POST["jumlah_fauna"];

	$sql = "INSERT INTO detail_obyek_wisata(id_wisata, id_fauna, jumlah_fauna) VALUES ('$id_wisata', '$id_fauna','$jumlah_fauna')";
	echo $sql;
	$res = mysqli_query($con, $sql);

	if ($res) {
		header('location:../index.php?page=detail_konservasi');
	}
	else{
		echo "Data gagal dimasukkan";
	}

}
else if (isset($_POST['edit'])) {
	$id = $_POST['id'];
	$nama_fauna = $_POST['nama_fauna'];
	$spesies = $_POST['spesies'];
	$deskripsi = $_POST['deskripsi'];
	$status = $_POST['status'];
	$status_konservasi_nasional = $_POST['status_konservasi_nasional'];
	$status_konservasi_internasional = $_POST['status_konservasi_internasional'];
	$family = $_POST['family'];
	$kehidupan_sosial = $_POST['kehidupan_sosial'];
	$id_kategori = $_POST['id_kategori'];

	$sql = "UPDATE fauna SET nama_fauna='$nama_fauna', spesies='$spesies', deskripsi='$deskripsi', status='$status', status_konservasi_nasional='$status_konservasi_nasional', status_konservasi_internasional='$status_konservasi_internasional', family='$family', kehidupan_sosial='$kehidupan_sosial', id_kategori='$id_kategori' WHERE id='$id'";

	$res = mysqli_query($con, $sql);

	if ($res) {
		header('location:../index.php?page=fauna');
	}
	else{
		echo "Data gagal Diubah";
	}
}
 ?>
