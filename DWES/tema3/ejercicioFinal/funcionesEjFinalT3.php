<?php

//Conexion
function getConex(){
    $conex=new PDO('mysql:host=localhost;dbname=dwes', 'dwes', 'abc123.');

    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $conex;
}

////////////////////GET REGISTROS DE BASE DE DATOS///////////////////////
//Funcion para obtener familias de productos
function getFamilias(){
    $conex=getConex();
    
    $resultados=$conex->query("SELECT * FROM familia;");
    
    unset($conex);
    
    return $resultados;
}

//Funcion para obtener productos de una determinada familia
function getProductosDeFamilia($familia){
    $conex= getConex();
    
    $resultados=$conex->query("SELECT * FROM producto WHERE familia='$familia';");
    
    unset($conex);
    
    return $resultados;
}

//Funcion para obtener producto especifico
function getProducto($codProducto){
    $conex=getConex();
    
    try{
        $resultados=$conex->query("SELECT * FROM producto WHERE cod='$codProducto';");
    }catch(PDOException $e){
        throw $e;
    }
    
    unset($conex);
    
    return $resultados;
}

////////////////////////MOSTRAR RESULTADOS//////////////////////////////////
function crearOpcionesSelect($resultados, $indicePOST){
    while($objeto=$resultados->fetch(PDO::FETCH_OBJ)){
    $selected="";

    if (isSet($_POST[$indicePOST])){
        if ($_POST[$indicePOST] == $objeto->cod){
            $selected="selected='selected'";
        }
    }

    echo "<option ".$selected." value=".$objeto->cod.">".$objeto->nombre."</option>";
    }
}
