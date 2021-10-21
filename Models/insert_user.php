<?php
require_once "connection.php";
date_default_timezone_set('America/Mexico_City');


class EmpleadosM extends connection{

    static public function RegistrarAsistenciaEM($datosf,$TBD = "registros"){

        $fecha = date("Y-m-d");
        $hora = date("H:i:s");

        //Obtener el ID del usuario (PK), no el Numero de empleado ni algún otro dato
        $dataUser = connection::Conexion()->prepare("SELECT id FROM usuarios WHERE numEmpleado = :numEmpleado");
        $dataUser->BindParam(":numEmpleado", $datosf["numEmpleado"], PDO::PARAM_STR);
        $dataUser->execute();
        $datosUsuario = $dataUser->fetch(PDO::FETCH_ASSOC);

        if( $dataUser->rowCount() == 0 ){ //No existe el usuario
            return 0;
        }

        // Verificar que el dia de la peticion no exista un registro de entrada, en caso de exisitir la peticion es de salida, si no será de entrada.
        $verificarEntradaPrevia = connection::Conexion()->prepare("SELECT id FROM $TBD WHERE id_usuario = :id_usuario AND fecha = :today");
        $verificarEntradaPrevia->BindParam(":id_usuario", $datosUsuario["id"], PDO::PARAM_STR);
        $verificarEntradaPrevia->BindParam(":today", $fecha, PDO::PARAM_STR);
        $existeEntradaPrevia = $verificarEntradaPrevia->execute();
        $id_evento = ( $existeEntradaPrevia && $verificarEntradaPrevia->rowCount() != 0) ? 2:1; // 2 -> Salida | 1 -> Entrada

        //Insertar el registro en la tabla
        $pdo = connection::Conexion()->prepare("INSERT INTO $TBD (fecha, hora, id_usuario, id_evento) VALUES (:fecha, :hora, :id_usuario, :id_evento)");
        $pdo->BindParam(":fecha", $fecha, PDO::PARAM_STR);
        $pdo->BindParam(":hora", $hora, PDO::PARAM_STR);
        $pdo->BindParam(":id_usuario", $datosUsuario["id"], PDO::PARAM_STR);
        $pdo->BindParam(":id_evento", $id_evento, PDO::PARAM_STR);
        $pdo->execute();

        $r = $pdo->errorInfo();

        $pdo = $verificarEntradaPrevia = $dataUser = null;
        return $r;

    }   
}
?>