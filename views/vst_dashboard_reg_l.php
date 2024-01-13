<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Formulario de Gestión de Usuario</title>
	<link rel="stylesheet" href="../public/css/styles_dashboard_reg_l.css">
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
</head>

<body>

	<div class="container">
		
		<form id="formularioLibro" action="../router/enr_dashboard_reg_l.php" method="post" enctype="multipart/form-data">

			<div class="d-flex align-items-center justify-content-between mt-3">
				<h4 class="form-label">Registro de Libro</h4>
				<img id="cerrarFormulario" src="../public/ico/cerrar.png">
			</div>

			<div class="row mt-3">
				
				<div class="col-md-6">
					<div class="mb-3">
						<label for="titulo" class="form-label">Título:</label>
						<input type="text" class="form-control" id="titulo" name="titulo" required>
					</div>
					<div class="mb-3">
						<label for="autor" class="form-label">Autor:</label>
						<input type="text" class="form-control" id="autor" name="autor" required>
					</div>
					<div class="mb-3">
						<label for="editorial" class="form-label">Editorial:</label>
						<input type="text" class="form-control" id="editorial" name="editorial" required>
					</div>
				</div>

				
				<div class="col-md-6">
					<div class="mb-3">
						<label for="anio_publicacion" class="form-label">Año de Publicación:</label>
						<input type="number" class="form-control" id="anio_publicacion" name="anio_publicacion" required>
					</div>
					<div class="mb-3">
						<label for="genero" class="form-label">Género:</label>
						<input type="text" class="form-control" id="genero" name="genero" required>
					</div>
					<div class="mb-3">
						<label for="imagen" class="form-label">Imagen:</label>
						<input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
					</div>
				</div>
			</div>

			
			<div class="row mt-3">
				<div class="col-md-6">
					<button type="submit" name="btn" class="btn btn-primary">Guardar Libro</button>
				</div>
			</div>
		</form>
	</div>

	<script src="../public/js/bootstrap.bundle.min.js"></script>
	<script src="../public/js/jquery.min.js"></script>
	<script>
		
		$("#cerrarFormulario").click(function() {
			
			$("#formularioUsuario").hide();
			$("#contenido-dinamico").hide().load("./vst_galeria.php", function() {
				$(this).fadeIn(600); 
			});
		});

	</script>
</body>

</html>
