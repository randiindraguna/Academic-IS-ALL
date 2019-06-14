<!-- Dikerjakan oleh Adhymas Fajar Sudrajad -->
<?php 
// PROSES AKSES APAKAH MEMILIKI JADWAL ATAU TIDAK
session_start();
if($_SESSION['status'] == "login"){
  // menampilkan pesan selamat datang
  // echo "Hai, selamat datang ". $_SESSION['username'];
    $nim = $_SESSION['username'];
}else{
  header("location:../index.php");
}

// if ($_GET) {
//     $nim=$_GET['nim'];
// }else if ($_POST) {
//     $nim=$_POST['nim'];
// }else if ($_SESSION) {
//     $nim=$_SESSION['username'];
// }else{
//     header('location:UI_Search_Penjadwalan.php');
// }
// if($_GET||$_POST){
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
// }
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
                                                    <th scope="col" style="display:none;" id="dosen4">Dosen Penguji 2
                                                    </th>
                                                    <th scope="col">Satus </th>
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
                                                    <?php 
                                                        $wait = "---";
                                                    if($jenis_Uji=="SEMPROP"){
                                                        $status = $P->getDataStatusSemprop($nim);
                                                        $baris =  $P->hitung_row($status);
                                                        $baris = "$baris";
                                                        if($baris != 0 ){
                                                        foreach ($status as $key ) {
                                                            if ($key['status_sp']=="lulus") {                                                                
                                                                echo "<td class='text-success text-left'>$key[status_sp]</td>";
                                                            }else{
                                                                echo "<td class='text-danger text-left'>$key[status_sp]</td>";
                                                            }
                                                            $status_sp=$key['status_sp'];
                                                        }
                                                        }else if($baris=="0"){
                                                                echo " <td>$wait</td>";
                                                                $status_sp=$wait;                                                       
                                                        }
                                                    }else{
                                                        $status = $P->getDataStatusPendadaran($nim);
                                                        $baris =  $P->hitung_row($status);
                                                        $baris = "$baris";
                                                        if($baris != 0 ){
                                                        foreach ($status as $key ) {
                                                            if ($key['status_up']=="lulus") {                                                                
                                                                echo "<td class='text-success text-left'>$key[status_up]</td>";
                                                            }else{
                                                                echo "<td class='text-danger text-left'>$key[status_up]</td>";
                                                            }
                                                            $status_up=$key['status_up'];
                                                        }
                                                        }else if($baris=="0"){
                                                                echo " <td>$wait</td>";
                                                                $status_up=$wait;                                                       
                                                        }
                                                        }
                                                        ?>
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
                            <div class="pos-f-t rounded text-center">
                                <nav class="text-center">
                                    <button name="answer" value="Back" class="butn butn2 ml-n2"
                                        onclick="AlertYakin()">Kembali
                                        <button class="butn butn2 ml-2" type="button" data-toggle="collapse"
                                            data-target="#navbarToggleExternalContent"
                                            aria-controls="navbarToggleExternalContent" aria-expanded="false"
                                            aria-label="Toggle navigation">
                                            Jadwal
                                        </button>
                                        <!-- <button name="answer" value="Back" class="butn butn2 ml-1"
                                            onclick="cek_lulus()">Daftar Ujian Pendadaran -->
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Button Semprop Ke Pendadaran-->
                    <?php
                    $db_penguji1 = $P->getDosenPengujibyNIY($niy);
                    foreach ($db_penguji1 as $key) {
                        $niy_dosen_penguji = $key['niy'];
                        $nama_penguji = $key['nama_dosen'];
                    }?>
                    <div id="semprop" style="display:none;">
                        <div class="col-12 ">
                            <form id="fform" action="control/edit_semprop_ke_pendadaran.php" method="post">
                                <div class="row">
                                    <div class="col-6 mt-2">
                                        <label for="inputEmail4">ID Jadwal</label>
                                        <input class="form-control" id="disabledInput" type="text"
                                            placeholder="<?=$id_jadwal?>" disabled>
                                        <input type="hidden" name="id_jadwal" value="<?=$id_jadwal?>">
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label for="inputPassword4">Jenis Ujian</label>
                                        <input class="form-control" id="disabledInput" type="text"
                                            placeholder="<?=$jenis_Uji?>" disabled>
                                        <input type="hidden" name="jenis_ujian" value="<?=$jenis_Uji?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-2">
                                        <label for="inputAddress">Nama Mahasiswa</label>
                                        <input class="form-control" id="disabledInput" type="text"
                                            placeholder="<?=$nama?>" disabled>
                                        <input type="hidden" name="nim" value="<?=$nim?>">
                                    </div>
                                </div>
                                <!-- DOsen -->
                                <div class="row mt-1">
                                    <div class="col-6 mt-2">
                                        <label for="inputEmail4">Dosen Penguji</label>
                                        <input class="form-control" id="disabledInput" type="text" name="penguji"
                                            placeholder="<?=$nama_penguji?>" disabled>
                                        <input type="hidden" name="penguji" value="<?=$niy_dosen_penguji?>">
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label for="inputAddress2">Dosen Penguji 2</label>
                                        <select id="inputState" class="form-control" id="penguji" name="penguji2">
                                            <option selected>Pilih Dosen Penguji</option>
                                            <?php foreach ($P->getAllDosenKecualiSatuDosen($niy) as $key ) {?>
                                            <option value="<?=$key['niy']?>"><?=$key['nama_dosen']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- Waktu $ RUang -->
                                <div class="row">
                                    <div class="col-6 mt-2">
                                        <label for="inputState">Waktu</label>
                                        <select name="waktu" id="waktu" class="form-control">
                                            <option selected value="0">Pilih Waktu</option>
                                            <option value="1">07:00</option>
                                            <option value="2">10:30</option>
                                            <option value="3">13:00</option>
                                        </select>
                                    </div>

                                    <div class="col-6 mt-2">
                                        <label for="inputState">Ruang</label>
                                        <select name="ruang" id="ruang" class="form-control">
                                            <option selected value="0">Pilih</option>
                                            <option value="1">Ruang 1</option>
                                            <option value="2">Ruang 2</option>
                                            <option value="3">Ruang 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3 mt-4"></div>
                                    <div class="col-4 mt-4"></div>
                                    <div class="col-4 mt-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">tanggal</span>
                                            </div>
                                            <input type="text" name="tanggal" class="tanggal form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer mt-5">
                                    <button type="submit" class="btn btn-primary text-center">Daftar</button>
                                </div>
                        </div>
                    </div>
                    <div class="col-3 mt-4"></div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Box -->
    </div>
    </div>
    <script>
        function AlertYakin() {
            swal("Anda Yakin kembali ?").then((value) => {
                back(value)
            })
        }

        function alert_gagal() {
            swal("Error !", "Maaf Anda Belum Lulus", "error")
        }

        function back(value) {
            if (value == true) {
                window.history.back();
            }
        }


        function gagal() {
            swal("ERROR !", "Data Tidak Ditemukan", "ERROR");
        }

        // function cek_lulus() {
        //     var status = "<?=$status_sp?>";
        //     console.log(status);
        //     if (status == "lulus") {
        //         document.getElementById('semprop').style.display = "block";
        //     } else {
        //         alert_gagal();
        //     }
        // }

        function cekform() {
            var waktu = document.getElementById('waktu');
            var ruang = document.getElementById('ruang');
            var tanggal = document.getElementById('tanggal');
            console.log(waktu.value);
            console.log(ruang.value);
            console.log(tanggal.value);
            if (waktu.value == "" || waktu.value == "0") {
                swal("Peringatan!", "Waktu Harus Diisi", "warning");
            } else if (ruang.value == "" || ruang.value == "0") {
                swal("Peringatan!", "Ruang Harus Diisi", "warning");
            } else if (tanggal.value == "" || tanggal.value == "0" || tanggal.value == null) {
                swal("Peringatan !", "Tanggal Harus Diisi", "warning");
            } else {
                document.getElementById('fform').submit();
            }
        }
    </script>
    <!-- dATEPICKER -->
    <!-- <script src="css/Datepicker_Penjadwalan/js/bootstrap-datepicker.js"></script>
    <script src="css/Datepicker_Penjadwalan/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.tanggal').datepicker({
                format: "dd-mm-yyyy",
                autoclose: true
            });
        });
    </script> -->
</body>
<?php include '../templates/footer_penjadwalan.php';?>