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
        </br>.
            <h2 class="judul"><center>-- Statistik Kelulusan Seminar Proposal -- </center></h2>
            <h2 class="judul"><center>-- Berdasarkan Gender Mahasiswa -- </center></h2>
            
            <?php
                $status_metopen = "Pilih kelulusan";
                if(isset($_POST['save'])){
                    $status_metopen = $_POST['status'];             
                }
            ?>

            <center>
            <form method="POST" action="statistik_gender_metopen.php">
            <!-- <div class="row"> -->
                <div class="col-6 mt-2">
                    <label for="inputState"> Pilihan Kelulusan </label>
                        <select name="status" id="inputState" class="form-control" >
                            <option selected value="0"><?php echo $status_metopen; ?></option>
                            <option value="lulus">Lulus</option>
                            <option value="tidak_lulus">Gagal</option>
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
        if(is_null($_POST['status'])){
            echo "Silahkan pilih Kelulusan";
        }else{
             $sta = $_POST['status'];
              
        ?>

    <script>
    var i;
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: "pie",
            data: {
                labels: [<?php foreach($akses->gender() as $k){echo '"'.$k['jenis_kelamin'].'",';}?>],
                datasets: [{
                    label: '',
                    data: [
                       <?php foreach($akses->gender_metopen_pr($sta) as $key){echo '"'.$key['jumlah_gen1'].'",';} ?>,
                        <?php foreach($akses->gender_metopen_lk($sta) as $key){echo '"'.$key['jumlah_gen2'].'",';} ?>
                    ],
                    
                    backgroundColor: [
                        'rgba(22, 160, 133,1.0)',
                        'rgba(241, 196, 15,1.0)',
                        'rgba(241, 196, 15,1.0)'      
                    ],
                    borderColor: [                
                        'rgba(22, 160, 133,1.0)',
                        'rgba(241, 196, 15,1.0)',
                        'rgba(241, 196, 15,1.0)'
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
         }
        }
     ?>
            <!--Grafik-->
        </div>
    
    </body>
</html>
        

<?php include '../templates/footer_Penjadwalan.php' ?>
