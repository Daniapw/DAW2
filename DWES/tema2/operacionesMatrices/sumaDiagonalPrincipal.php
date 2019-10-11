<?php require 'funcionesMatrices.php' ?>

<html>
    
<body>

    <?php
    
    if (isset($_POST["crear"]) && $_POST["filas"]==$_POST["columnas"]){
        
        //Mostrar formulario
        echo(getBody("sumaDiagonalPrincipal.php")."<br>");
        
        //Crear e imprimir matriz
        $matriz = crearMatriz($_POST["filas"], $_POST["columnas"]);
        
        echo("Matriz:");
        imprimirMatriz($matriz);
        
        //Mostrar resultados
        echo("<br>");
        echo("Suma diagonal principal: ". sumaDiagonalPrincipal($matriz));
    }
    else{
        //Mostrar formulario
        echo(getBody("sumaDiagonalPrincipal.php"));
        
        //Mensaje de error si la matriz no es cuadrada
        if (isSet($_POST["crear"])){
           echo ('<script language="javascript">alert("La matriz debe ser cuadrada")</script>');
        }
        
    } ?>
    <br>
    <a href="indexMatrices.php">Volver al menu</a>

</body>
    
</html>


