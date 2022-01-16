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
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $_SESSION['Sesion_activa']; ?></h3>

                  <p><?php echo (!isset($_SESSION['Sesion_activa']) || $_SESSION['Sesion_activa'] != '1') ? "Redirigir":"Acceder"; ?></p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>

                  <p>Bounce Rate</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>44</h3>

                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>65</h3>

                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="">

              <!-- DataTales Example -->
              <div class="card shadow mb-4">

                <div class="card-header py-3">
                  <h1 class="m-0 font-weight-bold text-primary" id="title">CONTROL USUARIOS</h1>

               


                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="listadoUsuarios" width="100%" cellspacing="0" style="margin: 0 auto;">
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
    <script>
      var table_ListaUsuarios = $('#listadoUsuarios').DataTable();

      $.ajax({
        url: "../rutas.php",
        type: "post",
        data: {
          ruta: 'obtenerUsuariosD'
        },
        success: function(r) {
          r = JSON.parse(r);

          $.each(r, function(index, item) {
            table_ListaUsuarios.row.add({
              0: item['nombre'] + " " + item['apellidoPaterno'] + " " + item['apellidoMaterno'],
              1: item['area'],
              2: item['puesto'],
              3: item['numEmpleado'],
              4: item['correo'],
              5: item['password'],
              6: item['imagen'],
              7: item['telefonoPersonal'],
              8: item['extensionIPN'],
            }).draw();
          });

          
        }
      });
    </script>


</body>

</html>