<?php
include("db.php");
$nombre='';
include('includes/header.php');


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
    $query = "UPDATE auxiliar set id='$iniciales',nombre = '$nombre' WHERE id='$id'";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Auxiliar con ID: '. $id .' actualizado exitosamente';
    $_SESSION['message_type'] = 'warning';
    header('Location: auxiliares.php');
  }
}


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
?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">

      <!--Interfaz para auxiliares-->
      <?php if($_GET['entidad']=='auxiliar'): ?>
      <form action="edit.php?id=<?php echo $_GET['id'] ?>& entidad=<?php echo $_GET['entidad'] ?>" method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">Nombre</label>
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

<?php
function extraerIniciales($nombre) {
  $expr = '/(?<=\s|^)[a-z]/i';
    preg_match_all($expr, $nombre, $matches);
  $id = implode('', $matches[0]);
  $id = strtoupper($id);
  return $id;
}
?>