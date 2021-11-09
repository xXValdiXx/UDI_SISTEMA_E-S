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
        if($obj[0] == "00000"){
            setcookie("msg", 1, time() + 5, "/");
        }else{
            setcookie("msg", 0, time() + 5, "/");
        }
        header('Location: ./index.php');
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

