<?php 
include 'class_login.php';
$login = new Login();
$login->connect();

foreach ($login->get_niy_dosen() as $key1) {
	$password = $login->create_random_password(8);
	$login->insert_tabel_login($key1['niy'],$password,'dosen','baru');
}
?>