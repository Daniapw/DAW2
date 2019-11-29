<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Zona
 *
 * @author danir
 */
class Zona {
    public $nombreZona;
    public $plazasTotales;
    public $plazasRestantes;
    
    public function __construct($nombre, $plazasTotales) {
        $this->nombreZona=$nombre;
        $this->plazasTotales=$plazasTotales;
        $this->plazasRestantes=$plazasTotales;
    }
    
    public function vender($numEntradas){
        $this->plazasRestantes-=$numEntradas;
    }
    
    public function comprobarPlazas($numEntradas){
        if (($this->plazasRestantes-$numEntradas)<0)
            return false;
        
        return true;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name=$value;
    }
    
    public function __toString() {
        return "Zona $this->nombreZona: $this->plazasRestantes de $this->plazasTotales entradas";
    }
}
