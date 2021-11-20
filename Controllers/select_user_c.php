<?php

require_once ("./models/select_user.php");

class CEmpleadosC{

    static public function VisualizarEmpleadosC(){
        $respuesta = CEmpleadosM::VisualizarEmpleadosM();
        echo json_encode($respuesta);      
        
    }

    static public function loginUserC(){
        if(isset($_POST["numEmpleado"])){
            $datosf["numEmpleado"] = $_POST["numEmpleado"];
            $datosf["password"] = $_POST["password"];
           
            $respuesta = CEmpleadosM::loginUserM($datosf);
            return $respuesta;
        }else{
            return "error";
        }
    }


}
?>