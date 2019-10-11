<html>
<head>
</head>
<body>
<?php
require 'funcionesAgenda.php';

if (isSet($_POST["enviar"])){
    $contador=1;
    $agenda=array();
    
    var_dump($_POST);
    foreach ($_POST as $valor) {
        
        if($valor!="Enviar"){
            
            switch($contador){
                case 1:{
                    $nombre=$valor;
                    $contador++;
                    break;
                }
                case 2:{
                    $agenda[$nombre]=$valor;
                    $contador=1;
                    break;
                }  
            }
            
        }
    }
    
    echo(mostrarAgenda($agenda));
}
else{?>
    <form action="indexAgenda.php" method="post">
        Nombre: <input type="text" name="nombre" value="" required /><br>
        Telefono: <input type="text" name="telefono" value="" required/><br>
        <input type="submit" value="Enviar" name="enviar" />
    </form>
<?php
}
?>
</body>
</html>