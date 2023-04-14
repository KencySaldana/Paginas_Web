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

    if(isset($_GET["us"]) && isset($_GET["dl"])){
        $idUsuario = $_GET["us"];
        $delete = $_GET["dl"];
        if ($delete){
            deleteUsuario($idUsuario);
        };
        deleteUsuario($idUsuario);
    };
    $r = mostrarUsuarios($id_tienda);
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
    <title>Tablas</title>
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
                <!-- Se está creando un menú de barra lateral para una aplicación web con
                enlaces a diferentes páginas, como tablero, categorías, inventario, usuarios, ventas
                realizadas e historial de ventas.   -->
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
                                        <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
                                        <span class="nk-menu-text">Dashboard</span>
                                    </a>
                                </li>
                                <!-- enlace a categorias -->
                                <li class="nk-menu-item">
                                    <a href="html/pages/PROYECTO/tablaCategorias.php?t=<?php echo($id_tienda);?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
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
                                <!-- enlace a realizar venta -->
                                <li class="nk-menu-item">
                                    <a href="html/pages/PROYECTO/realizarVenta.php?t=<?php echo($id_tienda);?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
                                        <span class="nk-menu-text">Realizar venta</span>
                                    </a>
                                </li>
                                <!-- enlace historial de ventas -->

                                <li class="nk-menu-item">
                                    <a href="html/pages/PROYECTO/tablaHistorialVentas.php?t=<?php echo($id_tienda);?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
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
                                                   
                                                    <div class="user-status">SuperAdmin</div>  <!--TIPO DE USUARIO-->
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
                                <div class="components-preview wide-md mx-auto">     
                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Usuarios Registrados</h4>
                                            </div>
                                        </div>
                                        <?php if(!$r){ ?> 
                                            <center>
                                                <h2>NO HAY REGISTROS</h2>
                                                <a  href="html/pages/PROYECTO/registrarUsuario.php?t=<?php echo($id_tienda);?>"><button class="btn btn-lg btn-primary btn-block">Agregar Usuario</button></a>
                                            </center>
                                        <?php }else{ ?> 
                                        <div class="card card-bordered card-preview">
                                        <br>
                                            <div style="width: 900px; padding-left: 700px;">
                                                <a  href="html/pages/PROYECTO/registrarUsuario.php?t=<?php echo($id_tienda);?>"><button class="btn btn-lg btn-primary btn-block">Agregar Usuario</button></a>
                                            </div>
                                            <br>
                                            <table class="table table-orders">
                                                <thead class="tb-odr-head">
                                                    <tr class="tb-odr-item">
                                                        <th class="tb-odr-info">
                                                            <span class="tb-odr-id">ID</span>
                                                            <span class="tb-odr-date d-none d-md-inline-block">Nombre</span>
                                                        </th>
                                                        <th class="tb-odr-amount">
                                                            <span class="tb-odr-date d-none d-md-inline-block">Apellido</span>
                                                        </th>
                                                        <th class="tb-odr-amount">
                                                            <span class="tb-odr-date d-none d-md-inline-block">Usuario</span>
                                                        </th>
                                                        <th class="tb-odr-amount">
                                                            <span class="tb-odr-date d-none d-md-inline-block">Email</span>
                                                        </th>
                                                        <th class="tb-odr-amount">
                                                            <span class="tb-odr-date d-none d-md-inline-block">Fecha Agregado</span>
                                                        </th>
                                                        <th class="tb-odr-action">&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tb-odr-body">
                                                    <?php foreach ($r as $fila): ?>
                                                        <tr class="tb-odr-item">
                                                            <td class="tb-odr-info">
                                                                <span class="tb-odr-id"><a href="#"><?php echo $fila['user_id']; ?></a></span>
                                                                <span class="tb-odr-date"><?php echo $fila['nombre']; ?></span>
                                                            </td>   
                                                        <td class="tb-odr-amount"> 
                                                        <span class="tb-odr-status">
                                                            <span class="tb-odr-date"><?php echo $fila['apellido']; ?></span>
                                                        </span>
                                                        </td>
                                                        <td class="tb-odr-amount"> 
                                                        <span class="tb-odr-status">
                                                            <span class="tb-odr-date"><?php echo $fila['user_name']; ?></span>
                                                        </span>
                                                        </td>
                                                        <td class="tb-odr-amount"> 
                                                        <span class="tb-odr-status">
                                                            <span class="tb-odr-date"><?php echo $fila['email']; ?></span>
                                                        </span>
                                                        </td>
                                                        <td class="tb-odr-amount"> 
                                                        <span class="tb-odr-status">
                                                            <span class="tb-odr-date"><?php echo $fila['date_add']; ?></span>
                                                        </span>
                                                        </td>
                                                        <td class="tb-odr-action">
                                                            <div class="dropdown">
                                                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" data-offset="-8,0"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                                    <ul class="link-list-plain">
                                                                        <li><a href="html/pages/PROYECTO/editarUsuario.php?us=<?php echo($fila['user_id']);?>&t=<?php echo($id_tienda);?>" class="text-primary">Editar</a></li> <!--href-->
                                                                        
                                                                        <li><a onclick="showModal(<?php echo($fila['user_id']);?>,<?php echo($id_tienda);?>)"class="text-danger">Remover</a></li>
                                                                        
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        </tr>               
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div><!-- .card-preview -->
                                        <?php }?> 
                                    </div><!-- nk-block -->
                                    
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
                            <div class="nk-footer-copyright"> &copy; 2023 SYSTEMKY <a href="https://softnio.com" target="_blank">Softnio</a>
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

     <!-- select region modal -->
     <div class="modal fade" tabindex="-1" role="dialog" id="region">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmación</h4>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                        <center>
                            <h5>¿Está seguro que desea eliminar el usuario?</h5>
                        </center>
                </div>
                <div class="modal-footer ">
                        <li class="preview-btn-item">
                            <a class="btn btn-outline-danger" id="btn">Eliminar</a></li>
                    </div>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->
    
    <!-- JavaScript -->
    <script src="./assets/js/bundle.js?ver=3.1.3"></script>
    <script src="./assets/js/scripts.js?ver=3.1.3"></script>
    <script> 
        function showModal(id_user, id_tienda) {
            $('#region').modal('show');
            const btnEliminar = document.querySelector('#btn');

            btnEliminar.addEventListener('click', (e)=>{
                window.open("html/pages/PROYECTO/tablaUsuario.php?us=" + id + "&dl=1"+ "&t="+ id_tienda);
            });

        };
        
    </script>
</body>

</html>