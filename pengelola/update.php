<?php 
require_once('../database.php');
  $akses = new Database();
  $akses->connect();
 
// mengaktifkan session
session_start();
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] == "login"){
  // menampilkan pesan selamat datang
  //echo "Hai, selamat datang ". $_SESSION['username'];
}else{
  header("location:../index.php");
}
?>

<?php 
include '../templates/header_penjadwalan.php';
 ?>

<!doctype html>
<html lang="en">
  <head>
    <?php include '../templates/navbar_admin.html'?>
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

    <title>Update</title>
  </head>
  <body bgcolor="#808080">

    <table border="0" width="100%" height="100%" align="center">
      <tr><td colspan="3" bgcolor="#808080"><br></td></tr>
      <tr>
        <td width="25%" bgcolor="#808080" rowspan="2"></td>
        <td width="50%">
          <table cellpadding="20" width="100%" border="0"  height="100%" align="center">
            <tr>
              <td bgcolor="#F5F5F5">
                <center><h3>Update data mahasiswa metopen</h3>
          <table class="table table-striped" align="center"> 
            <?php

            $nim=$_GET['nim'];
              foreach ($akses->FormUpdateDataMahasiswaMetopen($nim) as $key) {
        echo"
        <table align='center'>
        <tr>
        <td width='700px'>
<form method='POST' action='proses_update.php'>
  <div class='form-group'>
    <label for='formGroupExampleInput'>NIM </label>
    <input name='nim' value='$key[nim]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>NAMA </label>
    <input name='nama' value='$key[nama]' type='text' class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>JENIS KELAMIN</label>
    <input name='jenis_kelamin' value='$key[jenis_kelamin]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>TOPIK </label>
    <input name='topik' value='$key[topik]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
  </div>
        
        ";

       }

      ?>     
      
        DOSEN           : <select name="dosen" class='form-control' aria-label='Text input with checkbox' >
                                         <option>- PILIH -</option> 
                                        <?php
                                          $variable = $akses->getDosen();
                                          foreach ($variable as $key) {
                                            echo "
                                            <option value='$key[niy]'> $key[nama] </option>
                                            ";
                                            # code...
                                          }
                                        ?>
                                   </select>
        BIDANG MINAT           : <select name="bidang_minat" class='form-control' aria-label='Text input with checkbox' >
                                         <option>- PILIH -</option> 
                                         <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                         <option value="Sistem Cerdas">Sistem Cerdas</option>
                                         <option value="Multimedia">Multimedia</option>
                                         <option value="Sistem Informasi">Sistem Informasi</option>
                                         <option value="Media Pembelajaran">Media Pembelajaran</option>
                                   </select> 
  <br><table align='center'><input type='submit' name='kirim' value='kirim' class='btn btn-outline-success my-2 my-sm-0'>    
       </tr>  
        </form>
        </td>
        </tr>
        </table>      
  
          </table>
          </center>
              </td>
            </tr>
          </table>
        </td>
        <td width="25%" bgcolor="#808080" rowspan="2"></td>
      </tr>
    </table>

    <table cellpadding="27" border="0" width="100%" height="20%">
      <tr align="center">
        <td bgcolor="#808080">
          <div id="footer" style="height:50px; line-height:50px; background:#333; color:white;">
            Copyright &copy; 2019
            Designed by . . . . . . . .
          </div>
        </td>
      </tr> 
    </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
include '../templates/footer_penjadwalan.php';
 ?>