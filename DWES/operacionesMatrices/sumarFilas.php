<?php require 'funcionesMatrices.php' ?>

<html>
    
<body>

    <?php
    
    if (isset($_POST["crear"])){
        $matriz = crearMatriz($_POST["filas"], $_POST["columnas"]);
        imprimirMatriz($matriz);
        
        $resultados=sumaFilasMatriz($matriz);
        
        foreach ($resultados as $indice => $sumaFila) {
            echo("Suma de fila $indice: $sumaFila <br>");
        }
    }
    else{
    
        echo(getBody("sumarFilas.php"));
        
    } ?>
    <br>
    <a href="indexMatrices.html">Volver al menu</a>

</body>
    
</html>

