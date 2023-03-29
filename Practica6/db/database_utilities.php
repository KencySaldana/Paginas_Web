<?php
	include('connection.php');

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

