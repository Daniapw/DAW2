<?php

$conex=new mysqli("localhost", 'dwes', 'abc123.', 'dwes');

//Si hay un error de conexion se acaba el script
if ($conex->connect_errno!=NULL){
    echo $conex->connect_errno."<br>";
    echo $conex->connect_error."<br>";
    exit();
}

//Desactivar autocommit
$conex->autocommit(false);
$updateFunciona=$conex->query("UPDATE stock SET unidades=1 WHERE producto='3DSNG' AND tienda=1;");
$insertFunciona=$conex->query("INSERT INTO stock VALUES ('3DSNG', 3, 1);");

//Si funcionan las dos operaciones
if ($updateFunciona && $insertFunciona){
    echo "Operaciones llevadas a cabo con exito";
    $conex->commit();  
}
//Si no funcionan las dos
else{
    echo "Error: $conex->error <br>";
    echo "Operaciones fallidas";
    
    //Rollback para deshacer cambios;
    $conex->rollback();
}

//Reactivar autocommit
$conex->autocommit(true);

//Cerrar conexion
$conex->close();