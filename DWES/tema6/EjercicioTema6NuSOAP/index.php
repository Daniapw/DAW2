<?php
require_once 'Client.php';
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $cliente=new Client();
        
            $resultado=$cliente->getPVP("3DSNG");
            
            //$resultado=$cliente->getProductosFamilia("CAMARA");
            
            echo $resultado;
            
            /*foreach($resultado as $res){
                echo $res.'<br>';
            }*/
            
            
        ?>
    </body>
</html>
