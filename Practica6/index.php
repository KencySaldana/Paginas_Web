<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<title>PHP</title>
</head>
<body>
	<main>
		<!-- Main content -->
		<section class="content">
		<div class="container-fluid">
			<div class="row">
			<!-- left column -->
			<div class="col-md-6">
				<!-- general form elements -->
				<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">FORMULARIO</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="subscribe.php", method="post">
					<div class="card-body">
						<div class="form-group">
							<label for="name">Nombre: </label>
							<input type="text" class="form-control" name="name" placeholder="Introduce tu nombre">
						</div>
						<div class="form-group">
							<label for="email">Correo: </label>
							<input type="email" class="form-control" name="email" placeholder="Introduce tu email" required="required">
						</div>
						<div class="form-group">
							<label for="address">Dirección: </label>
							<input type="text" class="form-control" name="address" placeholder="Introduce tu dirección" required="required">
						</div>
						<div class="form-group">
							<label for="phone">Teléfono: </label>
							<input type="tel" class="form-control" name="phone" placeholder="Introduce tu teléfono" required="required">
						</div>
						<div class="form-group">
							<label for="age">Edad: </label>
							<input type="number" class="form-control" name="age" placeholder="Introduce tu edad" required="required">
						</div>
						<div class="form-group">
							<label for="sex">Sexo: </label>
							<input type="text" class="form-control" name="sex" placeholder="Introduce tu sexo" required="required">
						</div>
						<div class="form-group">
							<label for="matricula">Matrícula: </label>
							<input type="text" class="form-control" name="matricula" placeholder="Introduce tu matrícula" required="required">
						</div>
						</div>
						<!-- /.card-body -->

					<div class="card-footer">
					<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
				</form>
				</div>
				<!-- /.card -->
			</div>
			<!--/.col (right) -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
		</section>

	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
