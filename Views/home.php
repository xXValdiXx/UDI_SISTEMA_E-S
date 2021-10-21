<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="public/css/login.css">
    
</head>
<body>

<div class="container-lo">
    <!-- CONTAINER RELOJ -->
    <div class="container-reloj">
    <div class="lockscreen-title">
        <H3>CONTROL ASISTENCIA CECyT 3 "Estanislao Ramírez Ruiz”</H3>
    </div>
        <H1 id="time">00:00:00</H1>
        <p id="date">date</p>
            <div class="vector-image">
            <img src="public/images/vector.png" alt="User Image">
            </div>
    </div>
    

    <!-- CONTAINER CHECADOR -->
    <div class="lockscreen-wrapper">
    <!-- ASISTENCIA -->
    <div class="lockscreen-title2">
        <H3>ASISTENCIA.</H3>
    </div>
    <!-- IMAGEN -->
    <div class="lockscreen-item">
        <div class="lockscreen-image">
        <img src="public/images/logocecyt3.png" alt="User Image">
        </div>
        <!-- FORM ASISTENCIA -->
        <form  action="" class="lockscreen-credentials" name="formulario" id="formulario" method="POST">
        <div class="input-group">
            <input type="password" class="form-control" name="id_usr" id="id_usr" placeholder="ID Usuario">
            <select name="id_evento" id="id_evento">
                <option value="1">Entrada</option>
                <option value="2">Salida</option>
            </select>
            <button id="registro_a" type="submit">Registrar Asistencia.</button>
        </div>
        </form>
    
    </div>
    <!-- BOTON LOGIN-->
    <div class="text-center">
    </div>
    <div class="lockscreen-footer text-center">
        <a href="../admin/">Iniciar Sesión.</a>
    </div>
    </div>
</div>
<script src="public/js/reloj.js"></script>
</body>
</html>

