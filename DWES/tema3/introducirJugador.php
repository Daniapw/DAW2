<!DOCTYPE html>
<html>
<head></head>
<body>
<?php
REQUIRE 'funcionesJugadores.php';

//Booleans para los errores
$errores=array(
    "errorNombre" => false,
    "errorDNI" => false,
    "errorDNIExistente" => false,
    "errorEquipo"=> false,
    "errorNumGoles" => false,
    "errorPosicion" => false);

//Si se ha enviado el formulario y ha sido rellenado correctamente
if (isset($_POST['enviar']) && validarForm($errores)){
    $conex= getConexion();
    
    //Sumar values de posicion
    $suma=0;
    foreach($_POST['posicion'] as $value){
        $suma+=$value;
    }
    
    //Ejecutar query
    $conex->query("INSERT INTO jugadores VALUES ('$_POST[nombre]', '$_POST[dni]', '$_POST[dorsal]', $suma, '$_POST[numGoles]', '$_POST[equipo]')");
    
    
    echo "<h1>Jugador dado de alta con exito</h1><br>"
    . "<a href='index.php'>Volver al indice</a><br>"
    . "<a href='introducirJugador.php'>Insertar otro jugador</a><br>";
    
    $conex->close();
}
//Si no se ha enviado o si se ha rellenado de forma incorrecta
else{?>

    <h1>Introducir jugador</h1>
    <form action="introducirJugador.php" method="post">
        Nombre: <input type="text" name="nombre" value="<?php if (!$errores["errorNombre"]) echo rellenarInputTexto("nombre", "enviar") ?>" />
        <?php
        if (isset($_POST['enviar']) && $errores["errorNombre"]){
            echo "Introduzca un nombre valido";
        }
        
        ?>
        <br>
        DNI: <input type="text" name="dni" value="<?php if (!$errores["errorDNI"]) echo rellenarInputTexto("dni", "enviar") ?>" />
        <?php
        if (isset($_POST['enviar'])){
            if ($errores["errorDNI"])
                echo "Introduzca un DNI valido";
            elseif($errores["errorDNIExistente"])
                echo "Ese DNI ya existe en la base de datos";
        }
        ?>
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
        
        <input type="submit" value="Enviar" name="enviar" />
    </form><br>
    
    <a href='index.php'>Volver al indice</a>
<?php
}
?>
</body>
</html>