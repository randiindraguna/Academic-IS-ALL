<?php 
require_once('../database.php');
  $akses = new Database();
  $akses->connect();

include "../pengelola/Class_analitik.php";
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
    <?php 
    include '../templates/navbar_dosen.html';
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="../pengelola/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../pengelola/css/style_dashboard.css">
    <!-- /\ambil css penjadwalan -->
    <!-- Tambahan CSS -->
    <link rel="stylesheet" href="../css/style_penjadwalan.css">
    <link rel="stylesheet" href="../css/switches_Penjadwalan.css">

    <style type="text/css" href="../css/tombol_penjadwalan.css"></style>
    <!--  -->

    <title>Selamat Datang Di Website Kami</title>
  </head>
  <body style="background-color= #808080;">
        <center>
          <ul style="width:30%;">
            <div class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Selamat datang 
                      <?php $user = $cal->getDataDsn($_SESSION['username']); 
                        foreach ($user as $name) {
                            echo $name['nama'];
                    }
                ?>
            </div>
          </ul>
        </center>
    <table border="0" width="100%" height="100%" align="center">
      <tr><td colspan="3"><br><br></td></tr>
      <div class="container">
            <div class="alert alert-success fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              Selamat Datang <?php echo $_SESSION['username']; ?> 
            </div>
          <table border="0" width="70%" align="center">
            <tr>
              <td rowspan="2" width="30%">
                <ul class="gaya-avatar">
                  <center><img src="../pengelola/img/AV1.png" width="100px"></center>
                  <center>
                    <?php 
                        //Profil Akun login 
                        $usr = $_SESSION['username'];
                        foreach ($cal->getDataDsn($usr) as $Profil) { ?>
                          <br><br>
                          <h2><?php echo $Profil['nama'] ?></h2>
                          <h5><?php echo $Profil['niy'] ?></h5>
                    <?php  }
                    ?>
                  </center>
                </ul>
              </td>
              <td rowspan="3"></td>
              <td>
                  <ul class="gaya gaya-v2">
                   <?php 
                      foreach ($cal->getDataDsn($usr) as $email) { ?>
                          <h2><?php echo $email['email'];  ?></h2>
                          <h5>email </h5>
                    <?php }
                   ?>
                  </ul>
              </td>
              <td rowspan="2"></td>
              <td>
                  <ul class="gaya gaya-v3">
                    <?php 
                      foreach ($cal->getJumMhs($usr) as $dsn){ ?>
                        <h2><?php echo $dsn['jum_mhs'];  ?></h2>
                        <h5>Mahasiswa</h5>
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
                   <h2>
                   <?php  
                      $terdekat = mysqli_num_rows($cal->getJadwalTerdekat($usr));
                        if ($terdekat > 0) {
                          foreach ($cal->getJadwalTerdekat($usr) as $dsn) {
                              echo $dsn['tgl_dekat'];
                          }
                        }else{
                              echo "Kosong";
                        }
                    ?>
                    </h2>
                    <h5>Jadwal Terdekat</h5>
                    
                  </ul>
              </td>
              
              <td>
                  <ul class="gaya gaya-v6">
                    <h2>
                       <?php  
                          $terdekat = mysqli_num_rows($cal->getJadwalTerdekat($usr));
                            if ($terdekat > 0) {
                              foreach ($cal->getJadwalTerdekat($usr) as $dsn) {
                                  echo $dsn['jam_dekat'];
                              }
                            }else{
                                  echo "-";
                            }
                        ?>
                    </h2>
                    <h5>Waktu</h5>
                  </ul>
                </div>
              </td>
              <td>
                  <ul class="gaya gaya-v7">
                    <h2>
                        <?php  
                          $terdekat = mysqli_num_rows($cal->getJadwalTerdekat($usr));
                            if ($terdekat > 0) {
                              foreach ($cal->getJadwalTerdekat($usr) as $dsn) {
                                  echo $dsn['tmp_dekat'];
                              }
                            }else{
                                  echo "-";
                            }
                        ?>
                    </h2>
                    <h5>Ruang</h5>
                  </ul>
              </td>
            </tr>
          </table>
        </div>
           
    <table cellpadding="27" border="0" width="100%" height="20%">
      <tr align="center">
        <td >
          <br><br><br><br>
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