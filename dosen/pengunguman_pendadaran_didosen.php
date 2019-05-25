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
    <?php include '../templates/navbar_dosen.html' ?>
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
<body>
    <br>

    <h2 align="center">PENGUNGUMAN PENDADARAN</h2>
<br>
<table align="center">
<form name="pencarian" method="POST" action = "hasil_pencarian_didosen.php" ">            
      
                    <tr> <td>
                    <input type="text" placeholder="masukan nim" name="nim" title ="masukan nim" class="form-control">  
                    </td>
                    <td>
                    <button id="submit1" name="submit1" class='butn butn2 ml-2'>cari</button></td>
                   </tr>

          </form>
        </table>
    
<br><br>

        <table border='1' align='center' width='80%'' height='30%'>
    <tr align='center' bgcolor="#D3D3D3">
      <th height="50">Nim</th>
      <th height="50" >Nama</th>
      <th height="50">Status</th>
       <th height="50">Lihat Rincian</th>

    </tr>

<?php

      foreach ($akses->lihatstatusmahasiswapendadaran() as $key) {
        


        echo"
       
        

        <tr>
          <td align='center'>$key[nim]</td>
          <td align='center'>$key[nama_mhs]</td>
          <td align='center'>$key[status]</td>
          <td align='center'><a href='lihat_nilai_pendadaran_didosen.php?nim=$key[nim]' class='btn btn-outline-primary' role='button' aria-pressed='true'>lihat</a></td>
          </tr>
          
        ";


      
    }

        
      ?>

<?php include '../templates/footer_Penjadwalan.php' ?>