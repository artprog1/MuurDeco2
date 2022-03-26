<?php

if (isset($_POST["submit"])) {

  $proyecto = $_POST["proyecto"];
  $description = $_POST["description"];
  // PDF NO APLICA AHORITA
  $statusProyecto = $_POST["statusProyecto"];
  $departamentoAsg = $_POST["departamentoAsignado"];
  $statusfactura = $_POST["factura"]; //Se va anular
  $idCliente = $_POST["idCliente2"];

  // $perfilU  = $_POST["perfil"];
  // Ingresamos referencia la pagina
  $urlLink = "ventas.php";
  $tableInUse = "tblProyectos";

require_once 'dbh.inc.php';
require_once 'altaProyectsFNS.inc.php';



// Checamos si hay bloques en blanco
$statusProyecto = $_POST["statusProyecto"];
if (emptyInputSignup($proyecto, $description, $statusProyecto, $departamentoAsg, $statusfactura) !== false) {
  // header("location: ../$urlLink?error=emptyinput");
    // exit();
    echo "string" .$proyecto. $description. $statusProyecto.$departamentoAsg.$statusfactura;
}


// Verificamos si el nombre del usuario ya existe
// if (uidExists($conn, $username, $email, $tableInUse) !== false) {
  // header("location: ../$urlLink?error=usernametaken");
  // exit();
// }

//Contrasena debe de ser mas fuerte

createUser($conn, $proyecto, $description, $statusProyecto, $departamentoAsg, $statusfactura, $idCliente ,$tableInUse, $urlLink);


}


else {

  header("location: ../$urlLink?error=sinconnexionabd");
  exit();
}
