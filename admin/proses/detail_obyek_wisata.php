<?php

require_once '../konfigurasi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	
	$id = $_GET['id'];


	$query_obyek_wisata ="SELECT obyek_wisata.id, obyek_wisata.nama_wisata, obyek_wisata.lokasi, obyek_wisata.latitude, obyek_wisata.longitude FROM obyek_wisata WHERE id = '$id'";

	$res_obyek_wisata = mysqli_query($con, $query_obyek_wisata);

	
	$query_detail_wisata = "SELECT detail_obyek_wisata.id,detail_obyek_wisata.id_wisata, fauna.nama_fauna, detail_obyek_wisata.jumlah_fauna FROM detail_obyek_wisata INNER JOIN fauna ON fauna.id = detail_obyek_wisata.id_fauna WHERE detail_obyek_wisata.id_wisata = '$id'";

	$res_detail_wisata = mysqli_query($con, $query_detail_wisata);

	$data_wisata = mysqli_fetch_assoc($res_obyek_wisata);
	$data_fauna = array();
	while ($data = mysqli_fetch_assoc($res_detail_wisata)) {
		array_push($data_fauna, $data);
	}

	header('Content-type:application/json;charset=utf-8');
	echo json_encode(['data_wisata' => $data_wisata, 'data_fauna' => $data_fauna]);
}

 ?>