<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Plantilla para Ejercicios Tema 3</title>
  <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php require 'funcionesEjFinalT3.php'?>

<div id="contenido">
    <?php
    //Realizar query con datos obetenidos de editar.php
    $conex=getConex();

    try{
        $conex->query("UPDATE producto SET nombre='$_POST[nombre]', nombre_corto='$_POST[nombreCorto]', descripcion='$_POST[descripcion]', PVP='$_POST[precio]' WHERE cod='$_POST[codProducto]';");

        //Si no se produce una excepcion se mostrara un mensaje 
        echo "<h3 style='color:green'>Se realizado la actualizacion con exito</h3>";
    }catch(PDOException $e){
        //Si se produce una excepcion aparecera el mensaje de error
        echo "<h3 style='color:red'>Error:".$e->getMessage() ."</h3>";
    }
    
    //Borrar conexion
    unset($conex);
    ?>
    
    <form action='listado.php' method='post'>
        <input type='submit' name='continuar' value='Continuar'/>
    </form>
    
</div>
</body>
</html>