<?php 
include '../Class_penjadwalan.php';
$nim        =$_POST['nim'];
$penguji1   =$_POST['penguji1'];
$penguji2   =$_POST['penguji2'];
$tanggal    =date("Y-m-d", strtotime($_POST['tanggal']));
$ruang      =$_POST['ruang'];
$waktu      =$_POST['waktu'];

$akses = new Penjadwalan();
$akses->connect();
// bikin ID jadwal
$idjadwal  = $akses->createIdJadwal("UP", $penguji1, $penguji2, $tanggal, $waktu, $ruang);
// Cek Penguji sama atau tdk
    $nilai_penguji1vs2=$akses->cekDuaPengujiYangSama($penguji1,$penguji2);
// Cek Dosen Penguji 1 dan 2 Dalam Sehari
    $nilai_penguji1=$akses->CekPengujiDalamSehari($penguji1,$tanggal);
    $nilai_penguji2=$akses->CekPengujiDalamSehari($penguji2,$tanggal);
// Cek Dosen Denguji 1 beda ruang
    $cekDosenJamTanggalSamaBedaRuang1=$akses->cekDosenJamTanggalSamaBedaRuang($penguji1,$waktu,$ruang,$tanggal);
// Cek Dosen Denguji 2 beda ruang
    $cekDosenJamTanggalSamaBedaRuang2=$akses->cekDosenJamTanggalSamaBedaRuang($penguji2,$waktu,$ruang,$tanggal);
// Cek Waktu Dlm Sehari
    $nilai_waktuDS=$akses->cekWaktuDalamSehari($waktu,$tanggal);
// Cek Ruang Dalam Sehari    
    $nilai_ruangDS=$akses->cekRuangDalamSehari($ruang,$tanggal);
// Cek Ruang Waktu Dalam Sehari
    $nilai_ruangwaktudlmsehari=$akses->cekRuangWaktuDalamSehari($ruang,$waktu,$tanggal);
    // Insert to Database
if ($nilai_penguji1vs2==true) {
    if ($cekDosenJamTanggalSamaBedaRuang1==true && $cekDosenJamTanggalSamaBedaRuang2==true) {
        if ($nilai_penguji1==true) {
                if ($nilai_penguji2==true) {
                    if ($nilai_waktuDS==true) {
                        if ($nilai_ruangDS==true) {
                            if ($nilai_ruangwaktudlmsehari==true) {
                                $akses->insertJadwal($idjadwal,"UNDARAN",$nim,$tanggal,$waktu,$ruang);
                                $akses->insertPenguji($idjadwal,$penguji1);
                                $akses->insertPenguji($idjadwal,$penguji2);
                                include 'redirect/Sukses_UI_to_admin.php';
                            }else {include 'redirect/redirect_failed_to_back.php';}
                        }else {include 'redirect/redirect_failed_to_back.php';}
                    }else {include 'redirect/redirect_failed_to_back.php';}
                }else {include 'redirect/redirect_failed_to_back.php';}
            }else {include 'redirect/redirect_failed_to_back.php';}
    }else {include 'redirect/redirect_failed_to_back.php';}
}else {include 'redirect/redirect_failed_to_back.php';}

?>