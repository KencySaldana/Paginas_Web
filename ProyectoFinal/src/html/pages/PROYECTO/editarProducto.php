<!-- /* script PHP que incluye un archivo database_utilities y verifica
si el usuario tiene los permisos necesarios para acceder a la página. Luego recupera la ID de un
producto y una tienda de los parámetros de URL y los usa para recuperar la información del producto
y las categorías activas para la tienda de la base de datos. Si el script recibe una solicitud POST
con información actualizada del producto, agrega un cambio al historial de la tienda y actualiza el
producto en la base de datos. */ -->
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

    $id_producto = $_GET["p"];
    $id_tienda = $_GET["t"];

    $producto = obtenerProducto($id_producto);

    //Se verifica si los datos fueron tomados
    if(isset($_POST['codigoProducto'])&& isset($_POST['nombreProducto'])&& isset($_POST['precioProducto'])){
        addCambio($id_tienda);
        updateProducto($_POST['codigoProducto'],$_POST['nombreProducto'],$_POST['precioProducto'],$_POST['categoriaProducto'],$id_producto);
        
    }

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
    <title>Editar Producto</title>
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
                                                            <h4 class="card-title">Editar Producto</h4>
                                                        </div>
                                                        <!-- /* formulario en PHP que permite al usuario editar
                                                        un producto. El formulario tiene campos de entrada para el código del producto, nombre,
                                                        precio y categoría. Los valores de estos campos se rellenan previamente con los
                                                        valores actuales del producto que se está editando. Cuando el usuario envía el
                                                        formulario, los datos se envían a un script PHP para su procesamiento. El script utiliza
                                                        los ID de producto y tienda pasados en la URL para actualizar el producto en la base
                                                        de datos con los nuevos valores ingresados por el usuario. */ -->
                                                        <form method="POST" action="html/pages/PROYECTO/editarProducto.php?p=<?php echo($id_producto);?>&t=<?php echo($id_tienda);?>"> <!-- Formulario para editar producto -->
                                                            <div class="form-group">
                                                                <label class="form-label" for="codigoProducto">Código producto</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="codigoProducto" name="codigoProducto" value="<?php echo $producto['codigo_producto'];?>" aria-required="true">  <!-- Campo para ingresar el código del producto -->
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="nombreProducto">Nombre</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" value="<?php echo $producto['nombre_producto'];?>" aria-required="true"> <!-- Campo para ingresar el nombre del producto -->
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="precioProducto">Precio</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="precioProducto" name="precioProducto" value="<?php echo $producto['precio_producto'];?>" aria-required="true">  <!-- Campo para ingresar el precio del producto -->
                                                                </div>
                                                            </div>              
                                                            <!-- /* se está generando un menú desplegable con una lista de categorías para un producto. Está
                                                            utilizando PHP para recorrer una serie de categorías y generar una opción para cada una con el nombre de la categoría
                                                            como texto de visualización y el ID de categoría como valor. */ -->
                                                            <div class="form-group">
                                                                <label class="form-label" for="categoriaProducto">Categoría</label>
                                                                <select class="form-select" aria-label="Default select example" name="categoriaProducto" >                      
                                                                    <?php foreach ($result as $fila): ?>
                                                                    <option value="<?php echo $fila['id_categoria']; ?>">
                                                                    <?php echo $fila['nombre_categoria']; ?>
                                                                    </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary">Actualizar</button> <!-- Botón para actualizar el producto -->
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
    <!-- /* script de JavaScript que se activa cuando se envía un formulario.
    Comprueba si todos los campos obligatorios están completos y si el valor de un campo específico
    es mayor que cero. También verifica si el valor de un campo específico coincide con cualquier
    valor existente en una matriz de PHP. Si se cumplen todas las condiciones, se muestra un mensaje
    de éxito y se envía el formulario. Si alguna condición no se cumple, se muestra un mensaje de
    error. */ -->
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
    
        if (parseFloat(valor)<=0) 
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
        if (array.find(producto => (producto.codigo_producto == codigo || producto.nombre_producto == nombre)&& producto.id_producto != <?php echo($id_producto) ?>)){
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