<?php

require './formularioUtils.php';

//Si el form ha sido rellenado se muestran los datos
if (isSet($_POST["enviar"]) && formularioRelleno(8)){
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
?>
    <br>
    <form action="formularioBasico.php">
        <input type="submit" value="Volver al formulario" />
    </form>
<?php
}
//Si no ha sido rellenado se muestra un mensaje de error y vuelve a salir el formulario con los datos que habia introducido el usuario
else{
    ?>
<form action="formularioBasico.php" method="post">
    <?php 
        if (isset($_POST["enviar"]) && !formularioRelleno(8)) {
            echo '<script language="javascript">alert("Debe rellenar todos los datos del formulario")</script>';
        }
    ?>
    Nombre: <input type="text" name="nombre" value="<?php rellenarInputTexto("nombre", "enviar");?>"/><br>
    Apellidos: <input type="text" name="apel" value="<?php rellenarInputTexto("apel", "enviar");?>" /><br>
    Sexo:
    <input type="radio" name="sexo" value="H" <?php comprobarCheck("sexo", "H", "enviar");?> />H
    <input type="radio" name="sexo" value="M" <?php comprobarCheck("sexo", "M", "enviar");?>/>M<br>
    Edad: <select name="edad" size="1"><br>
            <option value="1" <?php elegirSelect("edad", "1", "enviar");?>>Entre 1 y 14 años</option>
            <option value="2" <?php elegirSelect("edad", "2", "enviar");?>>Entre 15 y 25 años</option>
            <option value="3" <?php elegirSelect("edad", "3", "enviar");?>>Entre 26 y 35 años</option>
            <option value="4" <?php elegirSelect("edad", "4", "enviar");?>>Mayor de 35 años</option>
    </select><br>
    
    Estado civil:
    <input type="radio" name="estadoCivil" value="1" <?php comprobarCheck("estadoCivil", "1", "enviar");?> />Soltero
    <input type="radio" name="estadoCivil" value="2" <?php comprobarCheck("estadoCivil", "2", "enviar");?>/>Casado
    <input type="radio" name="estadoCivil" value="3" <?php comprobarCheck("estadoCivil", "3", "enviar");?>/>Otro<br>
    
    Aficiones:
    <input type="checkbox" name="aficiones[]" value="1" <?php elegirCheckbox("aficiones", "1", "enviar")?>/>Cine
    <input type="checkbox" name="aficiones[]" value="2" <?php elegirCheckbox("aficiones", "2", "enviar")?>/>Lectura
    <input type="checkbox" name="aficiones[]" value="3" <?php elegirCheckbox("aficiones", "3", "enviar")?>/>Television
    <input type="checkbox" name="aficiones[]" value="4" <?php elegirCheckbox("aficiones", "4", "enviar")?>/>Deporte
    <input type="checkbox" name="aficiones[]" value="5" <?php elegirCheckbox("aficiones", "5", "enviar")?>/>Música<br>
    
    Estudios:<br>
    <select name="estudios[]" size="5" multiple="multiple">
        <option value="1" <?php elegirSelectMultiple("estudios", "1", "enviar")?>>ESO</option>
        <option value="2" <?php elegirSelectMultiple("estudios", "2", "enviar")?>>Bachillerato</option>
        <option value="3" <?php elegirSelectMultiple("estudios", "3", "enviar")?>>CFGM</option>
        <option value="4" <?php elegirSelectMultiple("estudios", "4", "enviar")?>>CFGS</option>
        <option value="5" <?php elegirSelectMultiple("estudios", "5", "enviar")?>>Universidad</option>
    </select><br>
    
    <input type="submit" value="Enviar" name="enviar" />
</form>
<?php
}