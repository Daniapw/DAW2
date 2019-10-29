<?php

//Funcion para obtener conexion a BD
function getConexion(){
    return $conex=new mysqli('localhost','dwes', 'abc123.', 'jugadores');
}

//Funcion para comprobar si los datos introducidos en los formularios para introducir y modificar jugadores son validos
function validarForm(&$errores){
    
    if (isset($_POST['enviar'])){
        //Comprobar campo nombre
        if(!preg_match("/^[a-z]+\s*[a-z]*$/i", $_POST['nombre'])){
            $errores["errorNombre"]=true;
        }

        //Comprobar patron DNI
        if (!preg_match("/^\d{8}[a-z]/i" ,$_POST['dni'])){
            $errores["errorDNI"]=true;
        }

        //Comprobar si DNI existe
        if (isset($errores['errorDNIExistente'])){
            if (buscarPorDNI($_POST['dni'])->num_rows>0)
                $errores["errorDNIExistente"]=true;
        }
        //Comprobar equipo
        if (!preg_match("/^[a-z]+\s*[a-z]*$/i", $_POST['equipo'])){
            $errores["errorEquipo"]=true;
        }

        //Comprobar numero de goles
        if (!preg_match("/^\d+$/", $_POST['numGoles'])){
            $errores["errorNumGoles"]=true;
        }
    
        //Comprobar posicion
        if (!isset($_POST['posicion'])){
            $errores["errorPosicion"]=true;
        }
        
        //Recorrer array errores
        foreach ($errores as $error){
            if ($error)
                return false;
        }
        
        return true;
    }
    
    return false;
}

//Funcion listar jugadores
function listarJugadores($jugadores){
    echo 
    "<table border='1px' solid cellspacing='0' cellpadding='6'>
        <tr>
            <th>Nombre</th>
            <th>DNI</th>
            <th>Equipo</th>
            <th>Dorsal</th>
            <th>Posicion</th>
            <th>Goles</th>
        <tr>";
    
    while($objeto=$jugadores->fetch_object()){
        
        echo
        "<tr>
            <td>$objeto->nombre</td>
            <td>$objeto->dni</td>
            <td>$objeto->equipo</td>
            <td>$objeto->dorsal</td>
            <td>$objeto->posicion</td>
            <td>$objeto->numGoles</td>
        </tr>";
    }
    
    echo
    "</table>";
}

//Funcion para buscar jugador en base de datos usando el DNI
function buscarPorDNI($dni){
    $conex= getConexion();
    
    $resultados=$conex->query("SELECT * FROM jugadores WHERE dni='$dni';");
    
    if ($resultados!=null){
        $conex->close();
        return $resultados;
    }
    
    $conex->close();
    return null;
}

//Funcion para buscar jugador en base de datos usando el DNI
function buscarPorEquipo($equipo){
    $conex= getConexion();
    
    $resultados=$conex->query("SELECT * FROM jugadores WHERE equipo='$equipo';");
    
    if ($resultados!=null){
        $conex->close();
        return $resultados;
    }
    
    $conex->close();
    return null;
}

//Funcion para buscar jugador en base de datos usando el DNI
function buscarPorPosicion($posicion){
    $conex= getConexion();
    
    $resultados=$conex->query("SELECT * FROM jugadores WHERE posicion like '%$posicion%';");
    
    if ($resultados!=null){
        $conex->close();
        return $resultados;
    }
    
    $conex->close();
    return null;
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