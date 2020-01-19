<?php
//Si se ha enviado el formulario con el numero de cartas
if (isset($_POST['enviar'])){
    $json= file_get_contents("http://localhost/DWES/tema6/ejercicio4/ej4Api.php?n=$_POST[numCartas]");
    
    $json= json_decode($json);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>La baraja española</h1>
        <form action='#' method='POST'>
            Numero de cartas: <input type="text"  name="numCartas"><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        
        <?php
        //Se comprueba si la cantidad introducida es valida
        if (isset($_POST['enviar'])){
            echo "<hr>";
            echo "<h1>Cartas obtenidas</h1>";

            //Si el objeto JSON no es null
            if ($json->status=="success"){
                $contador=1;

                foreach($json->cartas as $carta){
                    echo "<p>-$contador: ".$carta."</p>";
                    $contador++;
                }
            }
            //Si no es null
            else
                echo "<p>El numero que ha introducido es invalido: debe ser un numero del 1 al 40</p>";
            
        }
        ?>
    </body>
</html>
