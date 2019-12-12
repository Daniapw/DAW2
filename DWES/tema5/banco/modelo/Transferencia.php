<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Transferencia
 *
 * @author DWES
 */
class Transferencia {
    private $ibanOrigen;
    private $ibanDestino;
    private $fecha;
    private $cantidad;
    
    public function __construct($ibanOrigen, $ibanDestino, $fecha, $cantidad) {
        $this->ibanOrigen=$ibanOrigen;
        $this->ibanDestino=$ibanDestino;
        $this->fecha=$fecha;
        $this->cantidad=$cantidad;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name=$value;
    }
}
