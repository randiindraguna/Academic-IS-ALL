<?php 
require_once('../database.php');
  $akses = new Database();
  $akses->connect();
 
// mengaktifkan session
session_start();
 $cek=$_SESSION['username'];
 $tes=$akses->ceknim($cek);
 $data=mysqli_fetch_array($tes);
 if($data['jum']>0){
  echo '<script type="text/javascript">alert("NIM sudah terdaftar sebagai mahasiswa metopen !")</script>';
  echo '<script>window.location="index.php"</script>';//header("location:index.php");
 }
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

    <title>Pendaftaran Metopen</title>
    
  </head>
  <body bgcolor="#808080">
<table border="0" width="100%"  height="100%" align= "center">
  <tr><td colspan="3" bgcolor="#808080"><br></td></tr>
  <tr>
    <td width="25%" bgcolor="#808080" rowspan="2">
    </td>
    <td width="50%">
      <table cellpadding="20"width="100%" border="0"  height="100%">
        <tr>
          <td bgcolor="#F5F5F5">
            <center><h3>Pendaftaran Metopen</h3></center>
            <form action="pos.php" method="POST">
              <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" name="nim" class="form-control" id="nim" value=<?php echo $_SESSION['username'];?> readonly>
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama" required>
              </div>
              <div class="form-group">
                <label for="semester">Semester</label>
                <?php 
                //include '../database.php';
                $hasil = $akses->SemesterTerbuka();
                foreach ($hasil as $data) {
                  # code...
                
                echo "
                <input type='text' name='semester' class='form-control' id='nama' value='$data[periode]' placeholder='Silahkan kelola semester' readonly>";
                  }
                ?>

              </div>
              <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label><br>
                <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
                <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
              </div>
              <div class="form-group">
                <label for="topik">Topik</label>
                <input type="text" name="topik" class="form-control" id="topik" placeholder="Masukkan Topik" required>
              </div>
              <div class="form-group">
                <label for="dosen">Dosen</label>
                <select name="dosen" class="form-control" id="dosen" required>
                  <option value="">- Pilih -</option>
                  <?php 
                    //require_once('database.php');
                    //$akses = new Database();
                    //$akses->connect();
                    $sql=$akses->getDosen();
                    while($data=mysqli_fetch_array($sql)){
                      echo '<option value="'.$data['niy'].'">'.$data['nama'].'</option>';
                    }
                   ?> 
                </select>
              </div>
              <div class="form-group">
                <label for="bidang_minat">Bidang Minat</label>
                <select name="bidang_minat" class="form-control" id="bidang_minat" required>
                  <option value="">- Pilih -</option>
                  <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                  <option value="Sistem Cerdas">Sistem Cerdas</option>
                  <option value="Multimedia">Multimedia</option>
                  <option value="Sistem Informasi">Sistem Informasi</option>
                  <option value="Media Pembelajaran">Media Pembelajaran</option>
                </select>
              </div>
              <div class="form-group form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" required>Data yang diinputkan sudah benar
                </label>
              </div>
              <center><button type="submit" class="btn btn-outline-danger">Submit</button>
            </form>  
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
      <div  id="footer" style="height:50px; line-height:50px; background:#333; color:white;">
        Copyright &copy; 2019
        Designed by . . . . . . . .
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