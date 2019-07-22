<?php 
require '../konfigurasi/koneksi.php';
require '../konfigurasi/DB.php';

if (isset($_POST['simpan'])) {
	
	$nama_wisata = $_POST['nama_wisata'];
	$lokasi = $_POST['lokasi'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];


	$info = pathinfo($_FILES['gambar']['name']);
	$ext = $info['extension'];
	$namabaru = md5(date('Y-m-d H:i:s')).".$ext";
	move_uploaded_file($_FILES['gambar']['tmp_name'],"../../resources/$namabaru");
	$gambar = "/resources/$namabaru";


	$sql = "INSERT INTO obyek_wisata(nama_wisata, lokasi, latitude, longitude,gambar) VALUES ('$nama_wisata', '$lokasi','$latitude','$longitude','$gambar')";
	echo $sql;
	$res = mysqli_query($con, $sql);

	if ($res) {
		header('location:../index.php?page=area_konservasi');
	}
	else{
		echo "Data gagal dimasukkan";
	}

}

if (isset($_POST['edit'])) {
	$nama_wisata = $_POST['nama_wisata'];
	$lokasi = $_POST['lokasi'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$id = $_POST['edit'];
	$old = $DATABASE->select("SELECT gambar FROM obyek_wisata WHERE id='$id'")[0]->gambar;
	if(isset($_FILES['gambar'])){
		$info = pathinfo($_FILES['gambar']['name']);
		$ext = $info['extension'];
		$namabaru = md5(date('Y-m-d H:i:s')).".$ext";
		move_uploaded_file($_FILES['gambar']['tmp_name'],"../../resources/$namabaru");

		$gambar = "/resources/$namabaru";

		if($old && file_exists("../../$old")){
			unlink("../../$old");
		}
	}else{
		$gambar = $old;
	}

	$sql = "UPDATE obyek_wisata SET nama_wisata='$nama_wisata',lokasi='$lokasi',latitude='$latitude',longitude='$longitude',gambar='$gambar' where id=$id";
	$res = mysqli_query($con, $sql);

	if ($res) {
		header('location:../index.php?page=area_konservasi');
	}
	else{
		echo "Data gagal dimasukkan :".mysqli_error($con);
	}
}

 ?>
