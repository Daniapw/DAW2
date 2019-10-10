<?php
function getBody($destino){
    
    $body=
    
    "<form action=$destino method='post'>
        
        Numero filas: <input type='number' min='2' name='filas' required><br>
        Numero columnas: <input type='number' min='1' name='columnas' required><br>
        
        <input type='submit' value='Crear Matriz' name='crear' />
        
    </form>";
    
    return $body;
    
}


//Funcion para crear matriz y rellenar con numeros enteros
function crearMatriz($filas, $columnas){
    
    $matriz=array(array());
    
    for ($i=0; $i<$filas; $i++){
        for($j=0; $j<$columnas; $j++){
            $matriz[$i][$j]= rand(1, 9);
        }  
    }
    
    return $matriz;
}


//Funcion para imprimir matriz

function imprimirMatriz($matriz){
    
    echo("Matriz:<br><br>");
    
    foreach ($matriz as $fila) {
        foreach ($fila as $columna) {
            echo("$columna ");
        }
        echo("<br>");
    }
    
}

//Sumar filas matriz
function sumaFilasMatriz($matriz){
    
    $sumaFila=0;
    $resultados= [];
    
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
    
    $sumaColumna=0;
    $resultados=[];

    for ($i=0; $i < count($matriz[0]); $i++){
        
        $sumaColumna=0;
        for ($j=0; $j < (count($matriz)); $j++){
            $sumaColumna+=$matriz[$j][$i];
        }
        
        $resultados[]=$sumaColumna;
    }
    
    return $resultados;
}