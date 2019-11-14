
<?php

function crearInicialesUnicas($iniciales){
  $conn = $GLOBALS['conn'];
  $i = 0;
  $iniciales_originales = $iniciales;
  do {
    $query = "SELECT * FROM auxiliar WHERE iniciales= '$iniciales'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
      //Si ya existe en la BD
      $i++;
      $iniciales = $iniciales_originales . $i;
      $seguir = True;
      }else{
        //Si no existe en la BD
        return $iniciales;
        $seguir = False;
      }
      print("entra");
  }while($seguir);
}



function extraerIniciales($nombre) {
  $expr = '/(?<=\s|^)[a-z]/i';
    preg_match_all($expr, $nombre, $matches);
  $id = implode('', $matches[0]);
  $id = strtoupper($id);
  return $id;
}

?>