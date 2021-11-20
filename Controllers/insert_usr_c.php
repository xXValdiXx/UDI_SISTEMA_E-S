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

}
?>