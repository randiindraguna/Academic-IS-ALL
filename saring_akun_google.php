<?php
	session_start();
	if(isset($_SESSION['user_id'])){
		$pattern = "@webmail.uad.ac.id";
		$textlength = strlen($_SESSION['email']);
		$email = $_SESSION['email'];
		$username = substr($email,$textlength-28,-18);

		 if (preg_match("/\b$pattern\b/i", $email, $match)){
		 	if(is_numeric($username)){
		 		if(strlen($username)==10){
		 			$_SESSION['username']=$username;
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
		 else{


		 	session_destroy();


		 	header("location:index.php?notwebmail");
		 }
       
	}
?>