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

    <title>Pendaftaran Metopen</title>
    
  </head>
  <body bgcolor="#808080">
  <?php 
          if (isset($_POST['kirim'])) {
            # code...
          
              //require_once('database.php');
              //$akses = new Database();
              //$akses->connect();
              $periode=$_POST['periode'];
              $status=$_POST['status']; 
              $oke=$akses->Inputsemester($periode,$status);
              if($oke==TRUE){
                  echo '<script languange="javascript"> 
                  alert("Berhasil Input");
                  </script>';
                  //echo '<script>window.location.href="semester.php";   </script>';
                              }
          else {
                  echo 'Gagal Input';
                  echo '<script>window.location.href="semester.php";
                  </script>';
  
              }
              }



?>

   <?php include '../templates/navbar_admin.html'?>
<table border="0" width="100%"  height="100%" align= "center">
  <tr><td colspan="3" ><br></td></tr>
  <tr>
    <td width="25%" rowspan="2">
    </td>
    <td width="50%">
      <table cellpadding="20"width="100%" border="0"  height="100%">
        <tr>
          <td bgcolor="#B5B5B5" style="width: 100%;height: 100%;border-radius: 20px;padding-top: 20px;padding-bottom: 20px;box-shadow: 0px 0px 5px 2px #d1d1d1;">
            <center><h3>Pengelolaan Semester</h3></center>
            <form action="semester.php" method="POST">
              <div class="form-group">
                <label for="periode">Periode</label>
                <input type="text" name="periode" class="form-control" id="periode" placeholder="Kelola semester" required>
              </div>
              <div class="form-group">
                <label for="status">Status</label><br>
                <input type="radio" name="status" value="Terbuka"> Terbuka
                <input type="radio" name="status" value="Tertutup"> Tertutup
              </div>
               <?php
               ?>    
                    
               
              <input type="submit" class="btn btn-primary" name="kirim" value="Simpan">

                          <div class="table-responsive">
              <table class="table table-bordered mt-4" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Periode</th>
                    <th>Status</th>
                    <th colspan="2">Aksi</th>
                  </tr>
                </thead>
                
                <body>
                  
                 <?php  
                   //require_once('database.php');  
                   $hasil=$akses->Semester();
                   $i = 1;
                   while ($data=mysqli_fetch_array($hasil)) 
                  //foreach (mysqli_fetch_array($hasil) as $data) 
                   {
                     
                     echo "    
                    <tr>
                       <td>$i</td>
                       <td>$data[periode]</td>
                       <td>$data[status]</td>
                       <td><a href='update_semester.php?id_semester=$data[id_semester]'>Update</a></td>
                       <td><a href='delete_semester.php?id_semester=$data[id_semester]'>Delete</a></td>
                    </tr>";
                      $i = $i+1;
                          }


                 ?>
                </tbody>
              </table>
            </div>
            </form>  
          </td>
        </tr>
      </table>
    </td>
    <td width="25%"  rowspan="2"></td>
  </tr> 
</table>
<table cellpadding="27" border="0" width="100%" height="20%">
  <tr align="center">
    <td >
      <div  id="footer" style="height:50px; line-height:50px; background:#333; color:white;border-radius: 30px;">
        Copyright &copy; 2019
        Designed by Team Register Metopen
      </div>
    </td>
  </tr>
  </table
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