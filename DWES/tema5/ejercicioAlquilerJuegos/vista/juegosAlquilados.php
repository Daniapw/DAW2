<?php
require_once '../controlador/AlquilerControlador.php';
require_once '../controlador/JuegoControlador.php';
require_once '../controlador/UsuarioControlador.php';
require_once '../modelo/Juego.php';
require_once '../modelo/Alquiler.php';
require_once '../modelo/Usuario.php';


//Iniciar sesion
session_start();

if (!isset($_SESSION['usuario']))
    header("Location: index.php");
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
                $alquileres= AlquilerControlador::getAlquileres();
        
                //Si hay juegos alquilados se muestran
                if (!empty($alquileres)){
                    foreach ($alquileres as $alquiler){
                        $juego= JuegoControlador::getJuego($alquiler->codJuego);
                        $usuarioAlq= UsuarioControlador::getUsuario($alquiler->dniCliente);
                        
                    ?>
                        <div class='juegoIndex'>
                            <a href='informacionJuego.php?juego=<?php echo $juego->codigo ?>'><img src='<?php echo "../assets/img/$juego->imagen"?>' class='imagenCaratula'></a>
                            <div>
                                <p class='tituloJuego'><?php echo $juego->nombreJuego?></p>
                                <p>Alquilado por <?php echo $usuarioAlq->nombre?></p>
                            </div>
                        </div>
                    <?php
                    }
                }
                //Si no se muestra un mensaje
                else{
                    echo "<center><h1>No hay ningun juego alquilado</h1></center>";
                }
            ?>
        </section>
    </body>
</html>
