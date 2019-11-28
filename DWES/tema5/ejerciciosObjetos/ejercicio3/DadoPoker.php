<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DadoPoker
 *
 * @author danir
 */
class DadoPoker {
    private static $tiradasTotales=0;
    private $ultimaFigura="Aun no se ha tirado el dado";
    const CARAS=[0=>"As", 1=>"K", 2=>"Q", 3=>"J", 4=>"7", 5=>"8"];
    
    public function DadoPoker() {}
    
    //Funcion tirar dado
    public function tira(){
        $numero = rand(0, count(self::CARAS)-1);
        
        $this->ultimaFigura=self::CARAS[$numero];
        
        self::$tiradasTotales++;
    }
    
    //Ver ultima figura
    public function nombreFigura(){
        return $this->ultimaFigura;
    }
    
    public static function getTiradasTotales() {
        return self::$tiradasTotales;
    }
    
}
