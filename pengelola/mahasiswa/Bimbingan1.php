<?php  
  session_start();
  if(isset($_SESSION['username'])){
  $nim = $_SESSION['username'];
  $abc = array();
  $abc[0] = $nim;
}
  include '../Db_bimbingan/database.php';
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
include '../header_bimbingan_biarngga_hilang/navbar_mhs2_bimbingan.php';
?>


<table width="100%" height="100%" class="bg-light bodyBG">

  <tr align="center">

    <td rowspan="" class="pt-4 pb-4">
      <div  class="kotak container" >
        <?php include'Bimbingan1.1.php';?>
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
