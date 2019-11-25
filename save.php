<?php
chdir($_SERVER['DOCUMENT_ROOT']);
include('ProyectoBasesDeDatos/login/session.php'); 
include('ProyectoBasesDeDatos/db.php');
include('ProyectoBasesDeDatos/includes/util.php');

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
  header('Location: auxiliar.php');
}

# Si es una sala
if (isset($_POST['save_sala'])) {

  $codigo= $_POST['codigo'];
  $query = "INSERT INTO sala(codigo) VALUES ('$codigo')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Falló la inserción de la sala");
  }
  header('Location: sala.php');
}


# Si es un profesor
if (isset($_POST['save_profesor'])) {
  
  $nombre= $_POST['nombre'];
  $cedula= $_POST['cedula'];
  $apellidos= $_POST['apellidos'];

    #Verifica si ya hay un profesor con ese codigo
    $query = "SELECT * FROM profesor WHERE cedula= '$cedula'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 0) {

      #inserta la persona si no existe
      $query = "INSERT IGNORE INTO persona (cedula, nombres,apellidos) VALUES ('$cedula','$nombre','$apellidos')";
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
    }else{
      $_SESSION['message'] = 'Ya existe una persona con esta cedula';
      $_SESSION['message_type'] = 'danger';
      header('Location: profesor.php');
    }
}



# Si es un estudiante
if (isset($_POST['save_estudiante'])) {
  
  $nombre= $_POST['nombre'];
  $cedula= $_POST['cedula'];
  $apellidos= $_POST['apellidos'];
  $programa= $_POST['programa'];
  $estado= $_POST['estado'];

    #Verifica si ya hay un estudiante con ese codigo
    $query = "SELECT * FROM estudiante WHERE cedula= '$cedula'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 0) {

      #inserta la persona si no existe
      $query = "INSERT IGNORE INTO persona (cedula, nombres,apellidos) VALUES ('$cedula','$nombre','$apellidos')";
      $result = mysqli_query($conn, $query);
      if(!$result) {
        die("Falló la inserción de la persona");
      }
      $query = "INSERT INTO estudiante(cedula,programa,estado) VALUES ('$cedula','$programa','$estado')";
      $result = mysqli_query($conn, $query);
      if(!$result) {
        die("Falló la inserción del estudiante");
      }
      header('Location: estudiante.php');
    }else{
      $_SESSION['message'] = 'Ya existe un estudiante con esta cedula';
      $_SESSION['message_type'] = 'danger';
      header('Location: estudiante.php');
    }
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
    header('Location: implemento.php');
  }else{
    $_SESSION['message'] = 'Ya existe un implemento con este código';
    $_SESSION['message_type'] = 'danger';
    header('Location: implemento.php');
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
    $_SESSION['message'] = 'Cable guardado exitosamente';
    $_SESSION['message_type'] = 'success';
    header('Location: cable_red.php');
  }else{
    $_SESSION['message'] = 'Ya existe un implemento con este código';
    $_SESSION['message_type'] = 'danger';
    header('Location: cable_red.php');
  }
}

# Si es una mac
if (isset($_POST['save_mac'])) {
  $codigo= $_POST['codigo'];
  $sala_codigo= $_POST['sala_codigo'];
  $observacion = $_POST['observacion'];
  $modelo = $_POST{'modelo'};

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
    #Inserta el nuevo mac
    $query = "INSERT INTO mac (codigo, sala_codigo, modelo) VALUES ('$codigo', '$sala_codigo', '$modelo')";
    $result = mysqli_query($conn, $query);
    if(!$result) {
      print $result;
      die("Falló la inserción de la mac");
    }
    $_SESSION['message'] = 'Mac guardada exitosamente';
    $_SESSION['message_type'] = 'success';
    header('Location: mac.php');
  }else{
    $_SESSION['message'] = 'Ya existe un implemento con este código';
    $_SESSION['message_type'] = 'danger';
    header('Location: mac.php');
  }
}

?>
