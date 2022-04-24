<?php
  session_start();
  // print_r($_POST);

 ?>
<!-- ejemplo2 -->
<!-- Establecemos el header como HTML -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/dashboard/">
    <title>Muur Deco Shop</title>
    <!-- INCLUIMOS BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="../../dist/css/bootstrap.min.css">
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">

<!-- Incluimos el archivo de CSS a utilizar con un path completo -->
    <!-- <link rel="stylesheet" href="css/reset.css" /> -->
    <!-- <link rel="stylesheet" href="css/style0.css"> -->


  </head>
<!-- Inicia el header de cada pagina -->
  <body>
<!-- test -->
<!-- Se comienza el div de todo el contenido -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg navbar-light bg-light">
     <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- La lista de abajo son los modulos que se van a crear -->
      <div  class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="index.php">MuurDeco's WorkShop <h6><?php echo $_SESSION["nombreUsuario"]; ?></h6></a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <?php
          // FOLDER DEPENDE DEL SERVIDOR
          $folder = "http://localhost:8888/MuurDecoShop2/";
          // $folder = "https://muurdeco.online/";
          if (isset($_SESSION["useruid"]) && $_SESSION["departamento"] == 104 || $_SESSION["departamento"] == 105 ) {
          // if (isset$_SESSION["useruid"]) && $_SESSION["departamento"] == 104) {
            require_once 'includes/caducarSesion.php';
            echo "<li class='nav-item'> <a class='nav-link' href='".$folder."dashboard.php'>Tablero <span class='sr-only'>(current)</span></a> </li>";
            echo "<li class='nav-item'> <a class='nav-link' href='".$folder."ventas.php'>Ventas </a> </li>";
            echo "<li class='nav-item'> <a class='nav-link' href='".$folder."administracion.php'>Administración </a> </li>";
            echo "<li class='nav-item'> <a class='nav-link' href='".$folder."diseno.php'>Diseño </a> </li>";
            echo "<li class='nav-item'> <a class='nav-link' href='".$folder."produccion.php'>Producción</a> </li>";
            echo "<li class='nav-item'> <a class='nav-link' href='".$folder."direccion.php'>Dirección de Proyectos </a> </li>";
            echo "<li class='nav-item'> <a class='nav-link' href='".$folder."inventario.php'>Inventario</a> </li>";
            echo "<li class='nav-item'> <a class='nav-link' href='".$folder."registros.php'>Provedores</a> </li>";
            // echo "<li class='nav-item'> <a class='nav-link' href='signup.php'>Administración del Personal </a> </li>";
            echo "<li class='nav-item'> <a class='nav-link' href='".$folder."includes/logout.inc.php'>Terminar Session  </a> </li>";
          }
          // HEADER DE VENTAS
          elseif (isset($_SESSION["useruid"]) && $_SESSION["departamento"] == 103)
          {
            echo "<li class='nav-item'> <a class='nav-link' href='".$folder."ventas.php'>Ventas <span class='sr-only'>(current)</span></a> </li>";
            echo "<li class='nav-item'> <a class='nav-link' href='".$folder."includes/logout.inc.php'>Terminar Session  </a> </li>";
          }

          elseif (isset($_SESSION["useruid"]) && $_SESSION["departamento"] == 102)
          {
            echo "<li class='nav-item'> <a class='nav-link' href='".$folder."administracion.php'>Administración <span class='sr-only'>(current)</span></a> </li>";
            echo "<li class='nav-item'> <a class='nav-link' href='".$folder."includes/logout.inc.php'>Terminar Session  </a> </li>";
          }

          elseif (isset($_SESSION["useruid"]) && $_SESSION["departamento"] == 107)
          {
            echo "<li class='nav-item'> <a class='nav-link' href='".$folder."diseno.php'>Diseño </a> </li>";
            echo "<li class='nav-item'> <a class='nav-link' href='".$folder."includes/logout.inc.php'>Terminar Session  </a> </li>";
          }

          elseif (isset($_SESSION["useruid"]) && $_SESSION["departamento"] == 108)
          {
            echo "<li class='nav-item'> <a class='nav-link' href='".$folder."produccion.php'>Producción</a> </li>";
            echo "<li class='nav-item'> <a class='nav-link' href='".$folder."includes/logout.inc.php'>Terminar Session  </a> </li>";
          }

          elseif (isset($_SESSION["useruid"]) && $_SESSION["departamento"] == 109)
          {
            echo "<li class='nav-item'> <a class='nav-link' href='".$folder."direccion.php'>Dirección de Proyectos </a> </li>";
            echo "<li class='nav-item'> <a class='nav-link' href='".$folder."includes/logout.inc.php'>Terminar Session  </a> </li>";
          }

          elseif (isset($_SESSION["useruid"]) && $_SESSION["departamento"] == 106)
          {
            echo "<li class='nav-item'> <a class='nav-link' href='".$folder."inventario.php'>Inventario</a> </li>";
            echo "<li class='nav-item'> <a class='nav-link' href='".$folder."registros.php'>Provedores</a> </li>";
            echo "<li class='nav-item'> <a class='nav-link' href='".$folder."includes/logout.inc.php'>Terminar Session  </a> </li>";

          }

          // De no estar ingresado, se mostrara solo la opcion de ingresar
          else {
            echo "<li class='nav-item'> <a class='nav-link' href='".$folder."login.php'>Ingresar<span class='sr-only'>(current)</span></a></li>";
          }
           ?>

        </ul>

      </div>
    </div>
    </nav>

  <!-- <h1 id="titulo">Muur Deco's WorkShop</h1> -->
        <div class="wrapper">
