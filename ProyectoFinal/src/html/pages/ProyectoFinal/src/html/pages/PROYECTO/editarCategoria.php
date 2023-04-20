<!-- /* El código anterior es un script PHP que incluye un archivo de database_utilities y verifica
si el usuario tiene los permisos necesarios para acceder a la página. A continuación, recupera el ID
de categoría y el ID de tienda de los parámetros de URL y obtiene la información de categoría de la
base de datos utilizando el ID de categoría. Si el script recibe datos POST para actualizar el
nombre y la descripción de la categoría, agrega un cambio al registro de cambios de la tienda y
actualiza la información de la categoría en la base de datos. De lo contrario, emite un mensaje de
error. */ -->
<?php

    include_once('dist/database/database_utilities.php');

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

    $id_categoria = $_GET["c"];
    $id_tienda = $_GET["t"];

    $categoria = obtenerCategoria($id_categoria);

    //Se verifica si los datos fueron tomados
    if(isset($_POST['nombreCategoria'])&& isset($_POST['descripcionCategoria'])) {
        addCambio($id_tienda);
        updateCategoria($_POST['nombreCategoria'],$_POST['descripcionCategoria'], $id_categoria);
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
    <title>Editar Categoria</title>
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
                enlaces a diferentes páginas, como tablero, categorías, inventario, usuarios.   -->
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
                                                            <h4 class="card-title">Editar categoria</h4>
                                                        </div>
                                                        <!-- /* formulario PHP que permite al usuario editar una categoría en
                                                        un proyecto. El formulario envía una  solicitud POST al archivo
                                                        "editarCategoria.php" con el ID de categoría y el ID de tienda como parámetros. El
                                                        formulario incluye campos de entrada para el nombre y la descripción de la categoría, y
                                                        un botón de envío para actualizar la categoría. */ -->
                                                        <form method="POST" action="html/pages/PROYECTO/editarCategoria.php?c=<?php echo($id_categoria);?>&t=<?php echo($id_tienda);?>">
                                                            <div class="form-group">
                                                                <label class="form-label" for="nombreCategoria">Nombre</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="nombreCategoria" name="nombreCategoria" value="<?php echo $categoria['nombre_categoria'];?>" aria-required="true"> <!-- /* se muestra el nombre de la categoría en el campo de entrada */ -->
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="descripcionCategoria">Descripción</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="descripcionCategoria" name="descripcionCategoria" value="<?php echo $categoria['descripcion_categoria'];?>" aria-required="true"> <!-- /* se muestra la descripción de la categoría en el campo de entrada */ -->
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary">Actualizar</button> <!-- /* botón de envío para actualizar la categoría */ -->
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
    <!-- /* script de JavaScript que maneja el evento de envío de formulario.
    Comprueba si todos los campos obligatorios están completos y si ya existe una categoría con el
    mismo nombre en la base de datos. Si se completan todos los campos obligatorios y el nombre de
    la categoría es único, muestra un mensaje de éxito y envía el formulario después de un retraso.
    Si no se completan todos los campos obligatorios o el nombre de la categoría ya existe, muestra
    un mensaje de error.incluye código PHP para recuperar categorías de la base
    de datos y codificarlas como una matriz JSON. */ -->
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
        if (array.find(categoria => (categoria.nombre_categoria == nombre)&& categoria.id_categoria != <?php echo($categoria) ?>)){
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