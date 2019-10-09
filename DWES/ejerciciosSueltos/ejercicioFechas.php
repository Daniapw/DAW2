<?php

function fechaCastellano($dia, $mes, $anio){
    
    //DIA SEMANA
    $fechaUnix= mktime(0, 0, 0, $mes, $dia, $anio);
    $diaSem=date("w", $fechaUnix);
    $diaSem=diaSemana($diaSem);
    
    //MES
    $mes=mes($mes);
    
    return "<p>$diaSem, $dia de $mes de $anio</p>";
}

function diaSemana($diaSem){
    switch ($diaSem){
        case 1:
            return "Lunes";
            break;
        case 2:
            return "Martes";
            break;
        case 3:
            return "Miercoles";
            break;
        case 4:
            return "Jueves";
            break;
        case 5:
            return "Viernes";
            break;
        case 6:
            return "Sabado";
            break;
        case 7:
            return "Domingo";
            break;
    }
}

function mes($mes){
    switch ($mes){
        case 1:
            return "Enero";
            break;
        case 2:
            return "Febrero";
            break;
        case 3:
            return "Marzo";
            break;
        case 4:
            return "Abril";
            break;
        case 5:
            return "Mayo";
            break;
        case 6:
            return "Junio";
            break;
        case 7:
            return "Julio";
            break;
        case 8:
            return "Agosto";
            break;
        case 9:
            return "Septiembre";
            break;
        case 10:
            return "Octubre";
            break;
        case 11:
            return "Noviembre";
            break;
        case 12:
            return "Diciembre";
            break;
    }
}