
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
    var ci = $(this).closest("tr").find(".card-ci").text();
    var correo = $(this).closest("tr").find(".card-correo").text();
	var tipo = $(this).closest("tr").find(".card-tipo").text();
    
  
    $("#formulario").show();
    $("#card-id").val(id);
    $("#nombre").val(nom);
    $("#apellidos").val(app);
    $("#ci").val(ci);
    $("#correo_electronico").val(correo);
    $("#tipo_usuario").val(tipo);
    
});
