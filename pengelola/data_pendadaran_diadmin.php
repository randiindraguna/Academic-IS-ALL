<?php include '../templates/header_Penjadwalan.php' ?>
<?php

    //membutuhkan file fungsi_semprop
    require('../fungsi_pendadaran.php');

    //instansiasi objek class Seminar_Proposal
    $akses = new ujian_pendadaran();
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
<body>
  <br>
  
                              <table align="center" cellpadding="10" width="95%" border="0"  height="10%">
                                    <tr>
                                        <td bgcolor="#B5B5B5" style="width: 100%;height: 100%;border-radius: 20px;padding-top: 20px;padding-bottom: 20px;box-shadow: 0px 0px 5px 2px lightblue">
                                   
                                             <center><h3>Data Pendadaran</h3></center>
   
<table align="center">
<form name="pencarian" method="POST" action = "hasil_cari_pengungumanPD_diadmin.php">            
      <br>
                    <tr> <td>
                    <input type="text" placeholder="Masukan NIM" name="nim" pattern="[0-9]+" title ="Masukan NIM" class="form-control" required>  
                    </td>
                    <td>
                    <button id="submit2" name="submit2" class='butn butn2 ml-2'>Cari</button></td>
                   </tr>

          </form>
        </table>
    

<?php
      foreach ($akses->HitungJumlahMahasiswaLuluspendadaran() as $key) {
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
      foreach ($akses->HitungJumlahMahasiswaTidakLuluspendadaran() as $key) {
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


       <table width='90%'>
        <th>
          <td align='right' > <a target="_blank" href="export_excel_pendadaran.php" class='btn btn-outline-success my-2 my-sm-0'>Export Data Ke Excel</a><br></td>
          
          </th>
      </table>

      <br><br>


         <table align='center' width='80%'' height='30%'  class='table table-striped'>
    <tr align='center' bgcolor='#D3D3D3'>
      <th height='50'>Nim</th>
      <th height='50' >Nama</th>
      <th height='50'>Nilai Penguji 1</th>
       <th height='50'>Nilai Penguji 2</th>
        <th height='50'>Nilai Pembimbing</th>
        <th height='50'>Rata-rata</th>
          <th height='50'>Grade</th>
      <th height='50'>Status</th>
      <th height='50'>Action</th>
    </tr>


<?php
    
 foreach ($akses->LihatPengumumanNilaiDanStatusSemuaMahasiswaPendadaran() as $key) {

#DIBUAT OLHE IBRAHIM
  $rata_rata=round(($key['nilai_penguji_1']+$key['nilai_penguji_2']+$key['nilai_pembimbing'])/3);
    if($rata_rata>-1 && $rata_rata<=1) $grade='E';
  else if($rata_rata>0 && $rata_rata<=40) $grade='D';
  else if($rata_rata>40 && $rata_rata<=43.75) $grade='D+';
  else if($rata_rata>43.75 && $rata_rata<=51.25) $grade='C-';
  else if($rata_rata>51.25 && $rata_rata<=55) $grade='C';
  else if($rata_rata>55 && $rata_rata<=57.5) $grade='C+';
  else if($rata_rata>57.5 && $rata_rata<=62.5) $grade='B-';
  else if($rata_rata>62.5 && $rata_rata<=65) $grade='B';
  else if($rata_rata>65 && $rata_rata<=68.75) $grade='B+';
  else if($rata_rata>68.75 && $rata_rata<=76.25) $grade='A-';
  else if($rata_rata>76.25 && $rata_rata<=100) $grade='A';
  else $grade='nilai tidak tersedia'; 

  if($rata_rata>51.25) $status='lulus';
  else($status='tidak_lulus')  ;  
        
        echo "
            
       


       
       
        //diedit oleh ibrahim

        <tr>
          <td align='center'>$key[nim]</td>
          <td align='center'>$key[nama_mhs]</td>
          <td align='center'>$key[nilai_penguji_1]</td>
           <td align='center'>$key[nilai_penguji_2]</td>
            <td align='center'>$key[nilai_pembimbing]</td>
            <td align='center'>$rata_rata</td>
          <td align='center'>$grade</td>
          <td align='center'>$key[status]</td>
          <td align='center'><a href='update_pendadaran_diadmin.php?nim=$key[nim]' role='button' class='btn btn-outline-primary'>EDIT</a>
          <a href='delete_pendadaran_diadmin.php?nim=$key[nim]' role='button' class='btn btn-outline-primary' onclick='if(!confirm(`apakah anda yakin?`)){return false}'>DELETE</a></td> //brtanya apakah yakin delet?
          </tr>
         
        ";


      
    }


        
      ?>

    </table>

<?php include '../templates/footer_Penjadwalan.php' ?>