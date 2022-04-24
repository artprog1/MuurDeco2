<?php
require_once 'dbh.inc.php';
include_once '../header.php';

    $idProyecto = $_GET['GetID'];

    $query = "SELECT * FROM tblProyectos WHERE idProyecto ='".$idProyecto."'";
    $result = mysqli_query($conn, $query);



    while ($row=mysqli_fetch_assoc($result)) {

      $nombreProyecto = $row['nombreProyecto'];
      $descripcion = $row['descripcion'];
      // $aMaternoCliente = $row['pdf'];
      $estatusDelProyecto = $row['estatusDelProyecto'];
      $departamentoAsignado = $row['departamentoAsignado'];
      $estatusDeFactura = $row['estatusDeFactura'];
      $idCliente2 = $row['idCliente2'];
      $Comentarios = $row['Comentarios'];

    }

    $query2 = "SELECT * FROM tblDepartamentos WHERE idDepartamento ='".$departamentoAsignado."'";
    $result2 = mysqli_query($conn, $query2);
    while ($row3=mysqli_fetch_assoc($result2)) {
      $depaOriginal = $row3['nombre'];
    }

    $query3 = "SELECT * FROM tblClientes WHERE idCliente ='".$idCliente2."'";
    $result3 = mysqli_query($conn, $query3);
    while ($row4=mysqli_fetch_assoc($result3)) {
      $clienteOriginal = $row4['nombreCliente']." ".$row4['aPaternoCliente']." ".$row4['aMaternoCliente'];
    }


    // $row3 = $result2->fetch_assoc()
?>



            <div class="modalss" id="id40" style="">
              <div id="id40" class="modal-dialog modal-dialog-centered modal-xl" style="">
                <form class="modal-content animate" id="signupform" action="updateProyecto.php?ID=<?php echo $idProyecto; ?>" method="post" style="padding: 12px 20px; margin: 8px 0;">

                  <h1>Modificar Proyecto<br></h1>
                      <div class="form-row">
                          <div class="form-group col-4">
                            <label for="proyecto">Titulo del Proyecto</label>
                            <input type="text"  value="<?php echo $nombreProyecto ?>" class="form-control" name="proyecto" placeholder="Titulo del Proyecto" id="idProyecto" />
                         </div>
                         <div class="form-group col-1">
                           <label for="pdf">Archivo PDF</label>
                           <!-- <input type="email"  class="form-control" name="pdf" placeholder="Correo@Electronico.com" id="none" /> -->
                         </div>

                         <div class="form-group col-3">
                           <label for="statusProyecto">Estatus del Proyecto</label>
                           <select  class="custom-select" name="statusProyecto">
                             <option value="<?php echo $estatusDelProyecto?>"><?php echo $estatusDelProyecto; ?></option>
                             <?php
                                $sqlm = mysqli_query($conn, "SELECT * FROM tblFlujo");
                                while ($row1 = $sqlm->fetch_assoc()){
                                // $value =   $row1['idDepartamento']
                                echo "<option value='".$row1['NombreFlujo']."'>". $row1['Secuencia'].". ".$row1['NombreFlujo']."</option>";
                              }?>
                           </select>
                         </div>
                         <!-- <div class="form-group col-lg-3 col-sm-6">
                           <label for="telefono">Estatus del Proyecto</label>
                           <input type="text"  class="form-control" name="statusProyecto" placeholder="3311225566" id="telefono" />
                         </div> -->

                         <!-- GENERAR EL QUERY DE LOS DEPTS -->
                         <div class="form-group col-4">
                           <label for="departamentoAsignado">Departamento</label>
                           <select class="custom-select" name="departamentoAsignado" placeholder="Departamento">
                             <option value="<?php echo $departamentoAsignado?>"><?php echo $depaOriginal ?></option>
                             <?php
                                $sqlm = mysqli_query($conn, "SELECT * FROM tblDepartamentos WHERE idDepartamento = 103 OR idDepartamento = 106 OR idDepartamento = 107 OR idDepartamento = 108 OR idDepartamento = 109  ;");
                                while ($row1 = $sqlm->fetch_assoc()){
                                // $value =   $row1['idDepartamento']
                                echo "<option value='".$row1['idDepartamento']."'>". $row1['nombre']."</option>";
                              }?>
                         </select>
                         </div>


                       </div>
                       <div class="form-row">
                         <div class="form-group col-12">
                           <label for="description">Descripción</label>
                           <textarea class="form-control" id="description" name="description" placeholder="Descripción General del Proyecto" rows="2"> <?php echo $descripcion; ?></textarea>
                         </div>
                         <!-- <div class="form-group col-md-4 col-sm-6">
                           <label for="nombre">Apellido Materno</label>
                           <input type="text"  class="form-control" name="materno" placeholder=" A. Materno " id="primernombre" />
                         </div> -->
                       </div>
                       <div class="form-row">
                         <div class="form-group col-2">
                           <label for="factura">Estatus de la Factura</label>
                           <select  class="custom-select" name="factura">
                             <option value="<?php echo $estatusDeFactura ?>" ><?php echo $estatusDeFactura ?></option>
                             <option value="Completado">Completada</option>
                             <option value="No Requerido">No Requerido</option>
                           </select>
                           <!-- <input type="text"  class="form-control" name="statusProyecto" placeholder="Id_Usario" id="none" /> -->
                         </div>

                         <div class="form-group col-4">
                           <label for="idCliente2">Cliente Asignado</label>
                           <select  class="custom-select" name="idCliente2">
                             <option value="<?php echo $idCliente2?>"><?php echo $clienteOriginal; ?></option>
                             <?php
                                $sqlClientes = mysqli_query($conn, "SELECT * FROM tblClientes");
                                while ($row5 = $sqlClientes->fetch_assoc()){
                                // $value =   $row1['idDepartamento']
                                echo "<option value='".$row5['idCliente']."'>". $row5['nombreCliente']." ". $row5['aPaternoCliente']."</option>";
                              }?>
                           </select>
                           <!-- <input type="text"  class="form-control" name="statusProyecto" placeholder="Id_Usario" id="none" /> -->
                         </div>

                           <div class="form-group col-6">
                             <label for="comentarios">Comentario del Equipo</label>
                             <textarea class="form-control" id="description" name="comentarios" placeholder="Comentario acerca del proyecto" rows="2"> <?php echo $Comentarios; ?></textarea>
                           </div>
                           <!-- <div class="form-group col-md-4 col-sm-6">
                             <label for="nombre">Apellido Materno</label>
                             <input type="text"  class="form-control" name="materno" placeholder=" A. Materno " id="primernombre" />
                           </div> -->


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

                  <div class="row">
                     <div class="col-2">
                       <button class="btn btn-primary" style="width: 100%" type="submit" name="update">Actualizar</button>
                     </div>

                     <div class="col-md-2">
                       <button class="btn btn-danger" style="width: 100%" type="submit" formaction="delete7.php?Del=<?php echo $idProyecto?>" onclick="clicked(event)">Borrar</button>
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
