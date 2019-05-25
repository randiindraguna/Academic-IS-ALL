<?php

	/* 
		class database fitur bimbingan skripsi :

			class ini berguna menampung semua function yang ada pada fitur log bimbingan skripsi ,
			class kami mempunyai total 18 function yang terdiri dari 1 function constructor dan 17 function return biasa , 
			kemudian kami juga mendeklarasikan 6 variabel yang memiliki hak akses private yang berarti variabel-variabel tersebut
			hanya dapat di akses pada bagian class ini saja, kemudian untuk penjelasan setiap function yang ada pada class kami ini 
			dapat di baca pada baris kode pada tiap-tiap function yang kami buat :) .

		kelompok fitur bimbingan skripsi :
			
			- ketua : 

				+ ancas wasita budi cahyadi [1700018164] => 5 FUNCTION
				+ (wakil) abdun fattah yolandanu [1700018168] => 2 FUNCTION
			
			- anggota :

				+ rizky muhamad hasan [1700018120] => 1 FUNCTION
				+ ennu intan iksan [1700018126] => 1 FUNCTION
				+ arifaleo nurdin [1700018158] => 2 FUNCTION  
				+ nofand adlil M [1700018152] => 2 FUNCTION
				+ nurzaitun safitri [1700018140] => 1 FUNCTION
				+ dendi pradana [1600018224] => 1 FUNCTION

			- sisa function :

				+ function __construct()
				+ function connect()
				+ function eksekusi()
	*/
	class Database
	{
		private $host ,$user,$pass,$database,$conn,$result; // variabel yang bersifat private yang hanya dapat di akses di dalam class Database ini saja
		function __construct(){ // fungsi yang akan pertamakali di eksekusi ketika class Database ini di inisialisasikan
			$this->host="localhost"; // mengisi variabel host dengan  "localhost"
			$this->user="root"; // mengisi variabel user dengan " root " 
			$this->pass=""; // mengisi variabel pass " " (kosong)
			$this->database="manajemen_skripsi_prpl"; // mengisi variabel database dengan nama database di server localhost
		}

		public function connect(){
			$this->conn=mysqli_connect($this->host,$this->user,$this->pass); // fungsi untuk menghubungkan database ke program web ini
			mysqli_select_db($this->conn,$this->database); // fungsi untuk memilih database yang ingin di hubungkan
			if(!$this->conn){ 
				return die('Maaf, koneksi belum tersambung: '.mysqli_connect_error()); // jika fungsi untuk menghubungkan gagal/error maka akan ada kembalian berupa peringatan seperti yang tertulis
			}
		}

		public function eksekusi($query){
			$this->result=mysqli_query($this->conn,$query); // fungsi untuk mengeksekusi query query yang diberikan
		}

		// ancas
		public function show_data($jey) // menampilkan data skripsi mahasiswa, yang nanti ingin melakukan bimbingan
		{
			$query = "SELECT mahasiswa_metopen.status as model,mahasiswa_metopen.nim as idsk, dosen.nama as namdos ,mahasiswa_metopen.topik as judul , mahasiswa_metopen.nama as name , mahasiswa_metopen.nim as nim from dosen join mahasiswa_metopen on dosen.niy = mahasiswa_metopen.dosen and mahasiswa_metopen.nim = $jey ";
			// menampilkan data mahasiswa metopen dengan model/status yang menujukkan apakah mahasiswa ini sedang dalam masa skripsi atau metopen
			$this->eksekusi($query); //untuk mengeksekusi query sql diatas yang telah dibuat
			return $this->result; //untuk mengembalikan hasil eksekusi fungsi ini
		}

		// ancas
		public function masuk_ke_log($id,$materi,$id_skripsi,$tanggal,$jam,$jenis) // input data ke tabel logbook_bimbingan 
		{
			$query = "INSERT INTO logbook_bimbingan values ('','$materi','$id_skripsi','$tanggal','$jam','$jenis')";
			// sql untuk memasukan niali value dari variabel yang ada di parameter fungsi ini sebagai data di tabel log bimbingan
			$this->eksekusi($query); //untuk mengeksekusi query sql diatas yang telah dibuat
			return $this->result; //untuk mengembalikan hasil eksekusi fungsi ini
		}
		// ancas
		public function select_one_mahasiswa($key)  // di gunakan ketika ingin melihat log bimbingan satu mahasiswa
		{
			$query = "SELECT *,logbook_bimbingan.jenis as model,logbook_bimbingan.id_logbook as id,mahasiswa_metopen.nama as namaa, mahasiswa_metopen.nim as Nm, dosen.nama as namdis from logbook_bimbingan join mahasiswa_metopen on mahasiswa_metopen.nim = logbook_bimbingan.id_skripsi join dosen on dosen.niy = mahasiswa_metopen.Dosen and mahasiswa_metopen.nim = $key";
			// query sql yang digunakan untuk menampilkan data satu mahasiswa untuk melihat data pada logbimbingan sebagai fungsi search berdasarkan nim pada skripsi
			$this->eksekusi($query); //untuk mengeksekusi query sql diatas yang telah dibuat
			return $this->result; //untuk mengembalikan hasil eksekusi fungsi ini
		}

		// ancas 1700018164 
		public function select_one_mahasiswa_by_id_log($key)  
		{
			$query = "SELECT *,logbook_bimbingan.jenis as model,logbook_bimbingan.id_logbook as id,mahasiswa_metopen.nama as namaa, mahasiswa_metopen.nim as Nm, dosen.nama as namdis from logbook_bimbingan join mahasiswa_metopen on mahasiswa_metopen.nim = logbook_bimbingan.id_skripsi join dosen on dosen.niy = mahasiswa_metopen.Dosen and logbook_bimbingan.id_logbook = $key";
			// query sql yang digunakan untuk menampilkan data satu mahasiswa untuk mengedit datanya di tabel logbimbingan berdasarkan id logbook
			$this->eksekusi($query); //untuk mengeksekusi query sql diatas yang telah dibuat
			return $this->result; //untuk mengembalikan hasil eksekusi fungsi ini
		}

		public function jumlah_data()
		{
			$query = "SELECT * from mahasiswa_metopen";
			$this->eksekusi($query); //untuk mengeksekusi query sql diatas yang telah dibuat
			return $this->result; //untuk mengembalikan hasil eksekusi fungsi ini
		}

		// fungsi buat rizki 1700018120
		// fungsi di bawah ini untuk melihat total jumlah bimbingan satu mahasiswa

		public function jumlah_bimbingan_mahasiswa()    
		{
			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as name, dosen.nama as namdos, mahasiswa_metopen.topik as judul ,mahasiswa_metopen.status as model, COUNT(logbook_bimbingan.id_skripsi) AS jumlah_bimbingan FROM logbook_bimbingan right JOIN mahasiswa_metopen on mahasiswa_metopen.nim = logbook_bimbingan.id_skripsi join dosen on dosen.niy = mahasiswa_metopen.Dosen GROUP BY mahasiswa_metopen.nim HAVING COUNT(mahasiswa_metopen.nim)>=0 ";
			// fungsi dari query SELECT untuk menyeleksi atau memilih colom atau atribut pada tabel mahasiswa_metopen. kemudian fungsi dari COUNT(logbook_bimbingan.id_skripsi) adalah untuk menghitung jumlah bimbingan mahasiswa dengan menggunakan atribut id_skripsi, kemudian hasil penjumlahan akan di letakan di atribut baru(atribut turunan) yang bernama jumlah_bimbingan. kemudian tabel logbook_bimbingan di right join dengan tabel skripsi untuk dan kemudian di lanjutkan dengan menjoin dengan tabel mahasiswa metopen . setelah itu menggunakan group by kita gabungkan berdasarkan id skripsi pada tabel skripsi dan di having sebagai penyeleksi agar hasil cont yang berjumlah 0 tetap di tampilkan
			$this->eksekusi($query); //untuk mengeksekusi query sql diatas yang telah dibuat
			return $this->result; //untuk mengembalikan hasil eksekusi fungsi ini
		}
		public function jumlah_bimbingan_mahasiswa_10_perhalaman($batas_atas,$batas_bawah)    
		{
			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as name, dosen.nama as namdos, mahasiswa_metopen.topik as judul ,mahasiswa_metopen.status as model, COUNT(logbook_bimbingan.id_skripsi) AS jumlah_bimbingan FROM logbook_bimbingan right JOIN mahasiswa_metopen on mahasiswa_metopen.nim = logbook_bimbingan.id_skripsi join dosen on dosen.niy = mahasiswa_metopen.Dosen GROUP BY mahasiswa_metopen.nim HAVING COUNT(mahasiswa_metopen.nim)>=0 LIMIT $batas_atas,$batas_bawah";
			// fungsi dari query SELECT untuk menyeleksi atau memilih colom atau atribut pada tabel mahasiswa_metopen. kemudian fungsi dari COUNT(logbook_bimbingan.id_skripsi) adalah untuk menghitung jumlah bimbingan mahasiswa dengan menggunakan atribut id_skripsi, kemudian hasil penjumlahan akan di letakan di atribut baru(atribut turunan) yang bernama jumlah_bimbingan. kemudian tabel logbook_bimbingan di right join dengan tabel skripsi untuk dan kemudian di lanjutkan dengan menjoin dengan tabel mahasiswa metopen . setelah itu menggunakan group by kita gabungkan berdasarkan id skripsi pada tabel skripsi dan di having sebagai penyeleksi agar hasil cont yang berjumlah 0 tetap di tampilkan
			$this->eksekusi($query); //untuk mengeksekusi query sql diatas yang telah dibuat
			return $this->result; //untuk mengembalikan hasil eksekusi fungsi ini
		}

		//intan 1700018126
		//fungsi ini lebih mengarah kepada nim mahasiswa atau nama dosen pembimbing yang di cari
		public function jumlah_bimbingan_mahasiswa_hasil_search($cari)
		{
			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as name, dosen.nama as namdos, mahasiswa_metopen.topik as judul ,mahasiswa_metopen.status as model, COUNT(logbook_bimbingan.id_skripsi) AS jumlah_bimbingan FROM logbook_bimbingan right JOIN mahasiswa_metopen on mahasiswa_metopen.nim = logbook_bimbingan.id_skripsi join dosen on dosen.niy = mahasiswa_metopen.Dosen WHERE mahasiswa_metopen.nim like '%$cari%' or dosen.nama like '%$cari%' GROUP BY mahasiswa_metopen.nim HAVING COUNT(mahasiswa_metopen.nim)>=0 ";         
			// query sql yang menunjukkan data jumlah bimbingan mahasiswa dan dengan atribut "like" untuk menyaring / mencari nim mahasiswa atau nama dosen 
			//yang memiliki strtuktur kata atau angka yang sama 
			
			$this->eksekusi($query); //untuk mengeksekusi query sql diatas yang telah dibuat
			return $this->result; //untuk mengembalikan hasil eksekusi fungsi ini
		}

		//Dibuat oleh Arifaleo Nurdin (1700018158)
		//KETERANGAN : Fungsi ini digunakan untuk menampilkan mahasiswa dengan dosen yang sama 
		//			   (siapa saja yang dibimbing oleh dosen "A") yang ditampilkan adalah Nama, Nim, Judul, 
		//			   Materi dan Tanggal dari Logbook bimbingannya. dengan mengirimkan nama dosennya.

		public function mencari_mhs_dgn_dos_yg_sama($key)
		{
			$query = "SELECT mahasiswa_metopen.nama as namaa, mahasiswa_metopen.nim as Nm,mahasiswa_metopen.topik as judul, logbook_bimbingan.materi_bimbingan as materi, logbook_bimbingan.tanggal_bimbingan as tanggal from logbook_bimbingan join mahasiswa_metopen on mahasiswa_metopen.nim = logbook_bimbingan.id_skripsi join dosen on dosen.niy = mahasiswa_metopen.Dosen and dosen.nama = '$key' "; 
			//Query untuk menapilkan Nama, Nim, Judul, Materi dan Tanggal dari Logbook bimbingannya dengan men join tabel
			//logbimbingan_skripsi ke skripsi dengan id_skripsi pada logbimbingan sama dengan id_skripsi pada skripsi lalu di joinkan
			//ke mahasiswa_metopen dengan nim pada mahasiswa_metopen sama dengan nim pada skripsi lalu dijoinkan lagi dengan dosen
			//dengan niy pada dosen sama dengan Dosen pada mahasiswa_metopen dan dengan syarat yang dicari adalah nama dosennya sebagai 
			//key (nama yang dicari)
			$this->eksekusi($query); //untuk mengeksekusi query sql diatas yang telah dibuat
			return $this->result; //untuk mengembalikan hasil eksekusi fungsi ini
			
		}

		// fungsi buat dendi
		public function mengurutkan_nama_A_ke_Z() // tambah parameter jika di perlukan
		{
			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as name, dosen.nama as namdos, mahasiswa_metopen.topik as judul ,mahasiswa_metopen.status as model, COUNT(logbook_bimbingan.id_skripsi) AS jumlah_bimbingan FROM logbook_bimbingan right JOIN mahasiswa_metopen on mahasiswa_metopen.nim = logbook_bimbingan.id_skripsi join dosen on dosen.niy = mahasiswa_metopen.Dosen GROUP BY mahasiswa_metopen.nim HAVING COUNT(mahasiswa_metopen.nim)>=0 ORDER BY mahasiswa_metopen.nama";
			// query untuk mengurutkan daftar nama mahasiswa berdasarkan abjad a - z dari fungsi yang sama yang di kerjakan rizki dengan sedikit modif tambahan pada kode sql " order by mahasiswa_metopen.nama " sebagai pengrut  
			$this->eksekusi($query); //untuk mengeksekusi query sql diatas yang telah dibuat
			return $this->result; //untuk mengembalikan hasil eksekusi fungsi ini
		}

		// fungsi buat gino
		public function a5() // tambah parameter jika di perlukan
		{
			$query = "";                  // isi sesuai tugas fungsi masing masing
			$this->eksekusi($query);
			return $this->result;
		}

		//Nur 1700018140
		//fungsi dibawah ini untuk mengupdate data jika ada yang salah pada materi atau jam atau tanggal pada tabel logbook_bimbingan
		
		public function update_data($materi_bimbingan,$tanggal_bimbingan,$jam,$id_logbook)
		{
			$query = "UPDATE `logbook_bimbingan` SET `materi_bimbingan`='$materi_bimbingan',`tanggal_bimbingan`='$tanggal_bimbingan',`jam`='$jam' WHERE logbook_bimbingan.id_logbook = $id_logbook"; 
			//berguna untuk memperbaharui materi bimbingan , tanggal bimbingan dan jam bimbingan pada tabel log bimbingan
			// berdasarkan parameter yang ada di fungsi sebagai variabl yang bernilai dinamis. 
	     
	     $this->eksekusi($query); //berguna untuk mengeksekusi query sql diatas yang telah dibuat. 
	     return $this->result; // untuk mengembalikan hasil eksekusi fungsi ini.
		}
		
		//fungsi ancas 1700018164
		// public function getDataSkripsiFromSemprop($one,$two,$three,$four,$five,$six) // nama fungsi yang digunakan untuk memanggil fungsi nya nanti beserta parameter nya
		// {
		// 	$query = "INSERT INTO skripsi values ('$one','$two','$three','$four','$five','$six')"; // query untuk memasukkan value setiap variabel di parameter fungsi ini kedalam database tabel skripsi
		// 	$this->eksekusi($query); //berguna untuk mengeksekusi query sql diatas yang telah dibuat. 
	 //     	return $this->result; // untuk mengembalikan hasil eksekusi fungsi ini.
		// }

		// nofand 1700018152

		// public function update_skripsi($status,$nim,$semester)
		// {
		// 	$query = "UPDATE skripsi SET `jenis`='$status', `semester`='$semester' WHERE skripsi.nim = $nim"; // berguna untuk merubah / memperbarui data status dan semester saja yg ada pada tabel skripsi
		// 	$this->eksekusi($query); // untuk mengeksekusi query sql di atas pada fungsi eksekusi yang ada pada class Database();
		// 	return $this->result; // menembalikan nilai dari hasil eksekusi fungsi eksekusi(); yang di taruh di variabel $result
		// }

		// danu 1700018168
		// fungsi untuk menampilkan semua data mahasiswa yang berada di tabel semprop untuk mengecek apakah sudah lulus metopen atau belum

		// public function getDataSempropMetopen() 
		// {
		// 	$query = "SELECT mahasiswa_metopen.nama as nama,seminar_proposal.id_seminar as id_seminar, seminar_proposal.nim as nim,seminar_proposal.status as status,mahasiswa_metopen.topik as topik,case when month(curdate())BETWEEN '1' and '6' then 2*(year(curdate())-(SUBSTRING(mahasiswa_metopen.nim,1,2)+2000)) 
		// 	else (2*(year(curdate()-1)-(SUBSTRING(mahasiswa_metopen.nim,1,2)+2000)))+1
		// 	END AS semester FROM seminar_proposal join mahasiswa_metopen on seminar_proposal.nim = mahasiswa_metopen.nim";
		// 	// query sql untuk menampilkan nama mahasiswa , id seminar, nim di semprop , status di semprop dan pengisian smester berdasarkan tahun angkatan
		// 	// yang nantinya di gunakan untuk mengubah status pada tabel skripsi dari metopen --> skripsi jika hanya jika pada tabel semprop statusnya sudah lulus 
		// 	$this->eksekusi($query); // untuk mengeksekusi query sql di atas pada fungsi eksekusi yang ada pada class Database();
		// 	return $this->result; // menembalikan nilai dari hasil eksekusi fungsi eksekusi(); yang di taruh di variabel $result
		// }

		// nofand 1700018152
		// fungsi ini menampilkan data nama, nim, dan nama dosen pembimbing di header log bimbingan 
		public function getHeaderLogbimbingan($nim)
		{
			$query = "SELECT mahasiswa_metopen.nama as nama, mahasiswa_metopen.nim as nim, dosen.nama as namdos FROM mahasiswa_metopen join dosen on mahasiswa_metopen.dosen = dosen.niy and mahasiswa_metopen.nim = $nim";
			// menampilkan nama mahasiswa, nim mahasiswa dan nama dosen pembimbing 
			// yang nantinya di program di gunakan untuk header daftar log bimbingan
			$this->eksekusi($query); // untuk mengeksekusi query sql di atas pada fungsi eksekusi yang ada pada class Database();
			return $this->result; // menembalikan nilai dari hasil eksekusi fungsi eksekusi(); yang di taruh di variabel $result
		}

		// danu 1700018168
		// data untuk menampilkan data semua data mahasiswa di tabel metopen kemudian di kirim ke tabel skripsi dengan status metopen
		// public function dataMetopen()
		// {
		// 	$query = "SELECT *,case when month(curdate())BETWEEN '1' and '6' then 2*(year(curdate())-(SUBSTRING(mahasiswa_metopen.nim,1,2)+2000)) 
		// 	else (2*(year(curdate()-1)-(SUBSTRING(mahasiswa_metopen.nim,1,2)+2000)))+1
		// 	END AS semester from mahasiswa_metopen"; 
		// 	// query sql untuk menampilkan seluruh data pada tabel mahasiswa_metopen dan nim berdasarkan tahun angkatan
		// 	// yang nantinya di masukkan ke tabel skripsi dengan status metopen
		// 	$this->eksekusi($query); // untuk mengeksekusi query sql di atas pada fungsi eksekusi yang ada pada class Database();
		// 	return $this->result; // menembalikan nilai dari hasil eksekusi fungsi eksekusi(); yang di taruh di variabel $result
		// }

		//dibuat oleh Arifaleo Nurdin (1700018158)
		//KETERANGAN : Fungsi ini digunakan untuk mencari data atau riwayat logbook bimbingan dari
		//			   mahasiswa tertentu, dengan dengan menampilkan model, id, nama, nim, dan nama dosennya 
		//			   dengan mengirimkan kata-kata yang ingin dicari dan setiap data logbook bimbingan yang 
		//			   terdapat kata-kata yang dicari maka akan tampil.
	    
		public function mencari_data_log_melalui_kata_yang_ingin_dicari($nim, $materi_key)
		{
			$query = "SELECT *,logbook_bimbingan.jenis as model,logbook_bimbingan.id_logbook as id,mahasiswa_metopen.nama as namaa, mahasiswa_metopen.nim as Nm, dosen.nama as namdis from logbook_bimbingan join mahasiswa_metopen on mahasiswa_metopen.nim = logbook_bimbingan.id_skripsi join dosen on dosen.niy = mahasiswa_metopen.Dosen WHERE mahasiswa_metopen.nim= $nim AND materi_bimbingan LIKE '%$materi_key%'"; 
			//Query untuk menampilkan model, id, nama, nim, dan nama dosennya dengan menjoin tabel logbook_bimbingan ke skripsi dengan
			//id_skripsi pada log_bimbingan sama dengan id_skripsi pada skripsi lalu di joinkan ke mahasiswa_metopen dengan nim pada 
			//mahasiswa_metopen sama dengan nim pada skripsi lalu dijoinkan dosen dengan niy pada dosen sama dengan Dosen pada 
			//mahasiswa_metopen dimana nim pada mahasiswa_metopen sama dengan kata atau materi yang dicari "key"
			$this->eksekusi($query); //untuk mengeksekusi query sql diatas yang telah dibuat
			return $this->result; //untuk mengembalikan hasil eksekusi fungsi ini
		}

		public function getNimFromId_log($nim)
		{
			$query="SELECT mahasiswa_metopen.nim as nim from mahasiswa_metopen join logbook_bimbingan on mahasiswa_metopen.nim = logbook_bimbingan.id_skripsi and logbook_bimbingan.id_logbook = $nim";
			$this->eksekusi($query); //untuk mengeksekusi query sql diatas yang telah dibuat
			return $this->result; //untuk mengembalikan hasil eksekusi fungsi ini

		}

	}

	$car = new Database();
    $car->connect();
?>

