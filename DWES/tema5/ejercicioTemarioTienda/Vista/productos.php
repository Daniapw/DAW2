<?php
require_once '../Controlador/ProductoControlador.php';
require_once '../Modelo/Producto.php';
require_once '../Modelo/Cesta.php';

//Reanudar sesion
session_start();

//Si existe la variable usuario es que hay una sesion activa
if (!isset($_SESSION['usuario']))
    header("Location: login.php");

//Si no existe la variable de sesion 'cesta', se crea
if (!isset($_SESSION['cesta']))
    $_SESSION['cesta']=new Cesta();

//Si se anade un producto su codigo y precio se anadiran a la variable de sesion cesta
if (isset($_POST['anadir'])){
    $producto=new Producto($_POST['codProducto'], $_POST['nombreCorto'], $_POST['PVP']);
    $_SESSION['cesta']->addProducto($producto);
}

//Si el usuario quiere vaciar la cesta
if (isset($_POST['vaciar']))
    $_SESSION['cesta']->vaciarCesta();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
<!-- Ejemplo: Ejemplo: Tienda web. productos.php -->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ejemplo Tema 4: TIENDA-Listado de productos</title>
        <link href="tienda.css" rel="stylesheet" type="text/css">
    </head>
    <body class="pagproductos">
        <div id="contenedor">
            <div id="encabezado">
                <h1>Listado de productos</h1>
            </div>
            <div id="cesta">
                <h3><img src="cesta.jpg" alt="Cesta" width="24" height="21">Cesta</h3>
                <?php
                    if (isset($_SESSION['cesta']))
                        $_SESSION['cesta']->listarProductos();
                ?>
                <hr />
                <form action="productos.php" method="POST">
                    <input type="submit" name="vaciar" value="Vaciar Cesta" <?php if (empty($_SESSION['cesta']->productos)) echo 'disabled'; ?>>
                </form>
                <form action="cesta.php" method="POST">
                    <input type="submit" name="comprar" value="Comprar" <?php if (empty($_SESSION['cesta']->productos)) echo 'disabled'; ?>>
                </form>
                
            </div>
            <div id="productos">
                <?php
                    //Listar productos disponibles 
                    ProductoControlador::listarProductosConForms();
                
                ?>
            </div>
            <br class="divisor" />
            <div id="pie">
                <form action="logoff.php" method="POST">
                    <input type="submit" name="salir" value="Salir ">
                </form>
             
                <p class='error'>  </p>
                
            </div>
            
        </div>
    
    
    
    
    
    
</body>
</html>

