<?php
require 'ejercicioFechas.php';

if(isSet($_POST["mostrar"]) && checkdate($_POST["mes"], $_POST["dia"], $_POST["anio"])){
    echo(fechaCastellano($_POST["dia"], $_POST["mes"], $_POST["anio"]));
}

else {
?>
<form action="formFecha.php" method="post">

    Día:<input type="number" name="dia" min="1" max="31" required/><br>
    Mes:<input type="number" name="mes" min="1" max="12" required/><br>
    Año:<input type="number" name="anio" min="1900" max="2019" required/><br>
    
    <input type="submit" value="Mostrar" name="mostrar" />
    
</form>
<?php
    if(isSet($_POST["mostrar"]) && !checkdate($_POST["mes"], $_POST["dia"], $_POST["anio"])){
        var_dump($_POST);
        echo("<br>Fecha incorrecta");
    }
}

