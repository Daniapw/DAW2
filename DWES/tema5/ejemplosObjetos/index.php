<!DOCTYPE html>
<?php
require_once 'Persona.php';
require_once 'Empleado.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $persona1=new Persona("Daniel", "Ruiz","23");
        
        $_SESSION["persona"]=$persona1;
        
        //Para crear una copia de un objeto hay que usar clone, si no se usara $persona2 seria una referencia a $persona1
        //por lo que si cambio una propiedad de $persona2 o $persona1 se cambiarian los dos ya que estan haciendo referencia al mismo objeto
        $persona2=clone($persona1);
        
        $persona2->nombre="Antonio";
        
        $emp1=new Empleado("Pepe", "Romero", 45, 2400);
        
        echo $emp1;
        
        $persona1->muestra(1, 2);
        
        ?>
    </body>
</html>
