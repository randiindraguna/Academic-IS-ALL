<!-- Dikerjakan oleh Adhymas Fajar Sudrajad -->
<?php 
// PROSES AKSES APAKAH MEMILIKI JADWAL ATAU TIDAK
if ($_GET) {
    $nim=$_GET['nim'];
}else if ($_POST) {
    $nim=$_POST['nim'];
}else if ($_SESSION) {
    $nim=$_SESSION['nim'];
}else{
    //header('location:UI_Search_Penjadwalan.php');
}
if($_GET||$_POST){
    include 'Class_penjadwalan.php';
    $P = new Penjadwalan();
    //echo $nim;
    session_start();
    $P->connect();
    $hasil=$P->getDataALLMahasiswaByNim($nim);
    if($hasil){
        $masuk=$_SESSION['masuk'];
        if ($masuk==1) {
            // JIKA MEMILIKI MAKA MENGAMBIL SEMUA DATA JADWAL
            $nama=$_SESSION['nama'];
            $topik=$_SESSION['topik'];
            $dosen=$_SESSION['dosen'];//pembimbing
            $niy=$_SESSION['niy'];
            $nama_dosen=$_SESSION['nama_dosen'];
            $email_dosen=$_SESSION['email'];
            $ahli_dosen=$_SESSION['bidang_keahlian'];
            $id_jadwal=$_SESSION['id_jadwal'];
            $jenis_Uji=$_SESSION['jenis_ujian'];
            $tgl_uji=$_SESSION['tanggal'];
            $jam_uji=$_SESSION['jam'];
            $tempat_uji=$_SESSION['tempat'];
            session_destroy();
        }else{
            // JIKA TIDAK MEMILIKI JADWAL MAKA DAFTAR JADWAL
            $nama=$_SESSION['nama'];
            $topik=$_SESSION['topik'];
            $dosen=$_SESSION['dosen'];
            $niy=$_SESSION['niy'];
            $nama_dosen=$_SESSION['nama_dosen'];
            $email_dosen=$_SESSION['email'];
            $ahli_dosen=$_SESSION['bidang_keahlian'];
            $jenis_Uji="none";
            session_destroy();
        }
    }else{
    header('location:UI_Search_Penjadwalan.php');
    }
    include 'templates/header_penjadwalan.php';
}
?>
<script type="text/javascript">
    function codeAddress() {
        var a = '<?php echo $jenis_Uji; ?>'; // PHP KE JAVASCRIPT
        // alert(a); //cuma cek hasil
        if (a == "SEMPROP") {
            document.getElementById('selot').style.display = "block";
            document.getElementById('selot2').style.display = "block";
        } else if (a == "UNDARAN") {
            document.getElementById('selot').style.display = "block";
            document.getElementById('selot2').style.display = "block";
            document.getElementById('dosen4').style.display = "block";
        } else {
            document.getElementById('hr2').style.display = "block";
            document.getElementById('switch').style.display = "block";
            document.getElementById('hr3').style.display = "block";
        }
    }
    window.onload = codeAddress;
</script>
</head>

<body class="bg-tre">
    <!-- Navbar -->
    <?php include 'templates/navbar_mhs.html'?>
    <!-- End Navbar -->
    <div class="container">
        <!-- Box -->
        <div class="row ">
            <div class="box2-1 col-3 bg-two rounded  mt-5 mb-n3">
                <p class="judul mt-3 mb-4 text-center">Profile</p>
            </div>
            <div class="col-9"></div>
        </div>
        <div class="row box2 mb-5">
            <div class="col-12">
                <div class="row mt-5">
                    <!-- Avatar Box -->
                    <div class="col-2 ml-5">
                        <img src="img/avatar_Penjadwalan.png" alt="" class="rounded-sm px text-center">
                    </div>
                    <!-- Nama NIM Pembimbing text box -->
                    <div class="col-9">
                        <div class="row mt-4">
                            <div class="col-2 ">
                                <p class="ptwo"><b> Nama </b></p>
                            </div>
                            <div class="col-1 ">
                                <p class="ptwo"><b> : </b></p>
                            </div>
                            <p class="ptwo">
                                <!-- Harus disesuaikan dengan database -->
                                <?=$_SESSION['nama']?>
                            </p>
                        </div>
                        <div class="row ">
                            <div class="col-2 ">
                                <p class="ptwo"><b> NIM </b></p>
                            </div>
                            <div class="col-1 ">
                                <p class="ptwo"><b> : </b></p>
                            </div>
                            <p class="ptwo">
                                <!-- Harus disesuaikan dengan database -->
                                <?=$nim?>
                            </p>
                        </div>
                        <div class="row ">
                            <div class="col-2 ">
                                <p class="ptwo"><b> Pembimbing </b></p>
                            </div>
                            <div class="col-1 ">
                                <p class="ptwo"><b> : </b></p>
                            </div>
                            <p class="ptwo">
                                <!-- Haurs disesuaikan dengan database -->
                                <?=$nama_dosen?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Form Box -->
                    <hr class="under mt-5" style="" id="hr3">                    
                    <!-- Form Ujian Pendadaran -->
                    <form method="POST" action="control/hasil_pendadaran.php">
                        <!-- hidden form -->
                        <input type="hidden" value="<?=$nim?>" name="nim">
                        <div class="row">
                            <div id="uji1" style="" class="col-12 mt-3">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="judul text-center">Pilih Jadwal Ujian Skripsi</p>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-1"></div>
                                    <div class="col-4">
                                        <p class="ptwo"><b> Dosen Penguji Pertama</b></p>
                                    </div>
                                    <div class="col-2 text-center">
                                    </div>
                                    <div class="col-4 ">
                                        <p class="ptwo"><b>Dosen Penguji Kedua</b></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col-4 ">
                                        <?php $dosen_uji=$P->getDosenUjibyNiy($nim);foreach ($dosen_uji as $key) { $dosen_uji=$key['nama_dosen'];$niy_uji=$key['niy']?></td>
                                                        <?php } ?>
                                        <input class="form-control" id="disabledInput" type="text" placeholder="<?=$dosen_uji?>" disabled>                                
                                    </div>
                                    <div class="col-2 text-center"></div>
                                    <div class="col-4 ">
                                        <select class="custom-select" id="penguji2" name="penguji2">
                                            <!-- Haurs disesuaikan dengan database -->
                                            <option selected>Pilih Dosen</option>
                                            <?php foreach ($P->getAllDosenKecualiSatuDosen($niy_uji) as $key ) {?>
                                            <option value="<?=$key['niy']?>"><?=$key['nama_dosen']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-1">
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">tanggal</span>
                                            </div>
                                            <input type="text" name="tanggal" class="tanggal form-control" />
                                        </div>
                                    </div>
                                    <div class="col-2">
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">Waktu</label>
                                            </div>
                                            <select class="custom-select" id="inputGroupSelect01" name="waktu">
                                                <option selected>Pilih</option>
                                                <option value="1">07:00</option>
                                                <option value="2">10:00</option>
                                                <option value="3">13:00</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">Ruang</label>
                                            </div>
                                            <select class="custom-select" id="inputGroupSelect01" name="ruang">
                                                <option selected>Pilih</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5 mb-5">
                                    <div class="col-6 text-right">
                                        <button type="reset" class="butn butn2">Reset</button>
                                    </div>
                                    <div class="col-6 text-left">
                                        <button type="submit" class="butn butn2" value="Simpan" >simpan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>                
                </div>
                <!-- End Box -->
            </div>
        </div>
        <script>
        function AlertYakin() {
            swal("Anda Yakin kembali ?").then((value) => {back(value)})
        }   
        function back(value) {
            if (value==true) {
                window.history.back();
            }
        }
        function gagal() {swal("ERROR !", "Data Tidak Ditemukan", "ERROR");}
        </script>
</body>
<?php include 'templates/footer_penjadwalan.php';?>