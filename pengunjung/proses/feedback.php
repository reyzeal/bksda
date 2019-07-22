<?php
require '../konfigurasi/DB.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $nama = $_POST['name'];
    $email = $_POST['email'];
    $subjek = $_POST['subject'];
    $pesan = htmlentities($_POST['message'],ENT_QUOTES);
    $status = $DATABASE->query("INSERT INTO feedback(nama, email, subjek, pesan) VALUES ('$nama','$email','$subjek','$pesan')");
    if(!$status){
        die($DATABASE->error);
    }
    echo "OK";
}