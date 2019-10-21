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
        
        <form action="ejercicioStock.php" method="post">
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
            if (isset($_POST["mostrarStock"]) && !isset($errorConex)){ ?>
                <form action="ejercicioStock.php" method="post">

                    <?php

                    if (!isset($errorConex)){
                        //Mostrar datos de stock
                        $resultados=$conex->query("SELECT * FROM stock, tienda where producto='".$_POST["producto"]."' and tienda.cod=stock.tienda;");

                        //Almacenar error MySQL en caso de que lo haya
                        if (!$resultados){
                            $error=$conex->error;
                        }

                        //Imprimir objetos
                        if (!isset($error)){
                            while($objeto=$resultados->fetch_object()){?>
                                <?php echo "Tienda $objeto->nombre: $objeto->unidades <br>";
                            }
                        }
                    }
                    ?>
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
