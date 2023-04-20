<!-- /* script PHP que verifica si el usuario tiene los permisos necesarios para
acceder a una página determinada. Si el usuario no tiene los permisos necesarios, se le redirige a
la página de inicio de sesión. El script también recupera la información del usuario de la base de
datos según el nombre de usuario y el ID de la tienda proporcionados. Si el script recibe una
solicitud POST con información actualizada del usuario, actualiza la información del usuario en la
base de datos y agrega una entrada de registro de cambios para la tienda. */ -->
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

$user = $_GET["us"];
$id_tienda = $_GET["t"];
$usuario = obtenerUsuario($user);

//Se verifica si los datos fueron tomados
if(isset($_POST['nombre'])&& isset($_POST['apellido'])&& isset($_POST['usuario'])&& isset($_POST['email'])&& isset($_POST['password'])){
    addCambio($id_tienda);
    updateUsuario($_POST['nombre'],$_POST['apellido'],$_POST['usuario'],$_POST['password'],$_POST['email'],$user);
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
    <title>Editar Usuario</title>
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
                                                            <h4 class="card-title">Editar Usuario</h4>
                                                        </div>
                                                        <!-- /* formulario HTML escrito en PHP que permite al usuario editar
                                                        su información personal, como nombre, apellido, nombre de usuario, correo
                                                        electrónico y contraseña. El formulario se envía a un script PHP ubicado en
                                                        "html/pages/PROYECTO/editarUsuario.php" con el ID del usuario y el ID de la tienda como
                                                        parámetros. Tras el envío, los datos del formulario se envían al script PHP para
                                                        procesar y actualizar la información del usuario en la base de datos. */ -->
                                                        <form method="POST" action="html/pages/PROYECTO/editarUsuario.php?us=<?php echo($user);?>&t=<?php echo($id_tienda);?>"> 
                                                        <div class="row g-4">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="nombre">Nombre</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id = "nombre" name="nombre" value="<?php echo $usuario['nombre'];?>" aria-required="true"> <!-- Se muestra el nombre del usuario en el campo de texto -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="apellido">Apellido</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $usuario['apellido'];?>" aria-required="true"> <!-- Se muestra el apellido del usuario en el campo de texto -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="phone-no-1">Usuario</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario['user_name'];?>" aria-required="true">   <!-- Se muestra el nombre de usuario del usuario en el campo de texto -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="email">Email</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $usuario['email'];?>" aria-required="true"> <!-- Se muestra el correo electrónico del usuario en el campo de texto -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <!-- /* se está creando un campo de entrada de contraseña en un formulario con una etiqueta
                                                                "Contraseña" y una identificación y nombre de "contraseña". También tiene un atributo requerido por aria
                                                                establecido en verdadero para fines de accesibilidad. */ -->
                                                                <div class="form-group">
                                                                    <label class="form-label" for="password">Password</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="password" class="form-control" id="password" name="password" aria-required="true"> <!-- Se muestra la contraseña del usuario en el campo de texto -->
                                                                    </div>
                                                                </div>
                                                            </div>                                                          
                                                            <div class="col-12">
                                                        
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary">Actualizar</button>    <!-- Botón de envío del formulario -->
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
    <!-- /*  script de JavaScript que se activa cuando se envía un formulario.
    Comprueba si todos los campos obligatorios están completos y si al menos un botón de opción está
    seleccionado. Si se completan todos los campos obligatorios y se selecciona al menos un botón de
    radio, envía el formulario y muestra un mensaje de éxito utilizando la biblioteca SweetAlert. Si
    no se completan todos los campos obligatorios o no se selecciona ningún botón de opción, se
    muestra un mensaje de error utilizando la biblioteca SweetAlert. Además, verifica si el correo
    electrónico o el nombre de usuario ya existe en la base de datos y muestra un mensaje de error
    si existe. El código PHP en el script recupera todos */ -->
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
        <?php 
            $arrayPhp = mostrarUsuariosAll(); 
            $jsonArray = json_encode($arrayPhp); 
        ?>

        const array = <?php echo $jsonArray; ?>; 
        const correo = document.getElementById('email').value;
        const user_name = document.getElementById('usuario').value;
        if (array.find(usuario => (usuario.email == correo || usuario.user_name == user_name) && usuario.user_id != <?php echo($user) ?>)){
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
                Swal.fire("¡ERROR!", "El usuario ya existe", "error");
            }else{
                // Show error modal if not all required fields are completed or no radio button is selected
                Swal.fire("¡ERROR!", "Por favor ingresa datos válidos", "error");
            }
        }
        });

    </script>
</body>

</html>