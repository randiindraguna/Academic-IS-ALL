<?php  
  session_start();
  include '../Db_bimbingan/database.php';
?>
<!DOCTYPE>  
<html lang="en">
  <head>





      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>





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

        <table class="container border mt-3" bgcolor="white" cellpadding="8" border="2">
          <tr class="bg-primary" align="center">
            <?php 
              if(!isset($_GET['nama']))
              {
              echo '
              <td rowspan="3"> 
                <form>
                  <input type="text" name="nama" hidden="">
                  <input type="submit" name="asc" class="btn btn-primary" value="NAMA MAHASISWA">
                </form>
              </td>';
              }
              else
              {
              echo '
              <td rowspan="3"> 
                <form>
                  <input type="text" name="normal" hidden="">
                  <input type="submit" class="btn btn-primary" value="NAMA MAHASISWA">
                </form>
              </td>';
              }
              
              if(!isset($_GET['nim']))
              {
              echo '
              <td rowspan="3">
                <form>
                  <input type="text" name="nim" hidden="">
                  <input type="submit" name="asc" class="btn btn-primary" value="Nim">
                </form>
              </td>';
              }
              else
              {
                echo '
              <td rowspan="3">
                <form>
                  <input type="text" name="normal" hidden="">
                  <input type="submit" class="btn btn-primary" value="Nim">
                </form>
              </td>';
              }
              if(!isset($_GET['judul']))
              {
              echo '
              <td rowspan="3">
                <form>
                  <input type="text" name="judul" hidden="">
                  <input type="submit" name="asc" class="btn btn-primary" value="judul skripsi/metopen">
                </form>
              </td>';
              }
              else
              {
 
              echo '
              <td rowspan="3">
                <form>
                  <input type="text" name="normal" hidden="">
                  <input type="submit" class="btn btn-primary" value="judul skripsi/metopen">
                </form>
              </td>';

              }
              if(!isset($_GET['jumlah']))
              {
              echo '
              <td rowspan="2" colspan="2">
                <form>
                  <input type="text" name="jumlah" hidden="">
                  <input type="submit" name="asc" class="btn btn-primary" value="jumlah konsultasi">
                </form>
              </td>';
              }
              else
              {
             
              echo '
              <td rowspan="2" colspan="2">
                <form>
                  <input type="text" name="normal" hidden="">
                  <input type="submit" class="btn btn-primary" value="jumlah konsultasi">
                </form>
              </td>';
              }

              if(!isset($_GET['lama']))
              {
              echo '
              <td rowspan="3" >
                <form>
                  <input type="text" name="lama" hidden="">
                  <input type="submit" name="asc" class="btn btn-primary" value="Lama bimbingan mahasiswa">
                </form>
              </td>';
              }
              else
              {
              echo '
              <td rowspan="3">
                <form>
                  <input type="text" name="normal" hidden="">
                  <input type="submit" class="btn btn-primary" value="Lama bimbingan mahasiswa">
                </form>
              </td>';
              }
            ?>
          </tr>
          <tr>
            <tr class="bg-primary" align="center">
              <td>
                <div class="btn btn-primary" value="">METOPEN</div>
              </td>
              <td>
                <div class="btn btn-primary" value="">SKRIPSI</div>
              </td>


            </tr>
          </tr>
            <?php
           
            {
              if(isset($_GET['asc']))
              {
                if(isset($_GET['nama']))
                {
                  $tampilan_awal = $car->mengurutkan_nama_A_ke_Z($_SESSION['username']);
                }
                else if(isset($_GET['nim']))
                {
                  $tampilan_awal = $car->mengurutkan_mahasiswa_berdasarkan_nim($_SESSION['username']);
                }
                else if(isset($_GET['judul']))
                {
                  $tampilan_awal = $car->mengurutkan_judul($_SESSION['username']);
                } 
                else if(isset($_GET['jumlah']))
                {
                  $tampilan_awal = $car->mengurutkan_jumlah_konsultasi($_SESSION['username']);
                } 
                else if(isset($_GET['lama']))
                {
                  $tampilan_awal = $car->mengurutkan_lama_bimbingan_dari_yang_terlama($_SESSION['username']);
                } 
              }
              else if(isset($_GET['normal']) || isset($_SESSION['username']))
              {
                $tampilan_awal = $car->jumlah_bimbingan_satu_mahasiswa($_SESSION['username']);
              }

              foreach ($tampilan_awal as $key) {
                if($key['status_mahasiswa'] == "metopen")
                {
                  foreach ($car->jumlah_bimbingan_satu_mahasiswa_untuk_ubah_warna($key['nim']) as $ke){
                  
                    if($ke['jenis_bimbingan'] == "metopen" || $ke['jenis_bimbingan'] == NULL)
                    {
                      echo "
                    <tr align='center'>
                    <td>".$key['name']."</td>
                    <td>".$key['nim']."</td>
                    <td>".$key['judul']."</td>
                    <td><div class='btn btn-primary hover_metopen disabled'>".$ke['jumlah']."</div></td>
                    <td></td> <!-kolom untuk jumlah bimbingan skripsi, kosong karena pada saat status bimbingan masih metopen mahasiswa tersebut tidak mempunyai bimbingan skripsi samasekali-!>
                    <td>".$car->confert_hari($key['lamabimbingan'])."</td>
                    </tr>
                    ";
                    }
                  }
                }
                else if($key['status_mahasiswa'] == "skripsi" && $car->confert_hari($key['lamabimbingan']) > 8)
                {
                  echo 
                      "
                        <tr align='center' class='bg-danger'>
                        <td>".$key['name']."</td>
                        <td>".$key['nim']."</td>
                        <td>".$key['judul']."</td>
                      ";

                  foreach ($car->jumlah_bimbingan_satu_mahasiswa_untuk_ubah_warna($key['nim']) as $ke){
                      

                      if($ke['jenis_bimbingan']=="skripsi" && $ke['jumlah'] >= 10)
                      {
                        echo "<td><div class='btn btn-success hover disabled'>".$ke['jumlah']."</div></td>";
                      }
                      else if($ke['jenis_bimbingan']=="skripsi")
                      {
                        echo "<td><div class='btn btn-primary hover_not disabled'>".$ke['jumlah']." skripsi</div></td>";
                      }
                      else // metopen
                      {
                        echo "<td><div class='btn btn-primary hover_metopen disabled'>".$ke['jumlah']." </div></td>";
                      }


                  }

                  

                  echo "
                  <td>".$car->confert_hari($key['lamabimbingan'])."</td>
                  </tr>";
                }
                else if($key['status_mahasiswa'] == "skripsi")
                {
                  echo 
                      "
                        <tr align='center'>
                        <td>".$key['name']."</td>
                        <td>".$key['nim']."</td>
                        <td>".$key['judul']."</td>
                      ";

                  foreach ($car->jumlah_bimbingan_satu_mahasiswa_untuk_ubah_warna($key['nim']) as $ke){
                      

                      if($ke['jenis_bimbingan']=="skripsi" && $ke['jumlah'] >= 10)
                      {
                        echo "<td><div class='btn btn-success hover disabled'>".$ke['jumlah']."</div></td>";
                      }
                      else if($ke['jenis_bimbingan']=="skripsi")
                      {
                        echo "<td><div class='btn btn-primary hover_not disabled'>".$ke['jumlah']." skripsi</div></td>";
                      }
                      else // metopen
                      {
                        echo "<td><div class='btn btn-primary hover_metopen disabled'>".$ke['jumlah']." </div></td>";
                      }


                  }

                  

                  echo "
                  <td>".$car->confert_hari($key['lamabimbingan'])."</td>
                  </tr>";
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

<script>
$(document).ready(function(){
  $('.hover').tooltip({title: "Jumlah konsultasi skripsi , Telah mencapai batas minimal syarat mengikuti ujian", trigger: "hover"}); 
  $('.hover_metopen').tooltip({title: "Jumlah konsultasi metopen", trigger: "hover"}); 
  $('.hover_not').tooltip({title: "Jumlah konsultasi skripsi", trigger: "hover"}); 
});
</script>

</body>
</HTML>
