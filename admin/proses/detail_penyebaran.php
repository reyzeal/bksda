<?php

require_once '../konfigurasi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	;
	# code...
	$id = $_GET['id'];

	$query_datafauna = "SELECT fauna.id, fauna.nama_fauna, fauna.spesies, fauna.family, kategori.nama_kategori, kategori.id as id_kategori FROM fauna JOIN kategori ON fauna.id_kategori = kategori.id WHERE fauna.id = '$id'";

	$query = "SELECT penyebaran.id, fauna.nama_fauna, penyebaran.lokasi_penyebaran, penyebaran.latitude, penyebaran.longitude, penyebaran.jumlah_fauna, penyebaran.radius_penyebaran FROM penyebaran JOIN fauna ON penyebaran.id_fauna = fauna.id WHERE fauna.id = '$id'";

	$res_datafauna = mysqli_query($con, $query_datafauna);

	$res = mysqli_query($con, $query);

	$data_penyebaran = array();

	while ($data = mysqli_fetch_assoc($res)) {
		array_push($data_penyebaran, $data);
	}

	$data_fauna =  mysqli_fetch_assoc($res_datafauna);

	header('Content-type:application/json;charset=utf-8');
	echo json_encode(['data_fauna' => $data_fauna, 'data_penyebaran' => $data_penyebaran]);
}

 ?>
