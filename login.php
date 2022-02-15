<?php
  include_once 'header.php'


 ?>



      <section class="index-intro">
        <h2>Ingreso al Portal</h2>
        <form class="loginform" action="includes/login.inc.php" method="post">
          <div class="index-intro-textbox">
            <input type="text" name="uid" placeholder="Correo Electronico / ID Usuario...">
            <input type="password" name="pwd" placeholder="Contraseña...">
  <!-- Se inserta el captcha solicitado -->
            <img src="generate.php" /><input placeholder="Captcha..." type="text" name="captcha" />

            <button type="submit" name="submit">Ingresar</button>
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
