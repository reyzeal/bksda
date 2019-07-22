<?php 
require '../konfigurasi/koneksi.php';
require '../konfigurasi/DB.php';

if (isset($_POST['simpan'])) {
	$info = pathinfo($_FILES['gambar']['name']);
	$ext = $info['extension'];
	$namabaru = md5(date('Y-m-d H:i:s')).".$ext";
	move_uploaded_file($_FILES['gambar']['tmp_name'],"../../resources/$namabaru");

	$gambar = "/resources/$namabaru";
	$nama_fauna = $_POST['fnama_fauna'];
	$spesies = $_POST['fspesies'];
	$deskripsi = htmlentities($_POST['fdeskripsi']);
	$status = $_POST['fstatus'];
	$status_konservasi_nasional = $_POST['fstatus_konservasi_nasional'];
	$status_konservasi_internasional = $_POST['fstatus_konservasi_internasional'];
	$family = $_POST['ffamily'];
	$kehidupan_sosial = $_POST['fkehidupan_sosial'];
	$id_kategori = $_POST['fid_kategori'];

	$sql = "INSERT INTO fauna(nama_fauna, spesies, deskripsi, status, status_konservasi_nasional, status_konservasi_internasional, family, kehidupan_sosial, id_kategori,gambar) VALUES ('$nama_fauna', '$spesies','$deskripsi','$status','$status_konservasi_nasional', '$status_konservasi_internasional', '$family', '$kehidupan_sosial','$id_kategori','$gambar')";
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
	$old = $DATABASE->select("SELECT gambar FROM fauna WHERE id='$id'")[0]->gambar;
	if(isset($_FILES['gambar']) && $_FILES['gambar']['tmp_name']){
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
	$nama_fauna = $_POST['nama_fauna'];
	$spesies = $_POST['spesies'];
	$deskripsi = htmlentities($_POST['deskripsi']);
	$status = $_POST['status'];
	$status_konservasi_nasional = $_POST['status_konservasi_nasional'];
	$status_konservasi_internasional = $_POST['status_konservasi_internasional'];
	$family = $_POST['family'];
	$kehidupan_sosial = $_POST['kehidupan_sosial'];
	$id_kategori = $_POST['id_kategori'];

	$sql = "UPDATE fauna SET nama_fauna='$nama_fauna', spesies='$spesies', deskripsi='$deskripsi', status='$status', status_konservasi_nasional='$status_konservasi_nasional', status_konservasi_internasional='$status_konservasi_internasional', family='$family', kehidupan_sosial='$kehidupan_sosial', id_kategori='$id_kategori',gambar='$gambar' WHERE id='$id'";

	$res = mysqli_query($con, $sql);

	if ($res) {
		header('location:../index.php?page=fauna');
	}
	else{
		echo "Data gagal Diubah";
	}
}
 ?>
