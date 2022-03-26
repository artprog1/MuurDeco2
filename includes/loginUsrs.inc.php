<?php



session_start();
	// print_r($_POST);
if (isset($_POST["submit"])) {


    if($_POST['captcha'] == $_SESSION['code']){
      echo "Correct captcha";
      header("location: ../login.php?error=correct");
    } else {
      header("location: ../login.php?error=wrongcaptcha");
      exit();
    }


  $email = $_POST["uid"];
  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];

  $tableInUse = "tblUsuarios";

require_once 'dbh.inc.php';
require_once 'altaUsrsFNS.inc.php';

//verificamos is no existen 3 intentos fallidos
blockedUser($conn, $username, $pwd);


if (emptyInputLogin($username, $pwd) !== false) {
  header("location: ../login.php?error=emptyinputs");
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
