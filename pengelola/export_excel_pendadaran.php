<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Ujian Pendadaran.xls");
?>

    <table border="0" width="100%" height="100%" align="center">
     <tr><td colspan="3"><br></td></tr>
     <tr>
      <td width="25%" rowspan="2"></td>
      <td width="50%">
        <table cellpadding="30" width="100%" border="0" height="100%">
         <tr><td>
          <h2 align="center">DATA UJIAN PENDADARAN</h2>
            <?php
              require_once('../fungsi_pendadaran.php');
              $akses = new ujian_pendadaran();
              $akses->koneksi();
              $sql=$akses->HitungJumlahMahasiswaLuluspendadaran();
              $query=$akses->HitungJumlahMahasiswaTidakLuluspendadaran();
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
          <th>Nilai Penguji 1</th>
          <th>Nilai Penguji 2</th>
          <th>Nilai Nilai Penguji Pembimbing</th>
          <th>Status</th>
    </tr>

    <?php     
      foreach ($akses->LihatPengumumanNilaiDanStatusSemuaMahasiswaPendadaran() as $key) {
        echo"
        <tr>
          <td align='center'>$key[nim]</td>
          <td align='center'>$key[nama_mhs]</td>
          <td align='center'>$key[tanggal]</td>
          <td align='center'>$key[nilai_penguji_1]</td>
          <td align='center'>$key[nilai_penguji_2]</td>
          <td align='center'>$key[nilai_pembimbing]</td>
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