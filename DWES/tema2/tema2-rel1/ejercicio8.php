<?php

    $suma=0;
    
    for($contador=1;$contador<=100;$contador++){
        
        if($contador%2==0){
            $suma+= $contador;
        }
    }
    
    echo("<p>Total: </p>".$suma);
?>