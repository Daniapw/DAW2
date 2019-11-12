<?php
function getConex(){
    

    $conex=new PDO('mysql:host=localhost;dbname=dwes', 'dwes', 'abc123.');

    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $conex;
}

//Function para imprimir select
function crearOpciones($resultados){
    while($objeto=$resultados->fetch(PDO::FETCH_OBJ)){
        $selected="";

        if (isSet($_POST['producto'])){
            if ($_POST['producto'] == $objeto->cod){
                $selected="selected='selected'";
            }
        }
        
        echo "<option ".$selected." value=".$objeto->cod.">".$objeto->nombre_corto."</option>";
    }
}
