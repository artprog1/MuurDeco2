<?php

if (isset($_POST["submit"])) {

  $nombre = $_POST["nombre"];
  $paterno = $_POST["paterno"];
  $materno = $_POST["materno"];
  $direccionCalle = $_POST["direccionCalle"];
  $ciudad = $_POST["ciudad"];
  $estado = $_POST["estado"];
  $postal = $_POST["postal"];
  $telefono = $_POST["telefono"];

  // URL Generales
  $urlLink = "ventas.php";
  $tableInUse = "tblClientes";

require_once 'dbh.inc.php';
require_once 'altaClientesFNS.inc.php';


if (emptyInputSignup($nombre, $paterno, $materno, $direccionCalle, $ciudad, $estado, $postal, $telefono) !== false) {
  header("location: ../$urlLink?error=emptyinput");
    exit();
}


// Verificamos si el nombre del usuario ya existe
// if (uidExists($conn, $username, $email, $tableInUse) !== false) {
  // header("location: ../$urlLink?error=usernametaken");
  // exit();
// }

//Contrasena debe de ser mas fuerte

// echo "This query: ".$nombre." ". $paterno." ".$materno." ". $direccionCalle." ". $ciudad." ".$estado." ".$postal." ".$telefono;
   createUser($conn, $tableInUse, $urlLink, $nombre, $paterno, $materno, $direccionCalle, $ciudad, $estado, $postal, $telefono);


}


else {

  header("location: ../$urlLink?error=sinconnexionabd");
  exit();
}
