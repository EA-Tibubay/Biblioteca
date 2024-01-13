
$("#cerrarFormulario").click(function () {
	$(".contenedor_l").hide();
	$("#contenido-dinamico").hide().load("./vst_galeria.php", function () {
	$(this).fadeIn(600); 
	});
});

$("#cerrarFormularioPrestamo").click(function () {
	
	$("#formularioPrestamo").hide();
});

$("#botonGuardar").click(function () {
});

$(document).on("click", ".imagenLibro", function () {
	
	var Libro = $(this).closest(".tarjetaLibro").find(".card-title").text();
	var idLibro = $(this).closest(".tarjetaLibro").find(".card-id").text();
	$("#formularioPrestamo").show();
	$("#nombre_libro").val(Libro);
	$("#id_libro").val(idLibro);
});

$(document).ready(function () {
	var tarjetasLibrosOriginal = $("#tarjetasLibros").clone();

	$("#inputBusqueda").on("input", function () {
		var busqueda = $(this).val().toLowerCase();
		var tarjetasLibros = $("#tarjetasLibros");

		tarjetasLibros.replaceWith(tarjetasLibrosOriginal.clone());

		if (busqueda === "") {
			$(".tarjetaLibro").show();
			return;
		}

	
		$(".tarjetaLibro:not(:contains('" + busqueda + "'))").hide();
	});


	jQuery.expr[':'].contains = function (a, i, m) {
		return jQuery(a).text().toUpperCase()
			.indexOf(m[3].toUpperCase()) >= 0;
	};
});

$("#usuario").change(function () {

	var idUsuario = $(this).val();

	$("#id_usuario").val(idUsuario);
});

var fechaInicio = document.getElementById("fecha_inicio");
var fechaFin = document.getElementById("fecha_fin");

var fechaActual = new Date().toISOString().split('T')[0];

fechaInicio.min = fechaActual;

fechaInicio.addEventListener("input", function () {

	fechaFin.min = fechaInicio.value;


	if (fechaFin.value < fechaInicio.value) {
		fechaFin.value = fechaInicio.value;
	}
});

fechaFin.addEventListener("input", function () {

	fechaInicio.max = fechaFin.value;


	if (fechaInicio.value > fechaFin.value) {
		fechaInicio.value = fechaFin.value;
	}
});
