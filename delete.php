<?php

include("db.php");

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
  header('Location: auxiliares.php');
}

# Si es un implemento
if  (isset($_GET["codigo"]) AND ($_GET["entidad"]=="implemento")){
  $codigo = $_GET['codigo'];
  $entidad=$_GET['entidad'];
  print "codigo ". $codigo . "  ";
  $query = "DELETE FROM implemento WHERE codigo = ('$codigo')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'implementocon codigo: '. $codigo .' eliminado exitosamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: implementos.php');
}

# Si es un cable
if  (isset($_GET["codigo"]) AND ($_GET["entidad"]=="cable_red")){
  $codigo = $_GET['codigo'];
  $entidad=$_GET['entidad'];
  print "codigo ". $codigo . "  ";
  $query = "DELETE FROM cable_red WHERE codigo = ('$codigo')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'cable con codigo: '. $codigo .' eliminado exitosamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: cables.php');
}

?>
