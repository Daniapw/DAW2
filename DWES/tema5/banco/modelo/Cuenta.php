<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cuenta
 *
 * @author DWES
 */
class Cuenta {
    private $iban;
    private $saldo;
    private $dni;
    
    public function __construct($iban, $saldo, $dni) {
        $this->iban=$iban;
        $this->saldo=$saldo;
        $this->dni=$dni;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name=$value;
    }
}
