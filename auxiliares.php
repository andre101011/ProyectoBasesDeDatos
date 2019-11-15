<?php 
chdir($_SERVER['DOCUMENT_ROOT']);
include("ProyectoBasesDeDatos/db.php"); 
include('ProyectoBasesDeDatos/includes/header.php'); 
include('ProyectoBasesDeDatos/login/session.php'); 
$result=mysqli_query($conn, "select * from users where user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
?>


<style>
body {
  height: 100vh;
  min-height: 500px;

  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}
</style>


<main class="container p-4">
  <div class="row">
    <div class="col-md-4">

      <!-- Mensajes -->
      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- Formulario del auxiliar -->
      <div class="card card-body">

        <form action="/proyecto/save.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre"  pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"autofocus required title="El nombre solo puede contener letras">
          </div>
          <input type="submit" name="save_auxiliar" class="btn btn-success btn-block" value="Guardar">
        </form>

      </div>
        <div class="card card-body" style="margin-top: 20px">
          <!--Botón de graficar-->
          
          <a href="/proyecto/graph/index.php?entidad=<?php echo 'auxiliar'?>" class="btn btn-secondary">
          <i class="fas fa-chart-line"></i>
          </a>
        </div>
      </div>

    <div class="col-md-8">

      <table class="table table-bordered table-striped" id="myTable">
        <thead>
          <tr>
            <th>Iniciales</th>
            <th>Nombre</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>


          <?php
          $query = "SELECT * FROM auxiliar";
          $result_auxiliares = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_auxiliares)) { ?>
          <tr>
          <td><?php echo $row['iniciales']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td>

              <!--Botón de editar-->
              <a href="/proyecto/edit.php?id=<?php echo $row['id']?>& entidad=<?php echo 'auxiliar'?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <!--Botón de eliminar-->
              <a href="/proyecto/delete.php?id=<?php echo $row['id'] ?>& entidad=<?php echo 'auxiliar' ?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      
    </div>
  </div>


<!--Javascript para barra de busqueda-->
  <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>



</main>

<?php include('includes/footer.php'); ?>
