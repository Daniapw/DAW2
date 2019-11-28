<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gato
 *
 * @author DWES
 */
class Gato extends Mamifero{
    
    public function __construct($nombre, $numPatas, $tipoAlimentacion, $pelaje = true, $peso = 1) {
        parent::__construct($nombre, $numPatas, $tipoAlimentacion, $pelaje, $peso);
    }
    
    public function maullar(){
        echo "Miau!";
    }
    
    public function limpiarse(){
        echo "$this->nombre empieza a limpiarse con la lengua";
    }
    
    public function interactuar(Animal $animal) {
        if ($animal instanceof Gato)
            return "$this->nombre juega con $animal->nombre";
        elseif($animal instanceof Ave)
            return "$this->nombre se prepara para saltar sobre $animal->nombre";
        elseif($animal instanceof Perro)
            return "$this->nombre huye de $animal->nombre";
    }
}
