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
            <input type="text" name="cedula" class="form-control" placeholder="Cedula"  pattern="[0-9]+"autofocus required title="La cedula solo puede contener numeros">
          </div>
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre"  pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"autofocus required title="El nombre solo puede contener letras">
          </div>
          <div class="form-group">
            <input type="text" name="apellido" class="form-control" placeholder="Apellido"  pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"autofocus required title="El apellido solo puede contener letras">
          </div>
          <input type="submit" name="save_profesor" class="btn btn-success btn-block" value="Guardar">
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
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>


          <?php
          $query = "SELECT profesor.cedula, persona.nombres,persona.apellidos FROM persona inner join profesor on persona.cedula = profesor.cedula";
          $result_profesores = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_profesores)) { ?>

          <tr>
            <td><?php echo $row['cedula']; ?></td>
            <td><?php echo $row['nombres']; ?></td>
            <td><?php echo $row['apellidos']; ?></td>
            <td>

              <!--Botón de editar-->
              <a href="/proyecto/edit.php?id=<?php echo $row['cedula']?>& entidad=<?php echo 'persona'?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <!--Botón de eliminar-->
              <a href="/proyecto/delete.php?id=<?php echo $row['cedula'] ?>& entidad=<?php echo 'persona' ?>" class="btn btn-danger">
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
