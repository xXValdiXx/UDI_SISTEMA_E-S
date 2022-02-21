<?php

session_start();
if(!isset($_SESSION['Sesion_activa']) || $_SESSION['Sesion_activa'] != '1'){
  header('location: ./views/loginDash.php');
}

require_once "../Models/select_user.php";
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


       
     

        <div class="FORM-group col-lg-2  ">

          <select name="id_us" id="id_us">
           <?php
           $articulo = new CEmpleadosM();

           $rspta = $articulo->VisualizarEmpleadosDM();
            foreach ($rspta as $valores):
              echo '<option value="'.$valores["id"].'">'.$valores["nombre"].'</option>';
              endforeach;
           ?>
          </select> <br> <br>
      
          <label>Fecha Inicio</label>
          <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?php echo date("Y-m-d"); ?>">
        
          <label>Fecha Fin</label>
          <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="<?php echo date("Y-m-d"); ?>">
          
          <BR>
          <button type="submit" onclick="ReportePDF();">Generar PDF</button>
        </div>
        
        


            
      </section>
      <!-- /.content -->
    </div>


    <?php require_once "views/footer.php" ?>

    <script>
      function ReportePDF(){
        var fecha_inicio = $('#fecha_inicio').val();
        var fecha_fin = $('#fecha_fin').val();
        var id_us= $('#id_us').val();

        window.open('views/reporte.php?id_us='+id_us+'&fecha_inicio='+fecha_inicio+'&fecha_fin='+fecha_fin);  
      }

    </script>




    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- DATATABLES plugins -->
    <script src="plugins/datatables_2/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables_2/dataTables.bootstrap4.min.js"></script>

</body>

</html>