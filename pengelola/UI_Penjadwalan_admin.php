<!-- Dikerjakan oleh Adhymas Fajar Sudrajad -->
<?php 
    session_start();
   

    include '../Class_penjadwalan.php';
    $P = new Penjadwalan();
    $P->connect();
    $data=$P->getDataJadwal();
    include '../templates/header_penjadwalan.php';
?>

</head>

<body class="bg-tre">
    <!-- Navbar -->
    <?php include '../templates/navbar_admin.html'?>
    <!-- End Navbar -->
    <div class="ml-5 mr-5 mb-5">
        <!-- Box -->
        <div class="row box2 mb-5 ">
            <!-- Button Semprop atau Pendadaran-->
        </div>
        <div class="row">
            <div class="box2-1 col-3 bg-two rounded  mb-n3">
                <p class="judul mt-3 mb-4 text-center">Daftar Jadwal</p>
            </div>
            <div class="col-9"></div>
        </div>
        <!-- Box BIG Jadwal -->
        <div class="row box2 mb-5">
            <div class="col-12">
                <div class="row">
                    <div class="col-8 mt-2">
                        <button name="answer" value="Semua" class="btn btn-secondary ml-5 mt-5 mb-5" onclick="" id="all">Semua</button>
                        <button name="answer" value="Semprop" class=" btn btn-primary mt-5 mb-5" onclick="" id="semprop">Seminar Proposal</button>
                        <button name="answer" value="Pendadaran" class="btn btn-info mt-5 mb-5 " onclick="" id="pendadaran">Pendadaran</button>
                        <button name="answer" value="Jadwal_terdekat" class="btn btn-info mt-5 mb-5 " onclick="" id="terdekat">Jadwal Terdekat</button>
                    </div>
                    <div class="col-4 p-4">
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2 mt-4" type="search" placeholder="Search"
                                aria-label="Search" id="key">
                            <button class="btn btn-outline-success mt-4" type="submit">Search</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center rounded pb-5">

                        <!-- Animasi Tabel -->
                        <!-- Jadwal -->
                        <div class="bg-four p-4 rounded">
                            <div class="row p-2 rounded">
                                <div class="col-12 rounded">
                                    <div id="tabel">
                                        <table class="table rounded">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <!-- <th scope="col">ID Jadwal</th> -->
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">NIM</th>
                                                    <th scope="col">Jumlah Bimbingan</th>
                                                    <th scope="col">Lama Bimbingan</th>
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
                                                <?php $i=1;foreach ($data as $ambil) {?>
                                                <tr>
                                                    <td class="text-left"><?=$i?></td>
                                                    <!-- ID Jadwal -->
                                                    <!-- <td></td> -->
                                                    <!-- nama mhs -->
                                                    <?php 
                                                        $nmm = $P->getNamaMhs($ambil['nim']);
                                                        foreach ($nmm as $key) {
                                                            ?>
                                                            <td class="text-left"><?=$key['nama']?></td>
                                                        <?php
                                                        }
                                                    ?>
                                                    <!-- <td class="text-left"><?=$ambil['nama']?></td> -->
                                                    <!-- Jenis Ujian -->
                                                    <td class="text-left"><?=$ambil['nim']?></td>
                                                    <!-- lama bimbingan -->
                                                    
                                                        <?php
                                                            $lb = $P->getCountBimbinganSkripsi($ambil['nim']);
                                                            foreach ($lb as $key1) {
                                                                ?>
                                                                <td class="text-center"><?=$key1['jb']?></td>   
                                                                <?php
                                                            }
                                                        ?>
                                                    <!-- lamabimbingan -->
                                                    <?php
                                                    $lb=$P->getLamaBimbingan($ambil['nim']);
                                                    foreach ($lb as $key2) {
                                                        $dd = $P->displayDate($key2['lamabimbingan'])
                                                        ?>
                                                        <td class="text-center"><?=$dd?></td>   
                                                        <?php
                                                    }
                                                    ?>
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
                                                        $ddp = $P->getDosenUji($ambil['nim'],$ambil['id_jadwal']);
                                                        foreach ($ddp as $key) {?>
                                                    <td class="text-left"><?=$key['nama_dosen']?></td>
                                                    <?php }?>
                                                    <td>---</td>
                                                    <?php
                                                    }else{
                                                        $ddp = $P->getDosenUji($ambil['nim'],$ambil['id_jadwal']);
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
                                                        <a class="modalku" href="" id="modalku" data-toggle="modal"
                                                            data-target="#ModalUbah"
                                                            data-id="<?=$ambil['id_jadwal']?>" data-lb="<?=$key2['lamabimbingan']?>"  data-jb="<?=$key1['jb']?>" data-st="<?=$status_p?>">Edit</a> |
                                                        <!-- <a href='UI_Form_edit_jadwal.php?id_jadwal=<?=$ambil['id_jadwal']?>'>Edit</a> | -->
                                                        <a
                                                            href='UI_Penjadwalan_detail_admin.php?nim=<?=$ambil['nim']?>'>Detail</a>
                                                    </td>
                                                </tr>
                                                <?php $i++;}?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="ModalUbah" tabindex="-1" role="dialog" aria-labelledby="ModalUbah"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalUbahjudul">Edit Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="isimodal">
                </div>
            </div>
        </div>
    </div>
    <!-- Javascript Appear -->
    <!-- JavaScript Selecting Box -->
    <script>
        function showDiv() {
            var checkBox = document.getElementById("myCheck");
            // If the checkbox is checked, display the output text
            if (checkBox.checked == true) {
                document.getElementById('uji2').style.display = "block";
                document.getElementById('uji1').style.display = "none";
            } else if (checkBox.checked == false) {
                document.getElementById('uji1').style.display = "block";
                document.getElementById('uji2').style.display = "none";
            } else {
                document.getElementById('uji2').style.display = "none";
                document.getElementById('uji2').style.display = "none";
            }
        }

        function alert() {
            var dosen1 = document.getElementById('penguji1');
            var dosen2 = document.getElementById('penguji2');
            if (dosen1 == null || dosen1 == "" && dosen2 == null) {
                swal("Good job!", "You clicked the button!", "warning");
            }
        }
        function cekform() {
            var waktu = document.getElementById('waktu');
            var ruang = document.getElementById('ruang');
            var tanggal = document.getElementById('tanggal');
            console.log(waktu.value);
            console.log(ruang.value);
            console.log(tanggal.value);
            if (waktu.value == "" || waktu.value == "0") {
                swal("Peringatan!", "Waktu Harus Diisi", "warning");
            } else if (ruang.value == "" || ruang.value == "0") {
                swal("Peringatan!", "Ruang Harus Diisi", "warning");
            } else if (tanggal.value == "" || tanggal.value == "0" || tanggal.value == null) {
                swal("Peringatan !", "Tanggal Harus Diisi", "warning");
            } else {
                document.getElementById('fform').submit();
            }
        }
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- dATEPICKER -->
    <script src="../css/Datepicker_Penjadwalan/js/bootstrap-datepicker.js"></script>
    <script src="../css/Datepicker_Penjadwalan/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
    </script>
    <!-- Script -->
    <script src="../js/jquery 3.4.0.js"></script>
    <script src="../js/jquery  3.4.0.min.js"></script>
    <script src="../js/penjadwalanJSs11.js"></script>


</body>

</html>