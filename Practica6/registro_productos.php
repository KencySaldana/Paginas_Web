<?php
  require_once("db/database_utilities.php");

  $r = categoriasActivas(); 

//Se revisa que las variables nombre y email se esten recibiendo mediante el metodo POST para despues continuar
//con la insercion de los valores ingresados en la base de datos, para finalmente redireccionar al inicio
if(isset($_POST['descripcion_producto'])&& isset($_POST['precio_venta'])&& isset($_POST['precio_compra'])&&isset($_POST['categoriaProducto'])) {
  addProducto($_POST['descripcion_producto'],$_POST['precio_venta'],$_POST['precio_compra'],$_POST['categoriaProducto']);
  //header("location: registro_productos.php");
}else{
  echo "<script src='dist/js/validacion_productos.js'></script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KencySystem | Productos</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<main>
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
        <span class="brand-text font-weight-light">Práctica No.6</span>
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
            <li class="nav-item">
              <a href="category_products.php" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Registro de categorias
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="tabla_productos.php" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Tabla de productos
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
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Registro de productos</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Registro de productos</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <form action = "registro_productos.php" method="post">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Datos del nuevo producto</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nombre:</label>
                      <input type="text" class="form-control" name="descripcion_producto" placeholder="Introduce el nombre del producto">
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="precio_compra">Precio de compra:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <input type="text" class="form-control"  name = "precio_compra">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                    <div class="form-group">
                      <label>Precio de venta:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <input type="text" class="form-control" name = "precio_venta">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                    <div>
                    <label>Categoria:</label>
                    <div>
                      
                    <select class="form-select" aria-label="Default select example" name="categoriaProducto">                      
                      <?php foreach ($r as $fila): ?>
                      <option value="<?php echo $fila['ID']; ?>">
                      <?php echo $fila['descripcion']; ?>
                      </option>
                      <?php endforeach; ?>
                    </select>
                    </div>
                    <br>
                    <br>
                    </div>
                </div>
                <!-- /.col -->
              </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary" id="validar" >Guardar datos</button>
            </div>
          </div>
          <!-- /.card -->
        </div>
          <!-- /.row -->
        </div>
      </form>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>

    <!-- SECCIÓN DE MODALES ----->
        <div class="modal fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content bg-info">
              <div class="modal-header">
                <h4 class="modal-title" id="titulo"> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p id ="message"></p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal --> 



    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- Page specific script -->
  </script>
  
</main>
</body>
</html>
