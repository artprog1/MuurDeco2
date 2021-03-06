<?php
  include_once 'header.php';
  require_once 'includes/dbh.inc.php';

// Verificamos la session
  if (!isset($_SESSION["useruid"])) {
    header("location: /MuurDecoShop2/login.php?error=noingresado");
    exit();
 }
// Corremos el select para generar datos al iniciar pagiina
      $sql = "SELECT * FROM users;";
      $result = mysqli_query($conn, $sql);
 ?>

<head>
  <link rel="stylesheet" href="css/style.css">
  <script defer src="js/FEValidation.js"></script>
</head>

<div class="entire-body-content">

  <section class="BotonesIniciales">
    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Nuevo Registro</button>
  </section>

  <div id="id01" class="modal col-12">


    <form class="modal-content animate" id="signupform" action="includes/signup.inc.php" method="post">
      <!-- <div class="imgcontainer"> -->
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <!-- <img src="img/user.jpeg" alt="Avatar" class="avatar"> -->
      <!-- </div> -->
      <div class="col-12">
        <h1>Datos del Personal</h1>
        <section class="signup-form">

        <div class="form-row">   <!-- form-control -->

            <div class="form-group col-3">
             <label for="nombre">Nombre</label>
             <input type="text" name="nombre" placeholder="Primer Nombre..." id="name" />
             <small>Error message</small>
           </div>
            <div class="form-group col-3">
             <label for="paterno">Paterno</label>
             <input type="text" name="paterno" placeholder="Apellido Paterno..." id="paterno" />
             <small>Error message</small>
           </div>
          <div class="form-group col-3">
            <label for="materno">Materno</label>
            <input type="text" name="materno" placeholder="Apellido Materno..." id="materno" />
            <small>Error message</small>
          </div>
        </div>

        <div class="form-row">
           <div class="form-group col-4">
             <label for="email">Correo Electronico</label>
             <input type="email" name="email" placeholder="Correo Electronico..." id="email" />
             <br>
             <small>Error message</small>
           </div>

           <div class="form-group col-4">
             <label for="uid">ID de Usuario</label>
             <input type="text" name="uid" placeholder="ID de Usuario.." id="idusuario" />
             <small>Error message</small>
           </div>

           <div class="form-group col-4">
             <label for="perfil">Area</label>
             <select class="selector" name="perfil" placeholder="Area">
               <option value="Pendiente" >Seleccione Area</option>
               <option value="Ventas">Ventas</option>
               <option value="Dise??o">Dise??o </option>
               <option value="Producci??n">Producci??n</option>
               <option value="Direcci??n">Direcci??n</option>
               <option value="Administraci??n">Administraci??n</option>
             </select>
           </div>
         </div>

         <div class="form-row">
           <div class="form-group col-4">
              <label for="pwd">Contrase??a</label>
              <input type="password" name="pwd" placeholder="Contrase??a..." id="password" />
              <small>Error message</small>
            </div>

            <div class="form-group col-4">
              <label for="pwdrepetido">Confirmar</label>
              <input type="password" name="pwdrepetido" placeholder="Confirmar Contrase??a" id="password2" />
              <small>Error message</small>
            </div>

         </div>
         <div class="form-row">
           <div id="error">

           </div>
         </div>






              <div class="buttonContainer">
                <button type="submit" name="submit">Registrar</button>
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
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

<!-- <script src="js/signupEmployee.js"></script> -->
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
         echo "<p>Contrase??a no concuerda, asegurese de sincronizar la misma</p>";
     }

     else if ($_GET["error"] == "weakpwd") {
         echo "<p>Contrase??a debil, favor de incluir <br>1 Mayuscula, 1 Minuscula, 1 Numero, 1 Caracter Especial, Longitud de 6 a 16 caracteres</li>";
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
