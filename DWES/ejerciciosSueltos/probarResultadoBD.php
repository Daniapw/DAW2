<?php

$conex=new mysqli("localhost", 'dwes', 'abc123.', 'ejemplo');

if ($conex->connect_errno!=NULL){
    echo $conex->connect_errno."<br>";
    echo $conex->connect_error."<br>";
}

$result=$conex->query("SELECT * FROM datos");

while($objeto=$result->fetch_object()){
    echo "DNI: ".$objeto->DNI."<br>";
    echo "Nombre: ".$objeto->Nombre."<br>";
}
