<?php
require_once 'dbh.inc.php';
include_once '../header.php';

    $idProvedor = $_GET['GetID'];

    $query = "SELECT * FROM tblProvedores WHERE idProvedor ='".$idProvedor."'";
    $result = mysqli_query($conn, $query);

    while ($row=mysqli_fetch_assoc($result)) {

      $nombreProvedor = $row['nombreProvedor'];
      $telProvedor = $row['telProvedor'];
      $tipoDeProvedor = $row['tipoDeProvedor'];

    }
?>





                  <!-- MODAL PARA REGISTROS -->
                  <div class="modalss" id="id03" style="">
                    <div id="id03" class="modal-dialog modal-dialog-centered modal-xl" style="">

                      <form class="modal-content animate" id="signupform" action="updateProveedores.php?ID=<?php echo $idProvedor; ?>" method="post" style="padding: 12px 20px; margin: 8px 0;">
                        <h1>Nuevo Proveedor</h1>
                            <div class="form-row">
                                <div class="form-group col-md-4 col-sm-6">
                                  <label for="empresa">Nombre de Empresa</label>
                                  <input type="text" value="<?php echo $nombreProvedor; ?>" class="form-control" name="empresa" placeholder="Pintura Jalisco SA. de CV."/>
                               </div>
                               <div class="form-group col-md-4 col-sm-6">
                                 <label for="telefono">Teléfono</label>
                                 <input type="text"  value="<?php echo $telProvedor; ?>" class="form-control" name="telefono" placeholder="(33) 1234 4556 " id="primernombre" />
                               </div>
                               <div class="form-group col-sm-4 col-md-4">
                                 <label for="insumo">Tipo de Insumo</label>
                                 <select class="custom-select"  name="insumo" value="<?php echo $tipoDeProvedor; ?>" placeholder="Departamento">
                                   <!-- <option value="Pendiente" >Seleccione Area</option> -->
                                   <!-- <option value="100">Finanzas</option> -->
                                   <!-- <option value="<?php echo $tipoDeProvedor; ?>"</option> -->
                                   <?php
                                      $sqlm = mysqli_query($conn, "SELECT * FROM tblTipoDeProvedor");
                                      while ($row1 = $sqlm->fetch_assoc()){
                                      // $value =   $row1['idDepartamento']
                                      echo "<option value='".$row1['Insumo']."'>". $row1['Insumo']."</option>";
                                    }?>
                               </select>
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

                            <div class="row col-12" >

                                <div class="col-2">
                                  <button class="btn btn-primary" style="width: 100%" type="submit" name="update">Actualizar</button>
                                </div>

                                <div class="col-2">
                                  <button class="btn btn-danger" style="width: 100%" type="submit" formaction="delete2.php?Del=<?php echo $idProvedor?>" onclick="clicked(event)">Borrar</button>

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
