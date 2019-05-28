<?php  
  session_start();
  include '../Db_bimbingan/database.php';
  $data_perhalaman = 10;
  $total_data = mysqli_num_rows($car->jumlah_data());
  $total_halaman = ceil($total_data/$data_perhalaman);

  if(!isset($_GET['page']))
  {
    $page = 1;
  }
  else
  {
    $page = $_GET['page'];
  }
  $batas_atas = ($page - 1)*$data_perhalaman;

  $name = $car->getHeaderLogbimbingan($_SESSION['username']);
?>
<!DOCTYPE>  
<html lang="en">
  <head>
    
    <!-- Tambahan Font -->
    <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- include navbar -->
<link rel="stylesheet" type="text/css" href="../css/style_penjadwalan.css">
<link rel="stylesheet" type="text/css" href="../css/switches_penjadwalan.css">
<link rel="stylesheet" type="text/css" href="../css/tombol_Penjadwalan.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  <style>

      .font{
        font-size: 12px;
      }

      .padd{

        
      }

      .active {
  background-color: #0066ff;
  color: white;
}
nav{
        position: fixed;
      }
      .kotak{
        width: 80%;
        height: 100%;
        background: rgba(0,0,0,.5);
        border-radius: 30px;
        padding-top: 20px;
        padding-bottom: 20px;
        box-shadow: 0px 0px 10px 4px #d1d1d1;
      }

      .clr
      {
        box-shadow: 0px 0px 10px 4px #d1d1d1;
        background: rgba(0,0,0,.25);
      }
      .bodyBG{
        background-position: 50%;
        background-image: url(../desain/bguad.jpg);
      }
  </style>

    <title>MANAJEMEN SKRISPSI</title>
  </head>
<body>
<?php
include '../header_bimbingan_biarngga_hilang/navbar_mhs_bimbingan.php';
?>


<table width="100%" height="100%" class="bg-light bodyBG">

  <tr align="center">

    <td rowspan="" class="pt-4 pb-4">
      <div  class="kotak container" >
        <?php
          $id = $_SESSION['username'];
          $use = $car->getHeaderDosen($id);
          foreach ($use as $key) {
            # code...
          echo "
          <div class='ml-4 pb-4 pt-5'>
            <table border='0' cellpadding='6' width='100%'>
            <tr>
              <strong>
                <th>Nama Dosen</th>
                <th align='center'> :</th>
                <th>$key[nama]</th>
              </strong>
            </tr>
            <tr>
              <strong>
                <th>Nomer Induk Dosen</th>
                <th align='center'> :</th>
                <th>$key[niy]</th>
              </strong>
            </tr>
            <tr>
              <strong>
                <th>Bidang Keahlian Dosen</th>
                <th align='center'> :</th>
                <th>$key[bidang_keahlian]</th>
              </strong>
            </tr>
          </table>         
        </div>
          ";
          }
          ?>

        <table class="table container border mt-3">
          <tr>
            <td rowspan="2">NAMA MAHASISWA</td>
            <td rowspan="2">NIM </td>
            <td rowspan="2">JUDUL SKRIPSI/METOPEN</td>
            <td rowspan="2">JUMLAH KONSULTASI MAHASISWA</td>
          <tr>
          <tr></tr>
            <?php
            if(isset($_POST['cari']))
            {
              $hasil_cari = $car->mahasiswa_bimbingan_dosen_hasil_search($_SESSION['username'], $_POST['cari']);
              foreach ($hasil_cari as $key) {
                if($key['model'] == "metopen")
                {
                  echo "
                  <tr>
                  <td>".$key['name']."</td>
                  <td>".$key['nim']."</td>
                  <td>".$key['judul']."</td>
                  <td><div class='btn btn-primary disabled'>".$key['jumlah_bimbingan']."</div></td>
                  </tr>
                  ";
                }
                else if($key['model'] == "skripsi")
                {
                  echo "
                  <tr>
                  <td>".$key['name']."</td>
                  <td>".$key['nim']."</td>
                  <td>".$key['judul']."</td>
                  <td><div class='btn btn-success disabled'>".$key['jumlah_bimbingan']."</div></td>
                  </tr>
                  ";
                }
              }
            }
            else
            {
              $tampilan_awal = $car->mahasiswa_bimbingan_dosen($_SESSION['username']);
              foreach ($tampilan_awal as $key) {
                if($key['model'] == "metopen")
                {
                  echo "
                  <tr>
                  <td>".$key['name']."</td>
                  <td>".$key['nim']."</td>
                  <td>".$key['judul']."</td>
                  <td><div class='btn btn-primary disabled'>".$key['jumlah_bimbingan']."</div></td>
                  </tr>
                  ";
                }
                else if($key['model'] == "skripsi")
                {
                  echo "
                  <tr>
                  <td>".$key['name']."</td>
                  <td>".$key['nim']."</td>
                  <td>".$key['judul']."</td>
                  <td><div class='btn btn-success disabled'>".$key['jumlah_bimbingan']."</div></td>
                  </tr>
                  ";
                }
              }
            }
            ?>
        </table>
      </div>
    </td>

  </tr>
  <tr height="10%">
    <td colspan="3">
        <center>
          <div class=" rounded pt-2 pb-2 bg-secondary ml-4 mr-4 clr text-light">
            <font size="2" face="arial">
              Copyright &copy; Programmer-fitur-Bimbingan-Skripsi UAD 2019
            </font> 
          </div>
        </center>
    </td>
  </tr>


</table>
</body>
</HTML>
