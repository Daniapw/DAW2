<?php

$pares=[];
$numero=2;

for($i=0; count($pares)<10;$i++){
    $pares[$i]=$numero;
    $numero+=2;
}

foreach($pares as $valor){
    echo("$valor <br>");
}
