<?php
	session_start();
	if(isset($_SESSION['user_id'])){

		$pattern1 = "@webmail.uad.ac.id";
		$pattern2 = "@tif.uad.ac.id";
		$textlength = strlen($_SESSION['email']);
		$email = $_SESSION['email'];
		$usernameMhs = substr($email,$textlength-28,-18);


		 if (preg_match("/\b$pattern1\b/i", $email, $match)){
								 	if(is_numeric($usernameMhs)){
								 		if(strlen($usernameMhs)==10){
								 			$_SESSION['username']=$usernameMhs;
								 			$_SESSION['status']="login";
								 			
								 			header("location:mahasiswa/index.php");
								 			//echo $_SESSION['username'];
								 		}
								 		 else{
								 		session_destroy();
								 		header("location:index.php");
										 }
								 	}
								 	 else{
								 	session_destroy();
								 	header("location:index.php");
								 }
		 }
		 else if () {
		 	
		 }
		 
		 else{


		 	session_destroy();


		 	header("location:index.php?notwebmail");
		 }
       
	}
?>