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

<?php
    $nim = $_POST['nim'];
    $status = $_POST['status'];
    $nilai_pg = $_POST['nilai_penguji_1'];    
    $nilai_pgg = $_POST['nilai_penguji_2'];
    $nilai_pbb = $_POST['nilai_pembimbing'];

      $akses->UpdateNilaiDanStatusPendadaran1($nim,$status,$nilai_pg,$nilai_pgg,$nilai_pbb);
?>

    <br>

    <h2 align="center">DATA UJIAN PENDADARAN</h2>
<br>
<table align="center">
<form name="pencarian" method="POST" action = "hasil_cari_pengungumanPD_diadmin.php" ">            
      
                    <tr> <td>
                    <input type="text" placeholder="masukan nim" name="nim" title ="masukan nim" class="form-control">  
                    </td>
                    <td>
                    <button id="submit2" name="submit2" class='butn butn2 ml-2'>cari</button></td>
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


 <table border='1' align='center' width='80%'' height='30%'>
    <tr align='center' bgcolor='#D3D3D3'>
      <th height='50'>Nim</th>
      <th height='50' >Nama</th>
      <th height='50'>Nilai Penguji 1</th>
       <th height='50'>Nilai Penguji 2</th>
        <th height='50'>Nilai Pembimbing</th>
      <th height='50'>Status</th>
      <th height='50'>Action</th>
    </tr>


<?php
    
 foreach ($akses->LihatPengumumanNilaiDanStatusSemuaMahasiswaPendadaran() as $key) {


        
        echo "
            
       


       
       
        

        <tr>
          <td align='center'>$key[nim]</td>
          <td align='center'>$key[nama_mhs]</td>
          <td align='center'>$key[nilai_penguji_1]</td>
           <td align='center'>$key[nilai_penguji_2]</td>
            <td align='center'>$key[nilai_pembimbing]</td>
          <td align='center'>$key[status]</td>
          <td align='center'><a href='update_pendadaran_diadmin.php?nim=$key[nim]' role='button' class='btn btn-outline-primary'>UPDATE</a>
          <a href='delete_pendadaran_diadmin.php?nim=$key[nim]' role='button' class='btn btn-outline-primary'>DELETE</a></td>
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
