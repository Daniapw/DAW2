<!DOCTYPE html>
<?php
require_once 'Animal.php';
require_once 'Mamifero.php';
require_once 'Ave.php';
require_once 'Perro.php';
require_once 'Gato.php';
require_once 'Canario.php';
require_once 'Pinguino.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $perro=new Perro("Rex", 4, "Carnivoro", 7);
        $gato=new Gato("Misifu", 4, "Carnívoro", true, 5);
        $canario= new Canario("Chipi", 2, "Granívoro", "Amarillo", "Corto, de forma conica");
        $pinguino=new Pinguino("Pingu", "2", "Carnivoro", "Negro y blanco", "Largo y delgado, con la parte superior mirando hacia abajo" );
        
        $animales=[$perro, $gato, $canario, $pinguino];
        
        foreach ($animales as $animal) {
            echo get_class($animal)."<br>";
            echo $animal."<br><hr>";
        }
        ?>
    </body>
</html>
