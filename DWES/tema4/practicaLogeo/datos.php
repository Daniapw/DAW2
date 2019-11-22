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
    </head>
    <?php getStyles(); ?>
    <body>
        <?php
        $datosUsuario= getUsuario($_SESSION['usuario']);
        
        echo 
        "<ul>"
        . "<li>Nombre: $datosUsuario[nombre]</li>"
        . "<li>Apellidos: $datosUsuario[apellidos]</li>"
        . "<li>Direccion: $datosUsuario[direccion]</li>"
        . "<li>Localidad: $datosUsuario[localidad]</li>"
        . "<li>Mail: $datosUsuario[mail]</li>"
       ."</ul>"
        ?>
        <form action="logoff.php" method="post">
            <input type="submit" name="salir" value="Salir">
        </form>
        
        <a href="inicio.php">Volver a inicio</a>
    </body>
</html>
