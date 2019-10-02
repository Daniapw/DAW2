<?php

$numeros=array(
    "A"=>3,
    "B"=>2,
    "C"=>8,
    "D"=>123,
    "E"=>5,
    "F"=>1
    ); 

asort($numeros);

echo("<table border=1");
echo("<tr><th>Indice</th><th>Numero</th></tr>");
foreach ($numeros as $key => $value) {
    echo("<tr>");
    echo("<td>$key</td>");
    echo("<td>$value</td>");
    echo("</tr>");
}
echo("</table>");