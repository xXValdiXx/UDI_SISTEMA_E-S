<?php
require_once "connection.php";
class EmpleadosM extends connection{

    static public function RegistrarAsistenciaEM($datosf,$TBD){

        date_default_timezone_set('America/Mexico_City');
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        
        $pdo = connection::Conexion()->prepare("INSERT INTO $TBD (fecha_reg, hora_reg, id_usr, id_evento) VALUES 
        (:fecha_reg, :hora_reg, :id_usr, :id_evento)");

        $pdo->BindParam(":fecha_reg", $fecha, PDO::PARAM_STR);
        $pdo->BindParam(":hora_reg", $hora, PDO::PARAM_STR);
        $pdo->BindParam(":id_usr", $datosf["id_usr"], PDO::PARAM_STR);
        $pdo->BindParam(":id_evento", $datosf["id_evento"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return "bien";
        }else {
            return "error";
        }

        $pdo->Close();
    }   
}
?>