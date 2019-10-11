<?php

    //Do-While
    $suma=0;
    $contador=1;
    do{
        $suma+=$contador;
        $contador++;
    }while($contador<=100);
    
    echo("<p>Do-While:<p>".$suma);
    
    //While
    $suma=0;
    $contador=1;
    while($contador<=100){
        $suma+=$contador;
        $contador++;
    }
    
    echo("<p>While:<p>".$suma);
    
    //For
    $suma=0;
    for($contador=1; $contador<=100; $contador++){
        $suma+=$contador;
    }
    
    echo("<p>For:<p>".$suma);
?>
