<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","root","proyectobd");

$sqlQuery = "SELECT year,profit,purchase FROM account";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}



echo json_encode($data);
?>