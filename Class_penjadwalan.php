<?php 

	require_once('database.php'); // menyertakan file database.php ke dalam file ini. 

	// UTS-1700018167-Adhymas Fajar Sudrajat-dmonh3h3
	// UTS-1700018141-Siti apryanti k -sitiapryantii
	// UTS-1700018174-M Andika Riski-Andikariski
	// UTS-1700018144-M Yulianto Andi S-LianEx
	// UTS-1700018116-Nanda Suci -nandasuci
	// UTS-1700018118-Adil Baihaqi-adilbaihaqi
	// UTS-1700018133-Sandy Valentino G-iamsand
	// UTS-1700018148-Abima Febrian Nugraha-aimfn(abima febrian nugraha)


	// class penjadwalan ini berguna untuk menampung semua fungsi fungsi yang berkaitan dengan fitur penjadwalan
	// serta didalam class penjadwalan ini mengekstend file database.php untuk mengambil class Database guna untuk memakai fungsi yang telah kita buat
	// __construct() , connect() dan eksekusi(), sebagai untuk connect ke database sql dan eksekusi query. untuk di class penjadwalan terdapat 30 function 
	// untuk setiap penjelasannya ada pada barisan function tersebut yang sudah di jelaskan oleh tiap anggota kelompok berdasarkan function yang di buatnya.
	
class Penjadwalan extends Database{ 
	public function __construct(){
		parent::__construct();	
	}
	
	// Menghirung Banyaknya Baris dari query yg dieksekusi
	public function hitung_row($sql)
	{
		// 1700018167-Adhymas Fajar Sudrajat-dmonh3h3(Adhymas Fajar Sudrajad)
		// UTS_Adhymas Fajar Sudrajad_1700018167
		$result=mysqli_num_rows($sql); // Untuk Mendapatkan Jumlah Baris Dari parameter $sql yang telah di eksekusi
		return $result; // Untuk mengembalikan nilai dari hasil Jumlah Baris Querry yg dieksekusi diatas
	}
	
	
	//1700018148-Abima Febrian Nugraha-aimfn(abima febrian nugraha)
	public function createIdJadwal($id, $penguji1, $penguji2, $tanggal, $jam, $tempat)
	{ // Membuat id_jadwal berdasarkan id, niy penguji, tanggal, dan tempat.
		$id_jadwal 	= $id; //mengisi variabel id_jadwal dengan variabel id
		$id_jadwal .= substr($penguji1,-3,8); //menambah kata dalam variabel id_jadwal dengan variabel penguji1 dimana berisi niy yang hanya diambil 3 digit pertama
		$id_jadwal .= substr($penguji2,-3,8); //menambah kata dalam variabel id_jadwal dengan variabel penguji2 dimana berisi niy yang hanya diambil 3 digit pertama
		$id_jadwal .= substr($tanggal,8,10); //menambah kata dalam variabel id_jadwal dengan variabel tanggal dimana berisi niy yang hanya diambil 2 digit terakhir
		$id_jadwal .= $jam; //menambah kata dalam variabel id_jadwal dengan variabel jam
		$id_jadwal .= $tempat; //menambah kata dalam variabel id_jadwal dengan variabel tempat
		return $id_jadwal; //mengembalikan nilai dari variabel id_jadwal


	}
	public function insertJadwal($id_jadwal,$jenis_ujian,$nim,$tanggal,$jam,$tempat)
	{
		// 1700018116-Nanda Suci Pratwi-nandasuci
		$query = "INSERT INTO `penjadwalan` (`id_jadwal`, `jenis_ujian`, `nim`, `tanggal`, `jam`, `tempat`) 
		-- berfungsi untuk digunakan memasukkan data ke pada database.
		VALUES ('$id_jadwal', '$jenis_ujian', '$nim', '$tanggal', '$jam', '$tempat')";
		$this->eksekusi($query); // digunakan untuk mengeksekusi query
	}
	
	// Insert Dosen Uji ke database
	public function insertPenguji($id_jadwal,$niy)
	{
		//1700018116-Nanda Suci Pratwi-nandasuci
		$query = "INSERT INTO `penguji` (`id_penguji`, `id_jadwal`, `niy`) VALUES (NULL, '$id_jadwal', '$niy')"; //query ini berfungsi untuk menghubungkan
		$this->eksekusi($query); //funsi ini untuk mengembalikan hasil eksekusi fungsi ini
	}
	public function getDataPenjadwalanByNIM($nim) // fungsi ini berfungsi untuk melihat atau menampilkan jadwal yang diambil dari nim dan ditampilkan di tabel penjadwalan
	{
		// 1700018133-Sandy Valentino G-iamsand
		$query = "SELECT penjadwalan.id_jadwal,penjadwalan.jenis_ujian,penjadwalan.nim,penjadwalan.tanggal,penjadwalan.jam,penjadwalan.tempat from penjadwalan where nim='$nim'"; // query ini yg berfungsi mengambil data dari table penjadwalan melalui nim
		$result= $this->eksekusi($query); // ini untuk mengeksekusi
		return $result; // untuk mengembalikan nilai
	}
	
	// Mengambil seluruh Data Mahasiswa Dan Jadwal
	public function getDataALLMahasiswaByNim($nim){
		// 1700018167-Adhymas Fajar Sudrajat-dmonh3h3(Adhymas Fajar Sudrajad)
		// UTS_Adhymas Fajar Sudrajad_1700018167
		$query = "SELECT mahasiswa_metopen.nim,mahasiswa_metopen.nama as nama,mahasiswa_metopen.topik,mahasiswa_metopen.dosen,dosen.niy as niy,dosen.nama as nama_dosen,dosen.email,dosen.bidang_keahlian,penjadwalan.id_jadwal,penjadwalan.jenis_ujian,penjadwalan.tanggal,penjadwalan.jam,penjadwalan.tempat,penguji.niy as niy_dosen_penguji FROM mahasiswa_metopen JOIN dosen on dosen.niy = mahasiswa_metopen.dosen 
			JOIN penjadwalan ON penjadwalan.nim = mahasiswa_metopen.nim 
			JOIN penguji ON penguji.id_jadwal = penjadwalan.id_jadwal 
			-- JOIN dosen_penguji ON penguji.niy=  dosen_penguji.niy_dosen_penguji
			WHERE mahasiswa_metopen.nim='$nim' order BY penjadwalan.tanggal DESC limit 1";// Querry ini mengambil seluruh atribut dari tabel mahasiswa_metopen,Dosen,Penjadwalan,Penguji,Dosen_Penguji namun dengan syarat atribut nim di tabel mahasiswa_metopen harus sama dengan parameter nim yg diberikan.
		//  cek penguji dan mahasiswa
		$sql=$this->eksekusi($query);// Mengeksekusi Querry diatas dan variabel $sql diisi oleh hasil Eksekusi Querry
		$hasil=$this->hitung_row($sql);// Menghitung Querry Diatas dan variabel $hasil diisi oleh hasil Eksekusi hitung row
		// cek Jadwal dan Mahasiswa
		$sql2=$this->getDataPenjadwalanByNIM($nim); //Menmanggil funtion getDataPenjadwalanByNIM dengan parameter yg sama $nim dan nilai $sql2 diisi oleh hasil dari panggil function
		$hasil_ceknim=$this->hitung_row($sql2); // Menghitung jumlah baris dari hasil eksekusi di getDataPenjadwalanByNIM
		if($hasil > 0 && $hasil_ceknim > 0){// Jika Jmlh Baris dari hasil querry dan pemanggilan function getDataPenjadwalanByNIM > 0
			// Maka
			$hasil=$this->eksekusi($query);// Mengeksekusi Querry diatas
			foreach ($hasil as $key) {// Diulangi Hasil eksekusi diatas sebanyak baris yg ada sebagai key
				// Session disini untuk menyimpan dengan jangka waktu tertentu pada browser atau menginisialisasi agar session ini bisa dipindah pd variabel program
				$_SESSION['masuk']=1;// mendaftarkan sebuah session masuk dengan nilai 1
				$_SESSION['nim']=$key['nim'];// mendaftarkan session nim dengan key['nim'] dari atribut nim di tabel mahasiswa_metopen
				$_SESSION['nama']=$key['nama'];// mendaftarkan session nama dengan key['nama'] dari atribut nama di tabel mahasiswa_metopen
				$_SESSION['topik']=$key['topik'];// mendaftarkan session topik dengan key['topik'] dari atribut topik di tabel dosen
				$_SESSION['dosen']=$key['dosen'];// mendaftarkan session dosen dengan key['dosen'] dari atribut nama_dosen di tabel dosen
				$_SESSION['niy']=$key['niy'];// mendaftarkan session niy dengan key['niy'] dari atribut niy di tabel dosen
				$_SESSION['nama_dosen']=$key['nama_dosen'];// mendaftarkan session nama_dosen dengan key['nama_dosen'] dari atribut nama_dosen di tabel dosen
				$_SESSION['email']=$key['email'];// mendaftarkan session email dengan key['email'] dari atribut email di tabel dosen
				$_SESSION['bidang_keahlian']=$key['bidang_keahlian'];// mendaftarkan session bidang_keahlian dengan key['bidang_keahlian'] dari atribut bidang_keahlian di tabel dosen
				$_SESSION['id_jadwal']=$key['id_jadwal'];// mendaftarkan session id_jadwal dengan key['id_jadwal'] dari atribut id_jadwal di tabel penjadwaan
				$_SESSION['jenis_ujian']=$key['jenis_ujian'];// mendaftarkan session jenis_ujian dengan key['jenis_ujian'] dari atribut jenis_ujian di tabel penjadwaan
				$_SESSION['tanggal']=$key['tanggal'];// mendaftarkan session tanggal dengan key['tanggal'] dari atribut tanggal di tabel penjadwaan
				$_SESSION['jam']=$key['jam'];// mendaftarkan session jam dengan key['jam'] dari atribut jam di tabel penjadwaan
				$_SESSION['tempat']=$key['tempat'];// mendaftarkan session tempat dengan key['tempat'] dari atribut tempat di tabel penjadwaan
				$_SESSION['dosen_uji']=$key['niy_dosen_penguji'];// mendaftarkan session dosen_uji dengan key['niy_dosen_penguji'] dari atribut niy_dosen_penguji di tabel dosen_penguji
				return $hasil;// Mengembalikan nilai dari hasil eksekusi querry diatas
			}
			}else{
			$query = "SELECT mahasiswa_metopen.nim,mahasiswa_metopen.nama as nama,mahasiswa_metopen.topik,mahasiswa_metopen.dosen as niy,dosen.nama as nama_dosen,dosen.email,dosen.bidang_keahlian FROM mahasiswa_metopen JOIN dosen on dosen.niy = mahasiswa_metopen.dosen where mahasiswa_metopen.nim='$nim'";// Querry untuk mengambil semua atribut dari tabel mahasiswa_metopen,dosen dengan syarat nim mahasiswa metopen harus sama dengan parameter $nim
			$hasil=$this->eksekusi($query);// Menjalankan querry diatas
			foreach ($hasil as $key) {	
				// Session disini untuk menyimpan dengan jangka waktu tertentu pada browser atau menginisialisasi agar session ini bisa dipindah pd variabel program
				$_SESSION['masuk']=2;// mendaftarkan sebuah session masuk dengan nilai 2
				$_SESSION['nim']=$key['nim'];// mendaftarkan session nim dengan key['nim'] dari atribut nim di tabel mahasiswa_metopen
				$_SESSION['nama']=$key['nama'];// mendaftarkan session nama dengan key['nama'] dari atribut nama di tabel mahasiswa_metopen
				$_SESSION['topik']=$key['topik'];// mendaftarkan session topik dengan key['topik'] dari atribut topik di tabel dosen
				$_SESSION['niy']=$key['niy'];// mendaftarkan session niy dengan key['niy'] dari atribut niy di tabel dosen
				$_SESSION['nama_dosen']=$key['nama_dosen'];// mendaftarkan session nama_dosen dengan key['nama_dosen'] dari atribut nama_dosen di tabel dosen
				$_SESSION['email']=$key['email'];// mendaftarkan session email dengan key['email'] dari atribut email di tabel dosen
				$_SESSION['bidang_keahlian']=$key['bidang_keahlian'];// mendaftarkan session bidang_keahlian dengan key['bidang_keahlian'] dari atribut bidang_keahlian di tabel dosen
				}	
			return $hasil;// Mengembalikan nilai dari hasil eksekusi querry diatas
			}
	}
	public function getDataStatusSemprop($nim) // fungsi ini berfungsi untuk melihat status mahasiswa yang ada di navbar penjadwalan baik itu berstatus lulus atau tidak lulus atau tidak berstatus 
	{
		// 1700018133-Sandy Valentino G-iamsand
		$query = "SELECT seminar_proposal.status as status_sp from seminar_proposal where nim=$nim"; // query ini berfungi untuk mengambil data dari table seminar_proposal dan status lalu kolom status di dirubah nama nya menjadi status_sp yg akan dicek melalui nim
		$result= $this->eksekusi($query); // ini untuk mengeksekui query
		return $result; // untuk mengembalikan nilai
	}
	// public function getDosenUjibyNiy($nim) // function untuk menampilkan dosen penguji dengan niy dan menampilkan data mahasiswa  yang akan dia uji 
	// {
	// 	//1700018141-sitiapryanti-sitiapryantii
	// 	$query = "SELECT dosen.nama as nama_dosen,dosen.niy FROM dosen JOIN penguji on dosen.niy = penguji.niy JOIN penjadwalan on penjadwalan.id_jadwal = penguji.id_jadwal 
	// 	JOIN mahasiswa_metopen on mahasiswa_metopen.nim = penjadwalan.nim WHERE mahasiswa_metopen.nim=$nim"; // query mengambil data dosen, data jadwal mahasiswa berdasarkan nim, dan dosen dapat melihat mahasiswa mana yang kan dia uji 
	// 	$hasil=$this->eksekusi($query); // mengeksekusi query yang telah di buat
	// 	return $hasil; // pengembalian dari query yang di panggil
	// }

	public function getDataBanyakRuangDalamSehari($tanggal){
			//1700018174-M Andika Riski-Andikariski
			//Fungsi untuk menghitung banyaknya ruang dalam sehari atau setiap tanggal akan di hitung jumlah ruangan yang terpakai  
   //         $query="SELECT SUBSTRING(id_jadwal, 12, 1)AS id_jadwal, COUNT(*)as hitung,penjadwalan.tempat FROM penjadwalan WHERE 
		 //   SUBSTRING(id_jadwal, 9, 2) GROUP BY SUBSTRING(id_jadwal, 12, 1)";
			// $sql = $this->eksekusi($query);
			// while ($row = $sql->fetch_assoc()){
			// 	// echo $row['id_jadwal'];
			// 	// echo $row['hitung'];
			// 	// echo"<br>";
			// } 
			// if(!$sql) {
			// 	// echo "tidak ditemukan";
			// }
			$query = "SELECT COUNT(*)as hitung,penjadwalan.tempat FROM penjadwalan WHERE penjadwalan.tanggal = '$tanggal'";
			$sql=$this->eksekusi($query);
			return $sql;   
	}
	
	public function cekRuangDalamSehari($ruang,$tanggal)
	{
		// 1700018167-Adhymas Fajar Sudrajat-dmonh3h3(Adhymas Fajar Sudrajad)
		// UTS_Adhymas Fajar Sudrajad_1700018167
		$db_RuangDalamSehari = $this->getDataBanyakRuangDalamSehari($tanggal);//Memanggil fucntion getDataBanyakRuangDalamSehari dengan parameter $tanggal yg sama dari fucntion pemanggil
		foreach ($db_RuangDalamSehari as $key) {// dilakukan perulangan sebanyak baris reccord yg didapat dan dimasalkan sebagai $key
			if($ruang==$key['tempat'] && $key['hitung'] >= 3){// Jika ruang sama dengan isi dari atribut tempat($key['tempat']) dan hasil dari atribut hitung($key['hitung']) lebih dari atau sama dengan 3 maka
				return false;// mengembalikan nilai salah
				break;// function dihentikan;
			}
		}
		return true;//mengembalikan nilai benar
	}

	// function untuk mengambil data daftar dosen beserta jumlah mengujinya berdasarkan tanggal
	public function getDataBanyakPengujiDalamSehari($tgl)
	{
		//1700018144-M Yulianto Andi S-LianEx
		$query = "SELECT penguji.niy as niy, (SELECT count(*) from penguji where penguji.niy = dosen.niy ) as jumlahMenguji
			-- from dosen_penguji join penguji on dosen_penguji.niy_dosen_penguji = penguji.niy
			
			from dosen join penguji on dosen.niy = penguji.niy 
			join penjadwalan on penguji.id_jadwal = penjadwalan.id_jadwal and  penjadwalan.tanggal = '$tgl'
			
			-- join dosen on penguji.niy = dosen.niy 
			GROUP BY penguji.niy "; // query untuk mengambil data niy,nama dosen, dan jumlah menguji berdasarkan tanggal
		$hasil=$this->eksekusi($query); // mengeksekusi query yang telah di buat
		return $hasil; // mengembalikan nilai dari query yg telah di eksekusi

	}

	public function CekPengujiDalamSehari($niy,$tanggal)
	{ // function untuk mengecek apakah dosen dalam hari itu masih bisa menguji
		//1700018148-Abima Febrian Nugraha-aimfn(abima febrian nugraha)
		$db_DosenDalamSehari = $this->getDataBanyakPengujiDalamSehari($tanggal); // mengambil data banyak penguji dalam sehari lalu disimpan dalam variabel $db_DosenDalamSehari
		foreach ($db_DosenDalamSehari as $key) {
			if($niy==$key['niy'] && $key['jumlahMenguji'] >= 3){ // mengecek apakah dosen dengan niy tersebut tidak lebih dari 3 kali menguji
				return false; //mengembalikan nilai salah
				break;
			}
		}
		return true; // mengembalikan nilai benar
	}
	
	public function getDataBanyakWaktuDalamSehari($tgl) // function untuk menampilkan pada tanggal sekian, dan jam sekian ada berapa banyak yang di uji
	{
		//1700018141-siti apryanti-sitiapryantii
		$query = "SELECT tanggal,jam, COUNT(*) as banyak FROM penjadwalan WHERE tanggal='$tgl' GROUP BY jam";
  	$result=$this->eksekusi($query); // query mengambil tanggal dan jam pada tabel penjadwalan lalu di jumlahkan  dan di kelompokan berdasarkan jam 
		return $result; // pengembalian query dari query yang kita panggil
	} 
	
	public function cekRuangWaktuDalamSehari($ruang,$waktu,$tanggal){ // Mengecek dalam tanggal tersebut apakah ada ruang dan waktu yang tabrakan atau sama
		//1700018148-Abima Febrian Nugraha-aimfn(abima febrian nugraha)
		$query = "SELECT jam,tempat FROM penjadwalan WHERE tanggal='$tanggal'"; //query untuk mengambil data jam dan tempat dari tabel penjadwalan berdasarkan tanggal
		$result=$this->eksekusi($query); //mengeksekusi query diatas
		foreach ($result as $key) { //melakukan perulangan sebanyak data yg ada divariabel result
			if($ruang==$key['tempat'] && $waktu==$key['jam']){ //mengecek apakah dari database ada tempat dan waktu yang sama di tanggal tersebut
				return false; //mengembalikan nilai salah
				break;
			}
		}
		return true; //mengembalikan nilai benar
	}
	
	public function cekDuaPengujiYangSama($penguji1,$penguji2) // fungsi ini untuk mengecek apakah ada dua penguji yang sama atau tidak.
	{
		//1700018118-Adil Baihaqi-adilbaihaqi
		if($penguji1==$penguji2){ // jika penguji 1 sama dengan penguji 2, maka data gagal disimpan ke database.
			return false;
		}else{ // jika penguji 1 dan penguji 2 berbeda, maka data berhasil disimpan ke database.
			return true;
		}
	}

	

	public function cekWaktuDalamSehari($waktu,$tanggal) // fungsi ini untuk mengecek apakah jadwal dalam sehari yang sama dengan batas maksimal 3 jadwal.
	{
		//1700018118-Adil Baihaqi-adilbaihaqi
		$db_WaktuDalamSehari = $this->getDataBanyakWaktuDalamSehari($tanggal);
		foreach ($db_WaktuDalamSehari as $key) { // mengecek jika dalam sehari maksimal 3 jadwal.
			if($waktu==$key['jam'] && $key['banyak'] >= 3){ // jika jadwal(waktu dan tanggal) sudah maksimal 3, maka data gagal disimpan ke database.
				return false;
				break;
			}
		}
		return true;
	}

	
	public function cekKuotaPenguji($niy){// function untuk mengecek kuota penguji
		//1700018144-M Yulianto Andi S-LianEx
		$query = "SELECT count(*) as jumlahMenguji
					
					-- from dosen_penguji join penguji on dosen_penguji.niy_dosen_penguji = penguji.niy
					from dosen join penguji on dosen.niy = penguji.niy 
					-- join dosen on penguji.niy = dosen.niy 
					join penjadwalan on penguji.id_jadwal = penjadwalan.id_jadwal and  penguji.niy = '$niy' ";
					// query untuk mengambil kuota penguji berdasarkan niy
		$this->eksekusi($query);
		
		foreach ($this->result as $kuota) {
			# code...
			if($kuota[jumlahMenguji]<=3) // mengecek kuota penguji dari apakah <=3
			{
				return true; // mengembalikan nilai true kalau benar
			}else
			{
				return false; // kalau salah mengembalikan nilai false
			}
		}
	
	} 


    

	public function cekNimdataYangSama($nim){
		   //1700018174-M Andika Riski-Andikariski
		   //Fungsi untuk mengecek nim dari database dengan nim yang akan di inputkan user
       		$query="SELECT nim from penjadwalan WHERE nim = $nim";
			$sql = $this->eksekusi($query);
			$ketemu = true;
			if ($row = $sql->fetch_assoc()){
				if(sizeof($row) > 0){
					return true;
					// echo $row['nim'];
				}
			} 
			else {
				return 0;
				// echo "tidak ditemukan";
			}
	   }

	public function getDosenPengujibyNIY($niy){
		//1700018174-M Andika Riski-Andikariski
		//Fungsi untuk menampilkan daftar dosen penguji dari database kemudian di tampilkan di menu pemilihan dosen penguji.
			$query = "SELECT dosen.nama as nama_dosen,dosen.niy from dosen  WHERE dosen.niy = $niy";
			$sql = $this->eksekusi($query);
			return $sql;
		}

	// edit
	public function getAllDosenKecualiSatuDosen($niy){
		//1700018174-m Andika Riski-Andikariski
		//Fungsi untuk menampilkan nama dosen penguji tanpa menampilkan nama dosen sebelumnya saat mau di edit
		$query ="SELECT dosen.niy,dosen.nama as nama_dosen,dosen.email,dosen.bidang_keahlian FROM dosen  
		WHERE NOT dosen.niy='$niy'";
		$sql = $this->eksekusi($query);
		return $sql;
		}



	public function getDataJadwal(){            // fungsi untuk menampilkan seluruh jadwal dari database dan di tamplkan pada halaman web
		//1700018141-siti apryanti K- sitiapryantii
		$query ="SELECT * FROM `penjadwalan`"; //  query atau sintax untuk mengambil data jadwal dari tabel penjadwalan
		$sql = $this->eksekusi($query);        // mengeksekusi apakah query yang kita buat itu benar
		return $sql;                           // pengembalian terhadap query yang di panggil 
	}
	
	public function getJadwalByIDJadwal($id_jadwal) // fungsi ini untuk menampilkan data jadwal berdasarkan idjadwal yang sudah ada didatabase.
	{
	//1700018118-Adil Baihaqi-adilbaihaqi
			// query ini untuk mengambil data jadwal berdasarkan idjadwal
			$query = "SELECT 
			mahasiswa_metopen.nim,mahasiswa_metopen.nama as nama,mahasiswa_metopen.topik,mahasiswa_metopen.dosen as dosen ,dosen.niy,dosen.nama as nama_dosen,dosen.email,dosen.bidang_keahlian,penguji.niy as niy_dosen_penguji,penjadwalan.id_jadwal,penjadwalan.jenis_ujian,penjadwalan.nim,penjadwalan.tanggal,penjadwalan.jam,penjadwalan.tempat 

			-- FROM mahasiswa_metopen JOIN dosen on dosen.niy = mahasiswa_metopen.dosen 
			FROM dosen join mahasiswa_metopen on dosen.niy = mahasiswa_metopen.dosen
			JOIN penjadwalan ON penjadwalan.nim = mahasiswa_metopen.nim 
			JOIN penguji ON penguji.id_jadwal = penjadwalan.id_jadwal 
			-- JOIN dosen_penguji ON penguji.niy=  dosen_penguji.niy_dosen_penguji 
			where penjadwalan.id_jadwal='$id_jadwal'";
		$hasil = $this->eksekusi($query);		
		foreach ($hasil as $key) { // untuk menampilkan data array pada database
				$_SESSION['masuk']=1;
				$_SESSION['nim']=$key['nim'];
				$_SESSION['nama']=$key['nama'];
				$_SESSION['topik']=$key['topik'];
				$_SESSION['dosen']=$key['dosen'];
				$_SESSION['niy']=$key['niy'];
				$_SESSION['nama_dosen']=$key['nama_dosen'];
				$_SESSION['email']=$key['email'];
				$_SESSION['bidang_keahlian']=$key['bidang_keahlian'];
				$_SESSION['id_jadwal']=$key['id_jadwal'];
				$_SESSION['jenis_ujian']=$key['jenis_ujian'];
				$_SESSION['tanggal']=$key['tanggal'];
				$_SESSION['jam']=$key['jam'];
				$_SESSION['tempat']=$key['tempat'];
				$_SESSION['dosen_uji']=$key['niy_dosen_penguji'];
		}
		return $hasil;
	}

	// public function getDataJadwalByID($id_jadwal) //fungsi ini berfungsi untuk menampilkan jadwal berdasarkan ID
	// {
	// 	$query ="SELECT * FROM `penjadwalan` where id_jadwal = '$id_jadwal'"; // query ini mengambil data dari table penjadwalan berdasarkan id
	// 	$sql = $this->eksekusi($query); // pengeksekusian query
	// 	return $sql; // pengembalian nilai
	// }
	
	public function getDataJadwalUjianPendadaran() // funsi untuk menampikkan seluruh jadwal ujian pendadaran
	{
		$query ="SELECT * FROM `penjadwalan` WHERE jenis_ujian = 'UNDARAN' ORDER BY penjadwalan.tanggal ASC"; // funsi untuk mengurutkan data dari terkecil hingga terbesar
		$sql = $this->eksekusi($query); // berfungsih untuk mengeksekusi query sql diatas yang telah dibuat
		return $sql; // pengembalian terhadap query yang di panggil 
	}

	public function getDataStatusPendadaran($nim)
	{ // Mengambil status pendadaran mahasiswa dengan nim apakah lulus atau gagal
		// Abima Nugraha
		$query = "SELECT ujian_pendadaran.status as status_up from ujian_pendadaran where ujian_pendadaran.nim='$nim'"; // query untuk mendapatkan status dari tabel ujian_pendadaran berdasarkan nim
		$result= $this->eksekusi($query); // mengeksekusi query diatas
		return $result; // mengembalikan nilai dari hasil eksekusi query
	}

	
	public function getDataJadwalSeminarProposal() // function untuk mengambil data jadwal seminar proposal
	{
		//1700018144-M Yulianto Andi S-LianEx

		$query ="SELECT mahasiswa_metopen.nim,mahasiswa_metopen.nama as nama,mahasiswa_metopen.topik,mahasiswa_metopen.dosen,dosen.niy,dosen.nama as nama_dosen,dosen.email,dosen.bidang_keahlian,penjadwalan.jenis_ujian,penjadwalan.tempat,penjadwalan.jam,penjadwalan.id_jadwal,penjadwalan.tanggal
		FROM mahasiswa_metopen join penjadwalan on mahasiswa_metopen.nim = penjadwalan.nim
		join penguji on penjadwalan.id_jadwal = penguji.id_jadwal
		-- join dosen_penguji on penguji.niy = dosen_penguji.niy_dosen_penguji
		join dosen on penguji.niy = dosen.niy 
        WHERE penjadwalan.jenis_ujian = 'SEMPROP' ORDER BY penjadwalan.tanggal ASC "; // query untuk mengambil semua data jadwal yang berjenis SEMPROP dan di sort berdasarkan tanggal terkecil
		$sql = $this->eksekusi($query); // mengeksekusi query kemudian di tampung variabel $sql
		return $sql;	// mengembalikan nilai dari hasil query tersebut
	}

	
	public function UpdateTabelPengujiByIdJadwal($id,$id_baru,$niy,$niy_baru)
	{
		//1700018144-M Yulianto Andi S-LianEx
		$this->eksekusi('SET foreign_key_checks = 0');
		$querry_penguji ="UPDATE `penguji` SET `id_jadwal` = '$id_baru',`niy`='$niy_baru' WHERE `penguji`.`id_jadwal` = '$id' AND penguji.niy='$niy'";		
		$result=$this->eksekusi($querry_penguji);
		$this->eksekusi('SET foreign_key_checks = 1');
		return $result;
	}
	public function caridatajadwal($key)
	{
		
		//1700018167-Adhymas Fajar Sudrajat-dmonh3h3(Adhymas Fajar Sudrajad)
		// UTS_Adhymas Fajar Sudrajad_1700018167
		$query =" SELECT * FROM `penjadwalan` WHERE 
				jenis_ujian LIKE '%$key%' OR 
				id_jadwal LIKE '%$key%' OR 
				tanggal LIKE '%$key%' OR 
				jam LIKE '%$key%' OR 
				tempat LIKE '%$key%' OR	
				NIM LIKE '%$key%' ";// Querry ini bekerja untuk mengambil data dari tabel penjadwalan dimana atribut jenis_ujian,id_jadwal,tanggal,jam,tempat,NIM seperti yg mirip dengan parameter $key yang berlebih didepan, maupun dibelakang
		$sql = $this->eksekusi($query);// variabel sql diisi dengan = hasil eksekusi dari query diatas
		return $sql;// Mengembalikan nilai dari variabel sql
	}
	public function UpdateTabelPenjadwalanByIdJadwal($id,$id_baru,$jenis_ujian,$nim,$tanggal,$waktu,$ruang)
	{
	
		//1700018167-Adhymas Fajar Sudrajat-dmonh3h3(Adhymas Fajar Sudrajad)
		// UTS_Adhymas Fajar Sudrajad_1700018167
		$querry_penjadwalan ="UPDATE `penjadwalan` SET `id_jadwal`='$id_baru',`jenis_ujian`='$jenis_ujian',`nim`='$nim',`tanggal`='$tanggal',`jam`='$waktu',`tempat`='$ruang' WHERE id_jadwal='$id'";// Querry ini untuk mengupdate tabel penjadwalan di setiap atributnya dengan syarat hanya baris yang id jadwal-nya harus sama dengan parameter $id		
		$result=$this->eksekusi($querry_penjadwalan);// variabel result diisikan oleh hasil dari eksekusi querry diatas
		return $result;// Mengembalikan nilai dari variabel result
	}
	

	public function getDosenJamTanggalSamaBedaRuang($niy,$jam,$ruang,$tgl)
	{
		//1700018118-Adil Baihaqi-adilbaihaqi
		$querry_penguji ="SELECT * FROM `penguji` JOIN penjadwalan ON penjadwalan.id_jadwal=penguji.id_jadwal WHERE Penjadwalan.tanggal='$tgl' AND penguji.niy='$niy' AND penjadwalan.jam='$jam'";	
		$result=$this->eksekusi($querry_penguji);
		return $result;
	}
	
	
	public function cekDosenJamTanggalSamaBedaRuang($niy,$jam,$ruang,$tgl)
	{		
	//1700018141-siti apryanti-sitiapryantii	
		$result=$this->getDosenJamTanggalSamaBedaRuang($niy,$jam,$ruang,$tgl);
		$result=$this->hitung_row($result);
		if ($result>0) {
			return false;
		}else{
			return true;
		}
	}
	
	
	public function getDataDosenPenguji1byIdJadwal($id_jadwal)
	{
		// 1700018133-Sandy Valentino G-iamsand
		$query ="SELECT dosen.niy,dosen.nama as nama_dosen,dosen.email,dosen.bidang_keahlian FROM penguji JOIN dosen ON dosen.niy=penguji.niy WHERE id_jadwal='$id_jadwal' LIMIT 1";
		$result=$this->eksekusi($query);
		return $result;

	}
	
	
	public function getJadwalTerdekat()
	{
	//-1700018116-Nanda Suci Pratwi-nandasuci

		$query ="SELECT * FROM `penjadwalan` ORDER BY `penjadwalan`.`tanggal` ASC, `penjadwalan`.`jam` ASC, `penjadwalan`.`tempat` ASC";	
		$result=$this->eksekusi($query);
		return $result;
	}
	
	
	public function getDataDosenPenguji2byIdJadwal($id_jadwal)
	{
		//1700018148-Abima Febrian Nugraha-aimfn(abima febrian nugraha)
		$query ="SELECT dosen.niy,dosen.nama as nama_dosen,dosen.email,dosen.bidang_keahlian FROM penguji JOIN dosen ON dosen.niy=penguji.niy WHERE id_jadwal='$id_jadwal' LIMIT 1,1"; //mendapatkan data dosen penguji ke 2 dengan id_jadwal
		$result=$this->eksekusi($query); //mengeksekusi query diatas
		return $result; //mengembalikan nilai data dosen penguji 2
	}
	
	
	public function getAllDosenKecualiDuaDosen($niy,$niy2)
	{
		//1700018174-M Andika Riski-Andikariski
		//Function untuk memanggil data dosen yang bukan dosen penguji kedua.
		$query ="SELECT dosen.niy,dosen.nama as nama_dosen,dosen.email,dosen.bidang_keahlian FROM dosen 
		WHERE NOT dosen.niy='$niy' AND NOT dosen.niy='$niy2'";
		$sql = $this->eksekusi($query);
		return $sql;
	}

	//1700018167-Adhymas Fajar Sudrajat-dmonh3h3
	public function getDataJadwalDosenByNiyTerdekat($niy)
	{
		$query = "SELECT penjadwalan.id_jadwal, penjadwalan.nim, mahasiswa_metopen.nama,penjadwalan.tanggal, penjadwalan.jam, penjadwalan.tempat, (SELECT dosen.nama from dosen where penguji.niy = dosen.niy ) as penguji
			FROM mahasiswa_metopen 
            join penjadwalan on mahasiswa_metopen.nim = penjadwalan.nim
			join penguji on penjadwalan.id_jadwal = penguji.id_jadwal
			join dosen on penguji.niy = dosen.niy   
            WHERE penguji.niy = '$niy' AND penjadwalan.tanggal >= curdate() ORDER BY penjadwalan.tanggal ASC";

            $sql = $this->eksekusi($query);
			return $sql;
	}

	//1700018141-siti apryanti k-sitiapryantii
	public function getDataJadwalDosenByNiySemua($niy)
	{
		$query = "SELECT penjadwalan.id_jadwal, penjadwalan.nim,penjadwalan.jenis_ujian ,mahasiswa_metopen.nama,penjadwalan.tanggal, penjadwalan.jam, penjadwalan.tempat, (SELECT dosen.nama from dosen where penguji.niy = dosen.niy ) as penguji
			FROM mahasiswa_metopen 
            join penjadwalan on mahasiswa_metopen.nim = penjadwalan.nim
			join penguji on penjadwalan.id_jadwal = penguji.id_jadwal
			join dosen on penguji.niy = dosen.niy   
            WHERE penguji.niy = '$niy' ORDER BY penjadwalan.tanggal ASC";

            $sql = $this->eksekusi($query);
			return $sql;
	}

	//1700018118-Adil Baihaqi-adilbaihaqi
	public function getNamaMhs($nim)
	{
		$query = "SELECT mahasiswa_metopen.nama from mahasiswa_metopen where mahasiswa_metopen.nim = '$nim'";
		$sql = $this->eksekusi($query);
			return $sql;
	}

	public function getDosenUji($nim,$id_jadwal) // function untuk menampilkan dosen penguji dengan niy dan menampilkan data mahasiswa  yang akan dia uji 
	{
		//1700018141-sitiapryanti-sitiapryantii
		
		$query = "SELECT dosen.nama as nama_dosen,dosen.niy FROM dosen JOIN penguji on dosen.niy = penguji.niy JOIN penjadwalan on penjadwalan.id_jadwal = penguji.id_jadwal 
		JOIN mahasiswa_metopen on mahasiswa_metopen.nim = penjadwalan.nim WHERE mahasiswa_metopen.nim=$nim AND penguji.id_jadwal = '$id_jadwal'"; // query mengambil data dosen, data jadwal mahasiswa berdasarkan nim, dan dosen dapat melihat mahasiswa mana yang kan dia uji 
		$hasil=$this->eksekusi($query); // mengeksekusi query yang telah di buat
		return $hasil; // pengembalian dari query yang di panggil
	}

	//1700018116-Nanda Suci Pratwi-nandasuci
	public function getCountBimbinganSkripsi($nim)
	{
		$query = "SELECT COUNT(*) as jb from logbook_bimbingan WHERE id_skripsi = '$nim' AND jenis = 'skripsi'";
		$hasil = $this->eksekusi($query);
		return $hasil;
	}

	public function getLamaBimbingan($nim)
	{
		// 1700018133-Sandy Valentino G-iamsand
		$query = "SELECT 
					DATEDIFF(CURDATE(),penjadwalan.tanggal) as lamabimbingan 
					from penjadwalan WHERE nim = '$nim' AND jenis_ujian = 'SEMPROP'";
				// (
				// ((YEAR(CURDATE()) - YEAR(penjadwalan.tanggal)) *365) +
				// ((MONTH(CURDATE()) - MONTH(penjadwalan.tanggal)) *30)+
				// ((DAY(CURDATE()) - DAY(penjadwalan.tanggal))) 
				// )
		$hasil = $this->eksekusi($query);
		return $hasil;
	}

	//1700018144-M Yulianto Andi S-LianEx
	public function displayDate($day){

		$tahun = $day / 365;
		$tahun = floor($tahun);

		$t_day = $tahun * 365;
		$day = $day - $t_day;

		$bulan = $day / 30;
		$bulan = floor($bulan);

		$t_day = $bulan * 30;
		$day = $day - $t_day;

		if ($tahun >= 1) {
			return $tahun.' tahun '.$bulan.' bulan '.$day.' hari ';
		}elseif ($bulan >= 1) {
			return $bulan.' bulan '.$day.' hari ';
		}else {
			return $day.' hari ';
		}


	}
}

	
?>
