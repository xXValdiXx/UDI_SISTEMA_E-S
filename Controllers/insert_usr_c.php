<?php
require_once ("../Models/insert_user.php");

class EmpleadosC{

    public function RegistrarAsistenciaEC(){
      
        if(isset($_POST["id_usr"])){
            $datosf = array("id_usr"=>$_POST["id_usr"], "id_evento"=>$_POST["id_evento"]);

            $TBD = "registros";

            $respuesta = EmpleadosM::RegistrarAsistenciaEM($datosf, $TBD);

            if($respuesta == "bien"){
                header("Location:home.php");
            }else{
                echo "error";
            }
        }
         
    }
}
?>