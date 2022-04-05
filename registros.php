<?php
include_once 'header.php';
require_once 'includes/dbh.inc.php';
// require_once 'includes/caducarSesion.php';

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName );

  if (!isset($_SESSION["useruid"])) {
    header("location: login.php?error=noingresado");
    exit();
  }

  if (
      $_SESSION["departamento"] == 100 || $_SESSION["departamento"] == 101 ||  $_SESSION["departamento"] == 103 ||
      $_SESSION["departamento"] == 107 ||
      $_SESSION["departamento"] == 108 ||
      $_SESSION["departamento"] == 109  )
    {
      header("location: index.php?error=usuarioNoAdmitido");
      exit();
    }

  include_once 'modal.php';

  $sql = "SELECT * FROM tblProvedores";
  $result = mysqli_query($conn, $sql);

?>

<div class="">
  <?php

  if (isset($_GET["msg"])) {
  if ($_GET["msg"] == "parent") {
      echo "<p class='font-weight-light'>Favor de borrar los insumos ligados con este Provedor</p>";
  }
  }
  ?>
</div>

<br><br>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 col-lg-2 sidebar ">
      <ul class="nav nav-sidebar list-group-flush">
        <li class="list-group-item" style="width: 100%">
          <button type="button" class="btn btn-primary" style="width: 100%; height: 45px" data-toggle="modal" data-target="#id03">
            Nuevo Proveedor
          </button>
        </li>

      </ul>

      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div>
          <h1 class="page-header">Proveedores Registrados</h1>
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
                       <th scope="col">Modificar</th>

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
                         <td> <a href="includes/edit2.php?GetID=<?php echo $idProvedor?>">Editar</a> </td>
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
