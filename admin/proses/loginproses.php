<?php
session_start();
require '../konfigurasi/DB.php';

$email = $_POST ['email'];
$pass = $_POST ['password'];

$status = count($DATABASE->select("SELECT * FROM akun WHERE email = '$email' AND password = '$pass'"));

if ($status>0) {
	//login berhasil
	header('location:../index.php');
	$_SESSION['login_status'] = 1;
	$_SESSION['auth'] = serialize($status);
} 
else{
	//login gagal
	header('location:../login.php');
	$_SESSION['login_status'] = 0;
    $_SESSION['auth'] = null;
}
//echo $num;

//echo $email . ' ' . $pass;




 ?>