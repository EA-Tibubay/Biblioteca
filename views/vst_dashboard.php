<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    echo "<script>window.location.href='../views/vst_login.php';</script>";
    exit();
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Menú Lateral con Bootstrap</title>
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
	<link rel="stylesheet" href="../public/css/styles_dashboard.css">

</head>

<body>
	<header class="header bg-dark text-white">
		<div class="container">
			<div class="row">
				<div class="">
					<div class="btn-menu">
						<label for="btn-menu">☰</label>
					</div>

					<div class="text-center">

						<div class="text-end">
							<nav class="menu">
								<a href="#" class="text-white">Inicio</a>
								<a href="#" class="text-white">Nosotros</a>
								<a href="#" class="text-white"></a>
							</nav>
						</div>
					</div>

				</div>


			</div>
		</div>
	</header>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-9 col-sm-12">
				<!-- Contenido principal -->
				<div class="capa">
					<div id="contenido-dinamico"><label id="cerrar-form">✖️</label></div>
				</div>
			</div>

			<div class="col-md-3 col-sm-12">
				<!-- Menú lateral -->
				<input type="checkbox" id="btn-menu">
				<div class="container-menu">
					<div class="cont-menu">
						<nav>
							<ul>
								<li><a href="#" class="text-white">-----</a></li>
								<li><a href="#" id="btn-gestionar-usuarios" class="text-white">Gestionar usuarios</a></li>
								<li><a href="#" id="btn-gestionar-libros" class="text-white">Gestionar libros</a></li>
								<li><a href="#" id="prestamos" class="text-white">Gestionar prestamos</a></li>
								<li><a href="#" id="btn-lista-registros" class="text-white">Lista de registros</a></li>
								<ul class="submenu">
									<li><a href="#" id="lista-usuarios">Usuarios</a></li>
									<li><a href="#" id="lista-libros">Libros</a></li>
									<li><a href="#" id="lista-prestamos">Prestamos</a></li>
								</ul>
								<li><a href="../controllers/cerrar_sesion.php" class="text-white">Cerrar sesión</a></li>
							</ul>
						</nav>
						<label for="btn-menu">✖️</label>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="../public/js/jquery.min.js"></script>
	<script src="../public/js/js_dashboard.js"></script>
	<script>
        $(document).ready(function () {
			
			var tipoRegistro = "<?php echo isset($_SESSION['tipo_registro']) ? $_SESSION['tipo_registro'] : ''; ?>";
			
            switch (tipoRegistro) {
                case 'libros':
					alert('Registro exitoso.');
                    $("#contenido-dinamico").hide().load("./vst_dashboard_reg_l.php", function() {
					$(this).fadeIn(800); 
				});
                    break;
                case 'usuarios':
                    alert('Registro exitoso.');
                    $("#contenido-dinamico").hide().load("./vst_dashboard_reg_u.php", function() {
					$(this).fadeIn(800); 
				});
                    break;
                case 'prestamos':
                    alert('Registro exitoso.');
                    $("#contenido-dinamico").hide().load("./vst_prestamos.php", function() {
					$(this).fadeIn(800); 
				});
                    break;
				case 'vst_l':
					alert('Cambios aplicados correctamente');
                    $("#contenido-dinamico").hide().load("./vst_dashboard_l.php", function() {
					$(this).fadeIn(800);
				});
                    break;
				case 'vst_u':
					alert('Cambios aplicados correctamente');
                    $("#contenido-dinamico").hide().load("./vst_dashboard_u.php", function() {
					$(this).fadeIn(800); 
				});
                    break;
				case 'vst_p':
					alert('Cambios aplicados correctamente');
                    $("#contenido-dinamico").hide().load("./vst_lista_prestamos.php", function() {
					$(this).fadeIn(800); 
				});
                    break;
                default:
                    
                    break;
            }
			
			
			
        });
    </script>
</body>

</html>
