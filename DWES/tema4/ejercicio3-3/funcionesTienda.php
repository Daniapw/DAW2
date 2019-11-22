<?php

//Conexion a la base de datos
function getConexTienda(){
    
    $conex=new mysqli("localhost", 'dwes', 'abc123.', 'dwes');
    
    return $conex;
}

//Listar productos disponibles en la tienda
function listadoProductosDisponibles(){
    $conex= getConexTienda();
    
    $resultados=$conex->query("SELECT * FROM producto");
    
    while($objeto=$resultados->fetch_object()){
        echo 
        "<form action='productos.php' method='post'>"
        . "<input type='hidden' name='nombreCorto' value='$objeto->nombre_corto'>"
        . "<input type='hidden' name='codProducto' value='$objeto->cod'>"
        . "<input type='hidden' name='PVP' value='$objeto->PVP'>"
        . "<input type='submit' name='anadir' value='Añadir'> $objeto->nombre_corto $objeto->PVP"."€"
      . "</form><br>";
    }
    
    $conex->close();
}

//Listar productos de cesta
function listarCesta(){
    
    foreach ($_SESSION['cesta'] as $key=>$value){
        echo "$value[nombreCorto]".'->'."$value[PVP]"."€<br>";
    }
    
}

//Listar productos y devolver precio final
function listarProdPagar(){
    $precio=0;
    
    echo "<table>";
    
    foreach ($_SESSION['cesta'] as $key=>$value){
        echo
        "<tr>".
            "<td>$key</td>".
            "<td>$value[nombreCorto]</td>".
            "<td>$value[PVP]</td>".
        "</tr>";
        
        $precio+=$value['PVP'];
    }
    
    echo "</table>";
    return $precio;
}