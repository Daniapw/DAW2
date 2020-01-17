<?php
if (isset($_POST['enviar'])){
    
    //Determinar parametros de la url para la API
    if($_POST['monedaDestino']=="TODAS")
        $urlApi="http://localhost/REST/ejerciciosREST/ejercicio3/ejercicio3.php?cantidad=$_POST[cantidad]&mo=$_POST[monedaOrigen]";
    else
        $urlApi="http://localhost/REST/ejerciciosREST/ejercicio3/ejercicio3.php?cantidad=$_POST[cantidad]&mo=$_POST[monedaOrigen]&md=$_POST[monedaDestino]";
    
    //Obtener json
    $json= file_get_contents($urlApi);

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
        <h1>Conversion de divisas</h1>
        <form action="#" method="POST">
            Cantidad: <input type="number" name="cantidad" min="0" step="0.01" required><br>
            
            Moneda origen:<br>
            <select name="monedaOrigen">
                <option value="EUR">EUR</option>
                <option value="USD">USD</option>
                <option value="GBP">GBP</option>
            </select><br>
            
            Moneda destino:<br>
            <select name="monedaDestino">
                <option value="EUR">EUR</option>
                <option value="USD">USD</option>
                <option value="GBP">GBP</option>
                <option value="TODAS">Todas</option>
            </select><br>
            
            <input type="submit" name="enviar" value="Enviar">
        </form>
        
        <?php
        if (isset($_POST['enviar'])){
            echo "<hr>"
            . "<h3>Conversion</h3>";
            
            if ($json==null)
                echo "Error al realizar la conversion";
            else{                
                echo "<ul>";
                
                //Mostrar valores monedas
                foreach($json->conversion as $moneda=>$valor){
                    echo "<li>$json->cantidad"."$json->monedaOrigen son $valor"."$moneda"; 
                }
                
                echo "</ul>";
            }
        }
        ?>
    </body>
</html>
