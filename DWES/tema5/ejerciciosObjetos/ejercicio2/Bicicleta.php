<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bicicleta
 *
 * @author danir
 */
class Bicicleta extends Vehiculo {
    
    public function __construct(){
        parent::__construct();
    }

    //Funcion especifica bicicleta
    public function hacerCaballito(){
        echo "El ciclista hace un caballito con la bici!";
    }
    
    //Implementacion funcion andar
    public function andar($numKms) {
        //Aumentar kms recorridos por la bicicleta
        self::setKmsRecorridos(self::getKmsRecorridos()+$numKms);
        
        //Aumentar kms totales
        Vehiculo::setKmsTotales(Vehiculo::getKmsTotales()+$numKms);
        
        return "El ciclista comienza a pedalear y acaba recorriendo $numKms kms";
    }

}
