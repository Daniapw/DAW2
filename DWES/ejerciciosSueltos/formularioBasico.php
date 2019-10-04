<?php


function formularioRelleno(){
    foreach($_POST as $valor){
        if (empty($valor)){
            return false;
        }
    }
    return true;
}


if (isSet($_POST["enviar"])){
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

else{
    ?>
<form action="formularioBasico.php" method="post">
    Nombre: <input type="text" name="nombre" value="" /><br>
    Apellidos: <input type="text" name="apel" value="" /><br>
    Sexo:
    <input type="radio" name="sexo" value="H" checked="checked" />H
    <input type="radio" name="sexo" value="M" />M<br>
    Edad: <select name="edad" size="1"><br>
            <option value="entre1y14">Entre 1 y 14 años</option>
            <option value="entre15y25">Entre 15 y 25 años</option>
            <option value="entre26y35">Entre 26 y 35 años</option>
            <option value="masDe35">Mayor de 35 años</option>
    </select><br>
    
    Estado civil:
    <input type="radio" name="estadoCivil" value="soltero" checked="checked" />Soltero
    <input type="radio" name="estadoCivil" value="casado" />Casado
    <input type="radio" name="estadoCivil" value="otro" />Otro<br>
    
    Aficiones:
    <input type="checkbox" name="aficiones[]" value="Cine" />Cine
    <input type="checkbox" name="aficiones[]" value="Lectura" />Lectura
    <input type="checkbox" name="aficiones[]" value="Tv" />Television
    <input type="checkbox" name="aficiones[]" value="Deporte" />Deporte
    <input type="checkbox" name="aficiones[]" value="Musica" />Música<br>
    
    Estudios:<br>
    <select name="estudios[]" size="5" multiple="multiple">
            <option value="ESO">ESO</option>
            <option value="Bachillerato">Bachillerato</option>
            <option value="CFGM">CFGM</option>
            <option value="CFGS">CFGS</option>
            <option value="Universidad">Universidad</option>
    </select><br>
    
    <input type="button" value="Enviar" name="enviar" />
</form>
<?php
}