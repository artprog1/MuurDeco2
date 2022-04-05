<?php
  include_once 'header.php';
require_once 'includes/dbh.inc.php';
  // Se destruye sesion

  $conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName );

    if (!isset($_SESSION["useruid"])) {
      header("location: login.php?error=noingresado");
      exit();
    }

    //verificamos si es usuario permitido
    // 105 Administracion, 102- Gerencia, 104-root, 105-admin

    // Sacamos a los usuarios no admitidos
    if (
        $_SESSION["departamento"] == 100 || $_SESSION["departamento"] == 103 || $_SESSION["departamento"] == 106 || $_SESSION["departamento"] == 108 || $_SESSION["departamento"] == 109  )
      {
        header("location: index.php?error=usuarioNoAdmitido");
        exit();
      }


    require_once 'modal.php';
    // $sql = "SELECT * FROM tblUsuarios;";


    $sql = "SELECT tblUsuarios.*, tblDepartamentos.nombre
    FROM tblUsuarios
    INNER JOIN tblDepartamentos ON tblUsuarios.idDepartamento2=tblDepartamentos.idDepartamento;";
    $result = mysqli_query($conn, $sql);
 ?>

 <br><br>
 <div class="container-fluid">
   <div class="row">
     <div class="col-sm-3 col-md-2 col-lg-2 sidebar ">
       <ul class="nav nav-sidebar list-group-flush">
         <li class="list-group-item" style="width: 100%">
           <button type="button" class="btn btn-primary" style="width: 100%; height: 45px" data-toggle="modal" data-target="#id02">
             Registrar Usuario
           </button>
         </li>


       </ul>

       </div>
       <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

         <div>
           <h1 class="page-header">Administración del Personal</h1>
           <p>Area con la finalidad de la administración de todo el personal</p>
         </div>
         <div class="row placeholders">
           <div class="col-sm-8 col-md-6 col-lg-3 placeholder">
             <a href="#">
             <img src="img/admin2.jpg" width="1100" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
             </a>

             <!-- <span class="text-muted"></span> -->
           </div>
          </div>

<h2 class="sub-header"><br>Personal de MuurDeco</h2>




  <div class="modal-content animate" style="width: 93%">

           <table class="table table-striped table-hover table-bordered table-responsive-lg table-responsive-sm table-responsive-md">
             <thead>
               <tr>
                 <th scope="col">ID </th>
                 <th scope="col">Nombre</th>
                 <th scope="col">Correo</th>
                 <th scope="col">Departamento</th>
                 <!-- <th scope="col">Perfil</th> -->
                 <th scope="col">Modificar</th>
               </tr>
           </thead>
           <tbody>
               <?php


                   while ($row=mysqli_fetch_assoc($result) ) {
                     // $otherRow = mysqli_fetch_assoc($resultDepts);
                     $UserID = $row['idUsuario'];
                     $UserName = $row['nombreUsuario']. " ". $row['aPaternoUsuario']. " ".$row['aMaternoUsuario'];
                     $Email = $row['correoUsuario'];
                     $Departamento =  $row['nombre'];
                     // $UserPerfil = $row['correoUsuario'];
                 ?>
                 <tr>
                   <th scope="row"><?php echo $UserID?></th>
                   <td><?php echo $UserName?></td>
                   <td><?php echo $Email?></td>
                   <td><?php echo $Departamento?></td>
                   <!-- <td><?php echo $UserPerfil?></td> -->
                   <td> <a href="includes/edit.php?GetID=<?php echo $UserID?>">Editar</a> </td>
                 </tr>
                 <?php }
                 ?>
            </tbody>
           </table>
      </div>
      </div>
      </div>

 <?php include_once 'footer.php';?>
