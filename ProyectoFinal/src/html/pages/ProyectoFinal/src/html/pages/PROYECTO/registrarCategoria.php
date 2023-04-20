<!-- /*script PHP que verifica si el usuario tiene los permisos necesarios para
acceder a una página determinada. Si el usuario no tiene los permisos necesarios, se le redirige a
la página de inicio de sesión. El script también agrega una nueva categoría a una tienda específica
si los datos requeridos se proporcionan a través de un formulario. Se llama a la función addCambio
para agregar un registro del cambio realizado a la tienda. */ -->
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

    if (isset($_GET['t'])){
        $id_tienda = $_GET['t'];
    }
    //Se verifica si los datos fueron tomados
    if(isset($_POST['nombreCategoria'])&& isset($_POST['descripcionCategoria'])) {  
        addCambio($id_tienda);
        addCategoria($_POST['nombreCategoria'],$_POST['descripcionCategoria'], $id_tienda);
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

                    </div>
                </div><!-- .nk-sidebar-element -->
                <!-- Se está creando un menú de barra lateral para una aplicación web con
                enlaces a diferentes páginas, como tablero, categorías, inventario, usuarios   -->
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
                                                        <!-- /* El código anterior es un formulario HTML que usa PHP para pasar una variable () a través de la URL a un script PHP
                                                        (registrarCategoria.php) cuando se envía el formulario. El formulario tiene tres campos de entrada: "nombreCategoria" para el nombre
                                                        de la categoría, "descripcionCategoria" para la descripción de la categoría y un botón de envío para registrar la categoría. */ -->
                                                        <form method="POST" action="html/pages/PROYECTO/registrarCategoria.php?t=<?php echo($id_tienda);?>"> 
                                                            <div class="form-group">
                                                                <label class="form-label" for="nombreCategoria">Nombre</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="nombreCategoria" name="nombreCategoria" aria-required="true"> <!-- /* campo de entrada de texto para el nombre de la categoría. */ -->
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="descripcionCategoria">Descripción</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="descripcionCategoria" name="descripcionCategoria" aria-required="true"> <!-- /*campo de entrada de texto para la descripción de la categoría. */ -->
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                 <button type="submit" class="btn btn-lg btn-primary">Registrar</button> <!-- /* botón de envío para registrar la categoría. */ -->
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
    <!-- /* El script maneja el evento de envío de formulario y evita el comportamiento de envío de
    formulario predeterminado. Luego verifica si todos los campos obligatorios están completos y
    valida las credenciales del usuario comparándolas con los datos recuperados de la base de datos.
    Si las credenciales son válidas, se envía el formulario. De lo contrario, muestra un mensaje de
    error utilizando la biblioteca SweetAlert. */ -->
    <script>
        $('form').on('submit', function (e) {
        // Prevent form submission
        e.preventDefault();
        // Check if all required fields are completed
        var valid = true;
        var typeAlert = false;
        $(this).find('[required],[aria-required="true"]').each(function ( ) {
            if ($(this).val() === '') {
            valid = false;
            return false;
            }
        });
        <?php 
            $arrayPhp = mostrarcategorias($id_tienda); 
            $jsonArray = json_encode($arrayPhp); 
        ?>

        const array = <?php echo $jsonArray; ?>; 
        const nombre = document.getElementById('nombreCategoria').value;
        if (array.find(categoria => (categoria.nombre_categoria == nombre))){
            valid = false;
            typeAlert = true;
            
        };
        // If all required fields are completed and at least one radio button is selected, submit the form
        if (valid) {
            Swal.fire({
            title: "¡REGISTRO EXITOSO!",
            text: "Datos agregados a la base de datos",
            icon: "success",
            timer: 800, // Time in milliseconds before automatically close the SweetAlert
            showConfirmButton: false // Hide the "OK" button
        });
        // Wait 3 seconds before submitting the form
        setTimeout(() => {
            this.submit();
        }, 800);
        } else {
            if (typeAlert==true){
                Swal.fire("¡ERROR!", "La categoria ya existe", "error");
            }else{
                // Show error modal if not all required fields are completed or no radio button is selected
                Swal.fire("¡ERROR!", "Por favor ingresa datos válidos", "error");
            }
        }
        });

    </script>
</body>

</html>