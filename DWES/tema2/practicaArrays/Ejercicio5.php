<?php

$datos=array(
    0=>array(
        0=>"Nombre",
        1=>"Direccion",
        2=>"Telefono"
    ),
    1=>array(
        0=>"Pedro Torres",
        1=>"C/ Mayor 37",
        2=>"123456789"
    ),
    2=>array(
        0=>"Daniel Ruiz",
        1=>"C/ La Estrella 9",
        2=>"123456789"
    ),
    3=>array(
        0=>"Carlos Naranjo",
        1=>"C/ San Francisco 8",
        2=>"123456789"
    )
);

echo("<table border=1");
foreach ($datos as $persona) {
    echo("<tr>");
    
    foreach ($persona as $valorDato) {
        echo("<td>$valorDato</td>");
    }
    
    echo("</tr>");
}
echo("</table>");

