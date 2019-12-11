<?php
require_once '../controlador/JuegoControlador.php';
require_once '../controlador/AlquilerControlador.php';
require_once '../modelo/Juego.php';

session_start();

//Si el usuario le ha dado a alquilar
if (isset($_POST['alquilar'])){
    $resultadoAlquiler=AlquilerControlador::insertAlquiler($_POST['codJuego'], $_SESSION['usuario']);
    
    //Si se ha podido crear el alquiler con exito
    if ($resultadoAlquiler)
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
            //Mensaje de alquiler 
            if (isset($resultadoAlquiler)){
                if ($resultadoAlquiler)
                    echo "<center><p class='mensajeExito'>Has alquilado '$juego->nombreJuego'!</p></center>";
                else
                    echo "<center><p class='mensajeError'>Ha habido un error al procesar el alquiler</p></center>";
            }?>
            
            <!--Imagen juego-->
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
                <form action="<?php echo $ruta ?>" method="post">
                    <input type="submit" name="alquilar" class="boton" value="<?php if ($juego->alquilado=='SI') echo "No disponible"; else echo "Alquilar"; ?>" <?php if ($juego->alquilado=='SI') echo "disabled" ?>>
                    <input type="hidden" value="<?php echo $juego->codigo ?>" name="codJuego">
                </form>
            </div>
            
            
            <?php
            //Mostrar controles de administrador
            if (isset($_SESSION['usuario'])){

                if ($_SESSION['tipoUsuario']=='admin'){
            ?>
                    <div class="formAlquiler">
                        <form action="index.php" method="post">
                            <input type="hidden" name="codigoJuegoEliminar" value="<?php echo $juego->codigo ?>">
                            <input type="submit" class="boton" name="eliminarJuego" value="Eliminar juego" <?php if ($juego->alquilado=='SI') echo 'disabled' ?>>
                        </form><br>

                        <form action="modificarJuego.php" method="post">
                            <input type="hidden" name="codigoJuegoModificar" value="<?php echo $juego->codigo ?>">
                            <input type="submit" class="boton" name="modificarJuego" value="Modificar juego">
                        </form>
                    </div>
            <?php
                }
            }
            ?>
        </section>
    </body>
</html>
