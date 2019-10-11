<?php require 'funcionesMatrices.php' ?>

<html>
    
<body>

    <?php
    
    if (isset($_POST["crear"])){
        
        //Mostrar formulario
        echo(getBody("sumaFilasyColumnas.php")."<br>");
        
        //Crear e imprimir matriz
        $matriz = crearMatriz($_POST["filas"], $_POST["columnas"]);
        
        echo("Matriz:");
        imprimirMatriz($matriz);
        
        //Sumar filas y columnas
        $resultadosFilas= sumarResultados(sumaFilasMatriz($matriz));
        $resultadosColumnas= sumarResultados(sumaColumnasMatriz($matriz));
        
        //Mostrar resultados
        echo("<br>");
        echo("Suma total de las filas: $resultadosFilas <br>"
                . "Suma total de las columnas: $resultadosColumnas");
    }
    else{
    
        //Mostrar formulario
        echo(getBody("sumaFilasyColumnas.php"));
        
    } ?>
    <br>
    <a href="indexMatrices.php">Volver al menu</a>

</body>
    
</html>
