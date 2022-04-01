<?php
include_once 'header.php';
require_once 'includes/dbh.inc.php';
// require_once 'includes/caducarSesion.php';

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName );

  if (!isset($_SESSION["useruid"])) {
    header("location: login.php?error=noingresado");
    exit();
  }
  include_once 'modal.php';

  $sql = "SELECT * FROM tblProvedores";
  $result = mysqli_query($conn, $sql);

?>

<br><br>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 col-lg-2 sidebar ">
      <ul class="nav nav-sidebar list-group-flush">
        <li class="list-group-item" style="width: 100%">
          <button type="button" class="btn btn-primary" style="width: 100%; height: 45px" data-toggle="modal" data-target="#id03">
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



        <h2 class="sub-header">Lista de Provedores</h2>
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
