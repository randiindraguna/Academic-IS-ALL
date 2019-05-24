<?php
	include 'Database.php';
	 $car = new Database();
    $car->connect();
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
 	<style>
.tablex, .tdx, .trx {
  border: 1px solid black;
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

    echo"	<table  border=0>
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

    	<table class=tablex>
    	<tr class=trx align=center id=cl>
    		<td rowspan=2 class=tdx>No.</td>
    		<td rowspan=2 class=tdx>Materi Bimbingan</td>
    		<td colspan=2 class=tdx>Waktu Bimbingan</td>
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
                    <td class=tdx>$i</td>
                    <td class=tdx>$data[materi_bimbingan]</td>
                    <td class=tdx>$data[tanggal_bimbingan]</td>
                    <td class=tdx>$data[jam]</td>
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
     	</body>
    			</html>";
?>