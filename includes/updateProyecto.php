<?php
require_once 'dbh.inc.php';
include_once '../header.php';

if (isset($_POST['update'])) {

  $idProyecto = $_GET['ID'];
  $proyecto = $_POST['proyecto'];
  $statusProyecto = $_POST['statusProyecto'];
  $departamentoAsignado = $_POST['departamentoAsignado'];
  $description = $_POST['description'];
  $factura = $_POST['factura'];
  $idCliente2 = $_POST['idCliente2'];
  $comentarios = $_POST['comentarios'];

  $query = " UPDATE tblProyectos SET
  nombreProyecto = '".$proyecto
  ."', descripcion = '".$description
  ."', estatusDelProyecto = '".$statusProyecto
  ."', departamentoAsignado = '".$departamentoAsignado
  ."', estatusDeFactura = '".$factura
  ."', idCliente2 = '".$idCliente2
  ."', Comentarios = '".$comentarios
  ."' WHERE idProyecto='".$idProyecto."';";

  $result = mysqli_query($conn,$query);  



  if ($result) {

    header("location: ../ventas.php?msg=updatedone");
  }
  else {

    print_r("Error Ventas -->");
    print_r("Echo: ".$query);
  }
}
else {

  header("location: ventas.php?error=notPostValidated");
}
 ?>
