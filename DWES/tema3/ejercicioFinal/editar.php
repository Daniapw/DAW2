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
        $resultados= getProducto($_POST['codProducto']);
        
        $producto=$resultados->fetch(PDO::FETCH_OBJ);?>
        
        <form action="actualizar.php" method='post'>
            Nombre corto: <?php echo $producto->nombre_corto;?><br><br>
            
            Nombre:<br><textarea name='nombre' cols='15' rows='4'><?php echo $producto->nombre_corto;?></textarea><br><br>
            
            Descripción:<br> <textarea name='descripcion' cols='30' rows='7'><?php echo $producto->descripcion?></textarea><br><br>
            
            PVP: <input type='number' min='0' step='0.01' value='<?php echo $producto->PVP?>'/><br>
            
            <input type='submit' name='actualizar' value='Actualizar'/>
        </form>
</div>

<div id="pie">
</div>
</body>
</html>