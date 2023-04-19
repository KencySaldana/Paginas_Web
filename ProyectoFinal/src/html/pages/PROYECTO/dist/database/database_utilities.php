<?php
	include('connection.php');
	
	//Funcion que permite agregar una tienda
	//   La función agrega una nueva tienda a una tabla de base de datos con información específica.
	function addTienda($nombreTienda, $estado){
		global $pdo;

		$sql = "INSERT INTO tienda (nombre,activa) VALUES('$nombreTienda','$estado')";  
		$statement = $pdo->prepare($sql); 

		$statement->execute();
	}

	//Funcion que permite actualizar una tienda
	//   La función actualiza la información de la tienda en una base de datos.
	function updateTienda($nombreTienda, $estado, $id){
		global $pdo;
	
		$sql = "UPDATE tienda SET nombre = '$nombreTienda', activa = $estado WHERE id_tienda = $id";
		$statement = $pdo->prepare($sql);
	
		$statement->execute();
	}
	
	//Funcion que elimina la tienda
	//   La función elimina una tienda y su historial correspondiente de una base de datos.
	function deleteTienda($id_tienda){
		global $pdo;

		//Eliminamos el historial asociados a la tienda
		$sql = "DELETE FROM historial WHERE id_tienda = $id_tienda";
		$statement = $pdo->prepare($sql);
		$statement->execute();
		//Eliminamos los usuarios asociados a la tienda
		$sql = "DELETE FROM users WHERE id_tienda = $id_tienda";
		$statement = $pdo->prepare($sql);
		$statement->execute();
		//Eliminamos los productos de la tienda
		$sql = "DELETE FROM productos WHERE id_tienda = $id_tienda";
		$statement = $pdo->prepare($sql);
		$statement->execute();
		//Eliminamos las categorias de la tienda
		$sql = "DELETE FROM categorias WHERE id_tienda = $id_tienda";
		$statement = $pdo->prepare($sql);
		$statement->execute();
		// Luego eliminamos la tienda
		$sql = "DELETE FROM tienda WHERE id_tienda = $id_tienda";
		$statement = $pdo->prepare($sql);
		$statement->execute();
	}
	

	//Funcion que permite agregar una usuario de la tienda
	//   La función agrega un nuevo usuario a una tabla de base de datos con información específica.
	//  
	//   el parametro nombre El nombre del usuario que se agrega a la base de datos.
	//   el parametro apellido "apellido" es un parámetro que representa el apellido de un usuario. Se utiliza en
	//   la función "addUsuario" para insertar un nuevo usuario en una tabla de base de datos llamada
	//   "usuarios".
	//   el parametro user_name El nombre de usuario del usuario que se agrega a la base de datos.
	//   el parametro user_password_hash El parámetro user_password_hash es una versión cifrada de la contraseña
	//   del usuario. Se utiliza con fines de seguridad para evitar que la contraseña del usuario sea
	//   fácilmente legible o accesible en caso de una violación de datos. La función hash utilizada para
	//   generar el valor hash suele ser una función unidireccional, lo que significa que no puede
	//   el parametro email El parámetro de correo electrónico es una cadena que representa la dirección de correo
	//   electrónico del usuario que se agrega a la base de datos.
	//   el parametro id_tienda Es el ID de la tienda o comercio al que pertenece el usuario. Se utiliza para
	//   asociar al usuario con una tienda específica en la base de datos.
	//  
	function addUsuario($nombre, $apellido, $user_name, $user_password_hash, $email, $id_tienda) {
		global $pdo;
	
		// Verificar si el correo electrónico o el nombre de usuario ya existen en la base de datos
		$sql = "SELECT COUNT(*) FROM users WHERE user_name = :user_name OR email = :email";
		$statement = $pdo->prepare($sql);
		$statement->bindParam(':user_name', $user_name);
		$statement->bindParam(':email', $email);
		$statement->execute();
		$count = $statement->fetchColumn();
	
		if ($count > 0) {
			// Si ya existe un usuario con el mismo correo electrónico o nombre de usuario, mostrar un mensaje de error en un SweetAlert
			echo "<script>Swal.fire('Error', 'El correo electrónico o el nombre de usuario ya existen.', 'error');</script>";
		} else {
			// Si no hay coincidencias, insertar el nuevo usuario en la base de datos
			$sql = "INSERT INTO users (nombre, apellido, user_name, user_password_hash, email, date_add, id_tienda) VALUES (:nombre, :apellido, :user_name, :user_password_hash, :email, NOW(), :id_tienda)";
			$statement = $pdo->prepare($sql);
			$statement->bindParam(':nombre', $nombre);
			$statement->bindParam(':apellido', $apellido);
			$statement->bindParam(':user_name', $user_name);
			$statement->bindParam(':user_password_hash', $user_password_hash);
			$statement->bindParam(':email', $email);
			$statement->bindParam(':id_tienda', $id_tienda);
			$statement->execute();
		}
	}
	
	


	
	//Funcion que permite actualizar un usuario
	//   La función actualiza la información del usuario en una base de datos.
	//  
	//   el parametro nombre El nombre actualizado del usuario.
	//   el parametro apellido El parámetro "apellido" es una variable que debe contener el apellido de un
	//   usuario. Se utiliza en la función "actualizarUsuario" para actualizar el apellido de un usuario en
	//   la base de datos.
	//   el parametro user_name El nombre de usuario del usuario que necesita ser actualizado en la base de datos.
	//   el parametro user_password_hash La contraseña del usuario codificada por motivos de seguridad. Es
	//   probable que este valor se haya generado utilizando un algoritmo hash como bcrypt o SHA-256.
	//   el parametro email El parámetro de correo electrónico es una cadena que representa la dirección de correo
	//   electrónico actualizada de un usuario en una base de datos.
	//   el parametro user_id El ID de usuario es un identificador único para un usuario específico en la base de
	//   datos. Se utiliza para identificar la información de qué usuario debe actualizarse en la consulta
	//   SQL.
	//  
	function updateUsuario($nombre, $apellido, $user_name, $user_password_hash, $email, $user_id){
		global $pdo;

		$sql = "UPDATE users SET nombre = '$nombre', apellido = '$apellido', user_name = '$user_name', user_password_hash = '$user_password_hash', email = '$email' WHERE user_id = $user_id";
		$statement = $pdo->prepare($sql);
		$statement->execute();
	}

	

	//Funcion que permite eliminar una tienda
	
	//   La función elimina un usuario y su historial correspondiente de una base de datos.
	//  
	//   El ID de usuario es un identificador único asignado a cada usuario en la base de
	//   datos. Se utiliza para identificar el usuario específico que debe eliminarse de la base de datos.
	//  
	function deleteUsuario($user_id){
		global $pdo;

		$sql = "DELETE FROM historial WHERE user_id = $user_id";
		$statement = $pdo->prepare($sql);

		$statement->execute();

		$sql = "DELETE FROM users WHERE user_id = $user_id";
		$statement = $pdo->prepare($sql);

		$statement->execute();
	}

	// Función para obtener el ID de la tienda del usuario
	//  La función obtiene el ID de una tienda asociada a un usuario determinado en una base de datos.
	//   
	//   El parámetro "usuario" es una cadena que representa el nombre de usuario o correo
	//   electrónico de un usuario. Se utiliza para buscar al usuario en la tabla de "usuarios" de una base
	//   de datos y recuperar su "id_tienda" asociado (ID de la tienda).
	//   
	//   retorna el ID de la tienda asociada al usuario especificado por el parámetro de entrada ``.
	//   Si el usuario no existe, la función devuelve `null`.
	//  
	function obtenerIdTienda($usuario) {
		global $pdo;

		// Buscamos el usuario por nombre de usuario o email
		$sql = "SELECT id_tienda FROM users WHERE user_name = :usuario OR email = :usuario";
		$statement = $pdo->prepare($sql);
		$statement->bindParam(':usuario', $usuario);
		$statement->execute();
		$usuario_bd = $statement->fetch(PDO::FETCH_ASSOC);

		// Si el usuario no existe, retornamos null
		if (!$usuario_bd) {
			return null;
		}

		// Si el usuario existe, retornamos el ID de la tienda
		return $usuario_bd['id_tienda'];
	}

	// Consulta SQL para buscar al usuario en la base de datos
	//   La función valida las credenciales de inicio de sesión de un usuario y comprueba si su tienda
	//   asociada está activa.
	//   
	//  el parametro usuario El nombre de usuario o correo electrónico del usuario que intenta iniciar sesión.
	//   el parametro contrasena La contraseña ingresada por el usuario que intenta iniciar sesión.
	//   
	//   retorna un valor booleano (verdadero o falso) dependiendo de si el usuario existe y su contraseña
	//   coincide, y su tienda está activa.
	//  
	function validarUsuario($usuario, $contrasena) {
		global $pdo;
	
		// Buscamos el usuario por nombre de usuario o email
		$sql = "SELECT users.*, tienda.activa AS estado_tienda FROM users 
				INNER JOIN tienda ON users.id_tienda = tienda.id_tienda
				WHERE (user_name = :usuario OR email = :usuario) AND tienda.activa = 1";
		$statement = $pdo->prepare($sql);
		$statement->bindParam(':usuario', $usuario);
		$statement->execute();
		$usuario_bd = $statement->fetch(PDO::FETCH_ASSOC);
	
		// Si el usuario no existe, retornamos false
		if (!$usuario_bd) {
			return false;
		}
	
		// Si el usuario existe, comparamos la contraseña y el estado de la tienda
		if ($contrasena == $usuario_bd['user_password_hash'] && $usuario_bd['estado_tienda'] == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	
	//Funcion que permite agregar un registro en la tabla categorias
	//   La función agrega una nueva categoría a una tabla de base de datos con un nombre, descripción e ID
	//   de tienda dados.
	//   
	//  el parametro name El nombre de la categoría que desea agregar a la base de datos.
	//   el parametrodescripcionCategoria El parámetro "descripcionCategoria" es una variable de cadena que
	//   representa la descripción de una categoría. Se utiliza como valor a insertar en la columna
	//   "descripcion_categoria" de la tabla "categorias" de una base de datos.
	//   el parametro id_tienda  es una variable que representa el ID de la tienda donde se agregará la
	//   categoría. Se utiliza para asociar la categoría con una tienda específica en la base de datos.
	//  
	function addCategoria($name, $descripcionCategoria, $id_tienda){
		global $pdo;
		$sql = "INSERT INTO categorias (nombre_categoria, descripcion_categoria,	date_add,	id_tienda	) VALUES('$name', '$descripcionCategoria', NOW(), '$id_tienda')";
		$statement = $pdo->prepare($sql);
		$statement->execute();
	}

	//Funcion que permite actualizar categoria
	//   La función actualiza el nombre y la descripción de una categoría en una base de datos.
	//   
	//   el parametro name El nuevo nombre de la categoría.
	//   el parametro descripcionCategoria El parámetro "descripcionCategoria" es una variable de cadena que
	//   representa la descripción actualizada de una categoría en una base de datos. Se utiliza en la
	//   consulta SQL para actualizar la columna "descripcion_categoria" de la tabla "categorias".
	//   el parametro id_categoria El ID de la categoría que debe actualizarse en la base de datos.
	//  
	function updateCategoria($name, $descripcionCategoria, $id_categoria){
		global $pdo;
		$sql = "UPDATE categorias SET nombre_categoria = '$name', descripcion_categoria = '$descripcionCategoria' WHERE id_categoria = $id_categoria";
		$statement = $pdo->prepare($sql);
		$statement->execute();
	}

	

	
	//   Esta función elimina una categoría y todos los productos asociados de una base de datos mediante
	//   consultas SQL en PHP.
	//   
	//   El parámetro "id_categoria" es el ID de la categoría que debe eliminarse de la
	//   base de datos. La función primero elimina todos los productos asociados con esa categoría y luego
	//   elimina la categoría en sí.
	//  
	function deleteCategoria($id_categoria){
		global $pdo;

		//Eliminamos los productos asociados a la categoría
		$sql = "DELETE FROM productos WHERE id_categoria = $id_categoria";
		$statement = $pdo->prepare($sql);
		$statement->execute();
		// Luego eliminamos la categoría
		$sql = "DELETE FROM categorias WHERE id_categoria = $id_categoria";
		$statement = $pdo->prepare($sql);
		$statement->execute();
	}
	
	//Funcion que permite agregar un registro en la tabla categorias
	//   La función agrega un nuevo producto a una tabla de base de datos con parámetros específicos.
	//   
	//  -el parametro codigo_producto Este parámetro representa el código único o identificador de un producto. Se
	//   utiliza para distinguir un producto de otro en la base de datos.
	//   -el parametro nombre_producto El nombre del producto que se agrega a la base de datos.
	//  -el parametroprecio_producto precio_producto es un parámetro que representa el precio del producto. Es un
	//   valor numérico que indica el costo del producto en la moneda utilizada por el sistema.
	//   -el parametrostock El parámetro "stock" se refiere a la cantidad del producto que está actualmente
	//   disponible en el inventario. Es la cantidad de unidades del producto que la tienda tiene en stock y
	//   está disponible para la venta a los clientes.
	//   -el parametro id_categoria El parámetro "id_categoria" se refiere al ID de categoría del producto que se
	//   agrega. Se utiliza para categorizar productos y agruparlos según su tipo o propósito. Por ejemplo,
	//   una tienda de ropa puede tener categorías como "ropa de hombre", "ropa de mujer", "accesorios",
	//   el parametro id_tienda El parámetro "id_tienda" se refiere al ID de la tienda donde se está agregando el
	//   producto.
	//  
	function addProducto($codigo_producto, $nombre_producto, $precio_producto, $stock, $id_categoria, $id_tienda){
		global $pdo;

		$sql = "INSERT INTO productos (codigo_producto, nombre_producto, date_add, precio_producto, stock, id_categoria, id_tienda) VALUES('$codigo_producto', '$nombre_producto', NOW(), '$precio_producto', '$stock', '$id_categoria','$id_tienda')";
		$statement = $pdo->prepare($sql);
		$statement->execute();
	}

	//Funcion que permite actualizar categoria
	//   La función actualiza la información de un producto en una base de datos.
	//   
	//   el parametro codigo_producto es El código o identificador del producto.
	//   el parametro nombre_producto es El nombre del producto que necesita ser actualizado.
	//   el parametro precio_producto precio_producto es una variable que contiene el precio de un producto. Se
	//   utiliza en la función actualizarProducto() para actualizar el precio de un producto en la base de
	//   datos.
	//   el parametro id_categoria El ID de la categoría a la que pertenece el producto.
	//   el parametro id_producto El identificador único del producto que necesita ser actualizado en la base de
	//   datos.
	//  
	function updateProducto($codigo_producto, $nombre_producto, $precio_producto, $id_categoria,$id_producto){
		global $pdo;
		$sql = "UPDATE productos SET codigo_producto = '$codigo_producto', nombre_producto = '$nombre_producto', precio_producto = '$precio_producto',id_categoria = '$id_categoria' WHERE id_producto= $id_producto";
		$statement = $pdo->prepare($sql);
		$statement->execute();
	}

	//Funcion que permite eliminar una tienda
	//   La función elimina un producto y su historial correspondiente de una base de datos usando su ID.
	//   
	//  El parámetro "id_producto" es el identificador único del producto que debe
	//   eliminarse de la tabla "productos" en la base de datos. La función primero elimina todos los
	//   registros relacionados con este producto de la tabla "histórico" y luego elimina el registro del
	//   producto de la tabla "productos".
	//  
	function deleteProducto($id_producto){
		global $pdo;

		
		$sql = "DELETE FROM historial WHERE id_producto = $id_producto"; 
		$statement = $pdo->prepare($sql);
		$statement->execute();

		$sql = "DELETE FROM productos WHERE id_producto = $id_producto";
		$statement = $pdo->prepare($sql);
		$statement->execute();
	}

	//Funcion que trae las categorias activas
	//   La función recupera todas las categorías asociadas con una ID de tienda dada de una base de datos
	//   usando PDO en PHP.
	//  
	//  El parámetro "id_tienda" es una variable que representa el ID de una tienda. Esta
	//   función recupera todas las categorías asociadas con una ID de tienda específica.
	//   
	//   retorna La función `mostrarcategorias` está devolviendo un array de todas las categorías que
	//   pertenecen a una tienda específica, identificada por el parámetro ``.
	//  
	function mostrarcategorias($id_tienda){
		global $pdo;
		$sql = "SELECT * FROM categorias WHERE id_tienda = :id_tienda";
		$statement = $pdo->prepare($sql);
		$statement->execute(['id_tienda' => $id_tienda]);
		$results=$statement->fetchAll();
		return $results;
	}

	
	//   La función recupera todos los productos de una tienda específica y su categoría correspondiente.
	//   
	//   El parámetro "id_tienda" es el ID de la tienda de la que queremos recuperar los
	//   productos.
	//   
	//   retorna una matriz de productos con sus respectivas categorías, filtrados por la identificación de
	//   la tienda proporcionada.
	//  
	function mostrarProductos($id_tienda){
		global $pdo;
		$sql = "SELECT p.*, c.nombre_categoria 
				FROM productos p 
				INNER JOIN categorias c 
				ON p.id_categoria = c.id_categoria 
				WHERE p.id_tienda = :id_tienda";
		$statement = $pdo->prepare($sql);
		$statement->execute(['id_tienda' => $id_tienda]);
		$results = $statement->fetchAll();
		return $results;
	}
	


	// Funcion que trae las categorias activas
	//  La función recupera todos los datos de la tabla "tienda" en una base de datos y los devuelve.
	//   
	//  retorna una matriz de todas las filas de la tabla "tienda" en la base de datos.
	//  
	function mostrarTiendas(){
		global $pdo;
		$sql = "SELECT * FROM tienda";
		$statement = $pdo->prepare($sql);
		$statement->execute();
		$results=$statement->fetchAll();
		return $results;
	}

	//Funcion que trae las categorias activas
	//   La función recupera todos los usuarios asociados con una ID de tienda específica de una base de
	//   datos usando PDO en PHP.
	//   
	//   El parámetro "id_tienda" es una variable que representa el ID de una tienda. Esta
	//   función recupera todos los usuarios asociados con una ID de tienda en particular.
	//   
	//   retorna un arreglo de todos los usuarios que pertenecen a una tienda específica, identificados por
	//   el parámetro ``.
	//  
	function mostrarUsuarios($id_tienda){
		global $pdo;
		$sql = "SELECT * FROM users WHERE id_tienda = :id_tienda";
		$statement = $pdo->prepare($sql);
		$statement->execute(['id_tienda' => $id_tienda]);
		$results=$statement->fetchAll();
		return $results;
	}

	//Funcion que trae el historial de un producto en una tienda
	//   La función "mostrarhistorial" recupera todos los registros de la tabla "historial" que coinciden
	//   con los parámetros "id_tienda" e "id_producto" dados.
	//   
	//   Este parámetro representa el ID de una tienda en una base de datos. Se utiliza en
	//   la consulta SQL para filtrar los resultados y mostrar solo el historial de un producto específico
	//   en una tienda específica.
	//   el parametro id_producto Es el ID del producto para el que se están recuperando los datos históricos.
	//   
	//   retorna una matriz de todas las filas de la tabla "historial" donde la columna "id_tienda" coincide
	//   con el parámetro  dado y la columna "id_producto" coincide con el parámetro 
	//   dado.
	//  
	function mostrarhistorial($id_tienda, $id_producto){
		global $pdo;
		$sql = "SELECT * FROM historial WHERE id_tienda = :id_tienda AND id_producto = :id_producto";
		$statement = $pdo->prepare($sql);
		$statement->execute(['id_tienda' => $id_tienda, 'id_producto' => $id_producto]);
		$results=$statement->fetchAll();
		return $results;
	}




	//Funcion para mostrar la tablas con productos y su categoria
	//   La función recupera todos los productos y sus correspondientes descripciones de categoría de una
	//   base de datos mediante una consulta SQL.
	//   
	//   retorna La función `productosCategoria()` está devolviendo una matriz de todos los productos con
	//   sus respectivas categorías. Cada producto tiene información como ID, nombre, descripción, precio y
	//   la categoría a la que pertenece.
	//  
	function productosCategoria(){
		global $pdo;
        $sql = "SELECT productos.*, categoria.descripcion FROM productos INNER JOIN categoria ON productos.ID_categoria = categoria.ID";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $results=$statement->fetchAll();
        return $results;
	}

	//Funcion para mostrar la tablas con productos y su categoria
	//   La función obtiene el ID de una categoría en función de su nombre de una base de datos utilizando
	//   PDO en PHP.
	//   
	//   el parametro nombre_categoria Es el nombre de la categoría para la que queremos obtener el ID.
	//   
	//   retorna el ID de una categoría basado en su nombre, o NULL si la categoría no se encuentra en la
	//   base de datos.
	//  
	function obtenerIdCategoria($nombre_categoria) {
		global $pdo;
	
		// Preparar la consulta SQL
		$stmt = $pdo->prepare("SELECT id_categoria FROM categorias WHERE nombre_categoria = :nombre");
	
		// Asignar el valor del parámetro
		$stmt->bindParam(':nombre', $nombre_categoria);
	
		// Ejecutar la consulta
		$stmt->execute();
	
		// Obtener el resultado
		$resultado = $stmt->fetch(PDO::FETCH_ASSOC);
	
		// Retornar el ID de la categoría o NULL si no se encontró
		return $resultado ? $resultado['id_categoria'] : NULL;
	}

	
	//   La función obtiene categorías activas para un ID de tienda determinado mediante una consulta SQL
	//   preparada y devuelve los resultados como una matriz asociativa.
	//   
	//   El parámetro "id_tienda" es una variable que representa el ID de una tienda. Se
	//   utiliza en la consulta SQL para recuperar las categorías que pertenecen a esa tienda específica.
	//   
	//   retorna una matriz de categorías activas para un ID de tienda determinado. La matriz contiene el ID
	//   y el nombre de cada categoría.
	//  
	function obtenerCategoriasActivas($id_tienda) {
		global $pdo;
	
		// Preparar la consulta SQL
		$stmt = $pdo->prepare("SELECT id_categoria, nombre_categoria FROM categorias WHERE id_tienda = $id_tienda");
	
		// Ejecutar la consulta
		$stmt->execute();
	
		// Obtener los resultados
		$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
		// Retornar el array de categorías
		return $resultados;
	}

	//Funcion para mostrar la tabla con los detalles de un producto
	//   La función recupera detalles de un producto en función de su ID de una base de datos utilizando PDO
	//   en PHP.
	//   
	//  El parámetro "id_producto" es una variable que representa el identificador único
	//   de un producto en una base de datos. La función "detallesProducto" toma este parámetro como entrada
	//   y lo usa para recuperar todos los detalles del producto con el ID especificado de la tabla
	//   "productos" en la base de datos. La función
	//   
	//   retorna La función `detallesProducto` está devolviendo una matriz de todos los detalles de un
	//   producto con el `` dado.
	//  
	function detallesProducto($id_producto) {
		global $pdo;
		$sql = "SELECT * FROM productos WHERE id_producto = $id_producto";
		$statement = $pdo->prepare($sql);
		$statement->execute();
		$r = $statement->fetchAll();
		return $r;
	}

	//Funcion para mostrar la tabla con los detalles de un producto
	//   La función incrementa el stock de un producto en una cantidad dada en una base de datos usando PDO
	//   en PHP.
	//   
	//   el parametro id_producto Es el ID del producto cuyo stock necesita ser incrementado.
	//   el parametro cantidad es la cantidad en la que se debe incrementar el stock del producto.
	//  
	function incrementar_stock($id_producto, $cantidad){
		global $pdo;
		$sql = "UPDATE productos SET stock = stock + :cantidad WHERE id_producto = :id_producto";
		$statement = $pdo->prepare($sql);
		$statement->execute(['cantidad' => $cantidad, 'id_producto' => $id_producto]);
	}


	//   La función decrementa el stock de un producto en una cantidad dada si hay suficiente stock
	//   disponible.
	//   
	//   el parametro id_producto Es el ID del producto cuyo stock necesita ser actualizado.
	//   el parametrocantidad es la cantidad de producto a decrementar del stock.
	//   
	//   retorna Si el stock no es suficiente para retirar la cantidad deseada, la función devuelve falso.
	//   De lo contrario, no devuelve nada.
	//  
	function decrementar_stock($id_producto, $cantidad){
		global $pdo;
		$sql = "SELECT stock FROM productos WHERE id_producto = :id_producto";
		$statement = $pdo->prepare($sql);
		$statement->execute(['id_producto' => $id_producto]);
		$stock = $statement->fetchColumn();
		if ($stock >= $cantidad) { // Se verifica si hay suficiente stock para quitar la cantidad deseada
		$sql = "UPDATE productos SET stock = stock - :cantidad WHERE id_producto = :id_producto";
		$statement = $pdo->prepare($sql);
		$statement->execute(['cantidad' => $cantidad, 'id_producto' => $id_producto]);
		} else {
			echo "<script>Swal.fire('Error', 'No hay suficiente stock.', 'error');</script>";
		}
		}
	
	

	//Funcion para mostrar la tabla con los detalles de un producto
	//   Esta función agrega un registro a una tabla de base de datos llamada "historial" con información
	//   sobre la acción de un usuario en un producto.
	//   
	//   el parametro id_producto Es el ID del producto afectado en el registro histórico.
	//   el parametro user_id Es el ID del usuario que realizó la acción que se está registrando en el historial.
	//   el parametroreferencia Es el número de referencia o código asociado a la transacción o acción que se
	//   registra en el historial.
	//   el parametro cantidad es la cantidad de un producto que se agrega o elimina del inventario.
	//   el parametro id_tienda Es el ID de la tienda donde se está realizando la acción.
	//   el parametro accion es la acción realizada en el producto, como "agregado" o "eliminado".
	//   el parametro nombreCompleto es el nombre completo del usuario que realizó la acción.
	//  
	function agregarRegistroHistorial($id_producto, $user_id, $referencia, $cantidad, $id_tienda, $accion, $nombreCompleto) {
		global $pdo;

		// Preparación de la consulta SQL
		$nota = 'El usuario '.$nombreCompleto.' ' . $accion.' '. $cantidad . ' unidades del producto.';
		$sql = "INSERT INTO historial (id_producto, user_id, fecha, nota, referencia, cantidad, id_tienda) VALUES ('$id_producto', '$user_id', NOW(), '$nota', '$referencia', '$cantidad', '$id_tienda')";
		$stmt = $pdo->prepare($sql);

		// Ejecución de la consulta con los parámetros correspondientes
		$stmt->execute();

	}




	//   La función obtiene la ID de usuario de la base de datos según el correo electrónico o el nombre de
	//   usuario proporcionado.
	//   
	//   el parametro orreo_o_usuario es una variable que representa el correo electrónico o el nombre de usuario
	//   de un usuario. Se utiliza en la consulta SQL para buscar un usuario coincidente en la tabla
	//   "usuarios".
	//   
	//   retorna ya sea el user_id del usuario cuyo correo electrónico o nombre de usuario coincide con el
	//   parámetro de entrada , o falso si no hay ninguna coincidencia.
	//  
	function obtenerIdUsuario($correo_o_usuario) {
		global $pdo;
		// Preparación de la consulta SQL
		$sql = "SELECT user_id FROM users WHERE email = :correo OR user_name = :usuario";
		$stmt = $pdo->prepare($sql);

		// Asignación de valores a los parámetros
		$stmt->bindParam(':correo', $correo_o_usuario);
		$stmt->bindParam(':usuario', $correo_o_usuario);

		// Ejecución de la consulta
		$stmt->execute();

		// Obtención del resultado
		$resultado = $stmt->fetch();

		if ($resultado) {
		return $resultado['user_id'];
		} else {
		return false;
		}
	}


	//  La función obtiene el nombre completo de un usuario por su ID de una base de datos usando SQL.
	//   
	//   El parámetro "id_usuario" es el ID del usuario del que queremos obtener el nombre
	//   completo.
	//   
	//   retorna el nombre completo (concatenación de nombre y apellido) de un usuario con una
	//   identificación de usuario dada de una tabla de base de datos llamada "usuarios". Si el ID de
	//   usuario no se encuentra en la tabla, la función devuelve falso.
	//  
	function obtenerNombreUsuarioPorId($id_usuario) {
		global $pdo;
		// Preparación de la consulta SQL
		$sql = "SELECT CONCAT(nombre, ' ', apellido) AS nombre_completo FROM users WHERE user_id = :id_usuario";
		$stmt = $pdo->prepare($sql);
	
		// Asignación de valores a los parámetros
		$stmt->bindParam(':id_usuario', $id_usuario);
	
		// Ejecución de la consulta
		$stmt->execute();
	
		// Obtención del resultado
		$resultado = $stmt->fetch();
	
		if ($resultado) {
		return $resultado['nombre_completo'];
		} else {
		return false;
		}
	
	}


	//   La función obtiene productos activos de una tienda específica.
	//   
	//   El parámetro "id_tienda" es el ID de la tienda de la que queremos recuperar los
	//   productos activos.
	//   
	//   retorna una matriz de productos activos (identificación y nombre) de una tienda específica, según
	//   la identificación de la tienda proporcionada.
	//  
	function obtenerProductosActivos($id_tienda) {
		global $pdo;
	
		// Preparar la consulta SQL
		$stmt = $pdo->prepare("SELECT id_producto, nombre_producto FROM productos WHERE id_tienda = $id_tienda");
	
		// Ejecutar la consulta
		$stmt->execute();
	
		// Obtener los resultados
		$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
		// Retornar el array de categorías
		return $resultados;
	}


	
	//  La función obtiene un producto de una base de datos en función de su ID.
	//   
	//   El parámetro "id_producto" es el identificador del producto que queremos
	//   recuperar de la base de datos. Se utiliza en la consulta SQL para filtrar los resultados y devolver
	//   solo el producto con el ID coincidente.
	//   
	//   retorna una matriz asociativa con la información de un producto que coincide con la ID dada.
	//  
	function obtenerProducto($id_producto) {
		global $pdo;
		// Preparar la consulta SQL
		$stmt = $pdo->prepare("SELECT * FROM productos WHERE id_producto = :id");	
		// Asignar el valor del parámetro
		$stmt->bindValue(':id', $id_producto);	
		// Ejecutar la consulta
		$stmt->execute();	
		// Obtener el resultado
		$producto = $stmt->fetch(PDO::FETCH_ASSOC);	
		// Retornar el producto encontrado
		return $producto;
	}



	//   La función obtiene la información de una tienda de una base de datos basada en su ID.
	//   
	//   El parámetro "id_tienda" es el identificador de una tienda en una base de datos.
	//   La función "obtenerTienda" toma este parámetro como entrada y recupera la información de la tienda
	//   de la base de datos.
	//   
	//   retorna un arreglo asociativo con la información de una tienda (tienda) que coincide con el
	//   parámetro id_tienda dado.
	//  
	function obtenerTienda($id_tienda) {
		global $pdo;
		// Preparar la consulta SQL
		$stmt = $pdo->prepare("SELECT * FROM tienda WHERE id_tienda = :id");	
		// Asignar el valor del parámetro
		$stmt->bindValue(':id', $id_tienda);	
		// Ejecutar la consulta
		$stmt->execute();	
		// Obtener el resultado
		$producto = $stmt->fetch(PDO::FETCH_ASSOC);	
		// Retornar el producto encontrado
		return $producto;
	}
	


	//  La función obtiene un usuario de una base de datos usando su ID.
	//   
	//  El parámetro "id_usuario" es un número entero que representa el ID del usuario
	//  que queremos recuperar de la base de datos.
	//  
	//  retorna una matriz asociativa con la información del usuario cuyo ID coincide con el parámetro
	//  pasado a la función.
	//  
	function obtenerUsuario($id_usuario) {
		global $pdo;
		// Preparar la consulta SQL
		$stmt = $pdo->prepare("SELECT * FROM users WHERE user_id = :id");	
		// Asignar el valor del parámetro
		$stmt->bindValue(':id', $id_usuario);	
		// Ejecutar la consulta
		$stmt->execute();	
		// Obtener el resultado
		$usuario = $stmt->fetch(PDO::FETCH_ASSOC);	
		// Retornar el producto encontrado
		return $usuario;
	}



	//  La función obtiene una categoría de una base de datos basada en su ID.
	//   
	//   El parámetro "id_categoria" es un número entero que representa el ID de una
	//   categoría en una tabla de base de datos llamada "categorias". Esta función recupera la información
	//   de la categoría de la base de datos en función del ID proporcionado.
	//   
	//  retorna una matriz asociativa con la información de la categoría que coincide con el ID dado.
	//  
	function obtenerCategoria($id_categoria) {
		global $pdo;
		// Preparar la consulta SQL
		$stmt = $pdo->prepare("SELECT * FROM categorias WHERE id_categoria= :id");	
		// Asignar el valor del parámetro
		$stmt->bindValue(':id', $id_categoria);	
		// Ejecutar la consulta
		$stmt->execute();	
		// Obtener el resultado
		$categoria = $stmt->fetch(PDO::FETCH_ASSOC);	
		// Retornar el producto encontrado
		return $categoria;
	}


	
	//   La función devuelve la cantidad de productos en una ID de tienda dada.
	//  
	//   El parámetro "id_tienda" es una variable que representa el ID de una tienda en una
	//   base de datos. Se utiliza en la consulta SQL para seleccionar la cantidad de productos asociados
	//   con esa tienda.
	//   
	//   retorna la cantidad de productos que pertenecen a una tienda específica, identificados por el
	//   parámetro .
	//  
	function cantProductos($id_tienda){
		global $pdo;
		// Preparar la consulta SQL
		$stmt = $pdo->prepare("SELECT COUNT(*) FROM productos WHERE id_tienda = $id_tienda");		
		// Ejecutar la consulta
		$stmt->execute();	
		// Obtener el resultado
		$cantP = $stmt->fetchColumn();;	
		return $cantP;
	}


	
	//  La función devuelve el número de categorías asociadas con una ID de tienda determinada.
	//  
	//  El parámetro "id_tienda" es probablemente un identificador de una tienda o tienda.
	//  Se utiliza en la consulta SQL para recuperar el recuento de categorías asociadas con esa tienda en
	//  particular.
	//  
	//  retorna el número de categorías asociadas con una ID de tienda determinada.
	//  
	function cantCategorias($id_tienda){
		global $pdo;
		// Preparar la consulta SQL
		$stmt = $pdo->prepare("SELECT COUNT(*) FROM categorias WHERE id_tienda = $id_tienda");		
		// Ejecutar la consulta
		$stmt->execute();	
		// Obtener el resultado
		$cantC = $stmt->fetchColumn();;	
		return $cantC;
	}

	
	//  La función devuelve la cantidad de usuarios asociados con una ID de tienda específica.
	//   
	//  El parámetro "id_tienda" es una variable que representa el ID de una tienda. Se
	//  usa en la consulta SQL para filtrar los resultados y contar la cantidad de usuarios asociados con
	//  esa tienda en particular.
	//   
	//  retorna el número de usuarios asociados a una tienda específica (identificados por su ID).
	
	function cantUsuarios($id_tienda){
		global $pdo;
		// Preparar la consulta SQL
		$stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE id_tienda = $id_tienda");		
		// Ejecutar la consulta
		$stmt->execute();	
		// Obtener el resultado
		$cantU = $stmt->fetchColumn();;	
		return $cantU;
	}



	
	//  La función recupera la cantidad de cambios realizados en una tienda desde una base de datos.
	//  
	//  El parámetro "id_tienda" es el ID de una tienda en una base de datos. Esta función
	//  recupera la cantidad de cambios realizados en la información de la tienda.
	//  
	//  retorna el número de cambios realizados en una tienda con el ID dado.
	//  
	function cantCambios($id_tienda){
		global $pdo;
		// Preparar la consulta SQL
		$stmt = $pdo->prepare("SELECT cambios FROM tienda WHERE id_tienda = $id_tienda"); // consulta para obtener la cantidad de cambios	
		// Ejecutar la consulta
		$stmt->execute();	
		// Obtener el resultado
		$cantCambios = $stmt->fetchColumn();;	
		return $cantCambios;
	}

	//Funcion que permite agregar un registro en la tabla categorias
	function addCambio($id_tienda){
		global $pdo;
		$sql = $sql = "UPDATE tienda SET cambios = cambios + 1 WHERE id_tienda = $id_tienda"; // Preparación de la consulta SQL
		$statement = $pdo->prepare($sql);
		$statement->execute();
	}

	// Función que permite agregar un registro en la tabla categorias
	//  La función obtiene el hash de la contraseña de un usuario dado su correo electrónico o nombre de
	//  usuario.
	//  
	//   el parámetro correo_o_usuario es una cadena que representa el correo electrónico o el
	//  nombre de usuario de un usuario en la base de datos. Se utiliza para buscar el hash de la
	//  contraseña del usuario en la tabla de "usuarios".
	//  
	//  retorna el hash de contraseña de usuario de la tabla "usuarios" en la base de datos para el correo
	//  electrónico o nombre de usuario dado. Si no se encuentra ningún resultado, devuelve falso.
	//  
	function obtenerPassword($correo_o_usuario){
		global $pdo;
		// Preparación de la consulta SQL
		$sql = "SELECT user_password_hash FROM users WHERE email = :correo OR user_name = :usuario";
		$stmt = $pdo->prepare($sql);

		// Asignación de valores a los parámetros
		$stmt->bindParam(':correo', $correo_o_usuario);
		$stmt->bindParam(':usuario', $correo_o_usuario);

		// Ejecución de la consulta
		$stmt->execute();

		// Obtención del resultado
		$resultado = $stmt->fetch();

		if ($resultado) {
		return $resultado['user_password_hash'];
		} else {
		return false;
		}


	}

	
	// 
	//  La función obtiene el nombre de una tienda en base a su ID.
	//  
	//  El parámetro "id_tienda" es el ID de una tienda en una base de datos. La función
	//  "obtenerNombreTienda" recupera el nombre de la tienda asociada al ID dado.
	//  
	//  retorna el nombre de una tienda (una cadena) en función de su ID.
	//  
	function obtenerNombreTienda($id_tienda){
		global $pdo;
		// Preparación de la consulta SQL
		$sql = "SELECT nombre FROM tienda WHERE id_tienda = $id_tienda";
		$stmt = $pdo->prepare($sql);

		$stmt->execute();

		// Obtención del resultado
		$resultado = $stmt->fetch();

		return $resultado['nombre'];
	}
	  
	  
?>




	

	




