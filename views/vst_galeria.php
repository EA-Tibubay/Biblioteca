<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galería de Fotos</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <script src="../public/js/jquery.min.js"></script>
    <link rel="stylesheet" href="../public/css/styles_galeria.css">

    <style>
        img {
            height: 250px;
            object-fit: contain;
        }

        #cerrarFormulario {
            width: 32px;
            height: 32px;
        }
    </style>
</head>

<body>

    <?php
    require("../controllers/ctrl_dashboard_reg_l.php");
    $obj_ctrl = new ctrl_reg_l();
    $libros = $obj_ctrl->listarGaleria();
    ?>

    <div class="container mt-5 contenedor_l">
        
        <div class="row row-cols-1 row-cols-md-4 g-4" id="tarjetasFotos">
            <?php
            foreach ($libros as $libro) {
            ?>
                <div class="col tarjetaFoto">
                    <div class="card h-100">
                        
                        <img src="<?php echo $libro['imagen']; ?>" class="card-img-top" alt="Imagen del Libro">
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>

