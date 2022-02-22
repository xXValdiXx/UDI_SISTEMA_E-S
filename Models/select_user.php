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
    static public function VisualizarEmpleadosDM()
    {
        //Obtener la información de los usuarios.
        $dataUser = connection::Conexion()->prepare("SELECT * FROM usuarios ");

        $dataUser->execute();

        $datosUsuario = $dataUser->fetchAll(PDO::FETCH_ASSOC);
        return $datosUsuario;
    }

    static public function cantidad_usuario(){
        $dataUser = connection::Conexion()->prepare("SELECT count(*) id FROM usuarios");
        $dataUser->execute();

        $datosUsuario = $dataUser->fetchAll(PDO::FETCH_ASSOC);
        return $datosUsuario;
       
    }

    static public function cantidad_horas(){
        $dataUser = connection::Conexion()->prepare("SELECT count(*) horaEntrada FROM registros WHERE fechaEntrada =DATE(NOW())");
        $dataUser->execute();

        $datosUsuario = $dataUser->fetchAll(PDO::FETCH_ASSOC);
        return $datosUsuario;

        
    }

    static public function cantidad_horass(){
    $dataUser = connection::Conexion()->prepare("SELECT count(*) horaSalida FROM registros WHERE fechaSalida =DATE(NOW())");
    $dataUser->execute();

    $datosUsuario = $dataUser->fetchAll(PDO::FETCH_ASSOC);
    return $datosUsuario;
    }

    static public function ReportIn($id_us, $fecha_inicio,$fecha_fin) 
    {
        //Obtener la información de los usuarios.
        $dataUser = connection::Conexion()->prepare("SELECT a.id, a.nombre, a.apellidoPaterno, a.apellidoMaterno, a.area, a.puesto, a.correo, a.numEmpleado, g.horaEntrada, g.fechaEntrada, g.horaSalida, g.fechaSalida FROM usuarios AS a INNER JOIN registros AS g ON a.id=g.id_usuario WHERE a.id = '$id_us' AND fechaEntrada  BETWEEN '$fecha_inicio' AND '$fecha_fin' ");
       
        $dataUser->execute();

        $datosUsuario = $dataUser->fetchAll(PDO::FETCH_ASSOC);
        return $datosUsuario;
    }

    static public function ReportInUs($id_us)
    {
        //Obtener la información de los usuarios.
        $dataUser = connection::Conexion()->prepare("SELECT * FROM usuarios WHERE id='$id_us'");

        $dataUser->execute();

        $datosUsuario = $dataUser->fetchAll(PDO::FETCH_ASSOC);
        return $datosUsuario;
    }  

    static public function RegistrosA()
    {
        //Obtener la información de los usuarios.
        $dataUser = connection::Conexion()->prepare("SELECT * FROM usuarios INNER JOIN registros ON usuarios.id = registros.id_usuario ORDER BY registros.id");
        $dataUser->execute();
        $datosUsuario = $dataUser->fetchAll(PDO::FETCH_ASSOC);
        return $datosUsuario;
    }
}

