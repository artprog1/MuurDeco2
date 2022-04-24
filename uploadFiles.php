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
      $_SESSION["departamento"] == 100 || $_SESSION["departamento"] == 101 || $_SESSION["departamento"] == 102 || $_SESSION["departamento"] == 103 || $_SESSION["departamento"] == 106 ||
      $_SESSION["departamento"] == 108 ||
      $_SESSION["departamento"] == 109  )
    {
      header("location: index.php?error=usuarioNoAdmitido");
      exit();
    }


  $sql = "SELECT tblProyectos.*, tblDepartamentos.nombre, tblClientes.*
FROM tblProyectos
INNER JOIN tblDepartamentos ON tblProyectos.departamentoAsignado=tblDepartamentos.idDepartamento
INNER JOIN tblClientes ON tblProyectos.idCliente2 = tblClientes.idCliente
WHERE departamentoAsignado = 107;";
  $result = mysqli_query($conn, $sql);

?>

<br><br>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 col-lg-2 sidebar ">
      <ul class="nav nav-sidebar list-group-flush">
        <li class="list-group-item" style="width: 100%">Se requiere que los diseñadores puedan integrar sus avances semanalmente<span class="sr-only">(current)</span></li>
        <!-- <li class="list-group-item" style="width: 100%">Proyectos Completados</li> -->
      </ul>

      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div>
          <h1 class="page-header">Area de Diseño</h1>
          <p>Los diseñadores pueden subir sus diseños a cada proyecto</p>
        </div>
        <div class="row placeholders">
          <div class="col-sm-8 col-md-6 col-lg-3 placeholder">
            <a href="#">
            <img src="img/creatividad.jpg" width="1100" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            </a>
            </div>
          </div>

        <h2 class="sub-header"><br>Proyectos bajo Diseño</h2>

    <div class="container">
      <form action="includes/upload.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <legend>Select File to Upload:</legend>
      </div>
    <div class="row">
      <div class="form-group">
        <input type="file" name="file1" />
      </div>
      <div class="form-group">
        <input type="submit" name="submit" value="Upload" class="btn btn-info"/>
      </div>
    </div>
    <div class="row">
      <?php if(isset($_GET['st'])) { ?>
        <div class="alert alert-danger text-center">
            <?php if ($_GET['st'] == 'success') {
                  echo "File Uploaded Successfully!"; }
                    else
                    {
                        echo 'Invalid File Extension!';
                    } ?>
        </div>
        <?php } ?>
        </div>
      </form>

    </div>



<!-- TABLA DE LOS DISENOS A SUBIR -->
        <div class="modal-content animate" style="width: 93%">
                 <table class="table table-striped table-hover table-bordered table-responsive-lg table-responsive-sm table-responsive-md">
                   <thead>
                     <tr>
                       <th scope="col">ID Proyecto </th>
                       <th scope="col">Titulo</th>
                       <th scope="col">Estatus</th>
                       <th scope="col">Departamento Asignado</th>
                       <!-- <th scope="col">Perfil</th> -->
                       <th scope="col">Cliente</th>
                       <th scope="col">PDF</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                         while ($row=mysqli_fetch_assoc($result)) {
                           $idProyecto = $row['idProyecto'];
                           $NombreProyecto = $row['nombreProyecto'];
                           $estatusDelProyecto = $row['estatusDelProyecto'];
                           $Departamento =  $row['nombre'];
                           $Cliente =  $row['nombreCliente']. " ".$row['aPaternoCliente']." ". $row['aMaternoCliente'];
                           $Pdf = $row['pdf'];
                           // $UserPerfil = $row['correoUsuario'];
                       ?>
                       <tr>
                         <th scope="row"><?php echo $idProyecto?></th>
                         <td><?php echo $NombreProyecto?></td>
                         <td><?php echo $estatusDelProyecto?></td>
                         <td><?php echo $Departamento?></td>
                         <td><?php echo $Cliente?></td>
                         <td><?php echo $Pdf?></td>
                         <!-- IMPLEMENTNG -->
                         <td><?php echo $row['pdf']; ?></td>
                         <td><a href="uploads/<?php echo $row['filename']; ?>" target="_blank">Visualizar</a></td>
                         <td><a href="uploads/<?php echo $row['filename']; ?>" download>Descargar</td>

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
