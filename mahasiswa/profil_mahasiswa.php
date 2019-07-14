<?php 
require_once('../database.php');
require_once('../class_login.php');
  $akses = new Database();
  $akses->connect();
 
 $akses2 = new Login();
 $akses2->connect();
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
    include '../templates/navbar_mhs.html';
    ?>
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
    <!-- sweet alert -->
<script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

<script src="sweetalert2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">

    <title>Profil Mahasiswa</title>
   
  </head>
  <body style="background-color= #808080;">
     <?php
      if(isset($_GET['can_chg'])){
        echo '<script type="text/javascript">
              Swal.fire({
                position: "middle",
                type: "success",
                title: "Berhasil merubah password",
                showConfirmButton: false,
                timer: 1500
              })
        </script>';
    }

    if(isset($_GET['fail_chg']))
    {
       echo '<script type="text/javascript">
              Swal.fire({
                position: "middle",
                type: "error",
                title: "Gagal merubah password",
                showConfirmButton: false,
                timer: 3000
              })
        </script>';
    }
    ?>
  
    <table border="0" width="100%" height="100%" align="center">
      <tr><td colspan="3"><br><br></td></tr>
      <tr>
        <td width="25%" rowspan="2"></td>
        <td width="50%">
          <table cellpadding="20"width="100%" border="0"  height="100%">
            <tr>
            
              <td bgcolor="#B5B5B5" style="width: 100%;height: 100%;border-radius: 20px;padding-top: 20px;padding-bottom: 20px;box-shadow: 0px 0px 5px 2px #d1d1d1;">
                  <center>
              <font color='black'><h3>Profil Mahasiswa</h3></font>
            </center>
                              
               <?php          

                $data=mysqli_fetch_array($akses->CariDataMahasiswa($_SESSION['username']));
                $jumlahrow=mysqli_num_rows($akses->CariDataMahasiswa($_SESSION['username']));
                  if($jumlahrow>0){
                      echo "
                      
                <table class='table table-striped'>
                      <tr>
                        <td >Nama</td><td colspan=2>:</td><td>".$data['nama']."</td>
                      </tr>
                       <tr>
                        <td>NIM</td><td colspan=2>:</td><td>".$data['nim']."</td>
                      </tr>
                      <tr>
                        <td>Jenis kelamin</td><td colspan=2>:</td><td>".$data['jenis_kelamin']."</td>
                      </tr>
                      <tr>
                        <td>Topik</td><td colspan=2>:</td><td>".$data['topik']."</td>
                      </tr>
                      <tr>
                        <td>Status</td><td colspan=2>:</td><td>".$data['status']."</td>
                      </tr>  
                      <tr>
                        <td>Dosen Pembimbing</td><td colspan=2>:</td><td>".$data['namados']."</td>
                      </tr>
                      <tr>
                        <td>Bidang Minat</td><td colspan=2>:</td><td>".$data['bidang_minat']."</td>
                      </tr>
                      <tr>
                        <td>Tanggal Mulai</td><td colspan=2>:</td><td>".$data['tanggal_mulai']."</td>
                      </tr>  
                      <tr>
                        <td>Password</td><td colspan=2>:</td><td>"." <button type='button' id='ButtonPass' class='btn btn-outline-primary' data-toggle='modal' data-target='#myModal'  margin: 20px; '>
                         Ubah password
                        </button>"."</td>
                      </tr>   
                       ";}
                      else{
                        echo"

                         <table class='table table-striped'>
                         
                          
                       <tr>
                        <td>Username</td><td colspan=2>:</td><td>".$_SESSION['username']."</td>
                      </tr> 
                       <tr>
                        <td>Status</td><td colspan=2>:</td><td class=text-danger>Belum mendaftar metopen</td>
                      </tr> 
                         <td>Password</td><td colspan=2>:</td><td>"." <button type='button' id='ButtonPass' class='btn btn-outline-primary' data-toggle='modal' data-target='#myModal'  margin: 20px; '>
                         Ubah password
                        </button>"."</td>
                        <br><br><br><br>
                             
                        ";
                      }
                       ?>
             
                <?php
                $userRow=mysqli_num_rows($akses2->searchUser($_SESSION['username']));
                if($userRow<=0){
                       echo"
                             <script type='text/javascript'>
                              var button = document.getElementById('ButtonPass');
                              button.disabled = true;
                             </script>
                           ";} 
                             ?>
                    </table>
                    <!-- POPUP -->

                          <div class="container">
                            <!-- The Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                
                                  <!-- Modal Header -->
                                  <div class="modal-header">
                                    <h4 class="modal-title" align="center">Ubah Password</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>
                                  
                                  <!-- Modal body -->
                                  <div class="modal-body">
                                    <div style="margin:20px;">
                                  <div class = "container">
                                    <div class="wrapper">
                                      <form action="ubah_sandi.php" method="POST"  class="form-signin">       
                                          <h3 class="form-signin-heading">Silahkan Mengisi Data</h3>
                                          <hr class="colorgraph"><br>
                                          <input type="password" class="form-control" name="oldpass" placeholder="Password lama" required="" autofocus="" /><br>
                                          <input type="password" class="form-control" name="newpass" placeholder="Password baru" required="" autofocus="" /><br>
                                          <input type="password" class="form-control" name="ulangpass" placeholder="Konfirmasi password baru" required=""/> <br>         
                                         
                                          <button class="btn btn-lg btn-primary btn-block"  name="submit" value="kirim" type="Submit">Send</button>        
                                      </form>     
                                    </div>
                                  </div>
                                </div>
                                  </div>
                                  
                                  <!-- Modal footer -->
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                           <!-- POPUP -->
              </td>
            </tr>
          </table>
        </td>
        <td width="25%" rowspan="2"></td>
      </tr>
    </table>

    <table cellpadding="27" border="0" width="100%" height="20%">
      <tr align="center">
        <td>
          <br>
          <div  id="footer" style="height:50px; line-height:50px; background:#333; color:white;border-radius: 30px;">
            Copyright &copy; 2019
            Designed by SIMBIS
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