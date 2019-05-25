<!-- Dikerjakan oleh Adhymas Fajar Sudrajad -->
<?php 
    $data=$_GET['data'];
    $status=substr($data,12);
    $id_jadwal=substr($data,0,12);
    include '../Class_penjadwalan.php';
    include '../templates/header_penjadwalan.php';
    $akses = new Penjadwalan();
    $akses->connect();
    session_start();
    $hasil=$akses->getJadwalByIDJadwal($id_jadwal);
    $nama=$_SESSION['nama'];
    $nim=$_SESSION['nim'];
    $topik=$_SESSION['topik'];
    $dosen=$_SESSION['dosen'];
    $niy=$_SESSION['niy'];
    $nama_dosen=$_SESSION['nama_dosen'];
    $email_dosen=$_SESSION['email'];
    $ahli_dosen=$_SESSION['bidang_keahlian'];
    $id_jadwal=$_SESSION['id_jadwal'];
    $jenis_Uji=$_SESSION['jenis_ujian'];
    $tgl_uji=$_SESSION['tanggal'];
    $jam_uji=$_SESSION['jam'];
    $tempat_uji=$_SESSION['tempat'];
    session_destroy();
    $db_penguji = $akses->getDosenPengujibyNIY($niy);
    foreach ($db_penguji as $key) {
        $niy_dosen_penguji = $key['niy'];
        $nama_penguji = $key['nama_dosen'];
    }
?>
</head>
<body class="">
        <!-- Button Semprop atau Pendadaran-->
        <div class="col-12 ">
            <form id="fform" action="control/edit_semprop_ke_pendadaran.php" method="post">
            <div class="row">
                <div class="col-6 mt-2">                   
                    <label for="inputEmail4">ID Jadwal</label>
                    <input class="form-control" id="disabledInput" type="text" placeholder="<?=$id_jadwal?>" disabled> 
                    <input type="hidden" name="id_jadwal" value="<?=$id_jadwal?>"> 
                </div>
                <div class="col-6 mt-2">
                    <label for="inputPassword4">Jenis Ujian</label>
                    <input class="form-control" id="disabledInput" type="text" placeholder="<?=$jenis_Uji?>" disabled>
                    <input type="hidden" name="jenis_ujian" value="<?=$jenis_Uji?>">
                    </div>                
            </div>
            <div class="row">
                <div class="col-6 mt-2">             
                    <label for="inputAddress">Nama Mahasiswa</label>
                    <input class="form-control" id="disabledInput" type="text" placeholder="<?=$nama?>" disabled>
                    <input type="hidden" name="nim" value="<?=$nim?>">
                </div>
            </div>
            <!-- DOsen -->
            <div class="row mt-1">
                <div class="col-6 mt-2">                   
                    <label for="inputEmail4">Dosen Penguji</label>
                    <input class="form-control" id="disabledInput" type="text" name="penguji" placeholder="<?=$nama_penguji?>" disabled>       
                    <input type="hidden" name="penguji" value="<?=$niy_dosen_penguji?>">
                </div>
            <div class="col-6 mt-2" id="dosen_penguji2" style="display:none;">               
                    <label for="inputAddress2">Dosen Penguji 2</label>
                    <select id="inputState" class="form-control" id="penguji" name="penguji2">
                            <option selected>Pilih Dosen Penguji</option>
                            <?php foreach ($akses->getAllDosenKecualiSatuDosen($niy) as $key ) {?>                            
                            <option value="<?=$key['niy']?>"><?=$key['nama_dosen']?></option>
                            <?php } ?>                            
                    </select>
                </div>
            </div>
            <!-- Waktu $ RUang -->
            <div class="row">
                <div class="col-6 mt-2">
                    <label for="inputState">Waktu</label>
                        <select name="waktu" id="waktu" class="form-control" >
                            <option selected value="0">Pilih Waktu</option>
                            <option value="1">08:00</option>
                            <option value="2">10:30</option>
                            <option value="3">13:00</option>
                        </select>                   
                </div>

                <div class="col-6 mt-2">
                    <label for="inputState">Ruang</label>
                        <select name="ruang"id="ruang" class="form-control" >
                            <option selected value="0">Pilih</option>
                            <option value="1" >Ruang 1</option>
                            <option value="2">Ruang 2</option>
                            <option value="3">Ruang 3</option>
                        </select>
                </div>
            </div>
            <div class="row">
                <div class="col-3 mt-4"></div>
                <div class="col-6 mt-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">tanggal</span>
                        </div>
                            <input type="date" name="tanggal" class="tanggal form-control" id="tanggal">
                        </div>
                    </div>
                </div>
                <div class="col-3 mt-4"></div>
        </div>
        <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">tutup</button>                    
                    <button type="button" class="btn btn-primary" onclick="cekform()">Ubah Data</button>
        </div>
        </form>                  
    </div>
    <!-- Javascript Appear -->
    <!-- JavaScript Selecting Box -->
    
    <script>
        function cekjenisuji() {
            var jenus_Uji="<?php echo $jenis_Uji?>";
            
            }else if (jenus_Uji =="UNDARAN") {
                document.getElementById('dosen_penguji2').style.display = "block";
            }
        function back(value) {
            if (value==true) {
                window.history.back();
            }
        }    
        
        
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- dATEPICKER -->
    <script src="css/Datepicker_Penjadwalan/js/bootstrap-datepicker.js"></script>
    <script src="css/Datepicker_Penjadwalan/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.tanggal').datepicker({
                format: "dd-mm-yyyy",
                autoclose: true
            });
        });
        // Cek Form
        cekjenisuji();
    </script>

</body>

</html>


