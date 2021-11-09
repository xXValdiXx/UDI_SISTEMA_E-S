<?php
require_once "connection.php";



class CEmpleadosM extends connection
{

    static public function VisualizarEmpleadosM()
    {


        //Obtener la información de los usuarios.
        $dataUser = connection::Conexion()->prepare("SELECT * FROM usuarios INNER JOIN registros ON usuarios.id = registros.id_usuario WHERE fechaEntrada =DATE(NOW()) OR registros.id IN (SELECT MAX(registros.id) FROM registros GROUP BY registros.id_usuario) ORDER BY registros.id DESC");
        $dataUser->execute();
        $datosUsuario = $dataUser->fetchAll(PDO::FETCH_ASSOC);

        /*
            PONER EN EL SQL UNA CONDICIÓN INNER JOIN PARA SOLO OBTENER EL ULTIMO REGISTRO DE LA TABLA DOS:
            -> Obtener todos los registros de la tabla usuarios
            -> Obtener solo el último registro que tiene cada usuario de la tabla registros
        */
        return $datosUsuario;
    }
}
