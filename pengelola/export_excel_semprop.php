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
          <th>Nilai Proses pembimbing</th>
          <th>Nilai ujian pembimbing</th>
          <th>Nilai ujian penguji</th>
          <th>Status</th>
    </tr>

    <?php     
      foreach ($akses->LihatPengumumanNilaiDanStatusSemuaMahasiswa() as $key) {
        echo"
        <tr>
          <td align='center'>$key[nim]</td>
          <td align='center'>$key[nama_mhs]</td>
          <td align='center'>$key[tanggal]</td>
          <td align='center'>$key[nilai_proses_pembimbing]</td>
           <td align='center'>$key[nilai_ujian_pembimbing]</td>
            <td align='center'>$key[nilai_ujian_penguji]</td>
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