<?php

    $suma=0;
    for($contador=1;$contador<=100;$contador++){
        $suma+= pow($contador, 2); 
    }
    
    echo("<p>Total: </p>".$suma);
?>