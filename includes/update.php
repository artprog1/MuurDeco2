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
  $UserName = $_POST['name'];
  $UserMaterno = $_POST['materno'];
  $UserPaterno = $_POST['paterno'];
  $UserEmail = $_POST['correo'];
  $UserUID = $_POST['uid'];
  $UserPerfil = $_POST['perfil'];

  $query = " UPDATE users SET usersPrimerNombre = '".$UserName."', usersApellidoMaterno = '".$UserMaterno."', usersApellidoPaterno = '".$UserPaterno."', usersEmail = '".$UserEmail."', usersUid = '".$UserUID."', perfil = '".$UserPerfil."' where usersId='".$UserID."';";
  $result = mysqli_query($conn,$query);



  if ($result) {

    header("location: ../signup.php?msg=updatedone");
  }
  else {
echo $UserID . $UserName .  $UserMaterno .  $UserPaterno .  $UserEmail . $UserUID .  $UserPerfil;
    echo "Favor de checar los datos";
  }
}
else {

  header("location: view.php?error=notPostValidated");
}
 ?>
