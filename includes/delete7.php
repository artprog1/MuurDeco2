<?php
  // include_once 'headerA.php'

 ?>

<?php
require_once 'dbh.inc.php';

  if (isset($_GET['Del']))
  {

    $idProyecto = $_GET['Del'];
    $query = " DELETE FROM tblProyectos WHERE idProyecto = '".$idProyecto."'";
    $result = mysqli_query($conn, $query);

      if ($result) {
        header("location: ../ventas.php?msg=deleted");
      }
      else {
        echo "Se debe de desligar las columnas asociados";
      }
  }

  else
  {
    header("location: ../ventas.php?msg=erroralborrar");
  }

 ?>
