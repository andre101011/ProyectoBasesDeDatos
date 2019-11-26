<?php 
chdir($_SERVER['DOCUMENT_ROOT']);
include('ProyectoBasesDeDatos/login/session.php'); 
include("ProyectoBasesDeDatos/db.php");  
include('ProyectoBasesDeDatos/includes/header.php'); 
?>

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

      <!-- Formulario del auxiliar -->
      <div class="card card-body">

        <form action="/ProyectoBasesDeDatos/save.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre"  pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"autofocus required title="El nombre solo puede contener letras">
          </div>
          <input type="submit" name="save_auxiliar" class="btn btn-success btn-block" value="Guardar">
        </form>

      </div>
        <div class="card card-body" style="margin-top: 20px">

          <!--Botón de reporte-->
          <a href="/ProyectoBasesDeDatos/pdf/reporte_auxiliares.php?" class="btn btn-light">
          <i class="far fa-file-pdf"></i>
          ID's de auxiliares que han hecho entradas en la minuta
          </a>

          <a href="/ProyectoBasesDeDatos/pdf/reporte_auxiliares_2.php?" class="btn btn-secondary">
          <i class="far fa-file-pdf"></i>
          <i class="fas fa-chart-bar"></i>
          Cantidad de implementos que ha prestado cada auxiliar
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
              <a href="/ProyectoBasesDeDatos/edit.php?id=<?php echo $row['id']?>& entidad=<?php echo 'auxiliar'?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <!--Botón de eliminar-->
              <a href="/ProyectoBasesDeDatos/delete.php?id=<?php echo $row['id'] ?>& entidad=<?php echo 'auxiliar' ?>" class="btn btn-danger">
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
  //Obtiene la cadena para filtrar
  input = document.getElementById("myInput");
  //Pasa la cadena a mayúsculas
  filter = input.value.toUpperCase();
  //Obtiene la tabla
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
