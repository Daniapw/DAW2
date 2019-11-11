<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Plantilla para Ejercicios Tema 3</title>
  <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php REQUIRE 'funcionesEjFinalT3.php';?>
<div id="encabezado">
	<h1>Ejercicio: </h1>
	<form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <select name="familia">
                <?php
                $resultados= getFamilias();
                
                crearOpcionesSelect($resultados, 'familia');
                
                ?>
            </select>
            
            <input type="submit" name="mostrar" value="Mostrar"/>
	</form>
</div>

<div id="contenido">
    
    <h1>Contenido</h1>
    <?php
        if(isset($_POST['mostrar'])){
            $resultados= getProductosDeFamilia($_POST['familia']);
            
            while ($objeto=$resultados->fetch(PDO::FETCH_OBJ)){
                echo "<form action='editar.php' method='post'>";
                echo "Producto $objeto->nombre_corto ( $objeto->PVP €)";
                echo "<input type='hidden' name='codProducto' value='$objeto->cod'/>";
                echo "<input type='submit' name='editar' value='Editar'/>";
                echo "</form>";
            }
            
            
        }
    
    
    ?>
</div>

<div id="pie">
</div>
</body>
</html>