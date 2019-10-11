<?php require 'funcionesMatrices.php' ?>

<html>
    
<body>

    <?php
    
    if (isset($_POST["crear"])){
        
        //Mostrar formulario
        echo(getBody("matrizTraspuesta.php")."<br>");
        
        //Crear e imprimir matriz
        $matriz = crearMatriz($_POST["filas"], $_POST["columnas"]);
        
        echo("Matriz:");
        imprimirMatriz($matriz);
        
        //Calcular traspuesta
        $traspuesta= matrizTraspuesta($matriz);
        
        //Mostrar resultados
        echo("<br> Matriz traspuesta:");
        imprimirMatriz($traspuesta);
    }
    else{
    
        //Mostrar formulario
        echo(getBody("matrizTraspuesta.php"));
        
    } ?>
    <br>
    <a href="indexMatrices.php">Volver al menu</a>

</body>
    
</html>