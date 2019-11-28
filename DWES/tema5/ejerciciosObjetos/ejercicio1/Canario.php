<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Canario
 *
 * @author DWES
 */
class Canario extends Ave{
    
    public function __construct($nombre, $numPatas, $tipoAlimentacion, $colorPlumaje, $tipoPico, $peso = 1) {
        parent::__construct($nombre, $numPatas, $tipoAlimentacion, $colorPlumaje, $tipoPico, $peso);
    }
    
    public function cantar(){
        echo "$this->nombre se pone a cantar";
    }
    
    public function acicalarse(){
        echo "$this->nombre empieza a acicalarse";
    }
}
