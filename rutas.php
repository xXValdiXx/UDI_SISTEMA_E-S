<?php
//Mostrar errores PHP
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once('controllers/insert_usr_c.php');
include_once('controllers/select_user_c.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
switch ($_POST['ruta']) {

        /** Ruta para registrar una peticion de entrada o salida */
    case 'peticionES':
        $obj = EmpleadosC::RegistrarAsistenciaEC();
        if ($obj[0] == "00000") {
            setcookie("msg", 1, time() + 5, "/");
        } else {
            setcookie("msg", 0, time() + 5, "/");
        }
        header('Location: ./index.php');
        break;

        /** Ruta para obtener todos los usuarios */
    case 'obtenerUsuarios':
        $obj = CEmpleadosC::VisualizarEmpleadosC();
        break;

    case 'login':
        $obj = CEmpleadosC::loginUserC();

        if (isset($_SESSION['Sesion_activa'])) {
            header('Location: ./Dash/homeDash.php');
        } else {
            // URL Local
            header('Location: http://localhost/UDI_SISTEMA_E-S/Dash/views/loginDash.php');
        }
        break;


    default:
        echo 'No existe la ruta especificada';
        break;
}
