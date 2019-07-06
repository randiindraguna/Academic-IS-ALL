<?php 

//Class analitik digunakan untuk merepresentasikan data hasil analisis dengan output berupa berbagai bentuk diagram (pie, bar), agar data yang ditampilkan lebih menarik

class Analitik
{
private $host ,$user,$pass,$database,$conn,$result;  //tipe data private agar variabel hanya dapat digunakan dalam class
	function __construct(){  //fungsi yang digunakan untuk menginisialisasikan database yang digunakan
		$this->host="localhost";   // variabel host diisi localhost
		$this->user="root";   // variabel user diisi root
		$this->pass="";   // variabel pass diisi kosong
		$this->database="manajemen_skripsi_prpl";  // variabel diisi database yang digunakan yang ada dalam sever localhost yaitu manajemen_skripsi_prpl
	}

	public function connect(){   //fungsi yang digunakan untuk koneksi ke database manajemen_skripsi_prpl
		$this->conn=mysqli_connect($this->host,$this->user,$this->pass);   //menghubungkan ke localhost
		mysqli_select_db($this->conn,$this->database);  //menghubungkan ke database
		if(!$this->conn){   //menghubungkan ke database
			return die('Maaf, koneksi belum tersambung: '.mysqli_connect_error()); //Maaf,koneksi belum tersambung
		}
	}
	public function eksekusi($query){  //fungsi yang digunakan untuk eksekusi query yang ada
		$this->result=mysqli_query($this->conn,$query);  //mengembalikan hasil dari query yang dieksekusi
	}

	//Di buat oleh Muhammad Nashir A (1700018117)
	public function getruang1(){
		$query="SELECT count(tempat)as jumlah1 from penjadwalan where tempat='1' and jenis_ujian='SEMPROP'";  //Query menampilkan jumlah pemakai ruangan di ruang 1, karena ini pakai jenis enum
		$this->eksekusi($query);  //mengeksekusi query diatas
		return $this->result;  //mengembalikan hasil dari query diatas
	}

	//Di buat oleh Muhammad Nashir A (1700018117)
	public function getruang2(){
		$query="SELECT count(tempat)as jumlah2 from penjadwalan where tempat='2' and jenis_ujian='SEMPROP'";   //Query menampilkan jumlah pemakai ruangan di ruang 2, karena ini pakai jenis enum
		$this->eksekusi($query);  //mengeksekusi query diatas
		return $this->result;  //mengembalikan hasil dari query diatas
	}

	//Di buat oleh Muhammad Nashir A (1700018117)
	public function getruang3(){
		$query="SELECT count(tempat)as jumlah3 from penjadwalan where tempat='3'  and jenis_ujian='SEMPROP'";   //Query menampilkan jumlah pemakai ruangan di ruang 3, karena ini pakai jenis enum
		$this->eksekusi($query);  //mengeksekusi query diatas
		return $this->result;  //mengembalikan hasil dari query diatas
	}
	//Di buat oleh Muhammad Nashir A (1700018117)
	public function getruang21(){
		$query="SELECT count(tempat)as jumlah21 from penjadwalan where tempat='1'  and jenis_ujian='UNDARAN'";   //Query menampilkan jumlah pemakai ruangan di ruang 3, karena ini pakai jenis enum
		$this->eksekusi($query);  //mengeksekusi query diatas
		return $this->result;  //mengembalikan hasil dari query diatas
	}
	//Di buat oleh Muhammad Nashir A (1700018117)
	public function getruang22(){
		$query="SELECT count(tempat)as jumlah22 from penjadwalan where tempat='2'  and jenis_ujian='UNDARAN'";   //Query menampilkan jumlah pemakai ruangan di ruang 3, karena ini pakai jenis enum
		$this->eksekusi($query);  //mengeksekusi query diatas
		return $this->result;  //mengembalikan hasil dari query diatas
	}
	//Di buat oleh Muhammad Nashir A (1700018117)
	public function getruang23(){
		$query="SELECT count(tempat)as jumlah23 from penjadwalan where tempat='3'  and jenis_ujian='UNDARAN'";   //Query menampilkan jumlah pemakai ruangan di ruang 3, karena ini pakai jenis enum
		$this->eksekusi($query);  //mengeksekusi query diatas
		return $this->result;  //mengembalikan hasil dari query diatas
	}

	// di buat oleh : RICCO YHANDY FERNANDO (1700018154)		
	public function getbidangminat(){
		$query="SELECT nama, bidang_minat, count(bidang_minat) as jumlah_bidang_minat1 from mahasiswa_metopen group by bidang_minat";
		//query tersebut menjelaskan tentang menampilkan jumlah mahasiswa yang mengambil bidang minat sistemcerdas
		$this->eksekusi($query);// mengeksekusi query diatas
		return $this->result;   // mengembalikan hasil dari query diatas
	}

	public function getbidangminatall($bidang){
	$query="SELECT nama as nama, bidang_minat as bidang_minat 
			from mahasiswa_metopen WHERE bidang_minat = '$bidang'"; 
	$this->eksekusi($query);// mengeksekusi query diatas
	return $this->result; 
	}
	
	public function getrelata(){
		$query="SELECT mahasiswa_metopen.nama as nama, mahasiswa_metopen.bidang_minat as bidang_minat, count(mahasiswa_metopen.bidang_minat) as jumlah_bidang_minat2 from mahasiswa_metopen where bidang_minat='relata'";	
		//query tersebut menjelaskan tentang tampilan jumlah mahasiswa yang mengambil bidang minat relata
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //mengembalikan hasil query diatas
	}

	//Dibuat oleh : Isnan A. Cahyadi (1700018161)
	public function lulus_SEMPROP(){ //function untuk menghitung jumlah mahasiswa yang lulus semprop
		$query="SELECT COUNT(id_seminar) AS jml_lulus FROM seminar_proposal WHERE status='lulus' GROUP BY status"; //query untuk menghitung jumlah mahasiswa yang lulus semprop
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //mengembalikan hasil query diatas
	}

	//Dibuat oleh : Isnan A. Cahyadi (1700018161)
	public function tidaklulus_SEMPROP(){ //function untuk menghitung jumlah mahasiswa yang tidak lulus semprop
		$query="SELECT COUNT(id_seminar) AS jml_tdk_lulus FROM seminar_proposal WHERE status='tidak_lulus' GROUP BY status"; //query untuk menghitung jumlah mahasiswa yang tidak lulus semprop
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //mengembalikan hasil query diatas
	}

	//Dibuat oleh : Isnan A. Cahyadi (1700018161)
	public function lulus_UNDARAN(){ //function untuk menghitung jumlah mahasiswa yang lulus undaran
		$query="SELECT COUNT(id_pendadaran) AS jml_lulus FROM ujian_pendadaran WHERE status='lulus' GROUP BY status"; //query untuk menghitung jumlah mahasiswa yang lulus undaran
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //mengembalikan hasil query diatas
	}

	//Dibuat oleh : Isnan A. Cahyadi (1700018161)
	public function tidaklulus_UNDARAN(){ //function untuk menghitung jumlah mahasiswa yang tidak lulus undaran
		$query="SELECT COUNT(id_pendadaran) AS jml_tdk_lulus FROM ujian_pendadaran WHERE status='tidak_lulus' GROUP BY status"; //query untuk menghitung jumlah mahasiswa yang tidak lulus undaran
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //mengembalikan hasil query diatas
	}
	public function getall(){
		$query="SELECT * from penjadwalan";
		$this->eksekusi($query);
		return $this->result;
	}
	//dibuat oleh : Tiara Anggraini Gaib (1700018175)
	public function tanggal_undaran($tgl){
		$query="SELECT tanggal AS tgl, tempat FROM penjadwalan 
				WHERE jenis_ujian = 'UNDARAN' AND tanggal = '$tgl'"; //untuk menampilkan tanggal dari tabel penjadwalan
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}
	//dibuat oleh : Tiara Anggraini Gaib (1700018175)
	public function tanggal_undaran_R1($tgl){
		$query="SELECT COUNT(nim) AS jumlah1, tanggal AS tgl, tempat FROM penjadwalan 
				WHERE jenis_ujian = 'UNDARAN' AND tanggal = '$tgl' 
				AND tempat = '1'"; //untuk menampilkan tanggal dari tabel penjadwalan
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}
	//dibuat oleh : Tiara Anggraini Gaib (1700018175)
	public function tanggal_undaran_R2($tgl){
		$query="SELECT COUNT(nim) AS jumlah2, tanggal AS tgl, tempat FROM penjadwalan 
				WHERE jenis_ujian = 'UNDARAN' AND tanggal = '$tgl' 
				AND tempat = '2'"; //untuk menampilkan tanggal dari tabel penjadwalan
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}
	//dibuat oleh : Tiara Anggraini Gaib (1700018175)
	public function tanggal_undaran_R3($tgl){
		$query="SELECT COUNT(nim) AS jumlah3, tanggal AS tgl, tempat FROM penjadwalan 
				WHERE jenis_ujian = 'UNDARAN' AND tanggal = '$tgl' 
				AND tempat = '3'"; //untuk menampilkan tanggal dari tabel penjadwalan
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}
	//dibuat oleh : Rifka Riyani Radilla (1700018171)
	public function tanggal_seminar_R1($tgl){
		$query="SELECT COUNT(nim) AS jumlah1, tanggal AS tgl, tempat FROM penjadwalan 
				WHERE jenis_ujian = 'SEMPROP' AND tanggal = '$tgl' 
				AND tempat = '1'"; //untuk menampilkan tanggal dari tabel penjadwalan
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}
	//dibuat oleh : Rifka Riyani Radilla (1700018171)
	public function tanggal_seminar_R2($tgl){
		$query="SELECT COUNT(nim) AS jumlah2, tanggal AS tgl, tempat FROM penjadwalan 
				WHERE jenis_ujian = 'SEMPROP' AND tanggal = '$tgl' 
				AND tempat = '2'"; //untuk menampilkan tanggal dari tabel penjadwalan
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}
	//dibuat oleh : Rifka Riyani Radilla (1700018171)
	public function tanggal_seminar_R3($tgl){
		$query="SELECT COUNT(nim) AS jumlah3, tanggal AS tgl, tempat FROM penjadwalan 
				WHERE jenis_ujian = 'SEMPROP' AND tanggal = '$tgl' 
				AND tempat = '3'"; //untuk menampilkan tanggal dari tabel penjadwalan
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}

	//Dibuat oleh : Heronitah Yanzyah (1700018129) 
	public function gender(){
		$query = "SELECT jenis_kelamin FROM mahasiswa_metopen GROUP BY jenis_kelamin";
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}
	//Dibuat oleh : Heronitah Yanzyah (1700018129) 
	public function gender_metopen_pr($status){
		$query = "SELECT COUNT(seminar_proposal.nim) AS jumlah_gen1,  seminar_proposal.status 
				  FROM mahasiswa_metopen JOIN seminar_proposal 
				  ON mahasiswa_metopen.nim = seminar_proposal.nim 
				  WHERE mahasiswa_metopen.jenis_kelamin = 'Laki-laki' 
				  AND seminar_proposal.status = '$status'";
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}
	//Dibuat oleh : Heronitah Yanzyah (1700018129) 
	public function gender_metopen_lk($status){
		$query = "SELECT COUNT(seminar_proposal.nim) AS jumlah_gen2,  seminar_proposal.status 
				  FROM mahasiswa_metopen JOIN seminar_proposal 
				  ON mahasiswa_metopen.nim = seminar_proposal.nim 
				  WHERE mahasiswa_metopen.jenis_kelamin = 'Perempuan' 
				  AND seminar_proposal.status = '$status'";
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}
	
	//Dibuat oleh : Heronitah Yanzyah (1700018129) 
	public function gender_undaran_lk($status){
		$query = "SELECT COUNT(ujian_pendadaran.nim) AS jumlah_gen4, ujian_pendadaran.status  
				  FROM mahasiswa_metopen JOIN ujian_pendadaran 
				  ON mahasiswa_metopen.nim = ujian_pendadaran.nim 
				  WHERE mahasiswa_metopen.jenis_kelamin = 'Laki-laki' 
				  AND ujian_pendadaran.status = '$status'";
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}
	//Dibuat oleh : Heronitah Yanzyah (1700018129) 
	public function gender_undaran_pr($status){
		$query = "SELECT COUNT(ujian_pendadaran.nim) AS jumlah_gen3, ujian_pendadaran.status  
				  FROM mahasiswa_metopen JOIN ujian_pendadaran 
				  ON mahasiswa_metopen.nim = ujian_pendadaran.nim 
				  WHERE mahasiswa_metopen.jenis_kelamin = 'Perempuan' 
				  AND ujian_pendadaran.status = '$status'";
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}

	//Dibuat oleh : Ervin Fikot M (1700018127)
	public function jumlah_ampu_bimbingan($bidang){
		$query="SELECT dosen.nama AS dos_bing, dosen.niy AS niy ,COUNT(mahasiswa_metopen.dosen) 
				AS jumlah_ampu FROM dosen JOIN mahasiswa_metopen 
				WHERE dosen.niy = mahasiswa_metopen.dosen 
				AND mahasiswa_metopen.bidang_minat = '$bidang' 
				GROUP BY dosen.niy"; //untuk menampilkan Jumlah Mahasiswa Bimbingan Masing - Masing Dosen    dan direpresentasikan dalam Grafik 
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}

	//Dibuat oleh : Ervin Fikot M (1700018127)
	public function profil_dosbing($bidang){
		$query="SELECT dosen.nama AS Dosen_pembimbing, dosen.bidang_keahlian AS Bidang, 
				COUNT(mahasiswa_metopen.dosen) AS Jumlah_Mhs_Diampu FROM dosen JOIN mahasiswa_metopen 
				WHERE dosen.niy = mahasiswa_metopen.dosen AND mahasiswa_metopen.bidang_minat = '$bidang' 
				GROUP BY dosen.niy"; //untuk menampilkan Profil data dosen yang terpresentasi oleh grafik
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}
	public function tampil_undar(){ //function untuk menghitung jumlah mahasiswa yang lulus semprop
		$query="SELECT ujian_pendadaran.nim,mahasiswa_metopen.nama,ujian_pendadaran.status
				FROM ujian_pendadaran JOIN mahasiswa_metopen
				ON mahasiswa_metopen.nim=ujian_pendadaran.nim
				where ujian_pendadaran.status='lulus'"; //query untuk menghitung jumlah mahasiswa yang lulus semprop
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //mengembalikan hasil query diatas
	}
	public function undar_lulus(){ //function untuk menghitung jumlah mahasiswa yang tidak lulus semprop
		$query="SELECT COUNT(id_pendadaran) as jumlah1 FROM ujian_pendadaran WHERE status = 'lulus'"; //query untuk menghitung jumlah mahasiswa yang tidak lulus semprop
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //mengembalikan hasil query diatas

	}
	public function undar_tidaklulus(){ //function untuk menghitung jumlah mahasiswa yang tidak lulus semprop
		$query="SELECT COUNT(id_pendadaran) as jumlah2 FROM ujian_pendadaran WHERE status = 'tidak_lulus'"; //query untuk menghitung jumlah mahasiswa yang tidak lulus semprop
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //mengembalikan hasil query diatas
	}

	public function Status_mtp_lulus_p(){ //function untuk menghitung jumlah mahasiswa yang tidak lulus semprop
		$query="SELECT mahasiswa_metopen.jenis_kelamin as jekel ,COUNT(mahasiswa_metopen.nim) 
				AS jumlah_l FROM mahasiswa_metopen JOIN seminar_proposal 
				WHERE mahasiswa_metopen.nim = seminar_proposal.nim 
				AND seminar_proposal.status = 'lulus' AND mahasiswa_metopen.jenis_kelamin = 'Perempuan'"; //query untuk menghitung jumlah mahasiswa yang tidak lulus semprop
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //mengembalikan hasil query diatas
	}
	public function Status_mtp_lulus_l(){ //function untuk menghitung jumlah mahasiswa yang tidak lulus semprop
		$query="SELECT mahasiswa_metopen.jenis_kelamin as jekel ,COUNT(mahasiswa_metopen.nim) 
				AS jumlah_l FROM mahasiswa_metopen JOIN seminar_proposal 
				WHERE mahasiswa_metopen.nim = seminar_proposal.nim 
				AND seminar_proposal.status = 'lulus' AND mahasiswa_metopen.jenis_kelamin = 'Laki-laki'"; //query untuk menghitung jumlah mahasiswa yang tidak lulus semprop
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //mengembalikan hasil query diatas
	}

	public function Status_mtp_tidak_lulus_p(){ //function untuk menghitung jumlah mahasiswa yang tidak lulus semprop
		$query="SELECT mahasiswa_metopen.jenis_kelamin as jekel ,COUNT(mahasiswa_metopen.nim) 
				AS jumlah_tl FROM mahasiswa_metopen JOIN seminar_proposal 
				WHERE mahasiswa_metopen.nim = seminar_proposal.nim 
				AND seminar_proposal.status = 'tidak_lulus'AND mahasiswa_metopen.jenis_kelamin = 'Perempuan'"; //query untuk menghitung jumlah mahasiswa yang tidak lulus semprop
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //mengembalikan hasil query diatas
	}
	public function Status_mtp_tidak_lulus_l(){ //function untuk menghitung jumlah mahasiswa yang tidak lulus semprop
		$query="SELECT mahasiswa_metopen.jenis_kelamin as jekel ,COUNT(mahasiswa_metopen.nim) 
				AS jumlah_tl FROM mahasiswa_metopen JOIN seminar_proposal 
				WHERE mahasiswa_metopen.nim = seminar_proposal.nim 
				AND seminar_proposal.status = 'tidak_lulus'AND mahasiswa_metopen.jenis_kelamin = 'Laki-laki'"; //query untuk menghitung jumlah mahasiswa yang tidak lulus semprop
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //mengembalikan hasil query diatas
	}
	public function tampil_mtp_gender(){ //function untuk menghitung jumlah mahasiswa yang tidak lulus semprop
		$query="SELECT mahasiswa_metopen.nama as nama , mahasiswa_metopen.jenis_kelamin as gen,
				seminar_proposal.status AS status FROM mahasiswa_metopen JOIN seminar_proposal 
				WHERE mahasiswa_metopen.nim = seminar_proposal.nim"; //query untuk menghitung jumlah mahasiswa yang tidak lulus semprop
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //mengembalikan hasil query diatas
	}
	//dibuat oleh : LATIFATUL MUJAHIDAH (1700018159)
	public function nama_prodi(){
		$query = "SELECT * FROM prodi";
		$this->eksekusi($query);
		return $this->result;
	}
	public function lulus_semprop_prodi($id,$stt){
		$query = "SELECT COUNT(seminar_proposal.nim) AS jumlah_mhs, prodi.nama_prodi 
				  FROM seminar_proposal JOIN prodi ON prodi.id_prodi = SUBSTRING(seminar_proposal.nim, 6, 2) 
				  WHERE prodi.id_prodi = '$id' AND seminar_proposal.status = '$stt'";
		$this->eksekusi($query);
		return $this->result;
	}

	public function lulus_undaran_prodi($id,$stt){
		$query = "SELECT COUNT(ujian_pendadaran.nim) AS jumlah_mhs, prodi.nama_prodi 
				  FROM ujian_pendadaran JOIN prodi ON prodi.id_prodi = SUBSTRING(ujian_pendadaran.nim, 6, 2) 
				  WHERE prodi.id_prodi = '$id' AND ujian_pendadaran.status = '$stt'";
		$this->eksekusi($query);
		return $this->result;
	}

	public function getNilai_semprop(){
		$query = "SELECT nim, nilai_proses_pembimbing AS nilai_1, nilai_ujian_pembimbing AS nilai_2, nilai_ujian_penguji AS nilai_3 FROM seminar_proposal";
		$this->eksekusi($query);
		return $this->result;
	}
	//dibuat oleh Ervin FIkot M(1700018127)
	public function konversi($nilai_1, $nilai_2, $nilai_3){
		$total = ($nilai_1 + $nilai_2 + $nilai_3);
		$rerata = ($total/3);
			if ($rerata >=80){
				return 'A';
	        }elseif (($rerata <80) && ($rerata >=60)) {
	            return 'B';      
	        }elseif (($rerata <60) && ($rerata >=40)) {
	            return 'C';      
	        }elseif (($rerata <40) && ($rerata >=20)) {
	            return 'D';       
	        }elseif (($rerata <20) && ($rerata >=0)) {
	            return 'E';      
	        }else{
	           	return 0;
	       	}
	}

	
	}	
	
 ?>