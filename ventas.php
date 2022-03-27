<!-- <link rel="stylesheet" href="../css/style.css" /> -->
<?php
  include_once 'header.php';
  require_once 'includes/dbh.inc.php';

    if (!isset($_SESSION["useruid"])) {
      header("location: login.php?error=noingresado");
      exit();
    }
    // Query para tabla de Clientes
    $sqlClientes = "SELECT * FROM tblClientes;";
    $resultClientes = mysqli_query($conn, $sqlClientes);

    // Query para tabla de Proyectos
    $sql = "SELECT * FROM tblProyectos;";
    $result = mysqli_query($conn, $sql);

 ?>

 <br><br>
 <div class="container-fluid">
   <div class="row">
     <div class="col-sm-3 col-md-2 col-lg-2 sidebar ">
       <ul class="nav nav-sidebar list-group-flush">
         <li class="list-group-item" style="width: 100%"><a href="#">Registrar Cliente<span class="sr-only">(current)</span></a></li>
         <li class="list-group-item" style="width: 100%"><a href="#">Generar Proyecto</a></li>
         <li class="list-group-item" style="width: 100%"><a href="#">Generar Cotización</a></li>
         <!-- <li class="list-group-item" style="width: 100%"><button type="button" class="btn btn-light" style="width: 100%">Light</button></li> -->
       </ul>

       </div>
       <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         <div>
           <h1 class="page-header">Ventas Generales</h1>
           <p>Modal con la finalidad de dar de alta a clientes potenciales, proyectos y sus presupuestos</p>
         </div>
         <div class="row placeholders">
           <div class="col-sm-8 col-md-6 col-lg-3 placeholder">
             <a href="#">
             <img src="img/ventas2.jpg" width="1100" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
             </a>
           </div>
          </div>
<h2 class="sub-header"><br>Clientes Registrados</h2>
<!-- <div class="modal-content animate" style="width: 93%"> -->


   <!--TABLA DE CLIENTES REGISTRADOS  -->
<div class="modal-content animate" style="width: 93%">
  <table class="table table-striped table-hover table-bordered table-responsive-lg table-responsive-sm table-responsive-md">
    <thead>
      <tr>

             <th scope="col">ID  </th>
             <th scope="col">Nombre</th>
             <th scope="col">Dirección</th>
             <th scope="col">Telefono</th>

           </thead>
           <tbody>
           <?php
               while ($rowCliente=mysqli_fetch_assoc($resultClientes)) {
                 $idCliente = $rowCliente['idCliente'];
                 $nombreCliente = $rowCliente['nombreCliente']." ".$rowCliente['aPaternoCliente']." ". $rowCliente['aMaternoCliente'];
                 $direccion = $rowCliente['direccionCalle']." ".$rowCliente['direccionCiudad']." ".$rowCliente['direccionEstado']." ".$rowCliente['direccionCodigoP'];
                 $telefonoCliente = $rowCliente['telefonoCliente'];
             ?>
             <tr>
               <th scope="row"><?php echo $idCliente ?></th>
               <td><?php echo $nombreCliente ?></td>
               <td><?php echo $direccion ?></td>
               <td><?php echo $telefonoCliente ?></td>
            </tr>
             <?php  }  ?>
           </tbody>
          </table>

    </div>



<h2 class="sub-header"><br>Proyectos Registrados</h2>
<div class="modal-content animate" style="width: 93%">
         <table class="table table-striped table-hover table-bordered table-responsive-lg table-responsive-sm table-responsive-md">
           <thead>

           <tr>
             <th scope="col">ID Proyecto </th>
             <th scope="col">Titulo</th>
             <th scope="col">Descripción</th>
             <th scope="col">PDF</th>
             <!-- <th scope="col">Perfil</th> -->
             <th scope="col">Estatus</th>
             <th scope="col">Departamento Asignado</th>
             <th scope="col">Estatus de Factura</th>
             <th scope="col">Cliente</th>

           </tr>
         </thead>
         <tbody>
           <?php
               while ($row=mysqli_fetch_assoc($result)) {
                 $idProyecto = $row['idProyecto'];
                 $nombreProyecto = $row['nombreProyecto'];
                 $descripcion = $row['descripcion'];
                 $pdf = $row['pdf'];
                 $estatusDelProyecto = $row['estatusDelProyecto'];
                 $departamentoAsignado =  $row['departamentoAsignado'];;
                 $estatusDeFactura = $row['estatusDeFactura'];
                 $idCliente2 = $row['idCliente2'];
             ?>
             <tr>
               <th scope="row"><?php echo $idProyecto?></th>
               <td><?php echo $nombreProyecto ?></td>
               <td><?php echo $descripcion ?></td>
               <td><?php echo $pdf ?></td>
               <td><?php echo $estatusDelProyecto ?></td>
               <td><?php echo $departamentoAsignado ?></td>
               <td><?php echo $estatusDeFactura ?></td>
               <td><?php echo $idCliente2 ?></td>
               <!-- <td> <a href="../includes/edit.php?GetID=<?php echo $UserID?>">Editar</a> </td>

               <td> <a href="../includes/delete.php?Del=<?php echo $UserID?>" onclick="return confirm('Are you sure?')">Borrar</a> </td>
               <td> <a href="../includes/reset.php?Res=<?php echo $UserID?>">Reset</a> </td> -->
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
