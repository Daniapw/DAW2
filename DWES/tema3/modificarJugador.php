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

//Funcion para comprobar si el DNI existe si se ha enviado el formulario
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
if (comprobarDNI($dniNoExiste)){
    
    $conex= getConexion();

    //Si los datos han sido rellenados correctamente
    if (validarForm($errores)){
        
        //Sumar valores posiicion
        $suma=0;
        foreach ($_POST['posicion'] as $valor) {
            $suma+=$valor;
        }
        
        //Ejecutar update
        $conex->query("UPDATE jugadores SET nombre='$_POST[nombre]', dorsal=$_POST[dorsal], equipo='$_POST[equipo]', numGoles=$_POST[numGoles], posicion=$suma "
                . "WHERE dni='$_POST[dni]';");
        
        if ($conex->errno==null){
            echo "<h1 style='color:green'>Los datos de este jugador se han actualizado correctamente</h1>";
        }
        else{
            echo $conex->error;
        }
    }
    
    //Buscar jugador usando DNI
    $resultados= buscarPorDNI($_POST['dni']);
    
    echo "<h1>Datos del jugador</h1>";
    
    //Mostrar datos jugador
    listarJugadores($resultados);
    
    //Resetear puntero intero de mysqli_result (la funcion listarJugadores mueve el puntero al recorrer la lista)
    mysqli_data_seek($resultados, 0);
    
    $jugador=$resultados->fetch_object();

    //Formulario
    ?>
    <br>
    <h1>Modificar datos</h1>
    <form action="modificarJugador.php" method="post">
        Nombre: <input type="text" name="nombre" value="<?php echo $jugador->nombre; ?>" />
        <?php
        if (isset($_POST['enviar']) && $errores["errorNombre"]){
            echo "<p style='color:red'>Introduzca un nombre valido</p>";
        }
        ?>
        <br>
        
        DNI: <input type="text" name="dni" disabled value="<?php echo $jugador->dni; ?>" />
        <br>
        
        Dorsal: 
        <select name="dorsal">
            <?php
            //Imprimir opciones
            for ($i=0; $i<11; $i++){
                if ($jugador->dorsal == $i+1)
                    echo "<option value=".($i+1)." selected='selected'>".($i+1)."</option>";
                else
                    echo "<option value=".($i+1).">".($i+1)."</option>";
            }
            ?>
        </select><br>
        
        Equipo: <input type="text" name="equipo" value="<?php echo $jugador->equipo; ?>" />
        <?php
        if (isset($_POST['enviar']) && $errores["errorEquipo"]){
            echo "<p style='color:red'>Introduzca un equipo valido</p>";
        }
        ?>
        <br>
        
        Numero de goles: <input type="text" name="numGoles" value="<?php echo $jugador->numGoles; ?>" />
        <?php
        if (isset($_POST['enviar']) && $errores["errorNumGoles"]){
            echo "<p style='color:red'>Introduzca un numero valido</p>";
        }
        ?>
        <br>
        
        
        <?php
        //Separar posiciones en array
        $arrayPosiciones=explode(",", $jugador->posicion);
        ?>
        
        Posicion: 
        <select name="posicion[]" multiple>
            <option value="1" <?php if (in_array("Portero", $arrayPosiciones)) echo "selected='selected'"?>>Portero</option>
            <option value="2" <?php if (in_array("Defensa", $arrayPosiciones)) echo "selected='selected'"?>>Defensa</option>
            <option value="4" <?php if (in_array("Centrocampista", $arrayPosiciones)) echo "selected='selected'"?>>Centrocampista</option>
            <option value="8" <?php if (in_array("Delantero", $arrayPosiciones)) echo "selected='selected'"?>>Delantero</option>
        </select>
        <?php
        if (isset($_POST['enviar']) && $errores["errorPosicion"]){
            echo "<p style='color:red'>Seleccione una posicion</p>";
        }
        ?>
        <br>
        
        <input type="hidden" name="dni" value="<?php echo $_POST['dni'] ?>"/>
        <input type="hidden" name="enviarDNI" value="<?php echo $_POST['enviarDNI'] ?>"/>
        <input type="submit" value="Enviar" name="enviar" />
    </form><br>
    
    <a href="modificarJugador.php">Modificar otro jugador</a><br>
    <a href='index.php'>Volver al indice</a>
<?php    
}
//Si es la primera vez que se muestra o no existe el DNI enviado
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
    <br>
    <a href="index.php">Volver al indice</a>
<?php
}
?>
</body>
</html>
