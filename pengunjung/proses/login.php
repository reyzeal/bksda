<?php
session_start();
require '../konfigurasi/DB.php';
//require '../konfigurasi/koneksi.php';

if (isset($_POST['login'])) {

	$email = $_POST ['username'];
	$pass = $_POST ['password'];

	//$query = "SELECT * FROM akun WHERE email='$email' AND password='$pass'"; //query untuk mengecek email dan password
	$status = $DATABASE->select("SELECT * FROM akun WHERE (email = '$email' OR usename = '$email') AND password = '$pass'");
	//$result = mysqli_query($con, $query); //eksekusi query

	//$num = mysqli_num_rows($result);
//	die(count($status).' ');
	if ($status) {
		//login berhasil
		header('Location: ../../admin/index.php');
		$_SESSION['login_status'] = 1;
		$_SESSION['auth'] = serialize($status);
		$_SESSION['message'] = [
			'type' => 'success',
			'message' => 'selamat datang'
		];
	} else {
		//login gagal
		header('Location: ../../pengunjung');
		$_SESSION['login_status'] = 0;
		$_SESSION['auth'] = serialize(null);
		$_SESSION['message'] = [
			'type' => 'error',
			'message' => 'gagal login, periksa username / password'
		];
	}
}
 ?>
