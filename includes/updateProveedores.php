<?php
require_once 'dbh.inc.php';
include_once '../header.php';

if (isset($_POST['update'])) {
  //
  // $UserID = $_GET['ID'];
  // $UserName = $_POST['name'];
  // $UserEmail = $_POST['email'];
  // $UserAge = $_POST['age'];

  $idProvedor = $_GET['ID'];
  $nombreProvedor = $_POST['empresa'];
  $telProvedor = $_POST['telefono'];
  $tipoDeProvedor = $_POST['insumo'];


  $query = " UPDATE tblProvedores SET nombreProvedor = '".$nombreProvedor
  ."', telProvedor = '".$telProvedor
  ."', tipoDeProvedor = '".$tipoDeProvedor
  ."' WHERE idProvedor='".$idProvedor."';";

  $result = mysqli_query($conn,$query);  // ', usersUid = '".$UserUID." ', usersEmail = '".$UserEmail."



  if ($result) {

    header("location: ../registros.php?msg=updatedone");
  }
  else {

    print_r("Error 543456 -->".$nombreProvedor." ".$telProvedor." ".$tipoDeProvedor." ".$idProvedor);
    print_r("Echo: ".$query);
  }
}
else {

  header("location: registros.php?error=notPostValidated");
}
 ?>
