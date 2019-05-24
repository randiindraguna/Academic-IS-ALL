<?php 
include 'class_login.php';
$login = new Login();
$login->connect();
session_start();

if(isset($_POST['username'])){

	$username=$_POST['username'];
	$password=$_POST['password'];
}

	$dataAkun=$login->searchAkun($username,$password);
	$cekAkun=mysqli_num_rows($dataAkun);
	
	// $dataDosen=$login->searchAkunDosen($username);
	// $cekDosen=mysqli_num_rows($dataDosen);

	// $dataMahasiswa=$login->searchAkunMahasiswa($username);
	// $cekMahasiswa=mysqli_num_rows($dataMahasiswa);
	//echo"$cekAkun,$cekMahasiswa,$cekDosen";
	if($cekAkun>0)
	{
					$_SESSION['username']=$username;
					$_SESSION['status']="login";

					foreach ($login->getLevelAkun($username) as $who) 

				if($who['level']=="admin")
				{
					header("location:pengelola/index.php");
				}
				else if($who['level']=="dosen")
				{
					header("location:dosen/index.php");
				}
				else if($who['level']=="mahasiswa")
				{  
				   header("location:mahasiswa/index.php");
				}
				else
				{	
					session_destroy();
					header("location:index.php?fail");
				}
	}
	else
	{
		header("location:index.php?fail");
	}
	


?>