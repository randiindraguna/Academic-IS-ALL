<?php include '../templates/header_Penjadwalan.php' ?>
<?php 
include "Class_analitik.php";
    $akses = new Analitik();
    $akses->connect();
 ?>
<?php
 session_start();
if($_SESSION['status'] == "login"){
  // menampilkan pesan selamat datang
  //echo "Hai, selamat datang ". $_SESSION['username'];
}else{
  header("location:../index.php");

}
?>
   <!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../templates/navbar_admin.html' ?>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--grafik-->
   <script type="text/javascript" src="chartjs/Chart.js"></script>
    <!--grafik-->
    <!-- /\ambil css penjadwalan -->
    <!-- Tambahan CSS -->
    <link rel="stylesheet" href="../css/style_penjadwalan.css">
    <link rel="stylesheet" href="../css/switches_Penjadwalan.css">

    <style type="text/css" href="../css/tombol_penjadwalan.css"></style>
</head>
<body>
    <!-- Content -->
        <div class="container"> 
            <!--Grafik-->
        </br>.
            <h2 class="judul"><center>-- Statistik Pembimbingan Dosen -- </center></h2>
            <h2 class="judul"><center>-- Berdasarkan Bidang minat Mahasiswa -- </center></h2>
            
            <?php
                $bidang = "Pilih Bidang Minat";
                if(isset($_POST['save'])){
                    $bidang = $_POST['bidmin'];
                }
            ?>

            <center>
            <form method="POST" action="statistik_pembimbingan_dosen.php">
            <!-- <div class="row"> -->
                <div class="col-6 mt-2">
                    <label for="inputState"> Pilihan Bidang Minat </label>
                        <select name="bidmin" id="inputState" class="form-control" >
                            <option selected><?php echo $bidang ; ?></option>
                            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                            <option value="Sistem Cerdas">Sistem Cerdas</option>
                            <option value="Multimedia">Multimedia</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Media Pembelajaran">Media Pembelajaran</option>
                        </select>                   
                </div>
            <!-- </div> --> <br>
                <button type="submit" class="btn btn-primary" name="save" >Simpan</button>
            </div>
            </form>
            </center>
        <br>
       <div style="width: 1000px;margin: 0px auto;">
        <canvas id="myChart"></canvas>
    </div>

    <?php
    if (isset($_POST['save'])) {
        if(is_null($_POST['bidmin'])){
            echo "Silahkan pilih bidang minat";
        }else{
             $bidang = $_POST['bidmin'];
        }
    }
     ?>

    <?php if(isset($_POST['save'])){ ?>
    <script>
        var i;
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php foreach($akses->jumlah_ampu_bimbingan($bidang) as $key){echo '"'.$key['dos_bing'].'",';}?>],
                datasets: [{
                    label: '',
                    data: [
                    <?php 
                        foreach($akses->jumlah_ampu_bimbingan($bidang) as $key){echo '"'.$key['jumlah_ampu'].'",';}
                    ?>,
                    ],
                    
                    backgroundColor: [
                        'rgba(26, 188, 156,1.0)',
                        'rgba(22, 160, 133,1.0)',
                        'rgba(241, 196, 15,1.0)',
                        'rgba(243, 156, 18,1.0)',
                        'rgba(52, 73, 94,1.0)',
                        'rgba(44, 62, 80,1.0)',
                        'rgba(47, 54, 64,1.0)',
                        'rgba(149, 165, 166,1.0)',
                        'rgba(25, 42, 86,1.0)',
                        'rgba(142, 68, 173,1.0)',
                        'rgba(192, 57, 43,1.0)',
                        'rgba(46, 204, 113,1.0)',
                        'rgba(192, 57, 43,1.0)',
                        'rgba(230, 126, 34,1.0)',
                        'rgba(211, 84, 0,1.0)',
                        'rgba(0, 151, 230,1.0)',
                        'rgba(72, 126, 176,1.0)',
                        'rgba(127, 143, 166,1.0)',
                        'rgba(53, 59, 72,1.0)',
                        'rgba(39, 60, 117,1.0)',
                        'rgba(237, 76, 103,1.0)',
                        'rgba(153, 128, 250,1.0)',
                        'rgba(18, 203, 196,1.0)',
                        'rgba(217, 128, 250,1.0)',
                        'rgba(18, 203, 196,1.0)',
                        'rgba(0, 148, 50,1.0)',
                        'rgba(196, 229, 56,1.0)',
                        'rgba(238, 90, 36,1.0)',
                        'rgba(255, 195, 18,1.0)',
                        'rgba(18, 203, 196,1.0)',
                        'rgba(6, 82, 221,1.0)',     
                    ],
                    borderColor: [
                        'rgba(26, 188, 156,1.0)',
                        'rgba(22, 160, 133,1.0)',
                        'rgba(241, 196, 15,1.0)',
                        'rgba(243, 156, 18,1.0)',
                        'rgba(52, 73, 94,1.0)',
                        'rgba(44, 62, 80,1.0)',
                        'rgba(47, 54, 64,1.0)',
                        'rgba(149, 165, 166,1.0)',
                        'rgba(25, 42, 86,1.0)',
                        'rgba(142, 68, 173,1.0)',
                        'rgba(192, 57, 43,1.0)',
                        'rgba(46, 204, 113,1.0)',
                        'rgba(192, 57, 43,1.0)',
                        'rgba(230, 126, 34,1.0)',
                        'rgba(211, 84, 0,1.0)',
                        'rgba(0, 151, 230,1.0)',
                        'rgba(72, 126, 176,1.0)',
                        'rgba(127, 143, 166,1.0)',
                        'rgba(53, 59, 72,1.0)',
                        'rgba(39, 60, 117,1.0)',
                        'rgba(237, 76, 103,1.0)',
                        'rgba(153, 128, 250,1.0)',
                        'rgba(18, 203, 196,1.0)',
                        'rgba(217, 128, 250,1.0)',
                        'rgba(18, 203, 196,1.0)',
                        'rgba(0, 148, 50,1.0)',
                        'rgba(196, 229, 56,1.0)',
                        'rgba(238, 90, 36,1.0)',
                        'rgba(255, 195, 18,1.0)',
                        'rgba(18, 203, 196,1.0)',
                        'rgba(6, 82, 221,1.0)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
    <?php
    }else{ ?>
            <center><h2>Silahkan Memilih Bidang Minat Untuk Menampilkan</h2></center>
        <br><br>
    <?php } ?>
    
            <!--Grafik-->
        </div>
        <?php include '../templates/footer_Penjadwalan.php' ?>
    
    </body>
</html>
        


