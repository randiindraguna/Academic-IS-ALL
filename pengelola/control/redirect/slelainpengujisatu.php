<?php
?>
<?php
    include '../Class_penjadwalan.php';
    $data=$_GET['data'];
    $P = new Penjadwalan();
    $P->connect();
    //echo $nim
    $hasil=$P->getAllDosenKecualiSatuDosen($data);
    var_dump($hasil);
?>
<?php foreach ($hasil as $key ) {?>
<option value="<?=$key['niy']?>"><?=$key['nama_dosen']?></option>
<?php } ?>