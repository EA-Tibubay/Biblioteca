<!DOCTYPE html>
<html lang="es">

<head>
	<title>Listado de Libros</title>
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
	<script src="../public/js/jquery.min.js"></script>
	<script src="../public/js/jquery.dataTables.min.js"></script>
	<script src="../public/js/js_formularios.js"></script>
	
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
	require("../controllers/ctrl_dashboard_reg_u.php");
	$obj_ctrl = new ctrl_reg_u();
	$libros = $obj_ctrl->listarUsuarios();
	?>

	<div class="container contenedor_l">
		<div class="d-flex titulo alert-primary align-items-center justify-content-between mt-3">
			<h4>LISTADO DE Usuarios</h4>
			<img id="cerrarFormulario" src="../public/ico/cerrar.png">
		</div>

		<div class="table-container">
			<table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
				<thead>
					<tr>
						<th>ID Usuario</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Ci</th>
						<th>Correo Electronico</th>
						<th>Tipo De Usuario</th>
						<th>Eliminar</th>
						<th>Modificar</th>
					</tr>
				</thead>
				<tbody>
					<?php
				while ($libro = mysqli_fetch_assoc($libros)) {
					echo "<tr>";
					echo "<td class='card_id'>" . $libro['id_usuario'] . "</td>";
					echo "<td class='card-nombre'>" . $libro['nombre'] . "</td>";
					echo "<td class='card-apellidos'>" . $libro['apellidos'] . "</td>";
					echo "<td class='card-ci'>" . $libro['ci'] . "</td>";
					echo "<td class='card-correo'>" . $libro['correo_electronico'] . "</td>";
					echo "<td class='card-tipo'>" . $libro['tipo_usuario'] . "</td>";
					echo "<td><a href='../router/enr_dashboard_reg_u.php?id_usuario=" . $libro['id_usuario'] . "'><img src='../public/ico/Trash_Can.ico'></a></td>";

					echo "<td class='cont_ico'><a href='#' class='bi bi-pencil' data-toggle='modal'><img src='../public/ico/Edit_Property.ico' class='icono'></a></td>";
					echo "</tr>";
					
				}
				?>
				</tbody>
				<tfoot>
					<tr>
						<th>ID Usuario</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Ci</th>
						<th>Correo Electronico</th>
						<th>Tipo De Usuario</th>
						<th>Eliminar</th>
						<th>Modificar</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>

	<div id="formulario">
		<div id="cerrarFormulariom" style="width: 100%;">X</div>
		<form action="../router/enr_dashboard_reg_u.php" method="post">
			<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
				<div style="width: 48%;">
					<label for="nombre">Nombre:</label>
					<input type="text" id="nombre" name="nombre">
				</div>
				<div style="width: 48%;">
					<label for="apellidos">Apellidos:</label>
					<input type="text" id="apellidos" name="apellidos">
				</div>

			</div>

			<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
				<div style="width: 48%;">
					<label for="ci">Cedula de identidad:</label>
					<input type="num" id="ci" name="ci" required>
				</div>
				<div style="width: 48%;">
					<label for="correo_electronico">Correo electronico:</label>
					<input type="email" id="correo_electronico" name="correo_electronico" required>
				</div>
			</div>

			<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
				<div style="width: 100%;">
					<label for="tipo_usuario" class="form-label">Tipo de Usuario:</label>
					<select class="form-select" id="tipo_usuario" name="tipo_usuario" required>
						<option value="" id="tipo" name="tipo_usuario" disabled selected>Selecciona un Tipo de Usuario</option>
						<option value="usuario">Usuario</option>
						<option value="bibliotecario">Bibliotecario</option>
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
