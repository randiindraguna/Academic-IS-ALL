
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

     <script type="text/javascript" src="../mahasiswa/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="../mahasiswa/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../mahasiswa/sweetalert2/dist/sweetalert2.min.css">
</head>
<body>
    <?php
  
  if(isset($_POST['submit11'])){


      $nim = $_POST['nim'];
                  echo "
                 <br>
 <table align='center' cellpadding='20' width='65%' border='0'  height='10%'>
                                    <tr>
                                        <td bgcolor='#B5B5B5' style='width: 100%;height: 100%;border-radius: 20px;padding-top: 20px;padding-bottom: 20px;box-shadow: 0px 0px 5px 2px lightblue'>
                                   
                                             <center><h3>Form Input Nilai Pendadaran</h3></center>
                 
        <form action='hasil_input_PD_diadmin.php' method='POST'>

        
                  ";

                  $hasil = $akses->CariDataMahasiswaBerdasarkanNimpd($nim);

                  $kosong = mysqli_num_rows($hasil);
                  $ada = mysqli_num_rows($akses->ujianpendadaran($nim));





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
                        location.href='cari_mahasiswai_pendadaran.php'
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
                        location.href='cari_mahasiswai_pendadaran.php'
                      }
                      })
                    </script>
                    ";
                    }
                    else {

              

      foreach ($akses->CariDataMahasiswaBerdasarkanNimpd($nim) as $key) {
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

  
         
  ";
  # code...

                        foreach($akses->getDosenPenguji1($key['id_jadwal']) as $data1){
                          echo "
                 
                          <input name='penguji' value='$data1[nama_dosen]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
                         
                          ";
                        }
                        foreach($akses->getDosenPenguji2($key['id_jadwal']) as $data1){
                          echo "
                          <label for='formGroupExampleInput'>PENGUJI 2 </label>
                          <input name='penguji' value='$data1[nama_dosen]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
                         
                          ";
                        }

                        echo "
 
       
       
         <label for='formGroupExampleInput'>JUDUL SKRIPSI </label>
    <input name='pembimbing' value='$key[topik]' type='textbox' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
     <label for='formGroupExampleInput'>TANGGAL UJIAN </label>
    <input name='pembimbing' value='$key[tanggal]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>


        <label for='formGroupExampleInput'>NILAI PENGUJI 1 </label><input type='number' min='0' max='100' name='nilai_penguji_1' class='form-control' aria-label='Text input with checkbox' required='nilai_penguji_1' pattern='[0-9]+' placeholder='Masukkan Angka'> 
         <label for='formGroupExampleInput'>NILAI PENGUJI 2 </label><input type='number' min='0' max='100' name='nilai_penguji_2' class='form-control' aria-label='Text input with checkbox'  required='nilai_ujian_pembimbing' pattern='[0-9]+' placeholder='Masukkan Angka'>
          <label for='formGroupExampleInput'>NILAI PEMBIMBING </label><input type='number' min='0' max='100' name='nilai_pembimbing' class='form-control' aria-label='Text input with checkbox' required='nilai_pembimbing' pattern='[0-9]+' placeholder='Masukkan Angka'>
       

        <br>   <input type='submit' name='simpan1' value='Simpan' class='btn btn-outline-primary my-2 my-sm-0'>    
         </div>

        </form>
        
        </td>
        </tr>
        </table>

        ";
        


      }
    }
  }
      ?>
      </body>
      </html>


<?php include '../templates/footer_Penjadwalan.php' ?>
