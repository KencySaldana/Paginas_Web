<?php
// Añadir superUsuarios
define('SUPERADMIN', 'admin@upv.mx');
define('PASS', 'admin');

// Recuperar las credenciales ingresadas por el usuario
if(isset($_POST['password']) && isset($_POST['correo'])){
    $username = $_POST['correo'];
    $password = $_POST['password'];
    
    // Validar el usuario y contraseña
    if ($username == SUPERADMIN && $password == PASS){
        // El usuario y contraseña son válidos, redirigir a una página de bienvenida
        header('location: html/pages/PROYECTO/dashboard.php');
    } else {
        // El usuario y/o contraseña son inválidos, mostrar un mensaje de error
        echo "<script>
                $(document).ready((e)=>{
                    e.preventDefault();
                    $('.modal-dialog').modal('show');
                });
            </script>";
    };
}else{
    echo 'Error en obtencion de datos';
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
    <title>Login </title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=3.1.3">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=3.1.3">
</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <h2>SYSTEM KY</h2>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <!-- <h4 class="nk-block-title"></h4>
                                        <div class="nk-block-des">
                                            <p>Access the Dashlite panel using your email and passcode.</p>
                                        </div> -->
                                        
                                    </div>
                                </div>
                                <form method="POST" action="html/pages/PROYECTO/login.php">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="correo">Email</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" name="correo" id="correo" placeholder="Ingresa tu correo">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Contraseña</label>                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Ingresa tu contraseña">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnSignIn">Sign in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="row g-3">
                                <div class="col-lg-6 order-lg-last">
                                    <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Terms & Condition</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Privacy Policy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Help</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <div class="nk-block-content text-center text-lg-start">
                                        <p class="text-soft">&copy; 2023 Dashlite. All Rights Reserved.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="./assets/js/bundle.js?ver=3.1.3"></script>
    <script src="./assets/js/scripts.js?ver=3.1.3"></script>

    <!-- select region modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="region">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal Title</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a></div><div class="modal-body">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem similique earum necessitatibus nesciunt! Quia id expedita asperiores voluptatem odit quis fugit sapiente assumenda sunt voluptatibus atque facere autem, omnis explicabo.</p>
                    </div><div class="modal-footer bg-light">
                        <span class="sub-text">Modal Footer Text</span>
                    </div>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->

    <script src="dist/js/login.js"></script>

</html>