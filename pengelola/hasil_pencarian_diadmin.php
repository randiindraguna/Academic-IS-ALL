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
   <?php include '../templates/header_Penjadwalan.php' ?>
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
<body>
    <?php
  
  if(isset($_POST['submit'])){


      $nim = $_POST['nim'];
                  echo "
                 

                 
        <form action='hasil_input_semprop_diadmin.php' method='POST'>

        
                  ";
      foreach ($akses->CariDataMahasiswaBerdasarkanNim($nim) as $key) {
          # code...
        
        
        echo"
        <br>
        <table align='center'>
        <tr>
        <td width='700px'>

  <div class='form-group'>
    <label for='formGroupExampleInput'>NIM </label>
    <input name='nim' value='$key[nim]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>NAMA </label>
    <input name='nama' value='$key[nama_mhs]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>PEMBIMBING </label>
    <input name='pembimbing' value='$key[nama_dsn]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
   <label for='formGroupExampleInput'>PENGUJI </label>

  ";
  # code...

                        foreach($akses->getDosenPenguji($key['id_jadwal']) as $data1){
                          echo "

                          <input name='penguji' value='$data1[nama_dosen]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
                         
                          ";
                        }

                        echo "
        <label for='formGroupExampleInput'>NILAI PROSES PEMBIMBING </label><input type='text' name='nilai_proses_pembimbing' class='form-control' aria-label='Text input with checkbox'>
         <label for='formGroupExampleInput'>NILAI UJIAN PEMBIMBING </label><input type='text' name='nilai_ujian_pembimbing' class='form-control' aria-label='Text input with checkbox'>
          <label for='formGroupExampleInput'>NILAI UJIAN PENGUJI </label><input type='text' name='nilai_ujian_penguji' class='form-control' aria-label='Text input with checkbox'>
       <label for='formGroupExampleInput'>STATUS </label><select name='status' class='form-control' aria-label='Text input with checkbox' >
                                         <option>- PILIH -</option> 
                                        <option value='lulus'> lulus </option> 
                                        <option value='tidak_lulus'> tidak lulus </option>
                                   </select> 
        
        <br>   <input type='submit' name='simpan' value='simpan' class='btn btn-outline-success my-2 my-sm-0'>    
        

        </form>
        </td>
        </tr>
        </table>
        ";
        


      }
    }
      ?>


<?php include '../templates/footer_Penjadwalan.php' ?>