<?php

$conex=new mysqli("localhost", 'dwes', 'abc123.', 'ejemplo');

if ($conex->connect_errno!=NULL){
    echo $conex->connect_errno."<br>";
    echo $conex->connect_error."<br>";
}
else{
    $conex->query("DELETE FROM datos WHERE Salario>2000");
    
    if ($conex->errno!=0)
        echo $conex->error."<br>";
    else
        echo "FILAS: ".$conex->affected_rows;
    
    echo $conex->error;
    
}

$conex->close();