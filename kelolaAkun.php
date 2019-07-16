<?php 
include 'database.php';
include 'class_login.php';
$login1 = new Database();
$login1->connect();
$login2 = new Login();
$login2->connect();

foreach ($login1->getDosen() as $key) {
	$password = $login2->create_random_password(8);
	$login2->insert_tabel_login($key['niy'],$password,'dosen','baru');
}
?>