<?php 
chdir($_SERVER['DOCUMENT_ROOT']);
include('ProyectoBasesDeDatos/login/session.php');
include('ProyectoBasesDeDatos/db.php'); 
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

         <!-- Formulario de Mac -->
      <div class="card card-body">

        <form action="save.php" method="POST">
          <div class="form-group">
            <input type="text" name="codigo" class="form-control" placeholder="Codigo" autofocus>
          </div>
          <div class="form-group">
            <select id="sala_codigo" name="sala_codigo" class="form-control" >
              <option value="#">Seleccione una sala</option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" name="observacion" class="form-control" placeholder="Observacion" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="modelo" class="form-control" placeholder="Modelo" autofocus>
          </div>
          <input type="submit" name="save_mac" class="btn btn-success btn-block" value="Guardar">
        </form>
        
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered table-striped" id="myTable">
 
        <thead>
          <tr>
            <th>Codigo</th>
            <th>Sala_codigo</th>
            <th>Observación</th>
            <th>Modelo</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM mac mac, implemento im WHERE mac.codigo=im.codigo";
          $result_mac = mysqli_query($conn, $query);    
          
          while($row = mysqli_fetch_assoc($result_mac)) { ?>
          <tr>
            <td><?php echo $row['codigo']; ?></td>
            <td><?php echo $row['Sala_codigo']; ?></td>
            <td><?php echo $row['observacion']; ?></td>
            <td><?php echo $row['Modelo']; ?></td>
            <td>
              <!--Botón de editar-->
              <a href="edit.php?codigo=<?php echo $row['codigo']?> & entidad=<?php echo 'mac'?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <!--Botón de eliminar-->
              <a href="delete.php?codigo=<?php echo $row['codigo'] ?>& entidad=<?php echo 'mac'?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
<?php include('includes/footer.php'); ?>
<!--Javascript para barra de busqueda-->
<script>

$( document ).ready(function() {
  $.ajax({
    method: "GET",
    url: "getSala.php"
  }).done(function( data ) {
    $( "#sala_codigo" ).append( data );
  });
});

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

