<?php
require_once '../controlador/JuegoControlador.php';
require_once '../modelo/Juego.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="alquiler.css">
    </head>
    <body>
        <!--Menu-->
        <?php
            include_once 'menu.php';
        ?>
        
        <!--Seccion juegos -->
        <section class="cuerpoAlquiler">
            <?php
                $juegos=JuegoControlador::getAllJuegos();
        
                while ($registro=$juegos->fetch_object()){
                    $juego=new Juego($registro->Codigo, $registro->Nombre_juego, $registro->Nombre_consola, $registro->Anno, $registro->Precio, $registro->Alguilado);

                    echo $juego->mostrarFormatoIndex();
                }
            ?>
        </section>
    </body>
</html>
