<?php
require_once '../controlador/JuegoControlador.php';
require_once '../modelo/Juego.php';

//Iniciar sesion
session_start();

//Control Eliminar juego
if (isset($_SESSION['usuario'])){
    
    if (isset($_POST['eliminarJuego']) && $_SESSION['tipoUsuario']=='admin')
        $juegoEliminado=JuegoControlador::eliminarJuego($_POST['codigoJuegoEliminar']);  
}
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
        <section class="cuerpo">
            <?php
                //Mostrar boton para anadir juegos en caso de que el usuario sea admin
                if (isset($_SESSION['usuario'])){

                    if ($_SESSION['tipoUsuario']=='admin'){
                    ?>
                        <center>
                            <form action="anadirJuegos.php" method="post">
                                <input type="submit" class="boton" value="Anadir juego">
                            </form>
                        </center>
                    <?php
                    }
                }
            
                //Mensaje eliminar juego
                if (isset($_POST['eliminarJuego'])){
                    if ($juegoEliminado)
                        echo "<center><p class='mensajeExito'>Juego eliminado con exito</p></center>";
                    else
                        echo "<center><p class='mensajeError'>Error al eliminar juego</p></center>";
                }
                
                
                //Obtener lista de juegos
                $juegos=JuegoControlador::getAllJuegos();
        
                //Mostrar lista
                foreach($juegos as $juego){
                ?>
                    <div class='juegoIndex'>
                        <a href='informacionJuego.php?juego=<?php echo $juego->codigo ?>'><img src='<?php echo "../assets/img/$juego->imagen"?>' class='imagenCaratula'></a>
                        <div>
                            <p class='tituloJuego'><?php echo $juego->nombreJuego?></p>
                            
                            <?php
                            //Mostrar controles de administrador
                            if (isset($_SESSION['usuario'])){
                            
                                if ($_SESSION['tipoUsuario']=='admin'){
                            ?>
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="codigoJuegoEliminar" value="<?php echo $juego->codigo ?>">
                                        <input type="submit" name="eliminarJuego" class="boton" value="Eliminar juego" <?php if ($juego->alquilado=='SI') echo 'disabled' ?>>
                                    </form><br>

                                    <form action="modificarJuego.php" method="post">
                                        <input type="hidden" name="codigoJuegoModificar" value="<?php echo $juego->codigo ?>">
                                        <input type="submit" name="modificarJuego" class="boton" value="Modificar juego">
                                    </form>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                <?php
                }
            ?>
        </section>
    </body>
</html>
