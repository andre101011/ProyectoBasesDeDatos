<?php
chdir($_SERVER['DOCUMENT_ROOT']);
include('ProyectoBasesDeDatos/login/session.php');
include('ProyectoBasesDeDatos/db.php');
include('ProyectoBasesDeDatos/includes/util.php');
include('ProyectoBasesDeDatos/includes/header.php');


//Codigo para editar auxiliar
if  (isset($_GET["id"]) AND ($_GET['entidad']=='auxiliar')){
  $id = $_GET['id'];
  $entidad  =$_GET['entidad'];
  $query = "SELECT * FROM auxiliar WHERE id= '$id'";
  $result = mysqli_query($conn, $query);
  
  if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $nombre = $row['nombre'];
  }

  if (isset($_POST['update_auxiliar'])) {
    $id = $_GET['id'];
    $nombre= $_POST['nombre'];
    $iniciales = extraerIniciales($nombre);
    $iniciales = crearInicialesUnicas($iniciales);
    $query = "UPDATE auxiliar set iniciales='$iniciales',nombre = '$nombre' WHERE id='$id'";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Auxiliar con ID: '. $id .' actualizado exitosamente';
    $_SESSION['message_type'] = 'warning';
    header('Location: auxiliar.php');
  }
}


//Codigo para editar profesor
if  (isset($_GET["cedula"]) AND ($_GET['entidad']=='profesor')){
  $cedula = $_GET['cedula'];
  $entidad =$_GET['entidad'];
  $query = "SELECT * FROM persona per, profesor pro WHERE per.cedula=pro.cedula AND pro.cedula=$cedula";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $cedula = $row['cedula'];
      $nombres = $row['nombres'];
      $apellidos = $row['apellidos'];
    }
  if (isset($_POST['update_profesor'])) {
    $cedula = $_GET['cedula'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $query = "UPDATE persona set nombres='$nombres',apellidos='$apellidos' WHERE cedula=$cedula";
    mysqli_query($conn, $query);
    //$query = "UPDATE profesor set cedula='$cedula' WHERE cedula='$cedula'";
    //mysqli_query($conn, $query);
    $_SESSION['message'] = 'Profesor con cedula: '. $cedula .' actualizado exitosamente';
    $_SESSION['message_type'] = 'warning';
    header('Location: profesor.php');
  }
}

//Codigo para editar estudiante
if  (isset($_GET["cedula"]) AND ($_GET['entidad']=='estudiante')){
  $cedula = $_GET['cedula'];
  $entidad =$_GET['entidad'];
  $query = "SELECT * FROM persona per, estudiante est WHERE per.cedula=est.cedula AND est.cedula=$cedula";
  $result = mysqli_query($conn, $query);
    
  if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $cedula = $row['cedula'];
      $nombres = $row['nombres'];
      $apellidos = $row['apellidos'];
      $programa = $row['programa'];
      $estado = $row['estado'];
    }

  if (isset($_POST['update_estudiante'])) {
    $cedula = $_GET['cedula'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $programa = $_POST['programa'];
    $estado = $_POST['estado'];
    $query = "UPDATE persona set nombres='$nombres',apellidos='$apellidos' WHERE cedula=$cedula";
    mysqli_query($conn, $query);
    $query = "UPDATE estudiante set programa='$programa',estado='$estado' WHERE cedula=$cedula";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'estudiante con cedula: '. $cedula .' actualizado exitosamente';
    $_SESSION['message_type'] = 'warning';
    header('Location: estudiante.php');
  }
}

//Codigo para editar implemento
if  (isset($_GET["codigo"]) AND ($_GET['entidad']=='implemento')){
  $codigo = $_GET['codigo'];
  $entidad =$_GET['entidad'];
  $query = "SELECT * FROM implemento WHERE codigo= '$codigo'";
  $result = mysqli_query($conn, $query);
  
  
  if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $observacion = $row['observacion'];
    }

  if (isset($_POST['update_implemento'])) {
    $codigo = $_GET['codigo'];
    $observacion = $_POST['observacion'];
    $query = "UPDATE implemento set observacion='$observacion' WHERE codigo='$codigo'";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Implemento con codigo: '. $codigo .' actualizado exitosamente';
    $_SESSION['message_type'] = 'warning';
    header('Location: implemento.php');
  }
}

//Codigo para editar cable
if  (isset($_GET["codigo"]) AND ($_GET['entidad']=='cable_red')){
  $codigo = $_GET['codigo'];
  $entidad =$_GET['entidad'];
  $query = "SELECT * FROM implemento im, cable_red cr WHERE im.codigo=cr.codigo='$codigo'";
  $result = mysqli_query($conn, $query);
  
  if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $categoria = $row['categoria'];
      $observacion = $row['observacion'];
    }

  if (isset($_POST['update_cable_red'])) {
    $codigo = $_GET['codigo'];
    $categoria = $_POST['categoria'];
    $observacion = $_POST['observacion'];
    $query = "UPDATE implemento set observacion='$observacion' WHERE codigo='$codigo'";
    mysqli_query($conn, $query);
    $query = "UPDATE cable_red set categoria='$categoria' WHERE codigo='$codigo'";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Cable de red con codigo: '. $codigo .' actualizado exitosamente';
    $_SESSION['message_type'] = 'warning';
    header('Location: cable_red.php');
  }
}



//Codigo para editar mac
if  (isset($_GET["codigo"]) AND ($_GET['entidad']=='mac')){
  $codigo = $_GET['codigo'];
  $entidad =$_GET['entidad'];
  $query = "SELECT * FROM implemento im, mac WHERE im.codigo=mac.codigo AND mac.codigo='$codigo'";
  $result = mysqli_query($conn, $query);
  $modelo="ggg";

  if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $observacion = $row['observacion'];
      $sala_codigo = $row['sala_codigo'];
      $modelo = $row['modelo'];
    }

  if (isset($_POST['update_mac'])) {
    $codigo = $_GET['codigo'];
    $sala_codigo = $_POST['sala_codigo'];
    $observacion = $_POST['observacion'];
    $modelo = $_POST['modelo'];

    $query = "UPDATE implemento set observacion='$observacion' WHERE codigo='$codigo'";
    mysqli_query($conn, $query);
    $query = "UPDATE mac set modelo='$modelo',sala_codigo='$sala_codigo' WHERE codigo='$codigo'";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Mac con codigo: '. $codigo .' actualizado exitosamente';
    $_SESSION['message_type'] = 'warning';
    header('Location: mac.php');
  }
}



?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">

      <!--Interfaz para auxiliares-->
      <?php if($_GET['entidad']=='auxiliar'): ?>
      <form action="edit.php?id=<?php echo $_GET['id'] ?>& entidad=<?php echo $_GET['entidad'] ?>" method="POST">
      <div class="form-group">
        <label for="nombre">Nombre</label>
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Actualizar nombre" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"autofocus required title="El nombre solo puede contener letras">
        </div>


        
              <!--Interfaz para profesores-->
      <?php elseif($_GET['entidad']=='profesor'): ?>
      <form action="edit.php?cedula=<?php echo $_GET['cedula']?>&entidad=<?php echo $_GET['entidad'] ?>" method="POST">
      <div class="form-group">
        <label for="cedula">Cedula</label>
        <input name="cedula" type="text" class="form-control" value="<?php echo $cedula; ?>" placeholder="Actualizar cedula" readonly  >
      </div>
      <div class="form-group">
        <label for="nombres">Nombre</label>
        <input name="nombres" type="text" class="form-control" value="<?php echo $nombres; ?>" placeholder="Actualizar nombre" >
      </div>
      <div class="form-group">
        <label for="apellidos">Apellidos</label>
        <input name="apellidos" type="text" class="form-control" value="<?php echo $apellidos; ?>" placeholder="Actualizar apellidos" >
      </div>


      
              <!--Interfaz para estudiantes-->
              <?php elseif($_GET['entidad']=='estudiante'): ?>
      <form action="edit.php?cedula=<?php echo $_GET['cedula']?>&entidad=<?php echo $_GET['entidad'] ?>" method="POST">
      <div class="form-group">
        <label for="cedula">Cedula</label>
        <input name="cedula" type="text" class="form-control" value="<?php echo $cedula; ?>" placeholder="Actualizar cedula" readonly  >
      </div>
      <div class="form-group">
        <label for="nombres">Nombre</label>
        <input name="nombres" type="text" class="form-control" value="<?php echo $nombres; ?>" placeholder="Actualizar nombre" >
      </div>
      <div class="form-group">
        <label for="apellidos">Apellidos</label>
        <input name="apellidos" type="text" class="form-control" value="<?php echo $apellidos; ?>" placeholder="Actualizar apellidos" >
      </div>
      <div class="form-group">
        <label for="programa">Programa</label>
        <input name="programa" type="text" class="form-control" value="<?php echo $programa; ?>" placeholder="Actualizar programa" >
      </div>
      <div class="form-group">
        <label for="estado">Estado</label>
        <input name="estado" type="text" class="form-control" value="<?php echo $estado; ?>" placeholder="Actualizar estados" >
      </div>
        
        
      <!--Interfaz para implementos-->
      <?php elseif($_GET['entidad']=='implemento'): ?>
      <form action="edit.php?codigo=<?php echo $_GET['codigo']?>&entidad=<?php echo $_GET['entidad'] ?>" method="POST">
      <div class="form-group">
        <label for="codigo">Código</label>
        <input name="codigo" type="text" class="form-control" value="<?php echo $codigo; ?>" placeholder="Actualizar codigo" readonly  >
      </div>
      <div class="form-group">
        <label for="observacion">Observacion</label>
        <input name="observacion" type="text" class="form-control" value="<?php echo $observacion; ?>" placeholder="Actualizar observacion" >
      </div>


      <!--Interfaz para cables-->
      <?php elseif($_GET['entidad']=='cable_red'): ?>
      <form action="edit.php?codigo=<?php echo $_GET['codigo']?>&entidad=<?php echo $_GET['entidad'] ?>" method="POST">
      <div class="form-group">
        <label for="codigo">Código</label>
        <input name="codigo" type="text" class="form-control" value="<?php echo $codigo; ?>" placeholder="Actualizar codigo" readonly  >
      </div>
      <div class="form-group">
        <label for="categoria">Categoría</label>
        <input name="categoria" type="text" class="form-control" value="<?php echo $categoria; ?>" placeholder="Actualizar categoría" >
      </div>
      <div class="form-group">
        <label for="observacion">Observacion</label>
        <input name="observacion" type="text" class="form-control" value="<?php echo $observacion; ?>" placeholder="Actualizar categoría" >
      </div>


      <!--Interfaz para mac-->
      <?php elseif($_GET['entidad']=='mac'): ?>
      <form action="edit.php?codigo=<?php echo $_GET['codigo']?>&entidad=<?php echo $_GET['entidad'] ?>" method="POST">
      <div class="form-group">
        <label for="codigo">Código</label>
        <input name="codigo" type="text" class="form-control" value="<?php echo $codigo; ?>" placeholder="Actualizar codigo" readonly  >
      </div>
      <div class="form-group">
        <label for="sala_codigo">Sala</label>
        <select id="sala_codigo" name="sala_codigo" class="form-control" >
          <option value="#">Seleccione una sala</option>
        </select>
      </div>
      <div class="form-group">
        <label for="observacion">Observacion</label>
        <input name="observacion" type="text" class="form-control" value="<?php echo $observacion; ?>" placeholder="Actualizar categoría" >
      </div>
      <div class="form-group">
        <label for="modelo">Modelo</label>
        <input name="modelo" type="text" class="form-control" value="<?php echo $modelo; ?>" placeholder="Actualizar modelo" >
      </div>

      <?php endif?>

        <button class="btn btn-success" name="update_<?php echo$_GET['entidad']?>">
          Actualizar
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>


<script>
$( document ).ready(function() {
  $.ajax({
    method: "GET",
    url: "getSala.php"
  }).done(function( data ) {
    $( "#sala_codigo" ).append( data );
  });
});
</script>