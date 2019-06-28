<?php 
	
	class Login
	{
		
		private $user, $pass, $host, $db, $result, $conn;

		function __construct(){
			$this->host = "localhost";
			$this->user = "root";
			$this->pass = "";
			$this->db = "manajemen_skripsi_prpl";
		}
		public function connect(){
			$this->conn = mysqli_connect($this->host,$this->user,$this->pass,$this->db);
		} 

		public function execute($query){
			$this->result = mysqli_query($this->conn, $query);
		}


		public function searchAkun($username,$password){
			$query = "SELECT * from login where user_name='$username' and password='$password'";
			$this->execute($query);
			return $this->result;
		}

		public function searchUser($username){
			$query = "SELECT * from login where user_name='$username'";
			$this->execute($query);
			return $this->result;
		}
		// public function searchAkunDosen($username){
		// 	$query = "SELECT niy from dosen where niy='$username'";
		// 	$this->execute($query);
		// 	return $this->result;
		// }
		// public function searchAkunMahasiswa($username){
		// 	$query = "SELECT nim from mahasiswa_metopen where nim='$username'";
		// 	$this->execute($query);
		// 	return $this->result;
		// }
		
		public function getLevelAkun($username){
			$query = "SELECT level from login where user_name='$username'";
			$this->execute($query);
			return $this->result;
		}

		public function get_niy_dosen()
		{
			$query = "SELECT niy from dosen";
			$this->execute($query);
			return $this->result;
		}
		public function get_nim_mahasiswa()
		{
			$query = "SELECT nim from mahasiswa_metopen";
				$this->execute($query);
			return $this->result;
		}
		public function create_random_password($jumlah_karakter)
		{
			$karakter = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			$password =  array();
			$karakterLength = strlen($karakter)-1;
			for($i=0; $i<$jumlah_karakter; $i++)
			{
				$n = rand(0, $karakterLength);
				$password[] = $karakter[$n];
			}
			return implode($password);
		}
		public function insert_tabel_login($username,$password,$level,$status_akun)
		{
			$query = "INSERT INTO login values ('$username','$password','$level','$status_akun')";
				$this->execute($query);
			return $this->result;
		}


	}


?>