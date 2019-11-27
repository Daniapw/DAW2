<!DOCTYPE html>
<?php
require_once 'Animal.php'
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $animal=new Animal("Agapornis", 2, "Omnivoro", 0.2);
        
        echo "<p>$animal</p>";
        ?>
    </body>
</html>
