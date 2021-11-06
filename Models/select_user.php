<?php
require_once "connection.php";



class CEmpleadosM extends connection
{

    static public function VisualizarEmpleadosM()
    {


        //Obtener la información de los usuarios.
        $dataUser = connection::Conexion()->prepare("SELECT * FROM usuarios");
        $dataUser->execute();
        $datosUsuario = $dataUser->fetchAll(PDO::FETCH_ASSOC);

        /*
            PONER EN EL SQL UNA CONDICIÓN INNER JOIN PARA SOLO OBTENER EL ULTIMO REGISTRO DE LA TABLA DOS:
            -> Obtener todos los registros de la tabla usurios
            -> Obtener solo el último registro que tiene cada usuario de la tabla registros
        */
        return $datosUsuario;
    }
}
