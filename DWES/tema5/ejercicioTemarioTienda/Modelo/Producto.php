<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Producto
 *
 * @author DWES
 */
class Producto {
    private $cod;
    private $nombre;
    private $nombreCorto;
    private $descripcion;
    private $PVP;
    private $familia;
    
    public function __construct($cod, $nombreCorto, $pvp, $familia='', $descripcion="", $nombre="") {
        $this->cod=$cod;
        $this->nombreCorto=$nombreCorto;
        $this->PVP=$pvp;
        $this->familia=$familia;
        $this->descripcion=$descripcion;
        $this->nombre=$nombre;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name=$value;
    }
    
    public function __toString() {
        return $this->nombreCorto.'->'."$this->PVP"."€<br>";
    }
}
