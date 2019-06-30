<?php
	require_once '../class_login.php';
	$akses = new Login();
 	$akses->connect();
 	session_start();
 	$user = $_SESSION['username'];
 	if(isset($_POST['submit'])){
 		$newpass = $_POST['newpass'];
 		$ulangpass = $_POST['ulangpass'];
 	}

 	if($newpass!=$ulangpass){
 		 header("location:profil_mahasiswa.php?fail_chg");
 	}
 	else{
 			$akses->ganti_password($user,$newpass,'dirubah');
 			 header("location:profil_mahasiswa.php?can_chg");
 	}

?>