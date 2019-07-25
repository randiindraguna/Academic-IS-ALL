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
    <style>
        .previous {
  color: white;
}
    </style>

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
            <!-- Box -->
           <!--  <div class="row mt-5 ">
                <div class="col-2">
                </div>
                <div class="col-8 box2 bg-two">
                    <div class="row">
                        <div class="col-10 mt-3 mb-3">
                            <p class="judul">Ujian Pendadaran</p>
                        </div>
                    </div>
                    <form action="hasil_pencarian_PD_diadmin.php" method="POST">
                        <div class="row">
                            <div class="col-2 ml-3 pt-1">
                                <p class="pone">NIM :</p>
                            </div>
                            <div class="col-6">
                                <input type="text" name='nim' placeholder='Masukkan NIM' class="form-control in-box" name="nim">
                            </div>
                            <div class="col-2 mb-5">
                                <button type="submit" name="submit11" value="Submit" class="butn butn2 ml-2" >Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-2 ">
            </div> -->
            <!--Grafik-->
        </br>
            <h2 class="judul"><center>Statistik Ruangan<br>--UJIAN PENDADARAN--</center></h2>
        <br>
       <div style="width: 800px;margin: 0px auto;">
        <canvas id="myChart"></canvas>
        </div>
<?php 

$h1=$akses->getcek_nilai_undaran();
$hasil=mysqli_num_rows($h1);
if ($hasil>0) {
 ?>

    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Ruangan 1", "Ruangan 2", "Ruangan 3"],
                datasets: [{
                    label: '',
                    data: [
                    <?php 
                    foreach($akses->getruang1_undaran() as $k){
                    echo" $k[jumlah1undaran]"; 
                    }?>,
                    <?php 
                    foreach($akses->getruang2_undaran() as $k){
                    echo" $k[jumlah2undaran]"; 
                    }?>,
                    <?php 
                    foreach($akses->getruang3_undaran() as $k){
                    echo" $k[jumlah3undaran]"; 
                    }?>,
                    ],
                    backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
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
        }else{
            ?>
            <script type="text/javascript">
                    alert('Ruangan untuk Ujian Pendadaran masih Kosong');
                    history.back(self);
                </script>
       <?php }
     ?>
            <!--Grafik--></br>
 <div class="row">
    <div class="col-sm-4" style=""><button class="btn-primary"><a href="statistik_ruangan.php" class="previous">&laquo; Previous</a></div>
    <div class="col-sm-4" style=""></div>
    <div class="col-sm-4" style=""></div>
</div>
<br>
        </div>
    
    </body>
</html>
        

<?php include '../templates/footer_Penjadwalan.php' ?>
