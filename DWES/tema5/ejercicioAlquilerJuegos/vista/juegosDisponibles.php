<?php
require_once '../controlador/JuegoControlador.php';
require_once '../modelo/Juego.php';

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
                //Obtener lista de juegos disponibles
                $juegos=JuegoControlador::getJuegosDisponibles();
        
                //Mostrar lista
                
                if (!empty($juegos)){
                    foreach($juegos as $juego){
                    ?>
                        <div class='juegoIndex'>
                            <a href='informacionJuego.php?juego=<?php echo $juego->codigo ?>'><img src='<?php echo "../assets/img/$juego->imagen"?>' class='imagenCaratula'></a>
                            <div>
                                <p class='tituloJuego'><?php echo $juego->nombreJuego?></p>
                            </div>
                        </div>
                    <?php
                    }
                }
                else{
                    echo "<center><h1>Lo sentimos, no hay juegos disponibles</h1></center>";
                }
            ?>
        </section>
    </body>
</html>