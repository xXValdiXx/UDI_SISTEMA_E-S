<?php
//Mostrar errores PHP
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once('controllers/insert_usr_c.php');

switch($_POST['ruta']){

    /** Ruta para registrar una peticion de entrada o slaida */
    case 'peticionES':
        $obj = EmpleadosC::RegistrarAsistenciaEC();
        echo json_encode($obj);
        break;

    default:
        echo 'No existe la ruta especificada';
        break;
}

?>