<?php

if (isset($_POST["submit"])) {

  $empresa = $_POST["empresa"];
  $telefono = $_POST["telefono"];
  $insumo = $_POST["insumo"];

  // $perfilU  = $_POST["perfil"];
  // Ingresamos referencia la pagina
  $urlLink = "registros.php";
  $tableInUse = "tblProvedores";

require_once 'dbh.inc.php';
require_once 'altaProvedoresFUNCS.inc.php';


if (emptyInputSignup($empresa, $telefono, $insumo) !== false) {
  // header("location: ../$urlLink?error=emptyinput");
    // exit();
    print_r($empresa." ". $telefono." ". $insumo);
}


// Verificamos si el nombre del usuario ya existe
// if (uidExists($conn, $username, $email, $tableInUse) !== false) {
  // header("location: ../$urlLink?error=usernametaken");
  // exit();
// }

//Contrasena debe de ser mas fuerte

createUser($conn, $empresa, $telefono, $insumo, $tableInUse, $urlLink);


}


else {

  header("location: ../$urlLink?error=sinconnexionabd");
  exit();
}
