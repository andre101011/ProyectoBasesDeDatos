<?php
include("db.php");
include("includes/util.php");
$nombre='';
include('includes/header.php');

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
    header('Location: auxiliares.php');
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
    header('Location: implementos.php');
  }
}

//Codigo para editar cable
if  (isset($_GET["codigo"]) AND ($_GET['entidad']=='cable_red')){
  $codigo = $_GET['codigo'];
  $entidad =$_GET['entidad'];
  $query = "SELECT * FROM cable_red WHERE codigo= '$codigo'";
  $result = mysqli_query($conn, $query);
  
  if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $categoria = $row['categoria'];
    }

  if (isset($_POST['update_cable_red'])) {
    $codigo = $_GET['codigo'];
    $categoria = $_POST['categoria'];
    $query = "UPDATE cable_red set categoria='$categoria' WHERE codigo='$codigo'";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'cable de red con codigo: '. $codigo .' actualizado exitosamente';
    $_SESSION['message_type'] = 'warning';
    header('Location: cables.php');
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
