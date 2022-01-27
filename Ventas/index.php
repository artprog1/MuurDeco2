<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href=" ../css/style.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Nuevo Registro</button>

<div id="id01" class="modal">

  <form class="modal-content animate" action="../includes/signup.inc.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="../img/user.jpeg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <!-- <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required> -->
      <section class="signup-form">

        <hr>
          <form action="../includes/signup.inc.php" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" placeholder="Primer Nombre...">
            <br>
            <label for="paterno">Paterno</label>
            <input type="text" name="paterno" placeholder="Apellido Paterno...">
            <br>
            <label for="materno">Materno</label>
            <input type="text" name="materno" placeholder="Apellido Materno...">
            <br>
            <label for="email">Correo Electronico</label>
            <input type="email" name="email" placeholder="Correo Electronico...">
            <br>
            <label for="uid">ID de Usuario</label>
            <input type="text" name="uid" placeholder="ID de Usuario...">
            <br>
            <label for="pwd">Contraseña</label>
            <input type="password" name="pwd" placeholder="Contraseña...">
            <br>
            <label for="pwdrepetido">Confrmar</label>
            <input type="password" name="pwdrepetido" placeholder="Confirmar Contraseña">
            <br><!-- <input type="text" name="perfil" placeholder="Area de Trabajo..."> -->
            <label for="perfil">Area</label>
            <select name="perfil" placeholder="Area">
              <option value="Pendiente" >Seleccione Area</option>
              <option value="Ventas">Ventas</option>
              <option value="Diseño">Diseño</option>
              <option value="Producción">Producción</option>
              <option value="Dirección">Dirección</option>
              <option value="Administración">Administración</option>
            </select>
            <hr>
            <button type="submit" name="submit">Registrar</button>
          </form>
<!-- En base a los errores que se tengan, se van a retornar un mensaje para los usuarios -->




      </section>


    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<div class="alert">

  <?php
  if (isset($_GET["error"])) {
    ?>
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <?php 
  }
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Asegure de llenar todos los campos</p>";
    }
    else if ($_GET["error"] == "invaliduid") {
        echo "<p>ID Usuario invalido, favor de llenar con requisitos</p>";
    }
    else if ($_GET["error"] == "invalidemail") {
        echo "<p>Correo ya existe, favor de ingresa otro</p>";
    }
    else if ($_GET["error"] == "passwordsdontmatch") {
        echo "<p>Contraseña no concuerda, asegurese de sincronizar la misma</p>";
    }

    else if ($_GET["error"] == "weakpwd") {
        echo "<p>Contraseña debil, favor de incluir <br>1 Mayuscula, 1 Minuscula, 1 Numero, 1 Caracter Especial, Longitud de 6 a 16 caracteres</li>";
    }
    else if ($_GET["error"] == "usernametaken") {
        echo "<p>ID de Usuario ya existe, favor de ingresa otro</p>";
    }
    else if ($_GET["error"] == "sinconnexionabd") {
        echo "<p>No hay connexion a la Base de Datos</p>";
    }

    else if ($_GET["error"] == "invalidNames") {
        echo "<p>Nombres debera contener solo valores alfabeticos</p>";
    }
    else if ($_GET["error"] == "none") {
        echo "<p>Usuario se dio de alta satisfactoriamente</p>";
    }
  } ?>

</div>
</body>
</html>
