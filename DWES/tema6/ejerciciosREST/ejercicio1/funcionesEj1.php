<?php

function getDatosCiudad($ciudad){
    $datos = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=$ciudad,\Spain&units=metric&lang=es&appid=62e0d36f7df9094f4c07d37029be79ea");
    
    $tiempo= json_decode($datos);
    
    return $tiempo;
}
