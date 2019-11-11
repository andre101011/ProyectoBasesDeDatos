<?php session_start(); ?>
<?php include('../db.php'); ?>

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
		<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="login-form">
    <form action="#" method="post">
        <h2 class="text-center">Sign up</h2> 
		<div class="form-group">
            <input type="text" name="name"  class="form-control" placeholder="Nombre" required="required">
        </div>      
		<div class="form-group">
            <input type="text" name="user"  class="form-control" placeholder="Usuario" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="pass" class="form-control" placeholder="Contraseña" required="required">
		</div>
        <div class="form-group">
            <button type="submit" name="sign_up" value="sign_up"class="btn btn-success btn-block">Registrarse</button>
        </div>
		<?php
	if (isset($_POST['sign_up']))
		{
			$username = mysqli_real_escape_string($conn, $_POST['user']);
			$password = mysqli_real_escape_string($conn, $_POST['pass']);
			$name = mysqli_real_escape_string($conn, $_POST['name']);
			echo $username . $password . $name;
			$query = "INSERT INTO `users`(`username`, `password`, `name`) VALUES ('$username','$password','$name')";
			$result	= mysqli_query($conn,$query);

			if(!$result) {
			  die("Query Failed.");
			}else{
				header('location:../index.php');
			}


		}
  ?>
        <div class="clearfix">
        
        </div>        
    </form>

</div>


</body>

</html>