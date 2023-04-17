<?php
	include('connection.php');

	//Funcion que permite agregar una tienda
	function addTienda($nombreTienda, $estado){
		global $pdo;

		$sql = "INSERT INTO tienda (nombre,activa) VALUES('$nombreTienda','$estado')";
		$statement = $pdo->prepare($sql);

		$statement->execute();
	}

	//Funcion que permite actualizar una tienda
	function updateTienda($nombreTienda, $estado, $id){
		global $pdo;
	
		$sql = "UPDATE tienda SET nombre = '$nombreTienda', activa = $estado WHERE id_tienda = $id";
		$statement = $pdo->prepare($sql);
	
		$statement->execute();
	}
	

	//Funcion que permite eliminar una tienda
	function deleteTienda($id_tienda){
		global $pdo;

		$sql = "DELETE FROM tienda WHERE id_tienda = $id_tienda";
		$statement = $pdo->prepare($sql);

		$statement->execute();
	}

	//Funcion que permite agregar una usuario de la tienda
	function addUsuario($nombre, $apellido, $user_name, $user_password_hash, $email, $id_tienda){
		global $pdo;

		$sql = "INSERT INTO users (nombre, apellido, user_name, user_password_hash, email, date_add, id_tienda) VALUES ('$nombre', '$apellido', '$user_name', '$user_password_hash', '$email', NOW(), '$id_tienda')";
		$statement = $pdo->prepare($sql);
		$statement->execute();
	}


	
	//Funcion que permite actualizar un usuario
	function updateUsuario($nombre, $apellido, $user_name, $user_password_hash, $email, $user_id){
		global $pdo;

		$sql = "UPDATE users SET nombre = '$nombre', apellido = '$apellido', user_name = '$user_name', user_password_hash = '$user_password_hash', email = '$email' WHERE user_id = $user_id";
		$statement = $pdo->prepare($sql);
		$statement->execute();
	}

	

	//Funcion que permite eliminar una tienda
	function deleteUsuario($user_id){
		global $pdo;

		$sql = "DELETE FROM users WHERE user_id = $user_id";
		$statement = $pdo->prepare($sql);

		$statement->execute();
	}

	// Función para obtener el ID de la tienda del usuario
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
	function addCategoria($name, $descripcionCategoria, $id_tienda){
		global $pdo;
		$sql = "INSERT INTO categorias (nombre_categoria, descripcion_categoria,	date_add,	id_tienda	) VALUES('$name', '$descripcionCategoria', NOW(), '$id_tienda')";
		$statement = $pdo->prepare($sql);
		$statement->execute();
	}

	//Funcion que permite actualizar categoria
	function updateCategoria($name, $descripcionCategoria, $id_categoria){
		global $pdo;
		$sql = "UPDATE categorias SET nombre_categoria = '$name', descripcion_categoria = '$descripcionCategoria' WHERE id_categoria = $id_categoria";
		$statement = $pdo->prepare($sql);
		$statement->execute();
	}

	

	//Funcion que permite eliminar una tienda
	function deleteCategoria($id_categoria){
		global $pdo;
		$sql = "DELETE FROM categorias WHERE id_categoria = $id_categoria";
		$statement = $pdo->prepare($sql);
		$statement->execute();
	}

	//Funcion que permite agregar un registro en la tabla categorias
	function addProducto($codigo_producto, $nombre_producto, $precio_producto, $stock, $id_categoria, $id_tienda){
		global $pdo;

		$sql = "INSERT INTO productos (codigo_producto, nombre_producto, date_add, precio_producto, stock, id_categoria, id_tienda) VALUES('$codigo_producto', '$nombre_producto', NOW(), '$precio_producto', '$stock', '$id_categoria','$id_tienda')";
		$statement = $pdo->prepare($sql);
		$statement->execute();
	}

	//Funcion que permite actualizar categoria
	function updateProducto($codigo_producto, $nombre_producto, $precio_producto, $id_categoria,$id_producto){
		global $pdo;
		$sql = "UPDATE productos SET codigo_producto = '$codigo_producto', nombre_producto = '$nombre_producto', precio_producto = '$precio_producto',id_categoria = '$id_categoria' WHERE id_producto= $id_producto";
		$statement = $pdo->prepare($sql);
		$statement->execute();
	}

	//Funcion que permite eliminar una tienda
	function deleteProducto($id_producto){
		global $pdo;
		$sql = "DELETE FROM productos WHERE id_producto = $id_producto";
		$statement = $pdo->prepare($sql);
		$statement->execute();
	}

	//Funcion que trae las categorias activas
	function mostrarcategorias($id_tienda){
		global $pdo;
		$sql = "SELECT * FROM categorias WHERE id_tienda = :id_tienda";
		$statement = $pdo->prepare($sql);
		$statement->execute(['id_tienda' => $id_tienda]);
		$results=$statement->fetchAll();
		return $results;
	}

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
	


	//Funcion que trae las categorias activas
	function mostrarTiendas(){
		global $pdo;
		$sql = "SELECT * FROM tienda";
		$statement = $pdo->prepare($sql);
		$statement->execute();
		$results=$statement->fetchAll();
		return $results;
	}

	//Funcion que trae las categorias activas
	function mostrarUsuarios($id_tienda){
		global $pdo;
		$sql = "SELECT * FROM users WHERE id_tienda = :id_tienda";
		$statement = $pdo->prepare($sql);
		$statement->execute(['id_tienda' => $id_tienda]);
		$results=$statement->fetchAll();
		return $results;
	}

	//Funcion que trae el historial de un producto en una tienda
	function mostrarhistorial($id_tienda, $id_producto){
		global $pdo;
		$sql = "SELECT * FROM historial WHERE id_tienda = :id_tienda AND id_producto = :id_producto";
		$statement = $pdo->prepare($sql);
		$statement->execute(['id_tienda' => $id_tienda, 'id_producto' => $id_producto]);
		$results=$statement->fetchAll();
		return $results;
	}




	//Funcion para mostrar la tablas con productos y su categoria
	function productosCategoria(){
		global $pdo;
        $sql = "SELECT productos.*, categoria.descripcion FROM productos INNER JOIN categoria ON productos.ID_categoria = categoria.ID";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $results=$statement->fetchAll();
        return $results;
	}

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
	function detallesProducto($id_producto) {
		global $pdo;
		$sql = "SELECT * FROM productos WHERE id_producto = $id_producto";
		$statement = $pdo->prepare($sql);
		$statement->execute();
		$r = $statement->fetchAll();
		return $r;
	}

	function incrementar_stock($id_producto, $cantidad){
		global $pdo;
		$sql = "UPDATE productos SET stock = stock + :cantidad WHERE id_producto = :id_producto";
		$statement = $pdo->prepare($sql);
		$statement->execute(['cantidad' => $cantidad, 'id_producto' => $id_producto]);
	}

	function decrementar_stock($id_producto, $cantidad){
		global $pdo;
		$sql = "UPDATE productos SET stock = stock - :cantidad WHERE id_producto = :id_producto";
		$statement = $pdo->prepare($sql);
		$statement->execute(['cantidad' => $cantidad, 'id_producto' => $id_producto]);
	}
	
	

	function agregarRegistroHistorial($id_producto, $user_id, $referencia, $cantidad, $id_tienda, $accion, $nombreCompleto) {
		global $pdo;

		// Preparación de la consulta SQL
		$nota = 'El usuario '.$nombreCompleto.' ' . $accion.' '. $cantidad . ' unidades del producto.';
		$sql = "INSERT INTO historial (id_producto, user_id, fecha, nota, referencia, cantidad, id_tienda) VALUES ('$id_producto', '$user_id', NOW(), '$nota', '$referencia', '$cantidad', '$id_tienda')";
		$stmt = $pdo->prepare($sql);

		// Ejecución de la consulta con los parámetros correspondientes
		$stmt->execute();

	}



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
	  
	  
?>




	

	




