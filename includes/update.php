<?php
require_once 'dbh.inc.php';
include_once '../header.php';

if (isset($_POST['update'])) {
  //
  // $UserID = $_GET['ID'];
  // $UserName = $_POST['name'];
  // $UserEmail = $_POST['email'];
  // $UserAge = $_POST['age'];

  $UserID = $_GET['ID'];
  $usersUid = $_POST['uid'];
  $correoUsuario = $_POST['email'];
  $nombreUsuario = $_POST['nombre'];
  $aPaternoUsuario = $_POST['paterno'];
  $aMaternoUsuario = $_POST['materno'];
  $telefonoUsuario = $_POST['telefono'];
  $idDepartamento2 = $_POST['departamento'];

  $query = " UPDATE tblUsuarios SET usersUid = '".$usersUid
  ."', correoUsuario = '".$correoUsuario
  ."', nombreUsuario = '".$nombreUsuario
  ."', aPaternoUsuario = '".$aPaternoUsuario
  ."', aMaternoUsuario = '".$aMaternoUsuario
  ."', telefonoUsuario = '".$telefonoUsuario
  ."', idDepartamento2 = '".$idDepartamento2
  ."' where idUsuario='".$UserID."';";

  $result = mysqli_query($conn,$query);  // ', usersUid = '".$UserUID." ', usersEmail = '".$UserEmail."



  if ($result) {

    header("location: ../administracion.php?msg=updatedone");
  }
  else {

    print_r("Error 98876 -->".$result);
  }
}
else {

  header("location: view.php?error=notPostValidated");
}
 ?>
