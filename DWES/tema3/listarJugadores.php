<!DOCTYPE html>
<html>
    <head></head>
<body>
    
<?php
REQUIRE 'funcionesJugadores.php';

$conex= getConexion();

if ($conex->connect_errno != null){
    echo $conex->connect_error;
}

$resultados=$conex->query("SELECT * FROM jugadores;");

if ($resultados->num_rows==0){
    echo "<h2>NO HAY JUGADORES REGISTRADOS EN LA BASE DE DATOS</h2>";
}
else{
    ?>
    <h1>Lista de jugadores</h1>
    <table border="1px solid>" cellspacing="0" cellpadding="6">
        <tr>
            <th>Nombre</th>
            <th>DNI</th>
            <th>Equipo</th>
            <th>Dorsal</th>
            <th>Posicion</th>
            <th>Goles</th>
        <tr>
            
    <?php
    while($objeto=$resultados->fetch_object()){
        
        echo
        "<tr>
            <td>$objeto->nombre</td>
            <td>$objeto->dni</td>
            <td>$objeto->equipo</td>
            <td>$objeto->dorsal</td>
            <td>$objeto->posicion</td>
            <td>$objeto->numGoles</td>
        </tr>";
    }
    ?>
    </table>
<?php
}
?>

    <h3><a href="index.php">Volver al indice</a></h3>
</body>
</html>



