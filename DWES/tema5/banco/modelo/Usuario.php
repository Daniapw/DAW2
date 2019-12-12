<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author DWES
 */
class Usuario {
    private $nombre;
    private $direccion;
    private $dni;
    private $telefono;
    private $clave;
    
    public function __construct($nombre, $dni, $clave, $direccion="", $telefono="") {
        $this->nombre=$nombre;
        $this->dni=$dni;
        $this->clave=$clave;
        $this->direccion=$direccion;
        $this->telefono=$telefono;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name=$value;
    }
    
    
}
