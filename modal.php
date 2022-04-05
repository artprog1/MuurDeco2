<div class="modal" id="id01" style="">
  <div class="modal-dialog modal-dialog-centered modal-xl" style="">

    <form class="modal-content animate" id="signupform" action="includes/altaClientes.inc.php" method="post" style="padding: 12px 20px; margin: 8px 0;">
      <h1>Registro de Cliente</h1>
          <div class="form-row">
              <div class="form-group col-md-4 col-sm-6">
                <label for="nombre">Primer Nombre</label>
                <input type="text"  class="form-control" name="nombre" placeholder=" Primer Nombre" id="primernombre" />
             </div>
             <div class="form-group col-md-4 col-sm-6">
               <label for="paterno">Apellido Paterno</label>
               <input type="text"  class="form-control" name="paterno" placeholder=" A. Paterno " id="primernombre" />
             </div>
             <div class="form-group col-md-4 col-sm-6">
               <label for="materno">Apellido Materno</label>
               <input type="text"  class="form-control" name="materno" placeholder=" A. Materno " id="primernombre" />
             </div>
           </div>
           <div class="form-row">
             <div class="form-group col-sm-6 col-md-6">
               <label for="direccionCalle">Dirección de Calle</label>
               <input type="text"  class="form-control" name="direccionCalle" placeholder="123 Calle" id="none" />
             </div>
             <div class="form-group col-sm-6 col-md-6">
               <label for="ciudad">Ciudad</label>
               <input type="text"  class="form-control" name="ciudad" placeholder="Ej. Guadalajara" id="none" />
             </div>
             <div class="form-group col-md-6 col-sm-6">
               <label for="estado">Estado</label>
               <input type="text"  class="form-control" name="estado" placeholder="Ej. Jalisco" id="telefono" />
             </div>

             <!-- GENERAR EL QUERY DE LOS DEPTS -->
             <div class="form-group col-sm-6 col-md-6">
               <label for="postal">Codigo Postal</label>
               <input type="text"  class="form-control" name="postal" placeholder="45000" id="" />

             </div>
           </div>
           <div class="form-row">
             <div class="form-group col-sm-6 col-md-6">
              <label for="telefono">Teléfono</label>
              <input type="text" class="form-control" name="telefono" placeholder="(33) 1234 5678" id="" />
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
              else if ($_GET["error"] == "usernametaken") {
                  echo "<p class='font-weight-light'>ID de Usuario ya existe, favor de ingresa otro</p>";
              }
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









  <!-- OTRO MODAL -->

  <!-- <h1>MODAL</h1> -->

  <!-- Button trigger modal -->
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAltaDeProyecto">
    MODAL PARA ALTA DE PROYECTO
  </button> -->

  <div class="modal fades" id="modalAltaDeProyecto" style="">

    <div id="id01" class="modal-dialog modal-dialog-centered modal-xl" style="">
      <form class="modal-content animate" id="signupform" action="includes/altaProyectos.inc.php" method="post" style="padding: 12px 20px; margin: 8px 0;">
        <h1>Nuevo Proyecto<br></h1>
            <div class="form-row">
                <div class="form-group col-4">
                  <label for="proyecto">Titulo del Proyecto</label>
                  <input type="text"  class="form-control" name="proyecto" placeholder="Titulo del Proyecto" id="idProyecto" />
               </div>
               <div class="form-group col-lg-1 col-md-2">
                 <label for="pdf">Archivo PDF</label>
                 <!-- <input type="email"  class="form-control" name="pdf" placeholder="Correo@Electronico.com" id="none" /> -->
               </div>
               <div class="form-group col-4">
                 <label for="statusProyecto">Estatus del Proyecto</label>
                 <select  class="custom-select" name="statusProyecto">
                   <?php
                      $sqlm = mysqli_query($conn, "SELECT * FROM tblFlujo");
                      while ($row1 = $sqlm->fetch_assoc()){
                      // $value =   $row1['idDepartamento']
                      echo "<option value='".$row1['NombreFlujo']."'>". $row1['Secuencia'].". ".$row1['NombreFlujo']."</option>";
                    }?>
                 </select>
                 <!-- <input type="text"  class="form-control" name="statusProyecto" placeholder="Id_Usario" id="none" /> -->
               </div>
               <!-- <div class="form-group col-lg-3 col-sm-6">
                 <label for="telefono">Estatus del Proyecto</label>
                 <input type="text"  class="form-control" name="statusProyecto" placeholder="3311225566" id="telefono" />
               </div> -->

               <!-- GENERAR EL QUERY DE LOS DEPTS -->
               <div class="form-group col-3">
                 <label for="departamentoAsignado">Departamento</label>
                 <select class="custom-select" name="departamentoAsignado" placeholder="Departamento">
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
               <div class="form-group col-md-12 col-sm-12">
                 <label for="description">Descripción</label>
                 <textarea class="form-control" id="description" name="description" placeholder="Descripción General del Proyecto" rows="2"> </textarea>
               </div>
               <!-- <div class="form-group col-md-4 col-sm-6">
                 <label for="nombre">Apellido Materno</label>
                 <input type="text"  class="form-control" name="materno" placeholder=" A. Materno " id="primernombre" />
               </div> -->
             </div>
             <div class="form-row">
               <div class="form-group col-3">
                 <label for="factura">Estatus de la Factura</label>
                 <select  class="custom-select" name="factura">
                   <option value="Pendiente" >Seleccione Area</option>
                   <option value="Completado">Completada</option>
                   <option value="No Requerido">No Requerido</option>
                 </select>
                 <!-- <input type="text"  class="form-control" name="statusProyecto" placeholder="Id_Usario" id="none" /> -->
               </div>

               <div class="form-group col-3">
                 <label for="idCliente2">Cliente Asignado</label>
                 <select  class="custom-select" name="idCliente2">
                   <?php
                      $sqlClientes = mysqli_query($conn, "SELECT * FROM tblClientes");
                      while ($row5 = $sqlClientes->fetch_assoc()){
                      // $value =   $row1['idDepartamento']
                      echo "<option value='".$row5['idCliente']."'>". $row5['nombreCliente']." ". $row5['aPaternoCliente']."</option>";
                    }?>
                 </select>
                 <!-- <input type="text"  class="form-control" name="statusProyecto" placeholder="Id_Usario" id="none" /> -->
               </div>
               <div class="form-group col-6">
                 <label for="comentarios">Comentario del Equipo</label>
                 <textarea class="form-control" id="description" name="comentarios" placeholder="Comentario acerca del proyecto" rows="2"> </textarea>
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



<!-- MODAL OARA administracion.php -->
    <div class="modal" id="id02" style="">
      <div id="id02" class="modal-dialog modal-dialog-centered modal-xl" style="">



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
                  </form>
             </div>


      </div>





<!-- MODAL PARA REGISTROS -->
<div class="modal" id="id03" style="">
  <div id="id03" class="modal-dialog modal-dialog-centered modal-xl" style="">

    <form class="modal-content animate" id="signupform" action="includes/altaProveedores.inc.php" method="post" style="padding: 12px 20px; margin: 8px 0;">
      <h1>Nuevo Proveedor</h1>
          <div class="form-row">
              <div class="form-group col-md-4 col-sm-6">
                <label for="empresa">Nombre de Empresa</label>
                <input type="text"  class="form-control" name="empresa" placeholder="Pintura Jalisco SA. de CV."/>
             </div>
             <div class="form-group col-md-4 col-sm-6">
               <label for="telefono">Teléfono</label>
               <input type="text"  class="form-control" name="telefono" placeholder="(33) 1234 4556 " id="primernombre" />
             </div>
             <div class="form-group col-sm-4 col-md-4">
               <label for="insumo">Tipo de Insumo</label>
               <select class="custom-select" name="insumo" placeholder="Departamento">
                 <!-- <option value="Pendiente" >Seleccione Area</option> -->
                 <!-- <option value="100">Finanzas</option> -->
                 <!-- <option value="101">Administracion</option> -->
                 <?php
                    $sqlm = mysqli_query($conn, "SELECT * FROM tblTipoDeProvedor");
                    while ($row1 = $sqlm->fetch_assoc()){
                    // $value =   $row1['idDepartamento']
                    echo "<option value='".$row1['Insumo']."'>". $row1['Insumo']."</option>";
                  }?>
             </select>
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
              else if ($_GET["error"] == "usernametaken") {
                  echo "<p class='font-weight-light'>ID de Usuario ya existe, favor de ingresa otro</p>";
              }
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
  </div>



  <!-- MODAL PARA Inventario -->
  <div class="modal" id="id04" style="">
    <div id="id04" class="modal-dialog modal-dialog-centered modal-xl" style="">

      <form class="modal-content animate" id="signupform" action="includes/altaProductos.inc.php" method="post" style="padding: 12px 20px; margin: 8px 0;">
        <h1>Ingresar Producto</h1>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="articulo">Articulo</label>
                  <input type="text"  class="form-control" name="articulo" placeholder="Pintura Jalisco SA. de CV."/>
               </div>


                   <div class="form-group col-md-6">
                     <label for="costo">Costo</label>
                     <!-- <input type="text"  class="form-control" name="costo" placeholder="Pintura Jalisco SA. de CV."/> -->
                     <input class="form-control" name="costo" type="number" placeholder="$XX.XX" min="1" step="any" />

                  </div>

                  </div>
          <div class="form-row">
               <div class="form-group col-md-6">
                 <label for="tipoArticulo">Tipo de Articulo</label>
                 <input type="text"  class="form-control" name="tipoArticulo" placeholder="Madera, Vidreo, etc. " id="primernombre" />
               </div>
               <div class="form-group col-md-6">
                 <label for="provedor">Provedor</label>
                 <select class="custom-select" name="provedor">
                   <!-- <option value="Pendiente" >Seleccione Area</option> -->
                   <!-- <option value="100">Finanzas</option> -->
                   <!-- <option value="101">Administracion</option> -->
                   <?php
                      $sqlm = mysqli_query($conn, "SELECT * FROM tblProvedores");
                      while ($row1 = $sqlm->fetch_assoc()){
                      // $value =   $row1['idDepartamento']
                      echo "<option value='".$row1['idProvedor']."'>". $row1['nombreProvedor']."</option>";
                    }?>
               </select>
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
                else if ($_GET["error"] == "usernametaken") {
                    echo "<p class='font-weight-light'>ID de Usuario ya existe, favor de ingresa otro</p>";
                }
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
