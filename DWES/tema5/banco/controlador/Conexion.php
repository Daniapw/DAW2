<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexion
 *
 * @author DWES
 */
class Conexion extends mysqli{
    private $server='localhost';
    private $usuario='dwes';
    private $pass='abc123.';
    private $bdd='banco';
    
    public function __construct() {
        parent::__construct($this->server, $this->usuario, $this->pass, $this->bdd);
        mysqli_set_charset($this, "utf8");
    }
}
