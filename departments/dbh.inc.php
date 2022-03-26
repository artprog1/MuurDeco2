<?php

$serverName = "localhost";
$dBUserName = "id17810557_muuradmin";
$dBPassword = "9\uwn+zOl~_YVNlM";
$dBName = "id17810557_bdmuurdecoshop";

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName );


if (!$conn) {
  // code...
  die("Conexion fallida: " . mysqli_connect_error());
}
