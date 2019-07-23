<?php

require_once '../konfigurasi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	;
	# code...
	$id = $_GET['id'];

	$query = "SELECT fauna.id, fauna.nama_fauna, fauna.spesies, fauna.deskripsi, fauna.status, fauna.status_konservasi_nasional, fauna.status_konservasi_internasional, fauna.family, fauna.kehidupan_sosial, kategori.nama_kategori FROM fauna JOIN kategori ON fauna.id_kategori = kategori.id WHERE fauna.id = '$id'";

	$res = mysqli_query($con, $query);

	$data_fauna = mysqli_fetch_assoc($res);

	$query_penyebaran_fauna = "SELECT ow.* FROM detail_obyek_wisata 
    INNER JOIN obyek_wisata ow on detail_obyek_wisata.id_wisata = ow.id
    WHERE detail_obyek_wisata.id_fauna=$id";

	$res = mysqli_query($con, $query_penyebaran_fauna);

	$data_penyebaran = array();

	while ($data = mysqli_fetch_assoc($res)) {
		array_push($data_penyebaran, $data);
	}

	header('Content-type:application/json;charset=utf-8');
	echo json_encode(['data_fauna' => $data_fauna, 'data_penyebaran' => $data_penyebaran]);
}

 ?>