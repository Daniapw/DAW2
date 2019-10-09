<?php

$estadios=array(
    "Barcelona"=>"Camp Nou",
    "Real Madrid"=> "Santiago Bernabeu",
    "Valencia"=> "Mestalla",
    "Real Sociedad" => "Anoeta"
);

//Imprimir array
mostrarEstadios($estadios);

//Eliminar Madrid
$estadios["Real Madrid"]="";

echo("<br>");

//Mostrar como una lista ordenada
echo("<ol>");
foreach ($estadios as $equipo => $estadio) {
    echo("<li>$equipo - $estadio</li>");
}
echo("</ol>");


//Funcion para imprimir array
function mostrarEstadios($estadios){
    echo("<table border=1>");
    echo("<tr><th>Equipo</th><th>Estadio</th></tr>");
    foreach ($estadios as $equipo => $estadio) {
        echo("<tr>");
        echo("<td>$equipo</td>");
        echo("<td>$estadio</td>");
        echo("</tr>");
    }
    echo("</table>");
}