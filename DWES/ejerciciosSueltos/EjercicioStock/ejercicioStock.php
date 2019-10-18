<?php
include 'funcionesBD.php';
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
        <?php
            //Conexion
            $conex= getConex();
        ?>
        
        <form action="ejercicioStock.php" method="post">
            Producto:
            <select name="producto">
                <?php
                    //CREAR OPCIONES DEL SELECT DE PRODUCTOS

                    if(!is_array($conex)){
                        $resultados=$conex->query("SELECT * FROM producto");

                        imprimirSelect($resultados);
                    }
                    
                ?>
            </select>
            
            <input type="submit" value="Mostrar stock" name="mostrarStock" />
        </form>
    </div>
    
    <!--Cuerpo con stock-->
    <?php
    if (isset($_POST["mostrarStock"]) ||isset($_POST['actualizar'])){ ?>
        <div id="contenido">
            
           <?php
            
            /*Realizar cambios en la tabla
            if(isset($_POST['actualizar'])){
                
                if (isset($_POST['CENTRAL'])){
                    $conex->query("UPDATE stock, tienda SET unidades='".$_POST['CENTRAL']."'"
                            . "WHERE stock.tienda=tienda.cod AND tienda.nombre=".key($_POST["CENTRAL"]).""
                            . "AND producto='".$_POST['producto']."';");
                    echo $conex->error;
                }
            }*/
           ?>

            <h1>Stock del producto en las tiendas</h1>
            <form action="ejercicioStock.php" method="post">
                
                <?php
                    //Mostrar datos de stock
                    $resultados=$conex->query("SELECT * FROM stock, tienda where producto='".$_POST["producto"]."' and tienda.cod=stock.tienda;");
                    
                    while($objeto=$resultados->fetch_object()){?>
                        <?php echo "Tienda: ".$objeto->nombre." <input type='number' min='0' name='$objeto->nombre' value='$objeto->unidades'/><br>";

                    }
                ?>
                
                <input type="hidden" value='<?php echo $_POST["producto"] ?>' name="producto"/>
                <input type="submit" value="Actualizar" name="actualizar" />
            </form>
        </div>
    <?php
    }
    ?>
    
    <!--Pie de pagina con errores-->
    <div id="pie">
        <?php
        
            //Mostrar error de conexion
            if (is_array($conex)){
                echo "Error de conexion: ".$conex['conex'];
            }
            
        ?>
    </div>
</body>
    
</html>
