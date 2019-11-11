<?php

include('db.php');

# Si es un auxiliar
if (isset($_POST['save_auxiliar'])) {

  $nombre= $_POST['nombre'];
  $id = extraerIniciales($nombre);

  #Verifica si ya hay un auxiliar con ese id
  $query = "SELECT * FROM auxiliar WHERE id= '$id'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 0) {
    #Inserta el nuevo auxiliar
    $query = "INSERT INTO auxiliar(id,nombre) VALUES ('$id','$nombre')";
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
      die("Query Failed.");
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



function extraerIniciales($nombre) {
  $expr = '/(?<=\s|^)[a-z]/i';
    preg_match_all($expr, $nombre, $matches);
  $id = implode('', $matches[0]);
  $id = strtoupper($id);
  return $id;
}

?>
