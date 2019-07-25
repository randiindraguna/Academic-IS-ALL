<?php 

	//JAWABAN UTS & UAS

	//1. 1700018131
	//2. 1700018146
	//3. 1700018125
	//4. 1700018142
	//5. 1700018135
	//6. 1700018137
	//7. 1700018123
	//8. 1700018124
	//9.
	//10.
	//11.

		//No 1. Penjelasan Class

			//Pada fitur seminar prosal hanya terdapat 1 class saja, yaitu class Seminar_Proposal.
			//class Seminar_Proposal yaitu sebuah blue print atau cetakan untuk membuat object-object yang dibutuhkan pada fitur seminar proposal
			//pada class ini terdapat beberapa atribut atau yaitu $host, $user, $pass, $db, $hasil, $konek, $cari, $nilai, $status 
			//terdapat 19 method/function yaitu : 
												//function __construct(), function koneksi(), function eksekusi(), function lihatstatusmahasiswapembimbing(),
												//function CariDataMahasiswaBerdasarkanNim($nim), function lihatsempropmahasiswa()
												//function lihatsempropmahasiswa1($nim),  function LihatDataHasilInputanNilaiDanStatusSemprop($nim),
												//function DeleteDataSemprop($nim),  function InputNilaiDanStatusSemprop($id_seminar,$nilai_proses_pembimbing,$status,$nim,$nilai_ujian_pembimbing,$nilai_ujian_penguji),
												//function UpdateNilaiDanStatusSemprop1($nilai_proses_pembimbing,$status,$nim,$nilai_ujian_pembimbing,$nilai_ujian_penguji),
												//function UpdateNilaiDanStatusSemprop2($nim), function LihatPengumumanNilaiDanStatusSemuaMahasiswa()
												//function LihatPengumumanNilaiDanStatusSemuaMahasiswa(), function CariMahasiswaBerdasarkanNimPadaPengumumanHasilSemprop($nim)
												//function UrutkanPengumumanSempropBerdasarkanNilai(), function HitungJumlahMahasiswaLulusSemprop()
												//HitungJumlahMahasiswaTidakLulusSemprop(), function cetak($nim)
		
			
			//pada fitur ini terdapat function yang memiliki 3 level yaitu admin,mahasiswa, dan dosen pembimbing
			//pada level admin dapat mengelola dan menginput nilai, pada level mahasiswa hanya dapat melihat nilainya, pada level dosen  pembimbing hanya dapat melihat nilai mahasiswa yang dibimbing
			
		
			
			



	//class untuk data-data yang diperlukan pada fitur seminar proposal
	class Seminar_Proposal{

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
		public function koneksi(){ //sudah
			$this->konek = mysqli_connect($this->host,$this->user,$this->pass,$this->db);

				//mengecek apakah database sudah terkoneksi
				if(!$this->konek){
					return die('Maaf koneksi belum tersambung'.mysqli_connect_error());
				}
		}

		//fungsi untuk mengeksekusi query
		public function eksekusi($query){ //sudah
			$this->hasil = mysqli_query($this->konek, $query);
		}

		public function lihatstatusmahasiswapembimbing($niy){
			
			$query = "SELECT  mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, seminar_proposal.status from mahasiswa_metopen join dosen on mahasiswa_metopen.dosen=dosen.niy join seminar_proposal on mahasiswa_metopen.nim=seminar_proposal.nim where dosen.niy=$niy";

			$this->eksekusi($query);
			return $this->hasil;
		}










//FUNGSI ADITYA ANGGA RAMADHAN

		//UTS & UAS No 2. Penjelasan Function
		public function CariDataMahasiswaBerdasarkanNim($nim){
			//Dikerjakan oleh Aditya Angga Ramadhan (1700018131)


				// fungsi ini bernama CariMahasiswaBerdasarkanNim , digunakan untuk searching atau pencarian data mahasiswa pada level admin yang akan menginputkan nilai seminar proposal, yang meliputi data : nim, nama mahasiswa, nama dosen pembimbing, id dosen penguji.
				
				// fungsi ini menjoinkan 4 tabel yaitu tabel mahasiswa_metopen, dosen, penjadwalan dan penguji dengan primary key tabel mahasiswa metopen yaitu nim, tabel dosen yaitu niy, tabel penjadwalan yaitu id_jadwal,tabel penguji yaitu id_penguji

				// tabel mahasiswa_metopen yang terfapat FK dosen join dengan tabel dosen pada PK niy, kemudian mahasiswa_metopen pada PK nim join dengan penjadwalan pada FK nim , kemudian tabel penjadwalan pada PK id jadwal join dengan tabel penguji pada FK id_jadwal, dan $nim sebagai parameter untuk mengirim mahasiswa_metopen.nim pada variabel $nim di function  CariDataMahasiswaBerdasarkanNim($nim) 		
			
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, dosen.nama as nama_dsn, penguji.id_penguji as id_penguji, penjadwalan.id_jadwal FROM mahasiswa_metopen JOIN dosen ON mahasiswa_metopen.dosen=dosen.niy join penjadwalan on mahasiswa_metopen.nim=penjadwalan.nim join penguji on penjadwalan.id_jadwal=penguji.id_jadwal and mahasiswa_metopen.nim=$nim LIMIT 1";

			$this->eksekusi($query);  //untuk mengeksekusi query
			return $this->hasil; // untuk menampilkan hasil query
			
			
		}


		public function lihatsempropmahasiswa($nim){ 
			//Dikerjakan Aditya Angga Ramadhan (1700018131)


			//fungsi ini bernama lihatsempropmahasiswa , digunakan untuk melihat data seminar proposal mahasiswa yang dibimbing oleh dosen pada level dosen yang berisi data : nim, nama, nama dosen, penguji, nilai proses bimbingan, nilai ujian pembimbing, nilai ujian penguji, status seminar proposal, tanggal ujian

			//fungsi ini menjoinkan 5 tabel yaitu tabel mahasiswa_metopen, dosen, penjadwalan, penguji, seminar proposal dengan primary key tabel mahasiswa metopen adalah nim, tabel dosen adalah niy, tabel penjadwalan adalah id_jadwal, table penguji adalah id penguji, dan tabel seminar proposal adalah id_seminar

			//tabel mahasiswa metopen yang terdapat FK dosen JOIN dengan tabel dosen dengan PK niy, kemudian JOIN dengan tabel penjadwalan dari tabel mahasiswa dengan PK nim dengan tabel penjadwalan FK nim , kemudian pada tabel penguji dengan PK id_jadwal dengan penguji pada FK id_jadwal, kemudian tabel seminar_proposal pada FK nim dengan mahasiswa_metopen pada PK nim

			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, dosen.nama as nama_dsn, penguji.id_penguji as id_penguji, seminar_proposal.nilai_proses_pembimbing, seminar_proposal.nilai_ujian_pembimbing, seminar_proposal.nilai_ujian_penguji, seminar_proposal.status,penjadwalan.id_jadwal FROM mahasiswa_metopen JOIN dosen ON mahasiswa_metopen.dosen=dosen.niy join penjadwalan on 					mahasiswa_metopen.nim=penjadwalan.nim join penguji on penjadwalan.id_jadwal=penguji.id_jadwal join seminar_proposal on mahasiswa_metopen.nim=seminar_proposal.nim where seminar_proposal.nim=$nim LIMIT 1"; 

			$this->eksekusi($query);
			return $this->hasil;
				
		}



//FUNGSI M. ADI RIZKY

		public function InputNilaiDanStatusSemprop($id_seminar,$nilai_proses_pembimbing,$status,$nim,$nilai_ujian_pembimbing,$nilai_ujian_penguji){ //sudah
			//Dikerjakan oleh Muhammad Adi Rezky (1700018142)   

				// jawaban No.2 UTS
			 //  fungsi ini bernama InputNilaiDanStatusSemprop
			// Dimana fungsi ini akan menginputkan nilai dan status mahasiswa yang ada diseminar proposal
			// yang di inputkan yaitu nilai_proses_pembimbing, nilai_ujian_pembimbing, nilai_ujian_penguji dan status
			// untuk nim udah ada di mahasiswa metopen tinggal di paste aja, kemudian id_seminar tinggal di samain dengan nim
			// untuk mengeksekusi query menggunakan "$this->eksekusi($query);"
			// dan untuk pengembalian fungsi InputNilaiDanStatusSemprop menggunakan "return $this->hasil;".

			$query = "INSERT INTO seminar_proposal VALUES ('$id_seminar','$nilai_proses_pembimbing','$status','$nim','$nilai_ujian_pembimbing', '$nilai_ujian_penguji')";
			$this->eksekusi($query);
			return $this->hasil;
			
		}

		public function seminarproposal($nim){
			//dikerjakan oleh m. adi rezky
			$query = "SELECT * from seminar_proposal where nim=$nim";
			$this->eksekusi($query);
			return $this->hasil;
		}


//FUNGSI Rizal Adijisman

		public function UpdateNilaiDanStatusSemprop1($nilai_proses_pembimbing,$status,$nim,$nilai_ujian_pembimbing,$nilai_ujian_penguji){ 
			//Dikerjakan oleh Rizal Adijisman (1700018135)
			//fungsi ini untuk mengupdate nilai dan status mahasiswa
			$query="UPDATE seminar_proposal SET nilai_proses_pembimbing='$nilai_proses_pembimbing', status='$status', nim='$nim', nilai_ujian_pembimbing='$nilai_ujian_pembimbing', nilai_ujian_penguji='$nilai_ujian_penguji' where nim='$nim'"; //query ini untuk meng-update nilai dan status mahasiswa yang sudah diubah pada from update
			$this->eksekusi($query); //untuk mengeksekusi query diatas
			return $this->hasil; //menampilkan hasil query
			
		}


		public function UpdateNilaiDanStatusSemprop2($nim){
			//Dikerjakan oleh Rizal Adijisman (1700018135)
			//fungsi ini bernama UpdateNilaiDanStatusSemprop2
			//fungsi ini untuk menampilkan form update nilai dan status dari data mahasiswa yg mengikuti semprop
			
			$query="SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as nama_mhs ,seminar_proposal.nilai_proses_pembimbing, seminar_proposal.nilai_ujian_pembimbing, seminar_proposal.nilai_ujian_penguji, seminar_proposal.status FROM mahasiswa_metopen JOIN seminar_proposal ON mahasiswa_metopen.nim=seminar_proposal.nim and mahasiswa_metopen.nim=$nim";
			//untuk menampilkan from update berdasarkan nim yang dipilih untuk diupdate
			$this->eksekusi($query); //untuk mengeksekusi query diatas
			return $this->hasil; //menampilkan hasil query
		}


//FUNGSI Satria Gradienta

		public function LihatTanggalUjianSemprop(){ //sudah
			//Dikerjakan oleh Satria Gradienta (1700018125)
				//Jawaban nomer 2 . Penjelasan Function

				//Fungsi untuk melihat Tanggal Ujian Seminar Proposal
				//Fungsi ini akan menampilkan Nim, Nama mahasiswa, Nama dosen, Penguji, Dan Tanggal
				//Dari tabel mahasiswa metopen dijoinkan pada tabel dosen disatukan premery key di dosen, kemudian dijoinkan dengan tabel penjadwalan disatukan premery key di nim, kemudian dijoinkan dengan Penguji di satukan premery key di id_penjadwalan
				//Untuk mengeksekusi query dengan menggunakan $this->eksekusi($query);
				//Untuk pengembalian fungsi query dengan menggunakan return $this->hasil;

				$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama AS nama_mhs, dosen.nama AS nama_dsn, penguji.id_penguji AS penguji, penjadwalan.tanggal FROM mahasiswa_metopen JOIN dosen ON mahasiswa_metopen.dosen=dosen.niy JOIN penjadwalan ON mahasiswa_metopen.nim=penjadwalan.nim JOIN penguji ON penjadwalan.id_jadwal=penguji.id_jadwal";
			
			$this->eksekusi($query);
			return $this->hasil;
						
		}


		public function login($username){
			//dikerjakan oleh satria gradienta
			$query = "SELECT * from login where user_name=$username";
			$this->eksekusi($query);
			return $this->hasil;
		}


//FUNGSI Siti Issari Sabhati


		public function LihatPengumumanNilaiDanStatusSemuaMahasiswa(){ //sudah
			//Dikerjakan oleh Siti Ishari Sabhati (1700018137)
			//UTS NO.2
			//fungsi ini bernama LihatPengumumanNilaiDanStatusSemuaMahasiswa()
			//fungsi ini untuk menampilkan Pengumuman nilai dan status semua mahasiswa yang telah terdaftar dalam seminar proposal

			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as nama_mhs ,seminar_proposal.nilai_proses_pembimbing, seminar_proposal.nilai_ujian_pembimbing, seminar_proposal.nilai_ujian_penguji, seminar_proposal.status, penjadwalan.tanggal FROM mahasiswa_metopen JOIN seminar_proposal ON mahasiswa_metopen.nim=seminar_proposal.nim join penjadwalan ON mahasiswa_metopen.nim=penjadwalan.nim JOIN penguji ON penjadwalan.id_jadwal=penguji.id_jadwal "; //output

			//Menampilkan Nim dari tabel mahasiswa_metopen , nama dari tabel mahasiswa_metopen , nilai proses pembimbing (nilai yang diberikan oleh dosen pembimbing selama mahasiswa tersebut melakukan bimbingan) dari tabel seminar_proposal , nilai ujian pembimbing (nilai yang diberikan oleh dosen pembimbing saat mahasiswa melakukan ujian) dari tabel_seminar proposal , nilai ujian penguji (nilai ujian yang diberikan oleh penguji) dari tabel seminar_proposal ,  status (status apakah mahasiwa tersebut lulus atau tidak) dari tabel seminar_proposal , dan tanggal seminar proposal dari tabel penjadwalan Dengan mengambil data dari tabel mahasiswa_metopen digabungkan (join) dengan tabel seminar_proposal dengan mencocokkan (on) nim dari tabel mahasiswa_metopen dengan nim dari tabel seminar_proposal lalu menggabungkannya (join) lagi dengan tabel penjadwalan dengan mencocokkan (ON) nim dari tabel mahasiswa_metopen dengan nim dari tabel penjadwalan lalu menggabungkkannya (join) lagi dengan tabel penguji dengan mencocokkan (on) id_jadwal dari tabel penjadwal dengan id_jadwal dari tabel penguji.

			$this->eksekusi($query);
			return $this->hasil;
			
			
		}

		public function getDosenPenguji($id_jadwal)
		//dikerjakan siti ishari
		{
			$query = "SELECT dosen.nama as nama_dosen, dosen.niy from dosen join penguji on dosen.niy = penguji.niy where penguji.id_jadwal = '$id_jadwal'";
			$this->eksekusi($query);
			return $this->hasil;
			
		}


//FUNGSI Rafida Kumalasari


		public function DeleteDataSemprop($nim){ //sudah
			//Dikerjakan oleh Rafida Kumalasari
			$query="DELETE FROM seminar_proposal WHERE nim=$nim";
			// query ini diperuntukkan untuk menghapus data dari tabel seminar proposal berdasarkan nim mana yang mau dihapus 
			$this->eksekusi($query); //untuk mengeksekusi query diatas
			return $this->hasil; //menampilkan hasil query

		}

		public function lihatsempropmahasiswa1($nim){  // sudah
			//dikerjakan rafida kumalasari
			
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, penguji.id_penguji as id_penguji,penjadwalan.tanggal, seminar_proposal.nilai_proses_pembimbing, seminar_proposal.nilai_ujian_pembimbing, seminar_proposal.nilai_ujian_penguji, seminar_proposal.status, penjadwalan.id_jadwal FROM mahasiswa_metopen join penjadwalan on mahasiswa_metopen.nim=penjadwalan.nim join penguji on penjadwalan.id_jadwal=penguji.id_jadwal join seminar_proposal on mahasiswa_metopen.nim=seminar_proposal.nim where mahasiswa_metopen.nim='$nim' limit 1";

			$this->eksekusi($query);
			return $this->hasil;
			
			
		}


//FUNGSI Iftitah Dwi Ulumiyah

		public function LihatDataHasilInputanNilaiDanStatusSemprop($nim){ //sudah
			//Dikerjakan oleh Iftitah Dwi Ulumiyah (1700018124)
			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as nama_mhs, seminar_proposal.nilai_proses_pembimbing, seminar_proposal.status, seminar_proposal.nilai_ujian_pembimbing, seminar_proposal.nilai_ujian_penguji FROM mahasiswa_metopen JOIN seminar_proposal ON mahasiswa_metopen.nim=seminar_proposal.nim and mahasiswa_metopen.nim=$nim";
			$this->eksekusi($query);
			return $this->hasil;
			//pada query ini menampilkan data hasil inputan nilai dan status semprop.Pertama kita melakukan join tabel mahasiswa_metopen  dan seminar_proposal
			//pada kondi si nim pada tabel mahasiswa_metopen dan nim pada tabel  seminar_proposal sama  untuk mendapatkan nilai_proses_pembimbing,status,nilai_ujian_pembimbing,nilai_ujian_penguji  
			
		}

		public function cetak($nim){
			//dikerjakan iftitah dwi ulumiyah
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, dosen.nama as nama_dsn, seminar_proposal.nilai_proses_pembimbing, seminar_proposal.nilai_ujian_pembimbing, seminar_proposal.nilai_ujian_penguji from mahasiswa_metopen join dosen on mahasiswa_metopen.dosen=dosen.niy join seminar_proposal on mahasiswa_metopen.nim=seminar_proposal.nim where mahasiswa_metopen.nim=$nim";
			
			$this->eksekusi($query);
			return $this->hasil;

		}

//FUNGSI Lalu Hendri


		public function CariMahasiswaBerdasarkanNimPadaPengumumanHasilSemprop($nim){ //sudah
			//Dikerjakan oleh Lalu Hendri Bagus Wira S (1700018146)
			//fungsi ini bernama CariMahasiswaBerdasarkanNimPadaPengumumanHasilSemprop
			//fungsi ini  untuk mencari data hasil seminar proposal mahasiswa berdasarkan nim dengan menginputkan nim sebagai keynya
			//nanti outputnya itu menampilkan NIM,Nama Mahasiswa,Tanggal Ujian,nilai proses pembimbing,nilai ujian pembimbing,nilai ujian penguji,status, dan action(update dan delet)
			//di fungsi ini kita menjoinkan tiga tabel yaitu tabel mahasiswa_metopen,seminar_proposal dan penjadwalan
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, seminar_proposal.nilai_proses_pembimbing, seminar_proposal.nilai_ujian_pembimbing, seminar_proposal.nilai_ujian_penguji, seminar_proposal.status, penjadwalan.tanggal FROM mahasiswa_metopen JOIN seminar_proposal ON mahasiswa_metopen.nim=seminar_proposal.nim join penjadwalan ON mahasiswa_metopen.nim=penjadwalan.nim JOIN penguji ON penjadwalan.id_jadwal=penguji.id_jadwal and mahasiswa_metopen. nim=$nim";

			$this->eksekusi($query); //untuk mengeksekusi query diatas
			return $this->hasil; //menampilkan hasil query
			
		}

		public function updatestatusmetopen($status,$nim){
			//Dikerjakan oleh Lalu Hendri
			$query = "UPDATE mahasiswa_metopen SET status='$status' WHERE mahasiswa_metopen.nim=$nim  ";
			
			$this->eksekusi($query);
			return $this->hasil;

		}


//FUNGSI Firman Cahyono

		public function UrutkanPengumumanSempropBerdasarkanNilai(){ 
			//Dikerjakan oleh Firman Cahyono

			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as nama_mhs , SUM(seminar_proposal.nilai_proses_pembimbing+seminar_proposal.nilai_ujian_pembimbing+seminar_proposal.nilai_ujian_penguji) as nilai, seminar_proposal.status FROM mahasiswa_metopen JOIN seminar_proposal ON mahasiswa_metopen.nim=seminar_proposal.nim group by mahasiswa_metopen.nim ORDER BY seminar_proposal.nim ASC";
			
			$this->eksekusi($query);
			return $this->hasil;
				
		}


//FUNGSI Febri Ramadhan

		public function HitungJumlahMahasiswaLulusSemprop(){
			//Dikerjakan oleh Febri Ramadhan
		
			//fungsi ini bernama HitungJumlahMahasiswaLulusSemprop
			// fungsi ini untuk menghitung jumlah mahasiswa yang  lulus seminar proposa
			//dan menampilkan jumlah mahasiswa yang statusnya  lulus semprop

			$query = "SELECT COUNT(seminar_proposal.status ) as lulus FROM seminar_proposal WHERE status='lulus'";
			
			$this->eksekusi($query);
			return $this->hasil;
			
		}

//FUNGSI M. Ibrahim

		public function HitungJumlahMahasiswaTidakLulusSemprop(){
			//Dikerjakan oleh Mohammad Ibrahim

			//fungsi ini bernama HitungJumlahMahasiswaTidakLulusSemprop
			// fungsi ini untuk menghitung jumlah mahasiswa yang tidak lulus seminar proposa
			//dan menampilkan jumlah mahasiswa yang statusnya tidak lulus semprop


			$query = "SELECT COUNT(seminar_proposal.status ) as tidak_lulus FROM seminar_proposal WHERE status='tidak_lulus'";
			
			$this->eksekusi($query);
			return $this->hasil;

		}

		




		

	}


 ?>