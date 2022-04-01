<?php
include_once 'header.php';
require_once 'includes/dbh.inc.php';
// require_once 'includes/caducarSesion.php';

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName );

  if (!isset($_SESSION["useruid"])) {
    header("location: login.php?error=noingresado");
    exit();
  }
  require_once 'modal.php';
  $sql = "SELECT tblInsumos.*, tblProvedores.nombreProvedor
  FROM tblInsumos
  INNER JOIN tblProvedores ON tblInsumos.idProvedor2 = tblProvedores.idProvedor ;";
  $result = mysqli_query($conn, $sql);

?>

<br><br>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 col-lg-2 sidebar ">
      <ul class="nav nav-sidebar list-group-flush">
        <li class="list-group-item" style="width: 100%">
          <button type="button" class="btn btn-primary" style="width: 100%; height: 45px" data-toggle="modal" data-target="#id01">
            Nuevo Cliente
          </button>
        </li>
        <li class="list-group-item" style="width: 100%">
          <button type="button" class="btn btn-primary" style="width: 100%; height: 45px" data-toggle="modal" data-target="#modalAltaDeProyecto">
            Nuevo Proyecto
          </button>
          </li>
      </ul>

      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div>
          <h1 class="page-header">Inventario</h1>
          <p>Administración general de los insumos a trabajar.</p>
        </div>
        <div class="row placeholders">
          <div class="col-sm-8 col-md-6 col-lg-3 placeholder">
            <a href="#">
            <img src="img/inventary.jpg" width="1100" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            </a>
            </div>
          </div>

        <h2 class="sub-header"><br>Lista de Inventario</h2>
        <div class="modal-content animate" style="width: 93%">
                 <table class="table table-striped table-hover table-bordered table-responsive-lg table-responsive-sm table-responsive-md">
                   <thead>
                     <tr>
                       <th scope="col">ID Insumo</th>
                       <th scope="col">Nombre</th>
                       <th scope="col">Costo del Insumo</th>
                       <th scope="col">Tipo de Insumo</th>
                       <th scope="col">Provedor</th>

                     </tr>
                 </thead>
                 <tbody>
                     <?php
                         while ($row=mysqli_fetch_assoc($result)) {
                           $IDInsumo = $row['idInsumos'];
                           $NombreInsumo = $row['nombre'];
                           $CostoInsumo = $row['costo'];
                           $TipoInsumo =  $row['tipo'];
                           $nombreProvedor =  $row['nombreProvedor'];
                       ?>
                       <tr>
                         <th scope="row"><?php echo $IDInsumo?></th>
                         <td><?php echo $NombreInsumo?></td>
                         <td><?php echo $CostoInsumo?></td>
                         <td><?php echo $TipoInsumo?></td>
                         <td><?php echo $nombreProvedor?></td>
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
