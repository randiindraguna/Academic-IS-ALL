
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

     <script type='text/javascript'>
                    Swal.fire({
                      position: 'middle',
                      type: 'success',
                      title: 'Berhasil Dihapus',
                      showConfirmButton: true,
                      confirmButtonColor: '#3085d6',
                      confirmButtonText: 'Kembali'

                    }).then((result) => {
                      if(result.value){
                        location.href='data_pendadaran_diadmin.php'
                      }
                      })
                    </script>";
</head>

<?php

$nim=$_GET['nim'];

$akses->DeleteDataPendadaran($nim);



       
      ?>
<?php include '../templates/footer_Penjadwalan.php' ?>


