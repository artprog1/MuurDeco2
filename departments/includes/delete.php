<?php
  include_once 'headerA.php'

 ?>

<?php
require_once 'dbh.inc.php';

  if (isset($_GET['Del'])) {


    $UserID = $_GET['Del'];
    $query = " DELETE FROM users WHERE usersId = '".$UserID."'";
    $result = mysqli_query($conn, $query);

    if ($result) {
      header("location: ../signup.php?msg=deleted");
    }
    else {
      echo "Checa la solicitud";
    }
  }

  else {
    header("location: ../signup.php?msg=erroralborrar");
  }

 ?>
