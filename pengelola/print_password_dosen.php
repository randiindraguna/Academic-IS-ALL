<?php 
require_once('../class_login.php');

  $akses = new Login();
  $akses->connect();
 
// mengaktifkan session
session_start();
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] == "login"){
  // menampilkan pesan selamat datang
  //echo "Hai, selamat datang ". $_SESSION['username'];
}else{
  header("location:../index.php");
}
?>

<html>
<head>

	<style>
	.tablex, .tdx, .trx {
		border: 1px solid black;
	}
	
	#cl {
		background-color: #DCDCDC;
	}
	.tablex {
		border-collapse: collapse;
		width: 100%;
	}
	.trx {
  		height: 50px;
	}
</style>
	<title></title>
</head>
<body onLoad=window.print()>
	<center>
	<table class='tablex'cellpadding='5'>
		<tr  class='trx' id='cl'>
			<td  class='tdx'>Username</td>
			<td  class='tdx'>Password</td>
			<td  class='tdx'>No</td>
		</tr>
		<?php
			$i=0;
			foreach ($akses->get_data_akun('dosen','baru') as $key) {
				$i=$i+1;
				echo "
				<tr  class='trx'>
					<td  class='tdx'>$i</td>
					<td  class='tdx'>$key[user_name]</td>
					<td  class='tdx'>$key[password]</td>
				</tr>
				";
			}
		?>
	</table>
</center>
</body>
</html>