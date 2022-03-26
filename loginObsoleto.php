<?php
  include_once 'header.php'


 ?>

<!--

      <section class="index-intro">
        <h2>Ingreso al Portal</h2> -->
        <div class="user-login-box" style="max-width: 500px; margin: auto; ">
          <div class="header">
            <h1 class="fw-light text-white m-0">Bienvenido!</h1>
            <h5 class="fw-light text-white m-0">— Ingresa tus credenciales —</h5>
          </div>

          <div class="dropdown-divider"></div>

        <form class="px-4 py-3" action="includes/login.inc.php" method="post">
          <div class="form-group">
            <label for="exampleDropdownFormEmail1">Usuario</label>
            <input type="text" name="uid" placeholder="Correo Electronico / ID Usuario...">
          </div>
          <div class="form-group">
            <label for="pwd">Password</label>
            <input type="password" name="pwd" placeholder="Contraseña...">
  <!-- Se inserta el captcha solicitado -->
            <img src="generate.php" /><input placeholder="Captcha..." type="text" name="captcha" />

            <button type="submit" name="submit" class="btn btn-primary">Ingresar</button>
          </div>


          <?php
          if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Asegure de llenar todos los campos</p>";
            }
            else if ($_GET["error"] == "wrongcaptcha") {
                echo "<p>Captcha Incorrecto</p>";
            }
            else if ($_GET["error"] == "wronglogin") {
                echo "<p>Usuario no existe</p>";
            }
            else if ($_GET["error"] == "incorrectpwd") {
                echo "<p>Contraseña Incorrecta</p><p>Solo 3 intentos permitidos</p>";
            }

            else if ($_GET["error"] == "passwordsdontmatch") {
                echo "<p>Contraseña no concuerda, asegurese de sincronizar la misma</p>";
            }
            else if ($_GET["error"] == "usernametaken") {
                echo "<p>ID de Usuario ya existe, favor de ingresa otro</p>";
            }
            else if ($_GET["error"] == "sinconnexionabd") {
                echo "<p>No hay connexion a la Base de Datos</p>";
            }
            else if ($_GET["error"] == "incorrectpwd") {
                echo "<p>Contraseña Incorrecta</p>";
            }
            else if ($_GET["error"] == "blockedOut") {
                echo "<p>Intentos excedidos, favor de buscar a tu administrador</p>";
            }

          } ?>
        </form>


      </section>



<?php
  include_once 'footer.php'
 ?>
