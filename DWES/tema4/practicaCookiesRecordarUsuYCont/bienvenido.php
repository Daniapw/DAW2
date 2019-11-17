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
        $usuarioActual=$_COOKIE['usuario'];
                
        echo "Hola <b>".$usuarioActual."</b>, su ultima visita fue el <b>". $_COOKIE[$usuarioActual]["fechaUltimaVisita"]."</b>";
        
        //Cambiar cookie fecha ultima visita
        setcookie("$usuarioActual"."[fechaUltimaVisita]", date('d/m/Y h:i:s', time()),  time()+3600);
        ?>
    </body>
</html>