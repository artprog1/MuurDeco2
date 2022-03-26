
<?php
// Timeout de la session
  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // La ultima session fue iniciada 30 mins
    session_unset();     // unset $_SESSION para el variable de runtime
    session_destroy();   // se destruye los variables guardados
}
$_SESSION['LAST_ACTIVITY'] = time(); // Actualizar el reuest

 ?>
