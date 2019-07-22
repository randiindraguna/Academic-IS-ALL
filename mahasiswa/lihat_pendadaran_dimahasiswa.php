<?php include '../templates/header_Penjadwalan.php' ?>

<?php

    //membutuhkan file fungsi_semprop
  require_once('../fungsi_pendadaran.php');

  //instansiasi objek class Seminar_Proposal
  $akses = new ujian_pendadaran();
  $akses->koneksi();

  session_start();
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] == "login"){
  // menampilkan pesan selamat datang
  //echo "Hai, selamat datang ". $_SESSION['username'];
}else{
  header("location:../index.php");
}


?>
<!doctype html>
<html lang="en">
  <head>

    <script type="text/javascript">
        function displaymessage()
        {
            window.print();
        }
    </script>
    <?php include '../templates/navbar_mhs.html' ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- /\ambil css penjadwalan -->
    <!-- Tambahan CSS -->
    <link rel="stylesheet" href="../css/style_penjadwalan.css">
    <link rel="stylesheet" href="../css/switches_Penjadwalan.css">

    <style type="text/css" href="../css/tombol_penjadwalan.css"></style>
    <!--  -->

    <title>Data Pencarian Mahasiswa</title>
  </head>
  <body bgcolor="white">
    

    <table border="0" width="100%" height="100%" align="center">
      <tr><td colspan="3" bgcolor="white"><br></td></tr>
      <tr>
        <td width="25%" bgcolor="white" rowspan="2"></td>
        <td width="50%">
          <table cellpadding="20"width="100%" border="0"  height="100%">
            <tr>
              <td bgcolor="#B5B5B5">
                <center><h3>Data Mahasiswa</h3></center>
                <table class="table table-striped">
                  <?php
                $usr=$_SESSION['username'];
                      
      foreach ($akses->lihatnilaipendadaran1($usr) as $data) {
                      
                      echo "
                      <tr>
                        <td>NIM</td><td colspan=2>:</td><td>".$data['nim']."</td>
                      </tr>
                      <tr>
                        <td>Nama</td><td colspan=2>:</td><td>".$data['nama_mhs']."</td>
                      </tr>
                      <tr>
                        <td>Nama Pembimbing</td><td colspan=2>:</td><td>".$data['nama_dsn']."</td>
                      </tr>
                     ";

                        foreach($akses->getDosenPenguji1($usr) as $data1){
                          echo "
                          <tr>
                          <td>Penguji 1</td><td colspan=2>:</td><td>".$data1['nama_dosen']."</td>
                          </tr>
                          
                          ";
                        }
                        foreach($akses->getDosenPenguji2($usr) as $data1){
                          echo "
                          <tr>
                          <td>Penguji 2</td><td colspan=2>:</td><td>".$data1['nama_dosen']."</td>
                          </tr>
                          
                          ";
                        }



                        echo "
                      <tr>
                        <td>Nilai Penguji 1</td><td colspan=2>:</td><td>".$data['nilai_penguji_1']."</td>
                      </tr>
                      <tr>
                        <td>Nilai Penguji 2</td><td colspan=2>:</td><td>".$data['nilai_penguji_2']."</td>
                      </tr>
                      <tr>
                        <td>Nilai Pembimbing</td><td colspan=2>:</td><td>".$data['nilai_pembimbing']."</td>
                      </tr>
                      <tr>
                        <td>Status</td><td colspan=2>:</td><td>".$data['status']."</td>
                      </tr>

                     
                      ";}
                    
                  ?>
                  <!DOCTYPE html>
                  <html>
                  <head>
                      <title></title>
                      <script type="text/javascript">
                          function displaymessage(){
                            window.print();
                          }
                      </script>

                  </head>
                  <body>
                  <form>
                    
                  </form>
                  </body>
                  </html>
                </table>  
              </td>
               <tr align="center">
    <form>
        <td><input type="button" value="Cetak" class='btn btn-outline-primary' role='button' onclick="displaymessage()"></td>
    </form>
    </tr>
            </tr>
            </tr>
          </table>
        </td>
        <td width="25%" bgcolor="white" rowspan="2"></td>
      </tr>
    </table>


  </body>
</html>

<?php include '../templates/footer_Penjadwalan.php' ?>