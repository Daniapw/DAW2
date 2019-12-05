<?php
require_once '../controlador/JuegoControlador.php';
require_once '../controlador/AlquilerControlador.php';
require_once '../modelo/Juego.php';

session_start();

//Si el usuario le ha dado a alquilar
if (isset($_POST['alquilar'])){
    AlquilerControlador::insertAlquiler($_POST['codJuego'], $_SESSION['usuario']);
    JuegoControlador::updateEstadoAlquiler($_POST['codJuego'], "SI");
}

//Juego en cuestion
if (!isset($_POST['alquilar']))
    $juego=JuegoControlador::getJuego($_GET['juego']);
else
    $juego=JuegoControlador::getJuego($_POST['codJuego']);

//Determinar ruta submit formulario alquiler
if (isset($_SESSION['usuario']))
    $ruta="informacionJuego.php";
else
    $ruta="login.php";

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
        <section class="cuerpo">
            <!--Imagen del juego-->
            <?php
            if (isset($_POST['alquilar'])){?>
                <center><p class="mensajeExito">Has alquilado el juego!</p></center>
            <?php
            }?>
            
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
            <?php

            ?>
            <div class="formAlquiler">
                <form action="<?php echo $ruta ?>" method="post">
                    <input class="boton" type="submit" name="alquilar" value="Alquilar" <?php if ($juego->alquilado=='SI') echo "disabled" ?>>
                    <input type="hidden" value="<?php echo $juego->codigo ?>" name="codJuego">
                </form>
            </div>
        </section>
    </body>
</html>
