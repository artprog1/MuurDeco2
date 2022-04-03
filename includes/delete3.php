<?php
  // include_once 'headerA.php'

 ?>

<?php
require_once 'dbh.inc.php';

  if (isset($_GET['Del']))
  {

    $IDInsumo = $_GET['Del'];
    $query = " DELETE FROM tblInsumos WHERE idInsumos = '".$IDInsumo."'";
    $result = mysqli_query($conn, $query);

      if ($result) {
        header("location: ../inventario.php?msg=deleted");
      }
      else {
        // echo "Favor de Acturalizar Insumos Ligados con este Provedor";
        header("location: ../inventario.php?msg=parent");
      }
  }

  else
  {
    header("location: ../inventario.php?msg=erroralborrar");
  }

 ?>
