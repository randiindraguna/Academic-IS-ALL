<?php
	include '../Db_bimbingan/Database.php';
    $benar = True;
 if(isset($_GET['jenis'])){
    $jenis = $_GET['jenis'];
    $nim = $_GET['nim'];
 }

foreach ($car->getHeaderLogbimbingan($nim) as $key) {
    # code...

//$cek = mysqli_num_rows($car->select_one_mahasiswa($nim));
$i=0;


 echo"
    <html>

    <head>
    <!-- Bootstrap CSS -->
    <link rel=stylesheet href=https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css integrity=sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm crossorigin=anonymous>
 	<style>
.tablex, .tdx, .trx {
  border: 1px solid black;
}
.paddingpengesahan{

  margin-top: 500px;
  margin-left: 450px;
}
.padding{

  margin-top: 200px;
  margin-left: 450px;
}

#cl {
	background-color: #DCDCDC;
}
.tablex {
  border-collapse: collapse;
  width: 100%;
}

.trx {
  height: 50px;
}
</style>
 	</head>
 	<body onLoad=window.print()>   <!-- FUGSI JAVASCRIPT YANG DI GUNAKAN UNTUK MENCETAK (PRINT) -->

<table width=100% border=0>
<tr>
<td width=10%></td>
<td width=80%>";

    echo"	<table  border=0 cellpadding=5>
    	<tr>
    	<center>
    	<h3>Log Bimbingan Skripsi</h3>
    	</center>
    	</tr>
    	<tr>
    	<td>Nama Mahasiswa</td><td>:<td>$key[nama]</td> 
    	</tr>
    	<tr>
 	   <td>Nomer Induk Mahasiswa</td><td>:<td>$key[nim]</td> 
    	</tr>
    	<tr>
    	<td>Dosen Pembimbing</td><td>:<td>$key[namdos]</td> 
    	</tr>
    	</table>

      <br>

    	<table class=tablex cellpadding=5>
    	<tr class=trx align=center id=cl>
    		<td rowspan=2 class=tdx>No.</td>
    		<td rowspan=2 class=tdx>Materi Bimbingan</td>
    		<td colspan=2 class=tdx>Waktu Bimbingan</td>
        <td rowspan=2>ttd</td>
    	</tr>
    	<tr class=trx align=center id=cl>
    		<td class=tdx>Tanggal</td>
    		<td class=tdx>Jam mulai</td>
    	</tr>
    	";
    }
        // else {
        //     echo"
        //         Uppss anda belum bimbingan.....
        //     ";
        // }

$count = mysqli_num_rows($car->select_one_mahasiswa($nim));

if($count == 0)
{
    echo "<tr><td colspan='4' align='center'>tidak ada data bimbingan</td></tr>";
}
else
{
  foreach ($car->select_one_mahasiswa($nim) as $data)
{
   if("$data[model]"==$jenis){
    $i = $i +1;
        echo"
                <tr class=trx>
                    <td class=tdx align=center>$i</td>
                    <td class=tdx align=center>$data[materi_bimbingan]</td>
                    <td class=tdx align=center>$data[tanggal_bimbingan]</td>
                    <td class=tdx align=center>$data[jam]</td>
                    <td class=tdx></td>
                </tr>";

   }
}
}
  // foreach ($car->select_one_mahasiswa($nim) as $data) {
  // 	$i=$i+1;
  //   if($jenis==$data['model']){
  //   	echo"
  //   			<tr class=trx>
  //   				<td class=tdx>$i</td>
  //   				<td class=tdx>$data[materi_bimbingan]</td>
  //   				<td class=tdx>$data[tanggal_bimbingan]</td>
  //   				<td class=tdx>$data[jam]</td>
  //   			</tr>";
  //           }
  //           else echo"Upss terjadi kesalahan..."; break;
  //   }  
     echo"</table>
</td>
<td width=10%></td>
</tr>
</table>





<div class='container paddingpengesahan'>
  <div align='center'>
  Mengetahui, <br>
  Dosen Pembimbing
  </div>
</div>

<div class='container padding'> 
  <div align=center>
    $key[namdos]<br>
    $key[niy]
  </div>
</div>
     	</body>
    			</html>";
?>