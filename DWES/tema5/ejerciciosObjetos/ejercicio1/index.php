<!DOCTYPE html>
<?php
require_once 'Animal.php';
require_once 'Mamifero.php';
require_once 'Ave.php';
require_once 'Gato.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $animal=new Gato("Misifu", 4, "Carnívoro", true, 5);
        
        $animal->maullar();
        
        echo "<p>$animal</p>";
        ?>
    </body>
</html>
