<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Seminar Proposal.xls");
?>

    <table border="0" width="100%" height="100%" align="center">
     <tr><td colspan="3"><br></td></tr>
     <tr>
      <td width="25%" rowspan="2"></td>
      <td width="50%">
        <table cellpadding="30" width="100%" border="0" height="100%">
         <tr><td>
          <h2 align="center">DATA SEMINAR PROPOSAL</h2>
            <?php
              require_once('../fungsi_semprop.php');
              $akses = new Seminar_Proposal();
              $akses->koneksi();
              $sql=$akses->HitungJumlahMahasiswaLulusSemprop();
              $query=$akses->HitungJumlahMahasiswaTidakLulusSemprop();
              $key=mysqli_fetch_array($sql);
              $kunci=mysqli_fetch_array($query);
              echo "<b>Jumlah Mahasiswa Lulus : ".$key['lulus']."</b> <br>";
              echo "<b>Jumlah Mahasiswa Tidak Lulus : ".$kunci['tidak_lulus']."</b>";
            ?>
      <br>


        <table border="1">
          <tr align="center">
          <th>Nim</th>
          <th>Nama</th>
          <th>Tanggal ujian</th>
          <th>Nilai Proses Bimbingan</th>
          <th>Nilai Ujian Pembimbing</th>
          <th>Nilai Ujian Penguji</th>
           <th>Rata-Rata</th>
      <th>Grade</th>
          <th>Status</th>
    </tr>

    <?php     
      foreach ($akses->LihatPengumumanNilaiDanStatusSemuaMahasiswa() as $key) {
  $rata_rata=round(($key['nilai_proses_pembimbing']+$key['nilai_ujian_pembimbing']+$key['nilai_ujian_penguji'])/3,2);
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
        echo"
        <tr>
          <td align='center'>$key[nim]</td>
          <td align='center'>$key[nama_mhs]</td>
          <td align='center'>$key[tanggal]</td>
          <td align='center'>$key[nilai_proses_pembimbing]</td>
           <td align='center'>$key[nilai_ujian_pembimbing]</td>
            <td align='center'>$key[nilai_ujian_penguji]</td>
            <td align='center'>$rata_rata</td>
          <td align='center'>$grade</td>
          <td align='center'>$key[status]</td>
          </tr>    
        ";
    }    
      ?>
    </table>
    </center>
    </td>
    </tr>
    </table>
    </td>
    <td width="25%" rowspan="2"></td>
    </tr>
    </table>
</body>
</html>