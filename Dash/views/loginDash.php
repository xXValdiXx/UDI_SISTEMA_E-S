<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="login">
        <form action="../../rutas.php" name="formulario" id="formulario" method="POST" autocomplete="off">
                        <h2> Iniciar Sesión</h2>
                        <input type="hidden" class="d-none" name="ruta" id="ruta" value="login">
                        <input type="text" class="form-control" style="margin-left: 0px!important" name="numEmpleado" id="numEmpleado" placeholder="Ingrese su numero de Empleado." value="">
                        <input type="password" class="form-control" style="margin-left: 0px!important" name="password" id="password" placeholder="Contraseña" value="">
                        <button id="inicioSesion" class="btn btn-primary btn-block" type="submit">Entrar.</button> <!-- boton -->
        </form>
    </div>
</body>
</html>