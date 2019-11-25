<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Proyecto BD Sala</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    
  </head>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
    <a class="navbar-brand" href="#">Proyecto BD Sala</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="/ProyectoBasesDeDatos/auxiliar.php">Auxiliares</a>
        </li>
        </li>
        <a class="nav-link" href="/ProyectoBasesDeDatos/profesor.php">Profesores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/ProyectoBasesDeDatos/estudiante.php">Estudiantes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/ProyectoBasesDeDatos/sala.php">Sala</a>
        </li>
          <a class="nav-link" href="/ProyectoBasesDeDatos/cable_red.php">Cables</a>
        </li>
        </li>
          <a class="nav-link" href="/ProyectoBasesDeDatos/mac.php">Mac</a>
        </li>
        <!--
        <li class="nav-item">
          <a class="nav-link" href="/ProyectoBasesDeDatos/implementos.php">Implementos</a>
        </li>
        -->
        

      </ul>
      
      <ul class="navbar-nav">
      
        <form class="form-inline">
          <!--Barra de busqueda-->
          <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por ID" aria-label="Search" id="myInput">
        </form>
        
      </ul>


      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="/ProyectoBasesDeDatos/login/logout.php" class="nav-link">
          <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
          </a>
        </li>
      </ul>
    </div>
  </nav>









  
