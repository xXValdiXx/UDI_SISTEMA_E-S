<?php

require_once ("./models/select_user.php");

class CEmpleadosC{

    static public function VisualizarEmpleadosC(){
        $respuesta = CEmpleadosM::VisualizarEmpleadosM();
        echo json_encode($respuesta);      
        
    }
}
?>