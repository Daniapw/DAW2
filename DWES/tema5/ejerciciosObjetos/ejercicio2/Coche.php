<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Coche
 *
 * @author danir
 */
class Coche extends Vehiculo{
    
    public function __construct() {
        parent::__construct();
    }
    
    //Funcion especifica coche
    public function quemarRueda(){
        echo "¡El coche empieza a quemar rueda";
    }
    
    //Implementacion funcion andar
    public function andar($numKms) {
        //Aumentar kms recorridos por el coche
        self::setKmsRecorridos(self::getKmsRecorridos()+$numKms);
        
        //Aumentar kms totales
        Vehiculo::setKmsTotales(Vehiculo::getKmsTotales()+$numKms);
        
        return "El conductor arranca el coche y acaba recorriendo $numKms kms";
    }

}
