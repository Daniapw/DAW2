<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Animal
 *
 * @author DWES
 */
class Animal {
    protected $nombre;
    protected $numPatas;
    protected $peso;
    protected $tipoAlimentacion;
    
    //Constructor
    public function __construct($nombre, $numPatas, $tipoAlimentacion, $peso=1) {
        $this->nombre=$nombre;
        $this->numPatas=$numPatas;
        $this->tipoAlimentacion=$tipoAlimentacion;
        $this->peso=$peso;
    }
    
    //Getters y setters
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value){
        $this->$name=$value;
    }
    
    //toString
    public function __toString() {
        return "Nombre: $this->nombre <br>"
                . "Numero de patas: $this->numPatas <br>"
                . "Tipo de alimentacion: $this->tipoAlimentacion <br>"
                . "Peso: $this->peso kg";
    }
}
