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
   <?php include '../templates/header_Penjadwalan.php' ?>
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


     <script type="text/javascript" src="../mahasiswa/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="../mahasiswa/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../mahasiswa/sweetalert2/dist/sweetalert2.min.css">
</head>
<body>

  
                               
                              <br>
                              <table align="center" cellpadding="20" width="65%" border="0"  height="10%">
                                    <tr>
                                        <td bgcolor="#B5B5B5" style="width: 100%;height: 100%;border-radius: 20px;padding-top: 20px;padding-bottom: 20px;box-shadow: 0px 0px 5px 2px lightblue">
                                   
                                             <center><h3>Form Input Nilai Seminar Proposal</h3></center>

    <?php
  
  if(isset($_POST['submit'])){


      $nim = $_POST['nim'];
                  echo "
                 

                 
        <form action='hasil_input_semprop_diadmin.php' method='POST'>

        
                  ";
                  $hasil = $akses->CariDataMahasiswaBerdasarkanNim($nim);

                  $kosong = mysqli_num_rows($hasil);
                  $ada = mysqli_num_rows($akses->seminarproposal($nim));
                  if(!$kosong)
                  {
                    echo "
                      <script type='text/javascript'>
                    Swal.fire({
                      position: 'middle',
                      type: 'error',
                      title: 'Nim Tidak Terdaftar',
                      showConfirmButton: true,
                      confirmButtonColor: '#3085d6',
                      confirmButtonText: 'Kembali'

                    }).then((result) => {
                      if(result.value){
                        location.href='pencarian_mahasiswa_diadmin.php'
                      }
                      })
                    </script>
                    ";
                    
                  }
                  if ($ada){
                      echo "
                      <script type='text/javascript'>
                    Swal.fire({
                      position: 'middle',
                      type: 'error',
                      title: 'Nilai Sudah Diinputkan',
                      showConfirmButton: true,
                      confirmButtonColor: '#3085d6',
                      confirmButtonText: 'Kembali'

                    }).then((result) => {
                      if(result.value){
                        location.href='pencarian_mahasiswa_diadmin.php'
                      }
                      })
                    </script>
                    ";
                    }
                    else {

                    
      foreach ($akses->CariDataMahasiswaBerdasarkanNim($nim) as $key) {
          # code...
        
        
        echo"
        <br>
        <table align='center'>
        <tr>
        <td width='700px'>

  <div class='form-group'>
    <label for='formGroupExampleInput'>NIM </label>
    <input name='nim' value='$key[nim]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>NAMA </label>
    <input name='nama' value='$key[nama_mhs]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>PEMBIMBING </label>
    <input name='pembimbing' value='$key[nama_dsn]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
   <label for='formGroupExampleInput'>PENGUJI </label>

  ";
  # code...

                        foreach($akses->getDosenPenguji($key['id_jadwal']) as $data1){
                          echo "

                          <input name='penguji' value='$data1[nama_dosen]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
                         
                          ";
                        }

                        echo "
        <label for='formGroupExampleInput'>NILAI PROSES BIMBINGAN </label><input type='number' min='0' max='100' name='nilai_proses_pembimbing' class='form-control' aria-label='Text input with checkbox' required='nilai_proses_pembimbing' pattern='[0-9]+' placeholder='Masukan Nilai Angka'> 
         <label for='formGroupExampleInput'>NILAI UJIAN PEMBIMBING </label><input type='number' min='0' max='100' name='nilai_ujian_pembimbing' class='form-control' aria-label='Text input with checkbox'  required='nilai_ujian_pembimbing' pattern='[0-9]+' placeholder='Masukan Nilai Angka'>
          <label for='formGroupExampleInput'>NILAI UJIAN PENGUJI </label><input type='number' min='0' max='100' name='nilai_ujian_penguji' class='form-control' aria-label='Text input with checkbox' required='nilai_ujian_penguji' pattern='[0-9]+' placeholder='Masukan Nilai Angka'>
       
        
        <br>   <input type='submit' name='simpan' value='Simpan' class='btn btn-outline-primary my-2 my-sm-0'>    
        

        </form>
        </td>
        </tr>
        </table>
        ";
        


      }
    }
  }
      ?>

        </td>
                                    </tr>
                            </table>


<?php include '../templates/footer_Penjadwalan.php' ?>
