<?php

//Comprobar si el form esta relleno
function formularioRelleno(){
    
    //Si la variable %_POST tiene menos de 8 campos es que el form no esta relleno
    if(count($_POST)<8){
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
function rellenarInputTexto($nombre){
    if(isSet($_POST["enviar"]) && !empty($_POST[$nombre])){
        echo("$_POST[$nombre]");
    }  
}

//Poner opcion input radioButton
function comprobarCheck($nombre, $valorRadio){
    if (isSet($_POST["enviar"]) && !empty($_POST[$nombre])){
        if ($_POST[$nombre] == $valorRadio){
            echo("checked='checked'");
        }
    }
}

//Elegir select
function elegirSelect($nombre, $valorSelect){
    if (isSet($_POST["enviar"]) && !empty($_POST[$nombre])){
        if ($_POST[$nombre] == $valorSelect){
            echo("selected='selected'");
        }
    }
}

//Elegir checkbox
function elegirCheckbox($nombre, $valorCheck){
    if (isSet($_POST["enviar"]) && !empty($_POST[$nombre])){
        if (in_array($valorCheck, $_POST[$nombre])){
            echo("checked");
        }
    }
}

//Elegir select multiple
function elegirSelectMultiple($nombre, $valorCheck){
    if (isSet($_POST["enviar"]) && !empty($_POST[$nombre])){
        if (in_array($valorCheck, $_POST[$nombre])){
            echo("selected='selected'");
        }
    }
}

//Si el form ha sido rellenado se muestran los datos
if (isSet($_POST["enviar"]) && formularioRelleno()){
    echo("Nombre: ".$_POST["nombre"]."<br>".
         "Apellidos: ".$_POST["apel"]."<br>".
         "Sexo: ".$_POST["sexo"]."<br>".
         "Edad: ".$_POST["edad"]."<br>".
         "Estado civil: ".$_POST["estadoCivil"]."<br>".
         "Aficiones: ");
    
    //Aficiones
    foreach ($_POST["aficiones"] as $value) {
        echo("$value ");
    }
    
    echo("<br>Estudios: ");
    
    //Estudios
    foreach ($_POST["estudios"] as $value) {
        echo("$value ");
    }        
        
}
//Si no ha sido rellenado se muestra un mensaje de error y vuelve a salir el formulario con los datos que habia introducido el usuario
else{
    ?>
<form action="formularioBasico.php" method="post">
    <?php 
        if (isset($_POST["enviar"]) && !formularioRelleno()) {
            echo '<script language="javascript">alert("Debe rellenar todos los datos del formulario")</script>';
        }
    ?>
    Nombre: <input type="text" name="nombre" value="<?php rellenarInputTexto("nombre");?>"/><br>
    Apellidos: <input type="text" name="apel" value="<?php rellenarInputTexto("apel");?>" /><br>
    Sexo:
    <input type="radio" name="sexo" value="H" <?php comprobarCheck("sexo", "H");?> />H
    <input type="radio" name="sexo" value="M" <?php comprobarCheck("sexo", "M");?>/>M<br>
    Edad: <select name="edad" size="1"><br>
            <option value="1" <?php elegirSelect("edad", "1");?>>Entre 1 y 14 años</option>
            <option value="2" <?php elegirSelect("edad", "2");?>>Entre 15 y 25 años</option>
            <option value="3" <?php elegirSelect("edad", "3");?>>Entre 26 y 35 años</option>
            <option value="4" <?php elegirSelect("edad", "4");?>>Mayor de 35 años</option>
    </select><br>
    
    Estado civil:
    <input type="radio" name="estadoCivil" value="1" <?php comprobarCheck("estadoCivil", "1");?> />Soltero
    <input type="radio" name="estadoCivil" value="2" <?php comprobarCheck("estadoCivil", "2");?>/>Casado
    <input type="radio" name="estadoCivil" value="3" <?php comprobarCheck("estadoCivil", "3");?>/>Otro<br>
    
    Aficiones:
    <input type="checkbox" name="aficiones[]" value="1" <?php elegirCheckbox("aficiones", "1")?>/>Cine
    <input type="checkbox" name="aficiones[]" value="2" <?php elegirCheckbox("aficiones", "2")?>/>Lectura
    <input type="checkbox" name="aficiones[]" value="3" <?php elegirCheckbox("aficiones", "3")?>/>Television
    <input type="checkbox" name="aficiones[]" value="4" <?php elegirCheckbox("aficiones", "4")?>/>Deporte
    <input type="checkbox" name="aficiones[]" value="5" <?php elegirCheckbox("aficiones", "5")?>/>Música<br>
    
    Estudios:<br>
    <select name="estudios[]" size="5" multiple="multiple">
        <option value="1" <?php elegirSelectMultiple("estudios", "1")?>>ESO</option>
        <option value="2" <?php elegirSelectMultiple("estudios", "2")?>>Bachillerato</option>
        <option value="3" <?php elegirSelectMultiple("estudios", "3")?>>CFGM</option>
        <option value="4" <?php elegirSelectMultiple("estudios", "4")?>>CFGS</option>
        <option value="5" <?php elegirSelectMultiple("estudios", "5")?>>Universidad</option>
    </select><br>
    
    <input type="submit" value="Enviar" name="enviar" />
</form>
<?php
}