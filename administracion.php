<?php
  include_once 'header.php';
  require_once 'includes/dbh.inc.php';
  // Se destruye sesion

  $conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName );

    if (!isset($_SESSION["useruid"])) {
      header("location: login.php?error=noingresado");
      exit();
    }
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
         <li class="list-group-item" style="width: 100%"><a href="#">Registrar Cliente<span class="sr-only">(current)</span></a></li>
         <li class="list-group-item" style="width: 100%"><a href="#">Generar Proyecto</a></li>
         <li class="list-group-item" style="width: 100%"><a href="#">Generar Cotización</a></li>
         <li class="list-group-item" style="width: 100%"><button type="button" class="btn btn-light" style="width: 100%">Light</button></li>
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
             <h4>Diseño</h4>
             <!-- <span class="text-muted"></span> -->
           </div>
          </div>

<div class="center123" style="">

  <!-- <section class="BotonesIniciales">
    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Nuevo Registro</button>
  </section> -->

  <!-- Should be modal to hide -->
  <div id="id01" class="modal-dialog modal-dialog-centered modal-xl" style="">



    <form class="modal-content animate" id="signupform" action="includes/altaUsuarios.inc.php" method="post" style="padding: 12px 20px; margin: 8px 0;">

        <h2>Datos del Personal</h2>

          <div class="form-row">
              <div class="form-group col-md-4 col-sm-6">
                <label for="nombre">Primer Nombre</label>
                <input type="text"  class="form-control" name="nombre" placeholder=" Primer Nombre" id="primernombre" />
             </div>
             <div class="form-group col-md-4 col-sm-6">
               <label for="nombre">Apellido Paterno</label>
               <input type="text"  class="form-control" name="paterno" placeholder=" A. Paterno " id="primernombre" />
             </div>
             <div class="form-group col-md-4 col-sm-6">
               <label for="nombre">Apellido Materno</label>
               <input type="text"  class="form-control" name="materno" placeholder=" A. Materno " id="primernombre" />
             </div>
           </div>
           <div class="form-row">
             <div class="form-group col-sm-6 col-md-6">
               <label for="id">Correo Electronico</label>
               <input type="email"  class="form-control" name="email" placeholder="Correo@Electronico.com" id="none" />
             </div>
             <div class="form-group col-sm-6 col-md-6">
               <label for="uid">ID de Usuario</label>
               <input type="text"  class="form-control" name="uid" placeholder="Id_Usario" id="none" />
             </div>
             <div class="form-group col-md-6 col-sm-6">
               <label for="telefono">Telefono</label>
               <input type="text"  class="form-control" name="telefono" placeholder="3311225566" id="telefono" />
             </div>

             <!-- GENERAR EL QUERY DE LOS DEPTS -->
             <div class="form-group col-sm-6 col-md-6">
               <label for="departamento">Departamento</label>
               <select class="custom-select" name="departamento" placeholder="Departamento">
                 <!-- <option value="Pendiente" >Seleccione Area</option> -->
                 <!-- <option value="100">Finanzas</option> -->
                 <!-- <option value="101">Administracion</option> -->
                 <?php
                    $sqlm = mysqli_query($conn, "SELECT * FROM tblDepartamentos");
                    while ($row1 = $sqlm->fetch_assoc()){
                    // $value =   $row1['idDepartamento']
                    echo "<option value='".$row1['idDepartamento']."'>". $row1['nombre']."</option>";
                  }?>
             </select>
             </div>
           </div>
           <div class="form-row">
             <div class="form-group col-sm-6 col-md-6">
              <label for="pwd">Contraseña</label>
              <input type="password" class="form-control" name="pwd" placeholder="Contraseña..." id="password" />
              </div>



            <div class="form-group col-sm-6 col-md-6">
              <label for="pwdrepetido">Confirmar</label>
              <input type="password" class="form-control" name="pwdrepetido" placeholder="Confirmar Contraseña" id="password2" />
            </div>

            </div>



          <div class="alert">
            <?php
            if (isset($_GET["error"])) {
              ?>
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
              <?php
            }
            if (isset($_GET["error"])) {
              if ($_GET["error"] == "emptyinput") {
                  echo "<p class='font-weight-light'>Asegure de llenar todos los campos</p>";
              }
              else if ($_GET["error"] == "invaliduid") {
                  echo "<p>ID Usuario invalido, favor de llenar con requisitos</p>";
              }
              else if ($_GET["error"] == "invalidemail") {
                  echo "<p class='font-weight-light'>Correo ya existe, favor de ingresa otro</p>";
              }
              else if ($_GET["error"] == "passwordsdontmatch") {
                  echo "<p class='font-weight-light'>Contraseña no concuerda, asegurese de sincronizar la misma</p>";
              }

              else if ($_GET["error"] == "weakpwd") {
                  echo "<p class='font-weight-light'>Contraseña debil, favor de incluir <br>1 Mayuscula, 1 Minuscula, 1 Numero, 1 Caracter Especial, Longitud de 6 a 16 caracteres</li>";
              }
              else if ($_GET["error"] == "usernametaken") {
                  echo "<p class='font-weight-light'>ID de Usuario ya existe, favor de ingresa otro</p>";
              }
              else if ($_GET["error"] == "sinconnexionabd") {
                  echo "<p class='font-weight-light'>No hay connexion a la Base de Datos</p>";
              }

              else if ($_GET["error"] == "invalidNames") {
                  echo "<p class='font-weight-light'>Nombres debera contener solo valores alfabeticos</p>";
              }
              else if ($_GET["error"] == "idFormatomalo") {
                  echo "<p class='font-weight-light'>ID Seleccionado es Incorrecto. Seleccionar 4 digitos numericos</p>";
              }
              else if ($_GET["error"] == "wrongcaptcha") {
                  echo "<p class='font-weight-light'>El Captcha ingresado es incorrecto</p>";
              }
              // idFormatomalo
              else if ($_GET["error"] == "none") {
                  echo "<p class='font-weight-light'>Usuario se dio de alta satisfactoriamente</p>";
              }
            } ?>
          </div>


          <div class="">
            <button class="btn btn-primary" type="submit" name="submit">Registrar</button>
          </div>

         </div>

    </form>
  </div>


  <div class="modal-content animate center123">
        <h2>Personal de MuurDeco WorkShop</h2>
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
                 <?php } ?>
            </tbody>
           </table>
      </div>
      </div>

 <?php include_once 'footer.php';?>
