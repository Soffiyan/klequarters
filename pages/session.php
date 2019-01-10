<?php
include 'Model/config.php';
session_start();
if (!isset($_SESSION['login_user']) && (time() - $_SESSION['login_user'] > 600)) {
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    echo "<script>window.location.href='?page=login';</script>";
}
$_SESSION['login_user'] = time();
?>