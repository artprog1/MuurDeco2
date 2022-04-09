<?php
  // include_once 'headerA.php'

 ?>

<?php
require_once 'dbh.inc.php';

  if (isset($_GET['Del']))
  {

    $IDCliente = $_GET['Del'];
    $query = " DELETE FROM tblClientes WHERE idCliente = '".$IDCliente."'";
    $result = mysqli_query($conn, $query);

      if ($result) {
        header("location: ../ventas.php?msg=deleted");
      }
      else {
        echo "Se debe de desligar los proyectos asociados";
      }
  }

  else
  {
    header("location: ../ventas.php?msg=erroralborrar");
  }

 ?>
