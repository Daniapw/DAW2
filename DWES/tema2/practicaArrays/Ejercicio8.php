<?php

$numeros=array(1,2,3,4,5,6,7,8,9,10);
$pares=0;
$contador=0;

foreach ($numeros as $indice => $valor) {
    if($indice%2==0){
        $pares+=$valor;
        $contador++;
    }
    else{
        echo("$valor ");
    }
}


$pares/=$contador;
echo("<br>Media de los pares: $pares");