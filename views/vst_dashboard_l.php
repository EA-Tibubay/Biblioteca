<!DOCTYPE html>
<html lang="es">

<head>
	<title>Listado de Libros</title>
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
	<script src="../public/js/jquery.min.js"></script>
	<script src="../public/js/jquery.dataTables.min.js"></script>
	<script src="../public/js/js_formulario_l.js"></script>
	<link rel="stylesheet" href="../public/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="../public/css/styles_dashboard_l.css">
	<link rel="stylesheet" href="../public/css/styles_formularios.css">

	<script>
		$(document).ready(function() {
			var table = $('#example').DataTable({
				responsive: true
			});

			new $.fn.dataTable.FixedHeader(table);
		});

	</script>
</head>

<body>

	<?php
	require("../controllers/ctrl_dashboard_reg_l.php");
	$obj_ctrl = new ctrl_reg_l();
	$libros = $obj_ctrl->listarLibros();
	?>

	<div class="container contenedor_l">
		<div class="d-flex titulo alert-primary align-items-center justify-content-between mt-3">
			<h4>LISTADO DE LIBROS</h4>
			<img id="cerrarFormulario" src="../public/ico/cerrar.png">
		</div>

		<div class="table-container">
			<table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
				<thead>
					<tr>
						<th>ID Libro</th>
						<th>Título</th>
						<th>Autor</th>
						<th>Editorial</th>
						<th>Año de Publicación</th>
						<th>Género</th>
						<th>Imagen</th>
						<th>Disponibilidad</th>
						<th>Eliminar</th>
						<th>Modificar</th>
					</tr>
				</thead>
				<tbody>
					<?php
				while ($libro = mysqli_fetch_assoc($libros)) {
					echo "<tr>";
					echo "<td class='card_id'>" . $libro['id_libro'] . "</td>";
					echo "<td class='card_titulo'>" . $libro['titulo'] . "</td>";
					echo "<td class='card_autor'>" . $libro['autor'] . "</td>";
					echo "<td class='card_editorial'>" . $libro['editorial'] . "</td>";
					echo "<td class='card_anio'>" . $libro['anio_publicacion'] . "</td>";
					echo "<td class='card_genero'>" . $libro['genero'] . "</td>";
					echo "<td class='card_imagen'><img src='" . $libro['imagen'] . "' width='70' height='70'></td>";
					echo "<td class='card_dis'>" . $libro['disponibilidad'] . "</td>";
					echo "<td class='cont_ico'><a href='../router/enr_dashboard_reg_l.php?id_libro=" . $libro['id_libro'] . "'><img src='../public/ico/Trash_Can.ico'></a></td>";

					echo "<td class='cont_ico'><a href='#' class='bi bi-pencil' data-toggle='modal'><img src='../public/ico/Edit_Property.ico' class='icono'></a></td>";
					echo "</tr>";
				}
				?>
				</tbody>
				<tfoot>
					<tr>
						<th>ID Libro</th>
						<th>Título</th>
						<th>Autor</th>
						<th>Editorial</th>
						<th>Año de Publicación</th>
						<th>Género</th>
						<th>Imagen</th>
						<th>Disponibilidad</th>
						<th>Eliminar</th>
						<th>Modificar</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>

	
	<div id="formulario" style="width: 50%;">
		<div id="cerrarFormulariom" style="width: 100%;">X</div>
		
		<form action="../router/enr_dashboard_reg_l.php" method="post" enctype="multipart/form-data">

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
						
						<input type="hidden" id="ruta_imagen" name="ruta_imagen">

						<div class="form-group">
							
							<img id="vista_previa_imagen" src="" alt="Vista previa de la imagen" style="max-width: 45px; max-height: 45px">

							
							<input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
						</div>
					</div>
				</div>
				<div>
					<input type="num" id="card-id" name="card-id" class="card-id">
				</div>
			</div>

			
			<div class="row mt-3">
				<div class="col-md-6">
					<button type="submit" name="modificar" class="btn btn-primary">Guardar Cambios</button>
				</div>
			</div>
		</form>
	</div>

	<script>
		
		$("#cerrarFormulario").click(function() {
			
			$(".contenedor_l").hide();
			$("#contenido-dinamico").hide().load("./vst_galeria.php", function() {
				$(this).fadeIn(600);
			});
		});

	</script>

</body>

</html>
