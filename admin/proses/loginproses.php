<?php
session_start();
require '../konfigurasi/koneksi.php';

$email = $_POST ['email'];
$pass = $_POST ['password'];

$query = "SELECT * FROM akun WHERE email='$email' AND password='$pass'"; //query untuk mengecek email dan password 

$result = mysqli_query($con, $query); //eksekusi query

$num = mysqli_num_rows($result);

if ($num>0) {
	//login berhasil
	header('location:../index.php');
	$_SESSION['login_status'] = 1;
} 
else{
	//login gagal
	header('location:../login.php');
	$_SESSION['login_status'] = 0;
}
//echo $num;

//echo $email . ' ' . $pass;




 ?>