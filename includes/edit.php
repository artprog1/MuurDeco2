<?php
require_once 'dbh.inc.php';
include_once '../header.php';

    $UserID = $_GET['GetID'];

    $query = "SELECT * FROM tblUsuarios WHERE idUsuario='".$UserID."'";
    $result = mysqli_query($conn, $query);

    while ($row=mysqli_fetch_assoc($result)) {

      $usersUid = $row['usersUid'];
      $correoUsuario = $row['correoUsuario'];
      $nombreUsuario = $row['nombreUsuario'];
      $aPaternoUsuario = $row['aPaternoUsuario'];
      $aMaternoUsuario = $row['aMaternoUsuario'];
      $telefonoUsuario = $row['telefonoUsuario'];
      $idDepartamento2 = $row['idDepartamento2'];
      // $incAttempt = $row['incAttempt'];


    }
?>




          <!-- <form action="update.php?ID=<?php echo $UserID; ?>" method="post">
            <input type="text" class="form-control mb-2" placeholder=" Nombre " name="name" value="<?php echo $UserName; ?>">
            <!-- <input type="text" class="form-control mb-2" placeholder=" Paterno " name="materno" value="<?php echo $UserMaterno; ?>">
            <input type="text" class="form-control mb-2" placeholder=" Materno " name="paterno" value="<?php echo $UserPaterno; ?>">
            <!-- <input type="email" class="form-control mb-2" placeholder=" Correo " name="correo" value="<?php //echo $UserEmail; ?>"> -->
            <!-- <input type="text" class="form-control mb-2" placeholder=" ID Usuario " name="uid" value="<?php //echo $UserUID; ?>"> -->
            <!-- <input type="text" class="form-control mb-2" placeholder=" Perfil " name="perfil" value="
            <?php
            // echo $UserPerfil;
            ?>
            "> -->
            <!-- <select name="perfil" placeholder="Area">
              <option value="<?php echo $UserPerfil; ?>" ><?php echo $UserPerfil; ?></option>
              <option value="Ventas">Ventas</option>
              <option value="Diseño">Diseño</option>
              <option value="Producción">Producción</option>
              <option value="Dirección">Dirección</option>
              <option value="Administración">Administración</option>
            </select> -->

            <!-- <button class="btn btn-primary" name="update">Actualizar</button> -->

          <!-- </form> -->



          <div class="modalss" id="id32" style="">
            <div id="id32" class="modal-dialog modal-dialog-centered modal-xl" style="">



              <form class="modal-content animate" id="signupform" action="update.php?ID=<?php echo $UserID; ?>" method="post"s style="padding: 12px 20px; margin: 8px 0;">

                  <h2>Edición del Personal</h2>

                    <div class="form-row">
                        <div class="form-group col-md-4 col-sm-6">
                          <label for="nombre">Primer Nombre</label>
                          <input type="text"  class="form-control" name="nombre" placeholder=" Primer Nombre" value="<?php echo $nombreUsuario; ?>" />
                       </div>
                       <div class="form-group col-md-4 col-sm-6">
                         <label for="nombre">Apellido Paterno</label>
                         <input type="text"  class="form-control" name="paterno" placeholder=" A. Paterno " value="<?php echo $aPaternoUsuario; ?>" />
                       </div>
                       <div class="form-group col-md-4 col-sm-6">
                         <label for="nombre">Apellido Materno</label>
                         <input type="text"  class="form-control" name="materno" placeholder=" A. Materno " value="<?php echo $aMaternoUsuario; ?>" />
                       </div>
                     </div>
                     <div class="form-row">
                       <div class="form-group col-sm-6 col-md-6">
                         <label for="id">Correo Electronico</label>
                         <input type="email"  class="form-control" name="email" placeholder="Correo@Electronico.com" value="<?php echo $correoUsuario; ?>" />
                       </div>
                       <div class="form-group col-sm-6 col-md-6">
                         <label for="uid">ID de Usuario</label>
                         <input type="text"  class="form-control" name="uid" placeholder="Id_Usario" value="<?php echo $usersUid; ?>" />
                       </div>
                       <div class="form-group col-md-6 col-sm-6">
                         <label for="telefono">Telefono</label>
                         <input type="text"  class="form-control" name="telefono" placeholder="3311225566" value="<?php echo $telefonoUsuario; ?>" />
                       </div>

                       <!-- GENERAR EL QUERY DE LOS DEPTS -->
                       <div class="form-group col-sm-6 col-md-6">
                         <label for="departamento">Departamento</label>
                         <select class="custom-select" name="departamento" value="<?php echo $idDepartamento2; ?>">
                           <!-- <option value="Pendiente" >Seleccione Area</option> -->
                           <!-- <option value="100">Finanzas</option> -->
                           <!-- <option value="101">Administracion</option> -->
                           <?php
                              $sqlm = mysqli_query($conn, "SELECT * FROM tblDepartamentos");
                              while ($row1 = $sqlm->fetch_assoc()){
                              // $value =   $row1['idDepartamento']
                              echo "<option value='".$row1['idDepartamento']."'>". $row1['nombre']."</option>";
                            }?>
                       </select>
                       </div>
                     </div>




                    <div class="alert">
                      <?php
                      if (isset($_GET["error"])) {
                        ?>
                      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <?php
                      }
                      if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyinput") {
                            echo "<p class='font-weight-light'>Asegure de llenar todos los campos</p>";
                        }
                        else if ($_GET["error"] == "invaliduid") {
                            echo "<p>ID Usuario invalido, favor de llenar con requisitos</p>";
                        }
                        else if ($_GET["error"] == "invalidemail") {
                            echo "<p class='font-weight-light'>Correo ya existe, favor de ingresa otro</p>";
                        }
                        else if ($_GET["error"] == "passwordsdontmatch") {
                            echo "<p class='font-weight-light'>Contraseña no concuerda, asegurese de sincronizar la misma</p>";
                        }

                        else if ($_GET["error"] == "weakpwd") {
                            echo "<p class='font-weight-light'>Contraseña debil, favor de incluir <br>1 Mayuscula, 1 Minuscula, 1 Numero, 1 Caracter Especial, Longitud de 6 a 16 caracteres</li>";
                        }
                        else if ($_GET["error"] == "usernametaken") {
                            echo "<p class='font-weight-light'>ID de Usuario ya existe, favor de ingresa otro</p>";
                        }
                        else if ($_GET["error"] == "sinconnexionabd") {
                            echo "<p class='font-weight-light'>No hay connexion a la Base de Datos</p>";
                        }

                        else if ($_GET["error"] == "invalidNames") {
                            echo "<p class='font-weight-light'>Nombres debera contener solo valores alfabeticos</p>";
                        }
                        else if ($_GET["error"] == "idFormatomalo") {
                            echo "<p class='font-weight-light'>ID Seleccionado es Incorrecto. Seleccionar 4 digitos numericos</p>";
                        }
                        else if ($_GET["error"] == "wrongcaptcha") {
                            echo "<p class='font-weight-light'>El Captcha ingresado es incorrecto</p>";
                        }
                        // idFormatomalo
                        else if ($_GET["error"] == "none") {
                            echo "<p class='font-weight-light'>Usuario se dio de alta satisfactoriamente</p>";
                        }
                      } ?>
                    </div>


                    <div class="row" >

                        <div class="col-md-2">
                          <button class="btn btn-primary" style="width: 100%" type="submit" name="update">Actualizar</button>
                        </div>

                        <div class="col-md-2">
                          <button class="btn btn-danger" style="width: 100%" type="submit" formaction="delete.php?Del=<?php echo $UserID?>" onclick="clicked(event)">Borrar</button>

                        </div>



                    </div>
                        </form>

                   </div>


            </div>

            <script>
              function clicked(e)
                {
                  if(!confirm('¿Seguro deseas borrar de manera permanente?'))
                    {
                      e.preventDefault();
                    }
                }
            </script>
