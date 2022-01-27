<?php
// Se inicia la session
  session_start();
  print_r($_POST);
  	if(isset($_POST) & !empty($_POST)){
  		if($_POST['captcha'] == $_SESSION['code']){
  			echo "correct captcha";
  		}else{
  			echo "Invalid captcha";
  		}
  	}
 ?>
<!-- ejemplo2 -->
<!-- Establecemos el header como HTML -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Muur Deco Shop</title>
<!-- Incluimos el archivo de CSS a utilizar con un path completo -->
    <link rel="stylesheet" href="css/style.css" />

  </head>
<!-- Inicia el header de cada pagina -->
  <body>
<!-- test -->
<!-- Se comienza el div de todo el contenido -->
    <nav>
      <!-- La lista de abajo son los modulos que se van a crear -->
      <div class="table" id="headerList">
        <ul id="horizontal-list">
          <!-- Indexamos los diferentes Portales disponibles -->

        <!--Verificamos si esta ingresado, de ser asi, se mostrara el siguente menu-->
          <?php
          if (isset($_SESSION["useruid"])) {
            echo "<li> <a href='index.php'> Perfil </a> </li>";
            echo '<li> <a href="index.php"> Administración </a> </li>';
            echo '<li> <a href="index.php"> Ventas </a> </li>';
            echo '<li> <a href="index.php"> Diseño </a> </li>';
            echo '<li> <a href="index.php"> Producción </a> </li>';
            echo '<li> <a href="index.php"> Dirección de Proyectos </a> </li>';
            echo "<li> <a href='signup.php'> Administración del Personal </a> </li>";
            echo "<li> <a href='includes/logout.inc.php'> Terminar Session  </a> </li>";
          }
          // De no estar ingresado, se mostrara solo la opcion de ingresar
          else {
            echo "<li> <a href='login.php'> Ingresar  </a> </li>";
          }
           ?>

        </ul>

      </div>

    </nav>

  <h1 id="titulo">Muur Deco's WorkShop</h1>
        <div class="wrapper">
