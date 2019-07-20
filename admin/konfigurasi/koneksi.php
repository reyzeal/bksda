<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "bksdayogyakarta2";

$con = mysqli_connect($servername, $username, $password, $database);
// koneksi dapat menggunakan new mysqli atau mysqli_connect

if ($con->connect_error){
	die("connection failed: " . $con->connect_error);
}
//echo "connected succesfully";
?>
