<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pinguino
 *
 * @author DWES
 */
class Pinguino extends Ave{
    public function __construct($nombre, $numPatas, $tipoAlimentacion, $colorPlumaje, $tipoPico, $peso = 1) {
        parent::__construct($nombre, $numPatas, $tipoAlimentacion, $colorPlumaje, $tipoPico, $peso);
    }
    
    public function nadar(){
        echo "$this->nombre se lanza al agua y nada a gran velocidad!";
    }
    
    public function graznar(){
        echo "$this->nombre se pone a graznar";
    }
}
