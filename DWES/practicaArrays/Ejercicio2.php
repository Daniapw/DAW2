<?php

$pares=[];
$numero=2;

for($i=0; count($pares)<10;$i++){
    $pares[$i]=$numero;
    $numero+=2;
}

$pares= array_reverse($pares);

foreach($pares as $valor){
    echo("$valor <br>");
}

