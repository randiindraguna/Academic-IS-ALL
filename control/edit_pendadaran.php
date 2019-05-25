<?php 
include '../Class_penjadwalan.php';
$nim        =$_POST['nim'];
$idjadwal   =$_POST['id_jadwal'];
$penguji1   =$_POST['penguji'];
$penguji2   =$_POST['penguji2'];
$tanggal    =date("Y-m-d", strtotime($_POST['tanggal']));
$ruang      =$_POST['ruang'];
$waktu      =$_POST['waktu'];
$akses      = new Penjadwalan();
$akses ->connect();

foreach ($akses->getDataDosenPenguji2byIdJadwal($idjadwal) as $key) {
    $penguji2_lama=$key['niy'];
}
echo $penguji2;
// bikin ID jadwal
    $idjadwal_baru  = $akses->createIdJadwal("UP", $penguji1, $penguji2, $tanggal, $waktu, $ruang);
// Cek Dosen Penguji 1 dan 2 Dalam Sehari
    $nilai_penguji1=$akses->CekPengujiDalamSehari($penguji1,$tanggal);
    $nilai_penguji2=$akses->CekPengujiDalamSehari($penguji2,$tanggal);
    // Cek Dosen Denguji 2 dan 2 beda ruang
    $cekDosenJamTanggalSamaBedaRuang1=$akses->cekDosenJamTanggalSamaBedaRuang($penguji1,$waktu,$ruang,$tanggal);
    $cekDosenJamTanggalSamaBedaRuang2=$akses->cekDosenJamTanggalSamaBedaRuang($penguji2,$waktu,$ruang,$tanggal);
// Cek Waktu Dlm Sehari
    $nilai_waktuDS=$akses->cekWaktuDalamSehari($waktu,$tanggal);
// Cek Ruang Dalam Sehari    
    $nilai_ruangDS=$akses->cekRuangDalamSehari($ruang,$tanggal);
// Cek Ruang Waktu Dalam Sehari
    $nilai_ruangwaktudlmsehari=$akses->cekRuangWaktuDalamSehari($ruang,$waktu,$tanggal);

    // Insert to Database
    if ($nilai_penguji1==true) {
        if ($nilai_penguji1==true) {
            if ($cekDosenJamTanggalSamaBedaRuang1==true) {
                if ($cekDosenJamTanggalSamaBedaRuang2==true) {
                    if ($nilai_waktuDS==true) {
                        if ($nilai_ruangDS==true) {
                            if ($nilai_ruangwaktudlmsehari==true) {
                                $akses->eksekusi("SET foreign_key_checks = 0");
                                $akses->UpdateTabelPenjadwalanByIdJadwal($idjadwal,$idjadwal_baru,"UNDARAN",$nim,$tanggal,$waktu,$ruang);
                                $akses->eksekusi("SET foreign_key_checks = 0");
                                $akses->UpdateTabelPengujiByIdJadwal($idjadwal,$idjadwal_baru,$penguji1,$penguji1);
                                $akses->UpdateTabelPengujiByIdJadwal($idjadwal,$idjadwal_baru,$penguji2_lama,$penguji2);
                                $akses->eksekusi("SET foreign_key_checks = 1");
                                
                                ?>
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
                }else {include 'redirect/redirect_failed_to_back.php';echo "Dosen Sudah Ada Di ruang lain";}
            }else {include 'redirect/redirect_failed_to_back.php';echo "Dosen Sudah Ada Di ruang lain";}
        }else {include 'redirect/redirect_failed_to_back.php';echo "Penguji Penuh";}
    }else {include 'redirect/redirect_failed_to_back.php';echo "Penguji Penuh";}

?>