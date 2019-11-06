<!DOCTYPE html>
<html>
    <head></head>
<body>
    
<?php
REQUIRE 'funcionesJugadores.php';

$conex= getConexion();

$resultados=$conex->query("SELECT * FROM jugadores;");

if ($resultados->num_rows==0){
    echo "<h2>NO HAY JUGADORES REGISTRADOS EN LA BASE DE DATOS</h2>";
}
else{
    ?>
    <h1>Lista de jugadores</h1>
    <?php
    listarJugadores($resultados);
    $conex->close();

}
?>

    <h3><a href="index.php">Volver al indice</a></h3>
</body>
</html>



