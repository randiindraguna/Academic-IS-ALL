<?php 
include 'class_login.php';
$login = new Login();
$login->connect();

session_start();

session_destroy();
header("location:index_login.php");


?>