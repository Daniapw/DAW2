<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Carta
 *
 * @author DWES
 */
class Carta {
    private $numero;
    private $palo;
    
    public function __construct($numero, $palo) {
        $this->numero=$numero;
        $this->palo=$palo;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name=$value;
    }

    function toString(){
        return "$this->numero de $this->palo";
    }

    
}
