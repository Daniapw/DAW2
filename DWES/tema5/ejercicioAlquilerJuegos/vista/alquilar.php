<?php
require_once '../controlador/JuegoControlador.php';
require_once '../modelo/Juego.php';

$juego=JuegoControlador::getJuego($_GET['juego']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="alquiler.css">

    </head>
    <body>
        <?php        
        include_once 'menu.php';
        ?>
        <section>
            <div class='imagenAlquiler'>
                <img src='<?php echo "../assets/img/$juego->imagen" ?>' class='imagenCaratula'>
            </div>

            <div class='informacionJuego'>
                <h2><?php echo $juego->nombreJuego ?></h2>
                <ul>
                    <li>Consola: <?php echo $juego->nombreConsola ?></li>
                    <li>Año: <?php echo $juego->anno ?></li>
                    <li>Precio: <?php echo $juego->precio ?></li>
                    <li>Alquilado: <?php echo $juego->alquilado ?></li>
                </ul>
            </div>
        </section>
    </body>
</html>
