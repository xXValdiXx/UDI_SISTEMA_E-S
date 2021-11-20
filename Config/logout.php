<?php
/* Destruir la sesion */
session_start();
session_destroy();
/* Redirigir */
header('Location: ../Dash/views/loginDash.php');

?>