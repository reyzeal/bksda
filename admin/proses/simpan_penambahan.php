<?php
require '../konfigurasi/koneksi.php';

$jumlah = $_POST['jumlah_fauna'];
$id_penyebaran = $_POST['id_penyebaran'];

if (isset($_POST['simpan'])) {

	$cek = "SELECT jumlah_fauna FROM penyebaran WHERE id = '$id_penyebaran'";

	$res_cek = mysqli_query($con, $cek);

	$sql = "INSERT INTO penambahan_fauna(jumlah_penambahan, tanggal_penambahan, id_penyebaran) VALUES ('$jumlah', NOW(),'$id_penyebaran')";

	$res = mysqli_query($con, $sql);

	if ($res) {

		$update_data_fauna = "UPDATE penyebaran SET jumlah_fauna = jumlah_fauna + '$jumlah' WHERE id = '$id_penyebaran'";
		$res_update = mysqli_query($con, $update_data_fauna);

		header('location:../index.php?page=penambahan_penyebaran');
	} else{
		echo "Data gagal dimasukkan";
	}
}
