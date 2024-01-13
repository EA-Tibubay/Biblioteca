<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Formulario de Gestión de Usuario</title>
	<link rel="stylesheet" href="../public/css/styles_dashboard_reg_u.css">
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
</head>

<body>

	<!-- Contenedor principal de la página -->
	<div class="container">
		<!-- Formulario de Gestión de prestamsos-->
		<form id="formularioPrestamo">
           
           <div class="row mt-3">
				<div class="d-flex align-items-center justify-content-between">
					<h4 class="form-label">Formulario de registro de prestamos</h4>
					<img id="cerrarFormulario" src="../public/ico/cerrar.png">
				</div>
			</div>
           
            <div class="row mt-3">
                <!-- Primera columna -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="id_libro" class="form-label">ID del Libro:</label>
                        <input type="number" class="form-control" id="id_libro" name="id_libro" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_usuario" class="form-label">ID del Usuario:</label>
                        <input type="number" class="form-control" id="id_usuario" name="id_usuario" required>
                    </div>
                    
                </div>

                <!-- Segunda columna -->
                <div class="col-md-6">
                   <div class="mb-3">
                        <label for="fecha_prestamo" class="form-label">Fecha de Préstamo:</label>
                        <input type="date" class="form-control" id="fecha_prestamo" name="fecha_prestamo" required>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_devolucion" class="form-label">Fecha de Devolución:</label>
                        <input type="date" class="form-control" id="fecha_devolucion" name="fecha_devolucion">
                    </div>
                </div>
            </div>

            <!-- Botón de enviar en la última fila -->
            <div class="row mt-3">
                <div class="col-md-6">
                   
                   
                    <button type="submit" class="btn btn-primary">Registrar Préstamo</button>
                </div>
            </div>
        </form>
	</div>

	<script src="../public/js/bootstrap.bundle.min.js"></script>
	<script src="../public/js/jquery.min.js"></script>
	<script>
		
		$("#cerrarFormulario").click(function() {
			
			$("#formularioPrestamo").hide();
		});

	</script>
</body>

</html>
