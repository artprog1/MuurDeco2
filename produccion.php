<?php
include_once 'header.php';
require_once 'includes/dbh.inc.php';

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName );

  if (!isset($_SESSION["useruid"])) {
    header("location: login.php?error=noingresado");
    exit();
  }

  $sql = "SELECT tblProyectos.*, tblDepartamentos.nombre, tblClientes.*
FROM tblProyectos
INNER JOIN tblDepartamentos ON tblProyectos.departamentoAsignado=tblDepartamentos.idDepartamento
INNER JOIN tblClientes ON tblProyectos.idCliente2 = tblClientes.idCliente
WHERE departamentoAsignado = 108;";
  $result = mysqli_query($conn, $sql);

?>


<br><br>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 col-lg-2 sidebar ">
      <ul class="nav nav-sidebar list-group-flush">
        <li class="list-group-item" style="width: 100%">Se Requiere Actualizacón cuando se complete cada proyecto<span class="sr-only">(current)</span></li>
      </ul>

      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div>
          <h1 class="page-header">En Producción</h1>
          <p>Los proyectos que han sido aprobados y estan en proceso de construccion se veran reflejados con estatus del personal</p>
        </div>
        <div class="row placeholders">
          <div class="col-sm-8 col-md-6 col-lg-3 placeholder">
            <a href="#">
            <img src="img/constru.jpg" width="1100" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            </a>
            </div>
          </div>

        <h2 class="sub-header"><br>Construyendo</h2>
        <div class="modal-content animate" style="width: 93%">
                 <table class="table table-striped table-hover table-bordered table-responsive-lg table-responsive-sm table-responsive-md">
                   <thead>
                     <tr>
                       <th scope="col">ID Proyecto </th>
                       <th scope="col">Titulo</th>
                       <th scope="col">Estatus</th>
                       <th scope="col">Descripción</th>
                       <!-- <th scope="col">Perfil</th> -->
                       <th scope="col">Cliente</th>
                       <th scope="col">Comentarios</th>
                       <th scope="col">PDF</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                         while ($row=mysqli_fetch_assoc($result)) {
                           $idProyecto = $row['idProyecto'];
                           $NombreProyecto = $row['nombreProyecto'];
                           $estatusDelProyecto = $row['estatusDelProyecto'];
                           $Descripcion =  $row['descripcion'];
                           $Cliente =  $row['nombreCliente']. " ".$row['aPaternoCliente']." ". $row['aMaternoCliente'];
                           $Pdf = $row['pdf'];
                           $Comentarios = $row['Comentarios'];
                           // $UserPerfil = $row['correoUsuario']; //Comentarios
                       ?>
                       <tr>
                         <th scope="row"><?php echo $idProyecto?></th>
                         <td>
                           <a href="includes/edit5.php?GetID=<?php echo $idProyecto ?>"><?php echo $NombreProyecto ?></a>
                         </td>
                         <td><?php echo $estatusDelProyecto?></td>
                         <td><?php echo $Descripcion?></td>
                         <td><?php echo $Cliente?></td>
                         <td><?php echo $Comentarios?></td>
                         <td><?php echo $Pdf?></td>
                       </tr>
                       <?php } ?>
                  </tbody>
                 </table>
            </div>
      </div>

  </div>

</div>
</div>


<?php include_once 'footer.php'; ?>
