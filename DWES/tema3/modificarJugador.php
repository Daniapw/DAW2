<!DOCTYPE html>
<html>
<head></head>
<body>
<?php
REQUIRE 'funcionesJugadores.php';


//Booleans para los errores
$errores=array(
    "errorNombre" => false,
    "errorEquipo"=> false,
    "errorNumGoles" => false,
    "errorPosicion" => false);

$dniNoExiste=false;

function comprobarDNI(&$dniNoExiste){
    if (isset($_POST['enviarDNI'])){
        
        $resultado=buscarPorDNI($_POST['dni']);
        
        if ($resultado->num_rows==0){
            $dniNoExiste=true;
            return false;
        }
        
        return true;
    }
    
    return false;
}

//Si se ha enviado el formulario y ha sido rellenado correctamente
if (isset($_POST['enviarDNI']) && comprobarDNI($dniNoExiste)){
    
    $conex= getConexion();
    
    $resultados= buscarPorDNI($_POST['dni']);
    
    echo "<h1>Datos del jugador</h1>";
    
    //Mostrar datos jugador
    listarJugadores($resultados);
    
    
    $jugador=$resultados->fetch_object();
    var_dump($jugador);
    ?>
    <br>
    <h1>Modificar datos</h1>
    <form action="modificarJugador.php" method="post">
        Nombre: <input type="text" name="nombre" value="<?php echo $jugador->nombre; ?>" />
        <?php
        if (isset($_POST['enviar']) && $errores["errorNombre"]){
            echo "Introduzca un nombre valido";
        }
        
        ?>
        <br>
        
        DNI: <input type="text" name="dni" disabled value="<?php echo rellenarInputTexto("dni", "enviar") ?>" />
        <br>
        
        Dorsal: 
        <select name="dorsal">
            <?php
            //Imprimir opciones
            for ($i=0; $i<11; $i++){
                echo "<option value=".($i+1)." ". elegirSelect("dorsal", ($i+1), "enviar") ." >".($i+1)."</option>";
            }
            ?>
        </select><br>
        
        Equipo: <input type="text" name="equipo" value="<?php if (!$errores["errorEquipo"]) echo rellenarInputTexto("equipo", "enviar") ?>" />
        <?php
        if (isset($_POST['enviar']) && $errores["errorEquipo"]){
            echo "Introduzca un equipo valido";
        }
        ?>
        <br>
        
        Numero de goles: <input type="text" name="numGoles" value="<?php if (!$errores["errorNumGoles"]) echo rellenarInputTexto("numGoles", "enviar") ?>" />
        <?php
        if (isset($_POST['enviar']) && $errores["errorNumGoles"]){
            echo "Introduzca un numero valido";
        }
        ?>
        <br>
        
        Posicion: 
        <select name="posicion[]" multiple>
            <option value="1" <?php echo elegirSelectMultiple("posicion", "1", "enviar")?>>Portero</option>
            <option value="2" <?php echo elegirSelectMultiple("posicion", "2", "enviar")?>>Defensa</option>
            <option value="4" <?php echo elegirSelectMultiple("posicion", "4", "enviar")?>>Centrocampista</option>
            <option value="8" <?php echo elegirSelectMultiple("posicion", "8", "enviar")?>>Delantero</option>
        </select>
        <?php
        if (isset($_POST['enviar']) && $errores["errorPosicion"]){
            echo "Seleccione una posicion";
        }
        ?>
        <br>
        
        <input type="hidden" name="dni" value="<?php echo $_POST['dni'] ?>"/>
        <input type="hidden" name="enviarDNI" value="<?php echo $_POST['enviarDNI'] ?>"/>
        <input type="submit" value="Enviar" name="enviar" />
    </form><br>
    
    <a href='index.php'>Volver al indice</a>
    
<?php    
}
else{?>
    
    <h1>Modificar jugador</h1>
    <form action="modificarJugador.php" method="post">
    
        Introduzca el DNI del jugador que quiere modificar: <input type="text" name="dni"/>
        <?php
        
        if (isset($_POST['enviarDNI'])){
            if ($dniNoExiste)
                echo "<p style='color:red'>No hay ningun jugador registrado con ese DNI</p>";
        }
        
        ?>
        <br>
        
        <input type="submit" name="enviarDNI" value="Enviar"/>

    </form> 
<?php
}
?>
</body>
</html>
