<!DOCTYPE html>
<html lang="es">

<head>
	<title>Listado de Prestamos</title>
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
	<script src="../public/js/jquery.min.js"></script>
	<script src="../public/js/jquery.dataTables.min.js"></script>
	<script src="../public/js/js_formulario_p.js"></script>
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
	require("../controllers/ctrl_prestamos.php");
	$obj_ctrl = new ctrl_pre();
	$prestamos = $obj_ctrl->listarPrestamos();
	?>

	<div class="container contenedor_l">
		<div class="d-flex titulo alert-primary align-items-center justify-content-between mt-3">
			<h4>LISTADO DE Prestamos</h4>
			<img id="cerrarFormulario" src="../public/ico/cerrar.png">
		</div>

		<div class="table-container">
			<table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
				<thead>
					<tr>
						<th>ID Prestamo</th>
						<th>Nombre Usuario</th>
						<th>Apellidos Usuario</th>
						<th>Nombre Libro</th>
						<th>Fecha Prestamo</th>
						<th>Fecha Devolucion</th>
						<th>Disponibilidad</th>
						<th>Eliminar</th>
						<th>Modificar</th>
					</tr>
				</thead>
				<tbody>
					<?php
					while ($prestamo = mysqli_fetch_assoc($prestamos)) {
						echo "<tr>";
						echo "<td class='card_id'>" . $prestamo['id_prestamo'] . "</td>";
						echo "<td class='card-nombre'>" . $prestamo['nombre_usuario'] . "</td>";
						echo "<td class='card-apellidos'>" . $prestamo['apellidos_usuario'] . "</td>";
						echo "<td>" . $prestamo['nombre_libro'] . "</td>";
						echo "<td class='card-inicio'>" . $prestamo['fecha_prestamo'] . "</td>";
						echo "<td class='card-fin'>" . $prestamo['fecha_devolucion'] . "</td>";
						echo "<td class='card-dis'>" . $prestamo['disponibilidad'] . "</td>";
						echo "<td class='cont_ico'><a href='../router/enr_prestamos.php?id_prestamo=" . $prestamo['id_prestamo'] . "'><img src='../public/ico/Trash_Can.ico' class='icono'></a></td>";
						echo "<td class='cont_ico'><a href='#' class='bi bi-pencil' data-toggle='modal'><img src='../public/ico/Edit_Property.ico' class='icono'></a></td>";
						echo "</tr>";
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<th>ID Prestamo</th>
						<th>Nombre Usuario</th>
						<th>Apellidos Usuario</th>
						<th>Nombre Libro</th>
						<th>Fecha Prestamo</th>
						<th>Fecha Devolucion</th>
						<th>Disponibilidad</th>
						<th>Eliminar</th>
						<th>Modificar</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>

	<!-- Formulario de préstamo -->
	<div id="formulario">
		<div id="cerrarFormulariom" style="width: 100%;">X</div>
		<form action="../router/enr_prestamos.php" method="post">
			<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
				<div style="width: 48%;">
					<label for="nombre">Nombre:</label>
					<input type="text" id="nombre" name="nombre" readonly>
				</div>
				<div style="width: 48%;">
					<label for="apellidos">Apellidos:</label>
					<input type="text" id="apellidos" name="apellidos" readonly>
				</div>

			</div>

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

			<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
				<div style="width: 100%;">
					<label for="tipo_usuario" class="form-label">Disponibilidad:</label>
					<select class="form-select" id="tipo_usuario" name="tipo_usuario" required>
						<option value="" id="tipo" name="tipo_usuario" disabled selected>Selecciona un Tipo de Usuario</option>
						<option value="disponible">disponible</option>
						<option value="prestado">prestado</option>
					</select>
				</div>
				<div>
					<input type="num" id="card-id" name="card-id" class="card-id">
				</div>
			</div>
			
			<div id="botonGuardarContainer">
				<button type="submit" name="modificar" class="btn btn-primary">Guardar Cambios</button>
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
