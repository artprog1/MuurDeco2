<?php

if (isset($_POST["submit"])) {

  $name = $_POST["nombre"];
  $paterno = $_POST["paterno"];
  $materno = $_POST["materno"];
  $email = $_POST["email"];
  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];
  $pwdRepeat = $_POST["pwdrepetido"];
  $perfilU  = $_POST["perfil"];


require_once 'dbh.inc.php';
require_once 'functions.inc.php';

// Checamos si hay bloques en blanco
if (emptyInputSignup($name, $paterno, $materno, $email, $username, $pwd, $pwdRepeat, $perfilU) !== false) {
  header("location: ../signup.php?error=emptyinput");
  // header("location: ../ventas/index.php?error=emptyinput");
  exit();
}

if (strongPwd($pwd) !== false) {
  header("location: ../signup.php?error=weakpwd");
  exit();
}

if (invalidName($name, $paterno, $materno) !== false ) {
  header("location: ../signup.php?error=invalidNames");
  exit();
}
// Verifica si el formato de las credenciales son correctas
if (invalidUid( $username) !== false) {
  header("location: ../signup.php?error=invaliduid");
  exit();
}
// Verifica si el email esta en formato correcto
// if (invalidEmail($email) !== false) {
//   header("location: ../signup.php?error=invalidemail");
//   exit();
// }
// Verificamos si la contrasena es congruente
if (pwdMatch($pwd, $pwdRepeat) !== false) {
  header("location: ../signup.php?error=passwordsdontmatch");
  exit();
}

// Verificamos si el nombre del usuario ya existe
if (uidExists($conn, $username, $email) !== false) {
  header("location: ../signup.php?error=usernametaken");
  exit();
}

//Contrasena debe de ser mas fuerte

createUser($conn, $name, $paterno, $materno, $email, $username, $pwd, $perfilU);


}


else {

  header("location: ../signup.php?error=sinconnexionabd");
  exit();
}
