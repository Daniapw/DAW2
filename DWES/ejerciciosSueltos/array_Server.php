<?php
//Recorrer $_SERVER con las foreach
function tablaServer(){
    echo("<table border='1'>");
    echo("<tr><th>ÍNDICE</th>");
    echo("<th>VALOR</th></tr>");
    
    foreach($_SERVER as $clave=>$valor){
        echo("<tr>");
        echo("<td>$clave</td>");
        echo("<td>$valor</td>");
        echo("<tr>");
    }
    echo("</table>");
}

//Recorrer $_SERVER con las funciones para mover puntero de array
function tablaServer2(){
    echo("<table border='1'>");
    echo("<tr><th>ÍNDICE</th>");
    echo("<th>VALOR</th></tr>");
    
    while($valores=each($_SERVER)){
        echo("<tr>");
        echo("<td>$valores[0]</td>");
        echo("<td>$valores[1]</td>");
        echo("<tr>");
    }
    echo("</table>");
}