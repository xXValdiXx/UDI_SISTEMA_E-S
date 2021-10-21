<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Asistencia al CECyT No. 3</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/login.css">

</head>

<body>

    <div class="container-lo">
        <!-- CONTAINER RELOJ -->
        <div class="container-reloj">
            <div class="lockscreen-title">
                <H3>CONTROL ASISTENCIA CECyT 3 "Estanislao Ramírez Ruiz”</H3>
            </div>
            <h1 id="time">Cargando...</h1>
            <p id="date">Cargando...</p>
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
                <form action="" class="lockscreen-credentials" name="formulario" id="formulario" method="POST">
                    <div class="input-group">
                        <input type="password" class="form-control" name="id_usr" id="id_usr" placeholder="ID Usuario">
                        <select name="id_evento" id="id_evento">
                            <option value="1">Entrada</option>
                            <option value="2">Salida</option>
                        </select>
                        <button id="registro_a" class="btn btn-primary" type="submit">Registrar Asistencia.</button>
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


    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="public/js/reloj.js"></script>
</body>

</html>