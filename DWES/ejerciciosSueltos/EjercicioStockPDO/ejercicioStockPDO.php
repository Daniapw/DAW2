<?php
require 'funcionesBD_PDO.php';
?>

<html>
<head>
<style>
    h1 {margin-bottom:0;}
    #encabezado {background-color:#ddf0a4;}
    #contenido {background-color:#EEEEEE;height:600px;}
    #pie {background-color:#ddf0a4;color:#ff0000;height:30px;}
</style>
</head>

<body>
    
    <!--Encabezado con formulario productos-->
    <div id="encabezado">
        <h1>Ejercicio: Consultas preparadas en MySQLi</h1>
        
        <form action="ejercicioStockPDO.php" method="post">
            Producto:
            <select name="producto">
                <?php
                $conex=getConex();
                //CREAR OPCIONES DEL SELECT DE PRODUCTOS
                $resultados=$conex->query("SELECT * FROM producto");
                    
                //Crear opciones select
                crearOpciones($resultados);
                    
                ?>
            </select>
            
            <input type="submit" value="Mostrar stock" name="mostrarStock" />
        </form>
    </div>
    
    <!--Cuerpo con stock-->
    <div id="contenido">

        <h1>Stock del producto en las tiendas</h1>
        <?php
        if (isset($_POST["mostrarStock"])){ ?>
            <form action="ejercicioStock.php" method="post">
            <?php

                //Conexion
                $conex= getConex();

                //Mostrar datos de stock
                $resultados=$conex->query("SELECT * FROM stock, tienda where producto='".$_POST["producto"]."' and tienda.cod=stock.tienda;");

                //Imprimir objetos
                while($objeto=$resultados->fetch(PDO::FETCH_OBJ)){?>
                    <?php echo "Tienda $objeto->nombre: $objeto->unidades <br>";
                }
                unset($conex);
            ?>
            </form>
        <?php
        }
        ?>
    </div>
 
</body>
    
</html>
