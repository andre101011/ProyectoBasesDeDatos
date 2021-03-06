<?php 
chdir($_SERVER['DOCUMENT_ROOT']);
include('ProyectoBasesDeDatos/login/session.php'); 
include('ProyectoBasesDeDatos/db.php'); 
include('ProyectoBasesDeDatos/includes/header.php'); 
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
      <?php //session_unset(); 
      unset( $_SESSION['message']);
    } ?>

      <!-- Formulario del profesor -->
      <div class="card card-body">

        <form action="/ProyectoBasesDeDatos/save.php" method="POST">
          <div class="form-group">
            <input type="text" name="cedula" class="form-control" placeholder="Cedula"  pattern="[0-9]+"autofocus required title="La cedula solo puede contener numeros">
          </div>
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre"  pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"autofocus required title="El nombre solo puede contener letras">
          </div>
          <div class="form-group">
            <input type="text" name="apellidos" class="form-control" placeholder="Apellidos"  pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"autofocus required title="El apellidos solo puede contener letras">
          </div>
          <input type="submit" name="save_profesor" class="btn btn-success btn-block" value="Guardar">
        </form>

      </div>


      <div class="card card-body" style="margin-top: 20px">

          <!--Botón de reporte-->
          <a href="/ProyectoBasesDeDatos/pdf/reporte_profesores.php?" class="btn btn-light">
            <i class="far fa-file-pdf"></i>
            Listar por nombre y ID profesores que ven dan clase los lunes
          </a>


        </div>
      </div>

    <div class="col-md-8">

      <table class="table table-bordered table-striped" id="myTable">
        <thead>
          <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>


          <?php
          $query = "SELECT * FROM profesor pro, persona per WHERE pro.cedula=per.cedula";
          $result_profesores = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_profesores)) { ?>
          <tr>
            <td><?php echo $row['cedula']; ?></td>
            <td><?php echo $row['nombres']; ?></td>
            <td><?php echo $row['apellidos']; ?></td>
            <td>

              <!--Botón de editar-->
              <a href="/ProyectoBasesDeDatos/edit.php?cedula=<?php echo $row['cedula']?>& entidad=<?php echo 'profesor'?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <!--Botón de eliminar-->
              <a href="/ProyectoBasesDeDatos/delete.php?cedula=<?php echo $row['cedula'] ?>& entidad=<?php echo 'profesor'?>" class="btn btn-danger">
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
