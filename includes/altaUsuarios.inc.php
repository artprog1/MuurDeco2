<?php

if (isset($_POST["submit"])) {

  $name = $_POST["nombre"];
  $paterno = $_POST["paterno"];
  $materno = $_POST["materno"];
  $email = $_POST["email"];
  $username = $_POST["uid"]; //Se va anular
  $telefono = $_POST["telefono"];
  $dept = $_POST["departamento"];
  $pwd = $_POST["pwd"];
  $pwdRepeat = $_POST["pwdrepetido"];
  // $perfilU  = $_POST["perfil"];
  // Ingresamos referencia la pagina
  $urlLink = "administracion.php";
  $tableInUse = "tblUsuarios";

require_once 'dbh.inc.php';
require_once 'altaUsrsFNS.inc.php';

// Checamos si hay bloques en blanco
if (emptyInputSignup($name, $paterno, $materno, $email, $username, $telefono, $pwd, $pwdRepeat) !== false) {
  header("location: ../$urlLink?error=emptyinput");
  // header("location: ../ventas/index.php?error=emptyinput");
  exit();
}

// No se captura para este formulario
// if (invalidUid( $username) !== false) {
//   header("location: ../$urlLink?error=invaliduid");
//   exit();
// }


if (invalidName($name, $paterno, $materno) !== false ) {
  header("location: ../$urlLink?error=invalidNames");
  exit();
}

if (strongPwd($pwd) !== false) {
  header("location: ../$urlLink?error=weakpwd");
  exit();
}
// Verifica si el formato de las credenciales son correctas

// Verificamos si la contrasena es congruente
if (pwdMatch($pwd, $pwdRepeat) !== false) {
  header("location: ../$urlLink?error=passwordsdontmatch");
  exit();
}

// Verificamos si el nombre del usuario ya existe
if (uidExists($conn, $username, $email, $tableInUse) !== false) {
  header("location: ../$urlLink?error=usernametaken");
  exit();
}

//Contrasena debe de ser mas fuerte

createUser($conn, $name, $paterno, $materno, $email, $username, $telefono, $dept, $pwd, $tableInUse, $urlLink);


}


else {

  header("location: ../$urlLink?error=sinconnexionabd");
  exit();
}
