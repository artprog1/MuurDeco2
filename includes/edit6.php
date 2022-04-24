<?php
require_once 'dbh.inc.php';
include_once '../header.php';

    $idCliente = $_GET['GetID'];

    $query = "SELECT * FROM tblClientes WHERE idCliente ='".$idCliente."'";
    $result = mysqli_query($conn, $query);



    while ($row=mysqli_fetch_assoc($result)) {

      $nombreCliente = $row['nombreCliente'];
      $aPaternoCliente = $row['aPaternoCliente'];
      $aMaternoCliente = $row['aMaternoCliente'];
      $direccionCalle = $row['direccionCalle'];
      $direccionCiudad = $row['direccionCiudad'];
      $direccionEstado = $row['direccionEstado'];
      $direccionCodigoP = $row['direccionCodigoP'];
      $telefonoCliente = $row['telefonoCliente'];

    }

?>


<head>
  <script defer src="FEValidationClienteEdit.js"></script>
</head>


            <div class="modalss" id="id40" style="">
              <div id="id40" class="modal-dialog modal-dialog-centered modal-xl" style="">
                <form class="modal-content animate" id="signupformCliente" action="updateCliente.php?ID=<?php echo $idCliente; ?>" method="post" style="padding: 12px 20px; margin: 8px 0;">

                  <h1>Edición del Registro de Cliente</h1>
                      <div class="form-row">
                          <div class="form-group col-md-4 col-sm-6">
                            <label for="nombre">Primer Nombre</label>
                            <input type="text" value="<?php echo $nombreCliente ?>" class="form-control" name="nombre" placeholder=" Primer Nombre" id="primernombre" />
                         </div>
                         <div class="form-group col-md-4 col-sm-6">
                           <label for="paterno">Apellido Paterno</label>
                           <input type="text"  value="<?php echo $aPaternoCliente ?>" class="form-control" name="paterno" placeholder=" A. Paterno " id="paterno" />
                         </div>
                         <div class="form-group col-md-4 col-sm-6">
                           <label for="materno">Apellido Materno</label>
                           <input type="text"  value="<?php echo $aMaternoCliente ?>" class="form-control" name="materno" placeholder=" A. Materno " id="materno" />
                         </div>
                       </div>
                       <div class="form-row">
                         <div class="form-group col-sm-6 col-md-6">
                           <label for="direccionCalle">Dirección de Calle</label>
                           <input type="text"  value="<?php echo $direccionCalle ?>" class="form-control" name="direccionCalle" placeholder="123 Calle" id="calle" />
                         </div>
                         <div class="form-group col-sm-6 col-md-6">
                           <label for="ciudad">Ciudad</label>
                           <input type="text"  value="<?php echo $direccionCiudad ?>" class="form-control" name="ciudad" placeholder="Ej. Guadalajara" id="ciudad" />
                         </div>
                         <div class="form-group col-md-6 col-sm-6">
                           <label for="estado">Estado</label>
                           <input type="text"  value="<?php echo $direccionEstado ?>" class="form-control" name="estado" placeholder="Ej. Jalisco" id="estado" />
                         </div>

                         <!-- GENERAR EL QUERY DE LOS DEPTS -->
                         <div class="form-group col-sm-6 col-md-6">
                           <label for="postal">Codigo Postal</label>
                           <input type="text" pattern="\d{5}" title="Favor de manter 5 digitos numericos" maxlength="5"  value="<?php echo $direccionCodigoP ?>" class="form-control" name="postal" placeholder="45000" id="postal" />

                         </div>
                       </div>
                       <div class="form-row">
                         <div class="form-group col-sm-6 col-md-6">
                          <label for="telefono">Teléfono</label>
                          <input type="text" pattern="\d{10}" title="Favor de manter 10 digitos numericos" maxlength="10" value="<?php echo $telefonoCliente ?>" class="form-control" name="telefono" placeholder="(33) 1234 5678" id="telefono" />
                          </div>
                        </div>
                        <div class="form-row col 2">
                          <div id="error">
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
                          else if ($_GET["error"] == "usernametaken") {
                              echo "<p class='font-weight-light'>ID de Usuario ya existe, favor de ingresa otro</p>";
                          }
                          else if ($_GET["error"] == "none") {
                              echo "<p class='font-weight-light'>Usuario se dio de alta satisfactoriamente</p>";
                          }
                        } ?>
                      </div>

                  <div class="row" >
                     <div class="col-2">
                       <button class="btn btn-primary" style="width: 100%" type="submit" name="update">Actualizar</button>
                     </div>
                     <div class="col-md-2">
                       <button class="btn btn-danger" style="width: 100%" type="submit" formaction="delete6.php?Del=<?php echo $idCliente?>" onclick="clicked(event)">Borrar</button>

                     </div>
                   </div>

                </form>
                </div>
              </div>


            <script>
              function clicked(e)
                {
                  if(!confirm('¿Seguro deseas borrar de manera permanente? Todos los proyectos relacionados serán eliminados.'))
                    {
                      e.preventDefault();
                    }
                }
            </script>
