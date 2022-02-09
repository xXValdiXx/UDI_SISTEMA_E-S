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


        // Verificar que el usuario no tenga una entrada incompleta y el dia de la peticion no exista un registro de entrada, en caso de exisitir la peticion es de salida, si no será de entrada.
        $verificarEntradaPrevia = connection::Conexion()->prepare("SELECT * FROM registros WHERE id_usuario = :id_usuario ORDER BY id DESC LIMIT 1 ");
        $verificarEntradaPrevia->BindParam(":id_usuario", $datosUsuario["id"], PDO::PARAM_STR);
        //$verificarEntradaPrevia->BindParam(":today", $fecha, PDO::PARAM_STR);
        $existeEntradaPrevia = $verificarEntradaPrevia->execute();
        $uregistrosUsuario= $verificarEntradaPrevia->fetch(PDO::FETCH_ASSOC);
        
        $id_evento = ( $existeEntradaPrevia && (isset($uregistrosUsuario["salida"]) && $uregistrosUsuario["salida"] != NULL) || ($verificarEntradaPrevia->rowCount() == 0 )) ? 1:2;// 2 -> Salida | 1 -> Entrada

        if($id_evento == 1){
            $pdo = connection::Conexion()->prepare("INSERT INTO $TBD (fechaEntrada, horaEntrada, id_usuario, entrada, fechaSalida, horaSalida, salida) VALUES (:fecha, :hora, :id_usuario, 1, NULL, NULL, NULL)");
            $pdo->BindParam(":id_usuario", $datosUsuario["id"], PDO::PARAM_INT);
        } else{
            $pdo = connection::Conexion()->prepare("UPDATE $TBD SET fechaSalida = :fecha, horaSalida=:hora,  salida = 1 WHERE id =:id");
            $pdo->BindParam(":id", $uregistrosUsuario["id"], PDO::PARAM_INT);
        }

        //Insertar el registro en la tabla
        
        $pdo->BindParam(":fecha", $fecha, PDO::PARAM_STR);
        $pdo->BindParam(":hora", $hora, PDO::PARAM_STR);
        
        
        
        $pdo->execute();

        $r = $pdo->errorInfo();

        $pdo = $verificarEntradaPrevia = $dataUser = null;
        return $r;

    }   
    static public function InsertarUDash($datosUsuario)
    {
        //Insertar la información de los usuarios.
        $pdo = connection::Conexion()->prepare("INSERT INTO usuarios (nombre, apellidoPaterno, apellidoMaterno, area, puesto, numEmpleado, correo, password, imagen, telefonoPersonal, extensionIPN) VALUES (:nombre, :apellidoPaterno, :apellidoMaterno, :area, :puesto, :numEmpleado, :correo, :password, :imagen, :telefonoPersonal, :extensionIPN)");
        $pdo->BindParam(":nombre", $datosUsuario["nombre"], PDO::PARAM_STR);
        $pdo->BindParam(":apellidoPaterno", $datosUsuario["apellidoPaterno"], PDO::PARAM_STR);
        $pdo->BindParam(":apellidoMaterno", $datosUsuario["apellidoMaterno"], PDO::PARAM_STR);
        $pdo->BindParam(":area", $datosUsuario["area"], PDO::PARAM_STR);
        $pdo->BindParam(":puesto", $datosUsuario["puesto"], PDO::PARAM_STR);
        $pdo->BindParam(":numEmpleado", $datosUsuario["numEmpleado"], PDO::PARAM_STR);
        $pdo->BindParam(":correo", $datosUsuario["correo"], PDO::PARAM_STR);
        $pdo->BindParam(":correo", $datosUsuario["correo"], PDO::PARAM_STR);
        $pdo->BindParam(":password", $datosUsuario["password"], PDO::PARAM_STR);
        $pdo->BindParam(":imagen", $datosUsuario["imagen"], PDO::PARAM_STR);
        $pdo->BindParam(":telefonoPersonal", $datosUsuario["telefonoPersonal"], PDO::PARAM_STR);
        $pdo->BindParam(":extensionIPN", $datosUsuario["extensionIPN"], PDO::PARAM_STR);
        
        $pdo->execute();

        $datosUsuario = $pdo->errorInfo();
        return $datosUsuario;
        
    }
    
}
?>