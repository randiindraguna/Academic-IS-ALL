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
    
    <?php include "../templates/navbar_admin.html" ?>

    <table border="0" width="100%" height="100%" align="center">
      <tr><td colspan="3" ><br><br></td></tr>
      <tr>
        <td width="25%" rowspan="2"></td>
        <td width="50%">
          <table cellpadding="20" width="100%" border="0"  height="100%" align="center">
            <tr>
              <td bgcolor="#B5B5B5" style="width: 100%;height: 100%;border-radius: 20px;padding-top: 20px;padding-bottom: 20px;box-shadow: 0px 0px 5px 2px #d1d1d1;">
                <center><h3>Update Data Semester</h3>
          <table class="table table-striped" align="center"> 
            <?php

            $id_semester=$_GET['id_semester'];
              foreach ($akses->FormUpdateDataSemester($id_semester) as $key) {
        echo"
        <table align='center'>
        <tr>
        <td width='700px'>
<form method='POST' action='proses_update_semester.php'>
  <div class='form-group'>
    <label for='formGroupExampleInput'>No</label>
    <input name='id_semester' value='$key[id_semester]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>Periode</label>
    <input name='periode' value='$key[periode]' type='text' class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>Status</label><br>
    <input type='radio' value='Terbuka' name='status' required> Terbuka
    <input type='radio' value='Tertutup' name='status' required> Tertutup
  </div>
        
        ";

       }

      ?>     

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
        <td width="25%" rowspan="2"></td>
      </tr>
    </table>

    <table cellpadding="27" border="0" width="100%" height="20%">
      <tr align="center">
        <td >
          <br>
          <div id="footer" style="height:50px; line-height:50px; background:#333; color:white;border-radius: 30px;">
            Copyright &copy; 2019
            Designed by Team Register Metopen
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