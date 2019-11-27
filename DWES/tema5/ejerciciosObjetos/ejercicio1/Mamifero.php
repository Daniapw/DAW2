<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mamifero
 *
 * @author DWES
 */
abstract class Mamifero extends Animal{
    protected $pelaje;
    
    public function __construct($nombre, $numPatas, $tipoAlimentacion, $pelaje=true, $peso = 1) {
        parent::__construct($nombre, $numPatas, $tipoAlimentacion, $peso);
        $this->pelaje=$pelaje;
    }
    
    public abstract function interactuar(Animal $animal);
    
    //toString
    public function __toString() {
        $str=parent::__toString()."<br>";
        
        if ($this->pelaje)
            $str.="Este animal tiene pelaje";
        else
            $str.="Este animal no tiene pelaje";
        
        return $str;
    }
}
