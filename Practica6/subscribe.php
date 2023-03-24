<?php

//WARNING SANITIZATION
//ERROR_REPORTING(0);--Para desactivar los warnings
//nombre coreo, dir, telefono, edad , sexo, matri

if (isset($_POST['name'], $_POST['email'], $_POST['age'], $_POST['address'],$_POST['phone'],$_POST['sex'],$_POST['matricula'])){
	$name = $_POST['name'];
	$email= $_POST['email'];
	$age = $_POST['age'];
	$address = $_POST['address'];
    $phone = $_POST['phone'];
	$sex = $_POST['sex'];
	$matricula = $_POST['matricula'];

	/*echo "Gracias $name Por tu suscripción. <br>";
	echo "Por favor confiemar el correo enviado a  $email. <br>";
	var_dump($_POST['email']);*/
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<title>PHP</title>
</head>
<body>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
      <th scope="col">Edad</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Sexo</th>
      <th scope="col">Matrícula</th>
      <th scope="col">Dirección</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $name; ?></td>
      <td><?php echo $email; ?></td>
      <td><?php echo $age; ?></td>
      <td><?php echo $phone; ?></td>
      <td><?php echo $sex; ?></td>
      <td><?php echo $matricula; ?></td>
	  <td><?php echo $address; ?></td>
    </tr>
  </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
