<?php

function getConex(){

    @$conex=new mysqli("localost", 'dwes', 'abc123.', 'dwes');
    
    if ($conex->connect_errno!=NULL){
        echo "Error $conex->connect_errno: $conex->connect_error";
        
        $error["conex"]=$conex->connect_error;
        
        return $error;
        
    }
    
    return $conex;
    
}

//Function para imprimir select
function imprimirSelect($resultados){
    while($objeto=$resultados->fetch_object()){
        $selected="";

        if (isSet($_POST['producto'])){
            if ($_POST['producto'] == $objeto->cod){
                $selected="selected='selected'";
            }
        }
        
        echo "<option ".$selected." value=".$objeto->cod.">".$objeto->nombre_corto."</option>";
    }
}
