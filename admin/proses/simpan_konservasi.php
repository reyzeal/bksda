<?php 
require '../konfigurasi/koneksi.php';

if (isset($_POST['simpan'])) {
	
	$nama_wisata = $_POST['nama_wisata'];
	$lokasi = $_POST['lokasi'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude']; 

	$sql = "INSERT INTO obyek_wisata(nama_wisata, lokasi, latitude, longitude) VALUES ('$nama_wisata', '$lokasi','$latitude','$longitude')";
	echo $sql;
	$res = mysqli_query($con, $sql);

	if ($res) {
		header('location:../index.php?page=area_konservasi');
	}
	else{
		echo "Data gagal dimasukkan";
	}

}

 ?>
