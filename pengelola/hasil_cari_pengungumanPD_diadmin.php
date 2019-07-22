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


<?php
  
  
  if(isset($_POST['submit2'])){


    
      $nim = $_POST['nim'];

      echo "
 <br>
 <table align='center' cellpadding='20' width='65%' border='0'  height='10%'>
                                    <tr>
                                        <td bgcolor='#B5B5B5' style='width: 100%;height: 100%;border-radius: 20px;padding-top: 20px;padding-bottom: 20px;box-shadow: 0px 0px 5px 2px lightblue'>
                                   
                                             <center><h3>Data Mahasiswa</h3></center>


      ";
                
                $hasil = $akses->CariMahasiswaBerdasarkanNimPadaPengumumanHasilPendadaran($nim);
                 $kosong = mysqli_num_rows($hasil);
                 if(!$kosong)
                  {
                    echo "
                      <script type='text/javascript'>
                    Swal.fire({
                      position: 'middle',
                      type: 'error',
                      title: 'Data Tidak Ditemukan !!!',
                      showConfirmButton: true,
                      confirmButtonColor: '#3085d6',
                      confirmButtonText: 'Kembali'

                    }).then((result) => {
                      if(result.value){
                        location.href='data_pendadaran_diadmin.php'
                      }
                      })
                    </script>
                    ";
                    
                  }

                

      foreach ($akses->CariMahasiswaBerdasarkanNimPadaPengumumanHasilPendadaran($nim) as $key) {
          # code...
        
        
        echo"
        <br>
        <table align='center'>
        <tr>
        <td width='700px'>

  <div class='form-group'>
    <label for='formGroupExampleInput'>Nim </label>
    <input name='nim' value='$key[nim]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input' align='center'>
    <label for='formGroupExampleInput'>Nama </label>
    <input name='nama' value='$key[nama_mhs]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>Judul Skripsi </label>
     <input name='nama' value='$key[topik]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>Nilai penguji 1 </label>
    <input name='nama' value='$key[nilai_penguji_1]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>Nilai penguji 2 </label>
    <input name='nama' value='$key[nilai_penguji_2]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>Nilai Pembimbing </label>
    <input name='nama' value='$key[nilai_pembimbing]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>Status </label>
    <input name='nama' value='$key[status]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
 </div>
 <br>
    <tr>
<td>
    <a href='update_pendadaran_diadmin.php?nim=$key[nim]' class='btn btn-outline-primary' role='button' aria-pressed='true'>EDIT</a>
<a href='delete_pendadaran_diadmin.php?nim=$key[nim]' class='btn btn-outline-primary' role='button' aria-pressed='true'>DELETE</a></td>
</tr>
    

 
  
        </td>
        </tr>
        </table>
        ";
        


      }
    }
      ?>
<?php include '../templates/footer_Penjadwalan.php' ?>


