<!DOCTYPE html>
<?php
require_once 'Vehiculo.php';
require_once 'Coche.php';
require_once 'Bicicleta.php';


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $bici=new Bicicleta();
        $coche=new Coche();
        
        echo "Andar con la bicicleta: ".$bici->andar(5)."<br>";
        $bici->hacerCaballito();
        echo "<br>";
        
        echo "Andar con el coche: ".$coche->andar(15)."<br>";
        $coche->quemarRueda();
        echo "<br>";
        
        echo "Kilometraje bicicleta: ".$bici->getKmsRecorridos()."<br>";
        echo "Kilometraje coche: ".$coche->getKmsRecorridos()."<br>";
        echo "Kilometraje total: ".Vehiculo::getKmsTotales()."<br>";

        
        ?>
    </body>
</html>
