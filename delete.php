<?php
chdir($_SERVER['DOCUMENT_ROOT']);
include('ProyectoBasesDeDatos/login/session.php');
include("ProyectoBasesDeDatos/db.php");
include('ProyectoBasesDeDatos/login/session.php');

# Si es un auxiliar
if  (isset($_GET["id"]) AND ($_GET["entidad"]=="auxiliar")){
  $id = $_GET['id'];
  $entidad=$_GET['entidad'];
 print "id ". $id . "  ";
  $query = "DELETE FROM auxiliar WHERE id = ('$id')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
  $_SESSION['message'] = 'Auxiliar con ID '. $id . ' eliminado exitosamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: auxiliar.php');
}

# Si es una sala
if  (isset($_GET["codigo"]) AND ($_GET["entidad"]=="sala")){
  $codigo= $_GET['codigo'];
  $entidad=$_GET['entidad'];
 print "codigo ". $codigo . "  ";
  $query = "DELETE codigo, sala_codigo
  FROM sala
  INNER JOIN mac ON sala.codigo = mac.sala_codigo
  WHERE sala.codigo= '$codigo'";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
  $_SESSION['message'] = 'Sala con codigo '. $codigo . ' eliminada exitosamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: sala.php');
}

# Si es un profesor
if  (isset($_GET["cedula"]) AND ($_GET["entidad"]=="profesor")){
  $cedula = $_GET['cedula'];
  $entidad=$_GET['entidad'];
  $query = "DELETE FROM profesor WHERE cedula = ('$cedula')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
  #elimina la persona si no es estudiante
  $query = "DELETE FROM persona WHERE cedula=$cedula AND cedula NOT IN (SELECT est.cedula FROM estudiante est)";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Profesor con cedula: '. $cedula .' eliminado exitosamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: profesor.php');
}

# Si es un estudiante
if  (isset($_GET["cedula"]) AND ($_GET["entidad"]=="estudiante")){
  $cedula = $_GET['cedula'];
  $entidad=$_GET['entidad'];
  $query = "DELETE FROM estudiante WHERE cedula = ('$cedula')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  #elimina la persona si no es profesor
  $query = "DELETE FROM persona WHERE cedula=$cedula AND cedula NOT IN (SELECT pro.cedula FROM profesor pro)";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Estudiante con cedula: '. $cedula .' eliminado exitosamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: estudiante.php');
}


# Si es un implemento
if  (isset($_GET["codigo"]) AND ($_GET["entidad"]=="implemento" OR $_GET["entidad"]=="mac")){
  $codigo = $_GET['codigo'];
  $entidad=$_GET['entidad'];
  $query = "DELETE FROM implemento WHERE codigo = ('$codigo')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
  $_SESSION['message'] = $entidad . ' con codigo: '. $codigo .' eliminado exitosamente';
  $_SESSION['message_type'] = 'danger';

  header('Location:'.$entidad.'.php');
}

# Si es un cable
if  (isset($_GET["codigo"]) AND ($_GET["entidad"]=="cable_red")){
  $codigo = $_GET['codigo'];
  $entidad=$_GET['entidad'];
  $query = "DELETE FROM implemento WHERE codigo = ('$codigo')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
  $query = "DELETE FROM cable_red WHERE codigo = ('$codigo')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
  $_SESSION['message'] = 'Cable con codigo: '. $codigo .' eliminado exitosamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: cable_red.php');
}





?>
