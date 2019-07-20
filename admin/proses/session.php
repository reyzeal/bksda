<?php
/**
 * Code by Reyzeal
 * Jumat, 19 Juli 2019
 *
 * module checking Session Login
 */
session_start();
if(isset($_SESSION['login_status']) && $_SESSION['login_status']){

}else{
    header('Location: /admin/login.php');
}