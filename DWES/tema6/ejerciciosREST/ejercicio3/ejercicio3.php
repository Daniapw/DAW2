<?php
require_once 'Funciones.php';

$monedaOrigen=$_GET['mo'];
$cantidad=$_GET['cantidad'];

//Obtener moneda destino
if (isset($_GET['md']))
    $monedaDestino=$_GET['md'];
else
    $monedaDestino=false;


//Obtener cantidad segun divisa origen
if ($monedaOrigen=="EUR"){
    switch($monedaDestino){
        case 'GBP':{
            $conversion=Funciones::eurosALibras($cantidad);
            break;
        }

        case 'USD':{
            $conversion=Funciones::eurosADolares($cantidad);
            break;
        }

        case false:{
            $conversion=Funciones::eurosADolaresYLibras($cantidad);
            break;
        }
    }
}
elseif($monedaOrigen=="USD"){
    
    switch($monedaDestino){
        case 'GBP':{
            $conversion=Funciones::dolaresALibras($cantidad);
            break;
        }

        case 'EUR':{
            $conversion=Funciones::dolaresAEuros($cantidad);
            break;
        }

        case false:{
            $conversion=Funciones::dolaresAEurosYLibras($cantidad);
            break;
        }
    }   
}
elseif($monedaOrigen=="GBP"){
    switch($monedaDestino){
        case 'EUR':{
            $conversion=Funciones::librasAEuros($cantidad);
            break;
        }

        case 'USD':{
            $conversion=Funciones::librasADolares($cantidad);
            break;
        }

        case false:{
            $conversion=Funciones::librasAEurosYDolares($cantidad);
            break;
        }
    }     
}

//Meter resultado en array
$resultado=[
    "cantidad"=>$_GET['cantidad'],
    "monedaOrigen"=>$monedaOrigen,
    "conversion"=>$conversion
];

//Codificar a JSON 
$json=json_encode($resultado);

echo $json;
