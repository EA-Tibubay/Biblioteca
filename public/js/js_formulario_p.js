// Manejar el clic en el botón de cerrar formulario de préstamo
$("#cerrarFormulario").click(function () {
	$("#formulario").hide();
});

$("#cerrarFormulariom").click(function () {
	$("#formulario").hide();
});

$(document).on("click", ".icono", function () {
    
    var id = $(this).closest("tr").find(".card_id").text();
    var nom = $(this).closest("tr").find(".card-nombre").text();
    var app = $(this).closest("tr").find(".card-apellidos").text();
    var ci = $(this).closest("tr").find(".card-inicio").text();
    var correo = $(this).closest("tr").find(".card-fin").text();
	var tipo = $(this).closest("tr").find(".card-dis").text();
    
    $("#formulario").show();
    $("#card-id").val(id);
    $("#nombre").val(nom);
    $("#apellidos").val(app);
    $("#fecha_inicio").val(ci);
    $("#fecha_fin").val(correo);
    $("#tipo_usuario").val(tipo);
    
});
