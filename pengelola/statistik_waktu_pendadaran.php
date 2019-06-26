<html>

<?php 
	include "Class_Analitik.php";
	$akses = new Analitik();
	$akses->connect();
 ?>


<head>
	<title>Grafik</title>
	<script type="text/javascript" src="chartjs/Chart.js"></script>
</head>
<body>
	<?php 
	include 'navbar.php';
	?>
	<style type="text/css">
	body{
		font-family: roboto;
	}

	table{
		margin: 0px auto;
	}
	</style>


	<center>
		<h2>GRAFIK WAKTU PENDADARAN<br>Pendadaran & Seminar Proposal<br/>-Analitik-</h2>
	
	<br><br>

	<form action="tampilan_pendadaran.php" method="POST">
		Masukkan Tanggal :  <input type="text" name="tanggal">
		<input type="submit">
	</form>
	</center>
	<?php if(isset($_POST['tanggal'])){
		$tgl = $_POST['tanggal'];
		
	} ?>

	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>

	<br/>
	<br/>

	<!--  -->


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ['waktu_1','waktu_2','waktu_3'],
				datasets: [{
					label: '',
					data: [
					<?php 
						foreach($akses->waktu_pendadaran1($tgl) as $k){
					echo" $k[jumlah1]"; 
					}?>,
					<?php 
					foreach($akses->waktu_pendadaran2($tgl) as $k){
					echo" $k[jumlah2]"; 
					}?>,
					<?php 
					foreach($akses->waktu_pendadaran3($tgl) as $k){
					echo" $k[jumlah3]"; 
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
	</body>
</html>