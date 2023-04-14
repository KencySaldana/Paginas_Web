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

	//Funcion que permite agregar un registro o modificarlo en la tabla productos
	function addProducto($descripcion_producto, $precio_venta,$precio_compra,$id_categoria){
		global $pdo;

		$sql = "INSERT INTO productos (descripcion_producto,precio_venta, precio_compra, ID_categoria) VALUES('$descripcion_producto','$precio_venta','$precio_compra','$id_categoria')";
		$statement = $pdo->prepare($sql);
		$statement->execute();
	}


	//Funcion que trae las categorias activas
	function Mostrarcategorias($id_tienda){
		global $pdo;
		$sql = "SELECT * FROM categorias WHERE id_tienda = :id_tienda";
		$statement = $pdo->prepare($sql);
		$statement->execute(['id_tienda' => $id_tienda]);
		$results=$statement->fetchAll();
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



	//Funcion para mostrar la tablas con productos y su categoria
	function productosCategoria(){
		global $pdo;
        $sql = "SELECT productos.*, categoria.descripcion FROM productos INNER JOIN categoria ON productos.ID_categoria = categoria.ID";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $results=$statement->fetchAll();
        return $results;
	}

?>

