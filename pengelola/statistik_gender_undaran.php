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
            <!--Grafik-->
        </br>.
            <h2 class="judul"><center>-- Statistik Kelulusan Ujian Pendadaran -- </center></h2>
            <h2 class="judul"><center>-- Berdasarkan Gender Mahasiswa -- </center></h2>
            
            <?php
                $stt_metopen = "Pilih kelulusan";
                if(isset($_POST['save'])){
                    $stt_metopen = $_POST['stt'];             
                }
            ?>

            <center>
            <br>
            <!-- <form method="POST" action="statistik_gender_metopen.php">
                <div class="row"> -->
                <!-- <div class="col-6 mt-2">
                    <label for="inputState"> Pilihan Kelulusan </label>
                        <select name="stt" id="inputState" class="form-control" >
                            <option selected value="0"><?php echo $stt_metopen; ?></option>
                            <option value="lulus">Lulus</option>
                            <option value="tidak_lulus">Gagal</option>
                        </select>                   
                </div> -->
            <!-- </div>  <br>
                 <button type="submit" class="btn btn-primary" name="save" >Simpan</button>
            </div>
            </form> -->

            <tabel>
                <tr>
                    <td width = "20px">
                        <a href = "statistik_gender_metopen.php?gender=Laki-laki">
                            <img src="img/lanang.png" height="80px" width="80px;">
                        </a>
                    </td>
                    <td width = "200px"></td>
                    <td>
                        <a href = "statistik_gender_metopen.php?gender=Perempuan">
                            <img src="img/wedok.png" height="80px" width="80px;">
                        </a>
                    </td>
                </tr> <br>
            </tabel>

            <?php 
                if(isset($_GET['gender'])){
                    $gender = $_GET['gender'];
                }
                
            ?>
            </center>
        <br>
       <div style="width: 1000px;margin: 0px auto;">
        <canvas id="myChart"></canvas>
    </div>

    
    <script>
    var i;
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: "pie",
            data: {
                labels: [
                        
                        "Lulus", "Tidak Lulus"
                        ],
                datasets: [{
                    label: '',
                    data: [
                         <?php foreach($akses->undaran_gender($gender) as $stt){echo "$stt[jum_lulus]";}?>,
                         <?php foreach($akses->undaran_gender_tl($gender) as $stt){echo "$stt[jum_tlulus]";}?>,
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

            <!--Grafik-->
        </div>
    
    </body>
</html>
        

<?php include '../templates/footer_Penjadwalan.php' ?>
