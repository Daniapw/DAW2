<?php

require_once 'Carta.php';
require_once 'Baraja.php';

$baraja=new Baraja();

$cantidad=(int)$_GET['n'];

$valida=false;

//Se comprueba si la cantidad introducida es valida
if (is_int($cantidad)){
    if ($cantidad>=1 && $cantidad<=40 )
        $valida=true;
}

//Si se ha introducido una cantidad de cartas valida
if ($valida){
    //Obtener cartas
    $cartas=$baraja->getCartasAleatorias($cantidad);

    //Almacenar strings de cada carta en array
    foreach($cartas as $carta){
        $cartasString[]=$carta->toString();
    }


    //Crear array con resultados
    $resultado=[
        "numero_cartas"=>$cantidad,
        "cartas"=>$cartasString,
        "status"=>"success"
    ];
}
//Si no se ha introducido una cantidad valida
else{
    //Crear array con resultados
    $resultado=[
        "status"=>"error"
    ];
}

//Devolver JSON
$json= json_encode($resultado);

echo $json;


