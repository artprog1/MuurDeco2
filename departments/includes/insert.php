<?php

require_once("dbh.inc.php");

if(isset($_POST['submit'])){
  if (empty($_POST['nombre']) ||  empty($_POST['paterno']) || empty($_POST['materno']) || empty($_POST['email']) ||  empty($_POST['uid']) || empty($_POST['pwd']) ) {
    echo "Asegure de llenar todos los campos";

  }
  else {
    $UserName = $_POST['nombre'];
    $UserPaterno = $_POST['paterno'];
    $UserMaterno = $_POST['materno'];
    $UserEmail = $_POST['email'];
    $UserNameID = $_POST['uid'];
    $UserPwd = $_POST['pwd'];

    $query = "INSERT INTO users (usersPrimerNombre, usersApellidoMaterno, usersApellidoPaterno, usersEmail, usersUid, usersPwd) values ('$UserName', '$UserPaterno', '$UserMaterno', '$UserEmail', '$UserNameID', '$UserPwd');";
    $result = mysqli_query($conn, $query);

    if ($result) {
      header("location:view.php");

    }
    else {
      echo ' Favor de checar su solicitud';
    }

  }
}
else {
  header("location: ../signup.php?error=registeringformnotsubmitted");
}
 ?>
 <!-- <input type="text" name="nombre" placeholder="Primer Nombre...">
 <input type="text" name="paterno" placeholder="Apellido Paterno...">
 <input type="text" name="materno" placeholder="Apellido Materno...">
 <input type="email" name="email" placeholder="Correo Electronico...">
 <input type="text" name="uid" placeholder="ID de Usuario...">
 <input type="password" name="pwd" placeholder="Contraseña...">
 <input type="password" name="pwdrepetido" placeholder="Confirmar Contraseña"> -->
