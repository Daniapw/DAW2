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
    
    public static function addProducto($producto){
        $this->productos[]=$producto;
    }
    
    //Listar productos de cesta
    function listarProductos(){
        foreach ($this->productos as $value){
            echo $value;
        }
    }
}
