<?php
include_once 'header.php';
require_once 'includes/dbh.inc.php';
// require_once 'includes/caducarSesion.php';

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName );

  if (!isset($_SESSION["useruid"])) {
    header("location: login.php?error=noingresado");
    exit();
  }

  $sql = "SELECT * FROM tblProvedores";
  $result = mysqli_query($conn, $sql);

?>

<br><br>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 col-lg-2 sidebar ">
      <ul class="nav nav-sidebar list-group-flush">
        <li class="list-group-item" style="width: 100%">
          <button type="button" class="btn btn-primary" style="width: 100%; height: 45px" data-toggle="modal" data-target="#id01">
            Registrar Proveedor
          </button>
        </li>

      </ul>

      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div>
          <h1 class="page-header">Provedores</h1>
          <p>Administración general de los provoedores y sus insumos</p>
        </div>
        <div class="row placeholders">
          <div class="col-sm-8 col-md-6 col-lg-3 placeholder">
            <a href="#">
            <img src="img/supply.jpg" width="1100" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            </a>
            </div>
          </div>

          <div class="modalssss" id="id01" style="">
            <div class="modal-dialog modal-dialog-centered modal-xl" style="">

              <form class="modal-content animate" id="signupform" action="includes/altaProveedores.inc.php" method="post" style="padding: 12px 20px; margin: 8px 0;">
                <h1>Nuevo Proveedor</h1>
                    <div class="form-row">
                        <div class="form-group col-md-4 col-sm-6">
                          <label for="empresa">Nombre de Empresa</label>
                          <input type="text"  class="form-control" name="empresa" placeholder="Pintura Jalisco SA. de CV."/>
                       </div>
                       <div class="form-group col-md-4 col-sm-6">
                         <label for="telefono">Teléfono</label>
                         <input type="text"  class="form-control" name="telefono" placeholder="(33) 1234 4556 " id="primernombre" />
                       </div>
                       <div class="form-group col-sm-4 col-md-4">
                         <label for="insumo">Tipo de Insumo</label>
                         <select class="custom-select" name="insumo" placeholder="Departamento">
                           <!-- <option value="Pendiente" >Seleccione Area</option> -->
                           <!-- <option value="100">Finanzas</option> -->
                           <!-- <option value="101">Administracion</option> -->
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
                    <div class="">
                      <button class="btn btn-primary" type="submit" name="submit">Registrar</button>
                    </div>
                   </div>
              </form>
            </div>

        <h2 class="sub-header"><br>Lista de Provedores</h2>
        <div class="modal-content animate" style="width: 93%">
                 <table class="table table-striped table-hover table-bordered table-responsive-lg table-responsive-sm table-responsive-md">
                   <thead>
                     <tr>
                       <th scope="col">ID Provedor</th>
                       <th scope="col">Nombre</th>
                       <th scope="col">Telefono</th>
                       <th scope="col">Tipo</th>

                     </tr>
                 </thead>
                 <tbody>
                     <?php
                         while ($row=mysqli_fetch_assoc($result)) {
                           $idProvedor = $row['idProvedor'];
                           $nombreProvedor = $row['nombreProvedor'];
                           $telProvedor = $row['telProvedor'];
                           $tipoProvedor =  $row['tipoDeProvedor'];
                       ?>
                       <tr>
                         <th scope="row"><?php echo $idProvedor?></th>
                         <td><?php echo $nombreProvedor?></td>
                         <td><?php echo $telProvedor?></td>
                         <td><?php echo $tipoProvedor?></td>

                       </tr>
                       <?php } ?>
                  </tbody>
                 </table>
            </div>
      </div>

  </div>

</div>
</div>

<?php include_once 'footer.php' ?>
