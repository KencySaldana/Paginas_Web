<?php

  //Conexión a base de datos
  $con=mysqli_connect("localhost","admin","52f9d1ac770d01b9be9df4c1d5edfd3495784ea1c5e03532","practica5");

  //Revisar conexión
  if($con == false) {

      die("Error, no hay conexión a la base de datos".
      mysqli_connect_error());
  }
  //Tomar los 5 valores del formulario atraves de los datos de los campos
  $codigo_producto = $_REQUEST["codigo_producto"];
  $nombre_producto = $_REQUEST["nombre_producto"];
  $precio_compra = $_REQUEST["precio_compra"];
  $precio_venta = $_REQUEST["precio_venta"];

  //Ejecutar el Query de inserción de datos

  $sql = "INSERT INTO productos VALUES ('$codigo_producto', '$nombre_producto', '$precio_compra', '$precio_venta')";

  //Mandar mensaje de datos guardados

  if(mysqli_query($con, $sql)){
      echo '<script>console.log("ENVIO DE DATOS EXITOSOS");</script>';
  }else{
      echo "ERROR! $sql. "
      . mysqli_error($con);
      echo '<script>console.log("ENVIO DE DATOS EXITOSOS");</script>';
  }

  //Traer tabla de la base de datos
  $tabla = "SELECT * FROM productos";
  $resultado = mysqli_query($con, $tabla);



?>  
            
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KencySystem | Productos</title>

  <!------------ESTILOS DE LA PÁGINA------------>
  <link rel="stylesheet" type="text/css" href="dist/fontawesome-5/fontawesome-css/all.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-------------END ESTILOS----------------->

</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/upv.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Práctica No.5</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/melody.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Ing. Kency Saldaña</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="registro_productos.php" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Registro de productos
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                  <div>
                    <br>
                    <br>
                  </div>
                  <!-------------------- INICIA TABLA------------------------------------->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">TABLA DE PRODUCTOS</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Precio de compra</th>
                            <th>Precio de venta</th>
                          </tr>
                        </thead>
                        <tbody id="tabla_cuerpo">
                        <?php
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                          echo "<tr>";
                          echo "<td>" . $fila["codigo"] . "</td>";
                          echo "<td>" . $fila["nombre"] . "</td>";
                          echo "<td>" . $fila["precio_compra"] . "</td>";
                          echo "<td>" . $fila["precio_venta"] . "</td>";
                          echo "</tr>";
                      };
		       //cerrar la conexión
			mysqli_close($con);
                      ?>
                      </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>
        </div>
    </section>

  </div>
  <!-- /.content -->
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script type="text/javascript" src="dist/js/productos_tabla.js"></script>
</body>
</html>
