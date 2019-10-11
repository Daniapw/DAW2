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
        
        //Sumar columnas
        $resultados= sumaColumnasMatriz($matriz);
        
        //Imprimir resultados
        echo("<br>");
        foreach ($resultados as $indice => $sumaColumna) {
            echo("Suma de columna $indice: $sumaColumna <br>");
        }
    }
    else{
    
        //Mostrar formulario
        echo(getBody("sumarColumnas.php"));
        
    } ?>
    
    <br>
    <a href="indexMatrices.php">Volver al menu</a>

</body>
    
</html>