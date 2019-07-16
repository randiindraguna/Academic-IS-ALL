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
        </br>.
            <h2 class="judul"><center>-- Statistik Kelulusan Seminar Proposal -- </center></h2>
            <h2 class="judul"><center>-- Pada Tiap Prodi Terdaftar -- </center></h2>

            <?php
                $status = "Pilih Status Kelulusan";
                if (isset($_POST['save'])) {
                    $status = $_POST['status'];
                }
             ?>

            <center>
            <form method="POST" action="statistik_metopen_prodi.php">
            <!-- <div class="row"> -->
                <div class="col-6 mt-2">
                    <label for="inputState"> Pilihan Kelulusan </label>
                        <select name="status" id="inputState" class="form-control" >
                            <option selected ><?php echo $status; ?></option>
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
        <div style="width: 800px;margin: 0px auto;">
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
            type: "bar",
            data: {
                labels: [
                    <?php
                        
                            foreach($akses->nama_prodi() as $keyi){ echo '"'.$keyi['nama_prodi'].'",'; }
                        
                    ?>
                ],
                datasets: [{
                    label: '',
                    data: [
                       <?php 
                            
                                foreach($akses->lulus_semprop_prodi($sta) as $keyi){
                                    echo '"'.$keyi['jumlah_mhs'].'",';
                                }
                            
                        ?>,
                    ],
                    
                    backgroundColor: [
                        'rgba(217, 128, 250,1.0)',
                        'rgba(253, 167, 223,1.0)',
                        'rgba(6, 82, 221,1.0)',
                        'rgba(24, 220, 255,1.0)',
                        'rgba(197, 108, 240,1.0)',
                        'rgba(255, 184, 184,1.0)',
                        'rgba(61, 61, 61,1.0)',
                        'rgba(170, 166, 157,1.0)',
                        'rgba(255, 121, 63,1.0)',
                        'rgba(0, 148, 50,1.0)'
                    ],
                    borderColor: [                
                        'rgba(217, 128, 250,1.0)',
                        'rgba(253, 167, 223,1.0)',
                        'rgba(6, 82, 221,1.0)',
                        'rgba(24, 220, 255,1.0)',
                        'rgba(197, 108, 240,1.0)',
                        'rgba(255, 184, 184,1.0)',
                        'rgba(61, 61, 61,1.0)',
                        'rgba(170, 166, 157,1.0)',
                        'rgba(255, 121, 63,1.0)',
                        'rgba(0, 148, 50,1.0)'
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
