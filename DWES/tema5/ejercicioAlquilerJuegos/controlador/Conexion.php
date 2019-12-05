<?php

/**
 * Description of Conexion
 *
 * @author DWES
 */
class Conexion extends mysqli{
    private $server='localhost';
    private $usuario='dwes';
    private $pass='abc123.';
    private $bdd='alquiler_juegos';
    
    public function __construct() {
        parent::__construct($this->server, $this->usuario, $this->pass, $this->bdd);
    }
}
