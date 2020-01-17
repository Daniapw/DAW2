<?php
require_once 'funcionesEj1.php';

//Si se ha enviado informacion
if (isset($_POST['enviar'])){
    $ciudad=$_POST['ciudad'];
    $tiempo= getDatosCiudad($ciudad);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="ejercicio1.php" method="POST">
            Seleccione una ciudad:
            <select name="ciudad">
                <option value="Madrid">Madrid</option>
                <option value="Barcelona">Barcelona</option>
                <option value="Cordoba">Córdoba</option>
                <option value="Malaga">Malaga</option>
                <option value="Lucena">Lucena</option>

            </select>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        
        <?php
        //Si se ha enviado info
        if (isset($_POST['enviar'])){
            echo "<hr>"
            . "<h1>El tiempo en $ciudad </h1>";
            
           echo 
            "<ul>"
                . "<li>Tiempo: ". $tiempo->weather[0]->description ."<img src='http://openweathermap.org/img/wn/".$tiempo->weather[0]->icon."@2x.png' width='50px'></li>"
                . "<li>Temperatura: ".$tiempo->main->temp." ºC</li>"
                . "<li>Humedad: ".$tiempo->main->humidity."%</li>"
                . "<li>Presión: ".$tiempo->main->pressure." mb</li>"
            . "</ul>";
        }
        ?>
    </body>
</html>
