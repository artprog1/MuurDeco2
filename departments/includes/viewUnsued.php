   <?php
  include_once 'headerA.php';
  require_once 'dbh.inc.php';

       // $sql = "SELECT * FROM records;";
       $sql = "SELECT * FROM users;";
       $result = mysqli_query($conn, $sql);


  ?>



   <head>
     <title>View Records</title>
   </head>

   <body class="bg-dark">

           <h2>Tabla de los Usuarios</h2>
           <div class="container">
             <div class="row">
               <div class="col-l m-auto">
                 <div class="table table-bordered">
                  <table>
                    <td>
                      <tr>
                        <td>ID</td>
                        <td>Nombre</td>
                        <td>A. Paterno</td>
                        <td>A. Materno</td>
                        <td>Correo</td>
                        <td>ID Usuario</td>
                        <td>Perfil</td>
                        <td>Edicion</td>
                        <td>Borrar</td>
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
                          <td> <a href="edit.php?GetID=<?php echo $UserID?>">Editar</a> </td>
                          <td> <a href="delete.php?Del=<?php echo $UserID?>">Borrar</a> </td>
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


       </section>


       </body>

 <?php
//   include_once '../footer.php'
  ?>
