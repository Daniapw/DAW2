<!DOCTYPE html>
<?php
require_once 'Cubilete.php';
require_once 'DadoPoker.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $cubilete=new Cubilete();
        
        $cubilete->tirarDados();
        
        echo $cubilete->mostrarResultados();
        
        echo "<br>Tiradas totales: ".DadoPoker::getTiradasTotales();
        ?>
    </body>
</html>
