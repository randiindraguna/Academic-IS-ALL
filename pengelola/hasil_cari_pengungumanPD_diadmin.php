<?php include 'templates/header_Penjadwalan.php' ?>

<?php

	//membutuhkan file fungsi_semprop
	require('fungsi_pendadaran.php');

	//instansiasi objek class Seminar_Proposal
	$akses = new ujian_pendadaran();
	$akses->koneksi();

?>
<?php include 'templates/navbar_admin.html' ?>

<?php
  
  
  if(isset($_POST['submit2'])){


    
      $nim = $_POST['nim'];
                
                

      foreach ($akses->CariMahasiswaBerdasarkanNimPadaPengumumanHasilPendadaran($nim) as $key) {
          # code...
        
        
        echo"
        <br>
        <h2 align='center'>Data Mahasiswa</h2>
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
     <input name='nama' value='$key[judul_skripsi]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>Nilai Proses Pembimbing </label>
    <label for='formGroupExampleInput'>Tanggal Ujian </label>
     <input name='nama' value='$key[tanggal]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
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
    <a href='update_pendadaran_diadmin.php?nim=$key[nim]' class='btn btn-outline-primary' role='button' aria-pressed='true'>UPDATE</a>
<a href='delete_pendadaran_diadmin.php?nim=$key[nim]' class='btn btn-outline-primary' role='button' aria-pressed='true'>DELETE</a></td>
</tr>
    

 
  
        </td>
        </tr>
        </table>
        ";
        


      }
    }
      ?>
<?php include 'templates/footer_Penjadwalan.php' ?>


