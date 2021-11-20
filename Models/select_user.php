<?php
require_once "connection.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class CEmpleadosM extends connection
{
    static public function VisualizarEmpleadosM()
    {
        //Obtener la información de los usuarios.
        $dataUser = connection::Conexion()->prepare("SELECT * FROM usuarios INNER JOIN registros ON usuarios.id = registros.id_usuario WHERE fechaEntrada =DATE(NOW()) OR registros.id IN (SELECT MAX(registros.id) FROM registros GROUP BY registros.id_usuario) ORDER BY registros.id DESC");
        $dataUser->execute();
        $datosUsuario = $dataUser->fetchAll(PDO::FETCH_ASSOC);
        return $datosUsuario;
    }

    static public function loginUserM($datosf)
    {
        //verficar usuario
        $dataUser = connection::Conexion()->prepare("SELECT numEmpleado, password FROM usuarios WHERE numEmpleado = :numEmpleado");
        $dataUser->BindParam(":numEmpleado", $datosf["numEmpleado"], PDO::PARAM_STR);
        $dataUser->execute();

        $datosUsuario = $dataUser->fetch(PDO::FETCH_ASSOC);

        //verficar usuario y contraseña
        if (password_verify($datosf["password"], $datosUsuario["password"])) {
            $_SESSION['Sesion_activa'] = 1;
        }

        $answ = $dataUser->errorInfo();
        return $answ;
    }
}
