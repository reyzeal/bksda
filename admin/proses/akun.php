<?php
/**
 * Code by Reyzeal
 * Jumat, 21 Juli 2019
 *
 * module CRUD untuk Akun
 */
require '../konfigurasi/DB.php';
require 'session.php';
if(!$AUTH->isPrivilege('kepala')) return 0;
$username = isset($_POST['username'])?$_POST['username']:null;
$email = isset($_POST['email'])?$_POST['email']:null;
$privilege = isset($_POST['privilege'])?$_POST['privilege']:null;
$password = isset($_POST['password'])?$_POST['password']:null;
$confirm = isset($_POST['confirm'])?$_POST['confirm']:null;

/**
 * Create akun
 * metode POST
 */
if(isset($_POST['simpan'])){
    if($password == $confirm){
        $status = $DATABASE->query("INSERT INTO akun VALUES (null,'$username','$email','$password','$privilege')");
    }else{
        $FLASH->error('password dan confirm tidak sama');
        header('Location: ../../admin/index.php?page=akun');
        die();
    }
    header('Location: ../../admin/index.php?page=akun');
    if($status){
        $FLASH->success('Berhasil menambahkan akun');
    }
    else{
        $FLASH->error($DATABASE->error);
    }
}

/**
 * Edit / Update akun
 * metode POST dengan id tercantum dalam parameter url (GET)
 * contoh /admin/proses/akun.php?edit=1
 */
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    if($password == $confirm){
        $status = $DATABASE->query("UPDATE akun SET usename = '$username', password = '$password', privilege = '$privilege', email='$email' WHERE id = $id");
    }else{
        $FLASH->error('password dan confirm tidak sama');
        header('Location: ../../admin/index.php?page=akun');
        die();
    }

    header('Location: ../../admin/index.php?page=akun');
    if($status){
        $FLASH->success('Berhasil mengedit akun');
    }
    else{
        $FLASH->error(htmlentities($DATABASE->error));
    }
}

/**
 * Hapus akun
 * metode POST dengan id tercantum dalam parameter url (GET)
 * contoh /admin/proses/akun.php?hapus=1
 */
if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    $status = $DATABASE->query("DELETE FROM akun WHERE id=$id");
    header('Location: ../../admin/index.php?page=akun');
    if($status){
        $FLASH->success('Berhasil menghapus akun');
    }
    else{
        $FLASH->error($DATABASE->error);
    }
}