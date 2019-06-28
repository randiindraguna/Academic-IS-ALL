<?php include '../templates/header_Penjadwalan.php' ?>
<?php 
include "database_statistik.php";
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
            <h2 class="judul"><center>Statistik<br>--BIDANG MINAT--</center></h2>
        <br>
       <div style="width: 800px;margin: 0px auto;">
        <canvas id="myChart"></canvas>
        </div>
        <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            // data: {
            //  labels: ["sistemcerdas"],
            //  datasets: [{
            //      label: '',
            //      data: [
            //      <?php 
            //      foreach($akses->getsistemcerdas() as $k){
            //      echo" $k[jumlah_bidang_minat1]"; 
            //      }?>,
            //      ],
                    data: {
                    labels: [<?php foreach($akses->getbidangminat() as $k){echo '"'.$k['bidang_minat'].'",';}?>],
                    datasets: [{
                    label: '',
                    data: [
                    <?php 
                        foreach($akses->getbidangminat() as $k){echo '"'.$k['jumlah_bidang_minat1'].'",';}
                    ?>,
                    ],
                    backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(20, 26, 255, 0.2)',
                    'rgba(255, 206, 255, 0.2)'
                    ],
                    borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(18, 99, 10, 1)',
                    'rgba(25, 255, 186, 1)',
                    'rgba(100, 60, 86, 1)'                  ],
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

            <br><br>
            <h2 class="judul"><center>-- Data Mahasiswa -- </center></h2>
            
            <center>
            <form method="POST" action="statistik_bidmin.php">
            <!-- <div class="row"> -->
                <div class="col-6 mt-2">
                    <label for="inputState"> Pilihan Bidang Minat </label>
                        <select name="bidmin" id="inputState" class="form-control" >
                            <option selected value="0 ">Pilih Bidang Minat</option>
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
            <?php 
            if (isset($_POST['save'])) {
                if (!is_null($_POST['bidmin'])) {
                    $bidang = $_POST['bidmin'];
                ?>
               <div class="container">
                    <br><br>
                    <h2 align="center" class="judul">Data Mahasiswa <?php echo "$bidang"; ?></h2>
                    <br><br>
                    <center>
                    <table class="table rounded" border="1" width="1000px">
                        <tr align="center"> 
                          <th scope="col">Nama Mahasiswa</th>
                        </tr>
                        
                        <?php
                          foreach($akses->getbidangminatall($bidang) as $k ) {
                            echo "
                            <tr>
                                <td>$k[nama]</td>
                            </tr>
                            ";
                          }
                     }
                     elseif ($_POST['bidmin']==0) {
                         # code...
                     
                         echo "Silahkan pilih bidang minat";
                     }
                    }
                    ?>
                <!--Grafik--></br>
            </div>
            </table>
            </center>
            </div>   
    </body>
</html>
        

<?php include '../templates/footer_Penjadwalan.php' ?>
