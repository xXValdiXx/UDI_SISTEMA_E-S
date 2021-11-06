<?php
require_once "connection.php";



class CEmpleadosM extends connection{

    static public function VisualizarEmpleadosM(){


        //Obtener la información de los usuarios.
        $dataUser = connection::Conexion()->prepare("SELECT * FROM registros JOIN usuarios ON registros.id_usuario= usuarios.id");
        $dataUser->execute();
        $datosUsuario = $dataUser->fetch(PDO::FETCH_ASSOC);


        return $datosUsuario;

    }   
}
?>