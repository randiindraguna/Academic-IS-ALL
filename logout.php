<?php 
include 'class_login.php';
$login = new Login();
$login->connect();

session_start();
//$_SESSION['token']="";
session_destroy();
header("location:index.php");


?>