<?php session_start();

session_destroy();
$_SESSION['usuario'] = array();

header('location:login.php');



?>