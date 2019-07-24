<?php 
require_once('../database.php');
  $akses = new Database();
  $akses->connect();
 

  include "Class_analitik.php";
  $cal = new Analitik();
  $cal->connect();
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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script type="text/javascript" src="css/js/jquery.js"></script>
    <script type="text/javascript" src="css/js/bootstrap.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    
    <!-- /\ambil css penjadwalan -->
    <!-- Tambahan CSS -->
    <link rel="stylesheet" type="text/css" href="css/style_dashboard.css">
    <link rel="stylesheet" href="../css/style_penjadwalan.css">
    <link rel="stylesheet" href="../css/switches_Penjadwalan.css">

    <style type="text/css" href="../css/tombol_penjadwalan.css"></style>
    <!--  -->

    <title>Selamat Datang Di Website Kami</title>
  </head>
  <body style="background-color= #808080;">
   <?php include '../templates/navbar_admin.html'?>
        <center>
          <ul style="width:30%;">
            <div class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Selamat datang <?php echo $_SESSION['username']; ?>
            </div>
          </ul>
        </center>

    <!-- <table border="0" width="100%" height="100%" align="center">
      <tr><td colspan="3"><br><br><br><br><br><br></td></tr>
      <tr>
        <td width="25%"  rowspan="2"></td>
        <td width="50%">
          <table cellpadding="20"width="100%" border="0"  height="100%">
            <tr>
              <td bgcolor="#B5B5B5" style="width: 100%;height: 100%;border-radius: 20px;padding-top: 20px;padding-bottom: 20px;box-shadow: 0px 0px 5px 2px #d1d1d1;">
                <center><h3>Selamat Datang Admin<br>
                  PRPL Manajemen Skripsi<br>
                  Kelas C<br>
                  Teknik Informatika<br>
                </h3></center>


              </td>
            </tr>
          </table>
        </td>
        <td width="25%" rowspan="2"></td>
      </tr>
    </table> -->

    <table border="0" width="100%" height="100%" align="center">
      <tr><td colspan="3"><br><br>
      <tr>
        <td width="25%"  rowspan="2"></td>
        <br>

        <div class="container">
            <div class="alert alert-success fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              Selamat Datang <?php echo $_SESSION['username']; ?> 
            </div>
          <table border="0" width="70%" align="center">
            <tr>
              <td rowspan="2" width="30%">
                <ul class="gaya-avatar">
                  <center><img src="img/AV1.png" width="100px"></center>
                  <center>
                    <?php 
                        //Profil Akun login 
                        $usr = $_SESSION['username'];
                        foreach ($cal->get_Profil($usr) as $Profil) { ?>
                          <br><br>
                          <h2><?php echo $Profil['user_name'] ?></h2>
                          <h5><?php echo $Profil['level'] ?></h5>
                    <?php  }
                    ?>
                  </center>
                </ul>
              </td>
              <td rowspan="2"></td>
              <td>
                  <ul class="gaya gaya-v2">
                   <?php 
                      foreach ($cal->getData_jumlah() as $juml) { ?>
                          <h2><?php echo $juml['jumlah'];  ?></h2>
                          <h5>Mahasiswa </h5>
                    <?php }
                   ?>
                  </ul>
              </td>
              <td rowspan="2"></td>
              <td>
                  <ul class="gaya gaya-v3">
                    <?php 
                      foreach ($cal->getData_dosen() as $dsn){ ?>
                        <h2><?php echo $dsn['jml_dosen'];  ?></h2>
                        <h5>Dosen</h5>
                    <?php  }
                    ?>
                  </ul>
              </td>
              <td rowspan="2"></td>
              <td>
                  <ul class="gaya gaya-v4">
                   <?php 
                      foreach ($cal->getData_semester() as $smt){ 
                          $temp = substr($smt['periode'],0,9) ?>
                          <h2><?php echo $temp;  ?></h2>
                          <h5>Periode</h5>
                    <?php }
                   ?>
                  </ul>
              </td>
            </tr>
            <tr>
              <td>
                  <ul class="gaya gaya-v5">
                   <?php 
                      //jumlah mahasiswa terdaftar
                        foreach ($cal->getData_metopen() as $mtpn){ ?>
                          <h2><?php echo $mtpn['jml_metopen'] ; ?></h2>
                        <h5>Metopen</h5>
                    <?php  }
                   ?>
                  </ul>
              </td>
              <td>
                  <ul class="gaya gaya-v6">
                   <?php 
                      foreach ($cal->getData_skripsi() as $skrp){ ?>
                        <h2><?php echo $skrp['jml_skripsi'] ; ?></h2>
                        <h5>Skripsi</h5>
                    <?php  }
                   ?>
                  </ul>
                </div>
              </td>
              <td>
                  <ul class="gaya gaya-v7">
                    <?php 
                      foreach ($cal->getData_semester() as $smt){ 
                          $temp = substr($smt['periode'],10,6) ?>
                          <h2><?php echo $temp;  ?></h2>
                          <h5>Semester</h5>
                    <?php }
                   ?>
                  </ul>
              </td>
            </tr>
          </table>
        </div>
           <br><br><br><br><br>
        <td width="25%" rowspan="2"></td>
      </tr>
    </table>

    <table cellpadding="27" border="0" width="100%" height="20%">
      <tr align="center">
        <td>
          <br><br><br><br><br><br>
          <div id="footer" style="height:50px; line-height:50px; background:#333; color:white;border-radius: 30px;">
            Copyright &copy; 2019
             Designed by Register Metopen squad <b> Collaborate With </b> Analitik squad
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