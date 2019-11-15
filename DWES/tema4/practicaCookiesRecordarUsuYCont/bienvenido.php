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
        $usuarioActual=$_COOKIE['usuarioActual'];
        
        if (!isset($_COOKIE["$usuarioActual"]["fechaUltimaVisita"]))
            setcookie("$usuarioActual"."[fechaUltimaVisita]", date('d/m/Y h:i', time()),  time()+3600);
        
        echo "Hola <b>".$usuarioActual."</b>, su ultima visita fue el <b>". $_COOKIE["$usuarioActual"]["fechaUltimaVisita"]."</b>";
        
        setcookie("$usuarioActual"."[fechaUltimaVisita]", date('d/m/Y h:i', time()),  time()+3600);
        ?>
    </body>
</html>