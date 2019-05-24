<?php  
  session_start();
  include 'database.php';
  $car = new Database();
  $car->connect();
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
<link rel="stylesheet" type="text/css" href="css/style_penjadwalan.css">
<link rel="stylesheet" type="text/css" href="css/switches_penjadwalan.css">
<link rel="stylesheet" type="text/css" href="css/tombol_Penjadwalan.css">

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
        background-image: url(desain/bguad.jpg);
      }
  </style>

    <title>MANAJEMEN SKRISPSI</title>
  </head>
<body>

<!-- <table width="100%" class="bgimage" height="10%">
  <tr align="left" class="border rounded">
    <td>
      <img src="desain/header.jpg">
    </td>
  </tr>
</table> -->
 
<!-- <table width="100%" height="10%">
  <tr align="">
    <td>
          <nav class="navbar navbar-expand-lg navbar-light bg-light navbar1  border rounded">
            <a class="navbar-brand" href="#"><img src="desain/Logo.png" class="mr-1 mt-1 rounded-circle" style="width:45px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button ml-4>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <div class="">
                  <a class="pt-0 mr-5 ml-3 btn btn-success" href="Bimbingan1.php">HOME</a>
                </div>
              </ul>
              <form class="form-inline my-2 my-lg-0" method="POST" action="Bimbingan1.php">
                <input name="cari" class="form-control mr-sm-2" type="search" placeholder="NIM" aria-label="Search" required="">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">&telrec;</button>
              </form>
            </div>
          </nav>
    </td>
   
  </tr>
</table> -->

<?php
include 'templates/navbar_mhs.html';
?>


<table width="100%" height="100%" class="bg-light bodyBG">

  <tr align="center">

    <td rowspan="" class="pt-4 pb-4">
      <div  class="kotak container" >

                              <?php 
                                 
                                  
                                  if(isset($_POST['nim'])){
                                    include 'Bimbingan1.1.php';  // JIKA VARIABLE NIM DI TEKAN/DIISI AKAN MENUJU KESINI
                                  }
                                  else if(isset($_POST['cari'])) // JIKA VARIABEL CARI DI TEKAN/DIISI MAKA AKAN PERGI KESINI
                                  {

                                    echo '

                                <h2>Log Bimbingan Skripsi</h2>
                                <p>berikut merupakan dafar riwayat Konsultasi mahasiswa : </p>
                                
                       

                                <table cellpadding="15"  class="bg-light">
                                 
                                    <tr align="center" class="bg-primary">
                                      <th >NAMA</th>
                                      <th >NIM</th>
                                      <th >DOSEN PEMBIMBING</th>
                                      <th >JUDUL SKRIPSI / METOPEN</th>
                                      <th >JUMLAH Konsultasi</th>
                                      <th colspan="2" >ACTION</th>
                                    </tr>
                              
                                 

                                    ';
                                    

                                        $g = $car->jumlah_bimbingan_mahasiswa_hasil_search($_POST['cari']); // untuk menampilkan daftar atau log bimbingan satu mahasiswa

                                        foreach($g as $key)
                                        {
                                          if("$key[model]"=="metopen")
                                          {
                                            echo"
                                            <tr class='border border-secondary'>
                                              <td>$key[name]</td>
                                              <td>$key[nim]</td>
                                              <td>$key[namdos]</td>
                                              <td>$key[judul]</td>
                                             
                                              <td align='center' valign='middle'>
                                                    <form method='POST' action='Bimbingan2.php'>
                                                    <input name='nim' type='text' value=$key[nim] hidden></input>
                                                        <input type='submit' class='btn btn-primary' value=$key[jumlah_bimbingan]> </input>
                                                    </form>
                                                  </td>
                                             <td align='center' valign='middle'>
                                             "; 
                                            if("$key[nim]" != $_SESSION['nim'])
                                            {
                                             echo " 
                                             <form method='POST' action='Bimbingan1.php'>
                                                    <input name='nim' type='text' value=$key[nim] hidden></input>
                                                        <input type='submit' class='btn btn-primary' value='tambah Konsultasi' disabled> </input>
                                                    </form>
                                                  </td>

                                            </tr>
                                            ";
                                            }
                                            else
                                            {
                                            echo " 
                                             <form method='POST' action='Bimbingan1.php'>
                                                    <input name='nim' type='text' value=$key[nim] hidden></input>
                                                        <input type='submit' class='btn btn-primary' value='tambah Konsultasi' > </input>
                                                    </form>
                                                  </td>

                                            </tr>
                                            "; 
                                            }
                                          }
                                          else
                                          {
                                            echo"
                                            <tr >
                                              <td>$key[name]</td>
                                              <td>$key[nim]</td>
                                              <td>$key[namdos]</td>
                                              <td>$key[judul]</td>

                                              <td align='center' valign='middle'>
                                                      <form method='POST' action='Bimbingan2.php'>
                                                      <input name='nim' type='text' value=$key[nim] hidden></input>
                                                          <input type='submit' class='btn btn-success' value=$key[jumlah_bimbingan] > </input>
                                                      </form>
                                                    </td>
                                              <td align='center' valign='middle'>";
                                            if("$key[nim]" != $_SESSION['nim'])
                                            {
                                             echo " 
                                             <form method='POST' action='Bimbingan1.php'>
                                                    <input name='nim' type='text' value=$key[nim] hidden></input>
                                                        <input type='submit' class='btn btn-success' value='tambah Konsultasi' disabled> </input>
                                                    </form>
                                                  </td>

                                            </tr>
                                            ";
                                            }
                                            else
                                            {
                                            echo " 
                                             <form method='POST' action='Bimbingan1.php'>
                                                    <input name='nim' type='text' value=$key[nim] hidden></input>
                                                        <input type='submit' class='btn btn-success' value='tambah Konsultasi' > </input>
                                                    </form>
                                                  </td>

                                            </tr>
                                            "; 
                                            }
                                          
                                          }
                                          
                                        }
                                    echo '
                                
                                </table>
                      
                              <div align="left" class="ml-5">
                              ket : <br>  <BR>
                              HIJAU = SKRIPSI<br>
                              BIRU  = METOPEN
                              </div>
                              ';              
                                  }
                                  else   // TAMPILAN UTAMA KETIKA MELIHAT FITUR BIMBINGAN SKRIPSI
                                  {
                                    echo '
                                <h2>Log Bimbingan Skripsi</h2>
                                <p>berikut merupakan dafar riwayat Konsultasi mahasiswa : </p>  

                       

                                <table cellpadding="15" class="bg-light" >
                                    <tr align="center" class="bg-primary" >
                                      <th >NAMA</th>
                                      <th >NIM</th>
                                      <th >DOSEN PEMBIMBING</th>
                                      <th >JUDUL SKRIPSI / METOPEN</th>
                                      <th >JUMLAH Konsultasi</th>
                                      <th colspan="2" >ACTION</th>
                                    </tr>


                                    ';
                                    

                                        $g = $car->jumlah_bimbingan_mahasiswa_10_perhalaman($batas_atas,$data_perhalaman); // untuk menampilkan daftar atau log bimbingan satu mahasiswa

                                        foreach($g as $key)
                                        {
                                          if("$key[model]"=="metopen")
                                          {
                                            echo"
                                            <tr align='center' valign='middle' class='border border-secondary'>
                                              <td>$key[name]</td>
                                              <td>$key[nim]</td>
                                              <td>$key[namdos]</td>
                                              <td>$key[judul]</td>
                                             
                                              <td align='center' valign='middle'>
                                                      <form method='POST' action='Bimbingan2.php'>
                                                      <input name='nim' type='text' value=$key[nim] hidden></input>
                                                          <input type='submit' class='btn btn-primary' value=$key[jumlah_bimbingan] > </input>
                                                      </form>
                                                    </td>
                                               <td valign='middle' align='center'>
                                               ";
                                              if("$key[nim]" != $_SESSION['nim'])
                                              {
                                               echo "
                                                <form method='POST' action='Bimbingan1.php'>
                                                  <input name='nim' type='text' value=$key[nim] hidden></input>
                                                  <input type='submit' class='btn btn-primary' value='tambah Konsultasi' disabled>
                                                </form>
                                                ";
                                              }
                                              else
                                              {
                                                echo "
                                                <form method='POST' action='Bimbingan1.php'>
                                                  <input name='nim' type='text' value=$key[nim] hidden></input>
                                                  <input type='submit' class='btn btn-primary' value='tambah Konsultasi' >
                                                </form>
                                                ";
                                              }
                                                echo "
                                                </td>

                                            </tr>
                                          ";
                                          }
                                          else
                                          {
                                            echo"
                                            <tr align='center' class='border-primary'>
                                              <td>$key[name]</td>
                                              <td>$key[nim]</td>
                                              <td>$key[namdos]</td>
                                              <td>$key[judul]</td>

                                              <td align='center' valign='middle'>
                                                      <form method='POST' action='Bimbingan2.php'>
                                                      <input name='nim' type='text' value=$key[nim] hidden></input>
                                                          <input type='submit' class='btn btn-success' value=$key[jumlah_bimbingan] > </input>
                                                      </form>
                                                    </td>
                                              <td class = 'align-middle'>";
                                              if("$key[nim]" != $_SESSION['nim'])
                                              {
                                              echo "
                                                <form method='POST' action='Bimbingan1.php'>
                                                  <input name='nim' type='text' value=$key[nim] hidden></input>
                                                  <input type='submit' class='btn btn-success' value='tambah Konsultasi' disabled> </input>
                                                </form>
                                                ";
                                              }
                                              else
                                              {
                                                echo "
                                                <form method='POST' action='Bimbingan1.php'>
                                                  <input name='nim' type='text' value=$key[nim] hidden></input>
                                                  <input type='submit' class='btn btn-success' value='tambah Konsultasi' > </input>
                                                </form>
                                                ";
                                              }
                                                echo "
                                              </td>

                                            </tr>
                                          ";
                                          }
                                          echo '

                                          <div class="fixed-bottom bg-light"> PAGE';
                            for($i=1;$i<=$total_halaman; $i++)
                            {
                              if($i == $page)
                              echo ' <a class="btn btn-outline-primary ml-1 mr-1 mt-1 mb-1 active" href="Bimbingan1.php?page='.$i.'">'.$i.'</a>';
                              else
                              echo ' <a class="btn btn-outline-primary ml-1 mr-1 mt-1 mb-1" href="Bimbingan1.php?page='.$i.'">'.$i.'</a>';

                            }
                         echo '
                        PAGE</div>';

                                          
                                        }
                                    echo '

                                </table>
                      
                            <div align="left" class="ml-5">
                              ket. tombol : <br>  <BR>
                              HIJAU = SKRIPSI<br>
                              BIRU  = METOPEN
                            </div>
                              ';
                                  }
                              ?>
                        
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
