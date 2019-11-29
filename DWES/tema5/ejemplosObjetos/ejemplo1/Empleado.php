<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Empleado
 *
 * @author DWES
 */
class Empleado extends Persona {
    protected $salario;
    
    public function __construct($nom = "", $apell = "", $ed = 18, $salario) {
        //Llamar a constructor de la clase padre
        parent::__construct($nom, $apell, $ed);
        $this->salario=$salario;
    }
    
    function getSalario() {
        return $this->salario;
    }

    function setSalario($salario) {
        $this->salario = $salario;
    }

    //Sobreescritura del metodo magico toString del padre
    public function __toString() {
        return parent::__toString()."<br>SALARIO: $this->salario";
    }

}
