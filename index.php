<?php
  include_once 'header.php'
 ?>

 <?php

 if (!isset($_SESSION["useruid"])) {
   header("location: login.php?error=noingresado");
   exit();
 }
  ?>

      <section class="index-intro">

        <p>Muur Deco's Workshop</p>
        <p>Diseñado para brindar la eficacia de los proyectos</p>
      </section>

      <section class="index-catagories">
        <h2>Departamentos</h2>
        <div class="index-categories-list">
          <div>
            <h3>Administración</h3>
          </div>
          <div>
            <h3>Ventas</h3>
          </div>
          <div>
            <h3>Diseño</h3>
          </div>
          <div>
            <h3>Producción</h3>
          </div>
          <div>
            <h3>Dirección General</h3>
          </div>

        </div>
      </section>

<?php
  include_once 'footer.php'
 ?>
