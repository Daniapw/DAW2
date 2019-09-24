<html>
<head>        
</head>
<body>
    
<?php
    
$num= rand(1, 7);

echo ($num."<br>"); 
switch($num){
    case 1:{
        echo ("Lunes");
        break;
    }
    case 2:{
        echo ("Martes");
        break;
    }
    case 3:{
        echo ("Miércoles");
        break;
    }
     case 4:{
        echo ("Jueves");
        break;
    }
     case 5:{
        echo ("Viernes");
        break;
    }
    
     case 6:{
        echo ("Sábado");
        break;
    }
     case 7:{
        echo ("Domingo");
        break;
    }
}

?>
    
    
</body>

    
    
</html>

