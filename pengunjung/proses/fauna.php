<?php
require '../konfigurasi/DB.php';

$id = $_GET['id'];
$data = $DATABASE->select("SELECT * FROM fauna WHERE id=$id");

$persebaran = $DATABASE->select("SELECT ow.* FROM detail_obyek_wisata 
    INNER JOIN obyek_wisata ow on detail_obyek_wisata.id_wisata = ow.id
    WHERE detail_obyek_wisata.id_fauna=$id");
if(count($data)){
    $data = $data[0];
    $data->persebaran = $persebaran;
}
echo json_encode($data);