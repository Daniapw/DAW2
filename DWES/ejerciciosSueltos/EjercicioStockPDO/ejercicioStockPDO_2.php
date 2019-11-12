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
        <?php
        
        //Gestion de errores
        $error=false;
        $mensajeError="";
        
        try{
            //Conexion
            @$conex=getConex();
            
        ?>
        
        <form action="ejercicioStockPDO_2.php" method="post">
            Producto:
            <?php
                
            //CREAR OPCIONES DEL SELECT DE PRODUCTOS
            $resultados=$conex->query("SELECT * FROM producto");

            ?>
            
            <select name="producto">
                <?php
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

        //Actualizar tiendas en base de datos
        if (isset($_POST['actualizar'])){
            
            $consultaPrep=$conex->prepare("UPDATE stock, tienda SET unidades=:uds WHERE tienda.nombre=:nom AND stock.tienda=tienda.cod AND stock.producto=:prod;");

            //Realizar actualizaciones
            foreach ($_POST["tiendas"] as $tienda){

               $unidadesProducto=$_POST['uds'.$tienda];
               
               $consultaPrep->bindParam(":uds", $unidadesProducto);
               $consultaPrep->bindParam(":nom", $tienda);
               $consultaPrep->bindParam(":prod", $_POST['producto']);

               $consultaPrep->execute();
           }

            
        }

        //Mostrar resultados si no ha habido un error de conexion
        if (isset($_POST["mostrarStock"]) || isset($_POST['actualizar'])){ ?>
            <form action="ejercicioStockPDO_2.php" method="post">

                <?php
                //Mostrar datos de stock
                $resultados=$conex->query("SELECT * FROM stock, tienda where producto='".$_POST["producto"]."' and tienda.cod=stock.tienda;");

                //Imprimir objetos
                while($objeto=$resultados->fetch(PDO::FETCH_OBJ)){?>
                    <?php echo "Tienda $objeto->nombre: <input type='number' min=0 value='$objeto->unidades' name='uds$objeto->nombre'/><br>";
                    echo "<input type='hidden' name=tiendas[] value='$objeto->nombre' />";
                }

                ?>

                <input type="hidden" value='<?php echo $_POST['producto'] ?>' name="producto"/>
                <input type="submit" value="Actualizar" name="actualizar"/>

                <?php
                
                //Cerrar conexion
                unset($conex);
                ?>
            </form>
        <?php
        }
        ?>
    </div>

    <?php
            
    }catch(PDOException $e){
        $error=true;
        $mensajeError=$e->getMessage();
    }?>
    
    <div id="pie">
        <?php
        
        if ($error)
            echo $mensajeError;
        
        ?>
    </div>
</body>
    
</html>
