<?php
require_once ("./models/insert_user.php");


class EmpleadosC{

    static public function RegistrarAsistenciaEC(){
      
        if(isset($_POST["numEmpleado"])){
            $datosf = [ "numEmpleado" => $_POST["numEmpleado"] ];
            $respuesta = EmpleadosM::RegistrarAsistenciaEM($datosf);
            return $respuesta;
        }else{
            return "error";
        }
         
    }
    static public function InsertarUDashC(){
      
        if(isset($_POST["nombre"])){
            $datosUsuario["nombre"] = $_POST["nombre"];
            $datosUsuario["apellidoPaterno"] = $_POST["apellidoPaterno"];
            $datosUsuario["apellidoMaterno"] = $_POST["apellidoMaterno"];
            $datosUsuario["area"] = $_POST["area"];
            $datosUsuario["puesto"] = $_POST["puesto"];
            $datosUsuario["numEmpleado"] = $_POST["numEmpleado"];
            $datosUsuario ["correo"] = $_POST["correo"];
            $datosUsuario["password"] = $_POST["password"];
            $hash = password_hash($_POST["password"],PASSWORD_DEFAULT);
            $datosUsuario ["password"] = $hash;
            $datosUsuario["imagen"] = $_POST["imagen"];
            $datosUsuario["telefonoPersonal"] = $_POST["telefonoPersonal"];
            $datosUsuario["extensionIPN"] = $_POST["extensionIPN"];
            
            $respuesta = EmpleadosM::InsertarUDash($datosUsuario);
            return $respuesta;
        }else{
            return "error";
        }
         
    }

}
?>