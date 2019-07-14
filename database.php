<?php 
/*penjelasan class registermtp
class registermtp ini digunakan untuk lebih mempermudah mahasiswa yang akan mengambil mata kuliah metopen seperti mengisi data mahasiswa, melihat data mahasiswa yang mengambil matkul metopen, nama dosen pembimbing metopen, bidang minat mahasiswa, terdapat pula fitur pendukung
seperti update dan hapus serta melihat mahasiswa yang dibimbing oleh dosen tertentu dan lebih jelasnya dalam class Database ini terdapat 14 function pendukung yang digunakan yaitu :
1. function_construct 
2. function connect
3. function eksekusi
4. function getDosen
5. function getMhs
6. function register
7. function getJumlahMhs
8. function getJumlahDosen
9. function FormUpdateDataMahasiswaMetopen
10.function UpdateDataMahasiswaMetopen
11.function getJumlahMahasiswaBimbingan 
12.function CariDataMahasiswa
13.function DeleteMahasiswaMetopen
14.function getDataMahasiswaBimbinganDosenTertentu
15.function FormUpdateDataSemester
16.function UpdateDataSemester
17.function DeleteDataSemester
18.function SemesterTerbuka
19.function Semester
20.function Inputsemester
21.function getsatuDosen
Untuk penjelasan function-function diatas akan dijelaskan pada class dibawah ini.
*/

class Database
{
	private $host ,$user,$pass,$database,$conn,$result; //tipe data private agar variabel hanya dapat digunakan dalam class
	function __construct(){  //fungsi yang digunakan untuk menginisialisasikan database yang digunakan
		$this->host="localhost";	// variabel host diisi localhost
		$this->user="root";			// variabel user diisi root
		$this->pass="";				// variabel pass diisi kosong
		$this->database="manajemen_skripsi_prpl";	// variabel diisi database yang digunakan yang ada dalam sever localhost yaitu manajemen_skripsi_prpl
	}
	//Dibuat oleh agung parmono
	public function connect(){	//fungsi yang digunakan untuk koneksi ke database manajemen_skripsi_prpl
		$this->conn=mysqli_connect($this->host,$this->user,$this->pass);	//menghubungkan ke localhost
		mysqli_select_db($this->conn,$this->database);						//menghubungkan ke database
		if(!$this->conn){ 													//jika koneksi gagal muncul pesan dibawah ini
			return die('Maaf, koneksi belum tersambung: '.mysqli_connect_error()); //Maaf,koneksi belum tersambung
		}
	}
	//Dibuat oleh agung parmono
	public function eksekusi($query){	//fungsi yang digunakan untuk eksekusi query yang ada
		$this->result=mysqli_query($this->conn,$query);	//mengembalikan hasil dari query yang dieksekusi
		return $this->result; // menambahkan return
	}
	//Dibuat oleh agung parmono
	public function getDosen(){	//fungsi yang dibuat untuk menampilkan seluruh data dosen
		$query="SELECT * FROM dosen";	//query untuk menampilkan seluruh data dosen
		$this->eksekusi($query);		//mengeksekusi query diatas
		return $this->result;			//mengembalikan hasil dari query diatas
	}
	//Dibuat oleh ihsan fadhilah
	public function getMhs(){  //fungsi untuk menampilkan data mahasiswa
		$query="SELECT mahasiswa_metopen.nama as nama,mahasiswa_metopen.nim as nim,semester.periode as periode,mahasiswa_metopen.jenis_kelamin as jenis_kelamin,mahasiswa_metopen.topik as topik,dosen.nama as namados,mahasiswa_metopen.bidang_minat as bidang_minat, mahasiswa_metopen.status as status,mahasiswa_metopen.tanggal_mulai as tanggal_mulai FROM mahasiswa_metopen JOIN dosen JOIN semester WHERE mahasiswa_metopen.dosen=dosen.niy and semester.status='terbuka'"; //query untuk menampilkan nama,nim,semester,jenis kelamin, topik, nama dosen, bidang minat, dan tanggal mulai mahasiswa itu
		$this->eksekusi($query);	//mengeksekusi query diatas
		return $this->result;		//untuk mengembalikan hasil eksekusi fungsi
	}
	//Dibuat oleh agung parmono
	public function register($nim,$nama,$jenis_kelamin,$topik,$dosen,$bidang_minat,$tanggal_mulai){	//fungsi yang digunakan untuk mendaftarkan mahasiswa untuk metopen
		$query = "INSERT INTO mahasiswa_metopen(nim,nama,jenis_kelamin,topik,dosen,bidang_minat,tanggal_mulai) VALUES ('$nim','$nama','$jenis_kelamin','$topik','$dosen','$bidang_minat','$tanggal_mulai')"; //query untuk menambah data mahasiswa berupa nim,nama,jenis kelamin,topik,dosen,bidang minat dan tanggal mulai yang akan disimpan pada tabel mahasiswa_metopen
		$this->eksekusi($query);	//mengeksekusi query diatas
		return $this->result;		//mengembalikan hasil dari query diatas
	}
	//Dibuat oleh amir fauzi ansharif
	public function getJumlahMhs(){ //fungsi yang di gunakan untuk mengambil jumlah mahasiswa
		$query="SELECT COUNT(nim) as jumlah_mahasiswa FROM mahasiswa_metopen"; //query untuk mengambil jumlah mahasiswa berdasarkan nim
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result;  //mengembalikan hasil dari query diatas
	}
	//Dibuat oleh aurelia gofarawati
	public function getJumlahDosen(){ //fungsi yang digunakan untuk mengambil jumlah dosen
		$query="SELECT COUNT(niy) as jumlah_dosen FROM dosen"; //query untuk mengmbil jumlah dosen berdasarkan niy
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //mengembalikan hasil dari query diatas
	}
	//Dibuat oleh randi indraguna
	public function FormUpdateDataMahasiswaMetopen($nim){ //fungsi yang digunakan untuk menampilkan form update data mahasiswa metopen
		$query = "SELECT nim, nama, jenis_kelamin, topik, dosen, bidang_minat 
				FROM mahasiswa_metopen 
				where nim='$nim'"; //query untuk menampilkan form update berdasarkan $nim yang akan di pilih untuk di update
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //mengembalikan hasil query diatas
		
	}
	//Dibuat oleh randi indraguna
	public function FormUpdateDataSemester($id_semester){ //fungsi yang digunakan untuk menampilkan form update data semester
		$query = "SELECT id_semester, periode, status FROM semester where id_semester='$id_semester'"; //query untuk menampilkan form update berdasarkan $id_semester yang akan di pilih untuk di update
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //mengembalikan hasil query diatas
		
	}
	//Dibuat oleh randi indraguna
	public function UpdateDataMahasiswaMetopen($nim,$nama,$jenis_kelamin,$topik,$dosen,$bidang_minat){ //fungsi yang digunakan untuk mengupdate data mahasiswa metopen
		$query="UPDATE mahasiswa_metopen SET nim='$nim',nama='$nama',jenis_kelamin='$jenis_kelamin',topik='$topik',
				dosen='$dosen',bidang_minat='$bidang_minat' 
				WHERE nim='$nim'"; //query untuk mengupdate data mahasiswa metopen yang telah diubah di form update 
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //mengembalikan hasil query diatas
	}
	//Dibuat oleh randi indraguna
	public function UpdateDataSemester($id_semester,$periode,$status){ //fungsi yang digunakan untuk mengupdate data semester
		$query="UPDATE semester SET id_semester='$id_semester',periode='$periode',status='$status' 
		WHERE id_semester='$id_semester'"; //query untuk mengupdate data semester yang telah diubah di form update semester
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //mengembalikan hasil query diatas
	}
	//Dibuat oleh amir fauzi ansharif
	public function DeleteDataSemester($id_semester){ // Fungsi ini untuk menghapus data mahasiswa metopen
		$query="DELETE FROM semester WHERE id_semester='$id_semester'"; // Query ini digunakan untuk menghapus data mahasiswa yang telah mendaftar metopen
		$this->eksekusi($query); // untuk mengeksekusi query sql diatas yang telah dibuat
		return $this->result;	
	}
	//Dibuat oleh ihsan fadhilah
	public function getJumlahMahasiswaBimbingan(){ //fungsi untuk mendapatkan jumlah mahasiswa bimbingan setiap dosennya 
		$query = "SELECT dosen.nama as nama, dosen.niy as niy, COUNT(nim) as jumlah_mahasiswa FROM mahasiswa_metopen JOIN dosen ON mahasiswa_metopen.dosen = dosen.niy group by niy";  //query untuk mendapatkan jumlah mahasiswa bimbingan setiap dosennya
		$this->eksekusi($query);	//berguna untuk mengeksekusi query sql diatas yang telah dibuat
		return $this->result;		//untuk mengembalikan hasil eksekusi fungsi
	}
    //Dibuat oleh Nur Fadhilah Alfianty Firman
	public function CariDataMahasiswa($nim){ // function digunakan untuk mempermudah mencari data mahasiswa
		 //digunakan untuk menampilkan data mahasiswa metopen dan mencari dengan nim
		$query="SELECT mahasiswa_metopen.nama as nama,mahasiswa_metopen.nim as nim,mahasiswa_metopen.jenis_kelamin as jenis_kelamin,mahasiswa_metopen.topik as topik,dosen.nama as namados,mahasiswa_metopen.bidang_minat as bidang_minat,mahasiswa_metopen.status as status,mahasiswa_metopen.tanggal_mulai as tanggal_mulai FROM mahasiswa_metopen JOIN dosen WHERE mahasiswa_metopen.dosen=dosen.niy and nim='$nim'";
		$this->eksekusi($query); // berguna untuk mengeksekusi query sql diatas yang telah dibuat
		return $this->result; //untuk mengembalikan hasil eksekusi fungsi 
	}
	//Dikerjakan oleh Eef Mekelliano
	public function DeleteMahasiswaMetopen($nim){ // Fungsi ini untuk menghapus data mahasiswa metopen
		$query="DELETE FROM mahasiswa_metopen WHERE nim='$nim'"; // Query ini digunakan untuk menghapus data mahasiswa yang telah mendaftar metopen
		$this->eksekusi($query); // untuk mengeksekusi query sql diatas yang telah dibuat
		return $this->result; // untuk mengembalikan hasil eksekusi pada fungsi ini.
	}
	//Dikerjakan oleh amir fauzi ansharif
	public function getDataMahasiswaBimbinganDosenTertentu($niy){ //fungsi ini digunakan untuk menampilkan data mahasiswa bimbingan dari dosen tertentu dengan paramater $niy 
		$query="SELECT mahasiswa_metopen.nama as nama_mhs, mahasiswa_metopen.nim as nim_mhs from mahasiswa_metopen join dosen on mahasiswa_metopen.dosen=dosen.niy where dosen.niy='$niy'"; //query ini digunakan untuk menampilkan data mahasiswa bimbingan dari dosen tertentu
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk mengembalikan hasil eksekusi query diatas
	}
	//Dikerjakan oleh randi indraguna
	public function SemesterTerbuka(){
		$query="SELECT * from semester where status='terbuka'"; //query ini untuk menampilkan semester dengan status terbuka
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk mengembalikan hasil query diatas
	}
	//Dikerjakan oleh randi indraguna
	public function Inputsemester($periode,$status){ 
		$query="INSERT INTO semester (periode,status) VALUES ('$periode','$status')"; //query ini untuk menampilkan form input semester (periode,status semester)
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk mengembalikan hasil query diatas
	}
	//Dikerjakan oleh randi indraguna
		public function Semester(){
		$query="SELECT * from semester"; //query ini untuk menampilkan seluruh semester baik terbuka maupun yang tertutup
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk mengembalikan hasil query diatas
	}
	//Dikerjakan oleh randi indraguna
		public function getsatuDosen($niy){
		$query="SELECT * from dosen where niy='$niy'"; //query ini untuk menampilkan satu dosen yang dipilih
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk mengembalikan hasil query diatas
	}
	//Dikerjakan oleh agung parmono
		public function ceknim($cek){
		$query="SELECT COUNT(nim) AS jum FROM mahasiswa_metopen WHERE nim = '$cek'"; //query untuk menghitung jumlah mahasiswa berdasarkan nim
		$this->eksekusi($query);  //untuk mengeksekusi query diatas
		return $this->result; //untuk mengembalikan hasil query diatas
	}



}
	$akses = new Database(); //mendeklariskan $akses agar terbaca di program
    $akses->connect(); 
 ?>
