		$(document).ready(function () {

			
			function cargarVistaPorDefecto() {
				$("#contenido-dinamico").hide().load("./vst_galeria.php", function () {
					$(this).fadeIn(600);
				});
			}

			
			cargarVistaPorDefecto();

			
			$("#btn-gestionar-usuarios").click(function (event) {
				event.preventDefault();
				$("#contenido-dinamico").load("./vst_dashboard_reg_u.php");
				$("#btn-menu").prop("checked", false);
			});

			
			$("#btn-gestionar-libros").click(function (event) {
				event.preventDefault();
				$("#contenido-dinamico").load("./vst_dashboard_reg_l.php");
				$("#btn-menu").prop("checked", false);
			});

			
			$("#btn-gestionar-libros").click(function (event) {
				event.preventDefault();
				$("#contenido-dinamico").load("./vst_dashboard_reg_l.php");
				$("#btn-menu").prop("checked", false);
			});

			
			$("#prestamos").click(function (event) {
				event.preventDefault();
				$("#contenido-dinamico").hide().load("./vst_prestamos.php", function () {
					$(this).fadeIn(600);
				});
				$("#btn-menu").prop("checked", false);
			});

			
			$("#lista-libros").click(function (event) {
				event.preventDefault();
				$("#contenido-dinamico").hide().load("./vst_dashboard_l.php", function () {
					$(this).fadeIn(600);
				});
				$("#btn-menu").prop("checked", false);
			});

			
			$("#lista-usuarios").click(function (event) {
				event.preventDefault();
				$("#contenido-dinamico").hide().load("./vst_dashboard_u.php", function () {
					$(this).fadeIn(600);
				});
				$("#btn-menu").prop("checked", false);
			});

			
			$("#lista-prestamos").click(function (event) {
				event.preventDefault();
				$("#contenido-dinamico").hide().load("./vst_lista_prestamos.php", function () {
					$(this).fadeIn(600);
				});
				$("#btn-menu").prop("checked", false);
			});


			
			$('#btn-lista-registros').click(function (event) {
				event.preventDefault();
				$('.submenu').toggle();
			});

			
			$('.submenu').hide();

		});
