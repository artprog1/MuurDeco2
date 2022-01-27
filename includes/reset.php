<?php
require_once 'dbh.inc.php';

  if (isset($_GET['Res'])) {
    $UserID = $_GET['Res'];
    $query = "UPDATE users SET incAtp=0 WHERE usersId = '".$UserID."'";
    $result = mysqli_query($conn, $query);


      if ($result) {
        header("location: ../signup.php?msg=resetSuccess");
      }
      else {
        echo "Checa la solicitud";
      }
    }
  
?>
