<?php include '../templates/header_Penjadwalan.php' ?>
<?php

	//membutuhkan file fungsi_semprop
	require('../fungsi_semprop.php');

	//instansiasi objek class Seminar_Proposal
	$akses = new Seminar_Proposal();
	$akses->koneksi();

   session_start();
if($_SESSION['status'] == "login"){
  // menampilkan pesan selamat datang
  //echo "Hai, selamat datang ". $_SESSION['username'];
}else{
  header("location:../index.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../templates/navbar_admin.html' ?>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- /\ambil css penjadwalan -->
    <!-- Tambahan CSS -->
    <link rel="stylesheet" href="../css/style_penjadwalan.css">
    <link rel="stylesheet" href="../css/switches_Penjadwalan.css">

    <style type="text/css" href="../css/tombol_penjadwalan.css"></style>

      <script type="text/javascript" src="../mahasiswa/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="../mahasiswa/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../mahasiswa/sweetalert2/dist/sweetalert2.min.css">
</head>
<?php
 $id_s = $_POST['nim'];
    $nilai_pb = $_POST['nilai_proses_pembimbing'];
    $nilai_ub = $_POST['nilai_ujian_pembimbing'];
    $nilai_up = $_POST['nilai_ujian_penguji'];

    $rata_rata=round(($nilai_pb+$nilai_ub+$nilai_up)/3,2);
 if($rata_rata>-1 && $rata_rata<=1) $grade='E';
  else if($rata_rata>0 && $rata_rata<=40) $grade='D';
  else if($rata_rata>40 && $rata_rata<=43.75) $grade='D+';
  else if($rata_rata>43.75 && $rata_rata<=51.25) $grade='C-';
  else if($rata_rata>51.25 && $rata_rata<=55) $grade='C';
  else if($rata_rata>55 && $rata_rata<=57.5) $grade='C+';
  else if($rata_rata>57.5 && $rata_rata<=62.5) $grade='B-';
  else if($rata_rata>62.5 && $rata_rata<=65) $grade='B';
  else if($rata_rata>65 && $rata_rata<=68.75) $grade='B+';
  else if($rata_rata>68.75 && $rata_rata<=76.25) $grade='A-';
  else if($rata_rata>76.25 && $rata_rata<=100) $grade='A';
  else $grade='nilai tidak tersedia'; 

  if($rata_rata>51.25) $status='lulus';
  else($status='tidak_lulus')  ;  

      $akses->UpdateNilaiDanStatusSemprop1($nilai_pb,$status,$id_s,$nilai_ub,$nilai_up);
?>


<!DOCTYPE html>
<html>
<head>
  <title>javascript-- pesan</title>
  <script type='text/javascript'>
                    Swal.fire({
                      position: 'middle',
                      type: 'success',
                      title: 'Berhasil Di Edit',
                      showConfirmButton: true,
                      confirmButtonColor: '#3085d6',
                      confirmButtonText: 'Kembali'

                    }).then((result) => {
                      if(result.value){
                        location.href='data_semprop_diadmin.php'
                      }
                      })
                    </script>
</head> 
<body onload="pesan()">
  

</body>
</html>
 
<?php include '../templates/footer_Penjadwalan.php' ?>
