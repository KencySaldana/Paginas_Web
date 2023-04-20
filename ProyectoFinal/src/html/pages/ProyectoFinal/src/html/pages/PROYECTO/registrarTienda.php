<!-- /* script PHP que verifica si el usuario tiene los permisos necesarios para
acceder a una página determinada. Si el usuario no está autorizado, se le redirige a la página de
inicio de sesión. También verifica si se han enviado los datos del formulario para agregar una nueva
tienda y llama a la función "addTienda" para agregar la nueva tienda a la base de datos. Si no se
envían los datos del formulario, muestra un mensaje de error. */ -->
<?php
    
    require_once("dist/database/database_utilities.php");
    //verificar la existencia de la variable de sesión "tipoUsuario"
    session_start();
    if(isset($_SESSION['tipoUsuario'])){
        if($_SESSION['tipoUsuario'] != 'superAdmin'){
            // Si el valor de la variable de sesión no coincide con los permisos necesarios, redirigir al usuario a la página de inicio de sesión.
            header('location: login.php');
            exit();
        }
    }else{
        header('location: login.php');
        exit();
    }
   
    //Se verifica si los datos fueron tomados
    if(isset($_POST['nombreTienda'])&& isset($_POST['estado'])) { 
            addTienda($_POST['nombreTienda'],$_POST['estado']);
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
    <title>Registrar tienda</title>
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
                                                            <h4 class="card-title">Registrar tienda</h4>
                                                        </div>
                                                        <!-- /* formulario con campos de entrada para el nombre de una
                                                        tienda y un grupo de botones de opción para seleccionar el estado de la tienda (activa o
                                                        desactivada). El formulario está configurado para enviarse a un script PHP para registrar
                                                        la tienda. */ -->
                                                        <form method="POST" action="html/pages/PROYECTO/registrarTienda.php">
                                                            <div class="form-group">
                                                                <label class="form-label" for="nombreTienda">Nombre</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="nombreTienda" name="nombreTienda" aria-required="true"> <!-- /* campo de entrada para el nombre de la tienda */ -->
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                
                                                            <div class="form-control-wrap">
                                                                <ul class="custom-control-group g-3 align-center flex-wrap">
                                                                    <div class="col-md-3 col-sm-6">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio" id="activa" name="estado" value="1" class="custom-control-input"> <!-- /* grupo de botones de opción para seleccionar el estado de la tienda (activa o desactivada) */ -->
                                                                                <label class="custom-control-label" for="activa">Activa</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-6">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio" id="desactivada" name="estado" value="2" class="custom-control-input"> <!-- /* grupo de botones de opción para seleccionar el estado de la tienda (activa o desactivada) */ -->
                                                                                <label class="custom-control-label" for="desactivada">Desactivada</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </ul>
                                                            </div>

                                                            </div>

                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary">Registrar</button> <!-- /* botón para enviar el formulario */ -->
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
    <!-- /* script PHP que verifica si el usuario tiene los permisos necesarios para
acceder a una página y, de no ser así, lo redirige a la página de inicio de sesión. Luego recupera
la ID de una tienda de la URL y, si se establecen ciertas variables POST, agrega un nuevo producto
al inventario de la tienda usando una función de un archivo database_utilities.php separado. También
agrega un registro del cambio al inventario de la tienda. Finalmente, recupera una lista de
categorías activas para la tienda. */ -->
    <script>
        $('form').on('submit', function (e) {
    // Prevent form submission
    e.preventDefault();
    // Check if all required fields are completed
    var valid = true;
    var typeAlert = false;
    $(this).find('[required],[aria-required="true"]').each(function () {
        if ($(this).val() === '') {
            valid = false;
            return false;
        }
    });
    // Check if at least one radio button is selected
    var radioButtons = $(this).find('input[type="radio"]');
    if (radioButtons.length > 0) {
        var radioChecked = false;
        radioButtons.each(function() {
            if ($(this).prop('checked')) {
                radioChecked = true;
                return false;
            }
        });
        if (!radioChecked) {
            valid = false;
        }
    }

    <?php 
        $arrayPhp = mostrarTiendas(); 
        $jsonArray = json_encode($arrayPhp); 
        ?>

        const array = <?php echo $jsonArray; ?>; 
        const tienda = document.getElementById('nombreTienda').value;
        if (array.find(nomTienda => nomTienda.nombre == tienda)){
            valid = false;
            typeAlert = true;
        };
    // If all required fields are completed and at least one radio button is selected, show SweetAlert
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
            Swal.fire("¡ERROR!", "La tienda ya existe", "error");
        }else{
            // Show error modal if not all required fields are completed or no radio button is selected
            Swal.fire("¡ERROR!", "Por favor ingresa datos válidos", "error"); 
        }
    
    }
});

    </script>
</body>

</html>