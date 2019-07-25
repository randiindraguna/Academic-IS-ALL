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

		//nurzaitunsafitri1700018140
		//fungsi digunakan untuk mengambil data dosen berdasarkan email dengan kondisi jika email benar atau email pengguna cocok dengan email yang ada di database
		//fungsi ini digunakan ketika dosen login menggunakan google API
		public function get_data_dosen_byEmail($email){
			$query = "SELECT * FROM dosen WHERE email = '$email'"; //sebagai query database untuk SELECT data berdasarkan email
			$this->execute($query); //untuk mengeksekusi query
			return $this->result; //sebagai return hasil
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

		//nofand1700018152 
		//penjelasan : fungsi ini digunakan pada list_password_dosen.php untuk menampilkan username dan password dosen yang belum mengubah passwordnya atau masih menggunakan password default
		public function get_data_akun($level,$status_akun){
			$query = "SELECT * FROM login where level='$level' and status_akun='$status_akun'";
			$this->execute($query);
			return $this->result;
		}
		
		public function getLevelAkun($username){
			$query = "SELECT level from login where user_name='$username'";
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

		//fungsi ini dibuat oleh Arifaleo Nurdin (1700018158)
		//fungsi ntuk mengganti password
		public function ganti_password($username,$new_password,$status_akun)
		{
			$query = "UPDATE login SET password = '$new_password',status_akun='$status_akun' where user_name = '$username' ";
			$this->execute($query);
			return $this->result;
		}


	}


?>