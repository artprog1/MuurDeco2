<?php





function emptyInputSignup($name, $paterno, $materno, $email, $username, $telefono, $pwd, $pwdRepeat) {
  $result;
  if (empty($name) || empty($paterno) || empty($materno) || empty($email) || empty($username) || empty($telefono) || empty($pwd) || empty($pwdRepeat) ) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}


function invalidName($name, $paterno, $materno) {
  $result;
  if (!preg_match("/^[a-zA-Z]*$/", $name ) || !preg_match("/^[a-zA-Z]*$/", $paterno ) || !preg_match("/^[a-zA-Z]*$/", $materno ) ) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}
//
// function invalidUid($username) {
//   $result;
//   if (!preg_match("/^[a-zA-Z0-9]*$/", $username )) {
//     $result = true;
//   }
//   else {
//     $result = false;
//   }
//   return $result;
// }


function strongPwd($pwd) {
  $result;
  if (!preg_match("/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $pwd )) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

// No used at all
// function invalidEmail($email) {
//   $result;
//   if (filter_var ($email, FILTER_VALIDATE_EMAIL )) {
//     $result = true ;
//   }
//   else {
//     $result = false;
//   }
//   return $result;
// }


function pwdMatch($pwd, $pwdRepeat) {
  $result;
  if ($pwd !== $pwdRepeat) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}


function uidExists($conn, $username, $email) {
  $tableInUse = "tblUsuarios";
  $sql = "SELECT * FROM ".$tableInUse." WHERE usersUid = ? OR correoUsuario = ?;";

  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    // header("location: ../signup.php?error=stmtfailed");
    // echo "string";
    // echo  $stmt;
    print_r($stmt);
      echo "<br><br>STMT FAILED<br><br>";
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


function createUser($conn, $name, $paterno, $materno, $email, $username, $telefono, $dept, $pwd, $tableInUse, $headerUrlLink) {
  // OLD QUERY
  // $sql = "INSERT INTO $tableInUse (usersPrimerNombre, usersApellidoMaterno, usersApellidoPaterno, usersEmail, usersUid, usersPwd, perfil, incAtp) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
  // TABLE REFERENCE
  //  INSERT INTO $tableInUse (`usersUid`, `correoUsuario`, `nombreUsuario`, `aPaternoUsuario`, `aMaternoUsuario`, `telefonoUsuario`, `idDepartamento2`, `contrasena`, incAttempt) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);

  $sql = "INSERT INTO ".$tableInUse." (usersUid, correoUsuario, nombreUsuario, aPaternoUsuario, aMaternoUsuario, telefonoUsuario, idDepartamento2, contrasena, incAttempt) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";

  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    // header("location: ../$headerUrlLink?error=stmtfailed");
    echo $sql;
    // exit();
  }
  $intentos = 0;
  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
  mysqli_stmt_bind_param($stmt, "sssssssss", $username, $email, $name, $paterno, $materno, $telefono, $dept, $hashedPwd, $intentos);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../$headerUrlLink?error=none");
  exit();
}

//
function emptyInputLogIn($username, $pwd) {
  $result;
  if (empty($username) || empty($pwd) ) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}


    // Se verifica si usuario tiene => 3 intentos


function blockedUser($conn, $username, $pwd){
  $udiExists = uidExists($conn, $username, $username);
  //if no data it reurns false, otherwise returns row
   $numOfAttepms = $udiExists["incAttempt"];
   if ($numOfAttepms >= 3) {
     header("location: ../login.php?error=blockedOut");

     exit();
   }
}

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
// }
function resetAttempt($conn, $username){
$query = "UPDATE tblUsuarios SET incAttempt=0 WHERE usersUid = '".$username."'";
$result = mysqli_query($conn, $query);
}


//
function logInUser($conn, $username, $pwd){
  $udiExists = uidExists($conn, $username, $username);
  if ($udiExists === false) {
    // Al fallar contraseña, se incrementa valor de bd +1
    header("location: ../login.php?error=wronglogin");
    exit();
  }

   $pwdHashed = $udiExists["contrasena"];
   $checkPwd = password_verify($pwd, $pwdHashed );

   if ($checkPwd === false) {

     $sql = "UPDATE tblUsuarios set incAttempt = incAttempt+1 WHERE idUsuario = ?;";
     $stmt = mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt, $sql)) {
       header("location: ../login.php?error=stmtautoincrementfailed");
       exit();
     }

     $idUser = $udiExists["idUsuario"];
     mysqli_stmt_bind_param($stmt, "s", $idUser);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);
     header("location: ../login.php?error=incorrectpwd");
     exit();
 }

     if ($checkPwd === true) {
    // Pending to reset attempts to 0
     resetAttempt($conn, $username);
     session_start();
     $_SESSION["userid"] = $udiExists["idUsuario"];
     $_SESSION["useruid"] = $udiExists["usersUid"];
     // idDepartamento2
     $_SESSION["departamento"] = $udiExists["idDepartamento2"];
     $_SESSION["nombreUsuario"] = $udiExists["nombreUsuario"]. " ".$udiExists["aPaternoUsuario"]." ".$udiExists["aMaternoUsuario"];

     header("location: ../index.php");
     exit();
  }


  function endSession()
  {
    if (isset($_SESSION['userid']) && (time() - $_SESSION['userid'] > 18)) {
        // last request was more than 30 minutes ago
        session_unset();     // unset $_SESSION variable for the run-time
        session_destroy();   // destroy session data in storage
    }
    $_SESSION['userid'] = time(); // update last activity time stamp
    header("location: ../index.php");
    exit();
  }

}
