<?php

$nombres=[ "Pedro", "Ismael", "Sonia", "Clara", "Susana", "Alfonso", "Teresa"];

echo("La lista contiene ".count($nombres)." elementos:");
echo("<ul>");
foreach ($nombres as $valor) {
    echo("<li>$valor</li>");
}
echo("</ul>");