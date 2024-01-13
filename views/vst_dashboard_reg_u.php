<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Formulario de Gestión de Usuario</title>
	<link rel="stylesheet" href="../public/css/styles_dashboard_reg_u.css">
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
</head>

<body>

	<div class="container">
		<form id="formularioUsuario" action="../router/enr_dashboard_reg_u.php" method="post">
			<div class="row mt-3">
				<div class="d-flex align-items-center justify-content-between">
					<h4 class="form-label">Formulario de Gestión de Usuario</h4>
					<img id="cerrarFormulario" src="../public/ico/cerrar.png">
				</div>
			</div>



			<div class="row mt-3">
				<div class="col-md-6">
					<div class="mb-3">
						<label for="nombre" class="form-label">Nombre:</label>
						<input type="text" class="form-control" id="nombre" name="nombre" required>
					</div>
					<div class="mb-3">
						<label for="apellidos" class="form-label">Apellidos:</label>
						<input type="text" class="form-control" id="apellidos" name="apellidos" required>
					</div>
					<div class="mb-3">
						<label for="ci" class="form-label">Cédula de Identidad:</label>
						<input type="text" class="form-control" id="ci" name="ci" required>
					</div>
				</div>

				<div class="col-md-6">
					<div class="mb-3">
						<label for="correo_electronico" class="form-label">Correo Electrónico:</label>
						<input type="email" class="form-control" id="correo_electronico" name="correo_electronico" required>
					</div>
					<div class="mb-3">
						<label for="clave" class="form-label">Clave:</label>
						<input type="password" class="form-control" id="clave" name="clave" required>
					</div>
					<div class="mb-3">
						<label for="tipo_usuario" class="form-label">Tipo de Usuario:</label>
						<select class="form-select" id="tipo_usuario" name="tipo_usuario" required>
							<option value="" disabled selected>Selecciona un Tipo de Usuario</option>
							<option value="usuario">Usuario</option>
							<option value="bibliotecario">Bibliotecario</option>
							<option value="administrativo">Administrador</option>
						</select>
					</div>
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-md-6">
					<button type="submit" name="btn" class="btn btn-primary">Guardar Usuario</button>
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
