<!DOCTYPE html>
<?php
require_once 'Zona.php';

session_start();

$errorEntradas=false;

//Crear zonas si no existen
if (!isset($_SESSION["zonas"])){
    $_SESSION["zonas"]=[
        "principal"=>new Zona("Principal", 2000),
        "compraVenta"=>new Zona("Compra-Venta", 200),
        "VIP"=>new Zona("VIP", 25)
    ];   
}

//Si el usuario le ha dado a comprar 
if (isset($_POST['comprar'])){
    
    //Coger zona
    if ($_POST['zona']==0)
        $zona="principal";
    elseif($_POST['zona']==1)
        $zona="compraVenta";
    elseif($_POST['zona']==2)
        $zona="VIP";
    
    //Comprobar plazas y realizar venta si es posible
    if ($_SESSION["zonas"][$zona]->comprobarPlazas($_POST['numEntradas']))
        $_SESSION["zonas"][$zona]->vender($_POST['numEntradas']);
    else
        $errorEntradas=true;
        
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
        <?php 
        //Mostrar mensaje de error o exito
        if ($errorEntradas)
            echo "<p style='color:red;'>Lo sentimos, no hay suficientes plazas disponibles en esa zona</p>";
        elseif(!$errorEntradas && isset($_POST['comprar']))
            echo "<p style='color:green;'>Compra realizada con exito</p>";
        
        ?>
        <form action="index.php" method="post">
            Zona: 
            <select name="zona">
                <option value="0">Principal</option>
                <option value="1">Compra-venta</option>
                <option value="2">VIP</option>
            </select>
            
            Numero de entradas: <input type="number" name="numEntradas" min="1" required>
            <input type="submit" name="comprar" value="Comprar"><br><br>
            
            <?php
            //Mostrar zonas y numero de entradas
            foreach($_SESSION["zonas"] as $value){
                echo $value."<br>";
            }
            ?>

        </form>
    </body>
</html>
