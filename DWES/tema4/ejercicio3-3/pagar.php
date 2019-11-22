<?php
session_start();

//Si no se ha creado la variable de sesion 'usuario' se redirige a login
if (!isset($_SESSION['usuario']))
    header("Location: login.php");

//Si no se ha creado la variable de sesion 'cesta' se redirige a productos
if (!isset($_SESSION['cesta']))
    header("Location: productos.php");

REQUIRE 'funcionesTienda.php';

unset($_SESSION['cesta']);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
<!-- Ejemplo: Ejemplo: Tienda web. cesta.php -->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ejemplo Tema 4: TIENDA-Listado de productos</title>
        <link href="tienda.css" rel="stylesheet" type="text/css">
    </head>
    <body class="pagcesta">
        <div id="contenedor">
            <div id="encabezado">
                <h1>Pago</h1>
            </div>
            <div id="productos">
                <h1>Gracias por comprar en nuestra tienda!</h1>
                <hr />
                <form action="productos.php" method="POST">
                    <p><span class="pagar"><input type="submit" name="volver" value="Volver a la tienda"</span></p>
                </form>
            </div>
            <br class="divisor" />
            <div id="pie">
                <form action="logoff.php" method="POST">
                    <input type="submit" name="salir" value="Salir">
                </form>
            </div>
        </div>
        
        
        
    </body>
</head>
</html>