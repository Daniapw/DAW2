<?php
//Funcion para coger html del formulario
function getBody($destino){
    
    $body=
    
    "<form action=$destino method='post'>
        
        Numero filas: <input type='number' min='2' name='filas' required><br>
        Numero columnas: <input type='number' min='2' name='columnas' required><br>
        
        <input type='submit' value='Crear Matriz' name='crear' />
        
    </form>";
    
    return $body;
    
}


//Funcion para crear matriz y rellenar con numeros enteros
function crearMatriz($filas, $columnas){
    
    for ($i=0; $i<$filas; $i++){
        for($j=0; $j<$columnas; $j++){
            $matriz[$i][$j]= rand(1, 9);
        }  
    }
    
    return $matriz;
}


//Funcion para imprimir matriz
function imprimirMatriz($matriz){
    
    echo("<table>");
    foreach ($matriz as $fila) {
        echo("<tr>");
        foreach ($fila as $columna) {
            echo("<td>$columna</td>");
        }
        echo("</tr>");
    }
    echo("</table>");
    
}

//Sumar filas matriz
function sumaFilasMatriz($matriz){
    
    foreach ($matriz as $fila) {
        
        $sumaFila=0;
        
        foreach ($fila as $columna) {
            $sumaFila+=$columna;
        }
        
        $resultados[]=$sumaFila;
    }
    
    return $resultados;
}

//Sumar columnas matriz
function sumaColumnasMatriz($matriz){

    for ($i=0; $i < count($matriz[0]); $i++){
        
        $sumaColumna=0;
        for ($j=0; $j < (count($matriz)); $j++){
            $sumaColumna+=$matriz[$j][$i];
        }
        
        $resultados[]=$sumaColumna;
    }
    
    return $resultados;
}

//Sumar resultados filas/columnas
function sumarResultados($resultados){
    
    $suma=0;
    foreach ($resultados as $valor) {
        $suma+=$valor;
    }
    
    return $suma;
}

//Funcion para calcular la suma de la diagonal principal
function sumaDiagonalPrincipal($matriz){
    
    $sumaDiagonal=0;
    
    for ($i=0; $i < count($matriz[0]); $i++){
        $sumaDiagonal+=$matriz[$i][$i];
    } 
    
    return $sumaDiagonal;
}


//Funcion para calcular la matriz traspuesta
function matrizTraspuesta($matriz){
    
    for($i=0; $i<count($matriz[0]); $i++){
        for ($j=0; $j<count($matriz); $j++){
            $traspuesta[$i][$j]=$matriz[$j][$i];
        }
    }
    
    return $traspuesta;
}