<?php
  // include_once 'headerA.php'

 ?>

<?php
require_once 'dbh.inc.php';

  if (isset($_GET['Del']))
  {

    $idProvedor = $_GET['Del'];
    $query = " DELETE FROM tblProvedores WHERE idProvedor = '".$idProvedor."'";
    $result = mysqli_query($conn, $query);

      if ($result) {
        header("location: ../registros.php?msg=deleted");
      }
      else {
        // echo "Favor de Acturalizar Insumos Ligados con este Provedor";
        header("location: ../registros.php?msg=parent");
      }
  }

  else
  {
    header("location: ../registros.php?msg=erroralborrar");
  }

 ?>
