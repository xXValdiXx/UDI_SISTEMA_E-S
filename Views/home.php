<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Asistencia al CECyT No. 3</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/login.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #mapid {
            height: 270px;
            width: 100%
        }
    </style>
</head>

<body>

    <div class="container-lo">
        <!-- Container Fecha y Hora -->
        <div class="container-reloj">
            <div class="lockscreen-title">
                <H3>CONTROL ASISTENCIA CECyT 3 "Estanislao Ramírez Ruiz”</H3>
            </div>
            <h1 id="time">Cargando...</h1>
            <p id="date">Cargando...</p>
            <div class="row">
                <div class="col-12">
                    <div id="mapid"></div>
                </div>
            </div>
        </div>


        <!-- Container Checador -->
        <div class="lockscreen-wrapper">
            <div class="container row">
                <div class="col-12 text-center">
                    <h1>Asistencia.</h1>
                    <?php
                    if (isset($_COOKIE["msg"])) {
                        if ($_COOKIE["msg"] == 1) {
                            setcookie("msg", "", time() - 3600); ?>
                            <div class="alert alert-success" role="alert">
                                Evento guardado correctamente
                            </div>
                        <?php } else if ($_COOKIE["msg"] == 0) {
                            setcookie("msg", "", time() - 3600); ?>
                            <div class="alert alert-danger" role="alert">
                                A ocurrido un error, verifiquelo con el administrador.
                            </div>
                        <?php } else {
                            setcookie("msg", "", time() - 3600);
                        ?> <?php } ?>
                        <script>
                            setTimeout(function() {
                                location.reload()
                            }, 4500)
                        </script>
                    <?php } ?>

                </div>
                <div class="col-md-5 lockscreen-image">
                    <img src="public/images/logocecyt3.png" alt="User Image" height="100%">
                </div>
                <div class="col-md-7">
                    <form action="./rutas.php" name="formulario" id="formulario" method="POST" autocomplete="off">
                        <input type="hidden" class="d-none" name="ruta" id="ruta" value="peticionES">
                        <div class="form-group">
                            <input type="text" class="form-control" style="margin-left: 0px!important" name="numEmpleado" id="numEmpleado" placeholder="Número de Empleado" value="2014030514">
                            <small id="numEmpleado_help" class="form-text text-danger d-none">No hemos podido identificarte</small>
                        </div>
                        <button id="registro_a" class="btn btn-primary btn-block" type="submit">Registrar.</button>

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
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        function inside(point, vs) {
            // ray-casting algorithm based on
            // https://wrf.ecse.rpi.edu/Research/Short_Notes/pnpoly.html/pnpoly.html

            var x = point[0],
                y = point[1];

            var inside = false;
            for (var i = 0, j = vs.length - 1; i < vs.length; j = i++) {
                var xi = vs[i][0],
                    yi = vs[i][1];
                var xj = vs[j][0],
                    yj = vs[j][1];

                var intersect = ((yi > y) != (yj > y)) &&
                    (x < (xj - xi) * (y - yi) / (yj - yi) + xi);
                if (intersect) inside = !inside;
            }

            return inside;
        };
    </script>

    <script>
        if (navigator.geolocation) { //check if geolocation is available
            navigator.geolocation.getCurrentPosition(function(position) {


                xInitial = position.coords.latitude;
                yInitial = position.coords.longitude;

                console.log(localStorage.getItem('simular'));



                var mymap = L.map('mapid').setView([xInitial, yInitial], 16);
                L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    maxZoom: 18,
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1,
                    accessToken: 'pk.eyJ1IjoiYWxhbmdwbXgiLCJhIjoiY2tka2wxc2V6MGI5MzJya3lzZGhpeGlvMSJ9.ms5inSkLA9CGyO1CvNZP3A'
                }).addTo(mymap);

                var poligonoCECyT = [
                    [19.618941, -99.042041],
                    [19.619648, -99.040517],
                    [19.620765, -99.041137],
                    [19.620179, -99.042339]
                ];

                var polygon = L.polygon(poligonoCECyT).addTo(mymap);

                var userIsInside = inside([xInitial, yInitial], poligonoCECyT);

                console.log(userIsInside);

                var marker = L.marker([xInitial, yInitial]).addTo(mymap);

                if (!userIsInside) {
                    $("#registro_a").attr('disabled', 'disabled');
                } else {
                    $("#registro_a").removeAttr('disabled');
                }
            });
        }
    </script>
</body>

</html>