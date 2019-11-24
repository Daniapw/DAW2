<?php
//Realizar conexion
$conex=new mysqli("localhost", "dwes", "abc123.", "dwes");

$resultados=$conex->query("SELECT * FROM producto");

//Generar respuesta
$respuesta=
"<table>"
    ."<tr>"
        ."<th>Codigo</th>"
        ."<th>Nombre corto</th>"
        ."<th>Precio</th>"
    ."</tr>";


while($objeto=$resultados->fetch_object()){
    $respuesta.=
    "<tr>"
        ."<td>$objeto->cod</td>"
        ."<td>$objeto->nombre_corto</td>"
        ."<td>$objeto->PVP</td>"
    ."</tr>";
}

$respuesta.="</table>";

$conex->close();

//Escribir respuesta
echo $respuesta;
?>