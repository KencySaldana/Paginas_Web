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

    if (isset($_POST['accion'])) {
        addCambio($id_tienda);
        $accion = $_POST['accion'];
        if ($accion == 'agregó') {
          // código para agregar stock
          incrementar_stock($id_producto, $_POST['unidades']);
        } elseif ($accion == 'vendió') {
          // código para eliminar stock
          decrementar_stock($id_producto, $_POST['unidades']);
        }

        if($user =='Kency Saldaña'){
            if(isset($_POST['referencia'])){
                agregarRegistroHistorial($id_producto, null, $_POST['referencia'], $_POST['unidades'], $id_tienda, $accion, 'Kency Saldaña');
            }
        }else{
            if(isset($_POST['referencia'])){
                $user_id = obtenerIdUsuario($user); 
                $nombreCompleto = obtenerNombreUsuarioPorId($user_id);
                agregarRegistroHistorial($id_producto, $user_id, $_POST['referencia'], $_POST['unidades'], $id_tienda, $accion, $nombreCompleto);
            }
        }
    }



    

    $r = detallesProducto($id_producto);
    $tablaProductos = mostrarhistorial($id_tienda, $id_producto);

?> 

<!DOCTYPE html>
<html lang="en" >

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Product Details | DashLite Admin Template</title>
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
                        <a href="html/index.html" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                            <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                        </a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element nk-sidebar-body">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                        <!-- Menu -->
                        <ul class="nk-menu">
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Usuario</h6>
                                </li>
                                <!-- enlace a dashboard -->
                                <li class="nk-menu-item">
                                    <a href="html/pages/PROYECTO/dashboard.php?t=<?php echo($id_tienda);?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                                        <span class="nk-menu-text">Dashboard</span>
                                    </a>
                                </li>
                                <!-- enlace a categorias -->
                                <li class="nk-menu-item">
                                    <a href="html/pages/PROYECTO/tablaCategorias.php?t=<?php echo($id_tienda);?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-grid-alt"></em></span>
                                        <span class="nk-menu-text">Categorías</span>
                                    </a>
                                </li>
                                <!-- enlace a inventarios -->
                                <li class="nk-menu-item">
                                    <a href="html/pages/PROYECTO/tablaInventario.php?t=<?php echo($id_tienda);?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
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
                                
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->

            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-content ">
                    <div class="container">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Detalles del Producto</h3>
                                            
                                        </div>
                                        <div class="nk-block-head-content">
                                            <a href="html/product-list.html" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                            <a href="html/product-list.html" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <div class="row pb-5">
                                                <div class="col-lg-6">
                                                    <div class="product-gallery me-xl-1 me-xxl-5">
                                                        <div class="slider-init" id="sliderFor" data-slick='{"arrows": false, "fade": true, "asNavFor":"#sliderNav", "slidesToShow": 1, "slidesToScroll": 1}'>
                                                            <div class="slider-item rounded">
                                                            <div class="preview-icon-wrap">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                                                    <path d="M29,74H11a7,7,0,0,1-7-7V17a7,7,0,0,1,7-7H61a7,7,0,0,1,7,7V30" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                                    <path d="M11,11H61a6,6,0,0,1,6,6v4a0,0,0,0,1,0,0H5a0,0,0,0,1,0,0V17A6,6,0,0,1,11,11Z" fill="#e3e7fe" />
                                                                    <circle cx="11" cy="16" r="2" fill="#6576ff" />
                                                                    <circle cx="17" cy="16" r="2" fill="#6576ff" />
                                                                    <circle cx="23" cy="16" r="2" fill="#6576ff" />
                                                                    <rect x="11" y="27" width="19" height="19" rx="1" ry="1" fill="#c4cefe" />
                                                                    <path d="M33.8,53.79c.33-.43.16-.79-.39-.79H12a1,1,0,0,0-1,1V64a1,1,0,0,0,1,1H31a1,1,0,0,0,1-1V59.19a10.81,10.81,0,0,1,.23-2Z" fill="#c4cefe" />
                                                                    <line x1="36" y1="29" x2="60" y2="29" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                                    <line x1="36" y1="34" x2="55" y2="34" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                                    <line x1="36" y1="39" x2="50" y2="39" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                                    <line x1="36" y1="44" x2="46" y2="44" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                                    <rect x="4" y="21" width="64" height="2" fill="#6576ff" />
                                                                    <rect x="36" y="56" width="38" height="24" rx="5" ry="5" fill="#fff" stroke="#e3e7fe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                                    <rect x="41" y="60" width="12" height="9" rx="1" ry="1" fill="#c4cefe" />
                                                                    <path d="M84.74,53.51,66.48,35.25a4.31,4.31,0,0,0-6.09,0l-9.13,9.13a4.31,4.31,0,0,0,0,6.09L69.52,68.73a4.31,4.31,0,0,0,6.09,0l9.13-9.13A4.31,4.31,0,0,0,84.74,53.51Zm-15-5.89L67,50.3a2.15,2.15,0,0,1-3,0l-4.76-4.76a2.16,2.16,0,0,1,0-3l2.67-2.67a2.16,2.16,0,0,1,3,0l4.76,4.76A2.15,2.15,0,0,1,69.72,47.62Z" fill="#6576ff" />
                                                                </svg>
                                                            </div>
                                                            </div>
                                                            
                                                        </div><!-- .slider-init -->
                                                        <div class="slider-init slider-nav" id="sliderNav" data-slick='{"arrows": false, "slidesToShow": 5, "slidesToScroll": 1, "asNavFor":"#sliderFor", "centerMode":true, "focusOnSelect": true, 
                                "responsive":[ {"breakpoint": 1539,"settings":{"slidesToShow": 4}}, {"breakpoint": 768,"settings":{"slidesToShow": 3}}, {"breakpoint": 420,"settings":{"slidesToShow": 2}} ]
                            }'>
                                                            
                                                            
                                                        </div><!-- .slider-nav -->
                                                    </div><!-- .product-gallery -->
                                                </div><!-- .col -->
                                                <div class="col-lg-6">
                                                 
                                                        <?php foreach ($r as $fila): ?>
                                                            <ul class="nk-nav nk-nav-pills">
                                                                <li class="nk-menu-item">
                                                                    <a href="#" class="nk-menu-link">
                                                                        <span class="nk-menu-icon"><em class="icon ni ni-user"></em></span>
                                                                        <span class="nk-menu-text">Nombre: <?php echo $fila['nombre_producto']; ?></span>
                                                                    </a>
                                                                </li>
                                                                <li class="nk-menu-item">
                                                                    <a href="#" class="nk-menu-link">
                                                                        <span class="nk-menu-icon"><em class="icon ni barcode-scan"></em></span>
                                                                        <span class="nk-menu-text">Código: <?php echo $fila['codigo_producto']; ?></span>
                                                                    </a>
                                                                </li>
                                                                <li class="nk-menu-item">
                                                                    <a href="#" class="nk-menu-link">
                                                                        <span class="nk-menu-icon"><em class="icon ni ni-id-card"></em></span>
                                                                        <span class="nk-menu-text">ID: <?php echo $fila['id_producto']; ?></span>
                                                                    </a>
                                                                </li>
                                                                <li class="nk-menu-item">
                                                                    <a href="#" class="nk-menu-link">
                                                                        <span class="nk-menu-icon"><em class="icon ni ni-money"></em></span>
                                                                        <span class="nk-menu-text">Precio: $<?php echo $fila['precio_producto']; ?></span>
                                                                    </a>
                                                                </li>
                                                                <li class="nk-menu-item">
                                                                    <a href="#" class="nk-menu-link">
                                                                        <span class="nk-menu-icon"><em class="icon ni ni-box"></em></span>
                                                                        <span class="nk-menu-text">Stock disponible: <?php echo $fila['stock']; ?></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        <?php endforeach; ?>
                                                        <form action="html/pages/PROYECTO/detallesProducto.php?p=<?php echo($fila['id_producto']);?>&t=<?php echo($id_tienda);?>" method="POST">
                                                        
                                                            <ul class="list-plain">
                                                                <li>
                                                                <span>Referencia</span><br>
                                                                <input type="text" class="form-control" name="referencia" aria-required="true">
                                                                </li>
                                                                <li>
                                                                <span>Unidades</span><br>
                                                                <input type="text" class="form-control" name="unidades" aria-required="true">
                                                                </li>
                                                            </ul>
                                                            <div class="nk-fmg-actions">
                                                                <br>
                                                                <ul class="nk-block-tools g-3">
                                                                <li>
                                                                    <button type="submit" name="accion" value="agregó" class="btn btn-light">
                                                                    <em class="icon ni ni-plus"></em>
                                                                    <span>Agregar stock</span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button type="submit" name="accion" value="vendió" class="btn btn-primary">
                                                                    <em class="icon ni ni-trash"></em>
                                                                    <span>Eliminar stock</span>
                                                                    </button>
                                                                </li>
                                                                </ul>
                                                            </div>
                                                        </form>
                                                    </div><!-- .product-info -->
                                                </div><!-- .col -->
                                            </div><!-- .row -->
                                            
                                        </div>
                                    </div>
                                </div><!-- .nk-block -->
                                <div class="nk-block nk-block-lg">
                                    <div class="nk-block-head">
                                        <div class="nk-block-between g-3">
                                            <div class="nk-block-head-content">
                                                <h3 class="nk-block-title page-title">Historial</h3>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-wrap ">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview wide-md mx-auto">
                                    
                                   <!--TABLA DE -->
                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content" style="display: flex; align-items: center;">
                                                
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="true">
                                                    <thead>
                                                        
                                                        <tr class="nk-tb-item nk-tb-head">
                                                            
                                                            <th class="nk-tb-col nk-tb-col-check">
                                                                
                                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                    <input type="checkbox" class="custom-control-input" id="uid">
                                                                    <label class="custom-control-label" for="uid"></label>
                                                                    
                                                                </div>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Fecha</span></th>
                                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Nota</span></th>
                                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Referencia</span></th>
                                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Cantidad</span></th>
                                                            
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($tablaProductos as $f): ?>
                                                        <tr class="nk-tb-item">
                                                            <td class="nk-tb-col nk-tb-col-check">
                                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                    <input type="checkbox" class="custom-control-input" id="uid1">
                                                                    <label class="custom-control-label" for="uid1"></label>
                                                                </div>
                                                            </td>
                                                            
                                                            <td class="nk-tb-col tb-col-mb" >
                                                                <span class="tb-odr-id"><?php echo $f['fecha']; ?></span> <!--FECHA-->
                                                            </td>
                                                            <td class="nk-tb-col tb-col-lg">
                                                                <span class="tb-odr-info"><?php echo $f['nota']; ?></span> <!--NOTA-->
                                                            </td>
                                                            
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span class="tb-odr-amount"><?php echo $f['referencia']; ?></span> <!--REFERENCIA-->
                                                            </td>
                                                            
                                                            <td class="nk-tb-col tb-col-lg">
                                                                <span class="tb-odr-amount"><?php echo $f['cantidad']; ?></span> <!--CANTIDAD-->
                                                            </td>
                                                            
                                                            
                                                        </tr><!-- .nk-tb-item  -->
                                                        <?php endforeach; ?>
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
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
   
    <!-- JavaScript -->
    <script src="./assets/js/bundle.js?ver=3.1.3"></script>
    <script src="./assets/js/scripts.js?ver=3.1.3"></script>
    <script src="./assets/js/example-sweetalert.js?ver=3.1.3"></script>
    
</body>

</html>