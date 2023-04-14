<?php

	$dsn = 'mysql:dbname=systemKY;host=localhost;';
	$user = 'admin';
	$password = '52f9d1ac770d01b9be9df4c1d5edfd3495784ea1c5e03532';

	try{
		$pdo = new PDO($dsn, $user, $password);
	}catch( PDOException $e ){
		echo 'Error al conectarnos: ' . $e->getMessage();
	}
?>