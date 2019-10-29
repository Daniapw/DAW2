<!DOCTYPE html>
<html>
    <head></head>
<body>

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
    if ($resultados!=null){
        echo "<h1>Jugadores encontrados:</h1>";
        listarJugadores($resultados);
        echo '<br>';
    }
    
    //Si no se ha encontrado nada (resultados es null)
    else{
        echo "<h1>No se ha encontrado ningun jugador con esos parametros</h1>";
    }
    
    echo "<a href='index.php'>Volver al indice</a><br>"
    . "<a href='buscarJugador.php'>Buscar otra vez</a>";
}
else{
?>
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
<?php
}
?>
</body>
</html>

