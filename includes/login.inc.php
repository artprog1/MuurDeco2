<?php

if (isset($_POST["submit"])) {

  $email = $_POST["uid"];
  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

//verificamos is no existen 3 intentos fallidos
blockedUser($conn, $username, $pwd);


if (emptyInputLogin($username, $pwd) !== false) {
  header("location: ../login.php?error=emptyinput");
  exit();
}

// if (invalidUid( $username) !== false) {
//   header("location: ../login.php?error=invaliduid");
//   exit();
// }


logInUser($conn, $username, $pwd);


}
else {
  header("location: ../login.php?error=invalido");
  exit();
}
