<?php require 'funcionesMatrices.php' ?>

<html>
    
<body>

    <?php
    
    if (isset($_POST["crear"])){
        
        //Mostrar formulario
        echo(getBody("sumarColumnas.php")."<br>");
        
        //Crear e imprimir matriz
        $matriz = crearMatriz($_POST["filas"], $_POST["columnas"]);
        
        echo("Matriz:");
        imprimirMatriz($matriz);
        
        //Sumar filas
        $resultados=sumaFilasMatriz($matriz);
        
        //Mostrar resultados
        echo("<br>");
        foreach ($resultados as $indice => $sumaFila) {
            echo("Suma de fila $indice: $sumaFila <br>");
        }
    }
    else{
    
        //Mostrar formulario
        echo(getBody("sumarFilas.php"));
        
    } ?>
    <br>
    <a href="indexMatrices.php">Volver al menu</a>

</body>
    
</html>

