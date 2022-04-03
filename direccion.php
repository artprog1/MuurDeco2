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
ORDER BY tblDepartamentos.idDepartamento DESC";
// -- WHERE departamentoAsignado = 108;";
  $result = mysqli_query($conn, $sql);

?>


<br><br>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 col-lg-2 sidebar ">
      <ul class="nav nav-sidebar list-group-flush">
        <li class="list-group-item" style="width: 100%">Se requiere una revision diaria con todos los proyectos<span class="sr-only">(current)</span></li>
      </ul>

      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div>
          <h1 class="page-header">Panorama General de Proyectos</h1>
          <p>Se genera visibilidad de todos los poryectos y sus departamentos asigandos. El engacardo de dirección podra mover los proyecto a su diferente departamento.  </p>
        </div>
        <div class="row placeholders">
          <div class="col-sm-8 col-md-6 col-lg-3 placeholder">
            <a href="#">
            <img src="img/pm.jpg" width="1100" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
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
                       <th scope="col">Descripción</th>
                       <th scope="col">Estatus del Proyecto</th>
                       <!-- <th scope="col">Perfil</th> -->
                       <th scope="col">Departamento</th>
                       <th scope="col">Comentarios</th>
                       <!-- <th scope="col">PDF</th> -->
                     </tr>
                 </thead>

                 <tbody>
                     <?php
                         while ($row=mysqli_fetch_assoc($result)) {
                           $idProyecto = $row['idProyecto'];
                           $Descripcion =  $row['descripcion'];
                           $NombreProyecto = $row['nombreProyecto'];
                           $estatusDelProyecto = $row['estatusDelProyecto'];
                           $nombreDepartamento = $row['nombre'];
                           $Comentarios = $row['Comentarios'];
                           // $UserPerfil = $row['correoUsuario']; //Comentarios
                       ?>
                       <tr>
                         <th scope="row"><?php echo $idProyecto?></th>
                         <td>
                           <a href="includes/edit4.php?GetID=<?php echo $idProyecto ?>"><?php echo $NombreProyecto ?></a>
                         </td>
                         <td><?php echo $Descripcion?></td></a>
                         <td><?php echo $estatusDelProyecto?></td>
                         <td><?php echo $nombreDepartamento?></td>
                         <td><?php echo $Comentarios?></td>
                         <!-- <td><?php //echo $Pdheref?></td> -->
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
