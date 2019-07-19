<?php

require_once '../konfigurasi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	;
	# code...
	$id = $_GET['id'];

	//$query_datafauna = "SELECT fauna.nama_fauna, fauna.spesies, fauna.family, kategori.nama_kategori, kategori.id as id_kategori FROM fauna JOIN kategori ON fauna.id_kategori = kategori.id WHERE INNER JOIN penyebaran on penyebaran.id_fauna = fauna.id WHERE fauna.id = '$id'";

	$query = "SELECT penyebaran.id as 'id_penyebaran', fauna.* , penyebaran.lokasi_penyebaran, penyebaran.latitude, penyebaran.longitude, penyebaran.jumlah_fauna, penyebaran.radius_penyebaran FROM penyebaran JOIN fauna ON penyebaran.id_fauna = fauna.id WHERE penyebaran.id = '$id'";

	//$res_datafauna = mysqli_query($con, $query_datafauna);


	$res = mysqli_query($con, $query);

	// $data_penyebaran = array();

	// while ($data = mysqli_fetch_assoc($res)) {
	// 	array_push($data_penyebaran, $data);
	// }

	$data_penyebaran =  mysqli_fetch_assoc($res);

	header('Content-type:application/json;charset=utf-8');
	echo json_encode(['data_penyebaran' => $data_penyebaran]);


} ?>
