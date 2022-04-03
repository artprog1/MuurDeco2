<?php

if (isset($_POST["submit"])) {

  $articulo = $_POST["articulo"];
  $costo = $_POST["costo"];
  $tipoArticulo = $_POST["tipoArticulo"];
  $provedor = $_POST["provedor"];

  // $perfilU  = $_POST["perfil"];
  // Ingresamos referencia la pagina
  $urlLink = "inventario.php";
  $tableInUse = "tblInsumos";

require_once 'dbh.inc.php';
require_once 'altaProductosFUNCS.inc.php';


if (emptyInputSignup($articulo, $costo, $tipoArticulo,  $provedor) !== false) {
  header("location: ../$urlLink?error=emptyinput");
    // exit();
    // print_r($articulo." ". $costo." ". $tipoArticulo." ". $provedor);
}


// Verificamos si el nombre del usuario ya existe
// if (uidExists($conn, $username, $email, $tableInUse) !== false) {
  // header("location: ../$urlLink?error=usernametaken");
  // exit();
// }

//Contrasena debe de ser mas fuerte

createUser($conn, $articulo, $costo, $tipoArticulo,  $provedor, $tableInUse, $urlLink);


}


else {

  header("location: ../$urlLink?error=sinconnexionabd");
  exit();
}
