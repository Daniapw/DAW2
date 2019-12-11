<?php
require_once '../controlador/JuegoControlador.php';
require_once '../controlador/AlquilerControlador.php';
require_once '../modelo/Juego.php';
require_once '../modelo/Alquiler.php';


session_start();

//Redirigir si es necesario
if (!isset($_SESSION['usuario']))
    header("Location: index.php");

//Si el usuario le ha dado a devolver
if (isset($_POST['devolver']))
    $resultadoDev=AlquilerControlador::devolverJuego($_POST['codJuegoDev'], $_POST['fechaAlqJuegoDev'], $_SESSION['usuario']);


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
            
            <center> <h1>Mis juegos alquilados</h1></center>
            <?php
                //Mensaje devolucion
                if (isset($_POST['devolver'])){
                    if ($resultadoDev)
                        echo "<center><h2 style='color:green'>Has devuelto '$_POST[nombreJuegoDev]' con exito! </h2></center>";
                    else
                        echo "<center><h2 style='color:red'>Ha habido un error al devolver '$_POST[nombreJuegoDev]' </h2></center>";

                }
                
                //Alquileres del usuario
                $alquileres= AlquilerControlador::getAlquileresUsuario($_SESSION['usuario']);
                
                //Si ha alquilado algun juego se muestra una tabla con informacion de dichos alquileres
                if (!empty($alquileres)){
                    ?>
                    
                    <table border='1px solid' class='tablaAlquileres'>
                    <tr>
                            <th>Caratula</th>
                            <th>Nombre</th>
                            <th>Plataforma</th>
                            <th>Fecha alquiler</th>
                            <th>Fecha devolucion límite</th>
                            <th>Precio</th>
                            <th>Devolver</th>
                    </tr>
                    
                    <?php
                    
                    //Mostrar cada alquiler con informacion 
                    foreach($alquileres as $alquiler){
                        $juegoAlq= JuegoControlador::getJuego($alquiler->codJuego);
                        
                        //Crear fila con informacion del juego en la tabla
                    ?>
                        <tr>
                            <td><img class='miniaturaAlq' src='<?php echo "../assets/img/$juegoAlq->imagen"?>'></td>
                            <td><?php echo $juegoAlq->nombreJuego ?></td>
                            <td><?php echo $juegoAlq->nombreConsola ?></td>
                            <td><?php echo $alquiler->fechaAlquiler ?></td>
                            <td><?php echo $alquiler->fechaDevol ?></td>
                            <td><?php echo $alquiler->calcularPrecio()."€" ?></td>
                            <td>
                                <form action='misJuegosAlquilados.php' method="post">
                                    <input type='hidden' name='fechaAlqJuegoDev' value='<?php echo $alquiler->fechaAlquiler ?>'>
                                    <input type='hidden' name='codJuegoDev' value='<?php echo $alquiler->codJuego ?>'>
                                    <input type='hidden' name='nombreJuegoDev' value='<?php echo $juegoAlq->nombreJuego ?>'>
                                    <input type='submit' name='devolver' value='Devolver'>
                                </form>
                            </td>
                        </tr>;
                    <?php
                  
                    }
                    
                    echo "</table>";
                }
                //Si no lo ha hecho se muestra un mensaje
                else
                    echo "<center><p>No has alquilado ningun juego</p></center>";
            
            ?>
        </section>
    </body>
</html>