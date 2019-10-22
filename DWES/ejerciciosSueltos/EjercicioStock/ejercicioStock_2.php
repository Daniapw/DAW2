<?php
require 'funcionesBD.php';
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
        @$conex=new mysqli("localhost", 'dwes', 'abc123.', 'dwes');

        //Almacenar error MySQL en caso de que lo haya
        if ($conex->connect_errno!=null){
            $errorConex=$conex->connect_error;
        }

        ?>
        
        <form action="ejercicioStock_2.php" method="post">
            Producto:
            <select name="producto">
                <?php
                
                //CREAR OPCIONES DEL SELECT DE PRODUCTOS
                if(!isset($errorConex)){
                    $resultados=$conex->query("SELECT * FROM producto");

                    //Almacenar error MySQL en caso de que lo haya
                    if (!$resultados){
                        $error=$conex->error;
                    }
                    
                    //Crear opciones select
                    if (!isset($error)){
                        crearOpciones($resultados);
                    }
                }
                    
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
            $consultaPrep=$conex->stmt_init();
            
            @$consultaPrep->prepare("UPDATE stock, tienda SET unidades=? WHERE tienda.nombre=? AND stock.tienda=tienda.cod AND stock.producto=?;");
            
            //Almacenar error MySQL
            if ($consultaPrep->errno!=null){
                $error=$consultaPrep->error;
            }

            //Realizar actualizaciones
            if (!isset($error)){
                foreach ($_POST["tiendas"] as $tienda){

                   $unidadesProducto=$_POST['uds'.$tienda];

                   $consultaPrep->bind_param('iss', $unidadesProducto, $tienda, $_POST['producto']);

                   $consultaPrep->execute();
               }
               
               //Cerrar conexion consultaPrep
               $consultaPrep->close();
            }
            
        }

        //Mostrar resultados si no ha habido un error de conexion
        if ((isset($_POST["mostrarStock"]) || isset($_POST['actualizar'])) && !isset($errorConex)){ ?>
            <form action="ejercicioStock_2.php" method="post">

                <?php
                //Mostrar datos de stock
                $resultados=$conex->query("SELECT * FROM stock, tienda where producto='".$_POST["producto"]."' and tienda.cod=stock.tienda;");

                //Almacenar error MySQL en caso de que lo haya
                if (!$resultados){
                    $error=$conex->error;
                }

                //Imprimir objetos
                if (!isset($error)){
                    while($objeto=$resultados->fetch_object()){?>
                        <?php echo "Tienda $objeto->nombre: <input type='number' min=0 value='$objeto->unidades' name='uds$objeto->nombre'/><br>";
                        echo "<input type='hidden' name=tiendas[] value='$objeto->nombre' />";
                    }
                    
                    ?>
                
                    <input type="hidden" value='<?php echo $_POST['producto'] ?>' name="producto"/>
                    <input type="submit" value="Actualizar" name="actualizar"/>
                    
                    <?php
                    //Cerrar conexion
                    $conex->close();
                }?>
            </form>
        <?php
        }
        ?>
    </div>
 
    
    <!--Pie de pagina con errores-->
    <div id="pie">
        <?php
        
        //Mostrar error de conexion
        if (isset($errorConex)){
            echo "Error de conexion: ".$errorConex."<br>";
        }

        //Mostrar error MySQL
        if (isset($error)){
            echo "Error MySQL: ".$error;
        }
            
        ?>
    </div>
</body>
    
</html>
