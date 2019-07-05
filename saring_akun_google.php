<?php
	require_once 'class_login.php';
	require_once 'database.php';
	session_start();
	$akses = new Login();
	$akses->connect();
	$akses2 = new Database();
	$akses2->connect();

	if(isset($_SESSION['user_id'])){

		$pattern = "@webmail.uad.ac.id";
		$textlength = strlen($_SESSION['email']);
		$email = $_SESSION['email'];
		$usernameMhs = substr($email,$textlength-28,-18);
		$ketemu = false;
		
		
		 if (preg_match("/\b$pattern\b/i", $email, $match)){
								 	if(is_numeric($usernameMhs)){
								 		if(strlen($usernameMhs)==10){
								 			$_SESSION['username']=$usernameMhs;
								 			$_SESSION['status']="login";
								 			
								 			header("location:mahasiswa/index.php");
								 			//echo $_SESSION['username'];
								 		}
								 		 else{
								 		session_destroy();
								 		header("location:index.php?1");
										 }
								 	}
								 	 else{
								 	session_destroy();
								 	header("location:index.php?2");
								 }
		 }

		
		 else{
		 	foreach ($akses2->getDosen() as $key) {
		 	if (preg_match("/\b$email\b/i",$key['email'], $match)) {
		 			$ketemu = true;
		 			$dataFunc = $akses->get_data_dosen_byEmail($key['email']);
				 }

				 }
				 if($ketemu){
		 				$data=mysqli_fetch_array($dataFunc);
		 						$_SESSION['username']=$data['niy'];
								 $_SESSION['status']="login";
								// echo $data['niy'];
								 header("location:dosen/index.php");
				 }
				 else{
				 	session_destroy();
				 	header("location:index.php?notwebmail");
				 }
				
		 }

		
	}
?>