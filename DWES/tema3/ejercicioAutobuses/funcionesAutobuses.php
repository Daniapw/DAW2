<?php

//Funcion para obtener conexion
function getConex(){
    return $conex=new mysqli('localhost','dwes', 'abc123.', 'autobuses');
}

//Funcion para recoger lugares de origen de las lineas
function getOrigenes(){
    $conex= getConex();
    
    $resultados=$conex->query("SELECT DISTINCT Origen FROM viajes;");
    
    $conex->close();
    return $resultados;

}

//Funcion para recoger lugares de destino de las lineas
function getDestinos(){
    $conex= getConex();
    
    $resultados=$conex->query("SELECT DISTINCT Destino FROM viajes;");
    
    $conex->close();
    return $resultados;
}


//Funcion para obtener lineas segun parametros
function getLinea($fecha, $origen, $destino){
    $conex=getConex();
    
    $resultados=$conex->query("SELECT * FROM viajes WHERE Fecha='$fecha' AND Origen='$origen' AND Destino='$destino';");
    
    $conex->close();
    return $resultados;
}
