<?php
require_once 'dbh.inc.php';
// include_once 'headerA.php';

    $UserID = $_GET['GetID'];

    $query = "SELECT * FROM users WHERE usersId='".$UserID."'";
    $result = mysqli_query($conn, $query);

    while ($row=mysqli_fetch_assoc($result)) {

      $UserID = $row['usersId'];
      $UserName = $row['usersPrimerNombre'];
      $UserMaterno = $row['usersApellidoMaterno'];
      $UserPaterno = $row['usersApellidoPaterno'];
      $UserEmail = $row['usersEmail'];
      $UserUID = $row['usersUid'];
      $UserPerfil = $row['perfil'];


    }
?>


<div class="container">
  <div class="row">
    <div class="col-lg-6 m-auto">
      <div class="card mt-5">
        <div class="card-title">
          <h3 class="bg-success text-white text-center py-3">Actualizar Registro</h3>
        </div>
        <div class="card-body">

          <form action="update.php?ID=<?php echo $UserID; ?>" method="post">
            <input type="text" class="form-control mb-2" placeholder=" Nombre " name="name" value="<?php echo $UserName; ?>">
            <input type="text" class="form-control mb-2" placeholder=" Paterno " name="materno" value="<?php echo $UserMaterno; ?>">
            <input type="text" class="form-control mb-2" placeholder=" Materno " name="paterno" value="<?php echo $UserPaterno; ?>">
            <input type="email" class="form-control mb-2" placeholder=" Correo " name="correo" value="<?php echo $UserEmail; ?>">
            <input type="text" class="form-control mb-2" placeholder=" ID Usuario " name="uid" value="<?php echo $UserUID; ?>">
            <!-- <input type="text" class="form-control mb-2" placeholder=" Perfil " name="perfil" value="
            <?php
            // echo $UserPerfil;
            ?>
            "> -->
            <select name="perfil" placeholder="Area">
              <option value="<?php echo $UserPerfil; ?>" ><?php echo $UserPerfil; ?></option>
              <option value="Ventas">Ventas</option>
              <option value="Diseño">Diseño</option>
              <option value="Producción">Producción</option>
              <option value="Dirección">Dirección</option>
              <option value="Administración">Administración</option>
            </select>

            <button class="btn btn-primary" name="update">Actualizar</button>

          </form>
        </div>
      </div>
    </div>

  </div>

</div>
