
<?php
  // include_once '/MuurDecoShop2/header.php'

  // include_once '../header.php';
  include($_SERVER['MuurDecoShop2'].'/header.php');
  // include($_SERVER['MuurDecoShop2'].'../includes/dbh.inc.php');
  // include('../includes/dbh.inc.php');
  // require_once '../includes/dbh.inc.php';


  $serverName = "localhost";
  $dBUserName = "id17810557_muuradmin";
  $dBPassword = "9\uwn+zOl~_YVNlM";
  $dBName = "id17810557_bdmuurdecoshop";

  $conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName );


    // if (!isset($_SESSION["useruid"])) {
    //   header("location: ../login.php?error=noingresado");
    //   exit();
    // }

    $sql = "SELECT * FROM users;";
    $result = mysqli_query($conn, $sql);



 ?>

<h1>Direccion</h1>
<div class="container2">
    <h2>Personal Registrado</h2>
  <div class="row">
    <div class="col-l m-auto">
      <div class="table table-bordered">
       <table class="styled-table">
         <td>
           <tr>
             <td>IDs </td>
             <td>Nombre</td>
             <td>A. Paterno</td>
             <td>A. Materno</td>
             <td>Correo</td>
             <td>ID Usuario</td>
             <td>Perfil</td>
             <td>Modificar</td>
             <td>Eliminar</td>
             <td>Resetear</td>
           </tr>

           <?php
               while ($row=mysqli_fetch_assoc($result)) {
                 $UserID = $row['usersId'];
                 $UserName = $row['usersPrimerNombre'];
                 $UserMaterno = $row['usersApellidoMaterno'];
                 $UserPaterno = $row['usersApellidoPaterno'];
                 $UserEmail = $row['usersEmail'];
                 $UserUID = $row['usersUid'];
                 $UserPerfil = $row['perfil'];
             ?>
             <tr>
               <td><?php echo $UserID ?></td>
               <td><?php echo $UserName ?></td>
               <td><?php echo $UserMaterno ?></td>
               <td><?php echo $UserPaterno ?></td>
               <td><?php echo $UserEmail ?></td>
               <td><?php echo $UserUID ?></td>
               <td><?php echo $UserPerfil ?></td>
               <td> <a href="../includes/edit.php?GetID=<?php echo $UserID?>">Editar</a> </td>

               <td> <a href="../includes/delete.php?Del=<?php echo $UserID?>" onclick="return confirm('Are you sure?')">Borrar</a> </td>
               <td> <a href="../includes/reset.php?Res=<?php echo $UserID?>">Reset</a> </td>
             </tr>
             <?php
             }
              ?>
         </td>
       </table>
      </div>
    </div>

  </div>

</div>
