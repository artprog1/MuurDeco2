<?php
  include_once 'header.php'

 ?>

 <?php
 if (!isset($_SESSION["useruid"])) {
   header("location: ../MuurDecoShop/login.php?error=noingresado");
   exit();
}
// if(time() - $_SESSION['useruid'] > 90) { //subtract new timestamp from the old one
//    echo"<script>alert('15 Minutes over!');</script>";
//    unset($_SESSION['useruid']);
//    $_SESSION['useruid'] = false;
//    header("location: ../MuurDecoShop/login.php?error=syskickedout"); //redirect to login.php
//    exit;
// } else {
//    $_SESSION['userid'] = time(); //set new timestamp
// }
  ?>

  <?php
 include_once 'header.php';
  require_once 'includes/dbh.inc.php';
      $sql = "SELECT * FROM users;";
      $result = mysqli_query($conn, $sql);
 ?>

  <h2>Personal Registrado</h2>
  <div class="container">
    <div class="row">
      <div class="col-l m-auto">
        <div class="table table-bordered">
         <table class="styled-table">
           <td>
             <tr>
               <td>ID</td>
               <td>Nombre</td>
               <td>A. Paterno</td>
               <td>A. Materno</td>
               <td>Correo</td>
               <td>ID Usuario</td>
               <td>Perfil</td>
               <td>Modificar</td>
               <td>Eliminar</td>
               <td>Resetear</td>
             </tr>

             <?php
                 while ($row=mysqli_fetch_assoc($result)) {
                   $UserID = $row['usersId'];
                   $UserName = $row['usersPrimerNombre'];
                   $UserMaterno = $row['usersApellidoMaterno'];
                   $UserPaterno = $row['usersApellidoPaterno'];
                   $UserEmail = $row['usersEmail'];
                   $UserUID = $row['usersUid'];
                   $UserPerfil = $row['perfil'];
               ?>
               <tr>
                 <td><?php echo $UserID ?></td>
                 <td><?php echo $UserName ?></td>
                 <td><?php echo $UserMaterno ?></td>
                 <td><?php echo $UserPaterno ?></td>
                 <td><?php echo $UserEmail ?></td>
                 <td><?php echo $UserUID ?></td>
                 <td><?php echo $UserPerfil ?></td>
                 <td> <a href="includes/edit.php?GetID=<?php echo $UserID?>">Editar</a> </td>
                 <td> <a href="includes/delete.php?Del=<?php echo $UserID?>">Borrar</a> </td>
                 <td> <a href="includes/reset.php?Res=<?php echo $UserID?>">Reset</a> </td>
               </tr>
               <?php
               }
                ?>
           </td>
         </table>
        </div>
      </div>

    </div>

  </div>




  <body>
    <h2>Alta de Personal</h2>

      <section class="signup-form">

        <hr>
          <form action="includes/signup.inc.php" method="post">
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
          <?php
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



      </section>

      </body>

<?php
  include_once 'footer.php'
 ?>
