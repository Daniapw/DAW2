<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductoControlador
 *
 * @author DWES
 */
class ProductoControlador {
    
    //Listar productos disponibles en la tienda
    public static function getAllProductos(){
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
}
