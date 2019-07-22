<?php
require '../konfigurasi/DB.php';

$id = $_GET['id'];
$data = $DATABASE->select("SELECT * FROM fauna WHERE id=$id");
if(count($data)){
    $data = $data[0];
}
echo json_encode($data);