<?php

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
