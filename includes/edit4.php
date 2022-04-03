<?php
require_once 'dbh.inc.php';
include_once '../header.php';

    $idProyecto = $_GET['GetID'];

    $query = "SELECT * FROM tblProyectos WHERE idProyecto ='".$idProyecto."'";
    $result = mysqli_query($conn, $query);



    while ($row=mysqli_fetch_assoc($result)) {

      $nombreProyecto = $row['nombreProyecto'];
      $descripcion = $row['descripcion'];
      $pdf = $row['pdf'];
      $estatusDelProyecto = $row['estatusDelProyecto'];
      $departamentoAsignado = $row['departamentoAsignado'];
      $idCliente2 = $row['idCliente2'];
      $Comentarios = $row['Comentarios'];

    }

    $query2 = "SELECT * FROM tblDepartamentos WHERE idDepartamento ='".$departamentoAsignado."'";
    $result2 = mysqli_query($conn, $query2);
    while ($row3=mysqli_fetch_assoc($result2)) {
      $depaOriginal = $row3['nombre'];
    }




    // $row3 = $result2->fetch_assoc()
?>



            <div class="modalss" id="id40" style="">
              <div id="id40" class="modal-dialog modal-dialog-centered modal-xl" style="">

                <form class="modal-content animate" id="signupform" action="updateProyectoDeDireccion.php?ID=<?php echo $idProyecto; ?>" method="post" style="padding: 12px 20px; margin: 8px 0;">
                  <!-- <h1>Actualizar Estatus del Proyecto</h1> -->


                  <div class="form-row">

                      <div class="form-group col-12">
                        <!-- <label for="proyecto">Titulo del Proyecto</label> -->
                        <h1><?php echo $nombreProyecto; ?></h1>
                        <h2><?php echo $descripcion; ?></h3>
                      </div>

                  </div>

                  <div class="row">


                     <div class="form-group col-md-3">
                       <label for="statusProyecto">Estatus del Proyecto</label>
                       <select  class="custom-select" name="statusProyecto">
                         <option value="<?php echo $estatusDelProyecto?>"><?php echo $estatusDelProyecto; ?></option>
                         <?php
                            $sqlm = mysqli_query($conn, "SELECT * FROM tblFlujo");
                            while ($row1 = $sqlm->fetch_assoc()){
                            // $value =   $row1['idDepartamento']
                            echo "<option value='".$row1['NombreFlujo']."'>". $row1['Secuencia'].". ".$row1['NombreFlujo']."</option>";
                          }?>
                       </select>
                     </div>

                     <div class="form-group col-md-3">
                       <label for="departamentoAsignado">Departamento</label>
                       <select class="custom-select" name="departamentoAsignado" placeholder="Departamento">
                         <option value="<?php echo $departamentoAsignado?>"><?php echo $depaOriginal; ?></option>
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
                       <div class="form-group col-12">
                         <label for="comentarios">Comentarios del Equipo</label>
                         <textarea class="form-control" id="description" name="comentarios" placeholder="Comentario acerca del proyecto" rows="2"> <?php echo $Comentarios ?> </textarea>
                       </div>
                     </div>

                     <div class="col-2">
                       <button class="btn btn-primary" style="width: 100%" type="submit" name="update">Actualizar</button>
                     </div>


                    </div>
                </form>
              </div>


            <script>
              function clicked(e)
                {
                  if(!confirm('¿Seguro deseas borrar de manera permanente?'))
                    {
                      e.preventDefault();
                    }
                }
            </script>
