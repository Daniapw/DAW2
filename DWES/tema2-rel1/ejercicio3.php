<?php
    
    $numeros = array(rand(1,100), rand(1,100), rand(1,100));
    
    $mayor=$numeros[0];
    foreach ($numeros as $valor){
        
        echo($valor."<br>");
        
        if ($mayor<$valor){
            $mayor=$valor;
        }
        
    }
    
    echo("<p>El mayor es $mayor");
?>