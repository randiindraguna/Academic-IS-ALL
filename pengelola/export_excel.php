	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Mahasiswa Metopen.xls");
	?>


    <table border="0" width="100%" height="100%" align="center">
      <tr><td colspan="3"><br></td></tr>
      <tr>
        <td width="25%" rowspan="2"></td>
        <td width="50%">
          <table cellpadding="30"width="100%" border="0"  height="100%">
            <tr>
              <td>
                <center><h3>Data Mahasiswa Metopen</h3>
                  <?php 
                    require_once('../database.php');
                    $akses = new Database();
                    $akses->connect();
                    $sql=$akses->getJumlahMhs();
                    $data=mysqli_fetch_array($sql);
                    echo "<b>Jumlah Mahasiswa : ".$data['jumlah_mahasiswa']."</b>";
                    ?>


          <table border="1">
            <tr align="center">
              <th>No</th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Semester</th>
              <th>Jenis Kelamin</th>
              <th>Topik</th>
              <th>Dosen</th>
              <th>Bidang Minat</th>
              <th>Status</th>
              <th>Tanggal Daftar</th>
            </tr>
            
            <?php 
            $i=1;
              foreach ($akses->getMhs() as $key) {
                echo "
                <tr>
                  <td>$i</td>
                  <td>$key[nim]</td>
                  <td>$key[nama]</td>
                  <td>$key[periode]</td>
                  <td>$key[jenis_kelamin]</td>
                  <td>$key[topik]</td>
                  <td>$key[namados]</td>
                  <td>$key[bidang_minat]</td>
                  <td>$key[status]</td>
                  <td>$key[tanggal_mulai]</td>
                </tr>
                ";
                $i=$i+1;
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
 
