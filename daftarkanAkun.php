<?php
 include 'class_login.php';
$login = new Login();
$login->connect();

if(isset($_POST['username'])){

	$username=$_POST['username'];
	$password=$_POST['password'];
	$ulangpsw=$_POST['ulang-password'];
}
$dataAkun=$login->searchUser($username);
	$cekAkun=mysqli_num_rows($dataAkun);

if($cekAkun>0){
	header("location:formInputAkun.php?fail-usr");
}
else{
		if($password != $ulangpsw){
			header("location:formInputAkun.php?fail-psw");
		}
		else{
				$login->insert_tabel_login($username,$password,'mahasiswa','baru');
				header("location:loginformV2.php?succes");
		}
}
?>