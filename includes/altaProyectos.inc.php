<?php

if (isset($_POST["submit1"])) {

  $proyecto = $_POST["proyecto"];
  $description = $_POST["description"];
  // $description = $_POST["description"];
  // PDF NO APLICA AHORITA
  $statusProyecto = $_POST["statusProyecto"];
  $departamentoAsg = $_POST["departamentoAsignado"];
  $statusfactura = $_POST["factura"]; //Se va anular
  $idCliente = $_POST["idCliente2"];
  $comentarios = $_POST["comentarios"];

  // $perfilU  = $_POST["perfil"];
  // Ingresamos referencia la pagina
  $urlLink = "ventas.php";
  $tableInUse = "tblProyectos";

require_once 'dbh.inc.php';
require_once 'altaProyectsFNS.inc.php';



// Checamos si hay bloques en blanco
$statusProyecto = $_POST["statusProyecto"];


if (emptyInputSignup($proyecto, $description, $statusProyecto, $departamentoAsg, $statusfactura) !== false) {
  header("location: ../$urlLink?error=emptyinput");
  exit();

}


createUser($conn, $proyecto, $description, $statusProyecto, $departamentoAsg, $statusfactura, $idCliente, $comentarios, $tableInUse, $urlLink);


}


else {

  header("location: ../$urlLink?error=sinconnexionabd");
  exit();
}
