<?php  
    $data=$_GET['data'];
    include '../Class_penjadwalan.php';
    include '../templates/header_penjadwalan.php';
    $akses = new Penjadwalan();
    session_start();
    $akses->connect();
    $data_a = $akses->getDataALLMahasiswaByNim($data);
    if($akses->hitung_row($data_a)){
        $nim=$_SESSION['nim'];
        $nama=$_SESSION['nama'];
        $topik=$_SESSION['topik'];
        $niy=$_SESSION['niy'];
        $nama_dosen=$_SESSION['nama_dosen'];
        $email_dosen=$_SESSION['email'];
        $ahli_dosen=$_SESSION['bidang_keahlian'];
        $jenis_Uji="none";
        // session_destroy();
?>
<form method="POST" action="../control/hasil_semprop.php">
    <input class="form-control" id="nim" type="hidden" name="nim" value="<?=$nim;?>">
    <div class="row">
        <div class="col-6 mt-2">
            <label for="inputEmail4">Nama Mahasiswa</label>
            <input class="form-control" id="disabledInput" type="text" placeholder="<?=$nama?>" disabled>
        </div>
        <div class="col-6 mt-2">
            <label for="inputPassword4">Dosen Pembimbing</label>
            <input class="form-control" id="disabledInput" type="text" placeholder="<?=$nama_dosen?>" disabled>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-2">
            <label for="inputEmail4">Topik</label>
            <input class="form-control" id="disabledInput" type="text" placeholder="<?=$topik?>" disabled>
        </div>
    </div>
    <div class="row">
        <!-- DOsen -->
        <div class="col-6 mt-2">
            <label for="inputAddress2">Dosen Penguji</label>
            <select class="custom-select" id="penguji" name="penguji">
                <!-- Haurs disesuaikan dengan database -->
                <option selected>Pilih Dosen</option>
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
            <select id="inputState" class="form-control" name="waktu">
                <option selected>Pilih Waktu</option>
                <option value="1">07:00</option>
                <option value="2">10:00</option>
                <option value="3">13:00</option>
            </select>
        </div>

        <div class="col-6 mt-2">
            <label for="inputState">Ruang</label>
            <select id="inputState" class="form-control" name="ruang">
                <option selected>Pilih</option>
                <option value="1">Ruang 1</option>
                <option value="2">Ruang 2</option>
                <option value="3">Ruang 3</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-4 mt-4"></div>
        <div class="col-4 mt-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">tanggal</span>
                </div>
                <input type="text" name="tanggal" class="tanggal form-control">
            </div>
        </div>
    </div>
    <div class="col-4 mt-4"></div>
    <div class="row mb-5 mt-4">
        <div class="col-4 mt-4"></div>
        <div class="col-4 text-center">
            <button type="Reset" class="btn btn-warning">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <div class="col-4 mt-4"></div>
    </div>
    </div>
</form>
<?php } else{?>
<div class="row">
    <div class="col-6 mt-2">
        Data Tidak ditemukan
    </div>
</div>
<?php }?>
