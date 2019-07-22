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

<?php
$nim=$_GET['nim'];
                

      foreach ($akses->lihatsempropmahasiswa1($nim) as $key) {
          # code...
        
        
        echo"

         <br>

          <table align='center' cellpadding='10' width='60%' border='0'  height='10%''>
                                    <tr>
                                        <td bgcolor='#B5B5B5' style='width: 100%;height: 100%;border-radius: 20px;padding-top: 20px;padding-bottom: 20px;box-shadow: 0px 0px 5px 2px lightblue'>
                                   
        
        <h2 align='center'>Data Mahasiswa</h2>
        <br><br>
        <table align='center'>
        <tr>
        <td width='700px'>

  <div class='form-group'>
    <label for='formGroupExampleInput'>Nim </label>
    <input name='nim' value='$key[nim]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input' align='center'>
    <label for='formGroupExampleInput'>Nama </label>
    <input name='nama' value='$key[nama_mhs]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>Penguji </label>
     ";
  # code...

                        foreach($akses->getDosenPenguji($key['id_jadwal']) as $data1){
                          echo "

                          <input name='penguji' value='$data1[nama_dosen]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
                         
                          ";
                        }

                        echo "
    <label for='formGroupExampleInput'>Nilai Proses Bimbingan </label>
    <input name='nama' value='$key[nilai_proses_pembimbing]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>Nilai Ujian Pembimbing </label>
    <input name='nama' value='$key[nilai_ujian_pembimbing]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>Nilai Ujian Penguji </label>
    <input name='nama' value='$key[nilai_ujian_penguji]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>Status </label>
    <input name='nama' value='$key[status]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    

  </div>
  
        </td>
        </tr>
        </table>
        ";
        


      
    }
      ?>
<?php include '../templates/footer_Penjadwalan.php' ?>


