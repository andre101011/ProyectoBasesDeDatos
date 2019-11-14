<?php
include('db.php');
include('includes/util.php');

//FALTA VALIDAR LAS INICIALES IGUALES PARA EL METODO DE EDITAR AUXILIAR

# Si es un auxiliar
if (isset($_POST['save_auxiliar'])) {

  $nombre= $_POST['nombre'];
  $iniciales = extraerIniciales($nombre);
<<<<<<< HEAD
  $inicialesUnicas  = crearInicialesUnicas($iniciales);
  $query = "INSERT INTO auxiliar(iniciales,nombre) VALUES ('$inicialesUnicas','$nombre')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Falló la inserción del auxiliar");
=======

  #Verifica si ya hay un auxiliar con ese id
  $query = "SELECT * FROM auxiliar WHERE id= '$id'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 0) {
    #Inserta el nuevo auxiliar
    $query = "INSERT INTO auxiliar(iniciales,nombre) VALUES ('$iniciales','$nombre')";
    $result = mysqli_query($conn, $query);
    if(!$result) {
      die("Query Failed.");
    }
    $_SESSION['message'] = 'Auxiliar guardado exitosamente';
    $_SESSION['message_type'] = 'success';
    header('Location: auxiliares.php');
  }else{
    $_SESSION['message'] = 'Ya existe un auxiliar con estas iniciales';
    $_SESSION['message_type'] = 'danger';
    header('Location: auxiliares.php');
>>>>>>> master
  }
  header('Location: auxiliares.php');
}

# Si es un implemento
if (isset($_POST['save_implemento'])) {
  $codigo= $_POST['codigo'];
  $observacion= $_POST['observacion'];

  #Verifica si ya hay un implemento con ese codigo
  $query = "SELECT * FROM implemento WHERE codigo= '$codigo'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 0) {

    #Inserta el nuevo implemento
    $query = "INSERT INTO implemento(codigo, observacion) VALUES ('$codigo', '$observacion')";
    $result = mysqli_query($conn, $query);
    if(!$result) {
      die("Falló la inserción del implemento");
    }
    $_SESSION['message'] = 'Implemento guardado exitosamente';
    $_SESSION['message_type'] = 'success';
    header('Location: implementos.php');
  }else{
    $_SESSION['message'] = 'Ya existe un implemento con este código';
    $_SESSION['message_type'] = 'danger';
    header('Location: implementos.php');
  }
}


# Si es un cable
if (isset($_POST['save_cable_red'])) {
  $codigo= $_POST['codigo'];
  $categoria= $_POST['categoria'];
<<<<<<< HEAD
  $observacion = $_POST['observacion'];

  #Verifica si ya hay un implemento con ese codigo
  $query = "SELECT * FROM implemento WHERE codigo= '$codigo'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 0) {

=======

  #Verifica si ya hay un cable con ese codigo
  $query = "SELECT * FROM cable_red WHERE codigo= '$codigo'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 0) {

    #Inserta el nuevo cable
    $query = "INSERT INTO cable_red (codigo, categoria) VALUES ('$codigo', '$categoria')";
    $result = mysqli_query($conn, $query);
    if(!$result) {
      print $result;
      die("Query Failed.");
    }
    $_SESSION['message'] = 'cable guardado exitosamente';
    $_SESSION['message_type'] = 'success';
    header('Location: cables.php');
  }else{
    $_SESSION['message'] = 'Ya existe un cable con este código';
    $_SESSION['message_type'] = 'danger';
    header('Location: cables.php');
  }
}

>>>>>>> master

    #Inserta el nuevo implemento
    $query = "INSERT INTO implemento (codigo, observacion) VALUES ('$codigo', '$observacion')";
    $result = mysqli_query($conn, $query);
    if(!$result) {
    print $result;
    die("Falló la inserción del implemento");
    }
    #Inserta el nuevo cable
    $query = "INSERT INTO cable_red (codigo, categoria) VALUES ('$codigo', '$categoria')";
    $result = mysqli_query($conn, $query);
    if(!$result) {
      print $result;
      die("Falló la inserción del cable");
    }
    $_SESSION['message'] = 'cable guardado exitosamente';
    $_SESSION['message_type'] = 'success';
    header('Location: cables.php');
  }else{
    $_SESSION['message'] = 'Ya existe un implemento con este código';
    $_SESSION['message_type'] = 'danger';
    header('Location: cables.php');
  }
}




?>
