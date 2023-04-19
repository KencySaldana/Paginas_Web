<?php

include_once('dist/database/database_utilities.php');

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

$id_tienda = $_GET["t"];

$r= obtenerTienda($id_tienda);

//Se verifica si los datos fueron tomados
if(isset($_POST['nombreTienda'])&& isset($_POST['estado'])) { 
    
    updateTienda($_POST['nombreTienda'],$_POST['estado'], $id_tienda);
    

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
    <title>Editar tienda</title>
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
                                                            <h4 class="card-title">Editar tienda</h4>
                                                        </div>
                                                        <form method="POST" action="html/pages/PROYECTO/editarTienda.php?t=<?php echo($id_tienda);?>">
                                                            <div class="form-group">
                                                                <label class="form-label" for="nombreTienda">Nombre</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" aria-required="true" id="nombreTienda" name="nombreTienda" placeholder="<?php echo $r['nombre'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                
                                                            <div class="form-control-wrap">
                                                                <ul class="custom-control-group g-3 align-center flex-wrap">
                                                                    <div class="col-md-3 col-sm-6">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio" id="activa" name="estado" value="1" class="custom-control-input">
                                                                                <label class="custom-control-label" for="activa">Activa</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-6">
                                                                        <div class="preview-block">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio" id="desactivada" name="estado" value="2" class="custom-control-input">
                                                                                <label class="custom-control-label" for="desactivada">Desactivada</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </ul>
                                                            </div>

                                                            </div>

                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary">Actualizar</button>
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
    <script>
        $('form').on('submit', function (e) {
        // Prevent form submission
        e.preventDefault();
        // Check if all required fields are completed
        var valid = true;
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
        // If all required fields are completed and at least one radio button is selected, show SweetAlert
        if (valid) {
            Swal.fire({
                title: "¡REGISTRO EXITOSO!",
                text: "Datos agregados a la base de datos",
                icon: "success",
                timer: 3000, // Time in milliseconds before automatically close the SweetAlert
                showConfirmButton: false // Hide the "OK" button
            });
            // Wait 3 seconds before submitting the form
            setTimeout(() => {
                this.submit();
            }, 3000);
        } else {
            // Show error modal if not all required fields are completed or no radio button is selected
            Swal.fire("¡ERROR!", "Por favor ingresa datos válidos", "error");
        }
    });

    </script>
</body>

</html>