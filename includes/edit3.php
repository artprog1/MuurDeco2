<?php
require_once 'dbh.inc.php';
include_once '../header.php';

    $IDInsumo = $_GET['GetID'];

    $query = "SELECT * FROM tblInsumos WHERE idInsumos ='".$IDInsumo."'";
    $result = mysqli_query($conn, $query);

    while ($row=mysqli_fetch_assoc($result)) {

      $nombre = $row['nombre'];
      $costo = $row['costo'];
      $tipo = $row['tipo'];
      $idProvedor = $row['idProvedor2'];
    }
?>



            <div class="modalss" id="id40" style="">
              <div id="id40" class="modal-dialog modal-dialog-centered modal-xl" style="">

                <form class="modal-content animate" id="signupformProducto" action="updateInventario.php?ID=<?php echo $IDInsumo; ?>" method="post" style="padding: 12px 20px; margin: 8px 0;">
                  <h1>Ingresar Producto</h1>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="articulo">Articulo</label>
                            <input type="text"  value="<?php echo $nombre; ?>" class="form-control" name="articulo" placeholder="Pintura Jalisco SA. de CV." id="producto"/>
                         </div>


                             <div class="form-group col-md-6">
                               <label for="costo">Costo</label>
                               <!-- <input type="text"  class="form-control" name="costo" placeholder="Pintura Jalisco SA. de CV."/> -->
                               <input class="form-control" value="<?php echo $costo; ?>" name="costo" type="number" placeholder="$XX.XX" min="1" step="any" id="costo"/>

                            </div>

                            </div>
                    <div class="form-row">
                         <div class="form-group col-md-6">
                           <label for="tipoArticulo">Tipo de Articulo</label>
                           <input type="text"  value="<?php echo $tipo; ?>" class="form-control" name="tipoArticulo" placeholder="Madera, Vidreo, etc. " id="tipoProducto" />
                         </div>

                         <div class="form-group col-md-6">
                           <label for="provedor">Provedor</label>
                           <select class="custom-select"  name="provedor">
                             <!-- <option value="Pendiente" >Seleccione Area</option> -->
                             <option value="<?php echo $idProvedor ?>">Seleccione Area</option>

                             <div class="form-row col 2">
                               <div id="errorProducto">
                               </div>
                             </div>

                             <?php
                                $sqlm = mysqli_query($conn, "SELECT * FROM tblProvedores");
                                while ($row1 = $sqlm->fetch_assoc()){
                                // $value =   $row1['idDepartamento']
                                echo "<option value='".$row1['idProvedor']."'>". $row1['nombreProvedor']."</option>";
                              }?>
                              <option value="NULL">Desligar</option>
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
                           <button class="btn btn-danger" style="width: 100%" type="submit" formaction="delete3.php?Del=<?php echo $IDInsumo?>" onclick="clicked(event)">Borrar</button>

                         </div>



                     </div>
                </form>
              </div>
            </div>

            <head>
              <script defer src="FEValidationProductoEdit.js"></script>
            </head>

            <script>
              function clicked(e)
                {
                  if(!confirm('¿Seguro deseas borrar de manera permanente?'))
                    {
                      e.preventDefault();
                    }
                }
            </script>
