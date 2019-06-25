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
            <h2 class="judul"><center>Statistik kelulusan</center></h2>

            <center>
            <form method="POST" action="statistik_kelulusan.php">
            <!-- <div class="row"> -->
                <div class="col-6 mt-2">
                    <label for="inputState"> Pilihan Kelulusan Berdasarkan : </label>
                        <select name="lulusan" id="inputState" class="form-control" >
                            <option value="" selected>Pilih Jenis Kelulusan</option>
                            <option value="SEMPROP">Seminar Proposal</option>
                            <option value="UNDARAN">Ujian Pendadaran</option>
                        </select>                   
                </div>
            <!-- </div> --> <br>
                <button type="submit" class="btn btn-primary" name="kirim">Submit</button>
            </div>
            </form>
            </center>
        <br>
       <div class="container" style="width: 700px">
        <canvas id="gradu"></canvas>
    </div>

    <?php
        if (empty($_POST['kirim'])) {
            if (is_null($_POST['lulusan'])) {
                echo "SILAHKAM PILIH JENIS LULUSAN";
            }
            else{
                $kelulusan = $_POST['lulusan'];
                ?>

                <script>
        
                    var ctx = document.getElementById("gradu").getContext('2d');
                    var data =
                    {
                        labels: ["Lulus", "Tidak Lulus"],
                        datasets: [
                            {
                                label: '',
                                data: [
                                    <?php 
                                        if ($kelulusan == "SEMPROP") {
                                            foreach($akses->lulus_SEMPROP() as $key){echo "$key[jml_lulus]";}
                                        }
                                        elseif ($kelulusan == "UNDARAN") {
                                            foreach($akses->lulus_UNDARAN() as $key){echo "$key[jml_lulus]";}
                                        }
                                    ?>,
                                    <?php
                                        if ($kelulusan == "SEMPROP") {
                                            foreach($akses->tidaklulus_SEMPROP() as $key){echo "$key[jml_tdk_lulus]";}
                                        } 
                                        elseif ($kelulusan == "UNDARAN") {
                                            foreach($akses->tidaklulus_UNDARAN() as $key){echo "$key[jml_tdk_lulus]";}
                                        }
                                    ?>,
                                ],
                                backgroundColor: [
                                    'rgba(0, 0, 255, 0.5)',
                                    'rgba(255, 0, 0, 0.5)'
                                ]
                            }
                        ]
                    };
                    var myChart = new Chart(ctx, {type: 'pie', data: data, options: {responsive : true}});
        
                </script>
                <!--Grafik-->
                </div>

                <?php
            }
        }
        else{
            echo "SILAHKAM PILIH JENIS LULUSAN";
        }
    ?>
    
    </body>
</html>
        

<?php include '../templates/footer_Penjadwalan.php' ?>
