<?php
    require_once("dist/database/database_utilities.php");
    //verificar la existencia de la variable de sesión "tipoUsuario"
    session_start();
    if(isset($_SESSION['tipoUsuario'])){
        if($_SESSION['tipoUsuario'] != ('adminTienda' || 'superAdmin')){
            // Si el valor de la variable de sesión no coincide con los permisos necesarios, redirigir al usuario a la página de inicio de sesión.
            header('location: login.php');
            exit();
        }
    }else{
        header('location: login.php');
        exit();
    }
    
    $id_tienda = $_GET['t'];
    $id_producto = $_GET['p'];
    $user = $_SESSION['usuario'];


    $result = obtenerProductosActivos($id_tienda);
    //Obtener la fecha actual
    $fecha_actual = date('Y-m-d'); 
    
?> 






<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Realizar venta</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=3.1.3">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=3.1.3">
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-menu-trigger">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                    <div class="nk-sidebar-brand">
                        <!-- <a href="html/index.html" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                            <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                        </a> -->
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element nk-sidebar-body">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Usuario</h6>
                                </li>
                                <!-- enlace a dashboard -->
                                <li class="nk-menu-item">
                                    <a href="html/pages/PROYECTO/dashboard.php?t=<?php echo($id_tienda);?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                        <span class="nk-menu-text">Dashboard</span>
                                    </a>
                                </li>
                                <!-- enlace a categorias -->
                                <li class="nk-menu-item">
                                    <a href="html/pages/PROYECTO/tablaCategorias.php?t=<?php echo($id_tienda);?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-list-index-fill"></em></span>
                                        <span class="nk-menu-text">Categorías</span>
                                    </a>
                                </li>
                                <!-- enlace a inventarios -->
                                <li class="nk-menu-item">
                                    <a href="html/pages/PROYECTO/tablaInventario.php?t=<?php echo($id_tienda);?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-layers-fill"></em></span>
                                        <span class="nk-menu-text">Inventario</span>
                                    </a>
                                </li>
                                <!-- enlace a usuarios -->
                                <li class="nk-menu-item">
                                    <a href="html/pages/PROYECTO/tablaUsuario.php?t=<?php echo($id_tienda);?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
                                        <span class="nk-menu-text">Usuarios</span>
                                    </a>
                                </li>
                                <!-- enlace a realizar venta -->
                                <li class="nk-menu-item">
                                    <a href="html/pages/PROYECTO/realizarVenta.php?t=<?php echo($id_tienda);?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-cart-fill"></em></span>
                                        <span class="nk-menu-text">Realizar venta</span>
                                    </a>
                                </li>
                                <!-- enlace historial de ventas -->

                                <li class="nk-menu-item">
                                    <a href="html/pages/PROYECTO/tablaHistorialVentas.php?t=<?php echo($id_tienda);?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-invest"></em></span>
                                        <span class="nk-menu-text">Historial de ventas</span>
                                    </a>
                                </li>
                                
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="html/index.html" class="logo-link">
                                    <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                                </a>
                            </div><!-- .nk-header-brand -->
                            
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em> <!--icono-->
                                                </div>
                                                <div class="user-info d-none d-md-block">
                                                    <div class="user-status">Tipo de usuario</div>  <!--TIPO DE USUARIO-->
                                                    <div class="user-name dropdown-indicator">Nombre de usuario</div> <!--NOMBRE DE USUARIO-->
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <em class="icon ni ni-user-alt"></em> <!--icono-->
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">Nombre de usuario</span> <!--NOMBRE DE USUARIO-->
                                                        <span class="sub-text">correo</span> <!--CORREO-->
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="#"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li> <!--CERRAR SESION-->
                                                </ul>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                    
                                </ul><!-- .nk-quick-nav -->
                            </div><!-- .nk-header-tools -->
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">

                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Realizar venta</h3>
                                            
                                        </div>
                                        
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="invoice">
                                        <label for=""><?php echo 'Fecha: '.$fecha_actual; ?></label> <!--FECHA-->
                                        <form method="POST" action="">
                                        <div class="invoice-wrap">
                                            <div class="invoice-brand text-center">
                                                <div class="row gy-4">
                                                    <div class="col-lg-4 col-sm-6">
                                                    
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-ui="xl" id="outlined-select" name='producto'>
                                                                <?php foreach ($result as $fila): ?>
                                                                    <option value="<?php echo $fila['id_producto']; ?>">
                                                                    <?php echo $fila['nombre_producto']; ?>
                                                                    </option>
                                                                    <?php endforeach; ?>
                                                                    
                                                                </select>
                                                                <label class="form-label-outlined" for="outlined-select">Producto</label> 
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <input type="number" class="form-control form-control-xl form-control-outlined" id="outlined-normal" name= 'cantidad'>
                                                                <label class="form-label-outlined" for="outlined-normal">Cantidad</label> <!--INPUT Agregar cantidad-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <ul class="form-control-xl">
                                                            
                                                        <button type="submite" class="btn btn-primary" name="agregar">
                                                            <em class="icon ni ni-plus"></em>
                                                            <span>Agregar</span>
                                                        </button> <!--BOTON Agregar producto-->
                                                        </ul>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="invoice-head">
                                                <div class="invoice-contact">
                                                    
                                                    <div class="invoice-contact-info">
                                                        <h4 class="title">Informacion de la venta:</h4> <!--Agregar informacion de la venta-->
                                                        <h4 class="title">Total: $</h4> <!--Agregar total de la venta-->
                                                        
                                                        
                                                    </div>
                                                </div>
                                                <div class="invoice-desc">
                                                    <br>
                                                    <div >
                                                        <ul class="nk-block-tools g-3">
                                                            
                                                            <button type="submite" class="btn btn-light" name="terminar">
                                                                <em class="icon ni ni-plus"></em>
                                                                <span>Agregar</span>
                                                            </button> <!--BOTON Agregar producto-->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div><!-- .invoice-head -->
                                            <!-- .invoice-wrap -->
                                            </form>
                                        
                                    </div><!-- .invoice -->
                                    
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview wide-md mx-auto">
                                    
                                   <!--TABLA-->
                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content" style="display: flex; align-items: center;">
                                                
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                                    <thead>
                                                        
                                                        <tr class="nk-tb-item nk-tb-head">
                                                            
                                                            <th class="nk-tb-col nk-tb-col-check">
                                                                
                                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                    <input type="checkbox" class="custom-control-input" id="uid">
                                                                    <label class="custom-control-label" for="uid"></label>
                                                                    
                                                                </div>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">ID</span></th>
                                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Nombre</span></th>
                                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Cantidad</span></th>
                                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Valor unitario</span></th>
                                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Importe</span></th>
                                                            
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            

                                                            // Si se presionó el botón "Agregar"
                                                            if (isset($_POST['agregar'])) {
                                                                $producto = $_POST['producto'];
                                                                $cantidad = $_POST['cantidad'];

                                                                // Agregar el producto a la sesión
                                                                if (!isset($_SESSION['carrito'])) {
                                                                    $_SESSION['carrito'] = array();
                                                                }

                                                                $_SESSION['carrito'][] = array(
                                                                    'producto' => $producto,
                                                                    'cantidad' => $cantidad,
                                                                    'valorUnitario' => $cantidad,
                                                                    'importe' => $cantidad

                                                                );
                                                            }

                                                            // Si se presionó el botón "Terminar venta"
                                                            if (isset($_POST['terminar'])) {
                                                                // Guardar los datos en la base de datos
                                                                // ...
                                                                
                                                                // Limpiar la sesión
                                                                unset($_SESSION['carrito']);
                                                            }

                                                            // Mostrar los productos agregados
                                                            if (isset($_SESSION['carrito'])) {
                                                                foreach ($_SESSION['carrito'] as $producto) {
                                                                    echo "<tr class='nk-tb-item'>";
                                                                    echo '<td class="nk-tb-col nk-tb-col-check">
                                                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                        <input type="checkbox" class="custom-control-input" id="uid1">
                                                                        <label class="custom-control-label" for="uid1"></label>
                                                                    </div>
                                                                </td>';
                                                                    echo '<td class="nk-tb-col tb-col-mb" >';
                                                                    echo '<span class="tb-odr-id">'. $producto['producto'] .'</span>';
                                                                    echo '</td>';
                                                                    echo '<td class="nk-tb-col tb-col-mb" >';
                                                                    echo '<span class="tb-odr-id">'. $producto['producto'] .'</span>';
                                                                    echo '</td>';
                                                                    echo '<td class="nk-tb-col tb-col-mb" >';
                                                                    echo '<span class="tb-odr-id">'. $producto['cantidad'] .'</span>';
                                                                    echo '</td>';
                                                                    echo '<td class="nk-tb-col tb-col-mb" >';
                                                                    echo '<span class="tb-odr-id">'. $producto['producto'] .'</span>';
                                                                    echo '</td>';
                                                                    echo '<td class="nk-tb-col tb-col-mb" >';
                                                                    echo '<span class="tb-odr-id">'. $producto['producto'] .'</span>';
                                                                    echo '</td>';
                                                                }
                                                            }
                                                            ?>
                                                                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- .card-preview -->
                                    </div> <!-- nk-block --> 
                                        
                                    
                                </div><!-- .components-preview -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; 2023 DashLite. Template by <a href="https://softnio.com" target="_blank">Softnio</a>
                            </div>
                            <div class="nk-footer-links">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    
    <!-- JavaScript -->
    <script src="./assets/js/bundle.js?ver=3.1.3"></script>
    <script src="./assets/js/scripts.js?ver=3.1.3"></script>
</body>

</html>