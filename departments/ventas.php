<link rel="stylesheet" href="../css/style.css" />
<?php
  // include_once '/MuurDecoShop2/header.php'

  include_once '../header.php';
  // include($_SERVER['MuurDecoShop2'].'/header.php');
  // include($_SERVER['MuurDecoShop2'].'../includes/dbh.inc.php');
  // include('../includes/dbh.inc.php');
  require_once 'dbh.inc.php';



  // $conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName );


    if (!isset($_SESSION["useruid"])) {
      header("location: ../login.php?error=noingresado");
      exit();
    }

    $sql = "SELECT * FROM tblProyectos;";
    $result = mysqli_query($conn, $sql);



 ?>

<h1>Ventas</h1>
<div class="container2">
    <h2>Regristo de Proyectos</h2>
  <div class="row">
    <div class="col-l m-auto">
      <div class="table table-bordered">
       <table class="styled-table">
         <td>
           <tr>
             <td>ID </td>
             <td>Proyecto</td>
             <td>Descripcion</td>
             <td>Adjunto</td>
             <td>Estatus del Proyecto</td>
             <td>Departamento Asginado</td>
             <td>Estatus de Factura</td>

           </tr>

           <?php
               while ($row=mysqli_fetch_assoc($result)) {
                 $UserID = $row['idProyecto'];
                 $UserName = $row['nombreProyecto'];
                 $UserMaterno = $row['descripcion'];
                 $UserPaterno = $row['pdf'];
                 $UserEmail = $row['estatusDelProyecto'];
                 $UserUID = $row['departamentoAsignado'];
                 $UserPerfil = $row['estatusDeFactura'];
             ?>
             <tr>
               <td><?php echo $UserID ?></td>
               <td><?php echo $UserName ?></td>
               <td><?php echo $UserMaterno ?></td>
               <td><?php echo $UserPaterno ?></td>
               <td><?php echo $UserEmail ?></td>
               <td><?php echo $UserUID ?></td>
               <td><?php echo $UserPerfil ?></td>
               <!-- <td> <a href="../includes/edit.php?GetID=<?php echo $UserID?>">Editar</a> </td>

               <td> <a href="../includes/delete.php?Del=<?php echo $UserID?>" onclick="return confirm('Are you sure?')">Borrar</a> </td>
               <td> <a href="../includes/reset.php?Res=<?php echo $UserID?>">Reset</a> </td> -->
             </tr>
             <?php
             }
              ?>
         </td>
       </table>
      </div>
    </div>

  </div>

</div>
