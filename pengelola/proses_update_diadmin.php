<?php include '../templates/header_Penjadwalan.php' ?>
<?php

	//membutuhkan file fungsi_semprop
	require('../fungsi_semprop.php');

	//instansiasi objek class Seminar_Proposal
	$akses = new Seminar_Proposal();
	$akses->koneksi();

   session_start();
if($_SESSION['status'] == "login"){
  // menampilkan pesan selamat datang
  //echo "Hai, selamat datang ". $_SESSION['username'];
}else{
  header("location:../index.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../templates/navbar_admin.html' ?>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- /\ambil css penjadwalan -->
    <!-- Tambahan CSS -->
    <link rel="stylesheet" href="../css/style_penjadwalan.css">
    <link rel="stylesheet" href="../css/switches_Penjadwalan.css">

    <style type="text/css" href="../css/tombol_penjadwalan.css"></style>
</head>
<?php
 $id_s = $_POST['nim'];
    $nilai_pb = $_POST['nilai_proses_pembimbing'];
    $status = $_POST['status'];
    $nilai_ub = $_POST['nilai_ujian_pembimbing'];
    $nilai_up = $_POST['nilai_ujian_penguji'];

      $akses->UpdateNilaiDanStatusSemprop1($nilai_pb,$status,$id_s,$nilai_ub,$nilai_up);
?>

    <br>

    <h2 align="center">DATA SEMINAR PROPOSAL</h2>
<br>
<table align="center">
<form name="pencarian" method="POST" action = "hasil_cari_pengunguman_diadmin.php" ">            
      
                    <tr> <td>
                    <input type="text" placeholder="masukan nim" name="nim" title ="masukan nim" class="form-control">  
                    </td>
                    <td>
                    <button id="submit2" name="submit2" class='butn butn2 ml-2'>cari</button></td>
                   </tr>

          </form>
        </table>
    
<?php
      foreach ($akses->HitungJumlahMahasiswaLulusSemprop() as $key) {
        echo"
      <table width='90%'>
        <th>
          <td align='right' > Jumlah yang lulus : $key[lulus]</td>
          
          </th>
      </table>
        ";


      
    }   
      ?>

<?php
      foreach ($akses->HitungJumlahMahasiswaTidakLulusSemprop() as $key) {
        echo"
      <table width='90%'>
        <th>
           <td align='right' > Jumlah yang tidak lulus : $key[tidak_lulus]</td>
          
          </th>
      </table>
        ";


      
    }

        
      ?>
      <br>







 <table border='1' align='center' width='80%'' height='30%'>
    <tr align='center' bgcolor='#D3D3D3'>
      <th height='50'>Nim</th>
      <th height='50' >Nama</th>
      <th height='50'>Nilai Proses pembimbing</th>
       <th height='50'>Nilai ujian pembimbing</th>
        <th height='50'>Nilai ujian penguji</th>
      <th height='50'>Status</th>
      <th height='50'>Action</th>
    </tr>


<?php
    
 foreach ($akses->LihatPengumumanNilaiDanStatusSemuaMahasiswa() as $key) {


        
        echo "
            
       


       
       
        

        <tr>
          <td align='center'>$key[nim]</td>
          <td align='center'>$key[nama_mhs]</td>
          <td align='center'>$key[nilai_proses_pembimbing]</td>
           <td align='center'>$key[nilai_ujian_pembimbing]</td>
            <td align='center'>$key[nilai_ujian_penguji]</td>
          <td align='center'>$key[status]</td>
          <td align='center'><a href='update_semrop_diadmin.php?nim=$key[nim]' role='button' class='btn btn-outline-primary'>UPDATE</a>
          <a href='delete_semprop_diadmin.php?nim=$key[nim]' role='button' class='btn btn-outline-primary'>DELETE</a></td>
          </tr>
         
        ";


      
    }

    


      ?>

<!DOCTYPE html>
<html>
<head>
  <title>javascript-- pesan</title>
  <script type="text/javascript">
    function pesan(){
      alert("DATA ANDA TELAH TERSIMPAN TERIMA KASIH")
    }
  </script>
</head> 
<body onload="pesan()">
  

</body>
</html>
 
<?php include '../templates/footer_Penjadwalan.php' ?>
