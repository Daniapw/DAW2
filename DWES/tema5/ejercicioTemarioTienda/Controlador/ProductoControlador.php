<?php

require_once '../Modelo/Producto.php';
require_once 'Conexion.php';

class ProductoControlador {
    
    //Obtener todos los productos disponibles en la BDD
    public static function getAllProductos(){
        $conex=new Conexion("dwes");
        
        $resultado=$conex->query("SELECT * FROM producto");
                
        if ($conex->affected_rows){
            while($producto=$resultado->fetch_object()){
                $array[]=new Producto($producto->cod, $producto->nombre_corto, $producto->PVP, $producto->familia, $producto->descripcion);
            }
            
            return $array;
        }
        
        return false;
    }
    
    //Listar productos con formularios para productos.php
    public static function listarProductosConForms(){
        $productos=self::getAllProductos();
        
        foreach ($productos as $producto) {
            echo 
            "<form action='productos.php' method='post'>"
            . "<input type='hidden' name='nombreCorto' value='$producto->nombreCorto'>"
            . "<input type='hidden' name='codProducto' value='$producto->cod'>"
            . "<input type='hidden' name='PVP' value='$producto->PVP'>"
            . "<input type='submit' name='anadir' value='Añadir'> $producto->nombreCorto $producto->PVP"."€"
          . "</form><br>";
        }
    }
}
