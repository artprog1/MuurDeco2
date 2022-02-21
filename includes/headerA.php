<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Muur Deco Shop</title>
    <link rel="stylesheet" href="../style.css">

    <!-- El resto del front end va aqui -->
  </head>

  <body>
    <nav>
      <div class="wrapper">
        <ul>
          <!-- Indexamos los diferentes Portales disponibles -->

        <!--Verificamos si esta ingresado-->
          <?php
          if (isset($_SESSION["useruid"])) {
            echo "<li> <a href='view.php'> Perfil </a> </li>";
            echo '<li> <a href="view.php"> Administración </a> </li>';
            echo '<li> <a href="view.php"> Ventas </a> </li>';
            echo '<li> <a href="view.php"> Diseño </a> </li>';
            echo '<li> <a href="view.php"> Producción </a> </li>';
            echo '<li> <a href="view.php"> Dirección de Proyectos </a> </li>';
            echo "<li> <a href='../signup.php'> Administración del Personal </a> </li>";
            echo "<li> <a href='logout.inc.php'> Terminar Session  </a> </li>";
          }
          else {
            echo "<li> <a href='../login.php'> Ingresar  </a> </li>";


          }
           ?>
        <!-- Portal para el administrador -->
          <!-- <li> <a href="signup.php"> Registro </a> </li>
          <li> <a href="login.php"> Ingreso </a> </li> -->
          <!-- <li> <a href="administrador.php"> Registro </a> </li>
          <li> <a href="administrador.php"> Ayuda </a> </li> -->
        </ul>
      </div>
    </nav>

        <div class="wrapper">
