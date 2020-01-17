<?php
if (isset($_POST['enviar'])){
    
    //Numero
    $numero=$_POST['numero'];
    
    //Obtener datos segun sorteo
    if ($_POST['loteria']=="1")
        $urlDatos="https://api.elpais.com/ws/LoteriaNavidadPremiados?n=$numero";
    else
        $urlDatos="http://api.elpais.com/ws/LoteriaNinoPremiados?n=$numero";

    
    //Formatear datos
    $datos= file_get_contents($urlDatos);
    
    $datosFormateados= explode(",", $datos);
    
    if (count($datosFormateados)>1)
        $premio=substr($datosFormateados[1],9);
    else
        $premio=false;
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="ejercicio2.php" method="POST">
            Introduzca el numero que desea comprobar:
            <input type="number" name="numero" min="0" max="84999"  required><br>
            
            Seleccione el sorteo:
            <select name="loteria">
                <option value="1">Navidad</option>
                <option value="2">El Niño</option>

            </select>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        
        <?php
        if (isset($_POST['enviar'])){
            echo "<hr>";
            
            if (is_string($premio)){
                echo "<h3>Resultado</h3>"
                . "<p><b>Premio</b>: $premio €</p>";
            }
            else
                echo "Error, introduzca un numero valido";   
        }
        
        ?>
        
    </body>
</html>
