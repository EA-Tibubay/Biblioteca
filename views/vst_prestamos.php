<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Listado de Libros</title>
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
	<script src="../public/js/jquery.min.js"></script>
	<script src="../public/js/js_prestamos.js"></script>
	<link rel="stylesheet" href="../public/css/styles_prestamos.css">
</head>

<body>

	<?php
    require("../controllers/ctrl_dashboard_reg_l.php");
    $obj_ctrl = new ctrl_reg_l();
    $libros = $obj_ctrl->listarl();
    $usuarios = $obj_ctrl->listarUsuarios();
    ?>

	<div class="container mt-5 contenedor_l">
		<div class="d-flex titulo alert-primary align-items-center justify-content-between mt-3">
			<h4>LISTADO DE LIBROS</h4>
			<img id="cerrarFormulario" src="../public/ico/cerrar.png">
		</div>
		<div class="mb-3">
			<input type="text" id="inputBusqueda" class="form-control" placeholder="Buscar libros...">
		</div>

		<div class="row row-cols-1 row-cols-md-4 g-4" id="tarjetasLibros">
			<?php
            foreach ($libros as $libro) {
            ?>

			<div class="col tarjetaLibro">
				<div class="card h-100">
					<img src="<?php echo $libro['imagen']; ?>" class="card-img-top imagenLibro" alt="Imagen del Libro">
					<div class="card-body">
						<h5 class="card-title"><?php echo $libro['titulo']; ?></h5>
						<p class="card-id"><?php echo $libro['id_libro']; ?></p>
						<p class="card-text"><strong>Autor:</strong> <?php echo $libro['autor']; ?></p>
						<p class="card-text"><strong>Fecha de Publicación:</strong> <?php echo $libro['anio_publicacion']; ?></p>
						<p class="card-text"><strong>Género:</strong> <?php echo $libro['genero']; ?></p>
						<p class="card-text"><strong>Disponibilidad:</strong> <?php echo $libro['disponibilidad']; ?></p>
					</div>
				</div>
			</div>
			<?php
            }
            ?>
		</div>
	</div>

	<div id="formularioPrestamo">
		<div id="cerrarFormularioPrestamo">X</div>
		<form action="../router/enr_prestamos.php" method="post">
			<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
				<div style="width: 48%;">
					<label for="id_libro">ID del Libro:</label>
					<input type="num" id="id_libro" name="id_libro" readonly>
				</div>
				<div style="width: 48%;">
					<label for="nombre_libro">Nombre del Libro:</label>
					<input type="text" id="nombre_libro" name="nombre_libro" readonly>
				</div>

			</div>

			<label for="id_usuario">Usuario:</label>
			<select id="id_usuario" name="id_usuario">
				<?php
            
            foreach ($usuarios as $usuario) {
            
				$idUsuario = $usuario['id_usuario'];
				$nombreUsuario = $usuario['nombre'] . ' ' . $usuario['apellidos'];
            ?>
				<option value="<?php echo $idUsuario; ?>"><?php echo $nombreUsuario;?></option>
				<?php
            }
            ?>
			</select>

			<div id="nombrePrestamo">Fecha del Préstamo:</div>

			<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
				<div style="width: 48%;">
					<label for="fecha_inicio">Fecha de Inicio:</label>
					<input type="date" id="fecha_inicio" name="fecha_inicio" required>
				</div>
				<div style="width: 48%;">
					<label for="fecha_fin">Fecha Fin:</label>
					<input type="date" id="fecha_fin" name="fecha_fin" required>
				</div>
			</div>

			<div id="botonGuardarContainer">
				<button type="submit" name="btn" class="btn btn-primary">Guardar</button>
			</div>
		</form>
	</div>

</body>

</html>
