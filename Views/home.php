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


        <!-- Container Checador -->


        <div class="lockscreen-wrapper">
            <div class="container row">
                <div class="col-12 text-center">
                    <h1>Asistencia</h1>
                </div>
                <div class="col-md-5 lockscreen-image">
                    <img src="public/images/logocecyt3.png" alt="User Image">
                </div>
                <div class="col-md-7">
                    <form action="" action="./controllers/insert_user_c" name="formulario" id="formulario" method="POST" autocomplete="off">
                        <div class="form-group">
                            <input type="email" class="form-control" style="margin-left: 0px!important" name="id_usr" id="id_usr" placeholder="Número de Empleado">
                            <small id="id_usr_help" class="form-text text-danger d-none">No hemos podido identificarte</small>
                        </div>
                        <button id="registro_a" class="btn btn-primary btn-block" type="submit">Registrar Asistencia.</button>
                    </form>
                </div>
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