<?php

//Comprobar si el form esta relleno
function formularioRelleno($numCampos){
    
    //Si la variable %_POST tiene menos de 8 campos es que el form no esta relleno
    if(count($_POST)<$numCampos){
        return false;
    }
    else{
        foreach ($_POST as $valor) {
            //Si alguno de los campos esta vacio tampoco cuenta como relleno,
            //esto es para evitar que se manden campos de texto vacios
            if (empty($valor)){
                return false;
            }
        }
    }
    
    return true;
}

//Rellenar inputs texto 
function rellenarInputTexto($nombre, $nombreBoton){
    if(isSet($_POST["$nombreBoton"]) && !empty($_POST[$nombre])){
        echo("$_POST[$nombre]");
    }  
}

//Poner opcion input radioButton
function comprobarCheck($nombre, $valorRadio, $nombreBoton){
    if (isSet($_POST["$nombreBoton"]) && !empty($_POST[$nombre])){
        if ($_POST[$nombre] == $valorRadio){
            echo("checked='checked'");
        }
    }
}

//Elegir select
function elegirSelect($nombre, $valorSelect, $nombreBoton){
    if (isSet($_POST["$nombreBoton"]) && !empty($_POST[$nombre])){
        if ($_POST[$nombre] == $valorSelect){
            echo("selected='selected'");
        }
    }
}

//Elegir checkbox
function elegirCheckbox($nombre, $valorCheck, $nombreBoton){
    if (isSet($_POST["$nombreBoton"]) && !empty($_POST[$nombre])){
        if (in_array($valorCheck, $_POST[$nombre])){
            echo("checked");
        }
    }
}

//Elegir select multiple
function elegirSelectMultiple($nombre, $valorCheck, $nombreBoton){
    if (isSet($_POST["$nombreBoton"]) && !empty($_POST[$nombre])){
        if (in_array($valorCheck, $_POST[$nombre])){
            echo("selected='selected'");
        }
    }
}