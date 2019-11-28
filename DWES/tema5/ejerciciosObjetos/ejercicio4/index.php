<!DOCTYPE html>
<?php
require_once 'Zona.php';

//Crear zonas
if (!isset($zonas)){
    echo "false";
    $zonas=[
        "principal"=>new Zona("Principal", 2000),
        "compraVenta"=>new Zona("Compra-Venta", 200),
        "VIP"=>new Zona("VIP", 25)
    ];
    
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Expocoches Campanillas</h1>
        <p>Bienvenido a Expocoches Campanillas. ¿Cuántas entradas desea comprar?</p>
        <form action="index.php" method="post">
            Zona: 
            <select name="zona">
                <option value="0">Principal</option>
                <option value="1">Compra-venta</option>
                <option value="2">VIP</option>
            </select>
            
            Numero de entradas: <input type="number" min="1" max="2000">
            <input type="submit" name="enviar" value="Enviar"><br>
            
            <?php
            //Mostrar zonas y numero de entradas
            foreach($zonas as $value){
                echo $value."<br>";
            }
            ?>

        </form>
    </body>
</html>
