<?php

$serverName = "localhost";
// $dBUserName = "id17810557_muuradmin";
// $dBPassword = "9\uwn+zOl~_YVNlM";
// $dBName = "id17810557_bdmuurdecoshop";
// //
$dBUserName = "u971799115_usuariouni";
$dBPassword = "9\uwn+zOl~_YVNlM";
$dBName = "u971799115_dbmuurdeco";

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName );


if (!$conn) {
  // code...
  die("Conexion fallida: " . mysqli_connect_error());
}
