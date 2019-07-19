<?php 
require '../konfigurasi/koneksi.php';

if (isset($_POST['simpan'])) {
	
	$nama_fauna = $_POST['fnama_fauna'];
	$spesies = $_POST['fspesies'];
	$deskripsi = $_POST['fdeskripsi'];
	$status = $_POST['fstatus'];
	$status_konservasi_nasional = $_POST['fstatus_konservasi_nasional'];
	$status_konservasi_internasional = $_POST['fstatus_konservasi_internasional'];
	$family = $_POST['ffamily'];
	$kehidupan_sosial = $_POST['fkehidupan_sosial'];
	$id_kategori = $_POST['fid_kategori'];

	$sql = "INSERT INTO fauna(nama_fauna, spesies, deskripsi, status, status_konservasi_nasional, status_konservasi_internasional, family, kehidupan_sosial, id_kategori) VALUES ('$nama_fauna', '$spesies','$deskripsi','$status','$status_konservasi_nasional', '$status_konservasi_internasional', '$family', '$kehidupan_sosial','$id_kategori')";
	echo $sql;
	$res = mysqli_query($con, $sql);

	if ($res) {
		header('location:../index.php?page=fauna');
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
