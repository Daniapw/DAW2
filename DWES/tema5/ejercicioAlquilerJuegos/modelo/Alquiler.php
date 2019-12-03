<?php

/**
 * Description of Alquiler
 *
 * @author DWES
 */
class Alquiler {
    private $codJuego;
    private $dniCliente;
    private $fechaAlquiler;
    private $fechaDevol;
    
    function __construct($codJuego, $dniCliente, $fechaAlquiler, $fechaDevol) {
        $this->codJuego = $codJuego;
        $this->dniCliente = $dniCliente;
        $this->fechaAlquiler = $fechaAlquiler;
        $this->fechaDevol = $fechaDevol;
    }

    public function __get($name) {
      return $this->$name;  
    }

    public function __set($name, $value) {
        $this->$name=$value;
    }

}
