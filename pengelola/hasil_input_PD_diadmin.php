<?php include '../templates/header_Penjadwalan.php' ?>

<?php

	//membutuhkan file fungsi_semprop
	require('../fungsi_pendadaran.php');

	//instansiasi objek class Seminar_Proposal
	$akses = new ujian_pendadaran();
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
</head>

<?php
  
if(isset($_POST['simpan1'])){
    $id_pd = $_POST['nim'];
    $nilai_1 = $_POST['nilai_penguji_1'];
    $nilai_2 = $_POST['nilai_penguji_2'];
    $nilai_3 = $_POST['nilai_pembimbing'];
    $status1 = $_POST['status'];
    $nim1 = $_POST['nim'];


      $akses->InputNilaiDanStatusPendadaran($id_pd, $nim1, $status1, $nilai_1, $nilai_2, $nilai_3);

     

      }
    
      ?>


<!DOCTYPE html>
<html>
<head>
  <title>javascript-- pesan</title>
  <script type="text/javascript">
    function pesan(){
      alert("DATA ANDA TELAH TERSIMPAN TERIMA KASIH")
    }
  </script>
</head> 
<body onload="pesan()">
  

</body>
</html>

<?php include '../templates/footer_Penjadwalan.php' ?>