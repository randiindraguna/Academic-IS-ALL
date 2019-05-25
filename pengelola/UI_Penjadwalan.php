<!-- Dikerjakan oleh Adhymas Fajar Sudrajad -->
<?php 
// PROSES AKSES APAKAH MEMILIKI JADWAL ATAU TIDAK
if($_POST){
    $nim=$_POST['nim'];
    include '../Class_penjadwalan.php';
    $P = new Penjadwalan();
    $P->connect();
    //echo $nim;
    session_start();
    $hasil=$P->getDataALLMahasiswaByNim($nim);
    if($hasil){
        $masuk=$_SESSION['masuk'];
        if ($masuk==1) {
            // JIKA MEMILIKI MAKA MENGAMBIL SEMUA DATA JADWAL
            $nama=$_SESSION['nama'];
            $topik=$_SESSION['topik'];
            $dosen=$_SESSION['dosen'];
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
    <?php include '../templates/navbar_mhs.html'?>
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
                                                        else{echo "Seminar Seminar Proposal";}
                                                    ?>
                                                    </td>
                                                    <!-- Haurs disesuaikan dengan database -->
                                                    <td><?= $tgl_uji?></td>
                                                    <!-- Haurs disesuaikan dengan database -->
                                                    <td><?php
                                                    if($jam_uji=="1"){echo "07:00";}
                                                    else if($jam_uji=="2"){echo "13:30";}
                                                    ?>
                                                    </td>
                                                    <!-- Haurs disesuaikan dengan database -->
                                                    <td>
                                                    <?=$tempat_uji?>
                                                    </td>
                                                    <!-- Haurs disesuaikan dengan database -->
                                                    
                                                    
                                                    <?php 
                                                    $dosen_uji=$P->getDosenUjibyNiy($nim);
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
                                onclick="window.location.href='index.php'">
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
                    <!-- Selecting Box -->
                    <hr class="under mt-5" style="display:none;" id="hr2">
                    <div class="row" style="display:none;" id="switch">
                        <div class="col-12 mt-3">
                            <p class="judul text-center">
                                Pilih Penjadwalan
                            </p>
                            <div class="row">
                                <div class="col-5 text-right">
                                    <p class="pone"><b>Ujian Pendadaran</b></p>
                                </div>
                                <div class="col-2 text-center">
                                    <!-- Switch -->
                                    <label class="switch">
                                        <input type="checkbox" id="myCheck">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="col-5 text-left">
                                    <p class="pone"><b>Seminar Proposal</b></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                </div>
                                <div class="col-4 text-center mt-3">
                                    <button name="answer" value="Back" class="butn butn2 ml-n2"
                                        onclick="window.location.href='index.php'">
                                        Kembali
                                        <button name="answer" value="Pilih" class="butn butn2 ml-2" onclick="showDiv()">
                                            Pilih
                                </div>
                                <div class="col-4">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Form Box -->
                    <hr class="under mt-5" style="display:none;" id="hr3">
                    <!-- Form Ujian Pendadaran -->
                    <!-- Form Diisi sesuai Proses Pengolahan -->
                    <form method="POST" action="control/hasil_pendadaran.php">
                        <!-- hidden form -->
                        <input type="hidden" value="<?=$nim?>" name="nim">
                        <div class="row">
                            <div id="uji1" style="display:none;" class="col-12 mt-3">
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
                                    <div class="col-4">
                                        <select class="custom-select" id="penguji1" name="penguji1">
                                            <!-- Haurs disesuaikan dengan database -->
                                            <option selected>Pilih Dosen</option>
                                            <?php foreach ($P->getDosenPenguji() as $key ) {?>
                                            <option value="<?=$key['niy']?>"><?=$key['nama_dosen']?></option>
                                            <?php } ?>
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-2 text-center"></div>
                                    <div class="col-4 ">
                                        <select class="custom-select" id="penguji2" name="penguji2">
                                            <!-- Haurs disesuaikan dengan database -->
                                            <option selected>Pilih Dosen</option>
                                            <?php foreach ($P->getDosenPenguji() as $key ) {?>
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
                                                <option value="1">Ruang 1</option>
                                                <option value="2">Ruang 2</option>
                                                <option value="3">Ruang 3</option>
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
                    <!-- Form Seminar Proposal -->
                    <!-- Form Diisi sesuai Proses Pengolahan -->
                    <form method="POST" action="../control/hasil_semprop.php">
                    <!-- HIDDEN -->
                        <input type="hidden" value="<?=$nim?>" name="nim">
                    <!--  -->
                        <div class="row">
                            <div id="uji2" style="display:none;" class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="judul text-center">Pilih Jadwal Seminar Proposal</p>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <p class="ptwo"><b>Dosen Penguji</b></p>
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <select class="custom-select" id="penguji" name="penguji">
                                            <!-- Haurs disesuaikan dengan database -->
                                            <option selected>Pilih Dosen</option>
                                            <?php foreach ($P->getDosenPenguji() as $key ) {?>
                                            <option value="<?=$key['niy']?>"><?=$key['nama_dosen']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-4 text-center"></div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-1">
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Tanggal</span>
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
                                            <select class="custom-select" name="waktu">
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
                                            <select class="custom-select" name="ruang">
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
</body>
<?php include '../templates/footer_penjadwalan.php';?>
