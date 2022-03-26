<?php





function emptyInputSignup($proyecto, $description, $statusProyecto, $departamentoAsg, $statusfactura) {
  $result;
  if (empty($proyecto) || empty($description) || empty($statusProyecto) || empty($departamentoAsg) || empty($statusfactura)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}




function uidExists($conn, $username, $email, $tableInUse) {
  $sql = "SELECT * FROM ".$tableInUse." WHERE usersUid = ? OR correoUsuario = ?;";

  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {

    echo $sql;
    exit();
  }

  mysqli_stmt_bind_param($stmt, "ss", $username, $email);
  mysqli_stmt_execute($stmt);
  $resultData = mysqli_stmt_get_result($stmt);
// si hay data, tenemos que tomar la info con este usuario
  if ($row = mysqli_fetch_assoc($resultData)) {
     return $row;
  }
  else {
    $result = false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}


function createUser($conn, $proyecto, $description, $statusProyecto, $departamentoAsg, $statusfactura, $idCliente ,$tableInUse, $headerUrlLink) {
  // OLD QUERY
  // $sql = INSERT INTO `tblProyectos` (`idProyecto`, `nombreProyecto`, `descripcion`, `pdf`, `estatusDelProyecto`, `departamentoAsignado`, `estatusDeFactura`)

  // TABLE REFERENCE
  //  INSERT INTO $tableInUse (`usersUid`, `correoUsuario`, `nombreUsuario`, `aPaternoUsuario`, `aMaternoUsuario`, `telefonoUsuario`, `idDepartamento2`, `contrasena`, incAttempt) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);

  $sql = "INSERT INTO ".$tableInUse." (nombreProyecto, descripcion, estatusDelProyecto, departamentoAsignado, estatusDeFactura, idCliente2) VALUES (?, ?, ?, ?, ?, ?);";

  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    // header("location: ../$headerUrlLink?error=stmtfailed");
    echo $sql;
    // exit();
  }
  // $intentos = 0;
  // $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
  mysqli_stmt_bind_param($stmt, "ssssss", $proyecto, $description, $statusProyecto, $departamentoAsg, $statusfactura, $idCliente );
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../$headerUrlLink?error=none");
  exit();
}
//
// //
// function emptyInputLogIn($username, $pwd) {
//   $result;
//   if (empty($username) || empty($pwd) ) {
//     $result = true;
//   }
//   else {
//     $result = false;
//   }
//   return $result;
// }
//

    // Se verifica si usuario tiene => 3 intentos
//
//
// function blockedUser($conn, $username, $pwd){
//   $udiExists = uidExists($conn, $username, $username);
//   //if no data it reurns false, otherwise returns row
//    $numOfAttepms = $udiExists["incAtp"];
//    if ($numOfAttepms >= 3) {
//      header("location: ../login.php?error=blockedOut");
//
//      exit();
//    }
// }

// function resetAttempts($conn, $username){
//   $udiExists = uidExists($conn, $username, $username);
//   // $numOfAttepms = $udiExists["incAtp"];
//   $sql = "UPDATE users set incAtp = 0 WHERE usersUid = ?;";
//   $stmt = mysqli_stmt_init($conn);
//   if (!mysqli_stmt_prepare($stmt, $sql)) {
//     header("location: ../login.php?error=resetatmptsfailed");
//     exit();
//   }
//
//   mysqli_stmt_bind_param($stmt, "s", $idUser);
//   mysqli_stmt_execute($stmt);
//   mysqli_stmt_close($stmt);
//   header("location: ../login.php?error=incorrectpwd");
//   exit();
// // }
// function resetAttempt($conn, $username){
// $query = "UPDATE ".$tableInUse." SET incAtp=0 WHERE usersUid = '".$username."'";
// $result = mysqli_query($conn, $query);
// }

//
//
// function logInUser($conn, $username, $pwd){
//   $udiExists = uidExists($conn, $username, $username);
//   if ($udiExists === false) {
//     // Al fallar contraseña, se incrementa valor de bd +1
//     header("location: ../login.php?error=wronglogin");
//     exit();
//   }
//
//    $pwdHashed = $udiExists["usersPwd"];
//    $checkPwd = password_verify($pwd, $pwdHashed );
//
//    if ($checkPwd === false) {
//
//      $sql = "UPDATE ".$tableInUse." set incAtp = incAtp+1 WHERE usersUid = ?;";
//      $stmt = mysqli_stmt_init($conn);
//      if (!mysqli_stmt_prepare($stmt, $sql)) {
//        header("location: ../login.php?error=stmtautoincrementfailed");
//        exit();
//      }
//
//      $idUser = $udiExists["usersUid"];
//      mysqli_stmt_bind_param($stmt, "s", $idUser);
//      mysqli_stmt_execute($stmt);
//      mysqli_stmt_close($stmt);
//      header("location: ../login.php?error=incorrectpwd");
//      exit();
//  }
//
//      if ($checkPwd === true) {
//     // Pending to reset attempts to 0
//      resetAttempt($conn, $username);
//      session_start();
//      $_SESSION["userid"] = $udiExists["usersId"];
//      $_SESSION["useruid"] = $udiExists["usersUid"];
//
//      header("location: ../index.php");
//      exit();
//   }
//
//
//   function endSession()
//   {
//     if (isset($_SESSION['userid']) && (time() - $_SESSION['userid'] > 18)) {
//         // last request was more than 30 minutes ago
//         session_unset();     // unset $_SESSION variable for the run-time
//         session_destroy();   // destroy session data in storage
//     }
//     $_SESSION['userid'] = time(); // update last activity time stamp
//     header("location: ../index.php");
//     exit();
//   }
//
// }
