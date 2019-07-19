<?php
require '../konfigurasi/koneksi.php';

$jumlah = $_POST['jumlah_fauna'];
$id_penyebaran = $_POST['id_penyebaran'];
$status = $_POST['status'];

if (isset($_POST['simpan'])) {

	$cek = "SELECT jumlah_fauna FROM penyebaran WHERE id = '$id_penyebaran'";

	$res_cek = mysqli_query($con, $cek);

	while ($data = mysqli_fetch_assoc($res_cek)) {
		$jumlah_fauna_sekarang = $data['jumlah_fauna'];
	}

	if ($jumlah > $jumlah_fauna_sekarang){
		header('location:../index.php?page=kematian_penyebaran');
	} else {

		if($status == 'kematian'){

			$alasan = $_POST['alasan'];

			$sql = "INSERT INTO kematian_fauna(jumlah_kematian, tanggal_kematian, alasan, id_penyebaran) VALUES ('$jumlah', NOW(),'$alasan','$id_penyebaran')";

			$res = mysqli_query($con, $sql);

			if ($res) {
				$update_data_fauna = "UPDATE penyebaran SET jumlah_fauna = jumlah_fauna - '$jumlah' WHERE id = '$id_penyebaran' ";
				$res_update = mysqli_query($con, $update_data_fauna);

				header('location:../index.php?page=kematian_penyebaran');
			}
			else{
				echo "Data gagal dimasukkan";
			}
		} else {

			$sql = "INSERT INTO penambahan(jumlah_kematian, tanggal_penambahan, id_penyebaran) VALUES ('$jumlah', NOW(),'$id_penyebaran')";

			$res = mysqli_query($con, $sql);

			if ($res) {
				$update_data_fauna = "UPDATE penyebaran SET jumlah_fauna = jumlah_fauna + '$jumlah' WHERE id = '$id_penyebaran' ";
				$res_update = mysqli_query($con, $update_data_fauna);

				header('location:../index.php?page=penambahan_penyebaran');
			}
			else{
				echo "Data gagal dimasukkan";
			}
		}

	}
}
