<!-- Dikerjakan oleh Adhymas Fajar Sudrajad -->
<?php 
session_start();
if($_SESSION['status'] == "login"){
  // menampilkan pesan selamat datang
  //echo "Hai, selamat datang ". $_SESSION['username'];
}else{
  header("location:../index.php");
}
 
// PROSES AKSES APAKAH MEMILIKI JADWAL ATAU TIDAK
if ($_GET) {
    $nim=$_GET['nim'];
}else if ($_POST) {
    $nim=$_POST['nim'];
}else if ($_SESSION) {
    $nim=$_SESSION['nim'];
}else{
    header('location:UI_Search_Penjadwalan.php');
}
if($_GET||$_POST){
    include '../Class_penjadwalan.php';
    $P = new Penjadwalan();
    //echo $nim;
    // session_start();
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
          
        }
    }else{
    header('location:UI_Search_Penjadwalan.php');
    }
    include '../templates/header_penjadwalan.php';
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
    <?php include '../templates/navbar_admin.html'?>
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
                        <img src="../img/avatar_Penjadwalan.png" alt="" class="rounded-sm px text-center">
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
                                <?=$nama?>
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
                        <div class="row ">
                            <div class="col-2 ">
                                <p class="ptwo"><b> Topik </b></p>
                            </div>
                            <div class="col-1 ">
                                <p class="ptwo"><b> : </b></p>
                            </div>
                            <p class="ptwo">
                                <!-- Haurs disesuaikan dengan database -->
                                <?=$topik?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Jadwal Slot -->
                <div class="row text-center" style="display:none;" id="selot">
                    <div class="col-12 text-center mt-5 rounded">
                        <!-- Animasi Tabel -->
                        <!-- Jadwal -->
                        <div class="collapse" id="navbarToggleExternalContent">
                            <div class="bg-four p-4 rounded">
                                <div class="row p-2 rounded">
                                    <div class="col-12 rounded">
                                        <table class="table rounded">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID Jadwal</th>
                                                    <th scope="col">Jadwal</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Waktu</th>
                                                    <th scope="col">Ruang</th>
                                                    <th scope="col">Dosen Penguji</th>
                                                    <th scope="col" style="display:none;" id="dosen4">Dosen Penguji 2</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?=$id_jadwal?></td>
                                                    <!-- Haurs disesuaikan dengan database -->
                                                    <td>
                                                    <?php if($jenis_Uji=="UNDARAN"){echo "Ujian Pendadaran";}
                                                        else{echo "Seminar Proposal";}
                                                    ?>
                                                    </td>
                                                    <!-- Haurs disesuaikan dengan database -->
                                                    <td><?= $tgl_uji?></td>
                                                    <!-- Haurs disesuaikan dengan database -->
                                                    <td><?php
                                                    if($jam_uji=="1"){echo "07:00";}
                                                    else if($jam_uji=="2"){echo "10:00";}
                                                    else if($jam_uji=="3"){echo "13:30";}
                                                    ?>
                                                    </td>
                                                    <!-- Haurs disesuaikan dengan database -->
                                                    <td>
                                                    <?=$tempat_uji?>
                                                    </td>
                                                    <!-- Haurs disesuaikan dengan database -->
                                                    
                                                    
                                                    <?php 
                                                    $dosen_uji=$P->getDosenUji($nim,$id_jadwal);
                                                    foreach ($dosen_uji as $key) {?>
                                                            <td><?php echo $key['nama_dosen'];?></td>
                                                        <?php } ?>
                                                    <!-- Haurs disesuaikan dengan database -->
                                                    <!-- <td style="display:none;" id="dosen3"></td> -->
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4 mt-4" style="display:none;" id="selot2">
                        <div class="col-12 text-center ml-n2">
                            <button name="answer" value="Back" class="butn butn2 ml-n2"
                                onclick="AlertYakin()">
                                Kembali
                                <div class="pos-f-t rounded text-center">
                                    <nav class="text-center">
                                        <button class="butn butn2 ml-2" type="button" data-toggle="collapse"
                                            data-target="#navbarToggleExternalContent"
                                            aria-controls="navbarToggleExternalContent" aria-expanded="false"
                                            aria-label="Toggle navigation">
                                            Jadwal
                                        </button>
                                    </nav>
                                </div>
                        </div>
                    </div>                    
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
<?php include '../templates/footer_penjadwalan.php';?>