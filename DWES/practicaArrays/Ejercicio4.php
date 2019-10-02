<?php

$datos=array(
    "Nombre"=>"Pedro Torres",
    "Direccion"=>"C/ Mayor, 37",
    "Telefono"=>"123456789"
);

echo("<table border=1");
echo("<tr><th>DATO</th><th>VALOR</th></tr>");
foreach ($datos as $key => $value) {
    echo("<tr>");
    echo("<td>$key</td>");
    echo("<td>$value</td>");
    echo("</tr>");
}
echo("</table>");