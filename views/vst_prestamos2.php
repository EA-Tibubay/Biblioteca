<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Listado de Libros</title>
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
</head>

<body>
	<div class="container mt-5">
        <h2>Formulario de Préstamo</h2>

        <form action="../router/enr_prestamos.php" method="post">
            <div class="mb-3">
                <label for="id_libro" class="form-label">ID del Libro:</label>
                <input type="text" class="form-control" id="id_libro" name="id_libro" required>
            </div>

            <div class="mb-3">
                <label for="id_usuario" class="form-label">ID del Usuario:</label>
                <input type="text" class="form-control" id="id_usuario" name="id_usuario" required>
            </div>

            <div class="mb-3">
                <label for="fecha_prestamo" class="form-label">Fecha de Préstamo:</label>
                <input type="date" class="form-control" id="fecha_prestamo" name="fecha_prestamo" required>
            </div>

            <div class="mb-3">
                <label for="fecha_devolucion" class="form-label">Fecha de Devolución:</label>
                <input type="date" class="form-control" id="fecha_devolucion" name="fecha_devolucion" required>
            </div>

            <button type="submit" name="btn" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</body>

</html>
