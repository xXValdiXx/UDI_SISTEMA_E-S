<?php
session_start();
if(!isset($_SESSION['Sesion_activa']) || $_SESSION['Sesion_activa'] != '1'){
  header('location: ./views/loginDash.php');
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CECyT 3 | Dashboard</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- Datatables -->
  <link href="plugins/datatables_2/dataTables.bootstrap4.min.css" rel="stylesheet">

 

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <?php require_once "views/navbar.php" ?>
    <?php require_once "views/sidebar.php" ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="homeDash.php">Home</a></li>
                <li class="breadcrumb-item active">Dashboard </li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          
        <div class="input-group mb-3">
            <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <label>Fecha Inicio</label>
                <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="">
            </div>

            <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <label>Fecha Limite</label>
                <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="">
            </div>

            <div class="form-inline col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Empleado</label>
                <select name="idcliente" id="idcliente" class="form-control selectpicker" data-live-search="true" required>
                </select>

            </div>

               
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="" width="100%" cellspacing="0" style="margin: 0 auto;">
                      <thead>
                        <tr>

                          <th>Usuario</th>
                          <th>Area</th>
                          <th>Puesto</th>
                          <th>Numero Empleado</th>
                          <th>Correo </th>
                          <th>Contraseña</th>
                          <th>Imagen</th>
                          <th>Telefono</th>
                          <th>Extension IPN</th>

                      </thead>

                      <tbody>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </section>
            <!-- right col -->
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>


    <?php require_once "views/footer.php" ?>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- DATATABLES plugins -->
    <script src="plugins/datatables_2/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables_2/dataTables.bootstrap4.min.js"></script>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>