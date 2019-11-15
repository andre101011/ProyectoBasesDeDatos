<?php
include('db.php');
include('includes/util.php');

//FALTA VALIDAR LAS INICIALES IGUALES PARA EL METODO DE EDITAR AUXILIAR

# Si es un auxiliar
if (isset($_POST['save_auxiliar'])) {

  $nombre= $_POST['nombre'];
  $iniciales = extraerIniciales($nombre);
  $inicialesUnicas  = crearInicialesUnicas($iniciales);
  $query = "INSERT INTO auxiliar(iniciales,nombre) VALUES ('$inicialesUnicas','$nombre')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Falló la inserción del auxiliar");
  }
  header('Location: auxiliares.php');
}


# Si es un profesor
if (isset($_POST['save_profesor'])) {

  $nombre= $_POST['nombre'];
  $cedula= $_POST['cedula'];
  $apellido= $_POST['apellido'];
  $query = "INSERT INTO persona(cedula,nombres,apellidos) VALUES ('$cedula','$nombre','$apellido')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Falló la inserción de la persona");
  }

  $query = "INSERT INTO profesor(cedula) VALUES ('$cedula')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Falló la inserción del profesor");
  }
  header('Location: profesor.php');
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
  $observacion = $_POST['observacion'];

  #Verifica si ya hay un implemento con ese codigo
  $query = "SELECT * FROM implemento WHERE codigo= '$codigo'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 0) {


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
