<?php

    $num1=rand(1,100);
    $num2=rand(1,100);
    $num3=rand(1,100);
    
    $menor=$num1;
    $medio=$num1;
    $mayor=$num1;
    
    //Num1
    if ($num1>$num2 && $num1>$num3){
        $mayor=$num1;
    }
    else if($num1<$num2 && $num1<$num3){
        $menor=$num1;
    }
    else {
        $medio=$num1;
    }
    
    //Num2
    if ($num2>$num1 && $num2>$num3){
        $mayor=$num2;
    }
    else if($num2<$num1 && $num2<$num3){
        $menor=$num2;
    }
    else{
        $medio=$num2;
    }
    
    //Num3
    if ($num3>$num1 && $num3>$num2){
        $mayor=$num3;
    }
    else if($num3<$num1 && $num3<$num2){
        $menor=$num3;
    }
    else{
        $medio=$num3;
    }
    
    echo("<p>Números: $num1 $num2 $num3 <br>"
            . "Números ordenados: $menor $medio $mayor </p>");
?>
