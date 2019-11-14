

<?php include('../includes/header.php'); ?>
<?php
	/* Database connection settings */
	$host = 'localhost';
	$user = 'root';
	$pass = 'root';
	$db = 'proyectobd';
	$conn = mysqli_connect("localhost","root","root","proyectobd")or die($conn->error);

	$year = '';
	$profit = '';

	chdir($_SERVER['DOCUMENT_ROOT']);
	include('proyecto/login/session.php'); 
	$result=mysqli_query($conn, "select * from users where user_id='$session_id'")or die('Error In Session');
	$row=mysqli_fetch_array($result);

	//query to get data from the table
	$sql = "SELECT * FROM `account` ";
    $result = mysqli_query($conn, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

		$year = $year . '"'. $row['year'].'",';
		$profit = $profit . '"'. $row['profit'] .'",';
	}
	$year = trim($year,",");
	$profit = trim($profit,",");
?>


<!DOCTYPE html>
<html>
	<head>
	    <!-- BOOTSTRAP 4 -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/Chart.min.js"></script>

		<title>Grafica</title>

		<style type="text/css">			

			.container {
				color: #E8E9EB;
					background: black;
					padding: 10px;
			}
			
		</style>
		
	</head>

	<body>	   
		<div class="container"  style="width: 100%; height: 65% ;  margin-top: 50px;">
			<div class="row">
				<div class="col-12">
					<div class="card">
							<canvas id="chart" style=" background: #222;"></canvas>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

<script>
								var ctx = document.getElementById("chart").getContext('2d');
								var myChart = new Chart(ctx, {
									//Tipo de grafica
<<<<<<< HEAD
									type: 'doughnut',
=======
									type: 'line',
>>>>>>> master
									data: {
										labels: [1,2,3,4,5,6,7,8,9],
										datasets: 
										[{
											backgroundColor: 'rgba(255,99,132,0.1)',
											hoverBackgroundColor: 'rgba(255,255,255, 0.5)',
											//hoverBorderColor: '#FFFFFF',
											label: 'Data 1',
											data: [<?php echo $year; ?>],
											borderColor:'rgba(255,99,132)',
											borderWidth: 3
												
										},

										{
											label: 'Data 2',
											hoverBackgroundColor: 'rgba(255,255,255, 0.5)',
											data: [<?php echo $profit; ?>],
											backgroundColor: 'rgba(0,255,255,0.1)',
											borderColor:'rgba(0,255,255)',
											borderWidth: 3	
										}]
									},
								
									options: {
										scales: 
										{
											yAxes: [{
												gridLines: {color: 'gray'},
												beginAtZero: false,
												scaleLabel: {
													display: true,
													labelString: 'Titulo Y'
												}
											}],
											xAxes: [{
												
												gridLines: {color: 'gray'},
												autoskip: true,
												maxTicketsLimit: 20,
												scaleLabel: {
													display: true,
													labelString: 'Titulo X'
												}
											}]
										},
										/*DESCOMENTAR PARA USAR LA GRAFICA RADIAL
										scale: {
											gridLines: {color: 'gray'},
											angleLines: { color: 'gray' } 
											},
											*/
										tooltips:{mode: 'index'},
										legend:{
											display: true,
											position: 'top',
										},
										stacked:true
										
									}
								});
							</script>