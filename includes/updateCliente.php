<?php
require_once 'dbh.inc.php';
include_once '../header.php';

if (isset($_POST['update'])) {
  //
  // $UserID = $_GET['ID'];
  // $UserName = $_POST['name'];
  // $UserEmail = $_POST['email'];
  // $UserAge = $_POST['age'];

  $IDCliente = $_GET['ID'];
  $nombre = $_POST['nombre'];
  $paterno = $_POST['paterno'];
  $materno = $_POST['materno'];
  $direccionCalle = $_POST['direccionCalle'];
  $ciudad = $_POST['ciudad'];
  $estado = $_POST['estado'];
  $postal = $_POST['postal'];
  $telefono = $_POST['telefono'];


  // if ($provedor == "NULL") {
  //   $query = " UPDATE tblInsumos SET
  //   idProvedor2 = NULL
  //   WHERE idInsumos='".$IDInsumo."';";
  //
  //   $result = mysqli_query($conn,$query);  // ', usersUid = '".$UserUID." ', usersEmail = '".$UserEmail."
  //
  //
  //   header("location: ../inventario.php?msg=null");
  // }

  $query = " UPDATE tblClientes SET
  nombreCliente = '".$nombre
  ."', aPaternoCliente = '".$paterno
  ."', aMaternoCliente = '".$materno
  ."', direccionCalle = '".$direccionCalle
  ."', direccionCiudad = '".$ciudad
  ."', direccionEstado = '".$estado
  ."', direccionCodigoP = '".$postal
  ."', telefonoCliente = '".$telefono
  ."' WHERE idCliente='".$IDCliente."';";

  $result = mysqli_query($conn,$query);  // ', usersUid = '".$UserUID." ', usersEmail = '".$UserEmail."



  if ($result) {

    header("location: ../ventas.php?msg=updatedone");
  }
  else {

    print_r("Error Ventas --><br>");
    print_r("QUERY: ".$query);
  }
}
else {

  header("location: ../ventas.php?error=notPostValidated");
}
 ?>
