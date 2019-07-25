<?php 

	// Fitur    :	Analitik / Statistik
	// Ketua	:	Ervin Fikot M - 1700018127
	// Anggota	:	1. Isnan Arif Cahyadi - 1700018161
	// 				2. Ricco Yhandy Fernando - 1700018154
	// 				3. Muhammad Nashir Al Latif - 1700018117
	// 				4. Tiara Anggraini Ghaib - 1700018175
	// 				5. Rifka Riyani Radilla - 1700018171
	// 				6. Laifatul Mujahidah - 1700018159
	// 				7. Heronitah Yhanzyah - 1700018129

	//Class_Analitik => Berfungsi untuk menghimpun semua proses yang berjalan di User interface (UI) 
	//				 	dan menghubungkan dengan Database, Selain itu Class_Analitik juga berfungsi sebagai
	//				 	Permodelan Instansiasi Objek dari database agar dapat di implementasikan dalam pemanggilan
	//				 	dengan bantuan function - function yang berisikan query serta bantuan method eksekusi 
	//				 	sebagai result/pengeksekusian query - query di dalam function.

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

	// ===================== Pengerjaan oleh Ervin Fikot M - 1700018127 =============================//

	public function jumlah_ampu_bimbingan($bidang){
		$query="SELECT dosen.nama AS dos_bing, dosen.niy AS niy ,COUNT(mahasiswa_metopen.dosen) 
				AS jumlah_ampu FROM dosen JOIN mahasiswa_metopen 
				WHERE dosen.niy = mahasiswa_metopen.dosen 
				AND mahasiswa_metopen.bidang_minat = '$bidang' 
				GROUP BY dosen.niy ORDER BY jumlah_ampu ASC"; //untuk menampilkan Jumlah Mahasiswa Bimbingan Masing - Masing Dosen    dan direpresentasikan dalam Grafik 
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}

	public function profil_dosbing($bidang){
		$query="SELECT dosen.nama AS Dosen_pembimbing, dosen.bidang_keahlian AS Bidang, 
				COUNT(mahasiswa_metopen.dosen) AS Jumlah_Mhs_Diampu FROM dosen JOIN mahasiswa_metopen 
				WHERE dosen.niy = mahasiswa_metopen.dosen AND mahasiswa_metopen.bidang_minat = '$bidang' 
				GROUP BY dosen.niy"; //untuk menampilkan Profil data dosen yang terpresentasi oleh grafik
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}

	public function getNilai_semprop(){
		$query = "SELECT nim, nilai_proses_pembimbing AS nilai_1, nilai_ujian_pembimbing AS nilai_2, nilai_ujian_penguji AS nilai_3 FROM seminar_proposal";
		$this->eksekusi($query);
		return $this->result;
	}

	public function getJadwalTerdekat($niy){
		$query = "SELECT dosen.niy, penjadwalan.tanggal AS tgl_dekat, penjadwalan.jam AS jam_dekat, penjadwalan.tempat AS tmp_dekat  
			 	  FROM dosen JOIN penguji ON dosen.niy = penguji.niy JOIN penjadwalan 
				  ON penguji.id_jadwal = penjadwalan.id_jadwal  WHERE dosen.niy = '$niy' 
				  ORDER BY penjadwalan.tanggal DESC LIMIT 1";
	    $this->eksekusi($query);
		return $this->result;
	}

	public function getDosentakpenguji(){
		foreach ($this->getData_dosen as $dsn1) {
			foreach ($this->getDosenPenguji as $dsn2) {
				$temp = $dsn1['jml_dosen'] - $dsn2['total'];
				return $temp;
			}
		}
	}
	// ===================== Pengerjaan oleh Isnan Arif Cahyadi - 1700018161 =============================//

	public function lulus_SEMPROP(){ //fungsi untuk menghitung jumlah mahasiswa yang lulus semprop
		$query="SELECT COUNT(id_seminar) AS jml_lulus FROM seminar_proposal WHERE status='lulus' GROUP BY status"; //query untuk menghitung jumlah mahasiswa yang lulus semprop
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //mengembalikan hasil query diatas
	}

	public function tidaklulus_SEMPROP(){ //fungsi untuk menghitung jumlah mahasiswa yang tidak lulus semprop
		$query="SELECT COUNT(id_seminar) AS jml_tdk_lulus FROM seminar_proposal WHERE status='tidak_lulus' GROUP BY status"; //query untuk menghitung jumlah mahasiswa yang tidak lulus semprop
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //mengembalikan hasil query diatas
	}

	public function lulus_UNDARAN(){ //fungsi untuk menghitung jumlah mahasiswa yang lulus undaran
		$query="SELECT COUNT(id_pendadaran) AS jml_lulus FROM ujian_pendadaran WHERE status='lulus' GROUP BY status"; //query untuk menghitung jumlah mahasiswa yang lulus undaran
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //mengembalikan hasil query diatas
	}

	public function tidaklulus_UNDARAN(){ //fungsi untuk menghitung jumlah mahasiswa yang tidak lulus undaran
		$query="SELECT COUNT(id_pendadaran) AS jml_tdk_lulus FROM ujian_pendadaran WHERE status='tidak_lulus' GROUP BY status"; //query untuk menghitung jumlah mahasiswa yang tidak lulus undaran
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //mengembalikan hasil query diatas
	}

	public function getData_metopen(){
		$query = "SELECT COUNT(nim) AS jml_metopen FROM mahasiswa_metopen WHERE status = 'metopen'";
		$this->eksekusi($query);
		return $this->result;
	}

	public function getDataMhs($nim){
		$query = "SELECT * FROM mahasiswa_metopen WHERE nim = '$nim'";
		$this->eksekusi($query);
		return $this->result;
	}
	// ===================== Pengerjaan oleh Ricco Yhandy Fernando - 1700018154 =============================//	

	public function getbidangminat(){
		$query="SELECT nama, bidang_minat, count(bidang_minat) as jumlah_bidang_minat1 from mahasiswa_metopen group by bidang_minat";
		//query tersebut menjelaskan tentang menampilkan jumlah mahasiswa yang mengambil bidang minat sistemcerdas
		$this->eksekusi($query);// mengeksekusi query diatas
		return $this->result;   // mengembalikan hasil dari query diatas
	}

	public function getbidangminatall($bidang){
		$query="SELECT nama as nama, bidang_minat as bidang_minat 
				from mahasiswa_metopen WHERE bidang_minat = '$bidang'"; //query tersebut tentang menampilkan seluruh bidang minat yang di ambil oleh mahasiswa
		$this->eksekusi($query);// mengeksekusi query diatas
		return $this->result;//mengembalikan hasil dari query diatas 
	}

	public function getall(){
		$query="SELECT * from penjadwalan";//query yang berguna untuk mengambil semua data dari penjadwalan
		$this->eksekusi($query);//mengeksekusi query diatas
		return $this->result;//mengembalikan hasil dari query diatas
	}
	
	public function getrelata(){
		$query="SELECT mahasiswa_metopen.nama as nama, mahasiswa_metopen.bidang_minat as bidang_minat, count(mahasiswa_metopen.bidang_minat) as jumlah_bidang_minat2 from mahasiswa_metopen where bidang_minat='relata'";	
		//query tersebut menjelaskan tentang tampilan jumlah mahasiswa yang mengambil bidang minat relata
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //mengembalikan hasil dari query diatas
	}

	public function getData_semester(){
		$query = "SELECT * FROM semester WHERE status = 'terbuka'";// query tersebut berguna untuk mengambil semua data dari semester yang dimana statusnya terbuka
		$this->eksekusi($query);// mengeksekusi query diatas
		return $this->result;//mengembalikan hasil dari query diatas
	}

	public function getMhs_dosen($nim){
		$query = "SELECT mahasiswa_metopen.nim, dosen.nama AS nama_dos FROM mahasiswa_metopen JOIN dosen 
				  ON mahasiswa_metopen.dosen = dosen.niy WHERE mahasiswa_metopen.nim = '$nim'";// query tersebut berguna untuk menampilkan dosen pembimbing berdasar nim yang dicari
		$this->eksekusi($query);//mengeksekusi query diatas
		return $this->result;//mengembalikan hasil dari query diatas 
	}
	// ===================== Pengerjaan oleh Muhammad Nashir Allatif - 1700018117 =============================//

	public function getruang1_semprop(){
		$query="SELECT count(tempat)as jumlah1semprop from penjadwalan where tempat='1' and jenis_ujian='SEMPROP'";  //Query menampilkan jumlah ruangan 1 pada Seminar proposal
		$this->eksekusi($query);  //Eksekusi query diatas
		return $this->result;  //Mengembalikan hasil dari query diatas
	}

	public function getruang2_semprop(){
		$query="SELECT count(tempat)as jumlah2semprop from penjadwalan where tempat='2' and jenis_ujian='SEMPROP'";   //Query menampilkan jumlah ruangan 2 pada Seminar proposal
		$this->eksekusi($query);  //Eksekusi query diatas
		return $this->result;  //Mengembalikan hasil dari query diatas
	}

	public function getruang3_semprop(){
		$query="SELECT count(tempat)as jumlah3semprop from penjadwalan where tempat='3'  and jenis_ujian='SEMPROP'";   //Query menampilkan jumlah ruangan 3 pada Seminar proposal
		$this->eksekusi($query);  //Eksekusi query diatas
		return $this->result;  //Mengembalikan hasil dari query diatas
	}
	public function getruang1_undaran(){
		$query="SELECT count(tempat)as jumlah1undaran from penjadwalan where tempat='1'  and jenis_ujian='UNDARAN'";   //Query menampilkan jumlah ruangan 1 pada undaran
		$this->eksekusi($query);  //Eksekusi query diatas
		return $this->result;  //Mengembalikan hasil dari query diatas
	}
	public function getruang2_undaran(){
		$query="SELECT count(tempat)as jumlah2undaran from penjadwalan where tempat='2'  and jenis_ujian='UNDARAN'";   //Query menampilkan jumlah ruangan 2 pada undaran
		$this->eksekusi($query);  //Eksekusi query diatas
		return $this->result;  //Mengembalikan hasil dari query diatas
	}
	public function getruang3_undaran(){
		$query="SELECT count(tempat)as jumlah3undaran from penjadwalan where tempat='3'  and jenis_ujian='UNDARAN'";   //Query menampilkan jumlah ruangan 3 pada undaran
		$this->eksekusi($query);  //Eksekusi query diatas
		return $this->result;  //Mengembalikan hasil dari query diatas
	}
		public function getcek_nilai_undaran(){ //query untuk mengecek apakah ruangan untuk undaran masih kosong semua atau tidak
		$query="SELECT tempat from penjadwalan WHERE jenis_ujian='UNDARAN'";
		$this->eksekusi($query); //Eksekusi query diatas
		return $this->result;  //Mengembalikan hasil dari query diatas
	}
	public function getcek_nilai_semprop(){
		$query="SELECT tempat from penjadwalan WHERE jenis_ujian='SEMPROP'";
		$this->eksekusi($query);
		return $this->result; 
	}
	// ===================== Pengerjaan oleh Tiara Anggraini Ghaib - 1700018175 =============================//

	public function tanggal_undaran($tgl){
		$query="SELECT tanggal AS tgl, tempat FROM penjadwalan 
				WHERE jenis_ujian = 'UNDARAN' AND tanggal = '$tgl'"; //untuk menampilkan tanggal dari tabel penjadwalan
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}
	
	public function tanggal_undaran_R1($tgl){
		$query="SELECT COUNT(nim) AS jumlah1, tanggal AS tgl, tempat FROM penjadwalan 
				WHERE jenis_ujian = 'UNDARAN' AND tanggal = '$tgl' 
				AND tempat = '1'"; //untuk menampilkan tanggal dari tabel penjadwalan
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}

	public function tanggal_undaran_R2($tgl){
		$query="SELECT COUNT(nim) AS jumlah2, tanggal AS tgl, tempat FROM penjadwalan 
				WHERE jenis_ujian = 'UNDARAN' AND tanggal = '$tgl' 
				AND tempat = '2'"; //untuk menampilkan tanggal dari tabel penjadwalan
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}
	
	public function tanggal_undaran_R3($tgl){
		$query="SELECT COUNT(nim) AS jumlah3, tanggal AS tgl, tempat FROM penjadwalan 
				WHERE jenis_ujian = 'UNDARAN' AND tanggal = '$tgl' 
				AND tempat = '3'"; //untuk menampilkan tanggal dari tabel penjadwalan
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}

	public function getData_dosen(){
		$query = "SELECT COUNT(niy) AS jml_dosen FROM dosen";
		$this->eksekusi($query);
		return $this->result;
	}

	// ===================== Pengerjaan oleh Rifka Riyani Radilla - 1700018171 =============================//

	public function tanggal_seminar($tgl){
		$query="SELECT tanggal AS tgl, tempat FROM penjadwalan 
				WHERE jenis_ujian = 'SEMPROP' AND tanggal = '$tgl'"; //untuk menampilkan tanggal dari tabel penjadwalan
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}
	
	public function tanggal_seminar_R1($tgl){
		$query="SELECT COUNT(nim) AS jumlah1, tanggal AS tgl, tempat FROM penjadwalan 
				WHERE jenis_ujian = 'SEMPROP' AND tanggal = '$tgl' 
				AND tempat = '1'"; //untuk menampilkan tanggal dari tabel penjadwalan
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}
	
	public function tanggal_seminar_R2($tgl){
		$query="SELECT COUNT(nim) AS jumlah2, tanggal AS tgl, tempat FROM penjadwalan 
				WHERE jenis_ujian = 'SEMPROP' AND tanggal = '$tgl' 
				AND tempat = '2'"; //untuk menampilkan tanggal dari tabel penjadwalan
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}
	
	public function tanggal_seminar_R3($tgl){
		$query="SELECT COUNT(nim) AS jumlah3, tanggal AS tgl, tempat FROM penjadwalan 
				WHERE jenis_ujian = 'SEMPROP' AND tanggal = '$tgl' 
				AND tempat = '3'"; //untuk menampilkan tanggal dari tabel penjadwalan
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}

	public function getData_skripsi(){
		$query = "SELECT COUNT(nim) AS jml_skripsi FROM mahasiswa_metopen WHERE status = 'skripsi'"; //untuk menampilkan jumlah skripsi dari tabel metopen
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}

	public function getJumMhs($niy){
		$query = "SELECT dosen.nama, COUNT(mahasiswa_metopen.nim) AS jum_mhs 
				  FROM dosen JOIN mahasiswa_metopen ON dosen.niy = mahasiswa_metopen.dosen AND dosen.niy = '$niy'"; //untuk menampilkan jumlah mahasiswa bimbingan tiap dosen
		$this->eksekusi($query); //untuk mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}

	// ===================== Pengerjaan oleh Laifatul Mujahidah - 1700018159 =============================//

	public function nama_prodi(){
		$query = "SELECT * FROM prodi";
		$this->eksekusi($query);
		return $this->result;
	}
	public function lulus_semprop_prodi($stt){
		$query = "SELECT COUNT(seminar_proposal.nim) AS jumlah_mhs, prodi.nama_prodi 
				  FROM seminar_proposal JOIN prodi ON prodi.id_prodi = SUBSTRING(seminar_proposal.nim, 6, 2) 
				  WHERE seminar_proposal.status = '$stt'
				  GROUP BY prodi.nama_prodi ORDER BY jumlah_mhs ASC";
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

	public function get_Profil($usr){
			$query = "SELECT * FROM `login` WHERE user_name = '$usr'";
			$this->eksekusi($query);
			return $this->result;
	}

	public function getDataDsn($niy){
		$query = "SELECT * FROM dosen WHERE niy = '$niy'";
		$this->eksekusi($query);
		return $this->result;
	}

	// ===================== Pengerjaan oleh Heronitah Yhanzyah - 1700018129 =============================//
 
	public function Semprop_gender($gender){
		$query = "SELECT COUNT(mahasiswa_metopen.nim) AS jum_lulus, seminar_proposal.status AS stt
				  FROM mahasiswa_metopen JOIN seminar_proposal ON mahasiswa_metopen.nim = seminar_proposal.nim 
				  WHERE seminar_proposal.status = 'lulus' AND mahasiswa_metopen.jenis_kelamin = '$gender' GROUP BY seminar_proposal.status";
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}
	public function Semprop_gender_tl($gender){
		$query = "SELECT COUNT(mahasiswa_metopen.nim) AS jum_tlulus, seminar_proposal.status AS stt
				  FROM mahasiswa_metopen JOIN seminar_proposal ON mahasiswa_metopen.nim = seminar_proposal.nim 
				  WHERE seminar_proposal.status = 'tidak_lulus' AND mahasiswa_metopen.jenis_kelamin = '$gender' GROUP BY seminar_proposal.status";
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}
	
	public function undaran_gender($gender){
		$query = "SELECT COUNT(mahasiswa_metopen.nim) AS jum_lulus, ujian_pendadaran.status AS stt
				  FROM mahasiswa_metopen JOIN ujian_pendadaran ON mahasiswa_metopen.nim = ujian_pendadaran.nim 
				  WHERE ujian_pendadaran.status = 'lulus' AND mahasiswa_metopen.jenis_kelamin = '$gender'";
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}
	public function undaran_gender_tl($gender){
		$query = "SELECT COUNT(mahasiswa_metopen.nim) AS jum_tlulus, ujian_pendadaran.status AS stt
				  FROM mahasiswa_metopen JOIN ujian_pendadaran ON mahasiswa_metopen.nim = ujian_pendadaran.nim 
				  WHERE ujian_pendadaran.status = 'tidak_lulus' AND mahasiswa_metopen.jenis_kelamin = '$gender'";
		$this->eksekusi($query); //mengeksekusi query diatas
		return $this->result; //untuk hasil query diatas
	}

	public function getData_jumlah(){
		$query = "SELECT COUNT(nim) AS jumlah FROM mahasiswa_metopen";
		$this->eksekusi($query);
		return $this->result;
	}

	public function getJum_bbg($nim){
		$query = "SELECT COUNT(logbook_bimbingan.id_logbook) AS jml_bbg FROM logbook_bimbingan JOIN mahasiswa_metopen 
				  ON logbook_bimbingan.id_skripsi = mahasiswa_metopen.nim WHERE mahasiswa_metopen.nim = '$nim'";
		$this->eksekusi($query);
		return $this->result;
	}

	// =============================================================================================================
	
}	

 ?>