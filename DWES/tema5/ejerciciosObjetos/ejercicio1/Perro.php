<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Perro
 *
 * @author DWES
 */
class Perro extends Mamifero{
    public $color;
    
    public function __construct($nombre, $numPatas, $tipoAlimentacion, $color, $pelaje = true, $peso = 1) {
        parent::__construct($nombre, $numPatas, $tipoAlimentacion, $pelaje, $peso);
        $this->raza=$raza;
    }
    
    
    public function interactuar(Animal $animal) {
        if ($animal instanceof Gato)
            return "$this->nombre persigue al gato $animal->nombre";
        elseif($animal instanceof Ave)
            return "$this->nombre le ladra al ave $animal->nombre";
        elseif($animal instanceof Perro)
            return "$this->nombre olisquea a $animal->nombre";
    }

}
