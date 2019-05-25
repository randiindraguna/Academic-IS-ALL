<?php  
    include '../Class_penjadwalan.php';
    $P = new Penjadwalan();
    $P->connect();
    $semprop;$pendadaran;$data;
    if ($_GET['data']) {
        $data=$_GET['data'];
    }else{
        $data=0;
    }
    if($data=="Semprop"){
        $hasil=$P->getDataJadwalSeminarProposal();?>
<table class="table rounded">
    <table class="table rounded">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <!-- <th scope="col">ID Jadwal</th> -->
                <th scope="col">NIM</th>
                <th scope="col">Jenis Jadwal</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Waktu</th>
                <th scope="col">Ruang</th>
                <th scope="col">Dosen Penguji </th>
                <th scope="col">Status</th>
                <th scope="col" id="dosen4">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1;foreach ($hasil as $ambil) {?>
            <tr>
                <td class="text-left"><?=$i?></td>
                <!-- ID Jadwal -->
                <!-- <td></td> -->
                <!-- Jenis Ujian -->
                <td class="text-left"><?=$ambil['nim']?></td>
                <!-- Jenis Ujian -->
                <td class="text-left"><?=$ambil['jenis_ujian']?></td>
                <!-- Tanggal -->
                <td class="text-left"><?php
                                                    $tanggal=date("d M Y", strtotime($ambil['tanggal']));
                                                    echo $tanggal;
                                                    ?></td>
                <!-- Waktu -->
                <td class="text-left"><?php
                                                    $jam=$ambil['jam'];
                                                    if ($jam=="1"){
                                                        echo "07:00";
                                                    }else if($jam=="2"){    
                                                        echo "10:00";
                                                    }else if($jam=="3"){
                                                        echo "13:00";
                                                    }
                                                    ?>
                                                        <!-- Ruang -->
                                                    <td class="text-left"><?=$ambil['tempat']?></td>
                                                    <!-- Dosen -->
                                                    <?php
                                                    if($ambil['jenis_ujian'] == "SEMPROP"){
                                                        $ddp = $P->getDosenUjibyNiy($ambil['nim']);
                                                        foreach ($ddp as $key) {?>
                                                    <td class="text-left"><?=$key['nama_dosen']?></td>
                                                    <?php }?>
                                                    <?php
                                                    }else{
                                                        $ddp = $P->getDosenUjibyNiy($ambil['nim']);
                                                        foreach ($ddp as $key) {?>
                                                    <td class="text-left"><?=$key['nama_dosen']?></td>
                                                    <?php }
                                                    
                                                    }
                                                    ?>
                                                        <!-- Status Check -->
                                                        <?php
                                                    $wait = "---";
                                                    if($ambil['jenis_ujian']=="SEMPROP"){
                                                        $status = $P->getDataStatusSemprop($ambil['nim']);
                                                        $baris =  $P->hitung_row($status);
                                                        $baris = "$baris";
                                                        if($baris != 0 ){
                                                        foreach ($status as $key ) {
                                                            if ($key['status_sp']=="lulus") {                                                                
                                                                echo "<td class='text-success text-left'>$key[status_sp]</td>";
                                                            }else{
                                                                echo "<td class='text-danger text-left'>$key[status_sp]</td>";
                                                            }
                                                            $status_sp=$key['status_sp'];
                                                            $status_p=$status_sp;
                                                        }
                                                        }else if($baris=="0"){
                                                                echo " <td>$wait</td>";
                                                                $status_sp=$wait;
                                                                $status_p=$status_sp;                                                       
                                                        }
                                                    }else{
                                                        $status = $P->getDataStatusPendadaran($ambil['nim']);
                                                        $baris =  $P->hitung_row($status);
                                                        $baris = "$baris";
                                                        if($baris != 0 ){
                                                        foreach ($status as $key ) {
                                                            if ($key['status_up']=="lulus") {                                                                
                                                                echo "<td class='text-success text-left'>$key[status_up]</td>";
                                                            }else{
                                                                echo "<td class='text-danger text-left'>$key[status_up]</td>";
                                                            }
                                                            $status_up=$key['status_up'];
                                                            $status_p=$status_up;
                                                        }
                                                        }else if($baris=="0"){
                                                                echo " <td>$wait</td>";
                                                                $status_up=$wait;   
                                                                $status_p=$status_up;                                                    
                                                        }
                                                        }
                                                    
                                                    ?>
                <!-- Opsi -->
                <td>
                    <a class="modalku" href="" id="modalku" data-toggle="modal" data-target="#ModalUbah"
                        data-id="<?=$ambil['id_jadwal'].$status_p?>">Edit</a> |
                    <!-- <a href='UI_Form_edit_jadwal.php?id_jadwal=<?=$ambil['id_jadwal']?>'>Edit</a> | -->
                    <a href='UI_Penjadwalan_detail_admin.php?nim=<?=$ambil['nim']?>'>Detail</a>
                </td>
            </tr>
            <?php $i++;}?>
        </tbody>
    </table>
    <?php 
} else if ($data=="Pendadaran"||$data=="pendadaran") {
        $hasil=$P->getDataJadwalUjianPendadaran();?>
    <table class="table rounded">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <!-- <th scope="col">ID Jadwal</th> -->
                <th scope="col">NIM</th>
                <th scope="col">Jenis Jadwal</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Waktu</th>
                <th scope="col">Ruang</th>
                <th scope="col">Dosen Penguji </th>
                <th scope="col">Dosen Penguji 2</th>
                <th scope="col">Status</th>
                <th scope="col" id="dosen4">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1;foreach ($hasil as $ambil) {?>
            <tr>
                <td class="text-left"><?=$i?></td>
                <!-- ID Jadwal -->
                <!-- <td></td> -->
                <!-- Jenis Ujian -->
                <td class="text-left"><?=$ambil['nim']?></td>
                <!-- Jenis Ujian -->
                <td class="text-left"><?=$ambil['jenis_ujian']?></td>
                <!-- Tanggal -->
                <td class="text-left"><?php
                                                    $tanggal=date("d M Y", strtotime($ambil['tanggal']));
                                                    echo $tanggal;
                                                    ?></td>
                                                        <!-- Waktu -->
                                                        <td class="text-left"><?php
                                                    $jam=$ambil['jam'];
                                                    if ($jam=="1"){
                                                        echo "07:00";
                                                    }else if($jam=="2"){    
                                                        echo "10:00";
                                                    }else if($jam=="3"){
                                                        echo "13:00";
                                                    }
                                                    ?>
                                                        <!-- Ruang -->
                                                    <td class="text-left"><?=$ambil['tempat']?></td>
                                                    <!-- Dosen -->
                                                    <?php
                                                    if($ambil['jenis_ujian'] == "SEMPROP"){
                                                        $ddp = $P->getDosenUjibyNiy($ambil['nim']);
                                                        foreach ($ddp as $key) {?>
                                                        <td class="text-left"><?=$key['nama_dosen']?></td>
                                                        <?php }?>
                                                        <td>---</td>
                                                        <?php
                                                    }else{
                                                        $ddp = $P->getDosenUjibyNiy($ambil['nim']);
                                                        foreach ($ddp as $key) {?>
                                                        <td class="text-left"><?=$key['nama_dosen']?></td>
                                                        <?php }
                                                                                            
                                                                                            }
                                                                                            ?>
                                                        <!-- Status Check -->
                                                        <?php
                                                    $wait = "---";
                                                    if($ambil['jenis_ujian']=="UNDARAN"){
                                                        $status = $P->getDataStatusPendadaran($ambil['nim']);
                                                        $baris =  $P->hitung_row($status);
                                                        $baris = "$baris";
                                                        if($baris != 0 ){
                                                        foreach ($status as $key ) {
                                                            if ($key['status_up']=="lulus") {                                                                
                                                                echo "<td class='text-success text-left'>$key[status_up]</td>";
                                                            }else{
                                                                echo "<td class='text-danger text-left'>$key[status_up]</td>";
                                                            }
                                                            $status_up=$key['status_up'];
                                                            $status_p=$status_up;
                                                        }
                                                        }else if($baris=="0"){
                                                                echo " <td>$wait</td>";
                                                                $status_up=$status_up;                                                       
                                                        }
                                                    }else{
                                                        $status = $P->getDataStatusPendadaran($ambil['nim']);
                                                        $baris =  $P->hitung_row($status);
                                                        $baris = "$baris";
                                                        if($baris != 0 ){
                                                        foreach ($status as $key ) {
                                                            if ($key['status_up']=="lulus") {                                                                
                                                                echo "<td class='text-success text-left'>$key[status_up]</td>";
                                                            }else{
                                                                echo "<td class='text-danger text-left'>$key[status_up]</td>";
                                                            }
                                                            $status_up=$key['status_up'];
                                                            $status_p=$status_up;
                                                        }
                                                        }else if($baris=="0"){
                                                                echo " <td>$wait</td>";
                                                                $status_up=$wait;
                                                                $status_p=$status_up;                                                       
                                                        }
                                                        }
                                                    
                                                    ?>
                <!-- Opsi -->
                <td>
                    <a class="modalku" href="" id="modalku" data-toggle="modal" data-target="#ModalUbah"
                        data-id="<?=$ambil['id_jadwal'].$status_p?>">Edit</a> |
                    <!-- <a href='UI_Form_edit_jadwal.php?id_jadwal=<?=$ambil['id_jadwal']?>'>Edit</a> | -->
                    <a href='UI_Penjadwalan_detail_admin.php?nim=<?=$ambil['nim']?>'>Detail</a>
                </td>
            </tr>
            <?php $i++;}?>
        </tbody>
    </table>
    <?php
    }else if ($data=="all"||$data=="All") {
        $hasil=$P->getDataJadwal();
        ?>
    <table class="table rounded">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <!-- <th scope="col">ID Jadwal</th> -->
                <th scope="col">NIM</th>
                <th scope="col">Jenis Jadwal</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Waktu</th>
                <th scope="col">Ruang</th>
                <th scope="col">Dosen Penguji </th>
                <th scope="col">Dosen Penguji 2</th>
                <th scope="col">Status</th>
                <th scope="col" id="dosen4">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1;foreach ($hasil as $ambil) {?>
            <tr>
                <td class="text-left"><?=$i?></td>
                <!-- ID Jadwal -->
                <!-- <td></td> -->
                <!-- Jenis Ujian -->
                <td class="text-left"><?=$ambil['nim']?></td>
                <!-- Jenis Ujian -->
                <td class="text-left"><?=$ambil['jenis_ujian']?></td>
                <!-- Tanggal -->
                <td class="text-left"><?php
                                                    $tanggal=date("d M Y", strtotime($ambil['tanggal']));
                                                    echo $tanggal;
                                                    ?></td>
                <!-- Waktu -->
                <td class="text-left"><?php
                                                    $jam=$ambil['jam'];
                                                    if ($jam=="1"){
                                                        echo "07:00";
                                                    }else if($jam=="2"){    
                                                        echo "10:00";
                                                    }else if($jam=="3"){
                                                        echo "13:00";
                                                    }
                                                    ?>
                    <!-- Ruang -->
                <td class="text-left"><?=$ambil['tempat']?></td>
                <!-- Dosen -->
                <?php
                                                    if($ambil['jenis_ujian'] == "SEMPROP"){
                                                        $ddp = $P->getDosenUjibyNiy($ambil['nim']);
                                                        foreach ($ddp as $key) {?>
                <td class="text-left"><?=$key['nama_dosen']?></td>
                <?php }?>
                <td>---</td>
                <?php
                                                    }else{
                                                        $ddp = $P->getDosenUjibyNiy($ambil['nim']);
                                                        foreach ($ddp as $key) {?>
                <td class="text-left"><?=$key['nama_dosen']?></td>
                <?php }
                                                    
                                                    }
                                                    ?>
                <!-- Status Check -->
                <?php
                                                    $wait = "---";
                                                    if($ambil['jenis_ujian']=="SEMPROP"){
                                                        $status = $P->getDataStatusSemprop($ambil['nim']);
                                                        $baris =  $P->hitung_row($status);
                                                        $baris = "$baris";
                                                        if($baris != 0 ){
                                                        foreach ($status as $key ) {
                                                            if ($key['status_sp']=="lulus") {                                                                
                                                                echo "<td class='text-success text-left'>$key[status_sp]</td>";
                                                            }else{
                                                                echo "<td class='text-danger text-left'>$key[status_sp]</td>";
                                                            }
                                                            $status_sp=$key['status_sp'];
                                                            $status_p=$status_sp;
                                                        }
                                                        }else if($baris=="0"){
                                                                echo " <td>$wait</td>";
                                                                $status_sp=$wait;  
                                                                $status_p=$status_sp;                                                     
                                                        }
                                                    }else{
                                                        $status = $P->getDataStatusPendadaran($ambil['nim']);
                                                        $baris =  $P->hitung_row($status);
                                                        $baris = "$baris";
                                                        if($baris != 0 ){
                                                        foreach ($status as $key ) {
                                                            if ($key['status_up']=="lulus") {                                                                
                                                                echo "<td class='text-success text-left'>$key[status_up]</td>";
                                                            }else{
                                                                echo "<td class='text-danger text-left'>$key[status_up]</td>";
                                                            }
                                                            $status_up=$key['status_up'];
                                                            $status_p=$status_up;
                                                        }
                                                        }else if($baris=="0"){
                                                                echo " <td>$wait</td>";
                                                                $status_up=$wait;
                                                                $status_p=$status_up;                                                       
                                                        }
                                                        }
                                                    
                                                    ?>
                <!-- Opsi -->
                <td>
                    <a class="modalku" href="" id="modalku" data-toggle="modal" data-target="#ModalUbah"
                        data-id="<?=$ambil['id_jadwal'].$status_p?>">Edit</a> |
                    <!-- <a href='UI_Form_edit_jadwal.php?id_jadwal=<?=$ambil['id_jadwal']?>'>Edit</a> | -->
                    <a href='UI_Penjadwalan_detail_admin.php?nim=<?=$ambil['nim']?>'>Detail</a>
                </td>
            </tr>
            <?php $i++;}?>
        </tbody>
    </table>
    <?php
    }else if ($data=="terdekat"||$data=="Terdekat") {
        $hasil=$P->getJadwalTerdekat();
        ?>
    <table class="table rounded">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <!-- <th scope="col">ID Jadwal</th> -->
                <th scope="col">NIM</th>
                <th scope="col">Jenis Jadwal</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Waktu</th>
                <th scope="col">Ruang</th>
                <th scope="col">Dosen Penguji </th>
                <th scope="col">Dosen Penguji 2</th>
                <th scope="col">Status</th>
                <th scope="col" id="dosen4">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1;foreach ($hasil as $ambil) {?>
            <tr>
                <td class="text-left"><?=$i?></td>
                <!-- ID Jadwal -->
                <!-- <td></td> -->
                <!-- Jenis Ujian -->
                <td class="text-left"><?=$ambil['nim']?></td>
                <!-- Jenis Ujian -->
                <td class="text-left"><?=$ambil['jenis_ujian']?></td>
                <!-- Tanggal -->
                <td class="text-left"><?php
                                                    $tanggal=date("d M Y", strtotime($ambil['tanggal']));
                                                    echo $tanggal;
                                                    ?></td>
                <!-- Waktu -->
                <td class="text-left"><?php
                                                    $jam=$ambil['jam'];
                                                    if ($jam=="1"){
                                                        echo "07:00";
                                                    }else if($jam=="2"){    
                                                        echo "10:00";
                                                    }else if($jam=="3"){
                                                        echo "13:00";
                                                    }
                                                    ?>
                    <!-- Ruang -->
                <td class="text-left"><?=$ambil['tempat']?></td>
                <!-- Dosen -->
                <?php
                                                    if($ambil['jenis_ujian'] == "SEMPROP"){
                                                        $ddp = $P->getDosenUjibyNiy($ambil['nim']);
                                                        foreach ($ddp as $key) {?>
                <td class="text-left"><?=$key['nama_dosen']?></td>
                <?php }?>
                <td>---</td>
                <?php
                                                    }else{
                                                        $ddp = $P->getDosenUjibyNiy($ambil['nim']);
                                                        foreach ($ddp as $key) {?>
                <td class="text-left"><?=$key['nama_dosen']?></td>
                <?php }
                                                    
                                                    }
                                                    ?>
                <!-- Status Check -->
                <?php
                                                    $wait = "---";
                                                    if($ambil['jenis_ujian']=="SEMPROP"){
                                                        $status = $P->getDataStatusSemprop($ambil['nim']);
                                                        $baris =  $P->hitung_row($status);
                                                        $baris = "$baris";
                                                        if($baris != 0 ){
                                                        foreach ($status as $key ) {
                                                            if ($key['status_sp']=="lulus") {                                                                
                                                                echo "<td class='text-success text-left'>$key[status_sp]</td>";
                                                            }else{
                                                                echo "<td class='text-danger text-left'>$key[status_sp]</td>";
                                                            }
                                                            $status_sp=$key['status_sp'];
                                                            $status_p=$status_sp;
                                                        }
                                                        }else if($baris=="0"){
                                                                echo " <td>$wait</td>";
                                                                $status_sp=$wait;
                                                                $status_p=$status_sp;                                                       
                                                        }
                                                    }else{
                                                        $status = $P->getDataStatusPendadaran($ambil['nim']);
                                                        $baris =  $P->hitung_row($status);
                                                        $baris = "$baris";
                                                        if($baris != 0 ){
                                                        foreach ($status as $key ) {
                                                            if ($key['status_up']=="lulus") {                                                                
                                                                echo "<td class='text-success text-left'>$key[status_up]</td>";
                                                            }else{
                                                                echo "<td class='text-danger text-left'>$key[status_up]</td>";
                                                            }
                                                            $status_up=$key['status_up'];
                                                            $status_p=$status_up;
                                                        }
                                                        }else if($baris=="0"){
                                                                echo " <td>$wait</td>";
                                                                $status_up=$wait;
                                                                $status_p=$status_up;                                                       
                                                        }
                                                    }
                                                    
                                                    ?>
                <!-- Opsi -->
                <td>
                    <a class="modalku" href="" id="modalku" data-toggle="modal" data-target="#ModalUbah"
                        data-id="<?=$ambil['id_jadwal'].$status_p?>">Edit</a> |
                    <!-- <a href='UI_Form_edit_jadwal.php?id_jadwal=<?=$ambil['id_jadwal']?>'>Edit</a> | -->
                    <a href='UI_Penjadwalan_detail_admin.php?nim=<?=$ambil['nim']?>'>Detail</a>
                </td>
            </tr>
            <?php $i++;}?>
        </tbody>
    </table>
    <?php
    }else{
        $hasil=$P->caridatajadwal($data);
        $baris=$P->hitung_row($hasil);
        if($baris!=0){
        ?>
    <table class="table rounded">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <!-- <th scope="col">ID Jadwal</th> -->
                <th scope="col">NIM</th>
                <th scope="col">Jenis Jadwal</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Waktu</th>
                <th scope="col">Ruang</th>
                <th scope="col">Dosen Penguji </th>
                <th scope="col">Dosen Penguji 2</th>
                <th scope="col">Status</th>
                <th scope="col" id="dosen4">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1;foreach ($hasil as $ambil) {?>
            <tr>
                <td class="text-left"><?=$i?></td>
                <!-- ID Jadwal -->
                <!-- <td></td> -->
                <!-- Jenis Ujian -->
                <td class="text-left"><?=$ambil['nim']?></td>
                <!-- Jenis Ujian -->
                <td class="text-left"><?=$ambil['jenis_ujian']?></td>
                <!-- Tanggal -->
                <td class="text-left"><?php
                                                    $tanggal=date("d M Y", strtotime($ambil['tanggal']));
                                                    echo $tanggal;
                                                    ?></td>
                <!-- Waktu -->
                <td class="text-left"><?php
                                                    $jam=$ambil['jam'];
                                                    if ($jam=="1"){
                                                        echo "07:00";
                                                    }else if($jam=="2"){    
                                                        echo "10:00";
                                                    }else if($jam=="3"){
                                                        echo "13:00";
                                                    }
                                                    ?>
                    <!-- Ruang -->
                <td class="text-left"><?=$ambil['tempat']?></td>
                <!-- Dosen -->
                <?php
                                                    if($ambil['jenis_ujian'] == "SEMPROP"){
                                                        $ddp = $P->getDosenUjibyNiy($ambil['nim']);
                                                        foreach ($ddp as $key) {?>
                <td class="text-left"><?=$key['nama_dosen']?></td>
                <?php }?>
                <td>---</td>
                <?php
                                                    }else{
                                                        $ddp = $P->getDosenUjibyNiy($ambil['nim']);
                                                        foreach ($ddp as $key) {?>
                <td class="text-left"><?=$key['nama_dosen']?></td>
                <?php }
                                                    
                                                    }
                                                    ?>
                <!-- Status Check -->
                <?php
                                                    $wait = "---";
                                                    if($ambil['jenis_ujian']=="SEMPROP"){
                                                        $status = $P->getDataStatusSemprop($ambil['nim']);
                                                        $baris =  $P->hitung_row($status);
                                                        $baris = "$baris";
                                                        if($baris != 0 ){
                                                        foreach ($status as $key ) {
                                                            if ($key['status_sp']=="lulus") {                                                                
                                                                echo "<td class='text-success text-left'>$key[status_sp]</td>";
                                                            }else{
                                                                echo "<td class='text-danger text-left'>$key[status_sp]</td>";
                                                            }
                                                            $status_sp=$key['status_sp'];
                                                            $status_p=$status_sp;
                                                        }
                                                        }else if($baris=="0"){
                                                                echo " <td>$wait</td>";
                                                                $status_sp=$wait;
                                                                $status_p=$status_sp;                                                       
                                                        }
                                                    }else{
                                                        $status = $P->getDataStatusPendadaran($ambil['nim']);
                                                        $baris =  $P->hitung_row($status);
                                                        $baris = "$baris";
                                                        if($baris != 0 ){
                                                        foreach ($status as $key ) {
                                                            if ($key['status_up']=="lulus") {                                                                
                                                                echo "<td class='text-success text-left'>$key[status_up]</td>";
                                                            }else{
                                                                echo "<td class='text-danger text-left'>$key[status_up]</td>";
                                                            }
                                                            $status_up=$key['status_up'];
                                                            $status_p=$status_up;
                                                        }
                                                        }else if($baris=="0"){
                                                                echo " <td>$wait</td>";
                                                                $status_up=$wait;
                                                                $status_p=$status_up;                                                       
                                                        }
                                                        }
                                                    
                                                    ?>
                <!-- Opsi -->
                <td>
                    <a class="modalku" href="" id="modalku" data-toggle="modal" data-target="#ModalUbah"
                        data-id="<?=$ambil['id_jadwal'].$status_p?>">Edit</a> |
                    <!-- <a href='UI_Form_edit_jadwal.php?id_jadwal=<?=$ambil['id_jadwal']?>'>Edit</a> | -->
                    <a href='UI_Penjadwalan_detail_admin.php?nim=<?=$ambil['nim']?>'>Detail</a>
                </td>
            </tr>
            <?php $i++;}?>
        </tbody>
    </table>
    <?php
        }else if($baris==0){?>
    <table class="table rounded">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <!-- <th scope="col">ID Jadwal</th> -->
                <th scope="col">NIM</th>
                <th scope="col">Jenis Jadwal</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Waktu</th>
                <th scope="col">Ruang</th>
                <th scope="col">Dosen Penguji </th>
                <th scope="col">Dosen Penguji 2</th>
                <th scope="col">Status</th>
                <th scope="col" id="dosen4">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <td colspan="10" class="text-center">Data Tidak Ditemukan !</td>
        </tbody>
    </table>
    <?php }
    }
?>