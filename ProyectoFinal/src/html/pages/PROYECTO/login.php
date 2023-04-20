<!-- /* código PHP que maneja la funcionalidad de inicio de sesión de una aplicación
web. Primero incluye un archivo de utilidad de base de datos, define algunas constantes para un
usuario superadministrador y luego verifica si el usuario ha enviado sus credenciales de inicio de
sesión a través de una solicitud POST. Si las credenciales son válidas, crea una variable de sesión
y redirige al usuario a la página del panel correspondiente. Si las credenciales no son válidas, no
crea una variable de sesión y el usuario permanece en la página de inicio de sesión. */ -->
<?php
require_once("dist/database/database_utilities.php");
// Añadir superUsuarios
define('SUPERADMIN', 'admin@upv.mx');
define('PASS', 'admin');
define('NAME', 'Kency Saldaña');

// Recuperar las credenciales ingresadas por el usuario
if(isset($_POST['password']) && isset($_POST['correo'])){
    $username = $_POST['correo'];
    $password = $_POST['password'];
    
    // Validar el usuario y contraseña
    if ($username == SUPERADMIN && $password == PASS){       
        // El usuario y contraseña son válidos, crear variable de sesión y redirigir al dashboard de superAdmin
        session_start();
        $_SESSION['tipoUsuario'] = 'superAdmin';
        $_SESSION['usuario'] = NAME;
        header('location: tablaTienda.php');
    } else {
        if (validarUsuario($username, $password)){
            $id_tienda = obtenerIdTienda($username);
            // El usuario y contraseña son válidos, crear variable de sesión y redirigir al dashboard de adminTienda
            session_start();
            $_SESSION['tipoUsuario'] = 'adminTienda';
            $_SESSION['usuario'] = $username;
            header('location: dashboard.php?t='.$id_tienda);
        }           
        };
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
                                <!-- /* formulario HTML que permite al usuario ingresar su correo electrónico y contraseña para iniciar sesión en la aplicación web.
                                El formulario utiliza el método POST para enviar los datos al  archivo "login.php" en el directorio "html/pages/PROYECTO". El
                                formulario incluye dos campos de entrada, uno para el correo electrónico y otro para la contraseña, y un botón de envío. Cuando
                                el usuario hace clic en el botón Enviar, los datos del formulario se envían al servidor para su procesamiento. */ -->
                                <form method="POST" action="html/pages/PROYECTO/login.php">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="correo">Email</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" name="correo" id="correo" placeholder="Ingresa tu correo" aria-required="true"> <!-- /* El atributo name="correo" se utiliza para identificar el campo de entrada en el archivo "login.php" */ -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Contraseña</label>                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password"> <!-- /* El atributo data-target="password" se utiliza para identificar el campo de entrada en el archivo "login.php" */ -->
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Ingresa tu contraseña" aria-required="true"> <!-- /* El atributo name="password" se utiliza para identificar el campo de entrada en el archivo "login.php" */ -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnSignIn">Sign in</button> <!-- /* El atributo name="btnSignIn" se utiliza para identificar el botón de envío en el archivo "login.php" */ -->
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
                                        <p class="text-soft">&copy; Kency Marisol Saldana Martinez & Yanel Azucena Mireles Sena. All Rights Reserved.</p>
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
    <script src="./assets/js/scripts.js?ver=3.1.3"></script>
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
        var valid = false;
        
        $(this).find('[required],[aria-required="true"]').each(function () {
            if ($(this).val() === '') {
                valid = false;
                return false;
            }
        });
        
        
        <?php 
            $arrayPhp = mostrarUsuariosAll(); 
            $jsonArray = json_encode($arrayPhp); 
            $arrayTienda = obtenerTienda($id_tienda); 
            $jsonArrayTienda = json_encode($arrayTienda); 
        ?>

        const array = <?php echo $jsonArray; ?>; 
        const arrayTienda = <?php echo $jsonArrayTienda; ?>; 
        const correo = document.getElementById('correo').value;
        const pass = document.getElementById('password').value;
        if (array.find(usuario => (usuario.email == correo || usuario.user_name==correo ) && usuario.user_password_hash == pass)){
            valid = true;

            if (arrayTienda.find(tienda => (tienda.activa == 2))){
                valid = false;
            }
            
        }else if (correo=='admin@upv.mx' && pass=='admin'){
            valid = true;
            if (arrayTienda.find(tienda => (tienda.activa == 2))){
                valid = false;
            }
        }

        // If all required fields are completed and at least one radio button is selected, show SweetAlert
        if (!valid) {
            Swal.fire("¡ERROR!", "Credenciales incorrectas", "error");
            // Wait 3 seconds before submitting the form
        }else{
            this.submit();
        }
    });

    </script>

</html>