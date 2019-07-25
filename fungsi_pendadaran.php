<?php 


//JAWABAN UTS & UAS

	//1. 1700018137
	//2. 1700018123
	//3. 1700018125
	//4. 1700018142
	//5. 1700018124
	//6. 1700018135
	//7. 1700018146
	//8. 1700018131

		//No 1. Penjelasan Class

			//Pada fitur ujian pendadaran hanya terdapat 1 class saja, yaitu class ujian_pendadaran.
			//class ujian_pendadaran yaitu sebuah blue print atau cetakan untuk membuat object-object yang dibutuhkan pada fitur ujian pendadaran
			//pada class ini terdapat beberapa atribut atau yaitu $host, $user, $pass, $db, $hasil, $konek, $cari, $nilai, $status 
			//terdapat 18 method/function yaitu : 
												//function __construct(), 
												//function koneksi(), 
												//function eksekusi(), 
												//function lihatstatusmahasiswapendadaran(),
												//function Lihatnilaipendadaran($nim), 
												//function Lihatnilaipendadaran1($nim)
												//function CariDataMahasiswaBerdasarkanNimpd($nim),  
												//function LihatTanggalUjianPendadaran(),
												//function LihatDataHasilInputanNilaiDanStatusPendadaran(),  
												//function DeleteDataPendadaran($nim),
												//function InputNilaiDanStatusPendadaran($nim,$id_pendadaran,$status,$nilai_penguji_1,$nilai_penguji_2,$nilai_pembimbing),
												//function UpdateNilaiDanStatusPendadaran1($nim,$status,$nilai_penguji_1,$nilai_penguji_2,$nilai_pembimbing), 
												//function UpdateNilaiDanStatusPendadaran2($nim)
												//function LihatPengumumanNilaiDanStatusSemuaMahasiswaPendadaran(), 
												//function CariMahasiswaBerdasarkanNimPadaPengumumanHasilPendadaran(),
												//function UrutkanPengumumanPendadaranBerdasarkanNilai(), 
												//function HitungJumlahMahasiswaLuluspendadaran(),
												//function HitungJumlahMahasiswaTidakLulusSemprop(), 
												
		
			
			//pada fitur ini terdapat function yang memiliki 3 level yaitu admin,mahasiswa, dan dosen pembimbing
			//pada level admin dapat mengelola dan menginput nilai, pada level mahasiswa hanya dapat melihat nilainya, pada level dosen  pembimbing hanya dapat melihat nilai mahasiswa yang dibimbing



	//class untuk data-data yang diperlukan pada fitur ujian pendadaran
	class ujian_pendadaran{

		//variaber yang diperlukan
		public $host, $user, $pass, $db, $hasil, $konek, $cari, $nilai, $status; 

		//konstruktor
		function __construct(){
			$this->host = "localhost";
			$this->user = "root";
			$this->pass = "";
			$this->db   = "manajemen_skripsi_prpl";
		}

		//fungsi untuk mengkoneksikan ke database
		public function koneksi(){
			$this->konek = mysqli_connect($this->host,$this->user,$this->pass,$this->db);

				//mengecek apakah database sudah terkoneksi
				if(!$this->konek){
					return die('Maaf koneksi belum tersambung'.mysqli_connect_error());
				}
		}

		//fungsi untuk mengeksekusi query
		public function eksekusi($query){
			$this->hasil = mysqli_query($this->konek, $query);
		}

//FUNGSI Aditya Angga Ramadhan
//UTS & UAS No 2. Penjelasan Function

		
		public function CariDataMahasiswaBerdasarkanNimpd($nim){
			//Dikerjakan oleh Aditya Angga Ramadhan (1700018131)

			// fungsi ini bernama CariMahasiswaBerdasarkanNimpd , fungsi ini digunakan untuk searching atau pencarian data mahasiswa pada level admin yang akan menginputkan nilai ujian pendadaran, yang meliputi data : nim, nama mahasiswa, nama dosen pembimbing, id dosen penguji.
		
			// fungsi ini menjoinkan 4 tabel yaitu tabel mahasiswa_metopen, dosen, penjadwalan dan penguji dengan primary key tabel mahasiswa metopen yaitu nim, tabel dosen yaitu niy, tabel penjadwalan yaitu id_jadwal,tabel penguji yaitu id_penguji
		
			// tabel mahasiswa_metopen yang terfapat FK dosen join dengan tabel dosen pada PK niy, kemudian mahasiswa_metopen pada PK nim join dengan penjadwalan pada FK nim , kemudian tabel penjadwalan pada PK id jadwal join dengan tabel penguji pada FK id_jadwal, dan $nim sebagai parameter untuk mengirim mahasiswa_metopen.nim pada variabel $nim di function  CariDataMahasiswaBerdasarkanNimpd($nim) 


			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, mahasiswa_metopen.topik, dosen.nama as nama_dsn, penguji.id_penguji as id_penguji, penjadwalan.tanggal, penjadwalan.id_jadwal FROM mahasiswa_metopen JOIN dosen ON mahasiswa_metopen.dosen=dosen.niy join penjadwalan on mahasiswa_metopen.nim=penjadwalan.nim join penguji on penjadwalan.id_jadwal=penguji.id_jadwal and mahasiswa_metopen.nim=$nim LIMIT 1";

			$this->eksekusi($query);
			return $this->hasil;	
		}


		public function lihatnilaipendadaran($nim){
			//Dikerjakan oleh Aditya Angga Ramadhan (1700018131)

			// fungsi ini bernama lihatnilaipendadaran, fungsi ini digunakan untuk melihat nilai ujian pendadaran dari mahasiswa dilevel dosen yang ingin melihat nilai ujian pendadaran dari mahasiswa bimbinganya, yang meliputi data : nim, nama, id penguji, tanggal ujian, nilai penguji 1, nilai penguji 2, nilai pembimbing, status

			// fungsi ini menjoinkan 4 tabel yaitu tabel mahasiswa_metopen dengan PK nim, tabel penjadwalan dengan PK id_jadwal, tabel penguji dengan PK id_penguji, tabel ujian_pendadaran dengan PK id_pendadaran

			// tabel mahasiswa_metopen dengan PK nim join dengan penjadwalan dengan FK nim, kemudian tabel penguji dengan FK id_jadwal join dengan penguji pada FK id_jadwal , kemudian join pada tabel ujian pendadaran dengan FK nim join mahasiswa_metopen dengan PK nim



			$query = " SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, penguji.id_penguji as id_penguji,penjadwalan.tanggal, ujian_pendadaran.nilai_penguji_1, ujian_pendadaran.nilai_penguji_2, ujian_pendadaran.nilai_pembimbing, ujian_pendadaran.status, penjadwalan.id_jadwal FROM mahasiswa_metopen join penjadwalan on mahasiswa_metopen.nim=penjadwalan.nim join penguji on penjadwalan.id_jadwal=penguji.id_jadwal join ujian_pendadaran on mahasiswa_metopen.nim=ujian_pendadaran.nim where mahasiswa_metopen.nim=$nim limit 1";

			$this->eksekusi($query);
			return $this->hasil;

		}
//FUNGSI SATRIA GRADIENTA

		public function lihatstatusmahasiswapendadaran($nim){
			//Dikerjakan oleh Satria Gradienta

			//Query untuk melihat status mahasiswa di pendadaran
			//menampilkan nim di mahasiswa_metopen, nama di mahasiswa_metopen sebagai nama mahasiswa, status pada di ujian_pendadaran dari mmahasiswa_metopen join dosen pada dosen di mahasiswa_metopen dengan niy di dosen join dengan ujian_pendadaran pada nim di mahasiswa_metopen dengan nim di ujian_pendadaran where niy di dosen dengan pentunjuk nim
			//kemudian nanti akan dieksekusi
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, ujian_pendadaran.status from mahasiswa_metopen join dosen on mahasiswa_metopen.dosen=dosen.niy join ujian_pendadaran on mahasiswa_metopen.nim=ujian_pendadaran.nim where dosen.niy='$nim'";

			$this->eksekusi($query);
			return $this->hasil;
				//Untuk mengeksekusi query dengan menggunakan $this->eksekusi($query);
				//Untuk pengembalian fungsi query dengan menggunakan return $this->hasil;

		}
		public function LihatTanggalUjianPendadaran(){
			//Dikerjakan oleh Satria Gradienta

			//Query untuk melihat tanggal ujian pendadaran
			//menampilakn nim, nama mahasiswa, topik metoprn, nama dosen, penguji, tanggal, dari mahasiswa metopen join ke dosen pada mahasiswa_metopen di dosen, dosen di niy, di join penjadwalan pada mahasiswa_metopen pada dim, dengan penjadwalan di nim join penguji pada penjadwalan di id_jadwal dengan penguji di id_jadwal
			//kemudian nanti akan dieksekusi
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama AS nama_mhs, mahasiswa_metopen.topik, dosen.nama AS nama_dsn, penguji.id_penguji AS penguji, penjadwalan.tanggal FROM mahasiswa_metopen JOIN dosen ON mahasiswa_metopen.dosen=dosen.niy JOIN penjadwalan ON mahasiswa_metopen.nim=penjadwalan.nim JOIN penguji ON penjadwalan.id_jadwal=penguji.id_jadwal";
			
			$this->eksekusi($query);
			return $this->hasil;
				//Untuk mengeksekusi query dengan menggunakan $this->eksekusi($query);
				//Untuk pengembalian fungsi query dengan menggunakan return $this->hasil;
		
			
			
		}

//FUNGSI MUHAMMAD ADI REZKY		

		

		public function lihatnilaipendadaran1($nim){
			//dikerjakan muhammad adi rezky
			// fungsi ini untuk menampilkan nilai mahasiswa yang ada novbar di mahasiswa
			// outputnya adalah adalah menampilkan nama mahasiswa, nama perwalian dosen, nilai ujian_pendadaran, tanggal ujian, nilai serta status mahasiswa
			$query = " SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, dosen.nama  as nama_dsn, penjadwalan.tanggal, ujian_pendadaran.nilai_penguji_1, ujian_pendadaran.nilai_penguji_2, ujian_pendadaran.nilai_pembimbing, ujian_pendadaran.status,
			penjadwalan.id_jadwal FROM mahasiswa_metopen join dosen on mahasiswa_metopen.dosen=dosen.niy join penjadwalan on mahasiswa_metopen.nim=penjadwalan.nim join penguji on penjadwalan.id_jadwal=penguji.id_jadwal join ujian_pendadaran on mahasiswa_metopen.nim=ujian_pendadaran.nim where mahasiswa_metopen.nim='$nim' LIMIT 1";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function InputNilaiDanStatusPendadaran($nim,$id_pendadaran,$status,$nilai_penguji_1,$nilai_penguji_2,$nilai_pembimbing){
			//Dikerjakan oleh Muhammad Adi Rezky
			//fungsi ini untuk membuat inputan nilai di database 
			//kemudian akan di eksekusi 

			$query = "INSERT INTO ujian_pendadaran VALUES ('$nim','$id_pendadaran','$status','$nilai_penguji_1','$nilai_penguji_2','$nilai_pembimbing')";
			$this->eksekusi($query);
			return $this->hasil;
		}
		
//FUNGSI SITI ISSARI SABHATI
		public function getDosenPenguji1($id_jadwal)
		//Dikerjakan oleh Siti Isari Sabati
		{
		//dikerjakan siti issari Sabhati (1700018137)
		//UTS / UAS NO.2
		//fungsi ini digunakan untuk menampilkan dosen penguji nerdasarkan id jadwal mahasiswa

			$query = "SELECT dosen.nama as nama_dosen, dosen.niy from dosen join penguji on dosen.niy = penguji.niy where penguji.id_jadwal = '$id_jadwal'";
		//Menampilkan Nama dosen dari tabel dosen , Niy PK dari tabel dosen , lalu digabungkan dengan tabel penguji dan dicocokkan antara Niy dosen dengan Niy penguji dengan menginputkan id_jadwal dan akan menampilkan dosen pengui berdasarkan id_jadwal.

			$this->eksekusi($query);
			return $this->hasil;
			
		}
		public function LihatPengumumanNilaiDanStatusSemuaMahasiswaPendadaran(){
			//Dikerjakan oleh Siti Issari Sabhati
			//sudah dikerjakan isri

			$query = "SELECT mahasiswa_metopen.nim as nim , mahasiswa_metopen.nama as nama_mhs, ujian_pendadaran.nilai_penguji_1, ujian_pendadaran.nilai_penguji_2, ujian_pendadaran.nilai_pembimbing, ujian_pendadaran.status FROM mahasiswa_metopen JOIN ujian_pendadaran ON mahasiswa_metopen.nim=ujian_pendadaran.nim";
			//Menampilkan Nim dari tabel mahasiswa_metopen , nama dari tabel mahasiswa_metopen , tanggal dari tabel penjadwalan , nilai_penguji1 (nilai yang diberikan oleh dosen penguji 1) dari tabel ujian pendadaran , nilai_penguji2 (nilai yang diberikan oleh dosen penguji 2) dari tabel ujian pendadaran , nilai_pembimbing (nilai yang diberikan oleh dosen pembimbing) dari tabel ujian_pendadaran ,  status (status apakah mahasiwa tersebut lulus atau tidak) dari tabel ujian_pendadaran Dengan mengambil data dari tabel mahasiswa_metopen digabungkan (join) dengan tabel ujian_pendadaran dengan mencocokkan (on) nim dari tabel mahasiswa_metopen dengan nim dari tabel ujian pendadaran lalu menggabungkannya (join) lagi dengan tabel penjadwalan dengan mencocokkan (ON) nim dari tabel mahasiswa_metopen dengan nim dari tabel penjadwalan 

			$this->eksekusi($query);
			return $this->hasil;
			

			
		}
//FUNGSI IFTITAH DWI
		public function getDosenPenguji2()
		//Dikerjakan oleh Iftitah Dwi Ulumiyah
		//UAS no 2
		{
			$query = "SELECT dosen.nama as nama_dosen, dosen.niy from dosen join penguji on dosen.niy = penguji.niy where penguji.id_jadwal = 'UP11111111111'";
			$this->eksekusi($query);
			return $this->hasil;
			//1.Saya akan menjelaskan function dosenpenguji2
			//Disini saya akan menampilkan tabel nama dosen dan niy saja,dari tabel dosen
			//2. kemudian kita gabungkan dengan penguji dimana dosen.niy= penguji.niy
			//kita menggabungkan tabel tersebut biasanya disebut foreign key 
			//artinya adalah hubungan tabel dosen dan penguji harus ada 
			//yang sama agar bisa dihubungkan kebetulan yang sama adalah niy.
			//3.Dimana pada untuk penguji2 yang memiliki id_jadwalnya "UP11111111111".
			
		}

		public function LihatDataHasilInputanNilaiDanStatusPendadaran(){
			//Dikerjakan oleh Iftitah Dwi Ulumiyah

			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as nama_mhs,ujian_pendadaran.nilai_penguji_1 as nilai_penguji_1, ujian_pendadaran.nilai_penguji_2 as nilai_penguji_2, ujian_pendadaran.nilai_pembimbing as nilai_pembimbing, ujian_pendadaran.status FROM mahasiswa_metopen JOIN ujian_pendadaran ON mahasiswa_metopen.nim=ujian_pendadaran.nim";
			
			$this->eksekusi($query);
			return $this->hasil;
			//query ini menampilkan nim, nama_mhs dari tabel mahasiswa metopen dan nama_dsn dari tabel dosen dan nilai_proses_pembimmbing,nilai_ujian_pembimbing,nilai_ujian_penguji dari seminar_proposal
			//pada kondisi ini kita menggabungkan tabel tabel mahasiswa_metopen dengan dosen dimana yang menjadi foreign keynya adalah dosen. 
			//kemudian digabungkan lagi dengan tabel seminar_proposal dengan tabel mahasiswa_metopen yang menjadi foreign keynya adalah nim 
			
			
		}
//FUNGSI RAFIDA K
		public function DeleteDataPendadaran($nim){
			//Dikerjakan oleh Rafida Kumalasari
			//Sudah dikerjakan oleh Rafida
			$query="DELETE FROM ujian_pendadaran WHERE nim='$nim'";	
			// query ini diperuntukkan untuk menghapus data dari tabel seminar proposal berdasarkan nim mana yang mau dihapus 
			$this->eksekusi($query); //untuk mengeksekusi query diatas
			return $this->hasil; //menampilkan hasil query
			
			
		}
		public function ujianpendadaran($nim){
		//Dikerjakan oleh Rafida Kumalasari
			//Sudah dikerjakan oleh Rafida
			$query = "SELECT * from ujian_pendadaran where nim=$nim";
			// query ini digunakan untuk memanggil data dari tabel ujian_pendadaran berdasarkan nim

			$this->eksekusi($query); //untuk mengeksekusi query diatas
			return $this->hasil; //menampilkan hasil query

		}

		
//FUNGSI RIZAL ADIJISMAN
		public function UpdateNilaiDanStatusPendadaran1($nim,$status,$nilai_penguji_1,$nilai_penguji_2,$nilai_pembimbing){
			//Dikerjakan oleh Rizal Adijisman (1700018135)
			//fungsi ini untuk mengupdate nilai dan status mahasiswa
			$query="UPDATE ujian_pendadaran SET status='$status', nilai_penguji_1='$nilai_penguji_1', nilai_penguji_2='$nilai_penguji_2', nilai_pembimbing='$nilai_pembimbing' WHERE nim='$nim'"; //query ini untuk meng-update nilai dan status mahasiswa yang sudah diubah pada from update
			$this->eksekusi($query); //untuk mengeksekusi query diatas
			return $this->hasil; //menampilkan hasil query			
		}

		public function UpdateNilaiDanStatusPendadaran2($nim){ //sudah??
			//Dikerjakan oleh Rizal Adijisman (1700018135)
			//fungsi ini bernama UpdateNilaiDanStatusPendadaran2
			//fungsi ini untuk menampilkan form update nilai dan status dari data mahasiswa yg mengikuti pendadaran
			
			$query="SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as nama_mhs ,ujian_pendadaran.nilai_penguji_1,ujian_pendadaran.nilai_penguji_2, ujian_pendadaran.nilai_pembimbing, ujian_pendadaran.status FROM mahasiswa_metopen JOIN ujian_pendadaran ON mahasiswa_metopen.nim=ujian_pendadaran.nim and mahasiswa_metopen.nim=$nim"; //update
			//untuk menampilkan from update berdasarkan nim yang dipilih untuk diupdate
			$this->eksekusi($query); //untuk mengeksekusi query diatas
			return $this->hasil; //mengembalikan hasil query diatas
		}

		
//FUNGSI LALU HENDRI
		public function CariMahasiswaBerdasarkanNimPadaPengumumanHasilPendadaran($nim){
			//Dikerjakan oleh Lalu Hendri Bagus Wira S 1700018146
			//fungsi ini bernama CariMahasiswaBerdasarkanNimPadaPengumumanHasilPendadaran
			//fungsi ini  untuk mencari data hasil pendadaran mahasiswa berdasarkan nim dengan menginputkan nim sebagai keynya
			//nanti outputnya itu menampilkan NIM,Nama Mahasiswa,Topik,nilai penguji 1,nilai penguji 2,nilai pembimbing,status
			//di fungsi ini kita menjoinkan dua tabel yaitu tabel mahasiswa_metopen,ujian_ pendadaran
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, mahasiswa_metopen.topik, ujian_pendadaran.nilai_penguji_1,ujian_pendadaran.nilai_penguji_2,ujian_pendadaran.nilai_pembimbing, ujian_pendadaran.status FROM mahasiswa_metopen join ujian_pendadaran on mahasiswa_metopen.nim=ujian_pendadaran.nim AND mahasiswa_metopen.nim=$nim";

			$this->eksekusi($query);
			return $this->hasil;
			
		}
		public function updatestatusmetopen($status,$nim){
	//Dikerjakan oleh Lalu Hendri Bagus Wira S
			//Dikerjakan oleh Lalu Hendri Bagus Wira S 1700018146
			//fungsi ini bernama updatestatusmetopen
			//fungsi ini untuk meng update status metopen mahasiswa berdasarkan nim
			$query = "UPDATE mahasiswa_metopen SET status='$status' WHERE mahasiswa_metopen.nim=$nim  ";
			
			$this->eksekusi($query);
			return $this->hasil;

		}
//FUNGSI FEBRI R.
		
		public function HitungJumlahMahasiswaLuluspendadaran(){
			//Dikerjakan oleh Febri Ramadhan
			//Dikerjakan oleh Febri Ramadhan

			//fungsi ini bernama HitungJumlahMahasiswaLulusPendadaran
			// fungsi ini untuk menghitung jumlah mahasiswa yang  lulus Pendadaran
			//dan menampilkan jumlah mahasiswa yang statusnya  lulus Pendadaran

			$query = "SELECT COUNT(ujian_pendadaran.status ) as lulus FROM ujian_pendadaran WHERE status='lulus'";
			
			$this->eksekusi($query);
			return $this->hasil;

			
		}

		public function UrutkanPengumumanPendadaranBerdasarkanNilai(){
			//Dikerjakan oleh Febri R.
			//Dikerjakan oleh Febri Ramadhan

			//fungsi ini bernama HitungJumlahMahasiswaLulusPendadaran
			// fungsi ini untuk menghitung jumlah mahasiswa yang  lulus Pendadaran
			//dan menampilkan jumlah mahasiswa yang statusnya  lulus Pendadaran
			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as nama_mhs , SUM(ujian_pendadaran.nilai_pembimbing+ujian_pendadaran.nilai_penguji_1+ujian_pendadaran.nilai_penguji_2) as nilai, ujian_pendadaran.status FROM mahasiswa_metopen JOIN ujian_pendadaran ON mahasiswa_metopen.nim=ujian_pendadaran.nim group by mahasiswa_metopen.nim ORDER BY ujian_pendadaran.nim ASC";
			$this->eksekusi($query);
			return $this->hasil;
		
		}
//FUNGSI IBRAHIM

		public function HitungJumlahMahasiswaTidakLuluspendadaran(){
			//Dikerjakan oleh Mohammad Ibrahim


			$query = "SELECT COUNT(ujian_pendadaran.status ) as tidak_lulus FROM ujian_pendadaran WHERE status='tidak_lulus'";
			
			$this->eksekusi($query);
			return $this->hasil;

		}



	}


 ?>