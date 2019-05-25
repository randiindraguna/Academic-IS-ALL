<?php 
include '../Class_penjadwalan.php';
$nim        =$_POST['nim'];
$idjadwal   =$_POST['id_jadwal'];
$penguji1   =$_POST['penguji'];
$penguji2   ="00000000";
$tanggal    =date("Y-m-d", strtotime($_POST['tanggal']));
$ruang      =$_POST['ruang'];
$waktu      =$_POST['waktu'];
$akses = new Penjadwalan();
$akses ->connect();

// bikin ID jadwal
    $idjadwal_baru  = $akses->createIdJadwal("SP", $penguji1, $penguji2, $tanggal, $waktu, $ruang);
// Cek Dosen Penguji 1 dan 2 Dalam Sehari
    $nilai_penguji1=$akses->CekPengujiDalamSehari($penguji1,$tanggal);
// Cek Waktu Dlm Sehari
    $nilai_waktuDS=$akses->cekWaktuDalamSehari($waktu,$tanggal);
// Cek Ruang Dalam Sehari    
    $nilai_ruangDS=$akses->cekRuangDalamSehari($ruang,$tanggal);
// Cek Ruang Waktu Dalam Sehari
    $nilai_ruangwaktudlmsehari=$akses->cekRuangWaktuDalamSehari($ruang,$waktu,$tanggal);

    // Insert to Database
    if ($nilai_penguji1==true) {
            if ($nilai_waktuDS==true) {
                if ($nilai_ruangDS==true) {
                    if ($nilai_ruangwaktudlmsehari==true) {
                        $akses->eksekusi("SET foreign_key_checks = 0");
                                $akses->UpdateTabelPenjadwalanByIdJadwal($idjadwal,$idjadwal_baru,"SEMPROP",$nim,$tanggal,$waktu,$ruang);
                                $akses->eksekusi("SET foreign_key_checks = 0");
                                $akses->UpdateTabelPengujiByIdJadwal($idjadwal,$idjadwal_baru,$penguji1,$penguji1);
                                $akses->eksekusi("SET foreign_key_checks = 1");?>
                        <form id="my_form" action="../pengelola/UI_Penjadwalan_detail_admin.php" method="GET">
                        <input type="hidden" name="nim" value="<?=$nim;?>">
                        </form>
                        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                        <script type="text/javascript">
                            function alert() {
                            swal("Selamat!", "Data Anda Berhasil Diubah!", "success")
                            .then((value) => {simpan();})
                            }
                            function simpan() {
                            document.getElementById('my_form').submit();   
                            }                            
                            window.onload = alert;
                        </script> 
                        <?php
                    }else {include 'redirect/redirect_failed_to_back.php';echo "Ruang & waktu Penuh";}
                }else {include 'redirect/redirect_failed_to_back.php';echo "Ruang Penuh";}
            }else {include 'redirect/redirect_failed_to_back.php';echo "Waktu Penuh";}
    }else {include 'redirect/redirect_failed_to_back.php';echo "Penguji Penuh";}

?>