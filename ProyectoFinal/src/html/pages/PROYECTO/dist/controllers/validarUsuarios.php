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
        header('location: hola.html');
    } else {
        // El usuario y/o contraseña son inválidos, mostrar un mensaje de error
        echo "<script>
                $(document).ready(function(){
                $('#modal-dialog').modal('show');
                });
            </script>";
    };
}else{
    echo 'Error en obtencion de datos';
};
?>