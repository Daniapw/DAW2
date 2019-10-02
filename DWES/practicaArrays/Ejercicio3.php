<?php

$peliculas = array(
  
  "Enero"=>9,
  "Febrero"=>12,
  "Marzo"=>0,
  "Abril"=>17
        
);

foreach ($peliculas as $clave=>$value) {
    if($value>0)
        echo("$clave: $value <br>");
}

