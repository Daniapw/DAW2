<?php
//Mostrar agenda
function mostrarAgenda($agenda){
    echo
    "<h1>Contactos</h1><br>
    <table border='1'>
        <tr>
            <th>Nombre</th>
            <th>Telefono</th>
        </tr>";
    
    //Imprimir contactos
    foreach ($agenda as $nombre => $telefono) {
        
        if ($nombre!="enviar"){
            echo
            "<tr>
                 <td>$nombre</td>
                 <td>$telefono</td>
            </tr>";
        }
    }
    
    echo("</table>");

}

//Funcion para agenda
function agenda($agenda){
    
    $tipoOperacion="";
    
    //Si el telefono no esta vacio
    if(!empty($_POST["telefono"]) && !empty($_POST["nombre"])){
        if (array_key_exists($_POST["nombre"], $agenda)){
            $tipoOperacion="modificar";
        }
        //Si no lo esta
        else{
            $tipoOperacion="anadir";
        }
        
        $agenda[$_POST["nombre"]]=$_POST["telefono"]; 
    }
    //Si el nombre esta en la agenda y el telefono esta vacio
    elseif(array_key_exists($_POST["nombre"], $agenda) && empty($_POST["telefono"])){
        unset($agenda[$_POST["nombre"]]);
        $tipoOperacion="eliminar";
    }
    //Si el usuario introduce solo un nombre y ese nombre no existe en la agenda
    elseif(!empty($_POST["nombre"]) && !in_array($_POST["nombre"], $agenda)){
        $tipoOperacion="errorEliminar";
    }
    
    echo mensaje($agenda, $tipoOperacion);
    return $agenda;
}

//Funcion para determinar el mensaje que va a salir
function mensaje($agenda, $tipoOperacion){
    $mensaje="<p style='font-size:30px; color:";
    
    //Segun el tipo de operacion el mensaje cambia de contenido y color
    switch ($tipoOperacion){
        case "eliminar":{
            $mensaje=$mensaje."blue;'>Contacto ".$_POST["nombre"]." eliminado con exito";
            break;
        }
        case "modificar":{
            $mensaje=$mensaje."darkgreen;'>Contacto ".$_POST["nombre"]." modificado con exito";
            break;
        }case "anadir":{
            $mensaje=$mensaje."darkgreen;'>Contacto ".$_POST["nombre"]." añadido con exito";
            break;
        }
        case "errorEliminar":{
            $mensaje=$mensaje."red;'>Error al intentar eliminar ".$_POST["nombre"].": el contacto no existe";
            break;
        }
        case "":{
            $mensaje=$mensaje."red;'>Error: El contacto debe tener un nombre";
            break;
        }
        
    }
    
    return $mensaje;
}