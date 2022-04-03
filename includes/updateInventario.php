<?php
require_once 'dbh.inc.php';
include_once '../header.php';

if (isset($_POST['update'])) {
  //
  // $UserID = $_GET['ID'];
  // $UserName = $_POST['name'];
  // $UserEmail = $_POST['email'];
  // $UserAge = $_POST['age'];

  $IDInsumo = $_GET['ID'];
  $articulo = $_POST['articulo'];
  $costo = $_POST['costo'];
  $tipoArticulo = $_POST['tipoArticulo'];
  $provedor = $_POST['provedor'];

  if ($provedor == "NULL") {
    $query = " UPDATE tblInsumos SET
    idProvedor2 = NULL
    WHERE idInsumos='".$IDInsumo."';";

    $result = mysqli_query($conn,$query);  // ', usersUid = '".$UserUID." ', usersEmail = '".$UserEmail."


    header("location: ../inventario.php?msg=null");
  }

  $query = " UPDATE tblInsumos SET
  nombre = '".$articulo
  ."', costo = '".$costo
  ."', tipo = '".$tipoArticulo
  ."', idProvedor2 = '".$provedor
  ."' WHERE idInsumos='".$IDInsumo."';";

  $result = mysqli_query($conn,$query);  // ', usersUid = '".$UserUID." ', usersEmail = '".$UserEmail."



  if ($result) {

    header("location: ../inventario.php?msg=updatedone");
  }
  else {

    print_r("Error 233223 --><br>");
    print_r("QUERY: ".$query);
  }
}
else {

  header("location: ../inventario.php?error=notPostValidated");
}
 ?>
