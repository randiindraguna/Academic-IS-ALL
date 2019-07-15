<?php 
include '../Class_penjadwalan.php';
$nim        =$_POST['nim'];
$penguji1   =$_POST['penguji'];
$penguji2   ="00000000";
$tanggal    =date("Y-m-d", strtotime($_POST['tanggal']));
$ruang      =$_POST['ruang'];
$waktu      =$_POST['waktu'];
$akses = new Penjadwalan();
$akses ->connect();

// bikin ID jadwal
$idjadwal  = $akses->createIdJadwal("SP", $penguji1, $penguji2, $tanggal, $waktu, $ruang);
// Cek Dosen Penguji 1 dan Dalam Sehari
    $nilai_penguji1=$akses->CekPengujiDalamSehari($penguji1,$tanggal);
// Cek Dosen Denguji 1 beda ruang
    $cekDosenJamTanggalSamaBedaRuang=$akses->cekDosenJamTanggalSamaBedaRuang($penguji1,$waktu,$ruang,$tanggal);
// Cek Waktu Dlm Sehari
    $nilai_waktuDS=$akses->cekWaktuDalamSehari($waktu,$tanggal);
// Cek Ruang Dalam Sehari    
    $nilai_ruangDS=$akses->cekRuangDalamSehari($ruang,$tanggal);
// Cek Ruang Waktu Dalam Sehari
    $nilai_ruangwaktudlmsehari=$akses->cekRuangWaktuDalamSehari($ruang,$waktu,$tanggal);
// cek nim
    $cek_nim = $akses->cekNimdataYangSama($nim,"SEMPROP");

// Insert to Database
    if($cek_nim==true){
        if ($nilai_penguji1==true) {
                if ($nilai_waktuDS==true) {
                    if ($nilai_ruangDS==true) {
                        if ($cekDosenJamTanggalSamaBedaRuang==true) {
                            if ($nilai_ruangwaktudlmsehari==true) {
                                $akses->insertJadwal($idjadwal,"SEMPROP",$nim,$tanggal,$waktu,$ruang);
                                $akses->insertPenguji($idjadwal,$penguji1);
                                include 'redirect/Sukses_UI_to_admin.php';
                            }else {include 'redirect/redirect_failed_to_back.php';echo "Ruang & waktu Penuh";}
                        }else {include 'redirect/redirect_failed_to_back.php';echo "Dosen Sudah Ada Di ruang lain";}
                    }else {include 'redirect/redirect_failed_to_back.php';echo "Ruang Penuh";}
                }else {include 'redirect/redirect_failed_to_back.php';echo "Waktu Penuh";}
        }else {include 'redirect/redirect_failed_to_back.php';echo "Penguji Penuh";}
    }else {include 'redirect/redirect_failed_to_back.php';echo "Nim Sudah terdaftar";}
?>
