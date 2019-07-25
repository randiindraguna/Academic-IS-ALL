<?php 

/*
		class ini digunakan untuk membuat beberapa fungsi yang berguna untuk mengakses tabel login (mengelola akun) pada database
	    manajemen_skripsi_prpl seperti mengisi data, mengambil data dan mengupdate data dari tabel Sehingga SIMBIS dapat diakses oleh user.

		yang terlibat pada class ini:
		Abdun fattah yolandanu (1700018168) = 5 fungsi
		nurzaitun safitri (1700018140) 		= 1 fungsi 
		nofand (1700018152) 				= 1 fungsi 
		Arifaleo Nurdin (1700018158) 		= 1 fungsi
		
					   total fungsi ada 11 => 8 + (fungsi construct, fungsi connect, fungsi execute)


*/
	
	class Login
	{
		
		private $user, $pass, $host, $db, $result, $conn; // variabel yang bersifat private yang hanya dapat di akses di dalam class Database ini saja
		function __construct(){ // fungsi yang akan pertamakali di eksekusi ketika class Database ini di inisialisasikan
			$this->host = "localhost"; // mengisi variabel host dengan  "localhost"
			$this->user = "root";  // mengisi variabel user dengan " root " 
			$this->pass = ""; // mengisi variabel pass " " (kosong)
			$this->db = "manajemen_skripsi_prpl"; // mengisi variabel database dengan nama database di server localhost
		}
		public function connect(){ 
			$this->conn = mysqli_connect($this->host,$this->user,$this->pass,$this->db); // fungsi untuk menghubungkan database ke program web ini
		} 

		public function execute($query){ 
			$this->result = mysqli_query($this->conn, $query);  // fungsi untuk mengeksekusi query query yang diberikan
		}

		//dibuat oleh Abdun Fattah Yolandanu (1700018168)
		//fungsi ini digunakan ketika user sedang login. fungsi akan mencari data dari tabel login berdasarkan username dan password yang 
		//user inputkan melalui form login. apabila username dan password ada di dalam database maka user dapat masuk ke dalam SIMBIS.
		public function searchAkun($username,$password){
			$query = "SELECT * from login where user_name='$username' and password='$password'"; //query untuk men select semua data tabel login berdasarkan username dan password
			$this->execute($query); //mengeksekusi query
			return $this->result;// return hasil
		}

		//dibuat oleh Abdun Fattah Yolandanu (1700018168)
		//fungsi ini digunakan ketika user sedang membuat akun baru. apabila user menginputkan username yang telah ada pada database,
		//maka program akan memberitahukan kepada user bahwa username sudah digunakan.
		public function searchUser($username){
			$query = "SELECT * from login where user_name='$username'"; //query untuk menselect semua data login berdasarkan username
			$this->execute($query); //mengeksekusi query
			return $this->result; //return hasil
		}

		//nurzaitunsafitri1700018140
		//fungsi digunakan untuk mengambil data dosen berdasarkan email dengan kondisi jika email benar atau email pengguna cocok dengan email yang ada di database
		//fungsi ini digunakan ketika dosen login menggunakan google API
		public function get_data_dosen_byEmail($email){
			$query = "SELECT * FROM dosen WHERE email = '$email'"; //sebagai query database untuk SELECT data berdasarkan email
			$this->execute($query); //untuk mengeksekusi query
			return $this->result; //sebagai return hasil
			}
		
		//nofand1700018152 
		//penjelasan : fungsi ini digunakan pada list_password_dosen.php untuk menampilkan username dan password dosen yang belum mengubah passwordnya atau masih menggunakan password default
		public function get_data_akun($level,$status_akun){
			$query = "SELECT * FROM login where level='$level' and status_akun='$status_akun'"; //query untuk select login dimana level dan status_akun digabungkan menjadi status_akun
			$this->execute($query); //mengeksekusi query
			return $this->result; //return hasil
		}
		
		//dibuat oleh Abdun Fattah Yolandanu (1700018168)
		//fungsi ini digunakan untuk mengambil data level user dari tabel login. level tersebut adalah 'mahasiswa','dosen',dan 'admin'
		//level akan digunakan saat percabangan menentukan lokasi file mana yang akan dikunjungi oleh user tergantung pada siapa user yang melakukan login
		public function getLevelAkun($username){
			$query = "SELECT level from login where user_name='$username'"; //query untuk select level berdasarkan username
			$this->execute($query); //mengeksekusi query
			return $this->result; //return hasil
		}

		//dibuat oleh Abdun Fattah Yolandanu (1700018168)
		//fungsi ini digunakan untuk menciptakan password secara acak sebagai password default yang akan diberikan oleh Admin SIMBIS kepada dosen
		//hal ini karena dosen tidak melakukan registrasi akun dan Data dosen sebelumnya sudah di input secara manual ke dalam database
		public function create_random_password($jumlah_karakter) // parameter  $jumlah_karakter adalah banyak karakter password yang akan dibuat
		{
			$karakter = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; //inisialisasi variabel $karakter dengan mengisi value karakter alfabet a-z dan A-z serta angka 1-9
			$password =  array(); //menginisialisasi variabel $password sebagai array
			$karakterLength = strlen($karakter)-1; //inisialisasi variabel $karakterLength dengan mengisi value (panjang karakter - 1)
			for($i=0; $i<$jumlah_karakter; $i++) //perulangan dilakukan sebanyak jumlah karakter yang sudah ditentukan
			{
				$n = rand(0, $karakterLength); //$n adalah variabel yang akan diisi nilai acak dari panjang karakter pada variabel $karakter. 
				$password[] = $karakter[$n]; //variabel array $password[] akan diisi oleh $karakter[$n]. dimana $n digunakan sebagai index array dari $karakter[]
			}
			return implode($password); //isi array $password disatukan atau mengubah array menjadi variabel biasa dengan nilai yang disatu padukan. inilah yang menjadi password acak dosen
		}

		//dibuat oleh Abdun Fattah Yolandanu (1700018168)
		//fungsi ini digunakan ketika user mendaftarkan akun ke database melalui form pendaftaran akun baru / fungsi untuk membuat akun
		public function insert_tabel_login($username,$password,$level,$status_akun)
		{
			$query = "INSERT INTO login values ('$username','$password','$level','$status_akun')"; //query insert table login
				$this->execute($query); //mengeksekusi query
			return $this->result; //return hasil
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