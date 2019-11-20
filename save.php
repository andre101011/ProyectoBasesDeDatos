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
  header('Location: auxiliares.php');
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
      header('Location: profesores.php');
    }else{
      $_SESSION['message'] = 'Ya existe una persona con esta cedula';
      $_SESSION['message_type'] = 'danger';
      header('Location: profesores.php');
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
      $query = "INSERT IGNORE INTO persona (cedula, nombres,apellidos) VALUES ('$cedula','$nombres','$apellidos')";
      $result = mysqli_query($conn, $query);
      if(!$result) {
        die("Falló la inserción de la persona");
      }
      $query = "INSERT INTO estudiante(cedula,programa,estado) VALUES ('$cedula','$programa','$estado')";
      $result = mysqli_query($conn, $query);
      if(!$result) {
        die("Falló la inserción del estudiante");
      }
      header('Location: estudiantes.php');
    }else{
      $_SESSION['message'] = 'Ya existe un estudiante con esta cedula';
      $_SESSION['message_type'] = 'danger';
      header('Location: estudiantes.php');
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
    $_SESSION['message'] = 'Cable guardado exitosamente';
    $_SESSION['message_type'] = 'success';
    header('Location: cables.php');
  }else{
    $_SESSION['message'] = 'Ya existe un implemento con este código';
    $_SESSION['message_type'] = 'danger';
    header('Location: cables.php');
  }
}

?>
