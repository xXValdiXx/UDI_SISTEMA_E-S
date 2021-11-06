<?php
//Mostrar errores PHP
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once('controllers/insert_usr_c.php');
include_once('controllers/select_user_c.php');

switch($_POST['ruta']){

    /** Ruta para registrar una peticion de entrada o salida */
    case 'peticionES':
        $obj = EmpleadosC::RegistrarAsistenciaEC();
        echo json_encode($obj);
        break;

    /** Ruta para obtener todos los usuarios */
    case 'obtenerUsuarios':
        $obj = CEmpleadosC::VisualizarEmpleadosC();        
        break;

    default:
        echo 'No existe la ruta especificada';
        break;
}

?>

