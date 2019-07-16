<?php 
include 'database.php';
$login = new Database();
$login->connect();

foreach ($login->getDosen() as $key) {
	$password = $login->create_random_password(8);
	$login->insert_tabel_login($key['niy'],$password,'dosen','baru');
}
?>