<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Plantilla para Ejercicios Tema 3</title>
  <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php REQUIRE 'funcionesEjFinalT3.php' ?>
<div id="encabezado">
    <h1>Edición de un producto</h1>
</div>

<div id="contenido">
	<h2>Producto:</h2>
        <?php
        
        //Variable para almacenar posible mensaje de error
        $mensajeError="";
        
        
        //Obtener registro usando codigo obtenido del formulario de la pagina listado.php
        try{
            $resultados= getProducto($_POST['codProducto']);
            
            //Obtener registro en forma de objeto
            $producto=$resultados->fetch(PDO::FETCH_OBJ);?>

            <!--Mostrar formulario con informacion del producto usando propiedades del objeto-->
            <form action="actualizar.php" method='post'>
                Nombre corto: <input type='text' name='nombreCorto' value='<?php echo $producto->nombre_corto;?>' /><br><br>

                Nombre:<br><textarea name='nombre' cols='15' rows='4'><?php echo $producto->nombre;?></textarea><br><br>

                Descripción:<br> <textarea name='descripcion' cols='30' rows='7'><?php echo $producto->descripcion?></textarea><br><br>

                PVP: <input type='number' min='0' step='0.01' name='precio' value='<?php echo $producto->PVP?>'/><br>

                <input type="hidden" name="codProducto" value="<?php echo $producto->cod;?>"/>
                <input type='submit' name='actualizar' value='Actualizar'/>
            </form>
            
            <form action="listado.php">
                <input type="submit" name="cancelar" value="Cancelar"/>
            </form>
        
        <?php
        }catch(PDOException $e){
            $mensajeError=$e->getMessage();
        }
        ?>
</div>

<div id="pie">
    <?php echo "<h3 style='color:red;'>$mensajeError</h3>"; ?>
</div>
</body>
</html>