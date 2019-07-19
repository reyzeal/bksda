<?php 
require '../konfigurasi/koneksi.php';

if (isset($_POST['simpan'])) {
	$id_fauna = $_POST['id_fauna'];
	$penyebaran = $_POST['penyebaran'];
	$lokasi_penyebaran = $_POST['lokasi_penyebaran'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$jumlah_fauna = $_POST['jumlah_fauna'];
	$radius_penyebaran = $_POST['radius_penyebaran'];
	

	$sql = "INSERT INTO penyebaran(id_fauna, penyebaran, lokasi_penyebaran, latitude, longitude, jumlah_fauna, radius_penyebaran) VALUES ('$id_fauna','$penyebaran','$lokasi_penyebaran','$latitude', '$longitude', '$jumlah_fauna', '$radius_penyebaran')";
	echo $sql;
	$res = mysqli_query($con, $sql);

	if ($res) {
		header('location:../index.php?page=penyebaran');
	}
	else{
		echo "Data gagal dimasukkan";
	}

}
else if (isset($_POST['edit'])) {
	$id_penyebaran = $_POST['id_penyebaran'];
	$id_fauna = $_POST['id_fauna'];
	$penyebaran = $_POST['penyebaran'];
	$lokasi_penyebaran = $_POST['lokasi_penyebaran'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$jumlah_fauna = $_POST['jumlah_fauna'];
	$radius_penyebaran = $_POST['radius_penyebaran'];

	$sql = "UPDATE penyebaran SET id_fauna='$id_fauna', penyebaran='$penyebaran', lokasi_penyebaran='$lokasi_penyebaran', latitude='$latitude', longitude='$longitude', jumlah_fauna='$jumlah_fauna', radius_penyebaran='$radius_penyebaran' where id='$id_penyebaran'";

	$res = mysqli_query($con, $sql);

	if ($res) {
		header('location:../index.php?page=penyebaran');
	}
	else{
		echo "Data gagal Diubah";
	}
} 
else if (isset($_POST['edit_jumlah'])) {
	$id = $_POST['id'];
	$jumlah_fauna = $_POST['jumlah'];


	$sql = "UPDATE penyebaran SET jumlah_fauna = '$jumlah_fauna' WHERE id='$id'";

	//$sql = "UPDATE penyebaran SET id_fauna='$id_fauna', penyebaran='$penyebaran', lokasi_penyebaran='$lokasi_penyebaran', latitude='$latitude', longitude='$longitude', jumlah_fauna='$jumlah_fauna', radius_penyebaran='$radius_penyebaran' where id='$id_penyebaran'";

	$res = mysqli_query($con, $sql);

	if ($res) {
	header('location:../index.php?page=penyebaran');
	}
	else{
	echo "Data gagal Diubah";
	}
} 
 ?>
