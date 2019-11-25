<?php session_start(); ?>
<?php include('db.php'); ?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Proyecto BD Sala</title>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<!-- BOOTSTRAP 4 -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<!-- FONT AWESOME -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<!-- CSS -->
		<link href="/ProyectoBasesDeDatos/login/style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		
	
		<div class="login-form">
			<form action="#" method="post">
				<h2 class="text-center">Log in</h2>       
				<div class="form-group">
					<input type="text" name="user"  class="form-control" placeholder="Usuario" required="required">
				</div>
				<div class="form-group">
					<input type="password" name="pass" class="form-control" placeholder="Contraseña" required="required">
				</div>
				<div class="form-group">
					<button type="submit" name="login" value="Login" class="btn btn-primary btn-block">Ingresar</button>
				</div>
				<?php
				if (isset($_POST['login']))
				{
					$username = mysqli_real_escape_string($conn, $_POST['user']);
					$password = mysqli_real_escape_string($conn, $_POST['pass']);
					$query 		= mysqli_query($conn, "SELECT * FROM users WHERE  password='$password' and username='$username'");
					$row		= mysqli_fetch_array($query);
					$num_row 	= mysqli_num_rows($query);
					if ($num_row > 0) 
						{			
							$_SESSION['user_id']=$row['user_id'];
							header('location:/ProyectoBasesDeDatos/auxiliar.php');
						}
					else
						{	
							$result='<div class="alert alert-danger" role="alert">
							Usuario o contraseña invalidos
						</div>';
							echo $result;
						}
				}
				?>
				<div class="clearfix">
				<p class="text-center"><a href="/ProyectoBasesDeDatos/login/sign_up.php">Crear una cuenta</a></p>
				</div>        
			</form>
		
		</div>
	</body>
</html>