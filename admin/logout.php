<?php
/**
 * Code by Reyzeal
 * Jumat, 19 Juli 2019
 *
 * module logout
 *      Alur Redirect:
 *      Logout -> pengunjung
 *      Guest  -> login
 */

session_start();

if(isset($_SESSION['login_status']) && $_SESSION['login_status']){
    session_destroy();
}
header('Location: /pengunjung');

