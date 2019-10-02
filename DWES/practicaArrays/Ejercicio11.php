<?php

$array1=[];
$array2=[];

$arrayManual=[];

//Rellenar arrays con numeros aleatorios entre 1 y 100
for ($i=0; $i<4; $i++){
    $array1[$i]= rand(1, 100);
    $array2[$i]= rand(1, 100);
}

//Combinar arrays con sort y manualmente
$arrayMerge= array_merge($array1, $array2);

for ($i=0; $i<(count($array1) + count($array2));$i++){
    if($i<count($array1)){
        $arrayManual[$i]=$array1[$i];
    }
    else{
        $arrayManual[$i]=$array2[$i-count($array2)];
    }
}

//Imprimir arrays
echo("Arrays 1 y 2:<br>");
imprimirArray($array1);
imprimirArray($array2);

echo("<br>Array combinado manualmente:<br>");
imprimirArray($arrayManual);
echo("<br>Array combinado con array_merge():<br>");
imprimirArray($arrayMerge);

echo("<br>Array ordenado con sort: <br>");
sort($arrayMerge);
imprimirArray($arrayMerge);


//Ordenar manualmente
$aux=0;
echo("<br>Proceso ordenado manual<br>");
for ($i=0; $i < count($arrayManual); $i++){
    for ($j=0; $j < count($arrayManual)-1; $j++){

        if ($arrayManual[$j]>$arrayManual[$j+1]){
            $aux=$arrayManual[$j+1];
            $arrayManual[$j+1]=$arrayManual[$j];
            $arrayManual[$j]=$aux;
        }  

    }
    imprimirArray($arrayManual);
}
imprimirArray($arrayManual);
//Funcion para imprimir array
function imprimirArray($array){
    foreach ($array as $value) {
        echo("$value ");
    }
    echo("<br>");
}