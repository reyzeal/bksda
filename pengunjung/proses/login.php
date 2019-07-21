<?php
session_start();
require '../konfigurasi/DB.php';
//require '../konfigurasi/koneksi.php';

if (isset($_POST['login'])) {

	$email = $_POST ['username'];
	$pass = $_POST ['password'];

	//$query = "SELECT * FROM akun WHERE email='$email' AND password='$pass'"; //query untuk mengecek email dan password
	$status = $DATABASE->select("SELECT * FROM akun WHERE email = '$email' AND password = '$pass'");
	//$result = mysqli_query($con, $query); //eksekusi query

	//$num = mysqli_num_rows($result);

	if (count($status)) {
		//login berhasil
		header('location:../../admin/index.php');
		$_SESSION['login_status'] = 1;
		$_SESSION['auth'] = serialize($status);
	} else {
		//login gagal
		header('location:../login.php');
		$_SESSION['login_status'] = 0;
		$_SESSION['auth'] = serialize(null);
	}
}
 ?>
