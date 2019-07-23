<?php
/**
 * Code by Reyzeal
 * Jumat, 19 Juli 2019
 *
 * module Check Landing
 */
session_start();
if(isset($_SESSION['login_status']) && $_SESSION['login_status']){
    header('Location: admin');
}else{
    header('Location: pengunjung');
}