<?php
	require_once '../class_login.php';
	$akses = new Login();
 	$akses->connect();
 	session_start();
 	
 	if(isset($_POST['submit'])){
 		$newpass = $_POST['newpass'];
 		$ulangpass = $_POST['ulangpass'];
 		$oldpass = $_POST['oldpass'];
 	}
 	$user = $_SESSION['username'];
 	$akunRow = mysqli_num_rows($akses->searchAkun($user,$oldpass));

 	if($akunRow<=0){
 		 header("location:profil_pengelola.php?fail_chg");
 	}
 	else if($newpass!=$ulangpass){
 		 header("location:profil_pengelola.php?fail_chg");
 	}
 	else{
 			$akses->ganti_password($user,$newpass,'dirubah');
 			 header("location:profil_pengelola.php?can_chg");
 	}

?>