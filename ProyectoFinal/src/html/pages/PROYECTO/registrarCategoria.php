<?php
    
    require_once("dist/database/database_utilities.php");

    $id = $_GET['t'];

    //Se verifica si los datos fueron tomados
    if(isset($_POST['nombreCategoria'])&& isset($_POST['descripcionCategoria'])) {  
        
        addCategoria($_POST['nombreCategoria'],$_POST['descripcionCategoria'], $id);
        //header("location: registro_productos.php");
    }else{
        echo 'ERROR';
    };

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
    <title>Registrar categoría</title>
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
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/crm/index.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
                                        <span class="nk-menu-text">CRM Panel</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview wide-md mx-auto">
       
                                    <div class="nk-block nk-block-lg">
                                        <div class="row g-gs">
                                            <div class="col-lg-12">
                                                <div class="card card-bordered h-100">
                                                    <div class="card-inner">
                                                        <div class="card-head">
                                                            <h4 class="card-title">Registrar categoría</h4>
                                                        </div>
                                                        <form method="POST" action="html/pages/PROYECTO/registrarCategoria.php">
                                                            <div class="form-group">
                                                                <label class="form-label" for="nombreCategoria">Nombre</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="nombreCategoria" name="nombreCategoria">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="descripcionCategoria">Descripción</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="descripcionCategoria" name="descripcionCategoria">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary">Registrar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div><!-- .nk-block -->
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