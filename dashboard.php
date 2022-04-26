<?php
include_once 'header.php';
require_once 'includes/dbh.inc.php';
// require_once 'includes/caducarSesion.php';

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName );

  if (!isset($_SESSION["useruid"])) {
    header("location: login.php?error=noingresado");
    exit();
  }

  $sql = "SELECT tblProyectos.*, tblDepartamentos.nombre, tblClientes.*
FROM tblProyectos
INNER JOIN tblDepartamentos ON tblProyectos.departamentoAsignado=tblDepartamentos.idDepartamento
INNER JOIN tblClientes ON tblProyectos.idCliente2 = tblClientes.idCliente;";
  $result = mysqli_query($conn, $sql);


  $sqlVentas = "SELECT COUNT(*) AS total FROM tblProyectos WHERE departamentoAsignado = 103;";
  $resultVentas = mysqli_query($conn, $sqlVentas);
  $dataVentas = mysqli_fetch_assoc($resultVentas);

  $sqlLogistica = "SELECT COUNT(*) AS total FROM tblProyectos WHERE departamentoAsignado = 106;";
  $resultLogistica = mysqli_query($conn, $sqlLogistica);
  $dataLogistica = mysqli_fetch_assoc($resultLogistica);

  $sqlDiseno = "SELECT COUNT(*) AS total FROM tblProyectos WHERE departamentoAsignado = 107;";
  $resultDiseno = mysqli_query($conn, $sqlDiseno);
  $dataDiseno = mysqli_fetch_assoc($resultDiseno);

  $sqlProduccion = "SELECT COUNT(*) AS total FROM tblProyectos WHERE departamentoAsignado = 108;";
  $resultProduccion = mysqli_query($conn, $sqlProduccion);
  $dataProduccion = mysqli_fetch_assoc($resultProduccion);

  $sqlDireccion = "SELECT COUNT(*) AS total FROM tblProyectos WHERE departamentoAsignado = 109;";
  $resultDireccion = mysqli_query($conn, $sqlDireccion);
  $dataDireccion = mysqli_fetch_assoc($resultDireccion);

?>



<br><br>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 col-lg-2 sidebar ">
      <ul class="nav nav-sidebar list-group-flush">
        <!-- <li class="list-group-item" style="width: 100%"><a href="#">Grafica de Proyectos<span class="sr-only">(current)</span></a></li> -->
        <!-- <li class="list-group-item" style="width: 100%"><a href="#">Grafica de Insumos</a></li> -->
        <!-- <li class="list-group-item" style="width: 100%"><a href="#">Grafica de Clientes</a></li> -->

      </ul>

      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div>
          <h1 class="page-header">Departamentos</h1>
        </div>
        <div class="row placeholders">

          <div class="col-sm-8 col-md-6 col-lg-3 placeholder">
            <a href="diseno.php">
            <img src="img/diseno.jpeg" width="290" height="140" class="img-responsive" alt="Generic placeholder thumbnail">
            </a>
            <h4>Diseño</h4>
            <!-- <span class="text-muted"></span> -->
          </div>
          <div class="col-sm-8 col-md-6 col-lg-3 placeholder">
            <a href="inventario.php">
            <img src="img/inventario.jpg" width="290" height="140" class="img-responsive" alt="Generic placeholder thumbnail">
            </a>
            <h4>Inventario</h4>
            <!-- <span class="text-muted">Detalles</span> -->
          </div>
          <div class="col-sm-8 col-md-6 col-lg-3 placeholder">
            <a href="produccion.php">
            <img src="img/manoObra.jpeg" width="290" height="140" class="img-responsive" alt="Generic placeholder thumbnail">
            </a>
            <h4>Producción</h4>
            <!-- <span class="text-muted">Detalles</span> -->
          </div>
          <div class="col-sm-8 col-md-6 col-lg-3 placeholder">
            <a href="ventas.php">
            <img src="img/ventas.jpeg" width="270" height="140" class="img-responsive" alt="Generic placeholder thumbnail">
            </a>
            <h4>Ventas</h4>

          </div>
        </div>



        <h2 class="sub-header"><br>Proyectos Activos</h2>


        <div class="table" >
          <div class="modal-content animate" >
            <canvas id="myChart" ></canvas>
          </div>
        </div>


        <div class="">
          <h2>Panorama General de Proyectos</h2>
        </div>

        <div class="modal-content animate">

                 <table class="table table-striped table-hover table-bordered table-responsive-lg table-responsive-sm table-responsive-md">
                   <thead>
                     <tr>
                       <th scope="col">ID Proyecto </th>
                       <th scope="col">Titulo</th>
                       <th scope="col">Estatus</th>
                       <th scope="col">Departamento Asignado</th>
                       <!-- <th scope="col">Perfil</th> -->
                       <th scope="col">Cliente</th>
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
                           // $UserPerfil = $row['correoUsuario'];
                       ?>
                       <tr>
                         <th scope="row"><?php echo $idProyecto?></th>
                         <td><?php echo $NombreProyecto?></td>
                         <td><?php echo $estatusDelProyecto?></td>
                         <td><?php echo $Departamento?></td>
                         <td><?php echo $Cliente?></td>

                       </tr>
                       <?php } ?>
                  </tbody>
                 </table>
            </div>
      </div>

  </div>

</div>

<?php include_once 'footer.php' ?>
