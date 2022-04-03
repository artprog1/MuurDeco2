<?php
require_once 'dbh.inc.php';
include_once '../header.php';

if (isset($_POST['update'])) {
  //
  // $UserID = $_GET['ID'];
  // $UserName = $_POST['name'];
  // $UserEmail = $_POST['email'];
  // $UserAge = $_POST['age'];

  $idProyecto = $_GET['ID'];
  $statusProyecto = $_POST['statusProyecto'];
  $comentarios = $_POST['comentarios'];


  $query = " UPDATE tblProyectos SET
  estatusDelProyecto = '".$statusProyecto
  ."', Comentarios = '".$comentarios
  ."' WHERE idProyecto='".$idProyecto."';";

  $result = mysqli_query($conn,$query);  // ', usersUid = '".$UserUID." ', usersEmail = '".$UserEmail."



  if ($result) {

    header("location: ../produccion.php?msg=updatedone");
  }
  else {

    print_r("Error 543456 -->");
    print_r("Echo: ".$query);
  }
}
else {

  header("location: produccion.php?error=notPostValidated");
}
 ?>
