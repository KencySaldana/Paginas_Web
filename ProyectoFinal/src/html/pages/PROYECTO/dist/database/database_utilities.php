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


	
	//Funcion que permite actualizar una tienda
	function updateUsuario($nombre,$apellido, $user_name, $user_password_hash, $email, $user_id){
		global $pdo;
	
		$sql = "UPDATE users SET nombre = '$nombre', apellido = '$apellido', user_name = '$user_name', user_password_hash = '$user_password_hash', email = '$email', WHERE user_id = $user_id";
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

	//Funcion que permite agregar un registro o modificarlo en la tabla categorias
	function addCategoria($descripcionCategoria){
		global $pdo;

		$sql = "INSERT INTO categoria (descripcion) VALUES('$descripcionCategoria')";
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
	function categoriasActivas(){
		global $pdo;
		$sql = "SELECT * FROM categoria";
		$statement = $pdo->prepare($sql);
		$statement->execute();
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
	function mostrarUsuarios(){
		global $pdo;
		$sql = "SELECT * FROM users";
		$statement = $pdo->prepare($sql);
		$statement->execute();
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

