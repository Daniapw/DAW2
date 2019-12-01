<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cesta
 *
 * @author DWES
 */
class Cesta {
    public $productos=[];
    
    public function __construct() {
    }
    
    //Anadir producto a la cesta
    public function addProducto($producto){
        $this->productos[]=$producto;
    }
    
    //Listar productos de cesta
    public function listarProductos(){
        foreach ($this->productos as $value){
            echo $value;
        }
    }
    
    //Listar productos con formato factura
    public function listarFormatoPago(){
        echo "<table>";
    
        foreach ($this->productos as $producto){
            echo
            "<tr>".
                "<td>$producto->cod</td>".
                "<td>$producto->nombreCorto</td>".
                "<td>".$producto->PVP."€</td>".
            "</tr>";
        }
    
        echo "</table>";
    }
    
    
    //Vaciar cesta
    public function vaciarCesta(){
        $this->productos=[];
    }
    
    //Get precio final
    public function getPrecioFinal(){
        $precio=0;
        
        foreach ($this->productos as $producto){
            $precio+=$producto->PVP;
        }
        
        return $precio;
    }
    

}
