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
        <!--Menu-->
        <?php        
        include_once 'menu.php';
        ?>
        
        <!--Body-->
        <section class="cuerpoAlquiler">
            <!--Imagen del juego-->
            <div class='imagenAlquiler'>
                <img src='<?php echo "../assets/img/$juego->imagen" ?>'>
            </div>

            <!--Informacion del juego-->
            <div class='informacionJuego'>
                <h2><?php echo $juego->nombreJuego ?></h2>
                <ul>
                    <li>Consola: <?php echo $juego->nombreConsola ?></li>
                    <li>Año: <?php echo $juego->anno ?></li>
                    <li>Precio: <?php echo $juego->precio ?></li>
                    <li>Alquilado: <?php echo $juego->alquilado ?></li>
                </ul>
            </div>
            
            <!--Formulario alquiler-->
            <div class="formAlquiler">
                <form action="#" method="post">
                    <input type="submit" name="alquilar" value="Alquilar" <?php if ($juego->alquilado=="SI") echo 'disabled';?>>
                </form>
            </div>
        </section>
    </body>
</html>
