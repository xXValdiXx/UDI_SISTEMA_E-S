<?php

require_once ("./models/select_user.php");

class CEmpleadosC{

    static public function VisualizarEmpleadosC(){
        $respuesta = CEmpleadosM::VisualizarEmpleadosM();
        echo json_encode($respuesta);      
        
    }

    static public function VisualizarEmpleadosDC(){
        $respuesta = CEmpleadosM::VisualizarEmpleadosDM();
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

    static public function cantidad_usuarioC(){
        $respuesta = CEmpleadosM::cantidad_usuario();
        echo json_encode($respuesta);   
        
    }

    static public function cantidad_horasC(){
        $respuesta = CEmpleadosM::cantidad_horas();
        echo json_encode($respuesta);   
        
    }
    
    static public function cantidad_horassC(){
        $respuesta = CEmpleadosM::cantidad_horass();
        echo json_encode($respuesta);   
        
    }  

    static public function RegistrosAC(){
        $respuesta = CEmpleadosM::RegistrosA();
        echo json_encode($respuesta);      
        
    }
}
?>