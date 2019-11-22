<!DOCTYPE html>
<?php
REQUIRE 'funciones.php';

session_start();

checkSesion(false, "index.php");

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <?php getStyles(); ?>
    </head>
    <body>
        <?php
        echo "<p>Bienvenido $_SESSION[nombre]</p>";?>
        <form action="logoff.php" method="post">
            <input type="submit" name="salir" value="Salir">
        </form>
        
        <form action="datos.php" method="post">
            <input type="submit" name="verDatos" value="Ver mis datos">
        </form>
    </body>
</html>
