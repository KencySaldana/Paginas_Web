<?php
    require_once("dist/database/database_utilities.php");
    
    //verificar la existencia de la variable de sesión "tipoUsuario"
    session_start();
    if(isset($_SESSION['tipoUsuario'])){
        if($_SESSION['tipoUsuario'] != 'superAdmin'){
            // Si el valor de la variable de sesión no coincide con los permisos necesarios, redirigir al usuario a una página de error o a la página de inicio de sesión.
            header('location: login.php');
            exit();
        }
    }else{
        header('location: login.php');
        exit();
    }
   
    // Si el usuario tiene los permisos necesarios, mostrar el contenido de la página. 
    if(isset($_GET["t"]) && isset($_GET["dl"])){
        $id_tienda = $_GET["t"];
        $delete = $_GET["dl"];
        if ($delete){
            deleteTienda($id_tienda);
        };

    };
    $r = mostrarTiendas();

    $user = $_SESSION['usuario'];

    $password = 'admin';

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
    <title>Tiendas</title>
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
                        
                    </div>
                </div><!-- .nk-sidebar-element -->
                <!-- Se está creando un menú de barra lateral para una aplicación web con el enlace a tiendas   -->
                <div class="nk-sidebar-element nk-sidebar-body">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">ADMINISTRADOR ROOT</h6>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/pages/PROYECTO/tablaTienda.php" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
                                        <span class="nk-menu-text">Tiendas</span>
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
                                                    <div class="user-name dropdown-indicator">Kency Saldaña</div> <!--NOMBRE DE USUARIO-->
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
                                                        <span class="lead-text">KencySaldana</span> <!--NOMBRE DE USUARIO-->
                                                        <span class="sub-text">Kencysaldana@gmail.com</span> <!--CORREO-->
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="html/pages/PROYECTO/login.php"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li> <!--CERRAR SESION-->
                                                    
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
                                                <h4 class="nk-block-title">Tiendas Registradas</h4>
                                            </div>
                                        </div>
                                        <?php if(!$r){ ?> 
                                            <center>
                                                <h2>NO HAY REGISTROS</h2>
                                                <a  href="html/pages/PROYECTO/registrarTienda.php"><button class="btn btn-lg btn-primary btn-block" name="btnSignIn">Agregar Tienda</button></a>
                                            </center>
                                        <?php }else{ ?> 
                                        <div class="card card-bordered card-preview">
                                            <br>
                                            <div style="width: 900px; padding-left: 700px;">
                                                <a  href="html/pages/PROYECTO/registrarTienda.php"><button class="btn btn-lg btn-primary btn-block" name="btnSignIn">Agregar Tienda</button></a>
                                            </div>
                                            <br>
                                            <!-- /* tabla con información sobre las tiendas. Utiliza PHP para recorrer una serie
                                            de datos de la tienda y mostrar la ID, el nombre y el estado de cada tienda en una fila de la tabla. También
                                            incluye botones para editar o eliminar cada tienda, así como un botón para ingresar al panel de control de cada
                                            tienda. */ -->
                                            <table class="table table-orders">
                                                <thead class="tb-odr-head">
                                                    <tr class="tb-odr-item">
                                                        <th class="tb-odr-info">
                                                            <span class="tb-odr-id">ID</span>
                                                            <span class="tb-odr-date d-none d-md-inline-block">Nombre</span>
                                                        </th>
                                                        <th class="tb-odr-amount">
                                                            
                                                            <span class="tb-odr-status d-none d-md-inline-block">Estatus</span>
                                                        </th>
                                                        <th class="tb-odr-action">&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <!-- /* El código anterior es un script PHP que genera una tabla con información sobre las tiendas. Recorre una
                                                matriz de datos de la tienda y crea una fila para cada tienda con columnas para el ID, el nombre y el
                                                estado de la tienda. También incluye botones para editar o eliminar cada tienda, así como un botón
                                                para ingresar al tablero de la tienda. */ -->
                                                <tbody class="tb-odr-body">
                                                    <?php foreach ($r as $fila): ?>
                                                        <tr class="tb-odr-item">
                                                            <td class="tb-odr-info">
                                                                <span class="tb-odr-id"><a href="#"><?php echo $fila['id_tienda']; ?></a></span>
                                                                <span class="tb-odr-date"><?php echo $fila['nombre']; ?></span>
                                                            </td>   
                                                        <td class="tb-odr-amount"> 
                                                        <span class="tb-odr-status">
                                                                <?php if($fila['activa']==1){ ?>
                                                                    <span class="badge badge-dot bg-success"><?php echo 'Activa'; ?></span> <!--estatus ACTIVO-->
                                                                <?php }elseif($fila['activa']==2){ ?>
                                                                    <span class="badge badge-dot bg-danger"><?php echo 'Desactivada'; ?></span> <!--estatus DESACTIVADO-->
                                                                <?php } ?>
                                                            </span>
                                                        </td>
                                                        <td class="tb-odr-action">
                                                            <div class="tb-odr-btns d-none d-md-inline">
                                                                <a href="html/pages/PROYECTO/dashboard.php?t=<?php echo($fila['id_tienda']);?>" class="btn btn-sm btn-primary">Ingresar</a> <!--href ingresar-->
                                                            </div>
                                                            <div class="dropdown">
                                                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" data-offset="-8,0"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                                    <ul class="link-list-plain">
                                                                        <li><a href="html/pages/PROYECTO/editarTienda.php?t=<?php echo($fila['id_tienda']);?>" class="text-primary">Editar</a></li> <!--href-->
                                                                        
                                                                        <li><a onclick="showModal(<?php echo($fila['id_tienda']);?>)"class="text-danger">Remover</a></li>
                                                                        
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
                
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->

     <!-- select region modal -->
      <!-- /* modal con un mensaje de confirmación y un campo de
     entrada de contraseña. También incluye un botón para eliminar una categoría y un mensaje de
     advertencia si la contraseña es incorrecta. El modal se desencadena por un evento externo y se
     utiliza para confirmar la eliminación de una categoría. */ -->
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
                            <h5>¿Está seguro que desea eliminar la tienda?</h5>
                            <br>
                            <label class="form-label" >Ingresa contraseña para validar:</label>
                            <input type="password" class="form-control" id ="pass" name="pass" style="width: 200px;">
                            <label class="form-label" id = "advertencia" style="color: red;"></label>
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
    <!-- /* función de JavaScript que muestra una ventana modal cuando se llama.
    También agrega un detector de eventos a un botón con la ID "btn" que verifica si la contraseña
    ingresada por el usuario coincide con una variable de PHP llamada "$ contraseña". Si las
    contraseñas coinciden, abre una nueva ventana con una URL que incluye el valor del parámetro
    "id" y un parámetro "dl" establecido en 1. Si las contraseñas no coinciden, muestra un mensaje
    en un elemento HTML con el identificación "advertencia". */ -->
    <script> 
        function showModal(id) {
            $('#region').modal('show');
            const btnEliminar = document.querySelector('#btn');

            btnEliminar.addEventListener('click', (e)=>{
                const contrasena = document.getElementById('pass').value;
                const contrasenaUsuario = '<?php echo $password ?>';
                if (contrasena == contrasenaUsuario){
                    window.open("html/pages/PROYECTO/tablaTienda.php?t=" + id + "&dl=1");
                }else{
                    let advertencia = document.getElementById('advertencia');
                    advertencia.innerHTML = "¡Datos incorrectos!";                   
                }
            });


        };
        
    </script>
</body>

</html>