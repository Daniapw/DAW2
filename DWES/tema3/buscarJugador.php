<!DOCTYPE html>
<html>
    <head></head>
<body>
    
    <!--Formulario-->
    <h1>Buscar jugadores</h1>
    
    <form action="buscarJugador.php" method="post">

        Buscar por:
        <select name="buscarPor">
            <option value="1">DNI</option>
            <option value="2">Equipo</option>
            <option value="3">Posicion</option>
        </select><br>

        Buscar:<input type="text" name="buscar"/><br>

        <input type="submit" name="enviar" value="Enviar">
    </form>
    <br>
    
    <a href='index.php'>Volver al indice</a>
    
<?php
REQUIRE 'funcionesJugadores.php';

if (isset($_POST['enviar'])){
    
    $conex= getConexion();
    
    $resultados=null;
    
    //Determinar tipo de busqueda y ejecutarla
    if ($_POST['buscarPor']==1)
        $resultados= buscarPorDNI($_POST['buscar']);
    elseif($_POST['buscarPor']==2)
        $resultados= buscarPorEquipo($_POST['buscar']);
    elseif($_POST['buscarPor']==3)
        $resultados=buscarPorPosicion($_POST['buscar']);
    
    //Si se han encontrado jugadores se muestran en una tabla
    if ($resultados->num_rows>0){
        echo "<h2 style='color:green;'>Jugadores encontrados:</h2>";
        listarJugadores($resultados);
        echo '<br>';
    }
    
    //Si no se ha encontrado nada (resultados es null)
    else{
        echo "<h2 style='color:red;'>No se ha encontrado ningun jugador con esos parametros</h2>";
    }
}
?>
</body>
</html>

