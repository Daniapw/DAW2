
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <?php
    session_start();
    if (!isset($_SESSION['usuario']))
        header("Location: login.php");

    if (!isset($_SESSION['visitas']))
        echo "Bienvenido  $_SESSION[usuario], esta es tu primera visita";
    else{
        echo "Hola de nuevo $_SESSION[usuario] <br>";
        
        echo 'Visitas anteriores:<br>';
        
        foreach ($_SESSION['visitas'] as $value){
            $fecha=date("d/m/Y h:i:s", $value);
            echo "$fecha<br>";
        }
        
    }
    
    $_SESSION['visitas'][]=mktime();
    ?>
        <form action="gestionarSesion.php" method="post">
            <input type="submit" value="Borrar historial" name="borrarHist">
            <input type="submit" value="Cerrar sesión" name="cerrarSesion">
        </form>
        
    </body>
</html>

