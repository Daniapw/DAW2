<!DOCTYPE html>
<html>
<head></head>
<body>
<?php
REQUIRE 'funcionesJugadores.php';
?>

    <h1>Eliminar jugador</h1>
    <form action="eliminarJugador.php" method="post">
    
        Introduzca el DNI del jugador que quiere eliminar: <input type="text" name="dni"/>
        <?php
        
        if (isset($_POST['enviarDNI'])){
            if (!comprobarDNI('enviarDNI', 'dni'))
                echo "<p style='color:red'>No hay ningun jugador registrado con ese DNI</p>"; 
        }
        
        ?>
        
        <input type="submit" name="enviarDNI" value="Enviar"/>

    </form> 
    <br>

<?php

//Si se ha enviado el formulario y ha sido rellenado correctamente
if (comprobarDNI('enviarDNI', 'dni') && !isset($_POST['btnNo'])){
    
    //Si el usuario ha pulsado el boton 'Si'
    if (isset($_POST['btnSi'])){

        $conex= getConexion();
        
        $conex->query("DELETE FROM jugadores WHERE dni='$_POST[dni]'");
        
        if ($conex->errno==null)
            echo "<h2 style='color:green'>El jugador con el DNI $_POST[dni] ha sido eliminado correctamente</h2>";
        else
            echo $conex->error;
        
        $conex->close();
    }
    //Si aun no ha pulsado un boton
    else{
        //Buscar jugador usando DNI
        $resultados= buscarPorDNI($_POST['dni']);

        echo "<h2>Datos del jugador</h2>";

        //Mostrar datos jugador
        listarJugadores($resultados);
    
?>
        <br>
        <form action="eliminarJugador.php" method="post">
            ¿Seguro que desea eliminar a este jugador?<br>
            
            <input type="hidden" name="enviarDNI"/>
            <input type="hidden" name="dni" value="<?php echo $_POST['dni'] ?>"/>
            
            <input type="submit" name="btnSi" value="Si"/>
            <input type="submit" name="btnNo" value="No"/>
        </form>
    

<?php
    }
}
?>
    <br>
    <a href='index.php'>Volver al indice</a>
</body>
</html>