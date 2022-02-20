<?php
  include_once 'header.php';
  require_once 'includes/dbh.inc.php';

// Verificamos la session
  if (!isset($_SESSION["useruid"])) {
    header("location: ../MuurDecoShop/login.php?error=noingresado");
    exit();
 }
// Corremos el select para generar datos al iniciar pagiina
      $sql = "SELECT * FROM users;";
      $result = mysqli_query($conn, $sql);
 ?>

<div class="entire-body-content">

  <section class="BotonesIniciales">
    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Nuevo Registro</button>
  </section>

  <div id="id01" class="modal">


    <form class="modal-content animate" id="signupform" action="includes/signup.inc.php" method="post">
      <!-- <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <img src="img/user.jpeg" alt="Avatar" class="avatar">
      </div> -->
      <div class="container-modal">
        <section class="signup-form">

          <div class="datosPrimero">
            <div class="form-control input-box">
             <label for="nombre">Nombre</label>
             <input type="text" name="nombre" placeholder="Primer Nombre..." id="primernombre" />
             <small>Error message</small>
           </div>

            <div class="form-control input-box">
             <label for="paterno">Paterno</label>
             <input type="text" name="paterno" placeholder="Apellido Paterno..." id="paterno" />
             <small>Error message</small>
           </div>

            <br>

            <div class="form-control input-box">
            <label for="materno">Materno</label>
            <input type="text" name="materno" placeholder="Apellido Materno..." id="materno" />
            <small>Error message</small>
          </div>
          </div>

          <div class="datosSegundo">
            <div class="form-control">
             <label for="email">Correo Electronico</label>
             <input type="email" name="email" placeholder="Correo Electronico..." id="email" />
             <br>
             <small>Error message</small>
           </div>
           <div class="form-control input-box">
             <label for="uid">ID de Usuario</label>
             <input type="text" name="uid" placeholder="ID de Usuario.." id="idusuario" />
             <small>Error message</small>
           </div>
           <div class="form-control input-box">
             <label for="perfil">Area</label>
             <select name="perfil" placeholder="Area">
               <option value="Pendiente" >Seleccione Area</option>
               <option value="Ventas">Ventas</option>
               <option value="Diseño">Diseño </option>
               <option value="Producción">Producción</option>
               <option value="Dirección">Dirección</option>
               <option value="Administración">Administración</option>
             </select>
           </div>

          </div>

          <div class="datosTercero">

            <div class="form-control input-box">
              <label for="pwd">Contraseña</label>
              <input type="password" name="pwd" placeholder="Contraseña..." id="password" />
              <small>Error message</small>
            </div>

            <div class="form-control input-box">
              <label for="pwdrepetido">Confirmar</label>
              <input type="password" name="pwdrepetido" placeholder="Confirmar Contraseña" id="password2" />
              <small>Error message</small>
            </div>



          </div>






              <div class="buttonContainer">
                <button type="submit" name="submit">Submit</button>
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
              </div>
            <!-- </form> -->
  <!-- En base a los errores que se tengan, se van a retornar un mensaje para los usuarios -->
        </section>
      </div>

    </form>
  </div>



<!-- MODAL TO ENTER Entries -->





<!-- JS to EXIT Modal -->
 <script>
 var modal = document.getElementById('id01');
 // When the user clicks anywhere outside of the modal, close it
 window.onclick = function(event) {
     if (event.target == modal) {
         modal.style.display = "none";
     }
 }
 </script>

<script src="js/signupEmployee.js"></script>
<!--  -->
<!-- Regresamos todos los errores de parte del backend.  -->
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


  <div class="container2">
      <h2>Personal Registrado</h2>
    <div class="row">
      <div class="col-l m-auto">
        <div class="table table-bordered">
         <table class="styled-table">
           <td>
             <tr>
               <td>IDs </td>
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

                 <td> <a href="includes/delete.php?Del=<?php echo $UserID?>" onclick="return confirm('Are you sure?')">Borrar</a> </td>
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
  <!-- Boton para agregar -->




</div>

<?php
  include_once 'footer.php'
 ?>
