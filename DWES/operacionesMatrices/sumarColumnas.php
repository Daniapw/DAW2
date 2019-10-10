<?php require 'funcionesMatrices.php' ?>

<html>
    
<body>

    <?php
    
    if (isset($_POST["crear"])){
        $matriz = crearMatriz($_POST["filas"], $_POST["columnas"]);
        imprimirMatriz($matriz);
        
        $resultados= sumaColumnasMatriz($matriz);
        
        foreach ($resultados as $indice => $sumaColumna) {
            echo("Suma de columna $indice: $sumaColumna <br>");
        }
    }
    else{
    
        echo(getBody("sumarColumnas.php"));
        
    } ?>
    
    <br>
    <a href="indexMatrices.html">Volver al menu</a>

</body>
    
</html>