<!-- /* script PHP que verifica si el usuario tiene los permisos necesarios para
acceder a una página y, de no ser así, lo redirige a la página de inicio de sesión. Luego recupera
la ID de una tienda de la URL y, si se establecen ciertas variables POST, agrega un nuevo producto
al inventario de la tienda usando una función de un archivo database_utilities.php separado. También
agrega un registro del cambio al inventario de la tienda. Finalmente, recupera una lista de
categorías activas para la tienda. */ -->
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

    $id_tienda = $_GET['t'];
    //Se verifica si los datos fueron tomados
    if(isset($_POST['codigoProducto'])&& isset($_POST['nombreProducto'])&& isset($_POST['precioProducto'])&& isset($_POST['stockProducto'])){
        
        addCambio($id_tienda);
        addProducto($_POST['codigoProducto'],$_POST['nombreProducto'],$_POST['precioProducto'],$_POST['stockProducto'],$_POST['categoriaProducto'],$id_tienda);
        
    }else{
        echo 'ERROR';
    };
    $result = obtenerCategoriasActivas($id_tienda);
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
    <title>Registrar producto</title>
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
                                                            <h4 class="card-title">Registrar Producto</h4>
                                                        </div>
                                                        <!-- /*formulario HTML escrito en PHP que permite a un usuario registrar un nuevo producto para una tienda
                                                        específica. El formulario incluye campos para el código, nombre, precio, stock y categoría del producto. El formulario
                                                        también incluye un botón de envío para enviar los datos al servidor para su procesamiento. */ -->
                                                        <form method="POST" action="html/pages/PROYECTO/registrarProducto.php?t=<?php echo($id_tienda);?>">
                                                            <div class="form-group">
                                                                <label class="form-label" for="codigoProducto">Código producto</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="codigoProducto" name="codigoProducto" aria-required="true"> <!-- campo para el código del producto -->
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="nombreProducto">Nombre</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" aria-required="true"> <!-- campo para el nombre del producto -->
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="precioProducto">Precio</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="precioProducto" name="precioProducto" aria-required="true"> <!-- campo para el precio del producto -->
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="stockProducto">Stock</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="number" class="form-control" id="stockProducto" name="stockProducto" aria-required="true"> <!-- campo para el stock del producto -->
                                                                </div>
                                                            </div>
                                                           <!-- /*se esta generando un menú desplegable con una lista de categorías
                                                           recuperadas de una consulta de base de datos. Las opciones en el menú desplegable se completan con un bucle
                                                           foreach de PHP que itera a través de los resultados de la consulta y genera un elemento de opción para cada categoría.
                                                           El valor seleccionado del menú desplegable se envía como un parámetro de formulario denominado "categoriaProducto". */ -->
                                                            <div class="form-group">
                                                                <label class="form-label" for="categoriaProducto">Categoría</label>
                                                                <select class="form-select" aria-label="Default select example" name="categoriaProducto">                      
                                                                    <?php foreach ($result as $fila): ?>
                                                                    <option value="<?php echo $fila['id_categoria']; ?>">
                                                                    <?php echo $fila['nombre_categoria']; ?>
                                                                    </option>
                                                                    <?php endforeach; ?>
                                                                </select>
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
        $(this).find('[required],[aria-required="true"]').each(function () {
            if ($(this).val() === '') {
            valid = false;
            return false;
            }
        });
        const valor= document.getElementById('precioProducto').value;
        const stock = document.getElementById('stockProducto').value;

        if ((parseFloat(valor)<=0)|| (parseInt(stock)<=0)) 
        {
            valid = false;
        }
        <?php 
            $arrayPhp = mostrarProductos($id_tienda); 
            $jsonArray = json_encode($arrayPhp); 
        ?>

        const array = <?php echo $jsonArray; ?>; 
        const codigo = document.getElementById('codigoProducto').value;
        const nombre = document.getElementById('nombreProducto').value;
        if (array.find(producto => (producto.codigo_producto == codigo || producto.nombre_producto == nombre))){
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
                Swal.fire("¡ERROR!", "El código o nombre de producto ya existe", "error");
            }else{
                // Show error modal if not all required fields are completed or no radio button is selected
                Swal.fire("¡ERROR!", "Por favor ingresa datos válidos", "error");
            }
        }
        });

    </script>
</body>

</html>