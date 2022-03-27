<?php
  include_once 'header.php'

 ?>
 <head>
   <style media="screen">
     body{
       background-image: url("img/bkgd.jpg");
       background-repeat: no-repeat;
       background-size: 100% ;
     }
   </style>
 </head>

<!-- card-body -->
<div class="form-group" style="background-color:  ">

    <div class="header" style="max-width: 500px; margin: auto;">
      <h1 class="fw-light text-black m-0">Bienvenido!</h1>
      <h3 class="fw-light text-black m-0">— Ingresa tus credenciales —</h3>
    </div>

    <div class="user-login-box form-control-lg " style="max-width: 500px; margin: auto; ">
        <!-- <section class="index-intro"> -->

        <div class="dropdown-divider"></div>

          <form class="px-4 py-3" action="includes/loginUsrs.inc.php" method="post">
              <div class="form-group">
                <label for="uid">Usuario</label>
                <input type="text" name="uid" class="form-control" placeholder="Correo Electronico / ID Usuario...">

              </div>

              <div class="form-group">
                <label for="pwd"> Contraseña</label>
                <input type="password" name="pwd" class="form-control" placeholder="Contraseña...">
              </div>

              <div class="form-group">
                <label for="captcha">Captcha</label>
                <img class="form-control" src="generate.php" />
              </div>

              <div class="form-group">
                <input placeholder="Captcha..." type="text" class="form-control" name="captcha" />
              </div>


                <button type="submit" class="btn btn-primary" name="submit">Ingresar</button>
            </form>

            <?php
            if (isset($_GET["error"])) {
              if ($_GET["error"] == "emptyinput") {
                  echo "<p class='font-weight-light'>Asegure de llenar todos los campos</p>";
              }
              else if ($_GET["error"] == "wrongcaptcha") {
                  echo "<p class='font-weight-light'>Captcha Incorrecto</p>";
              }
              else if ($_GET["error"] == "wronglogin") {
                  echo "<p class='font-weight-light'>Usuario no existe</p>";
              }
              else if ($_GET["error"] == "incorrectpwd") {
                  echo "<p class='font-weight-light'>Contraseña Incorrecta</p><p>Solo 3 intentos permitidos</p>";
              }

              else if ($_GET["error"] == "passwordsdontmatch") {
                  echo "<p class='font-weight-light'>Contraseña no concuerda, asegurese de sincronizar la misma</p>";
              }
              else if ($_GET["error"] == "usernametaken") {
                  echo "<p class='font-weight-light'>ID de Usuario ya existe, favor de ingresa otro</p>";
              }
              else if ($_GET["error"] == "sinconnexionabd") {
                  echo "<p class='font-weight-light'>No hay connexion a la Base de Datos</p>";
              }
              else if ($_GET["error"] == "incorrectpwd") {
                  echo "<p class='font-weight-light'>Contraseña Incorrecta</p>";
              }
              else if ($_GET["error"] == "blockedOut") {
                  echo "<p class='font-weight-light'>Intentos excedidos, favor de buscar a tu administrador</p>";
              }

            } ?>
          <!-- </form> -->


        <!-- </section> -->

  </div>
</div>
<?php
  include_once 'footer.php'
 ?>
