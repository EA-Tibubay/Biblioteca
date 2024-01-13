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
                    $("#contenido-dinamico").hide().load("./vst_dashboard_reg_l.php", function() {
					$(this).fadeIn(800);
				});
                    break;
                default:
                    
                    break;
            }
        });