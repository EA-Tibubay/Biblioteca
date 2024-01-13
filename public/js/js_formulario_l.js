
$("#cerrarFormulario").click(function () {
	$("#formulario").hide();
});

$("#cerrarFormulariom").click(function () {
	$("#formulario").hide();
});

$(document).on("click", ".icono", function () {
	var id = $(this).closest("tr").find(".card_id").text();
	var tit = $(this).closest("tr").find(".card_titulo").text();
	var aut = $(this).closest("tr").find(".card_autor").text();
	var edi = $(this).closest("tr").find(".card_editorial").text();
	var ani = $(this).closest("tr").find(".card_anio").text();
	var gen = $(this).closest("tr").find(".card_genero").text();
	var img = $(this).closest("tr").find(".card_imagen img").attr("src");
	$("#vista_previa_imagen").attr("src", img);
	console.log(gen);
	console.log(img);
	$("#formulario").show();
	$("#card-id").val(id);
	$("#titulo").val(tit);
	$("#autor").val(aut);
	$("#editorial").val(edi);
	$("#anio_publicacion").val(ani);
	$("#genero").val(gen);
	$("#ruta_imagen").val(img);

});
