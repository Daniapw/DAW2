<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vehiculo
 *
 * @author danir
 */
abstract class Vehiculo {
    private static $vehiculosCreados=0;
    private static $kmsTotales=0;
    private $kmsRecorridos=0;
    
    public function __construct() {
        self::$vehiculosCreados++;
    }
    
    //Funcion para que anden
    public abstract function andar($numKms);
    
    public static function getVehiculosCreados() {
        return self::$vehiculosCreados;
    }

    public static function getKmsTotales() {
        return self::$kmsTotales;
    }

    public function getKmsRecorridos() {
        return $this->kmsRecorridos;
    }

    protected static function setVehiculosCreados($vehiculosCreados) {
        self::$vehiculosCreados = $vehiculosCreados;
    }

    protected static function setKmsTotales($kmsTotales) {
        self::$kmsTotales = $kmsTotales;
    }

    protected function setKmsRecorridos($kmsRecorridos) {
        $this->kmsRecorridos = $kmsRecorridos;
    }


}
