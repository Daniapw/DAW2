<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ave
 *
 * @author DWES
 */
class Ave extends Animal{
    protected $colorPlumaje;
    protected $tipoPico;
    
    public function __construct($nombre, $numPatas, $tipoAlimentacion, $colorPlumaje, $tipoPico, $peso = 1) {
        parent::__construct($nombre, $numPatas, $tipoAlimentacion, $peso);
        $this->colorPlumaje=$colorPlumaje;
        $this->tipoPico=$tipoPico;
    }
    
    //toString
    public function __toString() {
        return parent::__toString()."<br>"
                . "Color del plumaje: $this->colorPlumaje <br>"
                . "Tipo de pico: $this->tipoPico";
    }
}
