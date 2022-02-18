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
        function  verIP()
        {
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $IP = $_SERVER['HTTP_CLIENT_IP'];
            } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $IP = $_SERVER['REMOTE_ADDR'];
            }
            return $IP;
        }
        
        $ip_addr2 =  "192.168.100.25.";

        
        
        $obj = EmpleadosC::RegistrarAsistenciaEC();
        if ($obj[0] == "00000" && ip2long($IP.verIP()) == ip2long($ip_addr2)) {
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
        
        /** Ruta para Redirijir al DASHboard*/
    case 'login':
        $obj = CEmpleadosC::loginUserC();

        if (isset($_SESSION['Sesion_activa'])) {
            header('Location: ./Dash/homeDash.php');
        } else {
            // URL Local
            header('Location: ./Dash/views/loginDash.php');
        }
        break;
    
             /** Ruta para obtener todos los usuarios  */
    case 'obtenerUsuariosD':
        $obj = CEmpleadosC::VisualizarEmpleadosDC();
        break;
    
        /** Ruta para agregar usuarios  */
    case 'agregarUs':
        $obj = EmpleadosC::InsertarUDashC();
        header('Location: ./Dash/UserDash.php');
        break;

        /** COUNT  */
    case 'Countus':
        $obj = CEmpleadosC::cantidad_usuarioC();
        break;

    case 'Counth':
        $obj = CEmpleadosC::cantidad_horasC();
    
        break;
    
        case 'Counths':
            $obj = CEmpleadosC::cantidad_horassC();
        
            break;
    default:
        echo 'No existe la ruta especificada';
        break;
}
