<?php

$conex=new PDO('mysql:host=localhost;dbname=dwes', 'dwes', 'abc123.');
$conex->beginTransaction();

$error=false;

//Realizar update
if ($conex->exec("UPDATE stock SET unidades=1 WHERE producto='PAPYRE62GB' AND tienda=1;")===FALSE){
    echo 'ERROR UPDATE<br>';
    $error=true;
}

//Realizar insert
if ($conex->exec("INSERT INTO stock VALUES('PAPYRE62GB', 2, 1);")===FALSE){
    echo 'ERROR INSERT<br>';
    $error=true;
}

//Si no hay errores
if (!$error){
    $conex->commit();
    echo 'CAMBIOS REALIZADOS CON EXITO';
}
//Si los hay
else{
    $conex->rollBack();
    echo 'NO SE HAN PODIDO REALIZAR LOS CAMBIOS';
    
}

//Cerrar conexion
unset($conex);