<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/css/logind.css">
</head>
<body>
    <div class="logindp">

        <div class="imagenl">
            <div class="textl">
                <h5>¡BIENVENIDO!</h5>
            </div>
            <img src="../../public/images/vector.png" alt="IMG">
        </div>
            <div class="logind">
            <img src="../../public/images/logocecyt3.png" alt="IMG">
                    
                    <form action="../../rutas.php" name="formulario" id="formulario" method="POST" autocomplete="off" class="logindash" >
                    <br>
                    <h1>Iniciar Sesión.</h1>
                        <br>
                        <input type="hidden" class="d-none" name="ruta" id="ruta" value="login">
                        
                        <input type="text" class="form-control" style="margin-left: 0px!important" name="numEmpleado" id="numEmpleado" placeholder="Ingrese su numero de Empleado." value=""> 
                        <input type="password" class="form-control" style="margin-left: 0px!important" name="password" id="password" placeholder="Contraseña" value=""> <br> 
                        <button id="inicioSesion" class="btn btn-primary btn-block" type="submit">Entrar.</button> <!-- boton -->
                        <br>
                    </form>
            </div>
    </div>

</body>
</html>

