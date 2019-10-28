<?php

//Funcion para obtener conexion a BD
function getConexion(){
    return $conex=new mysqli('localhost','dwes', 'abc123.', 'jugadores');
}

//Funcion para buscar jugador en base de datos usando el DNI
function comprobarSiJugadorExiste($dni){
    $conex= getConexion();
    
    $resultados=$conex->query("SELECT dni FROM jugadores;");
    $resultados=$resultados->fetch_array();
    
    if ($resultados!=null){
        if (in_array($dni, $resultados)){
            $conex->close();
            return true;
        }
    }
    
    $conex->close();
    return false;
}

//Rellenar inputs texto 
function rellenarInputTexto($nombre, $nombreBoton){
    if(isSet($_POST["$nombreBoton"]) && !empty($_POST[$nombre])){
        return "$_POST[$nombre]";
    }  
}

//Elegir select
function elegirSelect($nombre, $valorSelect, $nombreBoton){
    if (isSet($_POST["$nombreBoton"]) && !empty($_POST[$nombre])){
        if ($_POST[$nombre] == $valorSelect){
            return "selected='selected'";
        }
    }
}

//Elegir select multiple
function elegirSelectMultiple($nombre, $valorCheck, $nombreBoton){
    if (isSet($_POST["$nombreBoton"]) && !empty($_POST[$nombre])){
        if (in_array($valorCheck, $_POST[$nombre])){
            return "selected='selected'";
        }
    }
}