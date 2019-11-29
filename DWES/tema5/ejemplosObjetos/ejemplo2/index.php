<!DOCTYPE html>
<?php
require_once 'Producto.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $producto=new ProductoE(1, "Pantalon", 50.5);
        $producto->insert();
        $producto->nuevoProducto(2, "B", 10);
        
        $productos=ProductoE::getAllProductos();
        
        foreach($productos as $valor){
            echo "$valor <br><br>";
        }
        ?>
    </body>
</html>
